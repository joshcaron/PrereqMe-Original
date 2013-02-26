<!DOCTYPE html>
<html>

<head>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
<title><?php echo $title ?></title>
</head>

<body>

<!-- CSS sources -->
<link rel="stylesheet" type="text/css" href=<?php echo css_url(), 'global.css'?> >

<!-- JS sources -->
<script src=<?php echo js_url(), 'global.js'?> ></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<div id="MAIN_CONTAINER">
    <div id="HEADER">
        <div id="CONTENT">
            <div id="logo" class="fl"><a href=<?php echo base_url('index.php')?>>PrereqMe</a></div>

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
                            <tr>
                                <td id="forgot"><a href="">Forgot your password?</a></td>
                        </table>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if(isset($user)): ?>
        <div id="DASHBOARD_LINKS">
            <div id="CONTENT">
                <a href=<?php echo base_url('index.php/dashboard')?>>Dashboard</a> | 
                <a href=<?php echo base_url('index.php/dashboard/my_plan')?>>My Plan</a> | 
                <a href=<?php echo base_url('index.php/dashboard/browse')?>>Browse Courses</a> | 
                <a href=<?php echo base_url('index.php/dashboard/help')?>>Help</a>
            </div>
        </div>
    <?php endif; ?>

    <div id="BODY_CONTAINER">