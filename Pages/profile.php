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
    <title>Profile</title>
    <link rel="shortcut icon" type="image/x-icon" href="../Media/favicon.png"/>
    <link href="../CSS/profile.css?v=100" media="screen,print" rel="stylesheet" type="text/css">
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

    <div class="profilepage">
        <div class="profiledetails">
            <div class="profiledethead">
                <p>
                    Profile
                </p>
            </div>
            <div class="profiledetuser">
                <div>
                    <p>
                        <span id="profileuserparameter">Name : </span><?php echo $_SESSION['name'];?>
                    </p>
                </div>
                <div>
                    <p>
                        <span id="profileuseremailparameter">E-mail : </span><?php echo $_SESSION['signinemail'];?>
                    </p>
                </div>
            </div>
        </div>
        <div class="profileblogs">
            <div class="profilebloghead">
                <p>
                    Your Blogs
                </p>
            </div>
            <div class="profileblogdetails">
                <?php
                    $username = $_SESSION['signinemail'];

                    $query = "select * from blog_db WHERE email = '$username'";
                    $headings = mysqli_query($con,$query);

                    if (mysqli_num_rows($headings) > 0) 
                    {
                        while($row = mysqli_fetch_assoc($headings))
                        {
                            echo    "<div class=\"blogfetchedhead\">
                                        <!-- Blog haedings -->
                                        <div class=\"BLOG_HEADINGS\">
                                            <a href='" . $row['link'] . "'>
                                                <p class=\"blogheading\">" . $row['heading'] . "</p>
                                            </a>
                                        </div>
                                    </div>";
                        }
                    }

                    else
                    {
                        echo    "<a href=\"start_blog.php\">
                                    <div class=\"blogfetchedhead\">
                                        <p class=\"blogheading\">You have not posted any blogs. <span id=\"ANOTHERCOLOR\">[Click to post new blog.]</span></p>
                                    </div>
                                </a>";
                    }
                ?>
            </div>

            <?php
                if(isset($_SESSION['signinemail']))
                {?>
                    <div class="deletebutton">
                        <form class="deleteform" method="POST">
                            <input id="deletebtn" name="DELETE_ACC" type="submit" value="Delete Account">
                        </form>
                    </div>
                
                <?php
                    if(isset($_POST['DELETE_ACC']))
                    {
                        $SESSION_EMAIL = $_SESSION['signinemail'];

                        $MY_QUERY = "select * from blog_db WHERE email = '$SESSION_EMAIL'";
                        $MY_QUERY_RUN = mysqli_query($con,$MY_QUERY);

                        if(mysqli_num_rows($MY_QUERY_RUN)>0)
                        {
                            while($DATA = mysqli_fetch_assoc($MY_QUERY_RUN))
                            {
                                $PAGE = $DATA['link'];

                                $DELETE_PAGES = "DELETE FROM blog_db WHERE link = '$PAGE'";
                                $DELETE_PAGES_RUN = mysqli_query($con,$DELETE_PAGES);
                                unlink("$PAGE");
                            }
                        }

                        $DELETE_ACCOUNT = "DELETE FROM user_accounts WHERE email = '$SESSION_EMAIL'";
                        $DELETE_ACCOUNT_RUN = mysqli_query($con,$DELETE_ACCOUNT);

                        session_destroy();
                        header('location:../index.php');
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>