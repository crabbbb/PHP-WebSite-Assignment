<?php
session_start();

include 'helper.php';
$nofounded = false;
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if($_POST['submit'] == "Login"){
        $loginEmail = trim($_POST['loginEmail']);
        $loginPassword = trim($_POST['loginPassword']);
        $nofounded = false;
        
        if(empty($loginEmail)){
            $errorLogin['loginEmail'] = "Please enter your email";
        }else if(!filter_var($loginEmail, FILTER_VALIDATE_EMAIL)){
            $errorLogin['loginEmail'] = "Invalid email format";
        }
        
        if(empty($loginPassword)){
            $errorLogin['loginPassword'] = "Password cannot be empty";
        }
        
        if(!isset($errorLogin)){
            $checkMember = "SELECT member_id, member_name FROM member WHERE member_email = '$loginEmail' AND member_password = '$loginPassword'";
            $checkStaff = "SELECT staff_id, staff_name FROM staff WHERE staff_email = '$loginEmail' AND staff_pass = '$loginPassword'";
            $result = $conn->query($checkMember);
            if($result->num_rows > 0){
                $row = $result->fetch_row();
                $_SESSION['loginmember'] = true;
                $_SESSION['memberId'] = $row[0];
                $_SESSION['memberName'] = $row[1];
            }else{
                $result = $conn->query($checkStaff);
                if($result->num_rows > 0){
                    $row = $result->fetch_row();
                    $_SESSION['loginstaff'] = true;
                    $_SESSION['staffId'] = $row[0];
                    $_SESSION['staffName'] = $row[1];
                }else{
                    $nofounded = true;
                    $errorLogin['nofound'] = "Account havent be register, please register first";
                }
                //$errorLogin['nofound'] = "Account havent be register, please register first";
            }
        }
        
        if(!isset($errorLogin) && isset($_SESSION['memberId'])){
            unset($loginEmail);
            header("location: home_page.php");
        }else if(!isset($errorLogin) && isset($_SESSION['staffId'])){
            unset($loginEmail);
            header("location: admin_page.php");
        }
        
    }else{
        $userName = trim($_POST['uName']);
        $userPhNo = trim($_POST['uPhNo']);
        $userEmail = trim($_POST['uEmail']);
        $userPass = trim($_POST['uPass']);
        $userPassConfirm = trim($_POST['uPassConfirm']);
        
        if(empty($userName)){
            $errorRegister['userName'] = "Please enter your user name";
        }else if(strlen($userName) > 30){
            $errorRegister['userName'] = "Maximum length 30";
        }
        
        if(empty($userPhNo)){
            $errorRegister['userPhNo'] = "Please enter your user phone no";
        }else if(!preg_match("/^[0-9]*$/", $userPhNo) || strlen($userPhNo) > 10){
            $errorRegister['userPhNo'] = "Invalid phone no";
        }
        
        //example : 8888Az@jj
        if(empty($userPass)){
            $errorRegister['userPass'] = "Please enter your password";
        }else if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,20}$/', $userPass)){
            $errorRegister['userPass'] = "Password must a least one letter, number and special symbol (8-20 length)";
        }
        
        if(empty($userPassConfirm)){
            $errorRegister['userPassConfirm'] = "Please enter your password again";
        }else if(strcmp($userPassConfirm, $userPass) != 0){
            $errorRegister['userPassConfirm'] = "Password input are not equal";
        }
        
        if(empty($userEmail)){
            $errorRegister['userEmail'] = "Please enter your email";
        }else if(!filter_var($userEmail, FILTER_VALIDATE_EMAIL)){
            $errorRegister['userEmail'] = "Invalid email format";
        }else{
            //check email repeat use 
            if(!isset($errorLogin['userEmail'])){
                $chkMemEmailRepeat = "SELECT * FROM member WHERE member_email = '$userEmail'";
                $chkStaffEmailRepeat = "SELECT * FROM staff WHERE staff_email = '$userEmail'";

                $result = $conn->query($chkMemEmailRepeat);
                if($result->num_rows > 0){
                    $errorRegister['userEmail'] = "Email have aready been use";
                }
                $result = $conn->query($chkStaffEmailRepeat);
                if($result->num_rows > 0){
                    $errorRegister['userEmail'] = "Email have aready been use";
                }
            }
        }
        
        if(!isset($errorRegister)){
            $insertRecord = "INSERT INTO member (member_name, member_password, member_email, member_phNo) VALUES (?, ?, ?, ?)";
            if ($stmt = $conn->prepare($insertRecord)){
                $stmt->bind_param("ssss", $userName, $userPass, $userEmail, $userPhNo);
                if ($stmt->execute()){
                    $success = true;
                    //header("location: signinsignup.php");
                }else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
                
                $stmt->close();
            }
        }
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="signinsignup.css" />
    <title>art_signuplogin</title>
  </head>

  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
            <!--self passing-->
            <form action="<?= $_SERVER['PHP_SELF']?>" method="POST" class="sign-in-form">
            <?php
            if($success == true){
                echo "<h4 class='success-register'> &#128276; Register Successfull Please Try To Login</h4>";
            }
            ?>
            <h2 class="title">Sign in</h2>
            <div class="input-field <?php echo (!empty($errorLogin['loginEmail'])) ? 'errorlogin' : ''; ?> <?= $nofounded==true?'errorlogin':'' ?>">
                <input type="text" class="input-box" placeholder="Email" name="loginEmail" <?= !isset($loginEmail)?:"value='$loginEmail'" ?>>
            </div>
            <?php
            if(isset($errorLogin['loginEmail'])){
                echo "<p class='error-message'> &#128161;".$errorLogin['loginEmail']."</p>";
            }
            ?>
            <div class="input-field <?php echo (!empty($errorLogin['loginPassword'])) ? 'errorlogin' : ''; ?> <?= $nofounded==true?'errorlogin':'' ?>" >
                <input type="password" placeholder="Password" name="loginPassword"/>
            </div>
            <?php
            if(isset($errorLogin['loginEmail'])){
                echo "<p class='error-message'> &#128161;".$errorLogin['loginPassword']."</p>";
            }
            
            if($nofounded == true){
                echo "<p class='error-message'> &#128161;".$errorLogin['nofound']."</p>";
            }
            ?>
             <a href="password2.html">Forgot Password?</a>
            <input type="submit" value="Login" class="btn solid" name="submit"/>
          </form>

          <form action="<?= $_SERVER['PHP_SELF']?>" method="POST" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field <?php echo (!empty($errorRegister['userName'])) ? 'errorlogin' : ''; ?>">
              <input type="text" placeholder="Name" name="uName" <?= !isset($userName)?:"value='$userName'" ?>/>
            </div>
            <?php
            if(isset($errorRegister['userName'])){
                echo "<p class='error-message'> &#128161;".$errorRegister['userName']."</p>";
            }
            ?>
            <div class="input-field <?php echo (!empty($errorRegister['userPhNo'])) ? 'errorlogin' : ''; ?>">
              <input type="text" placeholder="Phone no." name="uPhNo" <?= !isset($userPhNo)?:"value='$userPhNo'" ?>/>
            </div>
            <?php
            if(isset($errorRegister['userPhNo'])){
                echo "<p class='error-message'> &#128161;".$errorRegister['userPhNo']."</p>";
            }
            ?>
            <div class="input-field <?php echo (!empty($errorRegister['userEmail'])) ? 'errorlogin' : ''; ?>">
              <input type="text" placeholder="Email" name="uEmail" <?= !isset($userEmail)?:"value='$userEmail'" ?>/>
            </div>
            <?php
            if(isset($errorRegister['userEmail'])){
                echo "<p class='error-message'> &#128161;".$errorRegister['userEmail']."</p>";
            }
            ?>
            <div class="input-field <?php echo (!empty($errorRegister['userPass'])) ? 'errorlogin' : ''; ?>">
              <input type="password" placeholder="Password" name="uPass"/>
            </div>
            <?php
            if(isset($errorRegister['userPass'])){
                echo "<p class='error-message'> &#128161;".$errorRegister['userPass']."</p>";
            }
            ?>
            <div class="input-field <?php echo (!empty($errorRegister['userPassConfirm'])) ? 'errorlogin' : ''; ?>">
              <input type="password" placeholder="Password Confirmation" name="uPassConfirm"/>
            </div>
            <?php
            if(isset($errorRegister['userPassConfirm'])){
                echo "<p class='error-message'> &#128161;".$errorRegister['userPassConfirm']."</p>";
            }
            ?>
            <div class="checkbox">
            <input type="checkbox">&nbsp;Remember Me</div>
            <input type="submit" class="btn" value="Sign up" name="submit"/>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Be one of us to explore the best piece of art! IF NOT NOW, THEN WHEN?
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img1.png" class="image" alt="" />                                                  
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Check out the cool artworks in the exhibition, you'll never regret!
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img2.png" class="image" alt="" />
        </div>
      </div>
    </div>
    

    <script src="signinsignup.js"></script>
  </body>
</html>


