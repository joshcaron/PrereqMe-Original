<div id="COURSE_DETAIL">

<h2 class="fl"><?php echo $course->deptCode, $course->code, " - ", $course->title ?></h2>
<p class="fr"><?php echo $course->credits ?> credits</p>
<p><?php echo $course->description ?></p>

<div id="infovis"></div>

<script>
//Initializes spacetree
var json = <?php echo $courseJSON ?>;

$(document).ready(function() {
  initWithJSON(json);
});
</script>

<p class="help">Hover over a course to see it's title and credits. Click on a course to view its description. Drag the background to move around the graph.</p>

</div>