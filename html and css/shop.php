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
                <button class="btnLogged"><span class="username-placeholder"><?= $username ?></span></button>
                <a href="logout.php"><button class="btnLogout">Logout</button></a>
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
            <p><b>Welcome to The Coffee Co., where every sip tells a story! Kung ang kape ay buhay, ikaw yung asukal—wala ka palagi, kaya ang pait!</b></p>
            <a href="register.php">See how</a>
        </div>
    </div>

    <section class="products-container">
        <h2 data-animate>Coffee Types</h2>
        <p data-animate>Discover the diverse world of coffee through our carefully selected coffee beans...</p>
        <div class="products">
            <div class="row" data-animate>
                <div class="product-col-1">
                    <img src="../images/arabica.jpg" alt="Arabica">
                    <div class="layer-1">
                        <h3>Arabica</h3>
                    </div>
                </div>
                <div class="product-col-2">
                    <img src="../images/robusta.png" alt="Robusta">
                    <div class="layer-2">
                        <h3>Robusta</h3>
                    </div>
                </div>
                <!-- More product columns here... -->
            </div>
        </div>
    </section>

    <section class="cta" data-animate>
        <h1> We offer both hot and cold coffee in a welcoming space.</h1>
        <a href="product.php" class="hero-btn">SHOP HERE</a>
    </section>

    <section class="about" id="about" dark>
        <h1 class="heading"> about <span>us</span></h1>
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
       
