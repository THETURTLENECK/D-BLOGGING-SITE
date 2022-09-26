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
    <title>New Blog</title>
    <link rel="shortcut icon" type="image/x-icon" href="../Media/favicon.png"/>
    <link href="../CSS/start_blog.css?v=40" media="screen,print" rel="stylesheet" type="text/css">
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

    <!-- New Blog -->
    <div class="new_blog_page">
        <form class="blog_form" method="POST">

            <!-- Blog Head -->
            <div class="blog_head">

                <!-- Blog Main Heading -->
                <div class="blog_heading">
                    <textarea id="heading" name="blogmainheading" placeholder="Heading....." maxlength="100" rows="1" required></textarea>
                </div>

                <!-- Horizontal Line -->
                <hr>

                <!-- Blog Sub Heading -->
                <div class="blog_subheading">
                    <textarea id="subheading" name="blogsubheading" placeholder="Sub heading....." maxlength="300" rows="1" required></textarea>
                </div>
            </div>

            <!-- Blog content -->
            <div class="blog_content">
                <textarea id="content" name="blogcontent" placeholder="start writting....." maxlength="10000" rows="25" required></textarea>
            </div>

            <!-- Blog Post button -->
            <div class="blog_post">
                <input id="post_blog" type="submit" name="postblog" value="Post Blog">
            </div>
        </form>

        <?php
            if(isset($_POST['postblog']))
            {
                if(isset($_SESSION['signinemail']))
                {
                    //Variables
                    $actblogheading = $_POST['blogmainheading'];
                    $actblogsubheading = $_POST['blogsubheading'];
                    $actblogcontent = $_POST['blogcontent'];
                    $postblogname = $_SESSION['name'];
                    $postblogemail = $_SESSION['signinemail'];
                    $NL_ADDED_CONTENT = nl2br($actblogcontent);
                    $custombyline = "-By " . $postblogname;

                    //Random link generator
                    $randstr = rand();
                    $randstrgen = md5($randstr);
                    $randlink = $randstrgen . ".php";

                    $query = "select * from blog_db WHERE link = '$randlink'";
                    $query_run = mysqli_query($con,$query);

                    if(mysqli_num_rows($query_run)>0)
                    {
                        while(mysqli_num_rows($query_run)!=0)
                        {
                            $randstr=rand();
                            $randstrgen = md5($randstr);
                            $randlink = $randstrgen . ".php";

                            $query = "select * from blog_db WHERE link = '$randlink'";
                            $query_run = mysqli_query($con,$query);
                        }
                        $bloglink = "../Blogs/" . $randlink;
                    }
                    else
                    {
                        $bloglink = "../Blogs/" . $randlink;
                    }

                    $query = "insert into blog_db values('$postblogemail','$bloglink','$actblogheading')";
                    $query_run = mysqli_query($con,$query);

                    
$strOut =   
'<?php
    ob_start();
    session_start();
    require \'../Database/config.php\';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta title="D Blogging Site">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Can Change -->
        <title>Your Blog</title>
        <link rel="shortcut icon" type="image/x-icon" href="../Media/favicon.png"/>
        <link href="../CSS/new_blog.css?v=5" media="screen,print" rel="stylesheet" type="text/css">
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
                    
                    <?php if(isset($_SESSION[\'signinemail\'])): ?>
                        <!-- Menu Button -->
                        <div class="menu">
                            <button class="menubtn">Menu</button>

                            <!-- Menu Drop Down -->
                            <div class="menudrpdwn">
                                <a href="../Pages/start_blog.php">New Blog!</a>
                                <!-- <a href="settings.php">Settings</a> -->
                                <a href="../Pages/help.php">Help</a>
                                <a href="../Pages/contact_us.php">Contact Us</a>
                            </div>
                        </div>
                        
                        <!-- User Button -->
                        <div class="user">
                            <button class="userbtn">User</button>
                            
                            <!-- User Drop Down -->
                            <div class="userdrpdwn">
                                <a href="../Pages/profile.php">Profile</a>
                                <a>
                                    <form method="POST">
                                        <input name="out" type="submit" value="Log Out">
                                    </form>
                                    
                                    <?php
                                        if(isset($_POST[\'out\']))
                                        {
                                            session_destroy();   
                                            header(\'location:../index.php\');
                                        }
                                    ?>
                                </a>
                            </div>
                        </div>
                        
                    <?php else: ?>
                        <!-- User Button -->
                        <div class="user">
                            <a href="../Pages/signin_signup.php">
                                <button class="userbtn">Sign In!</button>
                            </a>
                        </div>

                    <?php endif; ?>
                </div>
                
                <div style="clear: both;"></div>
            </nav>
        </div>
        
        <!-- New Blog -->
        <div class="new_blog_page">
            <div class="blog_form">

                <!-- Blog Head -->
                <div class="blog_head">
                
                    <!-- Blog Main Heading -->
                    <div class="blog_heading">
                        <p id="heading">' . $actblogheading . '</p>
                    </div>
                    
                    <!-- Horizontal Line -->
                    <hr>
                    
                    <!-- Blog Sub Heading -->
                    <div class="blog_subheading">
                        <p id="subheading">' . $actblogsubheading . '</p>
                    </div>
                    
                    <!-- By line -->
                    <div class="by_line">
                        <p id="byline">' . $custombyline . '</p>
                    </div>
                </div>
                
                <!-- Blog content -->
                <div class="blog_content">
                    <p id="content">' . $NL_ADDED_CONTENT . '</p>
                </div>
                
                <?php
                    if(isset($_SESSION[\'signinemail\']))
                    {
                        $PAGE_NAME = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
                        $PAGE_NAME = "../Blogs/" . $PAGE_NAME;
                        
                        $MY_QUERY = "select * from blog_db WHERE link = \'$PAGE_NAME\'";
                        $MY_QUERY_RUN = mysqli_query($con,$MY_QUERY);
                        
                        if(mysqli_num_rows($MY_QUERY_RUN) > 0)
                        {
                            while($DATA = mysqli_fetch_assoc($MY_QUERY_RUN))
                            {
                                $REC_EMAIL = $DATA[\'email\'];
                            }
                            
                            $PAGE_EMAIL = $_SESSION[\'signinemail\'];
                            if($PAGE_EMAIL == $REC_EMAIL)
                            {?>
                                <div class="deletebutton">
                                    <form class="deleteform" method="POST">
                                        <input id="deletebtn" name="DELETE_BTN" type="submit" value="Delete Blog">
                                    </form>
                                </div>

                            <?php if(isset($_POST[\'DELETE_BTN\']))
                                {
                                    $DELETE_QUERY = "DELETE FROM blog_db WHERE link = \'$PAGE_NAME\'";
                                    $DELETE_QUERY_RUN = mysqli_query($con,$DELETE_QUERY);
                                    unlink("$PAGE_NAME");
                                    header(\'location:../Pages/profile.php\');
                                    ob_end_flush();
                                }
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </body>
</html>';
                
                    $f = fopen($bloglink, "w"); 
                    fwrite($f, $strOut); 
                    fclose($f);

                    if($query_run)
                    {
                        header('location:profile.php');
                    }
                    else
                    {
                        echo '<script type="text/javascript"> alert("Error in posting blog!! Please retry.") </script>';
                    }
                }

                else
                {
                    echo '<script type="text/javascript"> alert("You are not signed in!!!") </script>';
                }
            }
        ?>
    </div>

    <script type="text/javascript" src="../JS/dynamic_blog_textfield.js?v=1"></script>
    <!-- <script type="text/javascript" src="../JS/post_blog_alert.js?v=1"></script> -->
</body>
</html>
