<!DOCTYPE html>
<html>
<head>
    <title>Log In</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/butons.css">
    <link rel="stylesheet" href="css/videobackground.css">
    <link rel="stylesheet" href="css/forms.css">
    <style>.buttons {
            width: 50%;
            margin-top: 10px;
            margin-left: 25%;
            margin-right: 25%;
            height: 40px;
            text-align: center;
        }
    </style>
</head>
<body>
    <video class="video-background" src="Images/CinemaAnimatedVideoBackgroundLoop.mp4" autoplay loop muted></video>
    <div class="overlay"></div>

    <div class="container">
        <h1>Log In</h1>

      
        <?php
        $emailError = $passwordError = "";
        $email = $password = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $servername = "localhost";
            $username = "root";
            $password_db = "";
            $dbname = "movie";

          
            $conn = new mysqli($servername, $username, $password_db, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

           
            $email = $_POST['email'];
            $password = $_POST['password'];

           
            if (empty($email)) {
                $emailError = "Email is required!";
            } 
            elseif(empty($password)) {
                $passwordError = "Password is required!";
            }

            if (empty($emailError) && empty($passwordError)) {
               
                $sql = "SELECT * FROM user WHERE email = '$email'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    if ($password === $row['password']) {
                      
                        $userID = $row['id'];

                      
                        session_start();
                        $_SESSION['userID'] = $userID;

                       
                        header("Location: HomePage.php?id=" . $userID);
                        exit();
                    } else {
                        echo "<p style='color: red;'>Incorrect password!</p>";
                    }
                } else {
                    echo "<p style='color: red;'>Email not found!</p>";
                }
            }

            $conn->close();
        }
        ?>

      
        <form method="POST" action="">
           
            <?php
            if ($emailError) {
                echo "<p style='color: red;'>$emailError</p>";
            }
            if ($passwordError) {
                echo "<p style='color: red;'>$passwordError</p>";
            }
            ?>

            <div class="form-group">
                <label for="email"></label>
                <input type="email" id="email" name="email" placeholder="email@gmail.com" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <label for="password"></label>
                <input type="password" id="password" name="password" placeholder="Password" value="<?php echo $password; ?>">
            </div>
            <button type="submit" class="buttons"><span></span><p>Login</p></button>
        </form>

        <div class="-link">
            <p>Don't have an account? <a href="payment.php">Sign up here</a></p>
        </div>
    </div>
</body>
</html>
