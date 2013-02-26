<div id="HOME">
    <div id="search_large" class='fl'>

        <form action=<?php echo base_url('index.php/course/search') ?> >
            <select id="college_id" name="collegeId">
                <option value="0">Select a school</option>

                <?php foreach($schools as $school): ?>
                    <option value=<?php echo $school->id?> ><?php echo $school->title?></option>
                <?php endforeach ?>
            </select>

            <div>
                <input id="query" class="fl" type="text" name="query" class="search" />
                <input type="submit" class="fr" value="Search"/>
            </div>
        </form>

    </div>

    <div id="sign_up" class="fr">
        <h2>Sign up for an account:</h2>
        <?php echo form_open('home/signup'); ?>
            <table>
                <tr>
                    <td><label for="first_name">First Name<span class="required">*</span></label></td>
                    <td><label for="last_name">Last Name<span class="required">*</span></label></td>
                </tr>
                <tr>
                    <td><input type="text" name="first_name" value="<?php echo set_value('first_name'); ?>" /></td>
                    <td><input type="text" name="last_name" value="<?php echo set_value('last_name'); ?>" /></td>
                </tr>
                <tr>
                    <td class="error"><?php echo form_error('first_name'); ?></td>
                    <td class="error"><?php echo form_error('last_name'); ?></td>
                </tr>

                <tr><td><label for="email">Email<span class="required">*</span></label></td></tr>
                <tr><td><input type="text" name="email" value="<?php echo set_value('email'); ?>"/></td></tr>
                
                <tr><td><label for="reenter_email">Email again<span class="required">*</span></label></td></tr>
                <tr><td><input type="text" name="reenter_email" /></td></tr>
                <tr><td class="error"><?php echo form_error('email'); ?></td></tr>
                
                <tr><td><label for="password">Password<span class="required">*</span></label></td></tr>
                <tr><td><input type="password" name="password" /></td></tr>
                
                <tr><td><label for="reenter_password">Password again<span class="required">*</span></label></td></tr>
                <tr><td><input type="password" name="reenter_password" /></td></tr>
                <tr><td class="error"><?php echo form_error('password'); ?></td></tr>

                <tr><td><input type="submit" value="Sign up" /></td></tr>
            </table>
        </form>
    </div>
</div>