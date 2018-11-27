var price;
var shipping;
var title;
var coverURL;
var sellerID;

$(document).ready(function() {
    $.ajax({
        url: 'model/checkout/getListingInfo.php',
        type: 'POST',
        data: {listingID: listingID},
        success: function(response) {
            if(response == 'Not connected') {
                window.location.href = 'login';
            } else if(response == 'DB') {
                alert('Item Not Found.')
            } else {
                console.log(response);
                let jsonObject = JSON.parse(response);
                price = jsonObject[0]['price'];
                coverURL = jsonObject[0]['coverURL'];
                title = jsonObject[0]['title'];
                shipping = jsonObject[0]['shipping'];
                sellerID = jsonObject[0]['sellerID'];

                total = shipping + price;

                $('#productAsset').attr('src', coverURL);
                $('#productAsset').attr('alt', title);
                $('#productAsset').attr('title', title);
                $('#productTitle').html(title);
                $('.shipping > span').html('$' + shipping.toFixed(2));
                $('.itemPrice > span').html('$' + price.toFixed(2));
                $('.total > span').html('$' + total.toFixed(2));
            }
        },
        error: function(response) {
            $('#productTitle').html('');
            alert('Product Not Found.');
        }
    });

    $('.orderConfirmation').click(function(e) {
        e.preventDefault();
        $('.orderConfirmation').html('<i class="fas fa-circle-notch fa-spin"></i>');
        var first = $('#firstName').val();
        var last = $('#lastName').val();
        var address = $('#address').val();
        var address2 = $('#address2').val();
        var city = $('#city').val();
        var zip = $('#zip').val();
        var state = $('#state').val();

        if((isBlank(address) || isEmpty(address)) || (isBlank(city) || isEmpty(city)) || (isBlank(zip) || isEmpty(zip)) || (isBlank(state) || isEmpty(state)) || (isBlank(first) || isEmpty(first)) || (isBlank(last) || isEmpty(last)))  {
            $('input').css('border-color', 'red');
            $('select').css('border-color', 'red');
            $('.orderConfirmation').html('Confirm Order');
            setTimeout(resetBorderColor, 7000);
        } else {
            var recipientAddress = address + ' ' + address2 + ', ' + city + ', ' + state + ' ' + zip;
            var recipientName = first + ' ' + last;

            $.ajax({
                url: 'model/checkout/placeOrder.php',
                type: 'POST',
                data: {recipientAddress: recipientAddress, listingID: listingID, recipientName: recipientName, shipping: shipping, sellerID: sellerID},
                success: function(response) {
                    console.log(response);
                    if(response == 'Not connected') {
                        window.location.href = 'login';
                    } else if(response == 'DB') {
                        $('.orderConfirmation').html('Cannot place your order.');
                        setTimeout(() => {
                            $('.orderConfirmation').html('Confirm Order'); 
                        }, 2500);
                    } else if(response == 'Order Placed') {
                        $('.orderConfirmation').html('Order Placed');
                        setTimeout(() => {
                            window.location.href = 'home';
                        }, 2500);
                    } else {
                        $('.orderConfirmation').html('Cannot place your order.');
                        setTimeout(() => {
                            $('.orderConfirmation').html('Confirm Order'); 
                        }, 2500);
                    }
                },
                error: function(response) {
                    console.log(response);
                    $('.orderConfirmation').html('Cannot place order.');
                }
            });
        }
    });
});