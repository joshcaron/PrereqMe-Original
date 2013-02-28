//Functions for home page
var home = {

    changedSearchSchool : function(newValue)
    {
        var queryElement = $('#HOME #search_large #query').first();

        if(newValue != null && newValue > 0 && queryElement !== null)
        {
            queryElement.prop('disabled', false);
            queryElement.focus();

            //Makes sure it routes to the correct place
            if (window.location.href.indexOf("home") !== -1)
            {
                if(window.location.href.indexOf("home/index") !== -1)
                {
                    var searchUrl = "search_home?collegeId=" + newValue.toString();
                }
                else
                {
                    var searchUrl = "home/search_home?collegeId=" + newValue.toString();
                }
            }
            else
            {
                var searchUrl = "index.php/home/search_home?collegeId=" + newValue.toString();
            }

            //Setup autocomplete
            queryElement.autocomplete({
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
        dept_select = $('#HOME #sign_up #dept_id').first();
        var school_id = parseInt($('#HOME #sign_up #college_id').first().val());
        var dept_id = parseInt(dept_select.val());

        var submit_buttom = $('#HOME #sign_up .submit').first();

        if(school_id > 0 && dept_id > 0)
        {
            submit_buttom.prop('disabled', false);
        }
        else
        {
            if(school_id === 0)
            {
                //Remove departments and disable department button 
                dept_select.html("<option value=\"0\" selected>Select your department</option>");
                dept_select.prop('disabled', true);
            }
            else
            {
                //Make an ajax call to insert departments for the school and enable department button

                //Makes sure it routes to the correct place
                if (window.location.href.indexOf("home") !== -1)
                {
                    if(window.location.href.indexOf("home/index") !== -1)
                    {
                        var searchUrl = "get_departments?collegeId=" + school_id.toString();
                    }
                    else
                    {
                        var searchUrl = "home/get_departments?collegeId=" + school_id.toString();
                    }
                }
                else
                {
                    var searchUrl = "index.php/home/get_departments?collegeId=" + school_id.toString();
                }
                $.getJSON(searchUrl ,function(result){
                    
                    dept_select.html("<option value=\"0\" selected>Select your department</option>");
                    $.each(result, function(i, field){
                        optionTag = "<option class=\"department\" value=\"" + field.id + "\">" + field.code + "</option>";
                        dept_select.append(optionTag);
                    });

                    dept_select.prop('disabled', false);
                });
            }

            submit_buttom.prop('disabled', true);
        }
    }
};


//Functions for my plan page
var myplan = {

    //Initializes autocomplete
    clickedSearch : function(inputField, schoolId)
    {
        //Initializes autocomplete
        var searchUrl = "search?collegeId=" + schoolId.toString();
        inputField.autocomplete({
            source: searchUrl,
            minLength: 2,
            select: function( event, ui ) {
                myplan.addCourseToDump(ui.item.value);
            }
        });

        //Removes on-click so this method is only executed once
        inputField.removeAttr("onclick");
    },

    addCourseToDump : function(courseTitle)
    {
        var getUrl = "get_course_by_title?title=" + courseTitle;

        $.getJSON(getUrl ,function(course){
                
            if(course !== null)
            {
                var newListItem = "<li class=\"ui-state-default\"><input type=\"hidden\" value=\"" + course.id + "\"/>" +
                                    course.deptCode + course.code + " - " + course.title + " (" + course.credits + ")";

                //Adds the new div
                $("#COURSE_DUMP #dump").first().append(newListItem);

                //Resets the value of the search bar
                $('#COURSE_DUMP #search').first().val('');
            }   
        });  
    }

};