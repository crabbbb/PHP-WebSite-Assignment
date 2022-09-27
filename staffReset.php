<?php
include 'helper.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $password = $_POST['password'];
    $id = $_POST['staff'];

    //Check password
    if (empty($password) || strlen($password) > 20) {
        $error['password'] = "<h3 style='color:red; text-align:center;'>" . "Please insert a <b>password</b> with maximum 20 characters." . "</h3>";
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
        $sql = "UPDATE staff SET staff_pass = '$password' WHERE staff_id='$id' ";
        if ($conn->query($sql) === TRUE) {
            echo "<h3 style='color:red; text-align:center; margin-top:25px;'>" . "Reset password successfully" . "</h3>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<style type="text/css">
    @charset "utf-8";
    *{
        margin: 0;
        padding: 0;
        font-family: EBGaramond, sans-serif;
        src: url(EBGaramond-Regular.ttf);
    }

    body{
        background-image: linear-gradient(rgba(92, 89, 89, 0.067),rgba(92, 89, 89, 0.067)),url(password1.png);
        background-position: center;
        background-size: cover;
    }

    /*forgot password form*/
    .container{
        width: 360px;
        height: 400px;
        margin: 10% auto;/*form site*/
        background: #fff;
        border-radius: 5px;
        position: relative;
        overflow: hidden;
    }
    h2{
        text-align: center;
        margin-top: 80px;
        margin-bottom: 20px;
        color: #777;
    }
    .container form{
        width: 280px;
        position: absolute;
        left: 40px;
        transition: 0.5s;
    }
    form input{
        width: 100%;
        padding: 10px 5px;
        margin: 5px 0;
        border: 0;
        border-bottom: 1px solid #999;
        outline: none;
        background: transparent;
    }
    ::placeholder{
        color: #777;
    }
    .btn-box{
        width: 100%;
        margin: 20px auto;
        text-align: center;
    }
    form button{
        width: 110px;
        height: 35px;
        margin: 0 10px;
        background: linear-gradient(to right, #ff105f, #ffad06);
        border-radius: 30px;
        border: 0;
        outline: none;
        color: #fff;
        cursor: pointer;
    }
    form button:hover{
        width: 115px;
        height: 38px;
        margin: 0 10px;
        background: red;
        border-radius: 30px;
        border: 0;
        outline: none;
        color: #fff;
        cursor: pointer;
    }
    /*go to sign up*/
    .signup_link{
        margin: 30px 0;
        text-align: center;
        font-size: 16px;
        color: #666666;
    }
    .signup_link a{
        color: #2691d9;
        text-decoration: none;
    }
    .signup_link a:hover{
        color: red;
        text-decoration: underline;
    }
    /*form site*/
    #Form2{
        left: 450px;
    }
    #Form3{
        left: 450px;
    }
    /*step*/
    .step-row{
        width: 360px;
        height: 40px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        box-shadow: 0 -1px 5px -1px #000;
        position: relative;
        background: linear-gradient(to right, #ff105f, #ffad06); /*color need to right - red to yellow*/
    }
    
    
</style>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Forgot password</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="header.css">
</head>
<body>


    <?php include 'header.php'; ?>


    <!--forgot password form-->
    <div class="container">
        <!--Page1-->

        <form id="Form1" method="post">
            <h2>Forgot Password ?</h2>
            <input type="text" placeholder="Staff id" name="staff" required>
            <input type="password" class="form-control" minlength="3" name="password" autocomplete="off" placeholder="Password" required>
            <input type="password" class="form-control" minlength="3" name="password" autocomplete="off" placeholder="Comfirm Password" required>


            <div class="btn-box">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>

            <!--link to sign up page-->
            <div class="signup_link">
                Not a staff? <a href="signinsignup.php">Signup</a>
            </div>
        </form>
        
        <div class="step-row">
            
        </div>
        
    </div>

    <script src="home_page (1).js"></script>
    <script src="header.js"></script>

</body>
</html>