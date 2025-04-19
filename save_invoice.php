<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password_db = "";
    
    $sql = "INSERT INTO invoices () VALUES ()";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        
        $invoiceId = $conn->lastInsertId();
        echo "Invoice saved successfully. Invoice ID: " . $invoiceId;
    } else {
        echo "Failed to save the invoice.";
    }
}
?>