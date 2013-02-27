
var home = {

    changedSearchSchool : function(newValue)
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
    },

    changedSchool : function()
    {
        var school_id = $('#HOME #sign_up #college_id').first().value;
        var dept_id = $('#HOME #sign_up #dept_id').first().value;

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