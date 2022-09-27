<?php include('helper.php'); ?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Search Event</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="searchEvent.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="livechat.css">
</head>
<body>
<!-- header-->
          <?php include 'header.php'; ?>
    
    <!-- header big image-->
    <div class="search">
        <div class = "banner">
          <div class = "container">
            <h1 class = "banner-title">
              Search Event
            </h1>
            <p>search for competition, workshop and talk</p>
            <form>
                <div class="wrapper">
                    <div class="search-input">
                      <a href="" target="_blank" hidden></a>
                      <input type="text" placeholder="Type to search..">
                      <div class="autocom-box">
                        <!-- javascript -->
                      </div>
                      <!--search icon-->
                      <div class="icon"><i class="fas fa-search"></i></div>
                    </div>
                </div>

            </form>
          </div>
        </div>
      </div>

     

    <!--script-->
    <script src="home_page (1).js"></script>

    <!--search script-->
    <script src="searchEvent.js"></script> 
    <script>
      let suggestions = [
        "Watermedia Showcase Competition",
        "The Lumen For Digital Art Competition",
        "World Illustration Competition",
        "Strokes Of Genuis Competition",
        "Sip and Paint at Art & Bonding Workshop",
        "Fluid Pouring Workshop",
        "Arch Model Making Workshop",
        "Rug Tufting Workshop",
        "Art Talk By Maike Häusling",
      ];
    </script>
    
    <script src="header.js"></script>

</body>

    <!--footer-->
    <?php include 'footer.php'; ?>
</html>