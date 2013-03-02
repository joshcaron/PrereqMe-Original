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


}

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
        var searchUrl = BASE_URL + "index.php/home/search?collegeId=" + newValue.toString();

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
            
            var error = $('#COURSE_DUMP .box .error').first();

            if(course !== null && course.id !== null)
            {
                error.hide();

                //Course found so add it
                var newListItem = "<li class=\"ui-state-default\" hidden onclick=\"myplan.shouldGoToCourse($(this));\" onmouseover=\"myplan.shouldShowDeleteButton($(this))\" onmouseout=\"myplan.shouldHideDeleteButton($(this))\">" +
                                    course.deptCode + course.code + " - " + course.title + " (" + course.credits + ")" + "\n<div class=\"delete\" onclick=\"myplan.shouldDeleteCourse($(this));\" hidden><input type=\"hidden\" value=\"" + course.id + "\"/></div>" + "\n</li>";

                //Adds the new div
                var dumpList = $("#COURSE_DUMP #dump").first();
                dumpList.append(newListItem);

                //Animates in object
                dumpList.find('li').last().show('slide', {}, 250, null);

                //Resets the value of the search bar
                $('#COURSE_DUMP #search').first().val('');
            }   
            else
            {
                //No course found so present error
                error.show();
            }
        });  
    },

    shouldShowDeleteButton : function(listElement)
    {
        listElement.find('.delete').first().prop('hidden', false);
    },

    shouldHideDeleteButton : function(listElement)
    {
        listElement.find('.delete').first().prop('hidden', true);
    },

    shouldDeleteCourse : function(deleteButtonElement)
    {
        //Get course id from inner div
        var courseId = myplan.courseIdFromDelete(deleteButtonElement);
        var parentLi = deleteButtonElement.parent();
        var parentUl = parentLi.parent();

        //Executes delete
        var deleteUrl = "delete_course_from_user?courseId=" + courseId + "&semesterId=" + myplan.semesterIdFromSemesterUL(parentUl);
        $.getJSON(deleteUrl ,null);

        //Hide list element
        parentLi.hide('blind', {}, 250, null);       
    },

    shouldDeleteSemester : function(deleteButtonElement)
    {
        $( "#MY_PLAN #dialog-delete-semester" ).dialog({
            resizable: false,
            minHeight:140,
            minWidth:387,
            modal: true,
            buttons: {
                "Delete Semester": function() {
                    $( this ).dialog( "close" );
                    var parentUl = deleteButtonElement.parent();

                    //Executes delete
                    var deleteUrl = "delete_semester_from_user?&semesterId=" + myplan.semesterIdFromSemesterUL(parentUl);
                    $.getJSON(deleteUrl ,null);

                    //Hide box element
                    parentUl.parent().hide('blind', {}, 250, null);   
                },
                Cancel: function() {
                    $( this ).dialog( "close" );
                }
            }
        });    
    },

    //Gets the semester Id from the semester UL element
    semesterIdFromSemesterUL : function(semesterULElement)
    {
        var id = semesterULElement.attr('id');

        if(id.indexOf('dump') !== -1)
        {
            //Dump is semester 0
            return "0";
        }
        else
        {
            return id.replace("semester_",'');
        }
    },

    //Gets the courseId from the course LI element
    courseIdFromLI : function(courseLIElement)
    {
        var deleteDiv = courseLIElement.find('.delete').first();
        return myplan.courseIdFromDelete(deleteDiv);
    },

    //Gets the courseId from the delete div element
    courseIdFromDelete : function(deleteDivElement)
    {
        return deleteDivElement.find('input').first().val();
    },

    //Called by clicking on a list element in my_plan
    //Loads view for that course
    shouldGoToCourse : function(courseLIElement)
    {
        var courseId = myplan.courseIdFromLI(courseLIElement);

        window.location.href = BASE_URL + "index.php/course/view?courseId=" + courseId;
    }

};