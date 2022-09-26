<?php
include 'header.php';
include 'livechat.php'


?>
<!DOCTYPE html>
<html lang="en">
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
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Location</th>
                                    <th>No. Of Pax</th>
                                    <th>Amount (RM)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>The Lumen For Digital Art</td>
                                    <td>2 Dec 2022</td>
                                    <td>1pm - 4pm</td>
                                    <td>Ground Floor of art building</td>
                                    <td>3</td>
                                    <td>111.3</td>
                                </tr>
                                <tr>
                                    <td>The Lumen For Digital Art</td>
                                    <td>2 Dec 2022</td>
                                    <td>1pm - 4pm</td>
                                    <td>Ground Floor of art building</td>
                                    <td>3</td>
                                    <td>111.3</td>
                                </tr>
                                <tr>
                                    <td>The Lumen For Digital Art</td>
                                    <td>2 Dec 2022</td>
                                    <td>1pm - 4pm</td>
                                    <td>Ground Floor of art building</td>
                                    <td>3</td>
                                    <td>111.3</td>
                                </tr>
                                <tr>
                                    <td>The Lumen For Digital Art</td>
                                    <td>2 Dec 2022</td>
                                    <td>1pm - 4pm</td>
                                    <td>Ground Floor of art building</td>
                                    <td>3</td>
                                    <td>111.3</td>
                                </tr>
                                <tr>
                                    <td>The Lumen For Digital Art</td>
                                    <td>2 Dec 2022</td>
                                    <td>1pm - 4pm</td>
                                    <td>Ground Floor of art building</td>
                                    <td>3</td>
                                    <td>111.3</td>
                                </tr>
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
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Location</th>
                                    <th>No. Of Pax</th>
                                    <th>Amount (RM)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>The Lumen For Digital Art</td>
                                    <td>2 Dec 2022</td>
                                    <td>1pm - 4pm</td>
                                    <td>Ground Floor of art building</td>
                                    <td>3</td>
                                    <td>111.3</td>
                                </tr>
                                <tr>
                                    <td>The Lumen For Digital Art</td>
                                    <td>2 Dec 2022</td>
                                    <td>1pm - 4pm</td>
                                    <td>Ground Floor of art building</td>
                                    <td>3</td>
                                    <td>111.3</td>
                                </tr>
                                <tr>
                                    <td>The Lumen For Digital Art</td>
                                    <td>2 Dec 2022</td>
                                    <td>1pm - 4pm</td>
                                    <td>Ground Floor of art building</td>
                                    <td>3</td>
                                    <td>111.3</td>
                                </tr>
                                <tr>
                                    <td>The Lumen For Digital Art</td>
                                    <td>2 Dec 2022</td>
                                    <td>1pm - 4pm</td>
                                    <td>Ground Floor of art building</td>
                                    <td>3</td>
                                    <td>111.3</td>
                                </tr>
                                <tr>
                                    <td>The Lumen For Digital Art</td>
                                    <td>2 Dec 2022</td>
                                    <td>1pm - 4pm</td>
                                    <td>Ground Floor of art building</td>
                                    <td>3</td>
                                    <td>111.3</td>
                                </tr>
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

        for(let i=0; i<toggles.length; i++){//3
            toggles[i].addEventListener('click',()=>{
                if(parseInt(contentDiv[i].style.height) != contentDiv[i].scrollHeight){
                    const h = contentDiv[i].scrollHeight;
                    
                    contentDiv[i].style.height = h + "px";
                    toggles[i].style.color="#49497E";
                }
                else{
                    contentDiv[i].style.height = "0px";
                    toggles[i].style.color = "#000";
                    emptybox[i].style.height = "250px";
                }

                for(let j=0; j<contentDiv.length; j++){
                    if(j !==i){
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
