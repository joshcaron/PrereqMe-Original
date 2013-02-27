<div id="MY_PLAN">
    <div id="SEMESTERS" class="fl">
        <div class="header">Your semesters:</div>
        <?php foreach($semesters as $semester): ?>
            <div class="semester box">
                <ul id="semester_<?php echo $semester->id?>" class="connectedSortable">
                <div class="semester_title"><?php echo $semester->title?></div>
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
            <div class="helper_text">Drag a course to one of your semeseters to add it, or make a new semester below</div>
            <div class="box">
                <ul id="dump" class="connectedSortable">

                </ul>
            </div>
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
    $( "#semester_1, #semester_2, #semester_3, #dump" ).sortable({
      connectWith: ".connectedSortable"
    }).disableSelection();
    $( "#semester_1, #semester_2, #semester_3" ).sortable({
      items: "li:not(.ui-state-highlight)"
    });
  });
</script>