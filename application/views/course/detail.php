<div id="COURSE_DETAIL">

<h2><?php echo $course->deptCode, $course->code, $course->title, " - " ?></h2>
<p><?php echo $course->credits ?> credits</p>
<p><?php echo $course->description ?></p>

<div id="infovis"></div>

<script>
//Initializes spacetree
var json = <?php echo $courseJSON ?>;

$(document).ready(function() {
  initWithJSON(json);
});
</script>

</div>