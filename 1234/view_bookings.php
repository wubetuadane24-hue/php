<?php
require 'db_connect.php';
$result = $conn->query("SELECT * FROM tickets ORDER BY booking_time DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>All Bookings</title>
<style>
body { font-family: Arial, sans-serif; background: #f0f8ff; padding: 30px; }
h2 { text-align: center; color: #023e8a; margin-bottom: 20px; }
table { width: 100%; border-collapse: collapse; background: white; }
th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
th { background: #0077b6; color: white; }
tr:nth-child(even) { background: #eaf6ff; }
a { color: #0077b6; text-decoration: none; }
</style>
</head>
<body>
<h2>🚌 Ethiopian Bus Ticket Bookings</h2>
<table>
<tr>
<th>ID</th><th>Name</th><th>ID Number</th><th>Email</th>
<th>Phone</th><th>Gender</th><th>From</th><th>To</th><th>Booked Time</th>
</tr>
<?php while($row = $result->fetch_assoc()): ?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= htmlspecialchars($row['fname'].' '.$row['lname']) ?></td>
<td><?= htmlspecialchars($row['idnum']) ?></td>
<td><?= htmlspecialchars($row['email']) ?></td>
<td><?= htmlspecialchars($row['phone']) ?></td>
<td><?= htmlspecialchars($row['gender']) ?></td>
<td><?= htmlspecialchars($row['from_place']) ?></td>
<td><?= htmlspecialchars($row['to_place']) ?></td>
<td><?= $row['booking_time'] ?></td>
</tr>
<?php endwhile; ?>
</table>
<p style="text-align:center;margin-top:20px;"><a href="index.html">← Back Home</a></p>
</body>
</html>