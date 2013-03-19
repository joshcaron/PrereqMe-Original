var audit = {

    //Gets the courseId from the course LI element
    courseIdFromLI : function(courseLIElement)
    {
        var inputElement = courseLIElement.find('input').first();

        if(inputElement != null)
        {
            return inputElement.val();
        }
        else
        {
            return 0;
        }
    },

    //Called by clicking on a list element in my_plan
    //Loads view for that course
    shouldGoToCourse : function(courseLIElement)
    {
        var courseId = audit.courseIdFromLI(courseLIElement);

        if(courseId != null)
        {
            window.location.href = BASE_URL + "index.php/course/view/" + courseId;
        }
    },

    //Toggles whether to show completed requirements or not
    toggleCompletedCourses : function(checkbox)
    {
        var completedCourses = $("#DEGREE_AUDIT li.ui-state-default");

        if(checkbox.checked === true)
        {
            completedCourses.show('blind', {}, 250, null);
            checkbox.checked = true;
        }
        else
        {
            completedCourses.hide('blind', {}, 250, null);
            checkbox.checked = false;
        }
    }
};