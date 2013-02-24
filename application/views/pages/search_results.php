<div id="SEARCH_RESULTS">

<div id="content" style="border:1px dashed #FF2A00;">
<?php foreach($results as $course)
{
    $url = base_url('index.php/course/') . '?courseId=' . $course->id;
    echo '<div class="course" onclick="window.location.href =\'', $url, '\';">';
    echo $course->deptCode, $course->code, ' - ';
    echo $course->title, ' (', $course->credits, ')';
    echo '</div>';
}
?>
</div>

</div>