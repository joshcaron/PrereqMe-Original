//Functions for home page
var home = {

    changedSearchSchool : function(newValue)
    {
        var queryElement = $('#HOME #search_large #query').first();

        if(newValue != null && newValue > 0 && queryElement !== null)
        {
            queryElement.prop('disabled', false);
            queryElement.focus();

            var searchUrl = BASE_URL + "index.php/home/search?collegeId=" + newValue.toString();

            //Setup autocomplete
            queryElement.autocomplete({
            source: searchUrl,
            minLength: 2,
            select: function( event, ui ) {
                $('#index_search').submit();
            }
            });
        }
        else
        {
            queryElement.prop('disabled', true);
        }
    },

    changedSchoolOrDeptOrMajor : function()
    {
        dept_select = $('#HOME #sign_up #dept_id').first();
        major_select = $('#HOME #sign_up #major_id').first();

        var school_id = parseInt($('#HOME #sign_up #college_id').first().val());
        var dept_id = parseInt(dept_select.val());
        var major_id = parseInt(major_select.val());

        var submit_button = $('#HOME #sign_up .submit').first();

        //All selects have been chosen
        if(school_id > 0 && dept_id > 0 && major_id > 0)
        {
            submit_button.prop('disabled', false);
        }
        //Nothing has been chosen
        else if(school_id === 0)
        {
            //Remove departments and disable department button 
            dept_select.html("<option value=\"0\" selected>Select your department</option>");
            dept_select.prop('disabled', true);

            //Remove majors and disable major button
            major_select.html("<option value=\"0\" selected>Select your major</option>");
            major_select.prop('disabled', true);

            submit_button.prop('disabled', true);
        }
        //Only school has been chosen
        else if(dept_id === 0)
        {
            //Make an ajax call to insert departments for the school and enable department select
            var searchUrl = BASE_URL + "index.php/home/get_departments?collegeId=" + school_id.toString();
            $.getJSON(searchUrl ,function(result){
                
                dept_select.html("<option value=\"0\" selected>Select your department</option>");
                $.each(result, function(i, field){
                    optionTag = "<option class=\"department\" value=\"" + field.id + "\">" + field.code + "</option>";
                    dept_select.append(optionTag);
                });

                dept_select.prop('disabled', false);
            });

            //Remove majors and disable major button
            major_select.html("<option value=\"0\" selected>Select your major</option>");
            major_select.prop('disabled', true);

            submit_button.prop('disabled', true);
        }
        //School and department have been chosen
        else
        {
            //Make an ajax call to insert majors for the department and enable major select
            var searchUrl = BASE_URL + "index.php/home/get_majors?deptId=" + dept_id.toString();
            $.getJSON(searchUrl ,function(result){
                
                major_select.html("<option value=\"0\" selected>Select your major</option>");
                $.each(result, function(i, field){
                    optionTag = "<option class=\"major\" value=\"" + field.id + "\">" + field.title + "</option>";
                    major_select.append(optionTag);
                });

                major_select.prop('disabled', false);
            });

            submit_button.prop('disabled', true);
        }
    }
};
