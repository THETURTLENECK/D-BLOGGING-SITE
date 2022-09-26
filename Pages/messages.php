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
    <title>Messages</title>
    <link rel="shortcut icon" type="image/x-icon" href="../Media/favicon.png"/>
    <link href="../CSS/messages.css?v=97" media="screen,print" rel="stylesheet" type="text/css">
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

    <div class="allmessages">
        <?php
            $ADMIN = 'dprofessionalemail@gmail.com';

            if($ADMIN == $_SESSION['signinemail'])
            {
                $query = "select * from contact_us_messages";
                $headings = mysqli_query($con,$query);

                if (mysqli_num_rows($headings) > 0) 
                {
                    while($row = mysqli_fetch_assoc($headings))
                    {?>
                        <div class="messagecontainer">
                            <div class="messagebg">
                                <p class="sendername">Name : <?php echo $row['name'] ?></p>
                                <p class="senderemail">Email : <a href="mailto:<?php echo $row['email'] ?>"><?php echo $row['email'] ?></a></p>
                                <p class="sendersubject">Subject : <?php echo $row['subject'] ?></p>
                                <p class="sendermessage">Message : <br><?php echo $row['message'] ?></p>
                            </div>
                        </div>
                        
                    <?php
                    }?>

                    <div class="deletebutton">
                        <form class="deleteform" method="POST">
                            <input id="deletemessage" name="DELETE_ALL" type="submit" value="Delete All">
                        </form>
                        
                        <?php
                            if(isset($_POST['DELETE_ALL']))
                            {
                                $query = "select * from contact_us_messages";
                                $headings = mysqli_query($con,$query);

                                if (mysqli_num_rows($headings) > 0) 
                                {
                                    while($row = mysqli_fetch_assoc($headings))
                                    {
                                        $U_ID = $row['id'];

                                        $DELETE_QUERY = "DELETE FROM contact_us_messages WHERE id = '$U_ID'";
                                        $DELETE_QUERY_RUN = mysqli_query($con,$DELETE_QUERY);
                                        
                                        header('location:messages.php');
                                        ob_end_flush();
                                    }
                                }
                            }
                        ?>
                    </div>
                <?php
                }
                else
                {?>
                    <div class="allmessages">
                        <div class="messagecontainer">
                            <div class="messagebg">
                                <p class="NOTADMIN">No contact us messages.</p>
                            </div>
                        </div>
                    </div>
                <?php
                }
            }
            else
            {?>
                <div class="allmessages">
                    <div class="messagecontainer">
                        <div class="messagebg">
                            <p class="NOTADMIN">YOU ARE NOT ADMIN!! <br>PLEASE LEAVE.</p>
                        </div>
                    </div>
                </div>
            <?php
            }?>
    </div>
</body>
</html>