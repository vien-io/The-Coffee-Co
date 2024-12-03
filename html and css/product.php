<?php
session_start(); 

// check if user is logged in (session variable 'user_id' exists)
if (!isset($_SESSION['user_id'])) {
    // if not logged in, show login prompt or redirect to login page
    header('Location: login.php'); // or  echo an error message
    exit();
}

$user_id = $_SESSION['user_id']; // retrieve the user ID from session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BumbleBhiezz</title>
    <link rel="icon" type="image/x-icon" href="../images/LOGO.jpg">
    <link rel="stylesheet" href="product.css">
    <script defer src="app2.js"></script>
    <script defer src="home.js"></script>
    <script defer src="register_next.js"></script>
    <script defer src="login.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <header>
        <h2 class="logo"><img src="../images/ccc.png" class="logo" width="90" height="80"></h2>
        <h2 class="logo2"><img src="../images/cccc.png" class="logo" width="150" height="50"></h2>
        <nav class="navigation">
            <a href="home.html">Home</a>
            <a href="product.html">Product</a>
            <a href="shop.html">Order</a>
            <button class="btnLogin-popup">Login</button>
            <!-- if logged in -->
            <button class="btnLogged" style="display: inline-block;">
                <span class="username-placeholder"><?php echo $_SESSION['username']; ?></span>
            </button>
        </nav>
    </header>

    <!-- menu section starts here -->
    <section class="menu" id="menu">
        <h1 class="headingP"> our <span>menu</span></h1>
        <!-- Add your menu items here -->
    </section>

    <!-- Rest of the page content here -->

    <!-- footer section starts here -->
    <section class="footerr">
        <div class="share">
            <a href="home.html" class="fab fa-facebook-f"></a>
            <a href="home.html" class="fab fa-instagram"></a>
            <a href="home.html" class="fab fa-tiktok"></a>
        </div>

        <div class="links">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#menu">Menu</a>
            <a href="#gallery">Gallery</a>
            <a href="#review">Review</a>
        </div>

        <b><div class="credit">created by <span>The Coffee Co.</span> | all rights reserved</div></b>
    </section>
    <!-- footer section ends here -->

    <!-- wrapper -->
    <div class="wrapper">
        <!-- User info display (shown after login) -->
        <div class="user-info">
            <h2>Welcome, <span id="username"><?php echo $_SESSION['username']; ?></span>!</h2>
            <p>Email: <span id="email"><?php echo $_SESSION['email']; ?></span></p>
            <button id="logout-btn">Logout</button>
        </div>

        <!-- Close icon -->
        <span class="icon-close">
            <ion-icon name="close-outline"></ion-icon>
        </span>

        <!-- Login Form (if the user is not logged in) -->
        <div class="form-box login">
            <h2>Login</h2>
            <form action="login_next.php" method="POST">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
