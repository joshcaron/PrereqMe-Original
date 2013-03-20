var labelType, useGradients, nativeTextSupport, animate;

(function() {
  var ua = navigator.userAgent,
      iStuff = ua.match(/iPhone/i) || ua.match(/iPad/i),
      typeOfCanvas = typeof HTMLCanvasElement,
      nativeCanvasSupport = (typeOfCanvas == 'object' || typeOfCanvas == 'function'),
      textSupport = nativeCanvasSupport 
        && (typeof document.createElement('canvas').getContext('2d').fillText == 'function');
  //I'm setting this based on the fact that ExCanvas provides text support for IE
  //and that as of today iPhone/iPad current text support is lame
  labelType = (!nativeCanvasSupport || (textSupport && !iStuff))? 'Native' : 'HTML';
  nativeTextSupport = labelType == 'Native';
  useGradients = nativeCanvasSupport;
  animate = !(iStuff || !nativeCanvasSupport);
})();

var Log = {
  elem: false,
  write: function(text){
    if (!this.elem) 
      this.elem = document.getElementById('log');
    //this.elem.innerHTML = text;
    //this.elem.style.left = (500 - this.elem.offsetWidth / 2) + 'px';
  }
};

//implement an edge type  
$jit.ST.Plot.EdgeTypes.implement({  
  'reverseArrow': {  
    'render' : function(adj, canvas) {
            var from = adj.nodeFrom.pos,
                to = adj.nodeTo.pos,
                dim = adj.getData('dim');

            var adjustedFrom = from;
            adjustedFrom.x = from.x - 100;

            this.edgeHelper.arrow.render(adjustedFrom, to, dim, true, this.viz.canvas);
    }  
  }  
}); 

function initWithJSON(json)
{
    //init Spacetree
    //Create a new ST instance
    var st = new $jit.ST({
        //id of viz container element
        injectInto: 'infovis',
        //set duration for the animation
        duration: 500,
        //set animation transition type
        transition: $jit.Trans.Quart.easeInOut,
        //set distance between node and its children
        levelDistance: 50,
        //set xoffset
        offsetX: -400,
        //set orientation
        orientation: 'right',
        //set levels to show
        levelsToShow: 15,
        constrained: false,
        siblingOffset: 50,

        //enable panning
        Navigation: {
          enable:true,
          panning:true
        },
        //set node and edge styles
        //set overridable=true for styling individual
        //nodes or edges
        Node: {
            height: 30,
            width: 90,
            type: 'rectangle',
            color: '#aaa',
            overridable: true
        },
        
        Edge: {
            type: 'reverseArrow',
            color: '#000',
            overridable: true
        },

        Tips: {
            enable: true,
            type: 'HTML',
            onShow: function (tip, node)
            {
                tip.innerHTML = node.data['tip'];
            }
        },
        
        onBeforeCompute: function(node){
            Log.write("loading " + node.name);
        },
        
        onAfterCompute: function(){
            Log.write("done");
        },
        
        //This method is called on DOM label creation.
        //Use this method to add event handlers and styles to
        //your node.
        onCreateLabel: function(label, node){
            label.id = node.id;            
            label.innerHTML = node.name;
            label.onclick = function(){
                //Redirect to that course's detail page (if we aren't on it right now)
                var redirectUrl = BASE_URL + "index.php/course/view/" + node.data['id'];
                if(window.location.href !== redirectUrl)
                {
            	   window.location.href = redirectUrl;
                }
            };

            //set label styles
            var style = label.style;
            style.width = node.Node.width + 'px';
            style.height = node.Node.height + 'px';           
        },
        
        //This method is called right before plotting
        //a node. It's useful for changing an individual node
        //style properties before plotting it.
        //The data properties prefixed with a dollar
        //sign will override the global node style properties.
        onBeforePlotNode: function(node){
            //add some color to the nodes in the path between the
            //root node and the selected node.
            if (node.selected) {
                node.data.$color = "#ff7";
            }
            else {
                delete node.data.$color;
                //if the node belongs to the last plotted level
                if(!node.anySubnode("exist")) {
                    //count children number
                    var count = 0;
                    node.eachSubnode(function(n) { count++; });
                    //assign a node color based on
                    //how many children it has
                    node.data.$color = ['#aaa', '#baa', '#caa', '#daa', '#eaa', '#faa'][count];                    
                }
            }
        },
        
        //This method is called right before plotting
        //an edge. It's useful for changing an individual edge
        //style properties before plotting it.
        //Edge data proprties prefixed with a dollar sign will
        //override the Edge global style properties.
        onBeforePlotLine: function(adj){
            if (adj.nodeFrom.selected && adj.nodeTo.selected) {
                adj.data.$color = "#eed";
                adj.data.$lineWidth = 3;
            }
            else {
                delete adj.data.$color;
                delete adj.data.$lineWidth;
            }
        }
    });
    //load json data
    st.loadJSON(json);
    //compute node positions and layout
    st.compute();
    //optional: make a translation of the tree
    st.geom.translate(new $jit.Complex(-200, 0), "current");
    //emulate a click on the root node.
    st.onClick(st.root);
    //end

}

var course = {

    //Adds the course to the user's plan
    addToPlan : function(userId, courseId)
    {
        //Disables the button
        var addToPlanButton = $('#COURSE_DETAIL #add_to_plan').first();
        addToPlanButton.prop('disabled', true);
        addToPlanButton.html("Added to my plan");

        //Adds the course to the user's course dump
        var addUrl = BASE_URL + "index.php/course/add_to_my_plan/" + userId + "/" + courseId;
        $.getJSON(addUrl ,function(result){});
    }

}
