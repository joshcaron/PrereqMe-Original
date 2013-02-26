<div id="MY_PLAN">
    <div id="semesters" class="fl">

        <?php foreach($semesters as $semester): ?>
            <div class="semester">
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





</div>