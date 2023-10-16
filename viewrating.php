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
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $out_value = "";
        $dbname = "music_db";
        $user = $_SESSION["username"];
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $song = "";
        $user = "";
        $artist = "";
        $rating = "";
        
        if ($id !== null) {
            $sql = "SELECT * FROM ratings WHERE id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $num = mysqli_num_rows($result);

            if ($num > 0) {
                $row = mysqli_fetch_assoc($result);
                $song = $row['song'];
                $artist = $row['artist'];
                $rating = $row['rating'];
                $user = $row['username'];
            }
        }
        $conn->close();
    ?>
    <!-- Navigation Bar -->
    <div id="navbar" class="row navbar">
        <div class="navbar_logo" style= "padding-top:20px;">
            <p style="margin: 0; height: 60px;"><a href="logout.php" style="cursor: pointer;" aria-label="Return to top of landing page">
            <img src="images/logo.webp" id="logo" alt="lovenotes logo" style="width: 178px; height: 50px;" loading="lazy"/>
            </a></p>
        </div>
        <div id="hi-message" style="padding-top: 35px; font-family: 'Lobster Two', cursive; color: rgb(233, 175, 204);">
            <?php if($_SESSION["loggedin"]) {echo "Hi, $user";}?>
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
            <div class="update_form" style="padding:30px;">
                <h1 style="font-size:60px; color: rgb(4, 57, 94); text-align:center;";>View Rating</h1>
                <div style="text-align:center;" class="login_info">
                    <label class="label_text" for="song">Username:</label>
                    <span class="label_text"> <?php echo $user;?> </span>
                </div>
                <div style="text-align:center;" class="login_info">
                    <label class="label_text" for="song">Song Name:</label>
                    <span class="label_text"> <?php echo $song;?> </span>
                </div>
                <div style="text-align:center;" class="login_info">
                    <label class="label_text" for="artist">Artist:</label>
                    <span class="label_text"> <?php echo $artist;?> </span>
                </div>
                <div style="text-align:center;margin-bottom:25px;" class="login_info">
                    <label class="label_text" for="rating">Rating:</label>
                    <span class="label_text"> <?php echo $rating;?> </span>
                </div>
                <div style="text-align: center;">
                    <a href="ratings.php" class="submit_btn" style="padding:10px 30px; font-size: 22px; text-decoration: none;">Go Back</a>
                </div>
            </div>
        </div>
    </div>
</body>