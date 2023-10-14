<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login page of the LoveNotes site.">
    <meta http-equiv='cache-control' content='no-cache'> 
    <meta http-equiv='expires' content='0'> 
    <meta http-equiv='pragma' content='no-cache'>
    <title>LoveNotes</title>
    <link rel="stylesheet" href="style.css" />
    <script src="landing.js"></script> 
    <link rel="icon" href= "public/music.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/289e976bd2.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Navigation Bar -->
    <div id="navbar" class="row navbar">
        <div class="navbar_logo" style= "padding-top:20px;">
            <p style="margin: 0; height: 60px;"><a href="logout.php" style="cursor: pointer;" aria-label="Return to top of landing page">
            <img src="images/logo.webp" id="logo" alt="lovenotes logo" style="width: 178px; height: 50px;" loading="lazy"/>
            </a></p>
        </div>
        <ul id="navbar_items">
            <li><a id="login-btn" href="ratings.php">Home</a></li>
        </ul>
        <button id="more-button" aria-label="Show navigation links" onclick="showNavItems()">
            <i id="more-icon" class="fa-solid fa-list" style="color:rgb(233, 175, 204); font-size: 25px;"></i>
        </button>
        <ul id="navbar_list">
            <li style="margin-bottom: 10px;"><a id="nav_item_list" href="ratings.php">Home</a></li>
        </ul>
    </div>

    <!-- Rating section -->
    <div id="Rating" class="container">
        <div class="row home">
            <div class="update_form" id="form">
                <h1 style="font-size:60px; color: rgb(4, 57, 94); text-align:center;";>Update Rating</h1>
                <form name="ratings"  method="POST" action="">
                    <div class="login_info">
                        <label class="label_text" for="song">Song Name*</label>
                        <input required type="text" id="song" name="song">
                    </div>
                    <div class="login_info">
                        <label class="label_text" for="artist">Artist*</label>
                        <input required type="text" id="artist" name="artist">
                    </div>
                    <div class="login_info">
                        <label class="label_text" for="rating">Rating*</label>
                        <input required type="text" id="rating" name="rating">
                    </div>
                    <p class="label_text" style="text-align: center; font-size: 17px; color: rgb(221, 84, 84);">
                        <?php if(!empty($out_value)){echo $out_value;}?>
                    </p>
                    <div style="text-align: center;">
                        <input type="submit" name="submit" value="Submit" class="submit_btn" style="padding:10px 30px; font-size: 22px;"/>
                    </div>
                    <p class="label_text" style="text-align: center; font-size: 17px; margin-right: 0px;">*Required</p>
                </form>
            </div>
        </div>
    </div>
</body>