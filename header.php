<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="header.css"/>
    </head>
    <body>
        <header id="menu-bar">
            <h1 class="menu-content">Art Exhibition Society</h1>
            
            <div id="navMenu-icon" class="menu-content">
                <div class="menu_burger"></div>
            </div>


            <nav id="menu-list">
                <ul>
                    <li><a href="home_page.php">Home</a></li>
                    <li><a href="art_aboutus.php">About us</a></li>
                    <li><a href="title_menu.php">Menu</a></li>
                    <li><a href="event.php">Event</a></li>
                    <li><a href="BookingPage.php">Booking</a></li>
                    <li><a href="annoucement.php">Admin Announcement</a></li>
                    <div id="user-profile" style="text-align: center;">
                        <?php
                        if(isset($_SESSION['memberId'])){
                            $memberid = $_SESSION['memberId'];
                            $sql = "SELECT member_profile FROM member WHERE member_id = '$memberid'";
                            $result = $conn->query($sql);
                            if($result->num_rows > 0){
                                $row = $result->fetch_row();
                                if($row[0] != null){
                                    echo "<a href='userprofile.php'>"
                                    ?><img src='data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row[0]); ?>' alt='event_image' width="100px"><?php echo "</a><br>";
                                }else{
                                    echo '<a href="userprofile.php"><img src="logo.jpg" alt="user-profile" width="100px"></a><br>';
                                }
                            }
                        }else{
                            echo '<a href="userprofile.php"><img src="logo.jpg" alt="user-profile" width="100px"></a><br>';
                        }
                        
                        ?>
                        
                        <?php
                        if(isset($_SESSION['memberId'])){
                            echo "<p><a href='logout.php'>Logout</a></p>";
                        }else{
                            echo "<p><a href='signinsignup.php'>Login</a></p>";
                            echo "<p><a href='signinsignup.php'>Register Now</a></p>";
                        }
                        ?>
                    </div>
                </ul>
            </nav>      
        </header>
        <script src="header.js"></script> 
    </body>
</html>
