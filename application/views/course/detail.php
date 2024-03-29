<div id="COURSE_DETAIL">

<div class="cf">
    <div class="fl">
    <h2><?php echo $course->deptCode, $course->code, " - ", $course->title ?></h2>
    <h3><?php echo $course->credits ?> credits</h3>
    </div>

    <?php if(isset($user)): ?>
        <button id="add_to_plan" class="fr" onclick="course.addToPlan(<?php echo $user['id'], ',', $course->id ?>)" 
            <?php if(isset($hasCourseInPlan) AND $hasCourseInPlan === TRUE) 
            {
                echo 'disabled';
                echo '>Added to my plan';
            }
            else
            {
                echo '>Add to Plan';
            }
            ?> 
        </button>
    <?php endif ?>

    <p id="description" class="fl"><?php echo $course->description ?></p>
</div>

<div id="infovis">
<?php if(count($course->prereqs) === 0): ?>
<p>This course does not have any prerequesites</p>
<?php endif?>

</div>

<script>
//Initializes spacetree
var json = <?php echo $courseJSON ?>;

$(document).ready(function() {
  initWithJSON(json);
});
</script>

<p class="help">Hover over a course to see it's title and credits. Click on a course to view its description.</p>

</div>