<!DOCTYPE html>
<html>
    <head>
        <?php require_once('includes/head.php'); ?>
        <!-- CSS Sheet-->
        <link type="text/css" rel="stylesheet" href="includes/css/signup.css" />
        <script type="text/javascript" src="includes/javascript/helperFunctions.js"></script>
        <script type="text/javascript" src="controller/signup.js"></script>
    </head>

    <body>

        <form action="">
            <h1>CREATE ACCOUNT</h1>
            <p id="error_message"></p>
            <input type="text" name="firstName" placeholder="First Name">
            <input type="text" name="lastName" placeholder="Last Name">
            <input type="text" name="username" placeholder="Username">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <h2>What are you interested in?</h2>
            <select name="type" id="type">
                <option value="null" selected>Select Type...</option>
                <option value="buyer">Buying</option>
                <option value="seller">Selling</option>
            </select>

            <button id="createAccount">SIGN UP</button>
        </form>

        <a href="login"><p style="text-align: center;">Go to Login page</p></a>
        <a href="home"><p style="text-align: center;">Go to Home page</p></a>
    </body>
</html>