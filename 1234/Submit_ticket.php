<?php
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $from   = $_POST["from"];
    $to     = $_POST["to"];
    $fname  = $_POST["fname"];
    $lname  = $_POST["lname"];
    $idnum  = $_POST["idnum"];
    $email  = $_POST["email"];
    $phone  = $_POST["phone"];
    $gender = $_POST["gender"];

    // Prevent same "from" and "to"
    if ($from === $to) {
        echo "<script>alert('Departure and destination cannot be the same!');window.history.back();</script>";
        exit;
    }

    // Insert into database
    $sql = "INSERT INTO tickets (fname, lname, idnum, email, phone, gender, from_place, to_place)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $fname, $lname, $idnum, $email, $phone, $gender, $from, $to);

    if ($stmt->execute()) {
        echo "<div style='margin:auto;width:60%;background:#f0f9ff;padding:30px;border-radius:10px;text-align:center;font-family:sans-serif;'>";
        echo "<h2 style='color:green;'>✅ Ticket Booked Successfully!</h2>";
        echo "<p><strong>Name:</strong> $fname $lname</p>";
        echo "<p><strong>From:</strong> $from → <strong>To:</strong> $to</p>";
        echo "<p><strong>ID Number:</strong> $idnum</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Phone:</strong> $phone</p>";
        echo "<p><strong>Gender:</strong> $gender</p>";
        echo "<hr><p>Thank you for booking with <strong>Ethiopian Bus Station 🚍</strong></p>";
        echo "<a href='index.html' style='text-decoration:none;background:#0077b6;color:#fff;padding:10px 20px;border-radius:8px;'>Back to Home</a>";
        echo "</div>";
    } else {
        echo "❌ Database Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Database connection is sucsessfully!";
}
?>