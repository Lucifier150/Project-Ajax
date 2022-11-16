<?php
include("dbConnection.php");

// stripslashes function can be used to clean up data retrieved from a database or from an HTML form.

//  php://input - This is a read only stream that allows us to read raw data from the request body. It returns all raw data after the HTTP-headers of request, regardless of the contect type.

// json-decode - It take JSON string and convert it into a PHP Object or arry, if true then associative arry.

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);
$id = $mydata['id'];
$name = $mydata['name'];
$email = $mydata['email'];
$password = $mydata['password'];

// Insert Data

// if (!empty($name) && !empty($email) && !empty($password)) {
//     $sql = "INSERT INTO student(name, email, password) VALUES('$name', '$email', '$password')";
//     if ($conn->query($sql) == TRUE) {
//         echo "Student Saved Successfully";
//     } else {
//         echo "Unable to Save Student";
//     }
// } else {
//     echo "fill All Fields";
// }


// Insert & update Data
if (!empty($name) && !empty($email) && !empty($password)) {

    $sql = "INSERT INTO student(id, name, email, password) VALUES
    ('$id','$name', '$email', '$password') ON DUPLICATE KEY
     UPDATE name='$name', email='$email', password='$password'";

    if ($conn->query($sql) == TRUE) {
        echo "Student Saved Successfully";
    } else {
        echo "Unable to Save Student";
    }
} else {
    echo "fill All Fields";
}
?>