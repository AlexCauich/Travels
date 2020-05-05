<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
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


    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header text-center"><h2>Login</h2></div>
                <div class="card-body">
                    <form method="post" name="login" class="form">
                        <div class="form-group">
                            <label>User name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="First name" autofocus="true" required/>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required/>
                        </div>
                        <input type="submit" value="Login" name="submit" class="btn btn-primary btn-block"/>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <div class="form-group">
                        <a href="registration.php">Sign In</a>
                    </div>
                    <div class="form-group">
                        <a href="index.html">Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    }
?>

		<!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

    </body>
</html>