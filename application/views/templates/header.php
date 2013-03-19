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
<link rel="stylesheet" type="text/css" href=<?php echo css_url(), 'spacetree/Spacetree.css'?> >
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">

<script>
//Global variables
BASE_URL = '<?php echo base_url()?>'
</script>

<!-- JS sources -->
<script src=<?php echo js_url(), 'global.js'?> ></script>
<script src=<?php echo js_url(), 'home.js'?> ></script>
<script src=<?php echo js_url(), 'my_plan.js'?> ></script>
<script src=<?php echo js_url(), 'browse.js'?> ></script>
<script src=<?php echo js_url(), 'audit.js'?> ></script>
<script src=<?php echo js_url(), 'spacetree/jit-yc.js'?> ></script>
<script src=<?php echo js_url(), 'spacetree/jit.js'?> ></script>
<script src=<?php echo js_url(), 'spacetree/course.js'?> ></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

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
                >
                <img src=<?php echo img_url(), 'Logo.png'?> height="58px" />
                </a>
                <div id="tagline">enter awesome tagline here</div>
            </div>

            <?php if(isset($user)): ?>
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
                            <?php if(isset($loginError) AND $loginError): ?>
                                <tr>
                                    <td class="error" colspan="3" >Incorrect username/password combination. Please try again.</td>
                                </tr>
                            <?php endif ?>
                            <tr>
                                <td id="forgot"><a href="">Forgot your password?</a></td>
                            </tr>
                        </table>
                    </form>
                </div>
            <?php endif ?>
        </div>
    </div>

    <?php if(isset($user)): ?>
        <div id="USER_HEADING">
            <div id="content" class="cf">
                <div id="DASHBOARD_LINKS" class="fl">
                    <ul class="cf">
                        <li class="fl"><a class="menu_item <?php if(isset($selectedNav) AND $selectedNav === 'my_plan'){echo ' selected"';} else {echo '" href=', base_url('index.php/dashboard/my_plan');}?>>My Plan</a></li>  
                        <li class="fl"><a class="menu_item <?php if(isset($selectedNav) AND $selectedNav === 'audit'){echo ' selected"';} else {echo '" href=', base_url('index.php/dashboard/audit');}?>>Audit</a></li> 
                        <li class="fl browse"><a class="menu_item <?php if(isset($selectedNav) AND $selectedNav === 'browse'){echo ' selected"';} echo '" href=', base_url('index.php/dashboard/browse');?>>Browse Courses</a></li>  
                        <li class="fl"><a class="menu_item <?php if(isset($selectedNav) AND $selectedNav === 'help'){echo ' selected"';} else {echo '" href=', base_url('index.php/dashboard/help');}?>>Help</a></li> 
                    </ul>
                </div>

                <?php echo form_open('course/search_results', array('id'=>'header_search', 'class'=>'fr')); ?>
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
            </div>
        </div>
    <?php endif; ?>

    <div id="BODY_CONTAINER" class="cf">
