<?php include 'helper.php'; ?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Announcement</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="annoucement.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="livechat.css">
    <link rel="stylesheet" href="footer.css">
</head>

<style>
    .edit {
        margin-top: 10px;
        margin-left: 1300px;
        background: linear-gradient(to bottom right, #2d74c4, #d13aa4);
        border: 0;
        border-radius: 12px;
        color: #FFFFFF;
        cursor: pointer;
        display: inline-block;
        font-size: 16px;
        font-weight: 500;
        line-height: 2.5;
        outline: transparent;
        padding: 0 1rem;
        text-align: center;
        text-decoration: none;
        transition: box-shadow .2s ease-in-out; /*specifies a transition effect with a slow start and end*/
        white-space: nowrap;/*collapse into a single whitespace, the text will never wrap to the next line.*/
    }

    .edit:not([disabled]):focus {
        box-shadow: 0 0 .25rem rgba(0, 0, 0, 0.5), -.125rem -.125rem 1rem rgba(239, 71, 101, 0.5), .125rem .125rem 1rem rgba(255, 154, 90, 0.5);
    }

    .edit:not([disabled]):hover { /*button hover background*/
        box-shadow: 0 0 .25rem rgba(0, 0, 0, 0.5), -.125rem -.125rem 1rem rgba(239, 71, 101, 0.5), .125rem .125rem 1rem rgba(255, 154, 90, 0.5);
    }

</style>

<body>
    <!-- header-->
    <?php include 'header.php'; ?>

    <!---Header big image--->
    <div class="big-image">
        <div class="big-text">
            <h1 style="font-size: 70px; margin-top: 70px;">ANNOUNCEMENT</h1>
            <p style="font-size: 18px; margin-top: 20px;">Don't miss up any important news !!</p>
        </div>
    </div>

    <!---Edit button-->
    <a href="announcementAdmin.php">
    <button class="edit" role="button">EDIT</button>
    </a>

    <!---Card-->
    <div class="band">
        <?php
        $sql = "SELECT announcement_image,announcement_name, announcement_text, announcement_category FROM announcement";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='item-6'>";
                echo "<a href='#' class='card'>";
                echo "<div class='thumb' style='background-image: url(a2.jpg);'></div>";
                echo "<article>";
                echo "<h1>" . $row["announcement_name"] . "</h1>";
                echo "<p>" . $row["announcement_text"] . "</p>";
                echo "<span>" . $row["announcement_category"] . "</span>";
                echo "</article>";
                echo "</a>";
                echo "</div>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </div>
    <!----Script-->
    <script src="home_page (1).js"></script>

    <script src="header.js"></script>

    <!--livechat-->
    <?php include 'livechat.php'; ?>


    <!--footer-->
    <?php include 'footer.php'; ?>
</body>

</html>