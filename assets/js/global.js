var global = {

    //Initializes the search bar autocomplete in the header
    initializeSearchBarAutocomplete : function()
    {
        var queryElement = $('#HEADER #search_small #query').first();
        var schoolId = $('#HEADER #search_small .college_id').first().val();

        var searchUrl = BASE_URL + "index.php/home/search?collegeId=" + schoolId.toString();

        //Setup autocomplete
        queryElement.autocomplete({
        source: searchUrl,
        minLength: 2,
        select: function( event, ui ) {
            $('#header_search').submit();
        }
        });
    }

    //Stops propogation of the event
    stopPropogation : function(e)
    {
        var event = e || window.event;
        event.stopPropagation();
    }

};
