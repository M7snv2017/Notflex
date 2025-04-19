<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorite</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/butons.css">
    <link rel="stylesheet" href="css/videobackground.css">
    <link rel="stylesheet" href="css/movieCard.css">
    <link rel="stylesheet" href="css/container.css">
    <style>
       
        .buttons 
        {
            width: 80px;
            height: 30px;
        }
    </style>
</head>
<body>

    <?php
        if (isset($_GET['userid'])) 
        {
            $uid =$_GET['userid']; 
            include("inclodephp\\navigation.php");
            echo "<div class='container'>";

            
            $con = mysqli_connect("localhost", "root", "", "movie");

            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $res = mysqli_query($con, "SELECT * FROM Favorite where UserID=$uid");
            
       
            if ($res) {
                while ($movid = mysqli_fetch_array($res)) {
                    $movieID = $movid['MovieID'];
    
                    $movRes = mysqli_query($con, "SELECT * FROM Moviesinfo WHERE ID = $movieID");
    
                    if ($movRes) {
                        while ($row = mysqli_fetch_array($movRes)) {
                            echo "<div class='movie' data-id='" . htmlspecialchars($row[0]) . "'>";
                            echo "    <a href='MoviePage.php?userid=" . htmlspecialchars($uid) . "&id=" . htmlspecialchars($row[0]) . "'>";
                            echo "        <img src='" . htmlspecialchars($row[3]) . "' alt='" . htmlspecialchars($row[1]) . "'>";
                            echo "    </a>";
                            echo "    <div class='movie-info'>";
                            echo "        <h3>" . htmlspecialchars($row[1]) . "</h3>";
                            echo "        <p>" . htmlspecialchars($row[2]) . "</p>";
                            echo "    </div>";
                            echo "</div>";
                        }
                    } else {
                        echo "Error fetching movie details: " . mysqli_error($con);
                    }
                }
            } else {
                echo "Error fetching favorites: " . mysqli_error($con);
            }
            mysqli_close($con);
            
            echo"</div>"; 


            
            }else 
            {
                echo "ID is not there";
                exit;
            }
        ?>
    <video class="video-background" src="Images/CinemaAnimatedVideoBackgroundLoop.mp4" autoplay loop muted></video>
    <div class="overlay"></div>
    
    
            
</body>
</html>
