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

        if(courseId !== 0)
        {
            window.location.href = BASE_URL + "index.php/course/view/" + courseId;
        }
    }
};