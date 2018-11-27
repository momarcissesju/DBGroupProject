$(document).ready(function() {
    if(!isEmpty(q) && !isBlank(q)) {
        query(q);
    }
});

function query(q) {
    $.ajax({
        url: 'model/search.php',
        type: 'GET',
        data: {q: q},
        success: function(response) {
            console.log(response);
            if(response == 'DB') {
                $('.content').html("<h1>There is problem. Try later.</h1>");
            } else if(response == 'Empty') {
                $('.content').html("<h1>No results.</h1>");
            } else {
                $('.content').html(response);
            }
        },
        error: function(respone) {
            $('.content').html("<h1>There is problem. Try later.</h1>");
        }
    });
}