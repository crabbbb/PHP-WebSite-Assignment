<?php
session_start();
include 'helper.php';
include 'header.php';
include 'livechat.php';

$date = date('Y-m-d H:i:s');

//get from events
$e1 = "event_id";
$e2 = "event_name";
$e3 = "event_date";
$e4 = "event_address";
$e5 = "event_price";

//get from eventlist
$el1 = "eventlist_quantity";

//get exhibition
$ex1 = "exhibition_id";
$ex2 = "exhibition_name";

//get orderlist
$ol1 = "orderlist_quantity";

//get ticket
$t1 = "ticket_date";
$t2 = "ticket_location";
$t3 = "ticket_price";

//get the user id from session
$id = $_SESSION['memberId'];
//$id = 1000;

//select for events
$sql1 = "SELECT * FROM events e, eventlist el, orders o WHERE o.member_id = '$id' AND o.orders_id = el.orders_id AND el.event_id = e.event_id";

$sql2 = "SELECT * FROM orders o, orderlist ol, ticket t, exhibition ex WHERE o.member_id = '$id' AND o.orders_id = ol.orders_id AND ol.ticket_id = t.ticket_id AND t.exhibition_id = ex.exhibition_id";
?>
<!DOCTYPE html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Review Page</title>
        <link rel="stylesheet" href="BookingPage.css">
    </head>
    <body>
        <div class="content-box">
            <h1>WELCOME TO BOOKING REVIEW PAGE !!!</h1>
            <div class="middle">
                <div class="table-box">
                    <div class="title-show">
                        <h1 class="title">On Coming Event</h1>
                        <h1 class="button">&#8595;</h1>
                    </div>
                    <div class="on-coming">
                        <div class="table-boxs" style="height: 160px;">
                            <table>
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Event ID</th>
                                        <th>Event Name</th>
                                        <th>Date & Time</th>
                                        <th>Location</th>
                                        <th>No. Of Pax</th>
                                        <th>Amount (RM)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $noresult = 0;
                                    $noOfRow = 1;
                                    $result1 = $conn->query($sql1);
                                    if($result1->num_rows > 0){
                                        while($row = $result1->fetch_assoc()){
                                            //event name | event date & time | event location | no of ticket buy | ttlamount pay(RM)
                                            if($row1[$e5] >= $date){
                                                echo '<tr>
                                                    <td>'.$noOfRow.'</td>
                                                    <td>'.$row[$e1].'</td>
                                                    <td>'.$row[$e2].'</td>
                                                    <td>'.$row[$e3].'</td>
                                                    <td>'.$row[$e4].'</td>
                                                    <td>'.$row[$el1].'</td>
                                                    <td>'.($row[$e5]*$row[$el1]).'</td>
                                                </tr>';
                                                $noOfRow++;
                                                $noresult++;
                                            }
                                        }
                                    }
                                    
                                    $result2 = $conn->query($sql2);
                                    if($result2->num_rows > 0){
                                        while($row = $result2->fetch_assoc()){
                                            //event name | event date & time | event location | no of ticket buy | ttlamount pay(RM)
                                            if($row[$t1] >= $date){
                                                echo '<tr>
                                                    <td>'.$noOfRow.'</td>
                                                    <td>'.$row[$ex1].'</td>
                                                    <td>'.$row[$ex2].'</td>
                                                    <td>'.$row[$t1].'</td>
                                                    <td>'.$row[$t2].'</td>
                                                    <td>'.$row[$ol1].'</td>
                                                    <td>'.($row[$t3]*$row[$ol1]).'</td>
                                                </tr>';
                                                $noOfRow++;
                                                $noresult++;
                                            }
                                        }
                                    }
                                    
                                    if($noresult == 0){
                                        echo '<tr><td colspan="7">No Record Found</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="middle">
                <div class="table-box">
                    <div class="title-show">
                        <h1 class="title">History</h1>
                        <h1 class="button">&#8595;</h1>
                    </div>
                    <div class="on-coming">
                        <div class="table-boxs" style="height: 160px;">
                            <table>
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Event ID</th>
                                        <th>Event Name</th>
                                        <th>Date & Time</th>
                                        <th>Location</th>
                                        <th>No. Of Pax</th>
                                        <th>Amount (RM)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $noresult = 0;
                                    $noOfRow = 1;
                                    $result1 = $conn->query($sql1);
                                    if($result1->num_rows > 0){
                                        while($row1 = $result1->fetch_assoc()){
                                            //event name | event date & time | event location | no of ticket buy | ttlamount pay(RM)
                                            if($row1[$e5] < $date){
                                                echo '<tr>
                                                    <td>'.$noOfRow.'</td>
                                                    <td>'.$row1[$e1].'</td>
                                                    <td>'.$row1[$e2].'</td>
                                                    <td>'.$row1[$e3].'</td>
                                                    <td>'.$row1[$e4].'</td>
                                                    <td>'.$row1[$el1].'</td>
                                                    <td>'.($row1[$e5]*$row1[$el1]).'</td>
                                                </tr>';
                                                $noOfRow++;
                                                $noresult++;
                                            }
                                        }
                                    }
                                    
                                    $result2 = $conn->query($sql2);
                                    if($result2->num_rows > 0){
                                        while($row2 = $result2->fetch_assoc()){
                                            //event name | event date & time | event location | no of ticket buy | ttlamount pay(RM)
                                            if($row2[$t1] < $date){
                                                echo '<tr>
                                                    <td>'.$noOfRow.'</td>
                                                    <td>'.$row2[$ex1].'</td>
                                                    <td>'.$row2[$ex2].'</td>
                                                    <td>'.$row2[$t1].'</td>
                                                    <td>'.$row2[$t2].'</td>
                                                    <td>'.$row2[$ol1].'</td>
                                                    <td>'.($row2[$t3]*$row2[$ol1]).'</td>
                                                </tr>';
                                                $noOfRow++;
                                                $noresult++;
                                            }
                                        }
                                    }
                                    
                                    if($noresult == 0){
                                        echo '<tr><td colspan="7">No Record Found</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="empty"></div>
        <script>
            let toggles = document.getElementsByClassName('title-show');
            let contentDiv = document.getElementsByClassName('on-coming');

            for (let i = 0; i < toggles.length; i++) {//3
                toggles[i].addEventListener('click', () => {
                    if (parseInt(contentDiv[i].style.height) != contentDiv[i].scrollHeight) {
                        const h = contentDiv[i].scrollHeight;

                        contentDiv[i].style.height = h + "px";
                        toggles[i].style.color = "#49497E";
                    } else {
                        contentDiv[i].style.height = "0px";
                        toggles[i].style.color = "#000";
                        emptybox[i].style.height = "250px";
                    }

                    for (let j = 0; j < contentDiv.length; j++) {
                        if (j !== i) {
                            contentDiv[j].style.height = "0px";
                            toggles[j].style.color = "#000";
                        }
                    }
                });
            }
        </script>
        <?php
        include 'footer.php';
        ?>
    </body>
</html>
