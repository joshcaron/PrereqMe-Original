<div id="HOME">
    <div id="search_large" class='fl'>

        <form action=<?php echo base_url('index.php/course/search') ?> >
            <select name="collegeId">
                <option value="0">Select a school</option>
                <option value="1">Northeastern University</option>
            </select>

            <div>
                <input type="text" name="query" class="search" />
                <input type="submit" value="Search"/>
            </div>
        </form>

    </div>

    <div id="sign_up" class="fr">
        <form action=<?php echo base_url('index.php/login/signup')?> method="post">
            <table>
                <tr>
                    <td><label for="first_name">First Name</label></td>
                    <td><label for="last_name">Last Name</label></td>
                </tr>
                <tr>
                    <td><input type="text" name="first_name" /></td>
                    <td><input type="text" name="last_name" /></td>
                </tr>

                <tr><td><label for="email">Email</label></td></tr>
                <tr><td><input type="text" name="email" /></td></tr>
                
                <tr><td><label for="reenter_email">Email again</label></td></tr>
                <tr><td><input type="text" name="reenter_email" /></td></tr>
                
                <tr><td><label for="password">Password</label></td></tr>
                <tr><td><input type="text" name="password" /></td></tr>
                
                <tr><td><label for="reenter_password">Password again</label></td></tr>
                <tr><td><input type="text" name="password_again" /></td></tr>

                <tr><td><input type="submit" value="Sign up" /></td></tr>
            </table>
        </form>
    </div>
</div>