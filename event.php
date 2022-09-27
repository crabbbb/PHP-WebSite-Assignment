<?php include 'helper.php'; ?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Event</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="event.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="livechat.css">
    <link rel="stylesheet" href="footer.css">
</head>
<body>
    <!---Head-->
    <div class="banner">
        <?php include 'header.php'; ?>
    </div>


<!---Header image - text-->
<div class="content">
    <h1>WELCOME TO EVENT</h1>
    <p>Amazing opportunities to have fun and learn<br>come visit now !!</p>

    <!---Search button-->
    <div>
        <a href="searchEvent.php">
            <button type="button"><span></span>Search Event</button></a>
    </div>

</div>


<!--Section Text--->
<section>
    <div class="title">
        <h2>Upcoming Events</h2>
        <div class="line"></div>
    </div>
</section>

<!--card event-->
<div class="site-container">
    <div class="article-container">
        <?php
        $sql = "SELECT event_id,event_name, event_address, event_image,event_price, event_date FROM events";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                //echo "<a href='detailEvent.php?event_id=";$img = $row["event_image"];
                echo "<a href='detail.php?event_id=" . $row["event_id"] . "'>";
                echo "<article class='article-card'>";
                echo "<figure class='article-image'>";
                echo '<img src="data:image;base64,' . base64_encode($row['event_image']) . '" alt="Image" />';
                echo "</figure>";
                echo "<div class='article-content'>";
                echo "<h3 class='card-title'>" . $row["event_name"] . "</h3>";
                echo "<p class='card-excerpt'>";
                echo "Venue : " . $row["event_address"];
                echo "<br>";
                echo "Entry Fee : RM" . $row["event_price"] . "/pax";
                echo "<br>";
                echo "Time : " . $row["event_date"];
                echo "<p/>";
                echo "</div>";
                echo "</article>";
                echo "</a>";
            }
        } else {
            echo "0 results";
        }
        ?>


    </div>
</div>


<!--Script-->
<script src="home_page (1).js"></script>

<script src="header.js"></script>

<!--livechat-->
<?php include 'livechat.php'; ?>


<!--footer-->
<?php include 'footer.php'; ?>

</body>

</html>