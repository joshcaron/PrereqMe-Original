<?php
    $is_logged_in = $this->session->userdata('is_logged_in');

    if($is_logged_in)
    {
        $user['id'] = $this->session->userdata('user_id');
        $user['email'] = $this->session->userdata('email');
        $user['firstName'] = $this->session->userdata('firstName');
    }
?>

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

            <?php if($user !== NULL): ?>
                <div id="userInfo" class="fr">
                    <h4>Hi, <?php echo $user['firstName']?></h4>
                    <p><?php echo $user['email']?></p>
                    <button class="logOut" onclick="window.location.href= '<?php echo base_url('index.php/home/logOut')?>'">Log Out</button>
                </div>
            <?php else: ?>
                <div id="login" class="fr">
                    <form action=<?php echo base_url('index.php/login')?> method="post">
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

    <div id="BODY_CONTAINER">