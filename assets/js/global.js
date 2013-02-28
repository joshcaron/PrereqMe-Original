

//Functions for home page
var home = {

    changedSearchSchool : function(newValue)
    {
        var queryElement = $('#HOME #search_large #query').first();

        if(newValue != null && newValue > 0 && queryElement !== null)
        {
            queryElement.prop('disabled', false);
            queryElement.focus();
            common.initializeSearchAutocomplete($("#search_box #query"), newValue);

            if(window.location.href.indexOf("index.php") === -1)
            {
                //If coming from base url
                var searchUrl = "index.php/home/search?collegeId=" + schoolId.toString();
            }
            else
            {
                //If coming from home controller
                var searchUrl = "search?collegeId=" + schoolId.toString();
            }
            searchElement.autocomplete({
            source: searchUrl,
            minLength: 2
            });
        }
        else
        {
            queryElement.prop('disabled', true);
        }
    },

    changedSchoolOrDept : function()
    {
        var school_id = parseInt($('#HOME #sign_up #college_id').first().val());
        var dept_id = parseInt($('#HOME #sign_up #dept_id').first().val());

        var submit_buttom = $('#HOME #sign_up .submit').first();

        if(school_id > 0 && dept_id > 0)
        {
            submit_buttom.prop('disabled', false);
        }
        else
        {
            submit_buttom.prop('disabled', true);
        }
    }
};


//Functions for my plan page
var myplan = {

    clickedSearch : function(inputField, schoolId)
    {
        //Initializes autocomplete
        var searchUrl = "search?collegeId=" + schoolId.toString();
        searchElement.autocomplete({
            source: searchUrl,
            minLength: 2
        });

        //Removes on-click so this method is only executed once
        inputField.removeAttr("onclick");
    }

};