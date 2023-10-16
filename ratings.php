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

    <!-- Navigation Bar -->
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "music_db";
        $user = $_SESSION["username"];
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        
        $sql_fetch_data = "SELECT * FROM ratings";
        $result_fetch_data = $conn->query($sql_fetch_data);
        

        $conn->close();
    ?>
    <div id="navbar" class="row navbar">
        <div class="navbar_logo" style= "padding-top:20px;">
            <p style='margin: 0; height: 60px;'>
                <a href='index.html' style='cursor: pointer;' aria-label='Return to top of landing page'>
                    <img src='images/logo.webp' id='logo' alt='lovenotes logo' style='width: 178px; height: 50px;' loading='lazy'/>
                </a>
            </p>
        </div>
        <ul id="navbar_items">
            <?php if($_SESSION["loggedin"]) {echo "<li><a id='login-btn' href='logout.php'>Log Out</a></li>";}
            else {echo "<li><a id='login-btn' href='index.html'>Home</a></li>
                        <li><a id='login-btn' href='login.php'>Login</a></li>";}
            ?>
        </ul>
        <button id="more-button" aria-label="Show navigation links" onclick="showNavItems()">
            <i id="more-icon" class="fa-solid fa-list" style="color:rgb(233, 175, 204); font-size: 25px;"></i>
        </button>
        <ul id="navbar_list">
            <?php if($_SESSION["loggedin"]) {echo "<li style='margin-bottom: 10px;'><a id='nav_item_list' href='logout.php'>Log Out</a></li>";}
            else {echo "<li><a id='nav_item_list' href='index.html'>Home</a></li>
                        <li style='margin-bottom: 10px;'><a id='nav_item_list' href='login.php'>Login</a></li>";}
            ?>
        </ul>
    </div>

    <!-- Rating section -->
    <div id="Rating" class="container" style="padding-top:40px;">
        <div class="row home">
                <h1 style="font-size:80px; color: rgb(4, 57, 94); margin-bottom:30px;";>Welcome<?php if($_SESSION["loggedin"]) {echo ", $user";}?>!</h1>
        </div>
        <div class="rating_btns" style="text-align:center; margin: 10px auto; margin-bottom:30px;">
            <a href="addrating.php"><button id="rating_btn" style="margin: 5px 0px; padding: 10px 20px;">Rate a Song!</button></a>
        </div>

        <table style="width: 100%; background-color: rgb(165, 197, 223);">
            <tr>
                <th class="table_header">ID</th>
                <th class="table_header">Username</th>
                <th class="table_header">Artist</th>
                <th class="table_header">Song</th>
                <th class="table_header">Rating</th>
                <th class="table_header">Action</th>
            </tr>
            <tbody id="ratingTableBody">
                <?php
                    while($row = $result_fetch_data->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='table_cell'>".$row["id"]."</td>";
                        echo "<td class='table_cell'>".$row["username"]."</td>";
                        echo "<td class='table_cell'>".$row["artist"]."</td>";
                        echo "<td class='table_cell'>".$row["song"]."</td>";
                        echo "<td class='table_cell'>".$row["rating"]."</td>";
                        echo "<td class='table_cell'><a href='viewrating.php?id=" . $row["id"] . "' style='margin:0px 10px;'>View</a>";
                        if ($row["username"] === $user) {
                            echo "<a href='updaterating.php?id=" . $row["id"] . "' style='margin:0px 10px;'>Update</a>";
                            echo "<a href='deleterating.php?id=" . $row["id"] . "' style='margin:0px 10px;'>Delete</a>";
                        }
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>