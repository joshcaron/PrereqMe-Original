<?php if(isset($user)): ?>
    <script>
    //If user is logged in, redirect to dashboard
    window.location.href = BASE_URL + 'index.php/dashboard';
    </script>
<?php endif ?>

<div id="HOME">
    <div id="left_box" class="fl">
        <h2 class="helper_text">This is the two sentence helper text for what PrereqMe does. We can say things here and stuff.</h2>
        <div id="search_large">

            <?php echo form_open('course/search_results', array('id'=>'index_search')); ?>
                <select id="college_id" name="collegeId" onchange="home.changedSearchSchool(this.value)">
                    <option value="0" selected>Select your school</option>

                    <?php foreach($schools as $school): ?>
                        <option value=<?php echo $school->id?> ><?php echo $school->title?></option>
                    <?php endforeach ?>
                </select>

                <div id="search_box">
                    <div class="magnifying_large fl"></div>
                    <div class="fr">
                        <input id="query" class="fl" type="text" name="query" class="search" placeholder="Find course by id or title..."/>
                        <script>
                        //Sets query to disabled if school select is 0
                        if(parseInt($('#HOME #college_id').val()) === 0)
                        {
                            $('#HOME #query').first().prop('disabled', true);
                        }
                        else
                        {
                            $('#HOME #query').first().prop('disabled', false);
                        }
                        </script>
                    </div>
                </div>
                <div class="error"><?php echo form_error('query'); ?></div>
                <div>
                    <input type="submit" value="Search"/>
                </div>
            </form>

        </div>
    </div>

    <div id="sign_up" class="fr">
        <h2>Sign up for an account:</h2>
        <?php echo form_open('home/signup'); ?>
            <table>
                <tr><td>
                    <select id="college_id" name="collegeId" onchange="home.changedSchoolOrDeptOrMajor()">
                        <option value="0" selected>Select your school</option>

                        <?php foreach($schools as $school): ?>
                            <option value=<?php echo $school->id?> ><?php echo $school->title?></option>
                        <?php endforeach ?>
                    </select>
                </td></tr>
                <tr><td class="error"><?php echo form_error('collegeId'); ?></td></tr>

                <tr><td>
                    <select id="dept_id" name="deptId" onchange="home.changedSchoolOrDeptOrMajor()" disabled>
                        <option value="0" selected>Select your department</option>
                    </select>
                </td></tr>

                <tr><td>
                    <select id="major_id" name="majorId" onchange="home.changedSchoolOrDeptOrMajor()" disabled>
                        <option value="0" selected>Select your major</option>
                    </select>
                </td></tr>

                <tr><td><label for="first_name">First Name<span class="required">*</span></label></td></tr>
                <tr><td><input type="text" class="wide" name="first_name" value="<?php echo set_value('first_name'); ?>" /></td></tr>
                <tr><td class="error"><?php echo form_error('first_name'); ?></td></tr>

                <tr><td><label for="email">Email<span class="required">*</span></label></td></tr>
                <tr><td><input class="wide" type="text" name="email" value="<?php echo set_value('email'); ?>"/></td></tr>

                <tr><td><label for="reenter_email">Re-Enter Email<span class="required">*</span></label></td></tr>
                <tr><td><input class="wide" type="text" name="reenter_email" /></td></tr>
                <tr><td class="error"><?php echo form_error('email'); ?></td></tr>

                <tr><td><label for="password">Password<span class="required">*</span></label></td></tr>
                <tr><td><input class="wide" type="password" name="password" /></td></tr>

                <tr><td><label for="reenter_password">Re-Enter Password<span class="required">*</span></label></td></tr>
                <tr><td><input class="wide"  type="password" name="reenter_password" /></td></tr>
                <tr><td class="error" colspan = "2"><?php echo form_error('password'); ?></td></tr>

                <tr><td><input class="submit" type="submit" value="Sign up" disabled /></td></tr>
            </table>
        </form>
    </div>
</div>
