<!DOCTYPE html>
<html>
    <head>
        <?php 
            session_start();
            require_once('includes/head.php'); 
        ?>
        <script type="text/javascript" src="controller/sell.js"></script>
        <link type="text/css" rel="stylesheet" href="includes/css/main.css" />
        <script type="text/javascript" src="includes/javascript/helperFunctions.js"></script>
    </head>

    <body>
        <?php require_once('includes/navbar.php'); ?>

        <div class="content content-sell">
            <h1>Listing Form</h1>
            <input type="search" id="search_item" placeholder="What do you want to sell?"/>
            <div class="search_item-results">
                
            </div>

            <div class="input-group mb-3 item_price">
                <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                </div>
                <input id="item_price-input" type="text" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Enter Price">
                <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                </div>
            </div>

            <button class="sell-now-btn">SELL NOW</button>
        </div>
    </body>
</html>