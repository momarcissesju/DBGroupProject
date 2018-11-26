<!DOCTYPE html>
<html>
    <head>
        <?php 
            session_start();
            require_once('includes/head.php');
            if(isset($_GET['listingID'])) {
                echo '<script> var listingID = '.$_GET['listingID'].';</script>';
            }
        ?>
        <link type="text/css" rel="stylesheet" href="includes/css/main.css" />
        <script type="text/javascript" src="controller/checkout.js"></script>
        <script type="text/javascript" src="includes/javascript/helperFunctions.js"></script>
    </head>

    <body>
        <?php require_once('includes/navbar.php'); ?>

        <div class="content checkout">
            <h3 style="margin: 15px 0;">Product Information:</h3>
            <img src="" alt="" id="productAsset"> <span id="productTitle"><i class="fas fa-circle-notch fa-spin"></i></span>
            <h3 style="margin-top: 15px;">Shipping Information:</h3>
            <form>
                <h5 style="font-size: 12px;">Recipient Name</h5>
                <div class="form-row">
                    <div class="form-group">
                        <input type="email" class="form-control" id="firstName" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="lastName" placeholder="Last Name">
                    </div>
                </div>
                <h5 style="font-size: 12px;">Recipient Address</h5>
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" class="form-control" id="address" placeholder="1234 Main St">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="address2" placeholder="Apartment, studio, or floor">
                    </div>
                </div>
                <div class="form-row ">
                    <div class="form-group">
                        <input type="text" class="form-control" id="city" placeholder="Philadelphia">
                    </div>
                    <div class="form-group">
                        <select id="state" class="form-control">
                            <option selected>Select State...</option>
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="DC">District Of Columbia</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="zip" placeholder="19131">
                    </div>
                </div>
                <div class="summary">
                    <div class="shipping">
                        <p>Shipping Cost: </p> <span>$0.00</span>
                    </div>
                    <hr>
                    <div class="itemPrice">
                        	<p>Item Price: </p> <span>$0.00</span>
                    </div>
                    <hr>
                    <div class="total">
                        <p>Total: </p> <span>$0.00</span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary orderConfirmation">Confirm Order</button>
            </form>
        </div>
    </body>
</html>