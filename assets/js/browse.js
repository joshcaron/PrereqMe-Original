//Functions for the browse page
var browse = {

    initializeTable : function()
    {
        $('#BROWSE #RESULTS').first().dataTable();
    },

    //Updates the courses based on the set filters
    updateCourses : function()
    {
        var deptId = $('#BROWSE #FILTERS #dept_id').val();

        if(deptId > 0)
        {
            var getUrl = BASE_URL + "index.php/dashboard/courses_for_filters?deptId=" + deptId;

            //Get filtered courses from server
            $.getJSON(getUrl ,function(result){
                    var tableBody = $('#BROWSE #RESULTS tbody').first();

                    //Resets html
                    tableBody.html("");

                    //Creates table based on returend courses
                    $.each(result, function(i, course){
                        tableRow = "<tr>";
                        tableRow += "<td>" + course.deptCode + "</td>";
                        tableRow += "<td>" + course.code + "</td>";
                        tableRow += "<td>" + course.title + "</td>";
                        tableRow += "<td>" + course.description.substring(0,40) + "...</td>";
                        tableRow += "<td>" + course.credits + "</td>";
                        tableRow += "</tr>";
                        tableBody.append(tableRow);
                    });
            });
        }
    }
};
