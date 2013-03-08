<div id="MY_PLAN">
    <div id="SEMESTERS" class="fl">
        <div class="header">Your semesters:</div>
        
        <div id="ADD_SEMESTER" class="box">
            <div class="header">Add a semester</div>
            <?php echo form_open('dashboard/add_semester'); ?>
                <select id="semester_id" name="semesterId">
                    <option value="0" selected>Select Semester</option>

                    <?php foreach($schoolSemesters as $schoolSemester): ?>
                        <option value=<?php echo $schoolSemester->id?> ><?php echo $schoolSemester->title?></option>
                    <?php endforeach ?>
                </select>
                <select id="year" name="year">
                    <option value="0" selected>Year</option>

                    <?php foreach(range(2005, 2020) as $year): ?>
                        <option value=<?php echo $year?> ><?php echo $year?></option>
                    <?php endforeach ?>
                </select>
                <input type="submit" value="Add">
                <div class="error"><?php echo form_error('semesterId');?></div>
            </form>
        </div>

        <?php foreach($semesters as $semester): ?>
            <div class="semester box" onmouseover="myplan.shouldShowDeleteButton($(this))" onmouseout="myplan.shouldHideDeleteButton($(this))">
                <ul id="semester_<?php echo $semester->id?>" class="connectedSortable" >
                <div class="delete" onclick="myplan.shouldDeleteSemester($(this));" hidden></div>
                <div class="semester_title"><?php echo $semester->title, ' (', $semester->year, ')'?></div>
                <?php 
                for($courseIndex = 0; $courseIndex < count($semester->courses); $courseIndex++)
                {
                    $course = $semester->courses[$courseIndex];
                    echo '<li class="ui-state-default" onclick="myplan.shouldGoToCourse($(this));" onmouseover="myplan.shouldShowDeleteButton($(this))" onmouseout="myplan.shouldHideDeleteButton($(this))">';
                    echo $course->deptCode, $course->code, ' - ';
                    echo $course->title, ' (', $course->credits, ')'; 
                    echo '<div class="delete" onclick="myplan.shouldDeleteCourse($(this));" hidden><input type="hidden" value="', $course->id, '"\></div>';
                    echo '</li>';
                }
                ?>
                <li class="empty_cell ui-state-highlight">Drag courses here to add to semester</li>
                </ul>
            </div>
        <?php endforeach ?>
    </div>

    <div class="fr">
        <div id="COURSE_DUMP">
            <div class="header">Courses without a semester</div>
            <div class="helper_text">Drag courses to a semester on the left</div>
            <div class="box">
                <input type="text" id="search" onclick="myplan.clickedSearch($(this), <?php echo "'", $user['schoolId'], "'"?>)" placeholder="Add course..." />
                <div class="error" hidden>Course not found, please try again.</div> 
                <ul id="dump" class="connectedSortable">
                    <?php 
                    foreach($courseDump as $course)
                    {
                        echo '<li class="ui-state-default" onclick="myplan.shouldGoToCourse($(this));" onmouseover="myplan.shouldShowDeleteButton($(this))" onmouseout="myplan.shouldHideDeleteButton($(this))">';
                        echo $course->deptCode, $course->code, ' - ';
                        echo $course->title, ' (', $course->credits, ')'; 
                        echo '<div class="delete" onclick="myplan.shouldDeleteCourse($(this));" hidden><input type="hidden" value="', $course->id, '"\></div>';
                        echo '</li>';
                    } 
                    ?>
                </ul>
            </div>
        </div>
    </div>

<div id="dialog-delete-semester" title="Are you sure?" hidden>
  <p><span class="ui-icon ui-icon-alert"></span>Are you sure you want to delete the semester? This action cannot be undone.</p>
</div>

</div>

<script type="text/javascript">
$(function() {
    //Make the semesters sortable
    //Need to call here to utilize php array
    $( 
        <?php 
            echo"'";
            foreach($semesters as $semester) 
            {
                echo '#semester_', $semester->id, ',';
            }
            echo "#dump'";
        ?>
    ).sortable({
        connectWith: ".connectedSortable",
        items: "li:not(.ui-state-highlight)",
        placeholder: "ui-state-highlight",
        change: function( event, ui ) 
        {
            //SemesterId of where the course came from
            var oldSemesterId = myplan.semesterIdFromSemesterUL(ui.item.parent());

            //SemesterId of where the course ended up
            var newSemester = ui.placeholder.parent();
            var newSemesterId = myplan.semesterIdFromSemesterUL(newSemester);

            //Only need to update database if course changed semesters
            if(oldSemesterId !== newSemesterId)
            {
                //Executes update
                var updateUrl = "change_semester?courseId=" + myplan.courseIdFromLI(ui.item) + "&semesterId=" + newSemesterId;
                $.getJSON(updateUrl ,null);
            }
        }
    }).disableSelection();
});
</script>