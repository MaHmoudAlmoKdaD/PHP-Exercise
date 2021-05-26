<?php 


// variables for registration form
$full_name_error        = '';
$user_name_error        = '';
$password_name_error    = '';
$confirm_password_error = '';
$email_error            = '';
$phone_error            = '';
$dob_error              = '';
$soc_sec_error          = '';

// variables for log-in form
$login_error            = '';
$login_username_error   = '';
$login_password_error   = '';

// array for test log-in form
$info = array('username' => 'mahmoud', 'password' => '12345678');

function lenght_of_password($pass){
    $minimum_length_of_password = 8;
    return strlen($pass) < $minimum_length_of_password;
}


// if the user used the registration from will use this block under if statement
// otherwise it used log-in from in block under else statement
if(isset($_POST['register-submit'])){

    // validation for Registration form 
    if(empty($_POST['full_name'])){
        $full_name_error =  "Ops you forgot fill your full name";
    }
    if(empty($_POST['s_user_name'])){
        $user_name_error =  "Ops you forgot fill your user name";
    }
    if(empty($_POST['s_password'])){
        $password_name_error =  "Ops you forgot fill your Password";
    }
    if(!empty($_POST['s_password'])){
        $password = $_POST['s_password'];
        if(lenght_of_password($password)){
            $password_name_error =  "Must be at least 8 characters";
        }
    }
    if(empty($_POST['confirm_password'])){
        $confirm_password_error =  "Ops you forgot confirm your Password";
    }
    if(!empty($_POST['confirm_password'])){
        if($_POST['confirm_password'] !== $_POST['s_password']){
            $confirm_password_error = "Must be similar to above password";
        }
    }
    if(empty($_POST['email'])){
        $email_error =  ", Fill this field";
    }
    if(!empty($_POST['email'])){
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        $email_error =  "Unvalid email";
    }
    if(empty($_POST['phone'])){
        $phone_error =  "Ops you forgot fill your number phone";
    }
    if(empty($_POST['date_of_birth'])){
        $dob_error =  "Ops you forgot fill your date of birth";
    }
    if(empty($_POST['social_security_number'])){
        $soc_sec_error =  "Ops you forgot fill your social security number";
    }
    if($full_name_error         == '' &&
        $user_name_error        =='' &&
        $password_name_error    == '' &&
        $confirm_password_error == '' &&
        $email_error            == '' &&
        $phone_error            == '' &&
        $dob_error              == '' &&
        $soc_sec_error == '' ){
            session_start();
            $_SESSION['fullname'] = $_POST['full_name'];
            $_SESSION['username'] = $_POST['s_user_name'];
            $_SESSION['email']    =    $_POST['email'];
            $_SESSION['phone']    =    $_POST['phone'];
            $_SESSION['dob']      =    $_POST['date_of_birth'];
            $_SESSION['scn']      =    $_POST['social_security_number'];
            header("Location: safe.php");
            exit();
    }
}
else{
    # Validation for log-in from 
    if(isset($_POST['login-submit'])){
        if(empty($_POST['l_user_name'])){
            $login_username_error  =  "Ops you forgot fill your user name";
        }
        if(empty($_POST['l_password'])){
            $login_password_error  =  "Ops you forgot fill your Password";
        }
        if(!empty($_POST['l_user_name']) && !empty($_POST['l_password'])){
            if(    $_POST['l_user_name'] === $info['username'] &&
                    $_POST['l_password'] === $info['password']){
                
                        session_start();
                        $_SESSION['username'] = $_POST['l_user_name'];
                header("Location: safe.php");

            }
            else{
                $login_error = "Unvelid user name or password";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Sign In</title>
</head>
<body>
    <div class="container">
        <header>
            <div class="welcome">
                <h1>Welcome!</h1>
            </div>
        </header>
        <section class="forms">
            <div class="register-form">
                <div class="welcome-form">
                    <h5 class="phone-style "> To log-in,Plaese click <b> <i> <a href="#loging-form"> here</a></i></b></h5>
                    <h3>Is This The First Time In Our Site!!</h3>
                    <p>Please, register to see the best of our offer</p>
                </div>
                <form  action="home.php" method="POST">
                    <input  type="text" name="full_name" placeholder="Full Name"><br>
                    <span class="erorr"><?php  echo $full_name_error; ?></span><br>
                    <input  type="text" name="s_user_name" placeholder="user Name"><br>
                    <span class="erorr"><?php  echo $user_name_error; ?></span><br>
                    <input  type="password" name="s_password" placeholder="Password" min=8><br>
                    <span class="erorr"><?php  echo $password_name_error; ?></span><br>
                    <input  type="password" name="confirm_password" placeholder="Confirm Password"><br>
                    <span class="erorr"><?php  echo $confirm_password_error; ?></span><br>
                    <input  type="text" name="email" placeholder="EX: username@gmail.com"><br>
                    <span class="erorr"><?php  echo $email_error; ?></span><br>
                    <input  type="number" name="phone" placeholder="phone"><br>
                    <span class="erorr"><?php  echo $phone_error; ?></span><br>
                    <input  type="date" name="date_of_birth" placeholder="Date Of Birth"><br>
                    <span class="erorr"><?php  echo $dob_error; ?></span><br>
                    <input  type="text" name="social_security_number" placeholder="Social Security Name"><br>
                    <span class="erorr"><?php  echo $soc_sec_error; ?></span><br>
                    <input  type="submit" name="register-submit" value="Sign in">
                </form>
            </div>
            <div class="log-in-form">
                <div class="welcome-form">
                    <h3>You Are Already From Our Family!!</h3>
                    <p>Please, Log in</p>
                </div>
                <span class="erorr"><?php  echo $login_error; ?></span><br>
                <form  action="home.php" method="POST" id="loging-form">
                    <input class="text" type="text" name="l_user_name" placeholder="User Name"><br>
                    <span class="erorr"><?php  echo $login_username_error; ?></span><br>
                    <input  type="password" name="l_password" placeholder="Password" data-password='password'><br>
                    <span class="erorr"><?php  echo $login_password_error; ?></span><br>
                    <input type="submit" name="login-submit" value="Log in">
                </form>
            </div>
        </section>
    </div>
</body>
</html>