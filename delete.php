<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db2";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM tw WHERE name='Ramachandra Rao'";

if ($conn->query($sql) === TRUE) {
  echo 'Record deleted successfully';
} else {
  echo 'Error deleting record: ' . $conn->error;
}
$conn->close();
?>
