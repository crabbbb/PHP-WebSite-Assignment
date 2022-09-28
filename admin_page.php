<?php
session_start();
include 'header.php';
include 'helper.php';

$name = $_SESSION['staffName'];
//$name = "ERIKA";
$sql = "SELECT MONTH(o.orders_date) as month, YEAR(o.orders_date) as year, t.ticket_price, ol.orderlist_quantity FROM orders o, orderlist ol, ticket t WHERE o.orders_id = ol.orders_id AND ol.ticket_id = t.ticket_id";

$sql2 = "SELECT MONTH(o.orders_date) as month, YEAR(o.orders_date) as year, e.event_price, el.eventlist_quantity FROM orders o, eventlist el, events e WHERE o.orders_id = el.orders_id AND el.event_id = e.event_id";

$y = "year";
$m = "month";
$t = "ticket_price";
$oq = "orderlist_quantity";

$eq = "eventlist_quantity";
$e = "event_price";

$thisMonth = date('m');
$thisYear = date('Y');
$thisMonthQuantity = 0.0;

$result = $conn->query($sql);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        if($thisYear == $row[$y] && $thisMonth == $row[$m]){
            $thisMonthQuantity = $thisMonthQuantity + ($row[$oq]*$row[$t]);
        }
    }
}

$result = $conn->query($sql2);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        //have record
        if($thisYear == $row[$y] && $thisMonth == $row[$m]){
            $thisMonthQuantity = $thisMonthQuantity + ($row[$eq]*$row[$e]);
        }
    }
}

$getnearestEvent = "SELECT event_name, event_date, event_id FROM events WHERE event_date >= sysdate()";
$getnearestExhibition = "SELECT e.exhibition_name, t.ticket_date, e.exhibition_id FROM exhibition e, ticket t WHERE e.exhibition_id = t.exhibition_id AND t.ticket_date >= sysdate()";

$compareEvent;
$compareExhibition;

$result = $conn->query($getnearestEvent);
if($result->num_rows > 0){
    $row = $result->fetch_row();
    $compareEvent = $row;
}

$result = $conn->query($getnearestExhibition);
if($result->num_rows > 0){
    $row = $result->fetch_row();
    $compareExhibition = $row;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin_page.css">
</head>
<body>
    <div class="big-box">
        <div class="admin-header">
            <div class="boxbox">
                <h1 class="admin-profile-name">Hi <?=$name?> </h1>
                <div class="ttlamout function-card">
                    <h3>&#11088; The total amount get in this month : </h3>
                    <h4>$ <?=round($thisMonthQuantity*100)/100?></h4>
                </div>
                <div class="function-card">
                    <!-- for on coming event only show oneces -->
                    <h3>&#11088; On Coming Event : </h3>
                        <?php
                        if($compareEvent != null && $compareExhibition != null){
                            if($compareEvent[1] > $compareExhibition[1]){
                                echo "<h4><a href='menu.php?id=$compareExhibition[2]'>".$compareExhibition[0]."</a></h4>";
                            }else{
                                echo "<h4><a href='detail.php?id=$compareEvent[2]'>".$compareEvent[0]."</a></h4>";
                            }
                        }else if($compareEvent == null && $compareExhibition != null){
                            echo "<h4><a href='menu.php?id=$compareExhibition[2]'>".$compareExhibition[0]."</a></h4>";
                        }else if($compareEvent != null && $compareExhibition == null){
                            echo "<h4><a href='detail.php?id=$compareEvent[2]'>".$compareEvent[0]."</a></h4>";
                        }else{
                            echo '<h4 class="nofound">No Record Found</h4>';
                        }
                        ?>
                </div>
            </div>
            <div class="img-box"><img src="clipart640890.png" alt=""></div>
        </div>
    </div>
    <h1> ~ Management Menu ~ </h1>
    <div class="management-box">
        <a href="#">
            <div class="box box1">
                <div class="content">
                    <h4 class="title">EVENT</h4><br>
                    <h4 class="small-title">Management</h4>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="box box2">
                <div class="content">
                    <h4 class="title">TICKET</h4><br>
                    <h4 class="small-title">Management</h4>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="box box3">
                <div class="content">
                    <h4 class="title">ARTWORK</h4><br>
                    <h4 class="small-title">Management</h4>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="box box4">
                <div class="content">
                    <h4 class="title">EXHIBITION</h4><br>
                    <h4 class="small-title">Management</h4>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="box box5">
                <div class="content">
                    <h4 class="title">USER</h4><br>
                    <h4 class="small-title">Management</h4>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="box box6">
                <div class="content">
                    <h4 class="title">SEAT</h4><br>
                    <h4 class="small-title">Management</h4>
                </div>
            </div>
        </a>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>
</html>
