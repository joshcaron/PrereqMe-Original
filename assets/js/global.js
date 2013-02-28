
var home = {

    changedSearchSchool : function(newValue)
    {
        var queryElement = $('#HOME #search_large #query').first();

        if(newValue != null && newValue > 0 && queryElement !== null)
        {
            queryElement.prop('disabled', false);
            queryElement.focus();
            common.initializeSearchAutocomplete(newValue, $("#search_box #query"));
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

var my_plan = {

    

};

var common = {

    //Expects a school ID and the searchElement (which is the input element)
    initializeSearchAutocomplete : function(schoolId, searchElement)
    {
        var searchUrl = "index.php/dashboard/search?collegeId=" + schoolId.toString();
        searchElement.autocomplete({
            source: searchUrl,
            minLength: 2
        });
    }

}