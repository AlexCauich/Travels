<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require('db.php');
        // when form submitted, insert values the database.
        if(isset($_REQUEST['first_name'])) {
            //remove backslashes
            $first_name = stripslashes($_REQUEST['first_name']);
            //escapes special characters in a string
            $first_name = mysqli_real_escape_string($con, $first_name);

            $last_name = stripslashes($_REQUEST['last_name']);
            //escapes special characters in a string
            $last_name = mysqli_real_escape_string($con, $last_name);


            $email    = stripslashes($_REQUEST['email']);
            $email    = mysqli_real_escape_string($con, $email);
            
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($con, $password);

            $repead_password = stripslashes($_REQUEST['repead_password']);
            //escapes special characters in a string
            $repead_password = mysqli_real_escape_string($con, $repead_password);

            $password = md5($password);//encrypt the password before saving in the database


            $query = "INSERT INTO users(first_name, last_name, email, password, repead_password) VALUES('$first_name', '$last_name', '$email', '$password', '$password')";
            $result = mysqli_query($con, $query);

            if ($result) {
                echo "<div class='form'>
                      <h3>You are registered successfully.</h3><br/>
                      <p class='link'>Click here to <a href='login.php'>Login</a></p>
                      </div>";
            } else {
                echo "<div class='form'>
                      <h3>Required fields are missing.</h3><br/>
                      <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                      </div>";
            }
        } else {
    ?>
        <form class="form" action="" method="post">
            <h1 class="login-title">Registration</h1>
            <input type="text" class="login-input" name="first_name" placeholder="First name" required />
            <input type="text" class="login-input" name="last_name" placeholder="Last name" required />
            <input type="text" class="login-input" name="email" placeholder="Email Adress">
            <input type="password" class="login-input" name="password" placeholder="Password">
            <input type="password" class="login-input" name="repead_password" placeholder="Repead password">
            <input type="submit" name="submit" value="Register" class="login-button">
            <p class="link"><a href="login.php">Click to Login</a></p>
        </form>
    <?php
        }
    ?>
</body>
</html>