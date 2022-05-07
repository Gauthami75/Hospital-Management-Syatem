
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
session_start();
include($_SERVER['DOCUMENT_ROOT']."/test/header.php");
$error="";
$message="";
$patientemail = $_POST['loginemail'];
#$_SESSION['pmail']=$patientemail;
$patientpassword=$_POST['loginpassword'];
if (array_key_exists('email', $_POST) OR array_key_exists('loginpassword', $_POST)){
    $conn = new mysqli("localhost", "root", "","Patient") ;
    $error = mysqli_connect_error();
    if($error){
        die("connection was not succesfull");
    }
if($_POST){
    if(empty($patientemail)){
        $error .= "MailId field empty";
    }
    else if(empty($patientpassword)){
        $error .= "Password field empty";
    }
    else{
        if($_POST['signin']=='1'){
            $query="SELECT * FROM `patientDetails` WHERE `emailId` = '$patientemail'";
            $result=mysqli_query($conn,$query);
            $row=mysqli_fetch_array($result);
            $_SESSION['pmail']=$row['emailId'];
            $_SESSION['pnumber']=$row['phoneNumber'];
            $_SESSION['patname']= $row['firstName'];
            if(isset($row)){
                
                if(password_verify($patientpassword,$row['password'])){
                        header("Location: welcome.php");
                }
                else{
                    echo '<script>alert("Wrong Password or emailId")</script>';
                }
            }
            else{
                echo '<script>alert("Wrong Password or emailId")</script>';
            }
            mysqli_close($conn);
        }
    }
}
}


?>


<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="registration.css" type="text/css">
        <link rel="stylesheet" href="login.css" type="text/css">
    
        <title>Login Page</title>
        
    </head>
    <body>
    <div id="login-error-message"><?php echo $error ; $message;?></div>
        <div id="login-content">
            <div id="login-left-image" class="left-image-login" >
                <div class="ambulance"><i class="fas fa-ambulance"></i></div>
                <p>We are here for you!!</p>
            </div>
            <div id="login-form">
                <form method="post" action="">
                    <div class="heading-center">
                        <i class="fas fa-hospital"></i>
                        <h3>Patient Login</h3>
                    </div>
                    <div class="mb-3 row">
                        <label for="patient-email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="patient-email" placeholder="email@example.com" name="loginemail">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="patient-password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="patient-password" name="loginpassword">
                        </div>
                    </div>
                    <div class="col-auto heading-center">
                        <input type="hidden" name="signin" value="1">
                        <button type="submit" class="btn mb-3">Log in</button>
                    </div>
                    
                </form>

            </div>

        </div>
        <script>
            if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href );
                }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        -->
    </body>
</html>