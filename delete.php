<?php

$conn = new mysqli("localhost","root","","ticket");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "DELETE FROM ticket WHERE id='".$_GET['id']."'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header('Location: table.php');
} else {
    echo "Error deleting record: " . $conn->error;
}
?>