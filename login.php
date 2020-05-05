<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="assets/css/main.css"/>

</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['first_name'])) {
        $first_name = stripslashes($_REQUEST['first_name']);    // removes backslashes
        $first_name = mysqli_real_escape_string($con, $first_name);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $password_encript = md5($password);

        $query = "SELECT * FROM users WHERE first_name = '$first_name' AND password='$password_encript' ";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['first_name'] = $first_name;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
    ?>
<!-- Header -->
            <header id="header">
                <div class="logo"><span><p>Login</p></span></a></div>
				<a href="#menu">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="registration.php">Sign Up</a></li>
				</ul>
			</nav>

		<!-- One -->
			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<p>Sed amet nulla</p>
						<h2>Login</h2>
					</header>
				</div>
			</section>


        <form class="form" method="post" name="login">
            <h1 class="login-title">Login</h1>
            <div class="form-group">
                <label>User name</label>
                <input type="text" class="login-input" name="first_name" placeholder="First name" autofocus="true"/>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="login-input" name="password" placeholder="Password"/>
            </div>
            <input type="submit" value="Login" name="submit" class="lgbtn"/>
        </form>
<?php
    }
?>

            <!-- Footer -->
            <footer id="footer">
				<div class="container">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
					</ul>
				</div>
				<div class="copyright">
					&copy; Untitled. All rights reserved.
				</div>
			</footer>
		<!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

    </body>
</html>