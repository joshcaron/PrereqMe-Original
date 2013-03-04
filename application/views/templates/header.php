<!DOCTYPE html>
<html>

<head>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
<title><?php echo $title ?></title>
</head>

<body>

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

<!-- CSS sources -->
<link rel="stylesheet" type="text/css" href=<?php echo css_url(), 'global.css'?> >
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />

<!-- JS sources -->
<script>
//Global variables
BASE_URL = '<?php echo base_url()?>'
</script>
<script src=<?php echo js_url(), 'global.js'?> ></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>

<div id="MAIN_CONTAINER">
    <div id="HEADER">
        <div id="CONTENT" class="cf">
            <div id="logo" class="fl">
                <a href=
                        <?php
                            if(isset($user))
                            {
                                echo base_url('index.php/dashboard');
                            }
                            else
                            {
                                echo base_url('index.php');
                            }

                        ?>
                >PrereqMe</a>
            </div>

            <?php if(isset($user)): ?>
                <?php echo form_open('course/search_results', array('id'=>'header_search', 'class'=>'fl')); ?>
                    <div id="search_small" class="cf">
                        <input type="hidden" class="college_id" name="collegeId" value=<?php echo $user['schoolId']?> />
                        <div id="search_box">
                            <div class="magnifying_small fl"></div>
                            <div class="fr">
                                <input id="query" class="fl" type="text" name="query" class="search" placeholder="Find course by id or title..." />
                            </div>
                        </div>
                    </div>
                </form>

                <script>global.initializeSearchBarAutocomplete()</script>
                    
                <div id="userInfo" class="fr">
                    <div>Hi, <?php echo $user['firstName']?></div>
                    <div><?php echo $user['email']?></div>
                    <button class="logOut" onclick="window.location.href= '<?php echo base_url('index.php/home/logout')?>'">Log Out</button>
                </div>

            <?php else: ?>
                <div id="login" class="fr">
                    <form action=<?php echo base_url('index.php/home/login')?> method="post">
                        <table>
                            <tr>
                                <td><label for="email">Email:</label></td>
                                <td><label for="password">Password:</label></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="email" /></td>
                                <td><input type="password" name="password" /></td>
                                <td><input type="submit" value="Log In" /></td>
                            </tr>
                            <tr>
                                <td id="forgot"><a href="">Forgot your password?</a></td>
                        </table>
                    </form>
                </div>
            <?php endif ?>
        </div>
    </div>

    <?php if(isset($user)): ?>
        <div id="DASHBOARD_LINKS">
            <ul class="cf">
                <li class="fl"><a <?php if($selectedNav === 'overview'){echo 'class="selected"'} else {echo "href=", base_url('index.php/dashboard');}?>>Dashboard</a></li> 
                <li class="fl"><a <?php if($selectedNav === 'my_plan'){echo 'class="selected"'} else {echo "href=", base_url('index.php/dashboard/my_plan');}?>>My Plan</a></li>  
                <li class="fl browse"><a <?php if($selectedNav === 'browse'){echo 'class="selected"'} {else echo "href=", base_url('index.php/dashboard/browse');}?>>Browse Courses</a></li>  
                <li class="fl"><a <?php if($selectedNav === 'help'){echo 'class="selected"'} else {echo "href=", base_url('index.php/dashboard/help');}?>>Help</a></li> 
            </ul>
        </div>
    <?php endif; ?>

    <div id="BODY_CONTAINER" class="cf">
