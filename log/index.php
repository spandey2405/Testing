<?php
/**
 * Created by PhpStorm.
 * User: sp
 * Date: 06/01/16
 * Time: 2:45 PM
 */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vectoloabs";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `tmp_booking_details` ORDER BY `tmp_booking_details`.`booking_id` DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<pre>".json_encode($row, JSON_PRETTY_PRINT)."</pre>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>