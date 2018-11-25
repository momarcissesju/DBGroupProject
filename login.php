<!DOCTYPE html>
<html>
    <head>
        <?php require_once('includes/head.php'); ?>
        <!-- CSS Sheet-->
        <link type="text/css" rel="stylesheet" href="includes/css/login.css" />
        <script type="text/javascript" src="includes/javascript/helperFunctions.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('input[type="text"], input[type="password"]').focusin(function() {
                    $(this).css('border-color', '#004d99');
                });

                $('input[type="text"], input[type="password"]').focusout(function() {
                    $(this).css('border-color', '#cccccc');
                });

                $('#login').click(function(e) {
                    e.preventDefault();
                    $(this).html('<i class="fas fa-circle-notch fa-spin"></i>');
                    var username = $('input[name="username"]').val();
                    var password = $('input[name="password"]').val();

                    if((isEmpty(username) && isBlank(username)) || (isEmpty(password) && isBlank(password))) {
                        $('input[name="username"]').css('border-color', '#ff4d4d');
                        $('input[name="password"]').css('border-color', '#ff4d4d');
                        $('#error_message').html('Fill all fields.');
                    } else {
                        $('#error_message').html('');

                        $.ajax({
                            url: 'model/login_signup/login.php',
                            type: 'POST',
                            data: {username: username, password: password},
                            success: function(response) {
                                console.log(response);
                                if(response == 'credentials') {
                                    $('#login').html('Username or Password incorrect.');
                                    setTimeout(() => {
                                        $('#login').html('LOGIN'); 
                                    }, 1500);
                                } else if(response == 'DB Error') {
                                    $('#login').html('Cannot connect. Try later.');
                                    setTimeout(() => {
                                        $('#login').html('LOGIN'); 
                                    }, 1500);
                                } else if (response == 'connected') {
                                    window.location.href = "index.php";
                                } else {
                                    $('#login').html('Cannot connect. Try later.');
                                    setTimeout(() => {
                                        $('#login').html('LOGIN'); 
                                    }, 1500);
                                }
                            },
                            error: function(response) {
                                $('#login').html('Cannot connect. Try later.');
                                setTimeout(() => {
                                    $('#login').html('LOGIN'); 
                                }, 1500);
                            }
                        });
                    }
                }) 
            });
        </script>
    </head>

    <body>
        <a href="#" id="logo"><img src="" alt="LOGO"></a>

        <form action="">
            <h1>LOGIN</h1>
            <p id="error_message"></p>
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">

            <button id="login">LOGIN</button>
        </form>
    </body>
</html>