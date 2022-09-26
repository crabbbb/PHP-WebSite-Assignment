<!--first file (session_start.php) -->
<?php
//if need to store a data inside a session must use this at the top !!!
session_start(); 

$_SESSION['id'] = 1000;

if(isset($_SESSION['new'])){
    $new = $_SESSION['new'];
    echo $new;
}
?>

<a href="nextpage.php">click</a>


<!--second file (nextpage.php) -->
<?php
session_start();
$id = $_SESSION['id'];
$_SESSION['new'] = 2000;
echo $id;
echo '<a href="session_start.php"> back </a>';
?>
