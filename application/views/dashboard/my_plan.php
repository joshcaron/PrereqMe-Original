<div id="MY_PLAN">
    <div id="SEMESTERS" class="fl">
        <div class="header">Your semesters:</div>
        <?php foreach($semesters as $semester): ?>
            <div class="semester box">
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