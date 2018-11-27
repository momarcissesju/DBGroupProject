<script>
    $(document).ready(function() {
        $('#searchBar').on('submit', function(e) {
            e.preventDefault();
            window.location.href = 'search/' + $('#searchInput').val();
        });

        checkNotifications();
    });

    function viewed() {
        $('#snackbar').fadeOut();
        $.ajax({
            url: 'model/viewedNotifications.php',
            type: 'POST',
            success: function(response) {
                console.log(response);
                if(response != 'good') {
                    viewed();
                }
            }
        });
    }

    function checkNotifications() {
        $.ajax({
            url: 'model/getNotifications.php',
            type: 'POST',
            success: function(response) {
                if(!isEmpty(response) && !isBlank(response)) {
                    $('#snackbar').html(response);
                    showSnackbar();
                    setTimeout(() => {
                        checkNotifications();
                    }, 60000);
                }
                console.log(response);
            }
        });
    }

    function showSnackbar() {
        // Get the snackbar DIV
        var x = document.getElementById("snackbar");

        // Add the "show" class to DIV
        x.className = "show";

        // After 3 seconds, remove the show class from DIV
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 8000);
    }
</script>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="home"><img src="includes/assets/logo.png" alt="LOGO" style="width: 70px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse sticky-top" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <form class="form-inline my-2 my-lg-0" id="searchBar">
        <input class="form-control mr-sm-2" id="searchInput" type="search" placeholder="What are you looking for?" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        <ul class="navbar-nav mr-auto">
        </ul>
    </form>
    </ul>

    <ul class="navbar-nav">
        <?php
            if(!isset($_SESSION['userID'])) {
                echo '<li class="nav-item">
                <a class="nav-link" href="signup">SIGN UP</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login">LOGIN</a>
            </li>';
            } else {
                if($_SESSION['type'] == 'seller') {
                    echo '<li class="nav-item">
                        <a class="nav-link" href="sell">Sell Now</a>
                    </li>';
                }
            }
        ?>
    </ul>

    <?php
        if(isset($_SESSION['userID'])) {
            echo '
            <ul class="nav"><li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><img src="includes/assets/man-user.png" alt="Profile Picture" style="height: 50px; border: 1px solid #004d99; border-radius: 50px; background: #fff;"></a>
            <div class="dropdown-menu">
            <a class="dropdown-item" href="#">PROFILE</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout">LOGOUT</a>
            </div>
          </li>
            </ul>';
        }
    ?>
  </div>
</nav>

<!-- The actual snackbar -->
<div id="snackbar"></div>