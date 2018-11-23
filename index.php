<!DOCTYPE html>
<html>
    <head>
        <?php require_once('includes/head.php'); ?>


        <!-- CSS Sheet-->
        <link type="text/css" rel="stylesheet" href="includes/css/login.css" />
        <script type="text/javascript">
            $(document).ready(function() {
                
            });
            </script>
            
        <
        <link type="text/css" rel="stylesheet" href="includes/css/signup.css" />
        <script type="text/javascript" src="includes/javascript/helperFunctions.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('input[type="text"], input[type="password"]').focusin(function() {
                    $(this).css('border-color', '#004d99');
                });

                $('input[type="text"], input[type="password"]').focusout(function() {
                    $(this).css('border-color', '#cccccc');
                });

                $('#createAccount').click(function(e) {
                    e.preventDefault();
                    var firstName = $('input[name="firstName"]').val();
                    var lastName = $('input[name="lastName"]').val();
                    var username = $('input[name="username"]').val();
                    var address = $('input[name="address"]').val();
                    var email = $('input[name="email"]').val();
                    var emailConfirmation = $('input[name="emailConfirmation"]').val();
                    var password = $('input[name="password"]').val();
                    var passwordConfirmation = $('input[name="passwordConfirmation"]').val();
                    var type = $('input[name="type"]').val();

                    if(isEmpty(firstName) && isBlank(firstName)) { //check if user entered first name
                        $('input[name="firstName"]').css('border-color', '#ff4d4d');
                        $('#error_message').html('Fill all fields.');
                    } else if(isempty(lastName) && isBlank(lastName)) { //checl if user entered last name
                        
                    } else if(empty(username)) { //checl if user entered username

                    } else if(empty(address)) { //checl if user entered address

                    } else if(empty(email)) { //checl if user entered email

                    } else if(empty(emailConfirmation)) { //check if user confirmed email

                    } else if(empty(password)) { //check if user entered password
                        
                    } else if(empty(passwordConfirmation)) {  //check if user confirmed password

                    } else if(type == null) { //check if user picked a type

                    } else {
                        //AJAX Call to a php file to insert data inside DB if all the fields are filled
                        $('#error_message').html();
                    }
                })   
            });
        </script>

    </head>

    <body>
    <a href="#" id="logo"><img src="" alt="LOGO"></a>

<form action="">
    <h1>LOGIN</h1>
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">

    <button>LOGIN</button>

            <a href="#" id="logo"><img src="" alt="LOGO"></a>

<form action="">
    <h1>CREATE ACCOUNT</h1>
    <p id="error_message"></p>
    <input type="text" name="firstName" placeholder="First Name">
    <input type="text" name="lastName" placeholder="Last Name">
    <input type="text" name="username" placeholder="Username">
    <input type="text" name="address" placeholder="Address">
    <input type="text" name="email" placeholder="Email">
    <input type="text" name="emailConfirmation" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="password" name="passwordConfirmation" placeholder="Confirm Password-">
    <h2>What are you interested in?</h2>
    <select name="type" id="type">
        <option value="null" selected>Select Type...</option>
        <option value="buyer">Buying</option>
        <option value="seller">Selling</option>
    </select>

    <button id="createAccount">SIGN UP</button>
</form>

    </body>
</html>