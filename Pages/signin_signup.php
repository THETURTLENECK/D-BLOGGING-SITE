<?php
    ob_start();
    session_start();
    require '../Database/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta title="D Blogging Site">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Can Change -->
    <title>Sign In/Sign Up</title>
    <link rel="shortcut icon" type="image/x-icon" href="../Media/favicon.png"/>
    <link href="../CSS/signin_signup.css?v=100" media="screen,print" rel="stylesheet" type="text/css">
    <script src="../JS/jquery.js?v=4"></script>
</head>

<body>
    <div class="head">
        <nav class="nav">

            <!--Main Logo-->
            <div class="logo">
                <a>
                    <img id="logoimg" title="D Blogging Site" src="/Media/Only_LOGO.png"/>
                </a>
            </div>

            <!--All Navigations-->
            <div class="navbtns">

                <!-- Search Button -->
                <!-- <div class="search">
                    <button class="searchbtn">Search</button>
                </div> -->

                <!-- Menu Button -->
                <!-- <div class="menu">
                    <button class="menubtn">Menu</button> -->

                    <!-- Menu Drop Down -->
                    <!-- <div class="menudrpdwn">
                        <a href="../Pages/start_blog.php">New Blog!</a>
                        <a href="../Pages/settings.php">Settings</a>
                        <a href="../Pages/help.php">Help</a>
                        <a href="../Pages/contact_us.php">Contact Us</a>
                    </div>
                </div> -->

                <!-- User Button -->
                <div class="user">
                    <a href="/Pages/signin_signup.php">
                        <button class="userbtn">Sign In!</button>
                    </a>
                    <!-- User Drop Down -->
                    <!-- <div class="userdrpdwn">
                        <a href="../Pages/profile.php">Profile</a>
                        <a href="../Pages/signin_signup.php">Sign In!</a>
                    </div> -->
                </div>
            </div>
            <div style="clear: both;"></div>
        </nav>
    </div>

    <!-- ███████ ██  ██████  ███    ██     ██ ███    ██     ██████  ██ ██    ██ ██ ███████ ██  ██████  ███    ██ 
         ██      ██ ██       ████   ██     ██ ████   ██     ██   ██ ██ ██    ██ ██ ██      ██ ██    ██ ████   ██ 
         ███████ ██ ██   ███ ██ ██  ██     ██ ██ ██  ██     ██   ██ ██ ██    ██ ██ ███████ ██ ██    ██ ██ ██  ██ 
              ██ ██ ██    ██ ██  ██ ██     ██ ██  ██ ██     ██   ██ ██  ██  ██  ██      ██ ██ ██    ██ ██  ██ ██ 
         ███████ ██  ██████  ██   ████     ██ ██   ████     ██████  ██   ████   ██ ███████ ██  ██████  ██   ████ -->
                                                                                                        
    <div class="sign_in" id="SIGNIN">

        <!-- Sign in bg image -->
        <div class="sign_in_bg">
            <img id="sign_in_img" src="../Media/sign_in_bg.png">
        </div>

        <!-- Sign in -->
        <div class="sign_in_details">

            <!-- Sign in heading -->
            <div class="sign_in_head">
                <p>Sign in to DBS</p>
            </div>

            <!-- Sign in form -->
            <div class="sign_in_form">
                <form class="signin_form" action="signin_signup.php" method="POST">

                    <!-- Email -->
                    <input id="sign_in_email" type="email" name="signinemail" placeholder="E-Mail" size="20" required>

                    <!-- Password -->
                    <input id="sign_in_password" type="password" name="signinpassword" placeholder="Password" size="20" maxlength="20" required>

                    <!-- Forgot Password -->
                    <a href="#" id="sign_in_for_pass">Forgot password</a>

                    <!-- sign in button -->
                    <input id="sign_in_submit" type="submit" name="signinbtn" value="Sign In">
                </form>

                <!-- PHP -->
                <?php
                    if(isset($_POST['signinbtn']))
                    {
                        $username = $_POST['signinemail'];
                        $password = $_POST['signinpassword'];

                        $query = "select * from user_accounts WHERE email = '$username' AND password = '$password'";
                        $query_run = mysqli_query($con,$query);
                        $name = mysqli_fetch_assoc($query_run);

                        if(mysqli_num_rows($query_run)>0)
                        {
                            $_SESSION['name'] = $name['name'];
                            $_SESSION['signinemail'] = $username;
                            header('location:homepage.php');
                            ob_end_flush();
                        }
                        else
                        {
                            echo '<script type="text/javascript"> alert("Invalid credentials!!") </script>';
                        }
                    }
                ?>
            </div>
        </div>

        <!-- sign up option -->
        <div class="sign_up_opt">

            <!-- Sign up option text -->
            <div class="sign_up_opt_text">
                <p id="sign_up_opt_text_head">Hello, Friend!</p>
                <p id="sign_up_opt_text_sub">Enter your details and start your journey with us.</p>
            </div>

            <!-- Sign up page button -->
            <div class="sign_up_page_btn">
                <button id="sign_up_opt_btn">
                    Sign Up
                </button>
            </div>
        </div>
    </div>
    
    <!-- ███████ ██  ██████  ███    ██     ██    ██ ██████      ██████  ██ ██    ██ ██ ███████ ██  ██████  ███    ██ 
         ██      ██ ██       ████   ██     ██    ██ ██   ██     ██   ██ ██ ██    ██ ██ ██      ██ ██    ██ ████   ██ 
         ███████ ██ ██   ███ ██ ██  ██     ██    ██ ██████      ██   ██ ██ ██    ██ ██ ███████ ██ ██    ██ ██ ██  ██ 
              ██ ██ ██    ██ ██  ██ ██     ██    ██ ██          ██   ██ ██  ██  ██  ██      ██ ██ ██    ██ ██  ██ ██ 
         ███████ ██  ██████  ██   ████      ██████  ██          ██████  ██   ████   ██ ███████ ██  ██████  ██   ████ -->

    <div class="sign_up" id="SIGNUP">

        <!-- Sign up bg image -->
        <div class="sign_up_bg">
            <img id="sign_up_img" src="../Media/sign_up_bg.png">
        </div>

        <!-- sign in option -->
        <div class="sign_in_opt">

            <!-- Sign in option text -->
            <div class="sign_in_opt_text">
                <p id="sign_in_opt_text_head">Welcome Back!</p>
                <p id="sign_in_opt_text_sub">To keep connected with us please login with your personal details.</p>
            </div>

            <!-- Sign in page button -->
            <div class="sign_in_page_btn">
                <button id="sign_in_opt_btn">
                    Sign In
                </button>
            </div>
        </div>

        <!-- Sign up -->
        <div class="sign_up_details">

            <!-- Sign up heading -->
            <div class="sign_up_head">
                <p>Create Account</p>
            </div>

            <!-- Sign up form -->
            <div class="sign_up_form">
                <form class="signup_form" action="signin_signup.php" method="POST">

                    <!-- Name -->
                    <input id="sign_up_name" type="text" name="signupname" placeholder="Name" size="20" maxlength="30" required>

                    <!-- Email -->
                    <input id="sign_up_email" type="email" name="signupemail" placeholder="E-Mail" size="20" required>

                    <!-- Password -->
                    <input id="sign_up_password" type="password" name="signuppassword" placeholder="Password" size="20" maxlength="20" minlength="8" required>

                    <!-- sign in button -->
                    <input id="sign_up_submit" type="submit" name="signupbtn" value="Sign Up">
                </form>

                <!-- PHP -->
                <?php
                    if(isset($_POST['signupbtn']))
                    {
                        $name = $_POST['signupname'];
                        $email = $_POST['signupemail'];
                        $password = $_POST['signuppassword'];

                        $query = "select * from user_accounts WHERE email = '$email'";

                        $query_run = mysqli_query($con,$query);

                        if(mysqli_num_rows($query_run)>0)
                        {
                            echo '<script type="text/javascript"> alert("User already exixts!! Try another email or login.") </script>';
                        }
                        else
                        {
                            $query = "insert into user_accounts values('$name','$email','$password')";
                            $query_run = mysqli_query($con,$query);

                            if($query_run)
                            {
                                echo '<script type="text/javascript"> alert("You are signed up. This page will redirect you to the Sign In page.") </script>';
                            }
                            else
                            {
                                echo '<script type="text/javascript"> alert("Error in Sign Up!! Please retry.") </script>';
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- Sign in/ Sign up switch -->
    <script type="text/javascript" src="../JS/sign_in_sign_up.js?v=3"></script>
    <!-- <script type="text/javascript" src="../JS/alert.js?v=1"></script> -->
</body>
</html>
