$(document).ready(function() {
    $('.content').html('<p style="font-size: 48px; text-align: center;"><i class="fas fa-circle-notch fa-spin"></i></p>');
    $.ajax({
        url: 'model/index/getListings.php',
        type: 'POST',
        success: function(response) {
            console.log(response);
            if(response == 'DB') {
                $('.content').html('<p style="font-size: 48px; text-align: center;">There is a problem. Try later.</p>');
            } else if(response == "") {
                $('.content').html('<p style="font-size: 48px; text-align: center;">No Video Game for sale.</p>');
            } else {
                $('.content').html(response);
            }
        },
        error: function(response) {
            $('.content').html('<p style="font-size: 48px; text-align: center;">There is a problem. Try later.</p>');
        }
    });
});