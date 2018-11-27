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
            $('#login').html('LOGIN');
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
                        window.location.href = "home";
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