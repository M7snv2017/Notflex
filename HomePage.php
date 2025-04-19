<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/butons.css">
    <link rel="stylesheet" href="css/videobackground.css">
    <link rel="stylesheet" href="css/container.css">
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="stylesheet" href="css/movieCard.css">
    <style>
        .buttons 
        {
            width: 80px;
            height: 30px;
            text-align: center;
        }
        .header{
            text-align: center;
            color: white;
            margin-top: 40px;
            
        }
    </style>
</head>
<body>
    
    <?php
        $username="";
        
        $ucon = mysqli_connect("localhost", "root", "", "movie");
        if (isset($_GET['id'])) {
            $uid =$_GET['id']; 
            $ures = mysqli_query($ucon, "SELECT * FROM user where id=$uid");
            $urow = mysqli_fetch_array($ures);
            $username=$urow[1];
        }
    ?>
    <?php include("inclodephp\\navigation.php"); ?>

    <div class="header">
        <h1>Welcome <?php echo $username ?></h1>
        <p>Enjoy watching movies without ads, anywhere anytime!</p>
    </div>

    <?php include("inclodephp\\crouselHTML.php");?>

    <div class="container">

        <?php 
        $con = mysqli_connect("localhost", "root", "", "movie");

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $res = mysqli_query($con, "SELECT * FROM MoviesInfo");

        if ($res) {
            while ($row = mysqli_fetch_array($res)) {
                echo "<div class='movie'";
                echo "    data-id='".$row[0]."'>";
                echo "    <a href='MoviePage.php?userid=".$uid."&id=".$row[0]."'>";
                echo "        <img src='".$row[3]."' alt='".$row[1]."'>";
                echo "    </a>";
                echo "    <div class='movie-info'>";
                echo "        <h3>".$row[1]."</h3>";
                echo "        <p>".$row[2]."</p>";
                echo "    </div>";
                echo "</div>";
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }
        mysqli_close($con);
        ?>
    </div> 

    <video class="video-background" src="Images/CinemaAnimatedVideoBackgroundLoop.mp4" autoplay loop muted></video>
    <div class="overlay"></div>

    <script src="js\\crouselJS.js"></script>


<script>



</script>
</body>
</html>
