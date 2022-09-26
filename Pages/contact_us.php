<?php
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
    <title>Contact Us</title>
    <link rel="shortcut icon" type="image/x-icon" href="../Media/favicon.png"/>
    <link href="../CSS/contact_us.css?v=100" media="screen,print" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="head">
        <nav class="nav">

            <!--Main Logo-->
            <div class="logo">
                <a href="homepage.php">
                    <img id="logoimg" title="D Blogging Site" src="/Media/Only_LOGO.png"/>
                </a>
            </div>

            <!--All Navigations-->
            <div class="navbtns">

                <!-- Search Button -->
                <!-- <div class="search">
                    <button class="searchbtn">Search</button>
                </div> -->

                <?php if(isset($_SESSION['signinemail'])): ?>

                <!-- Menu Button -->
                <div class="menu">
                    <button class="menubtn">Menu</button>

                    <!-- Menu Drop Down -->
                    <div class="menudrpdwn">
                        <a href="start_blog.php">New Blog!</a>
                        <!-- <a href="../Pages/settings.php">Settings</a> -->
                        <a href="help.php">Help</a>
                        <a href="contact_us.php">Contact Us</a>
                    </div>
                </div>

                <!-- User Button -->
                <div class="user">
                    <button class="userbtn">User</button>

                    <!-- User Drop Down -->
                    <div class="userdrpdwn">
                        <a href="profile.php">Profile</a>
                        <a>
                            <form action="homepage.php" method="POST">
                                    <input name="out" type="submit" value="Log Out">
                            </form>

                            <?php
                                if(isset($_POST['out']))
                                {
                                    session_destroy();
                                    header('location:../index.php');
                                }
                            ?>
                        </a>
                    </div>
                </div>


                <?php else: ?>
                    <!-- User Button -->
                    <div class="user">
                        <a href="/Pages/signin_signup.php">
                            <button class="userbtn">Sign In!</button>
                        </a>
                    </div>

                <?php endif; ?>

            </div>
            <div style="clear: both;"></div>
        </nav>
    </div>

    <!-- Contact us form -->
    <div class="headcu">
        
        <!-- Contact us background -->
        <div class="contact_us_bg">
            <img class="contact_us_img" src="../Media/contact_us_box.png">
        </div>

        <!-- Actual Form -->
        <div class="contact_us_form">                
            <form class="cu_form" action="contact_us.php" method="POST">

                <!-- Name -->
                <input id="form_name" type="text" name="name" placeholder="Name" size="15" maxlength="30" required/>

                <!-- Email -->
                <input id="form_subject" type="text" name="subject" placeholder="Subject" size="15" required/>

                <!-- Message Area -->
                <textarea id="form_message" name="message" placeholder="Your message..." rows="4" cols="19" required></textarea>

                <!-- Submit Button -->
                <input id="form_submit" type="submit" name="submit" value="Submit"/>
            </form>

            <?php
                if(isset($_POST['submit']))
                {
                    if(isset($_SESSION['signinemail']))
                    {
                        $CU_SUBJECT = $_POST['subject'];
                        $CU_MESSAGE = $_POST['message'];
                        $CU_NAME = $_POST['name'];
                        $CU_EMAIL = $_SESSION['signinemail'];

                        $RAND_STR = rand();
                        $RAND_ID = md5($RAND_STR);

                        $query = "select * from contact_us_messages WHERE id = '$RAND_ID'";
                        $query_run = mysqli_query($con,$query);

                        if(mysqli_num_rows($query_run)>0)
                        {
                            while(mysqli_num_rows($query_run)!=0)
                            {
                                $RAND_STR = rand();
                                $RAND_ID = md5($RAND_STR);

                                $query = "select * from blog_db WHERE link = '$RAND_ID'";
                                $query_run = mysqli_query($con,$query);
                            }
                            $CU_ID = $RAND_ID;
                        }
                        else
                        {
                            $CU_ID = $RAND_ID;
                        }

                        $query = "insert into contact_us_messages values('$CU_ID','$CU_NAME','$CU_EMAIL','$CU_SUBJECT','$CU_MESSAGE')";
                        $query_run = mysqli_query($con,$query);

                        if($query_run)
                        {
                            echo '<script type="text/javascript"> alert("Your message is sent. We will solve your problem under 12 hrs.") </script>';
                        }

                        else
                        {
                            echo '<script type="text/javascript"> alert("Error in sending message. Please retry.") </script>';
                        }
                    }

                    else
                    {
                        echo '<script type="text/javascript"> alert("You are not signed in. Please Sign In to send message.") </script>';
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>