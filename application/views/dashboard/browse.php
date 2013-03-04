<div id="BROWSE">

<div id="FILTERS">

    <select id="dept_id" name="deptId" onchange="browse.updateCourses();">
        <option value="0" selected>Select department</option>

        <?php foreach($departments as $department): ?>
            <option value=<?php echo $department->id?> ><?php echo $department->code?></option>
        <?php endforeach ?>
    </select>
</div>

<table id="RESULTS">
    <thead>
        <tr>
            <th id="dept_code">Dept. Code</th>
            <th id="course_id">Course Id</th>
            <th id="title">Title</th>
            <th id="credits">Credits</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<script>browse.initializeTable();</script>

</div>