<!DOCTYPE html>
<html>
    <head>
        <?php require_once('includes/head.php'); ?>
        <!-- CSS Sheet-->
        <link type="text/css" rel="stylesheet" href="includes/css/login.css" />
        <script type="text/javascript" src="includes/javascript/helperFunctions.js"></script>
        <script type="text/javascript" src="controller/login.js"></script>
    </head>

    <body>

        <form action="">
            <h1>LOGIN</h1>
            <p id="error_message"></p>
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">

            <button id="login">LOGIN</button>
        </form>

        <a href="signup"><p style="text-align: center;">Sign Up</p></a>
        <a href="home"><p style="text-align: center;">Go to Home page</p></a>
    </body>
</html>