<div id="MY_PLAN">
    <div id="SEMESTERS" class="fl">
        <div class="header">Your semesters:</div>
        <?php foreach($semesters as $semester): ?>
            <div id="sortable_<?php echo $semester->id?>"  class="semester box">
                <div class="semester_title"><?php echo $semester->title?></div>
                <?php 
                for($courseIndex = 0; $courseIndex < count($semester->courses); $courseIndex++)
                {
                    $course = $semester->courses[$courseIndex];
                    echo '<div class="course">';
                    echo $course->deptCode, $course->code, ' - ';
                    echo $course->title, ' (', $course->credits, ')'; 
                    echo '</div>';
                }
                ?>
                <ul id="semester_1" class="connectedSortable">
                    <li class="ui-state-default">Item 1</li>
                    <li class="ui-state-default">Item 2</li>
                    <li class="ui-state-default">Item 3</li>
                    <li class="ui-state-default">Item 4</li>
                    <li class="ui-state-default">Item 5</li>
                </ul>
                 
                <ul id="semester_2" class="connectedSortable">
                    <li class="ui-state-highlight">Item 6</li>
                    <li class="ui-state-highlight">Item 7</li>
                    <li class="ui-state-highlight">Item 8</li>
                    <li class="ui-state-highlight">Item 9</li>
                    <li class="ui-state-highlight">Item 10</li>
                </ul>

                <ul id="semester_3" class="connectedSortable">
                </ul>
            </div>
        <?php endforeach ?>
    </div>

    <div class="fr">
        <div id="COURSE_DUMP">
            <div class="header">Courses without a semester</div>
            <div class="helper_text">Drag a course to one of your semeseters to add it, or make a new semester below</div>
            <div class="box">THIS IS WHERE COURSE DUMP WILL GO</div>
        </div>

        <div id="ADD_SEMESTER" class="box">
            <div class="header">Add a semester</div>
            <?php echo form_open('dashboard/add_semester'); ?>
                <label for="title">Semester title:</label>
                <input type="text" name="title" value="<?php echo set_value('title'); ?>"/></td>
                <input type="submit" value="Add"></td>
            </form>
        </div>

    </div>

</div>

<script type="text/javascript">
$(function() {
    $( "#semester_1, #semester_2, #semester_3" ).sortable({
      connectWith: ".connectedSortable"
    }).disableSelection();
  });
</script>