var global = {

    //Initializes the search bar autocomplete in the header
    initializeSearchBarAutocomplete : function()
    {
        var queryElement = $('#search_small #query').first();
        var schoolId = $('#search_small .college_id').first().val();

        var searchUrl = BASE_URL + "index.php/home/search?collegeId=" + schoolId.toString();

        //Setup autocomplete
        queryElement.autocomplete({
        source: searchUrl,
        minLength: 2,
        select: function( event, ui ) {
            queryElement.val(ui.item.value);
            $('#header_search').submit();
        }
        });
    },

    //Stops propogation of the event
    stopPropogation : function(e)
    {
        var event = e || window.event;
        event.stopPropagation();
    }

};
