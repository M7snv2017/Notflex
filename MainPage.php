<!DOCTYPE html>
<html lang="en">

    <head>

        <title>Home page</title>
        <link rel="stylesheet" href="css/butons.css">
        <link rel="stylesheet" href="css/videobackground.css">
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", "sans-serif";

}.ivideo-background {
    position: fixed;
    top: 0;
    left: 0; 
    width: 100%; 
    height: 100%; 
    object-fit: cover;
    z-index: -1;
}


body {
    display: flex;
    width: 100%;
    height: 100vh;
   
    background-position: center;
    background-size: cover;
}

.content{
    width: 100%;
    position: absolute;
    top:40%;
    transform: translateY(-50%);
    text-align: center;
    color: #fff;
}

.content h1{
    font-size: 60px;
    margin-top: 80px;
}

.content p{
    font-size: 20px;
    font-weight: 100;
    line-height: 70px;
}

.buttons {
    width: 160px;
    height: 40px;
    
    text-align: center;

}


</style>
    </head>

    <body>
        
        <video class="ivideo-background" src="Images/CinemaAnimatedVideoBackgroundLoop.mp4" autoplay loop muted></video>
            <div class="overlay"></div>
        <div class="content">
            <h1>Welcome to Movies World</h1>
            <p>Dive into a World of Films, Where Every Frame Tells a Story</p>
    
            <a href="Login.php"><button class="buttons"><span></span> <p>Login</p></button></a>
            <a href="payment.php"><button class="buttons"><span></span><p>Sign up</p></button></a>
        </div>

    </body>
</html>




