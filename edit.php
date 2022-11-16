<?php 
include("dbConnection.php");
// When YOu click Edit button below code Get executed
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);
$id = $mydata['sid'];

// Retrieve Specific Student infoemation
$sql = "SELECT * FROM student WHERE id={$id} ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// returing Json Format Data as Response to Ajax Call
echo json_encode($row);

?>

