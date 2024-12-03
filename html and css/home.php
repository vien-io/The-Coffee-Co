<?php
session_start();

// check if user is logged in
$isLoggedIn = isset($_SESSION['user_id']); // sssuming 'user_id' is stored in the session upon login
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe Amore</title>
    <link rel="icon" type="image/x-icon" href="../images/LOGO.jpg">
    <link rel="stylesheet" href="home.css">
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
        <a class="navlink" href="home.php">Home</a>
        <a class="navlink" href="product.php">Product</a>
        <a class="navlink" href="shop.php">Order</a>

        <?php if ($isLoggedIn): ?>
            <button class="btnLogged"><span class="username-placeholder"><?php echo $_SESSION['username']; ?></span></button>
        <?php else: ?>
            <button class="btnLogin-popup">Login</button>
        <?php endif; ?>
    </nav>
</header>

<div class="banner">
    <video autoplay loop muted>
        <source src="../images/coff.mp4" type="video/mp4">
    </video>
    <div class="content">
        <h1>The Coffee Co.</h1>
        <p><b>Welcome to The Coffee Co., where every sip tells a story! Nestled in the heart of the city...</b></p>
        <a href="register.php">See how</a>
    </div>
</div>

<section class="products-container">
    <h2 data-animate>Coffee Types</h2>
    <p data-animate>Discover the diverse world of coffee through our carefully selected coffee beans...</p>

    <div class="products">
        <div class="row" data-animate>
            <div class="product-col-1">
                <img src="../images/arabica.jpg" alt="honey classic">
                <div class="layer-1">
                    <h3>Arabica</h3>
                </div>
            </div>
            <div class="product-col-2">
                <img src="../images/robusta.png" alt="honey banana">
                <div class="layer-2">
                    <h3>Robusta</h3>
                </div>
            </div>
            <div class="product-col-3">
                <img src="../images/liberica.jpg" alt="strawberry honey">
                <div class="layer-3">
                    <h3>Liberica</h3>
                </div>
            </div>
            <div class="product-col-4">
                <img src="../images/bourbon.jpg" alt="strawberry honey">
                <div class="layer-4">
                    <h3>Bourbon</h3>
                </div>
            </div>
            <div class="product-col-5">
                <img src="../images/geisha.jpg" alt="strawberry honey">
                <div class="layer-5">
                    <h3>Geisha</h3>
                </div>
            </div>
            <div class="product-col-6">
                <img src="../images/excelsa.jpg" alt="strawberry honey">
                <div class="layer-6">
                    <h3>Excelsa</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta" data-animate>
    <h1>We offer both hot and cold coffee in a welcoming space.</h1>
    <a href="product.php" class="hero-btn">SHOP HERE</a>
</section>

<section class="about" id="about" dark>
    <h1 class="heading">about <span>us</span></h1>
    <div class="rowP">
        <div class="image">
            <img src="../images/bgP.jpg" alt="">
        </div>

        <div class="contentP">
            <h3>Our Company</h3>
            <p>At The Coffee Co., we’re not just about serving great coffee...</p>
            <a href="aboutme.php" class="btnP">Learn more</a>
        </div>
    </div>
</section>

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

<!-- Wrapper for login and registration forms -->
<div class="wrapper">
    <!-- User info display (shown after login) -->
    <?php if ($isLoggedIn): ?>
    <div class="user-info">
        <h2>Welcome, <span id="username"><?php echo $_SESSION['username']; ?></span>!</h2>
        <p>Email: <span id="email"><?php echo $_SESSION['email']; ?></span></p>
        <a href="logout.php" id="logout-btn">Logout</a>
    </div>
    <?php endif; ?>

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
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <input type="password" name="password" required>
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
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
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
            <div class="remember-forgot">
                <label><input type="checkbox" required> I agree to the terms and conditions</label>
            </div>
            <button type="submit" class="
