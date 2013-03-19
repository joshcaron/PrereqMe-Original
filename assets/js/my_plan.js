//Functions for my plan page
var myplan = {

    //Initializes autocomplete
    clickedSearch : function(inputField, schoolId)
    {
        var searchUrl = BASE_URL + "index.php/home/search?collegeId=" + schoolId.toString();

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

    //Adds course to dump
    addCourseToDump : function(courseTitle)
    {
        var getUrl = "get_course_by_title?title=" + courseTitle;

        $.getJSON(getUrl ,function(course){
            
            var error = $('#COURSE_DUMP .box .error').first();

            if(course !== null && course.id !== null)
            {
                error.hide();

                //Course found so add it
                var newListItem = "<li class=\"ui-state-default\" hidden onclick=\"myplan.shouldGoToCourse($(this));global.stopPropogation(event);\" onmouseover=\"myplan.shouldShowDeleteButton($(this))\" onmouseout=\"myplan.shouldHideDeleteButton($(this))\">" +
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
        var dialogueData = $( "#MY_PLAN #dialog-delete-semester" ).first().clone();
        dialogueData.dialog({
            resizable: false,
            minHeight:140,
            minWidth:387,
            modal: true,
            buttons: {
                Cancel: function() {
                    $( this ).dialog( "close" );
                },
                "Delete Semester": function() {
                    $( this ).dialog( "close" );
                    var parentUl = deleteButtonElement.parent();

                    //Executes delete
                    var deleteUrl = "delete_semester_from_user?&semesterId=" + myplan.semesterIdFromSemesterUL(parentUl);
                    $.getJSON(deleteUrl, null);

                    //Hide box element
                    parentUl.parent().hide('blind', {}, 250, null);   
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

        window.location.href = BASE_URL + "index.php/course/view/" + courseId;
    }

};