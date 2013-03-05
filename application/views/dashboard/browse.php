<div id="BROWSE">

<h2>Find courses using the filters below<h2>
<h3>Click on any course to see its details<h3>

<div id="FILTERS">
    <span>Filters: </span>
    <select id="dept_id" name="deptId" onchange="browse.updateCourses();">
        <option value="0" selected>Department</option>

        <?php foreach($departments as $department): ?>
            <option value=<?php echo $department->id?> ><?php echo $department->code?></option>
        <?php endforeach ?>
    </select>
</div>

<table id="RESULTS">
    <thead>
        <tr>
            <th id="id">Id</th>
            <th id="dept_code">Dept. Code</th>
            <th id="course_id">Course Id</th>
            <th id="title">Title</th>
            <th id="credits">Credits</th>
        </tr>
    </thead>
    <tbody>
        <tr class="temp">
            <td></td>
            <td></td>
            <td></td>
            <td>Please select a department above to begin</td>        
            <td></td>
        </tr>
    </tbody>
</table>

<script>browse.initializeTable();</script>

</div>