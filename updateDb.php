<?php
$area_id = filter_input(INPUT_POST, 'ar_id');
$from_time = filter_input(INPUT_POST, 'from_datetime');
$to_time = filter_input(INPUT_POST, 'to_datetime');
$reason = filter_input(INPUT_POST, 'reason');

if ($area_id !='0'){
if (!empty($to_time)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "unisys";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO details (area_id,from_time,to_time,stat, reason)
values ('$area_id','$from_time','$to_time','active','$reason')";
if ($conn->query($sql)){
echo "Successfully Added!!!<br>";
echo "<a href='authority.html'>click here </a>to insert more...<br>";
echo "<a href='deactivate.php'>click here</a> to deactivate running process...";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
echo "Enter to time";
die();
}
}
else{
echo "Choose Area";
die();
}
?>