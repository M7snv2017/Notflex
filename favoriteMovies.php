<?php
session_start();

if (!isset($_SESSION['userID'])) {
    die("User is not logged in.");
}

$userID = $_SESSION['userID']; 

$servername = "localhost";
$username = "root";
$password_db = "";
$dbname = "movie";

$conn = new mysqli($servername, $username, $password_db, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "
    SELECT * 
    FROM moviesinfo 
    WHERE id IN (SELECT MovieID FROM favorite WHERE UserID = $userID)
";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $movies = [];
    while ($row = $result->fetch_assoc()) {
        $movies[] = $row;
    }

    $conn->close();

    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=FavoriteMovies.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    $output = fopen("php://output", "w");

    if (!empty($movies)) {
        fputcsv($output, array_keys($movies[0]), "\t");
    }

    foreach ($movies as $movie) {
        fputcsv($output, $movie, "\t");
    }

    fclose($output);
    exit();
} else {
    echo "No favorite movies found for the user.";
    $conn->close();
}
?>
