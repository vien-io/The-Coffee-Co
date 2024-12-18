<?php
session_start(); // Start or resume the session

// Check if session variables are set
if (isset($_SESSION['user_id'])) {
    echo "Session is active.<br>";
    echo "User ID: " . $_SESSION['user_id'] . "<br>";
    echo "Username: " . $_SESSION['username'] . "<br>";
    echo "Email: " . $_SESSION['email'] . "<br>";
} else {
    echo "Session is not active or variables are not set.<br>";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe Amore</title>
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
            <a href="home.php">Home</a>
            <a href="product.php">Product</a>
            <a href="shop.php">Order</a>
            <button class="btnLogin-popup">Login</button>
            <!-- if logged in -->
            <button class="btnLogged" style="display: none;"><span class="username-placeholder"></span>
            </button>
        </nav>
    </header>



<!-- menu section starts here -->

<section class="menu" id="menu">
    <h1 class="headingP"> our <span>menu</span></h1>
    
<div class="menuGr">
    <h2 class="menu2">Cold Choices</h2>
    <div class="box-container">
        <div class="box">
            <img src="../images/iced-americano.png" alt="iced americano">
            <h3>Cofico <caps>Classic</caps> Americano</h3>
            <div class="price">₱115 <span class="strike">₱120</span></div>
        </div>

        <div class="box">
            <img src="../images/iced-cafelatte.png" alt="iced cafe latte">
            <h3>Cofico <caps>Smooth</caps> latte</h3>
            <div class="price">₱155 <span class="strike">₱160</span></div>
        </div>

        <div class="box">
            <img src="../images/iced-matchalatte.png" alt="iced matcha latte">
            <h3>Cofico <caps>mc</caps> matcha latte</h3>
            <div class="price">₱165 <span class="strike">₱170</span></div>
        </div>

        
    </div>
</div>
<div class="menuGr">
    <h2 class="menu2">Hot Choices</h2>
    <div class="box-container">
       

        <div class="box">
            <img src="../images/hot-americano.png" alt="hot americano">
            <h3>Cofico <caps>Classic</caps> americano</h3>
            <div class="price">₱110 <span class="strike">₱120</span></div>
        </div>

        <div class="box">
            <img src="../images/hot-cafelatte.png" alt="hot cafe latte">
            <h3>Cofico <caps>Smooth</caps> latte</h3>
            <div class="price">₱150 <span class="strike">₱160</span></div>
        </div>

        <div class="box">
            <img src="../images/hot-matchalatte.png" alt="hot matcha latte">
            <h3>Cofico <caps>mc</caps> matcha latte</h3>
            <div class="price">₱160 <span class="strike">₱170</span></div>
        </div>
    </div>
</div>

</div>
</section>

<!-- menu section ends here -->

    <section class="products" dark>
        <h2>Non-Coffee Based</h2>
       

        <div class="row">
            <div class="product-col-1">
                <img src="../images/pure_matcha.JPG" alt="">
                <div class="layer-1">
                    <h3><b>Cofico Pure Matcha</b> <br><br>
                        <i>Smooth and creamy green tea with steamed milk.</i>
                    </h3>
                </div>
            </div>
            <div class="product-col-2">
                <img src="../images/mint_chocolate.jpg" alt="">
                <div class="layer-2">
                    <h3><b>Cofico Mint Chocolate Bliss</b> <br><br>
                        <i>A refreshing blend of mint and chocolate with creamy milk.
                        </i>
                    </h3>
                </div>
            </div>
            <div class="product-col-3">
                <img src="../images/oreo_delight.JPG" alt="">
                <div class="layer-3">
                    <h3><b>Cofico Oreo Delight</b></b> <br><br>
                        <i>Crushed Oreo cookies blended with milk for a sweet treat.</i>
                    </h3>
                </div>
            </div>
            <div class="product-col-4">
                <img src="../images/strawberry_dream.JPG" alt="">
                <div class="layer-4">
                    <h3><b>Cofico Strawberry Dream</b> <br><br>
                        <i>A sweet, fruity blend of strawberry syrup and fresh milk.</i>
                    </h3>
                </div>
            </div>
            <div class="product-col-5" content>
                <img src="../images/premium_milo.jpg" alt="">
                <div class="layer-5">
                    <h3><b>Cofico Premium Milo</b> <br><br>
                        <i>A local chocolate drink inspired blended with milk for a premium taste.</i>
                    </h3>
                </div>
            </div>
            <div class="product-col-6">
                <img src="../images/sweet_banana.jpg" alt="">
                <div class="layer-6">
                    <h3><b>Cofico Sweet Banana </b> <br><br>
                        <i>A sweet but healthy drink blended with milk made just for you.</i>
                    </h3>
                </div>
            </div>
        </div>
    </section>

    <section class="cta">
        <h1> Sip the Symphony of Nature's Sweetest Harmony.</h1>
        <a href="shop.php" class="hero-btn">ORDER NOW</a>
    </section>


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
