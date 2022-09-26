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
    <title>Help</title>
    <link rel="shortcut icon" type="image/x-icon" href="../Media/favicon.png"/>
    <link href="../CSS/help.css?v=100" media="screen,print" rel="stylesheet" type="text/css">
    <script src="../JS/jquery.js?v=2"></script>
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

    <!-- Help -->
    <div class="psudo_head_help">
        <div class="head_help">

            <!-- Main help title -->
            <div class="help_heading">
                <p id="help_head">
                    Help
                </p>
            </div>

            <!-- Help topics -->
            <div class="help_topics">

                <!-- Help topic 1 -->
                <div class="topics">

                    <!-- 1 topic heading -->
                    <div class="left_head">
                        <p class="left">
                            How to start writing blogs?
                        </p>
                    </div>
                    <div class="right_head">
                        <p class="right right1">
                            +
                        </p>
                    </div>
                    <div style="clear: both;"></div>

                    <!-- 1 info -->
                    <div class="tinfo_head tinfo_head1">
                        <hr/>

                        <p class="tinfo">
                            It's a simple two step process. First hover over <span id="block_keywords">User</span> button
                            on the top right side of the screen, then click on <span id="block_keywords">Sign In</span> button
                            in the appeared dropdown menu and, then on the sign in page click on the
                            <span id="block_keywords">Sign Up</span> button and just complete the sign up. Second hover over menu
                            button on the top of the page and click on <span id="block_keywords">New Blog!</span> button and you are
                            good to go.
                         </p>
                    </div>
                </div>

                <!-- Help topic 2 -->
                <div class="topics">

                    <!-- 2 topic heading -->
                    <div class="left_head">
                        <p class="left">
                            Is there any subscription or any publication charges?
                        </p>
                    </div>
                    <div class="right_head">
                        <p class="right2">
                            +
                        </p>
                    </div>
                    <div style="clear: both;"></div>

                    <!-- 2 info -->
                    <div class="tinfo_head tinfo_head2">
                        <hr/>

                        <p class="tinfo">
                            No, there is <span id="block_keywords">no charges</span> or subscription for posting your blog. This website is <span id="block_keywords">completely free</span> to use.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../JS/help_topic_drop_down.js?v=1"></script>
</body>
</html>