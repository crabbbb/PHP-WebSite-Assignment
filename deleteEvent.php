<?php
include 'helper.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['event_id'])) {
    $id = $_GET['event_id'];

    $sql = "DELETE FROM events WHERE event_id=$id";
    if ($conn->query($sql) === TRUE) {
        //echo "<h3 style='color:red; text-align:center; margin-top:25px;'>". "Event deleted successfully"."</h3>";
        header('location:eventAdmin.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();

?>
