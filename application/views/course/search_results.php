<div id="SEARCH_RESULTS">

<div id="content">

<div id="results_text">Found <?php echo count($results)?> results for "<?php echo $query?>":</div>
<?php foreach($results as $course)
{
    $url = base_url('index.php/course/view/' . $course->id);
    echo '<div class="course" onclick="window.location.href =\'', $url, '\';">';
    echo $course->deptCode, $course->code, ' - ', $course->title;
    echo '</div>';
}
?>

</div>

</div>