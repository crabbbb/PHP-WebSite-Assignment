<?php
include 'header.php';
include 'livechat.php';
include 'helper.php';

$title = "Sip and Paint at Art & Bonding";
$eventId = 'abc';
$eventTime = 'Time  : 10 - 13 Dec 2022 (8am - 7pm)';

$e1 = "event_id";
$e2 = "event_name";
$e3 = "event_date";
$e4 = "event_image";

$date = date('Y-m-d H:i:s');

//$sql = "SELECT $e1, $e2, $e3, $e4 FROM events WHERE event_date > $date ORDER BY $e1";
$sql = "SELECT $e1, $e2, $e3, $e4 FROM events ORDER BY $e1";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="homepage.css">
    </head>
    <body>
        <!--slide show-->
        <div id = "slideshow-box">
            <div id="title">
                <h1>WELCOME TO ART EXHIBITION SOCIETY</h1>
            </div>
            <div id="btn">
                <a href="title_menu.php"><button><p>VIEW ARTWORK</p></button></a>
            </div>
            <div id="contain"><!--contain the total num of pic 5pic = 500% width-->
                <!--ttl 5 of image-->
                <div class="slideshow-pic-box" id="slide1">
                    <img src="slide_image_3.jpg" alt="slide image">
                </div>
                <div class="slideshow-pic-box" id="slide2">
                    <img src="slide_image_2.jpg" alt="slide image">
                </div>
                <div class="slideshow-pic-box" id="slide3">
                    <img src="slide_image_4.jpg" alt="slide image">
                </div>
                <div class="slideshow-pic-box" id="slide4">
                    <img src="slide_image_1.png" alt="slide image">
                </div>
                <div class="slideshow-pic-box" id="slide5">
                    <img src="slide_image_5.png" alt="slide image">
                </div>
            </div>
        </div>
        <script src="home_page.js"></script>

        <!--card list-->
        <!--#49497E-->
        <div id="eventList">
            <h1>OUR FAMOUS EVENT</h1>
            <div class="wrapper">
                <div class="carousel">
                    <?php
                    $size = 0;
                    while (($row = $result->fetch_assoc()) && $size < 5) {
                        //print out the event_name , and date time 
                        //event id set as the value
                        //$row[columName]
                        if ($row[$e3] > $date) {
                            echo "<a href='detail.php?id=$row[$e1]'>
                        <div class='card'>
                        "
                            ?>
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row[$e4]); ?>" alt="event_image"> 
                            <?php
                            echo "<h1 class='title'>$row[$e2]</h1>
                            <p class='time'>Time  : $row[$e3]</p>
                        </div>
                    </a>";
                            $size++;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="box-about">
            <div class="colbox"></div>
            <div class="colbox2">
                <h1>#KNOW MORE ABOUT US#</h1>
                <button><a href="art_aboutus.php">&#8594;</a></button>
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>
    </body>
</html>