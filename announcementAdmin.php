<?php include('helper.php'); ?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Announcement</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">
</head>
<style type="text/css">
    *{
        margin: 0;
        padding: 0;
        font-family: EBGaramond, sans-serif;
        src: url(EBGaramond-Regular.ttf);
    }
    ::selection{
        background-color: #788fa4;
        color: #fff;
    }
    body,html {
        height: 100%;
        background-color: rgb(212, 212, 212);
    }
    .styled-table {
        background-color: #fff;
        border-collapse: collapse;
        margin-top: 25px;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 25px;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 400px;
        width: 1350px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }
    .styled-table thead tr {
        background: linear-gradient(45deg, #49a09d, #5f2c82);
        color: #ffffff;
        text-align: center;
    }
    .styled-table th,
    .styled-table td {
        padding: 12px 15px;
        text-align: center;
    }
    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) { /*22222*/
        background-color: #f3f3f3;
    }

    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #49a09d;
    }
    .styled-table tbody tr.active-row {
        font-weight: bold;
        color: #009879;
    }

    button {
        align-items: center;
        background-color: #FFFFFF;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: .25rem;
        box-shadow: rgba(0, 0, 0, 0.02) 0 1px 3px 0;
        box-sizing: border-box;
        color: rgba(0, 0, 0, 0.85);
        cursor: pointer;
        display: inline-flex;
        font-size: 16px;
        font-weight: 600;
        justify-content: center;
        line-height: 1.25;
        margin: 2px;
        padding: calc(.875rem - 1px) calc(1.5rem - 1px);
        position: relative;
        text-decoration: none;
        transition: all 250ms;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        vertical-align: baseline;
        width: 58px;
        height: 40px;
    }

    button:hover,
    button:focus {
        border-color: rgba(0, 0, 0, 0.15);
        box-shadow: rgba(0, 0, 0, 0.1) 0 4px 12px;
        color: rgba(0, 0, 0, 0.65);
    }

    button:hover {
        transform: translateY(-1px);
    }

    button:active {
        background-color: #F0F0F1;
        border-color: rgba(0, 0, 0, 0.15);
        box-shadow: rgba(0, 0, 0, 0.06) 0 2px 4px;
        color: rgba(0, 0, 0, 0.65);
        transform: translateY(0);
    }


    /*Header big image*/
    .banner{
        width: 100%;
        height: 50vh;
        background-image: linear-gradient(rgba(31, 31, 31, 0.75),
            rgba(31, 31, 31, 0.75)),url(eventHeader.jpg);
        background-size: cover;
        background-position: center;
    }

    /*Header image text*/
    .content{
        width: 100%;
        position: absolute;
        top: 25%;
        transform: translateY(-50%);
        text-align: center;
        color: #fff;
    }
    .content h1{
        font-size: 70px;
        margin-top: 60px;
    }
    .content p{
        margin: 20px auto;
        font-weight: 100;
        line-height: 25px;
    }


    /* header image*/
    .big-image {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("background.jpg");
        height: 60vh;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
    }

    /* header image - text*/
    .big-text {
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
    }

    .band {
        -webkit-font-smoothing: antialiased; /*smooth the graphic and px~ to improved image quality alsoo*/
        padding: 20px 0;
        width: 90%;
        max-width: 1240px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr;
        grid-template-rows: auto;
        grid-gap: 20px;
    }

    @media only screen and (min-width: 500px) {
        .band {
            grid-template-columns: 1fr 1fr;
        }
        .item-1 {
            grid-column: 1/ span 2;
        }
        .item-1 h1 {
            font-size: 30px;
        }
    }

    @media only screen and (min-width: 850px) {
        .band {
            grid-template-columns: 1fr 1fr 1fr 1fr;
        }
    }

</style>

<body>

    <!-- header-->
    <?php include 'header.php'; ?>

    <!---Header big image--->
    <div class="big-image">
        <div class="big-text">
            <h1 style="font-size: 65px; margin-top: 70px;">ADMIN ANNOUNCEMENT</h1>
        </div>
    </div>

    <a href='addAnnoucement.php'><img src="plus5.png" alt="alt" style="width:40px; height: 40px; margin-top: 20px; margin-left:100px;"/></a>

    <table class="styled-table">
        <?php
        $sql = "SELECT announcement_id, announcement_name, announcement_text, announcement_category FROM announcement";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<thead>
                        <tr>
                            <th>Announcement ID</th>
                            <th>Name</th>
                            <th>Detail</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>";
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tbody>"; //start
                echo "<tr><td style='width:150px;'>"//id
                . $row["announcement_id"] .
                "</td><td style='text-align:center; width:180px;'>" . //name
                $row["announcement_name"] .
                "</td><td style='width:240px;text-align:justify;'>" . //detail
                $row["announcement_text"] .
                "</td><td style='width:150px;'>" . //category
                $row["announcement_category"] .
                "</td><td style='width:200px;'>" . //button
                "<a href='editAnnoucement.php?announcement_id=" . $row["announcement_id"] . "'><button>Edit</button></a>" .
                "<a href='deleteAnnoucement.php?announcement_id=" . $row["announcement_id"] . "'><button>Delete</button></a>" .
                "</td></tr>";
                echo "</tbody>"; //end
            }
        } else {
            echo "0 results";
        }
        ?>

    </table>

    <script src="header.js"></script>


    <!--footer-->
    <?php include 'footer.php'; ?>
</body>
