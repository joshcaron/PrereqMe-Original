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
            <th>Dept. Code</th>
            <th>Course Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Credits</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td>Please select a department above to begin</td>        
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>

<script>browse.initializeTable();</script>

</div>