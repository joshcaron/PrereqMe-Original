<div ID="AUDIT">

<h1>You have <span class="orange">9</span> incomplete requirements</h1>

<h3>Note, the following data is static (for now)</h3>

<div id="legend">
    <div class="ui-state-default">Completed Requirement</div>
    <div class="ui-state-error">Incomplete Requirement</div>
</div>

<input type="checkbox" name="showCompletedCourses" checked onclick="audit.toggleCompletedCourses($(this));"><label for="showCompletedCourses">Show completed courses</label>

<div id="DEGREE_AUDIT">
    <h3>Computer Science Major Requirements (5/18 incomplete)</h3>
    <div>
        <ul class="course_list">
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">CS 1200 - Computer Science/Information Science Overview 1<input type="hidden" value="2"/></li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">CS 1210 - Computer Science/Information Science Overview 2: Co-op Preparation<input type="hidden" value="3"/></li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">CS 2500 - Fundamentals of Computer Science 1<input type="hidden" value="9"/></li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">CS 2501 - Lab for CS 2500<input type="hidden" value="10"/></li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">CS 2510 - Fundamentals of Computer Science 2<input type="hidden" value="11"/></li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">CS 2511 - Lab for CS 2510<input type="hidden" value="12"/></li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">CS 2800 - Logic and Computation<input type="hidden" value="14"/></li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">CS 2801 - Lab for CS 2800<input type="hidden" value="15"/></li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">CS 2600 - Computer Organization<input type="hidden" value="13"/></li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">CS 3800 - Theory of Computation<input type="hidden" value="24"/></li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">CS 3600 - Systems and Networks<input type="hidden" value="23"/></li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">CS 4400 - Programming Languages<input type="hidden" value="30"/></li>
            <li class="ui-state-error" onclick="audit.shouldGoToCourse($(this));">CS 4500 - Software Development<input type="hidden" value="32"/></li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">CS 4800 - Algorithms and Data<input type="hidden" value="44"/></li>
            <li class="ui-state-error" onclick="audit.shouldGoToCourse($(this));">CS 4000 - Senior Seminar<input type="hidden" value="25"/></li>
            <li class="ui-state-error" onclick="audit.shouldGoToCourse($(this));">Computer Science Capstone</li>
            <li class="ui-state-error" onclick="audit.shouldGoToCourse($(this));">Computer Science Upper Division Elective 1</li>
            <li class="ui-state-error" onclick="audit.shouldGoToCourse($(this));">Computer Science Upper Division Elective 2</li>
        </ul>
    </div>

    <h3>CS Additional Courses for BS (1/7 incomplete)</h3>
    <div>
        <ul class="course_list">
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">MATH 2331 - Linear Algebra</li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">MATH 3081 - Probability and Statistics</li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">SOCL 4528 - Computers and Society</li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">Science Requirement 1</li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">Science Requirement 2</li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">Science Requirement 3</li>
            <li class="ui-state-error" onclick="audit.shouldGoToCourse($(this));">Science Requirement 4</li>
        </ul>
    </div>

    <h3>Computer Science English Requirement (0/3 incomplete)</h3>
    <div>
        <ul class="course_list">
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">ENGL 1111 - College Writing</li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">ENGL 3301 - Advanced Writing in the Disciplines</li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">ENGL 3302 - Advanced Writing in the Technical Professions</li>
        </ul>
    </div>

    <h3>General Electives (2/8 incomplete)</h3>
    <div>
        <ul class="course_list">
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">General Elective 1</li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">General Elective 2</li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">General Elective 3</li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">General Elective 4</li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">General Elective 5</li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">General Elective 6</li>
            <li class="ui-state-error" onclick="audit.shouldGoToCourse($(this));">General Elective 7</li>
            <li class="ui-state-error" onclick="audit.shouldGoToCourse($(this));">General Elective 8</li>
        </ul>    
    </div>

    <h3>NU Core (1/12 incomplete)</h3>
    <div>
        <ul class="course_list">
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">College Writing</li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">Arts and Humanities Level 1</li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">Social Science Level 1</li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">Science/Technology Level 1</li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">Comparative Study of Cultures</li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">Analytical Math Level 1</li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">Writing Intensive</li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">Level 2 Elective</li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">Capstone / Writing Intensive II</li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">Experiential Learning</li>
            <li class="ui-state-default" onclick="audit.shouldGoToCourse($(this));">Cooperative Education</li>
            <li class="ui-state-error" onclick="audit.shouldGoToCourse($(this));">General Electives</li>
        </ul>    
    </div>
</div>

<script>
$(function() {
    $( "#DEGREE_AUDIT" ).accordion({
      collapsible: true,
      heightStyle: "content",
      active: false
    });
  });
</script>

</div>