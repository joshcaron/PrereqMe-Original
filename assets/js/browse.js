//Functions for the browse page
var browse = {

    initializeTable : function()
    {
        $('#BROWSE #RESULTS').first().dataTable({
            "bJQueryUI": true,
            "sScrollY": 400,
            "bScrollCollapse": true,
            "bPaginate": false,
            "aoColumnDefs": [
                { "bSearchable": false, "bVisible": false, "aTargets": [ 0 ] }
            ]
        });
    },

    //Updates the courses based on the set filters
    updateCourses : function()
    {
        var deptId = $('#BROWSE #FILTERS #dept_id').val();

        if(deptId > 0)
        {
            var getUrl = BASE_URL + "index.php/dashboard/courses_for_filters?deptId=" + deptId;

            var coursesTable = $('#BROWSE #RESULTS').first().dataTable();

            //Get filtered courses from server and replaces the current data with the new data
            $.getJSON(getUrl ,function(result){
                coursesTable.fnClearTable();;
                coursesTable.fnAddData(result);

                //Add on-click methods
                coursesTable.$('tr').click( function () {
                    var rowData = coursesTable.fnGetData(this);
                    var courseId = data[0];

                    //Redirect to course detail page
                    window.location.href = BASE_URL + "course/view/?courseId=" + courseId;
                });
            });
        }
    }
};
