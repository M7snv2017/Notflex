<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie</title>
    <link rel="stylesheet" href="css/butons.css">
    <link rel="stylesheet" href="css/videobackground.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/container.css">
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="stylesheet" href="css/heart.css">
        
        <style>
        .buttons {
            width: 160px;
            height: 40px;
            text-align: center;
        }
        .movie-info {
            margin: auto;
        }
        .movie-info h1 {
            margin-bottom: 10px;
            font-size: 60px;
        }
        .movie-info h1~p {
            font-size: 30px;
        }
        .movie img {
            width: 576px;
            border-radius: 20px;
            margin-right: 20px;
        }
        .movie {
            display: inline-flex;
            margin-left: 10px;
            font-size: larger;
        }
        .img {
            margin: auto;
        }
    </style>
        

</head>
<body>
<?php
$con = mysqli_connect("localhost", "root", "", "movie");

if (isset($_GET['id'])) {
    $id = $_GET['id']; 
    $res = mysqli_query($con, "SELECT * FROM MoviesInfo WHERE id=$id");
}
$row = mysqli_fetch_array($res);

if (isset($_GET['userid'])) {
    $uid = $_GET['userid']; 
    $ures = mysqli_query($con, "SELECT * FROM user WHERE id=$uid");
}

if (isset($_GET['fav'])) {
    $fav = $_GET['fav']; 

    if ($fav == 1) {
        
        $checkFav = mysqli_query($con, "SELECT * FROM favorite WHERE userid=$uid AND movieid=$id");
        if (mysqli_num_rows($checkFav) == 0) {
           
            $fres = mysqli_query($con, "INSERT INTO `favorite` (`UserID`, `MovieID`) VALUES ('$uid', '$id')");
        }
    } else {
       
        $deleteFav = mysqli_query($con, "DELETE FROM `favorite` WHERE userid=$uid AND movieid=$id");
    }
}


$fav = mysqli_query($con, "SELECT * FROM favorite WHERE userid=$uid AND movieid=$id");
?>



<video class="video-background" src="Images/CinemaAnimatedVideoBackgroundLoop.mp4" autoplay loop muted></video>
        <div class="overlay"></div>

    <?php include("inclodephp\\navigation.php");?>
    
<div class='container'>
    <div class='movie'>
        <div class='img'>
            <img src='<?php echo htmlspecialchars($row[3]); ?>' alt=''>
        </div>
        <div class='movie-info'>
            <h1 id='Title'><b><?php echo htmlspecialchars($row[1]); ?></b></h1>
            <p id='Description'><b>Description: </b><?php echo htmlspecialchars($row[2]); ?></p>
            <p id='Year'><b>Year: </b><?php echo htmlspecialchars($row[4]); ?></p>
            <p id='Time'><b>Time: </b><?php echo htmlspecialchars($row[5]); ?></p>
            <p id='Rate'><b>Rate: </b><?php echo htmlspecialchars($row[6]); ?></p>
            <p id='Type'><b>Type: </b><?php echo htmlspecialchars($row[7]); ?></p>
            <div class='bottom'>
                <div onclick="change(this, <?php echo $id; ?>, <?php echo $uid; ?>)"
                    class='heart' 
                    style='background-color: <?php echo mysqli_num_rows($fav) > 0 ? "red" : "white"; ?>;' 
                    data-favorite='<?php echo mysqli_num_rows($fav) > 0 ? 1 : 0; ?>'>
                    <span></span>
                </div>
                <a href='MovieViewer.php?id=<?php echo $id; ?>'><button class='buttons'><span></span><p>Play</p></button></a>
            </div>
        </div>
    </div>
</div>
    

    <?php include("inclodephp\\crouselHTML.php");?>
    
    <script src="js\\crouselJS.js"></script>

    <script>
    function change(x, movieId, userId) {
        let favorite = x.dataset.favorite;
        
        favorite = favorite == 1 ? 0 : 1;
        x.dataset.favorite = favorite;

        x.style.backgroundColor = favorite == 1 ? "red" : "white";
        window.location.href = '?id=' + movieId + '&userid=' + userId + '&fav=' + favorite;
    }
</script>



</body>
</html>
