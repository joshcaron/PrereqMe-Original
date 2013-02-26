
var home = {

    changedSchool : function(newValue)
    {
        var queryElement = $('#HOME #search_large #query_box').first();

        if(newValue != null && newValue > 0 && queryElement !== null)
        {
            queryElement.prop('hidden', false);
        }
        else
        {
            queryElement.prop('hidden', true);
        }
    }
};