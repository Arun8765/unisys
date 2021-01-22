<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<table id="areasTable">
<tr>
<th>Area</th>
<th>From-time</th>
<th>To-time</th>
<th>Reason</th>
</tr>
<?php
$sarea= $_POST["area"];
$conn = mysqli_connect("localhost", "root", "", "unisys");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT A.area,D.from_time,D.to_time,D.reason from areas A,details D where A.area_id=D.area_id AND A.area like '%$sarea%' AND D.stat='active'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["area"] . "</td><td>" . $row["from_time"] . "</td><td>"
. $row["to_time"]. "</td><td>" . $row["reason"]. "</td></tr>";
}
echo "</table>";
} else { echo "Sorry No information Available..."; }
$conn->close();
?>
</table>
</body>
</html>