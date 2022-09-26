<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta title="D Blogging Site">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Can Change -->
    <title>D Blogging Site</title>
    <link rel="shortcut icon" type="image/x-icon" href="/Media/favicon.png"/>
    <link href="/CSS/index.css?v=21" media="screen,print" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="head">
        <nav class="nav">

            <!--Main Logo-->
            <div class="logo">
                <a href="index.php">
                    <img id="logoimg" title="D Blogging Site" src="/Media/LOGO.png"/>
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
                        <a href="/Pages/start_blog.php">New Blog!</a>
                        <a href="/Pages/settings.html">Settings</a>
                        <a href="/Pages/help.php">Help</a>
                        <a href="/Pages/contact_us.php">Contact Us</a>
                    </div>
                </div> -->

                <!-- User Button -->
                <div class="user">
                    <a href="/Pages/signin_signup.php">
                        <button class="userbtn">Sign In!</button>
                    </a>
                    <!-- User Drop Down -->
                    <!-- <div class="userdrpdwn">
                        <a href="/Pages/profile.php">Profile</a>
                        <a href="/Pages/signin_signup.php">Sign In!</a>
                    </div> -->
                </div>
            </div>
            <div style="clear: both;"></div>
        </nav>
    </div>

    <!-- Middle Welcome Text -->
    <div class="greetings">
        <div class="welcomenote">
            <p id="greet">Welcome to</p>
            <p id="mainline">D Blogging Site</p>
            <p id="subline">a new way to express</p>
        </div>
    </div>

    <!-- Arrow -->
    <div class="arrow">
        <a href="#fts">
            <img id="nxtarrow" title="Down" alt="DOWN" src="/Media/arrow.png">
        </a>
    </div>

    <!-- Features -->
    <div class="features" id="fts">

        <!-- First Feature -->
        <div class="ftsone">
            <div>
                <img src="/Media/no_cost.png">
            </div>
            <div class="f1text">
                <p>
                    <span class="fothead">Absolutely Free</span>
                    <br><br>This website is completely free of cost, just sign up and you are good to go to express your views.
                </p>
            </div>
        </div>

        <!-- Second Feature -->
        <div class="ftssec">
            <div class="f2text">
                <p>
                    <span>No Censorship</span>
                    <br><br>This website has no censorship policy, i.e. your words goes directly to your reader without any cut down or compromises.
                </p>
            </div>
            <div>
                <img src="/Media/no_censorship.png">
            </div>
        </div>

        <!-- Third Feature -->
        <div class="ftsthird">
            <div>
                <img title="Easy To Use" src="/Media/easy_to_use.png">
            </div>
            <div class="f3text">
                <p>
                    <span>Easy to Use</span>
                    <br><br>This website is very easy to use with almost no learning curve, so that there is no hassle in reaching your readers.
                </p>
            </div>
        </div>
    </div>
</body>
</html>