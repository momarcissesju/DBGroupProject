$(document).ready(function() {
    $('.content').html('<p style="font-size: 48px; text-align: center;"><i class="fas fa-circle-notch fa-spin"></i></p>');
    $.ajax({
        url: 'model/index/getListings.php',
        type: 'POST',
        success: function(response) {
            console.log(response);
            if(response == 'DB') {
                $('.content').html('No Video Game for sale.')
            } else {
                $('.content').html(response);
            }
        },
        error: function(response) {

        }
    });
});