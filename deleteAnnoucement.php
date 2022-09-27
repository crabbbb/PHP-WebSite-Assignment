<?php
include 'helper.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['announcement_id'])) {
    $id = $_GET['announcement_id'];

    $sql = "DELETE FROM announcement WHERE announcement_id=$id";
    if ($conn->query($sql) === TRUE) {
        //echo "<h3 style='color:red; text-align:center; margin-top:25px;'>". "Event deleted successfully"."</h3>";
        header('location:announcementAdmin.php');
    } else {
        echo "Error deleting announcement: " . $conn->error;
    }
}

$conn->close();

?>
