<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/css/main.css"/>
</head>
<body>

    <?php 
        require('db.php');

        $first_name = "";
        $email = "";
        $errors = array();

        // Register user

        if(isset($_POST['reg_user'])) {
            // receive all input values from  the form 
            $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
            $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, $_POST['password']);
            $repead_password = mysqli_real_escape_string($con, $_POST['repead_password']);

            // form validation: ensure that the form is conrrently filled
            // by adding (array_push()) corresponding error unto $errors array

                    
                    if($password != $repead_password) {
                        echo "<div class='form'>
                        <h3>The two passwords do not match.</h3><br/>
                        <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                        </div>";
        
                    }
        
        

            // first check the database to make sure
            // a user does not already exists with the same username and/or email
            $user_check_query = "SELECT * FROM users WHERE first_name='$first_name' OR email='$email' LIMIT 1";
            $result = mysqli_query($con, $user_check_query);
            $user = mysqli_fetch_assoc($result);
            
            if ($user) { // if user exists
              if ($user['first_name'] === $first_name) {
                array_push($errors, "Username already exists");
              }
          
              if ($user['email'] === $email) {
                array_push($errors, "email already exists");
              }
            }
          
            // Finally, register user if there are no errors in the form
            if (count($errors) == 0) {
                $password = md5($password);//encrypt the password before saving in the database
          
                $query = "INSERT INTO users(first_name, last_name, email, password, repead_password) VALUES('$first_name', '$last_name', '$email', '$password', '$password')";
                mysqli_query($con, $query);
                header('location: login.php');
            }else {
                echo "<div class='form'>
                      <h3>Account already exists.</h3><br/>
                      <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                      </div>";
            }
          
        } else {
    ?>

    <!-- Header -->
        <header id="header">
            <div class="logo"><span><p>Sign In</p></span></a></div>
            <a href="#menu">Menu</a>
        </header>

    <!-- Nav -->
        <nav id="menu">
            <ul class="links">
                <li><a href="index.html">Home</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>

    <!-- One -->
        <section id="One" class="wrapper style3">
            <div class="inner">
                <header class="align-center">
                    <p>Get everything you set your mind to</p>
                    <h2>Sign In</h2>
                </header>
            </div>
        </section>

    
        <form class="form" action="" method="post">
            <div class="form-group">
                <label>User name</label>
                <input type="text" class="login-input" name="first_name" placeholder="First name" required />
            </div>
            <div class="form-group">
                <label>Last name</label>
                <input type="text" class="login-input" name="last_name" placeholder="Last name" required />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="login-input" name="email" placeholder="Email Adress" required/>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="login-input" name="password" placeholder="Password" required/>
            </div>
            <div class="form-group">
                <label>Repead password</label>
                <input type="password" class="login-input" name="repead_password" placeholder="Repead password"required/>
            </div>
            <input type="submit" name="reg_user" value="Register" class="lgbtn">
        </form>
        <?php } ?>

        		<!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.scrollex.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <script src="assets/js/main.js"></script>

</body>
</html>