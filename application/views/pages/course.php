<div id="COURSE_DETAIL">
<h2><?php echo $course->title, " - ", $course->deptCode, $course->code ?></h2>
<p><?php echo $course->credits ?> credits</p>
<p><?php echo $course->description ?></p>

<h2>Prereqs</h2>
<?php print_r($courseJSON) ?>
</div>