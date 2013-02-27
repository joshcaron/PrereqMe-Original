
var home = {

    changedSearchSchool : function(newValue)
    {
        var queryElement = $('#HOME #search_large #query').first();

        if(newValue != null && newValue > 0 && queryElement !== null)
        {
            queryElement.prop('disabled', false);
            queryElement.focus();
            home.initializeSearchAutocomplete(newValue);
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
    },

    initializeSearchAutocomplete : function(schoolId)
    {

        $( "#search_box #query" ).autocomplete({
            source: "<?php echo base_url('index.php/course/search')?>" + "?schoolId=" + schoolId.toString() + "&query=" + $('#search_box #query').first().val(),
            minLength: 2
        });
    }
};