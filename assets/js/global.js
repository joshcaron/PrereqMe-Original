
var home = {

    changedSchool : function(newValue)
    {
        var queryElement = $('#HOME #search_large #query').first();

        if(newValue != null && newValue > 0 && queryElement !== null)
        {
            queryElement.prop('disabled', false);
            queryElement.focus();
        }
        else
        {
            queryElement.prop('disabled', true);
        }
    }
};