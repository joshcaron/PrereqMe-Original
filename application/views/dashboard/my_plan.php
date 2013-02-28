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
            </form>
        </div>

        <?php foreach($semesters as $semester): ?>
            <div class="semester box">
                <ul id="semester_<?php echo $semester->id?>" class="connectedSortable">
                <div class="semester_title"><?php echo $semester->title, ' (', $semester->year, ')'?></div>
                <?php 
                for($courseIndex = 0; $courseIndex < count($semester->courses); $courseIndex++)
                {
                    $course = $semester->courses[$courseIndex];
                    echo '<li class="ui-state-default">';
                    echo '<input type="hidden" value="', $course->id, '"\>';
                    echo $course->deptCode, $course->code, ' - ';
                    echo $course->title, ' (', $course->credits, ')'; 
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
                <form onsubmit="">
                    <input type="text" id="search" onclick="clickedSearch(this, <?php echo "'", $user['schoolId'], "'"?>)" placeholder="Add course..." />
                    <input type="submit" value="Add"/>
                </form>
                <ul id="dump" class="connectedSortable">

                </ul>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
$(function() {
    //Make the semesters sortable
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
        placeholder: "ui-state-highlight"
    }).disableSelection();
});

</script>