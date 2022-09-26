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
    <title>Home Page</title>
    <link rel="shortcut icon" type="image/x-icon" href="../Media/favicon.png"/>
    <link href="../CSS/homepage.css?v=100" media="screen,print" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="head">
        <nav class="nav">

            <!--Main Logo-->
            <div class="logo">
                <a href="homepage.php">
                    <img id="logoimg" title="D Blogging Site" src="/Media/LOGO.png"/>
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

    <!-- Middle Welcome Text -->
    <div class="greetings">
        <div class="welcomenote">
            <p id="greet">Welcome</p>
            <p id="mainline">
                <?php
                    echo $_SESSION['name'];
                ?>
            </p>
            <p id="subline">glad you made it!!</p>
        </div>
    </div>

    <?php
        $ADMIN = 'ADMIN_USERNAME';

        if($ADMIN == $_SESSION['signinemail'])
        {?>
            <div class="homepagebtns">
                <a href="start_blog.php">
                    <div class="homepageblog">
                        New Blog!
                    </div>
                </a>
                
                <a href="messages.php">
                    <div class="homepagemessages">
                        Messages
                    </div>
                </a>

                <a href="profile.php">
                    <div class="homepageprofile">
                        Your Profile
                    </div>
                </a>
            </div>
    <?php
        }
        else
        {?>
            <div class="homepagebtns2">
                <a href="start_blog.php">
                    <div class="homepageblog2">
                        New Blog!
                    </div>
                </a>

                <a href="profile.php">
                    <div class="homepageprofile2">
                        Your Profile
                    </div>
                </a>
                <div style="clear: both;"></div>
            </div>
    <?php
        }?>
</body>
</html>
