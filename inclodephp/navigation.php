<?php 
    $defu="Home";
    $hrf="MainPage.php";
    $callerFile = basename(debug_backtrace()[0]['file']);

    if ($callerFile == "HomePage.php") {
        if (isset($_GET["id"])) {
            $defu = "Logout";
            $hrf = "MainPage.php"; 
        }
    }
    elseif ($callerFile == "MoviePage.php" || $callerFile == "Favorite.php" || $callerFile == "Login.php" || $callerFile == "signup.php") {
        // $defu = "Back";
        // $hrf = "javascript:history.back()";
        $defu = "Home";
        $hrf = "HomePage.php?id=$uid";
    }
    elseif($callerFile=="anything")
    {

    }
?>
<nav class="nav">
<div class="navbar-left">
    <img src="Images/icon/iconi.png"  width="70px" alt="Logo" class="logo">
</div>
<div class="navbar-center">
    <span class="navbar-text">Home </span>
</div>
<div class="navbar-right">
    <?php
        if($defu=="Logout")
        {
            echo "<a href='favorite.php?userid=" . $uid . "' style='margin-right:15px;'><button class='buttons'><span></span><p>Favorite</p></button></a>";
            echo "<a href='$hrf'><button class='buttons'><span></span><p>$defu</p></button></a>";
        }
        elseif($callerFile=="Favorite.php")
        {
            echo'<a href="favoriteMovies.php"style="margin-right:20px;"><button class="buttons"><span></span><p>Download</p></button></a>';
            echo "<a href='$hrf'><button class='buttons'><span></span><p>$defu</p></button></a>";
        }
        else
        {
            echo "<a href='$hrf'><button class='buttons'><span></span><p>$defu</p></button></a>";
        }
    ?>
</div>
</nav>
