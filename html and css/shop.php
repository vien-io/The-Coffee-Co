<?php
session_start(); // Start the session to hold user data

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['user_id']);
$username = $isLoggedIn ? $_SESSION['username'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="icon" type="image/x-icon" href="../images/LOGO.jpg">
    <link rel="stylesheet" href="shop.css">
    <script defer src="register_next.js"></script>
    <script defer src="login.js"></script>
    <script src="https://kit.fontawesome.com/92d70a2fd8.js" crossorigin="anonymous"></script>

</head>
<body>
    <header>
        <h2 class="logo"><img src="../images/ccc.png" class="logo" width="90" height="80"></h2>
        <h2 class="logo2"><img src="../images/cccc.png" class="logo" width="150" height="50"></h2>
        <nav class="navigation">
            <a href="home.php">Home</a>
            <a href="product.php">Product</a>
             <a href="shop.php">Order</a>
            <button class="btnLogin-popup">Login</button>
            <!-- if logged in -->
            <button class="btnLogged" style="display: none;"><span class="username-placeholder"></span>
            </button>
        </nav>
    </header>

    <div class="content" scrolled>
        <div class="container">
            <div id="root"></div>
            <div class="sidebar">
            
                <div class="head">
                    <p>My Cart</p>
                    <div class="cart"><i class="fa-solid fa-cart-shopping"></i>
                    <p id="count">0</p>
                    </div>
                </div>
                <button name="submit" type="submit" onclick="proceedToCheckout()">Checkout</button>
                <div id="cartItem">Your cart is empty</div>
                <div class="foot">
                    <h3>Total</h3>
                    <h2 id="total">$ 0.00</h2>
                </div>
            </div>
        </div>
    </div>
    
    <script src="shop.js"></script>





       <!-- footer section starts here -->

<section class="footerr">

    <div class="share">
        <a href="home.php" class="fab fa-facebook-f"></a>
        <a href="home.php" class="fab fa-instagram"></a>
        <a href="home.php" class="fab fa-tiktok"></a>
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
        <!-- User data will be displayed here after successful login -->
        <h2>Welcome, <span id="username">[Username]</span>!</h2>
        <p>Email: <span id="email">[Email]</span></p>
        <button id="logout-btn">Logout</button>
    </div>

    <!-- Close icon -->
    <span class="icon-close">
        <ion-icon name="close-outline"></ion-icon>
    </span>

    <!-- Login Form -->
    <div class="form-box login">
        <h2>Login</h2>
        <form action="login_next.php" method="POST">
            <div class="input-box">
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                <input type="email" required>
                <label>Email</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <input type="password" required>
                <label>Password</label>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox"> Remember me</label>
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="login-register">
                <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
            </div>
        </form>
    </div>

    <!-- Registration Form -->
    <div class="form-box register">
        <h2>Registration</h2>
        <form action="register_next.php" method="POST">
            <div class="input-box">
                <span class="icon"><ion-icon name="person"></ion-icon></span>
                <input type="text" name="username">
                <label>Username</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                <input type="email" name="email">
                <label>Email</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <input type="password" name="password">
                <label>Password</label>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox" required> I agree to the terms and conditions</label>
            </div>
            <button type="submit" class="btn">Register</button>
            <div class="login-register">
                <p>Already have an account? <a href="#" class="login-link">Login</a></p>
            </div>
        </form>
    </div>
</div>

</body>
</html>