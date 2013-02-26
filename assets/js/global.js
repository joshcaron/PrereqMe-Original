
var home = {

    changedSchool : function(newValue = 0)
    {
        var queryElement = $('#HOME #search_large #query').first();

        if(newValue > 0 && queryElement !== null)
        {
            queryElement.prop('disabled', false);
        }
        else
        {
            queryElement.prop('disabled', true);
        }
    }
};