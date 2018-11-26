var productID;

$(document).ready(function() {
    $("#item_price-input").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl/cmd+A
            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: Ctrl/cmd+C
            (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: Ctrl/cmd+X
            (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    $('#search_item').keyup(function(e) {
        var search = $(this).val();
        if(!isBlank(search) && !isEmpty(search)) {
            $('.search_item-results').css('display', 'block');
            if(e.keyCode != 32) {
                $.ajax({
                    url: 'model/sell/getProducts.php',
                    type: 'POST',
                    data: {search: search},
                    success: function(response) {
                        $('.search_item-results').html(response);
                        if(isBlank($('#search_item').val()) && isEmpty($('#search_item').val())) {
                            $('.search_item-results').css('display', 'none');
                        } else if(isBlank(response) && isEmpty(response)) {
                            $('.search_item-results').css('height', '20px');
                        } else if(!isBlank(response) && !isEmpty(response)) {
                            $('.search_item-results').css('height', '250px');
                        }
                    },
                    error: function(response) {
                        console.log(response);
                        alert('We encountered an issue. Please, try later.');
                    }
                });
            }
        } else {
            $('.search_item-results').css('display', 'none');
        }
    });

    $('.sell-now-btn').click(function() {
        $(this).html('<i class="fas fa-circle-notch fa-spin"></i>');
        var price = $('#item_price-input').val();
        if(price < 0) {
            alert('Selling price cannot be negative.');
        } else {
            $.ajax({
                url: 'model/sell/listItem.php',
                type: 'POST',
                data: {productID: productID, price: price},
                success: function(response) {
                    if(response == 'BUYER') {
                        $('.sell-now-btn').html('Unauthorized');
                        setTimeout(() => {
                            alert('You are not allowed to sell.');
                            $('.sell-now-btn').html('SELL NOW');
                        }, 500);
                    } else if(response == 'DB') {
                        $('.sell-now-btn').html('Error. Try Later.');
                        setTimeout(() => {
                            $('.sell-now-btn').html('SELL NOW');
                        }, 2000);
                    } else if(response == 'listed') {
                        $('.sell-now-btn').html('Listed');
                        $('#search_item').val('');
                        $('#item_price-input').val('');
                        setTimeout(() => {
                            $('.sell-now-btn').html('SELL NOW');
                        }, 1500);
                    } else {

                    }
                },
                error: function(response) {

                }
            });
        }
    });
});

function select_item(title, PID) {
    $('#search_item').val(title);
    productID = PID;
    $('.search_item-results').css('display', 'none');
}