$(document).ready(function() {
    $('input[type="text"], input[type="password"]').focusin(function() {
        $(this).css('border-color', '#004d99');
    });

    $('input[type="text"], input[type="password"]').focusout(function() {
        $(this).css('border-color', '#cccccc');
    });

    $('#createAccount').click(function(e) {
        e.preventDefault();
        $(this).html('<i class="fas fa-circle-notch fa-spin"></i>');
        var firstName = $('input[name="firstName"]').val();
        var lastName = $('input[name="lastName"]').val();
        var username = $('input[name="username"]').val();
        var email = $('input[name="email"]').val();
        var password = $('input[name="password"]').val();
        var type = $('#type').val();

        if(isEmpty(firstName) && isBlank(firstName)) { //check if user entered first name
            $('input[name="firstName"]').css('border-color', '#ff4d4d');
            $('#error_message').html('Fill all fields.');
            $(this).html('SIGN UP');
        } else if(isEmpty(lastName) && isBlank(lastName)) { //check if user entered last name
            $('input[name="lastName"]').css('border-color', '#ff4d4d');
            $('#error_message').html('Fill all fields.');
            $(this).html('SIGN UP');
        } else if(isEmpty(username) && isBlank(username)) { //check if user entered username
            $('input[name="username"]').css('border-color', '#ff4d4d');
            $('#error_message').html('Fill all fields.');
            $(this).html('SIGN UP');
        } else if(isEmpty(email) && isBlank(email)) { //check if user entered email
            $('input[name="email"]').css('border-color', '#ff4d4d');
            $('#error_message').html('Fill all fields.');
            $(this).html('SIGN UP');
        } else if(isEmpty(password) && isBlank(password)) { //check if user entered password
            $('input[name="password"]').css('border-color', '#ff4d4d');
            $('#error_message').html('Fill all fields.');
            $(this).html('SIGN UP');
        } else if(type == 'null') { //check if user picked a type
            $('#error_message').html('Choose Type.');
            $(this).html('SIGN UP');
        } else {
            //AJAX Call to a php file to insert data inside DB if all the fields are filled
            $('#error_message').html('');

            $.ajax({
                url: 'model/login_signup/signup.php',
                type: 'POST',
                data: {firstName: firstName, lastName: lastName, username: username, email: email, password: password, type: type},
                success: function(response) {
                    console.log(response);
                    if(response == 'DB Error') {
                        $('#createAccount').html('Error. Try Later.');
                        setTimeout(() => {
                            $('#createAccount').html('SIGN UP');
                        }, 2000);
                    } else if(response == 'Email') {
                        $('#createAccount').html('Email already used.');
                        setTimeout(() => {
                            $('#createAccount').html('SIGN UP');
                        }, 2000);
                    } else if(response == 'Username') {
                        $('#createAccount').html('Username already used.');
                        setTimeout(() => {
                            $('#createAccount').html('SIGN UP');
                        }, 2000);
                    } else if(response == 'Registered') {
                        $('#createAccount').html('Account Created');
                        setTimeout(() => {
                            window.location.href = 'login';
                        }, 2000);
                    } else {
                        $('#createAccount').html('Error. Try Later.');
                        setTimeout(() => {
                            $('#createAccount').html('SIGN UP');
                        }, 1500);
                    }
                },
                error: function(response) {
                    $('#createAccount').html('Error. Try Later.');
                    setTimeout(() => {
                        $('#createAccount').html('SIGN UP');
                    }, 2000);
                }
            });

        }
    })   
});