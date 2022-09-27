<?php
include 'helper.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $category = $_POST['category'];
    $img = $_POST['imgAnnounment'];

    //Check Name
    if (empty($name) || strlen($name) > 30) {
        $error['name'] = "<h3 style='color:red; text-align:center;'>"."Please insert a <b>announcement topic</b> with maximum 30 characters."."</h3>";
    }

    //Check Venue
    if (empty($category) || strlen($category) > 50) {
        $error['category'] = "<h3 style='color:red; text-align:center;'>"."Please enter a <b>announcement category</b> with maximum 50 characters."."</h3>";
    }

    if (isset($error)) {
        echo '<div class="alert alert-dismissible alert-warning">
              <h3 class="alert-heading" style="color:red; text-align:center; margin-top:25px;">Warning!</h3>
              <ul class="mb-0">';
        foreach ($error as $e => $t) {
            echo "<li>$t</li>";
        }
        echo '</ul></div>';
    } else {
        $sql = "INSERT INTO announcement (announcement_name, announcement_text, announcement_image, announcement_category) VALUES ('$name', '$detail', '$category', '$img')";
        if ($conn->query($sql) === TRUE) {
            echo "<h3 style='color:red; text-align:center; margin-top:25px;'>" . "New announcement created successfully" . "</h3>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

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
    body, html {
        height: 100%;
        background-color: rgb(212, 212, 212);
        box-sizing: border-box;
    }

    .mainscreen{
        min-height: 100vh;
        width: 100%;
        display: flex;
        flex-direction: column;
        color:#963E7B;
    }

    .card {
        width: 60rem;
        background: white;
        position:center;
        align-self: center;
        top: 50rem;
        border-radius: 1.5rem;
        box-shadow: 4px 3px 20px #3535358c;
        display:flex;
        flex-direction: row;
        margin-top: 25px;
        margin-bottom: 25px;
    }

    .leftside {
        background: url(add.jpg);
        background-repeat: no-repeat;
        background-size: auto 900px;
        width: 25rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-top-left-radius: 1.5rem;
        border-bottom-left-radius: 1.5rem;
    }

    .product {
        object-fit: cover;
        width: 20em;
        height: 20em;

    }

    .rightside {
        background-color: #ffffff;
        width: 35rem;
        border-bottom-right-radius: 1.5rem;
        border-top-right-radius: 1.5rem;
        padding: 1rem 2rem 3rem 3rem;
    }

    label{
        display:block;
        font-size: 1.1rem;
        font-weight: 400;
        margin: .8rem 0;
    }

    input
    {
        color:#030303;
        width: 100%;
        padding: 0.5rem;
        border: none;
        border-bottom: 1.5px solid #ccc;
        margin-bottom: 1rem;
        border-radius: 0.3rem;
        font-family: 'Roboto', sans-serif;
        color: #615a5a;
        font-size: 1.1rem;
        font-weight: 500;
        outline:none;
    }

    button{
        background: linear-gradient(135deg, #753370 0%, #298096 100%);
        padding: 15px;
        border: none;
        border-radius: 50px;
        color: white;
        font-weight: 400;
        font-size: 1.2rem;
        margin-top: 10px;
        width:100%;
        letter-spacing: .11rem;
        outline:none;
    }

    button:hover{
        transform: scale(1.05) translateY(-3px);
        box-shadow: 3px 3px 6px #38373785;
    }

    @media only screen and (max-width: 1000px) {
        .card{
            flex-direction: column;
            width: auto;
        }

        .leftside{
            width: 100%;
            border-top-right-radius: 0;
            border-bottom-left-radius: 0;
            border-top-right-radius:0;
            border-radius:0;
        }

        .rightside{
            width:auto;
            border-bottom-left-radius: 1.5rem;
            padding:0.5rem 3rem 3rem 2rem;
            border-radius:0;
        }
    }
</style>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add Announcement</title>
    </head>
    <body>
        <div class="mainscreen">
            <div class="card">
                <div class="leftside">

                </div>
                <div class="rightside">
                    <form method="post">
                        <h1 style="text-align:center;margin-bottom: 30px;margin-top: 20px;">Add Announcement</h1>

                        <label>Announcement Topic</label>
                        <input type="text" class="form-control" placeholder="Enter announcement topic" name="name" autocomplete="off" required>

                        <label>Announcement Detail</label>
                        <input type="text" class="form-control" placeholder="Enter announcement detail" name="detail" autocomplete="off">

                        <label>Announcement Category</label>
                        <input type="text" class="form-control" placeholder="Enter announcement category" name="category" autocomplete="off" required>

                        <label>Announcement image</label>
                        <input type="file" id="img" accept="image/*" name="imgAnnounment" required>

                        <label></label>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
