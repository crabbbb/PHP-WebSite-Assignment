<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Watermedia Showcase</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="detail.css">
        <link rel="stylesheet" href="header.css">
        <link rel="stylesheet" href="livechat.css">
        <link rel="stylesheet" href="footer.css">
    </head>

    <body>
        <!-- header-->
        <?php include 'header.php'; ?>
        <?php
        $servername = 'localhost';
        $username = 'assignment';
        $password = '1234';
        $dbname = 'assignment';

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $id = $_GET['event_id'];

        $sql = "SELECT event_name, event_detail, event_address, event_image,event_price, event_date FROM events WHERE event_id = $id";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            //detail card
            echo "<section>";
            //container
            echo "<div class='container flex'>";
            echo "<div class='left'>";
            //big image
            echo "<div class='main_image'>";
            echo '<img src="data:image;base64,' . base64_encode($row['event_image']) . '" width="550" height="500" alt="Image" />';
            echo "</div>";
            echo "</div>";
            //right site
            echo "<div class='right'>";
            echo "<h3>" . $row["event_name"] . "</h3>";
            echo "<h4>" . "RM " . $row["event_price"] . "/pax" . "</h4>";
            echo "<p>" . $row["event_detail"] . "</p>";
            echo "<h5>" . "Venue : " . $row["event_address"] . "</h5>";
            echo "<h5>" . "Time : " . $row["event_date"] . "</h5>";
            echo "<div class='btn1' style='text-align: center;'>" . "Book" . "</div>";
            echo "</div>";
            echo "</section>";
        }
        $conn->close();
        ?>

        <!---script-->
        <script src="home_page (1).js"></script>

        <script src="header.js"></script>

        <!--livechat-->
        <?php include 'livechat.php'; ?>


        <!--footer-->
        <?php include 'footer.php'; ?>
    </body>

</html>