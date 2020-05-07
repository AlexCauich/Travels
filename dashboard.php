<?php
include("auth_session.php");
?>
<!DOCTYPE HTML>
<!--
	Hielo by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Hielo by TEMPLATED</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/styles.css" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="logo"><span><p>Hey, <?php echo $_SESSION['first_name']; ?>!</p></span></a></div>
				<a href="#menu">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a><?php echo $_SESSION['first_name'] ?></a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>

		<!-- One -->
			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<p>Sed amet nulla</p>
						<h2>Elements</h2>
					</header>
				</div>
			</section>

		<!-- Main -->
			<div class="main-container">
				<div class="news-cards">
					<div class="card">
						<div class="card-header">Hola mundo</div>
						<div class="card-body">
							<img src="https://images.pexels.com/photos/747964/pexels-photo-747964.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="img"/>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam debitis cupiditate enim?</p>
						</div>
						<div class="card-footer">
							<i class="far fa-heart"></i>
						</div>
					</div>
					<div class="card">
						<div class="card-header">Hola mundo</div>
						<div class="card-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod nam aperiam incidunt recusandae soluta odit possimus facere placeat sed ducimus mollitia, eveniet asperiores nostrum ipsam. Et quibusdam aliquam odit velit.</div>
					</div>
					<div class="card">
						<div class="card-header">Hola mundo</div>
						<div class="card-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod nam aperiam incidunt recusandae soluta odit possimus facere placeat sed ducimus mollitia, eveniet asperiores nostrum ipsam. Et quibusdam aliquam odit velit.</div>
					</div>
					<div class="card">
						<div class="card-header">Hola mundo</div>
						<div class="card-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod nam aperiam incidunt recusandae soluta odit possimus facere placeat sed ducimus mollitia, eveniet asperiores nostrum ipsam. Et quibusdam aliquam odit velit.</div>
					</div>
				</div>
			</div>
            
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