<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/butons.css">
    <link rel="stylesheet" href="css/videobackground.css">
    <link rel="stylesheet" href="css/forms.css">
    <style>
       
     .buttons {
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
        <h1>Sign Up</h1>

        <?php
        // Initialize error messages
        $usernameError = $emailError = $passwordError = $successMessage = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $servername = "localhost";
            $usernameDB = "root";
            $passwordDB = "";
            $dbname = "movie";

            $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

            if ($conn->connect_error) {
                die("Database connection failed: " . $conn->connect_error);
            }

            // Get form data
            $username = $conn->real_escape_string($_POST['name']);
            $email = $conn->real_escape_string($_POST['email']);
            $password = $conn->real_escape_string($_POST['password']);

            // Validation checks
            if (empty($username)) {
                $usernameError = "Username is required!";
            } elseif (empty($email)) {
                $emailError = "Email is required!";
            } elseif (empty($password)) {
                $passwordError = "Password is required!";
            } else {

                $checkEmailQuery = "SELECT * FROM user WHERE email = '$email'";
                $result = $conn->query($checkEmailQuery);

                if ($result->num_rows > 0) {
                    $emailError = "Email already exists! Please use another email.";
                } else {
                  
                    $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";

                    if ($conn->query($sql) === TRUE) {
                        $successMessage = "Registration completed successfully! You can now log in.";
                    } else {
                        $emailError = "An error occurred during registration: " . $conn->error;
                    }
                  
                }
            }

            $conn->close();
        }
        ?>

      
        <?php
        if ($usernameError) {
            echo "<p style='color: red;'>$usernameError</p>";
        }
        if ($emailError) {
            echo "<p style='color: red;'>$emailError</p>";
        }
        if ($passwordError) {
            echo "<p style='color: red;'>$passwordError</p>";
        }
        if ($successMessage) {
            echo "<p style='color: white;'>$successMessage</p>";
        }
        ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="name"></label>
                <input type="text" id="name" name="name" placeholder="Username" value="<?php echo isset($username) ? $username : ''; ?>">
            </div>
            <div class="form-group">
                <label for="email"></label>
                <input type="email" id="email" name="email" placeholder="email@gmail.com" value="<?php echo isset($email) ? $email : ''; ?>">
            </div>
            <div class="form-group">
                <label for="password"></label>
                <input type="password" id="password" name="password" placeholder="Password" value="<?php echo isset($password) ? $password : ''; ?>">
            </div>
            <button type="submit" class="buttons"><span></span><p>Sign up</p></button>
        </form>

        <div class="-link">
            <p>Already have an account? <a href="Login.php">Log in here</a></p>
        </div>
    </div>
</body>
</html>