<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
session_start();
$error="";
$message="";
$emailId = $_POST['email'];
$firstName = $_REQUEST['firstName'];
$lastName=$_REQUEST['lastName'];
$gender=$_REQUEST['gender'];
$phoneNumber=$_REQUEST['phoneNumber'];
$password=$_REQUEST['patientPassword'];
$confirmPassword=$_REQUEST['confirmPassword'];
$docname = $_POST['doctorId'];
$docpassw = $_POST['doctorPassword'];
$adminId = $_POST['adminId'];
$adminPassword = $_POST['adminPassword'];

$conn = new mysqli("localhost", "root", "","Patient") ;
$error = mysqli_connect_error();
if($error){
    die("connection was not succesfull");
}

if($_POST){
    
    if(!filter_var($emailId, FILTER_VALIDATE_EMAIL)){
        echo '<script>alert("Invalid EmailId.")</script>';

    }
    else if($password != $confirmPassword){
        $error .= "<p>Passwords donot match</p>";
    }
    else {
        if($_POST['signup']==1){
            $query = "SELECT  `id` FROM `patientDetails` WHERE `emailId` = '$emailId'";
            $result=mysqli_query($conn,$query);
                if(mysqli_num_rows($result)>0){
                    echo '<script>alert("Email Id already exists.")</script>';
                }
                else{
                    $hashed_password= password_hash($password, PASSWORD_DEFAULT);
                    $query = "INSERT INTO `patientDetails`(`firstName`, `lastName`, `emailId`, `phoneNumber`, `password`,`gender`) VALUES ('$firstName','$lastName','$emailId','$phoneNumber','$hashed_password','$gender')";
                    if(!mysqli_query($conn, $query)){
                        echo '<script>alert("Problem while Signingup.")</script>';
                    }
                    else{
                        header("Location: welcome.php");
                    }
                    mysqli_close($conn);
                }
            
        }   
    }
    
}
if (array_key_exists('doctorId', $_POST) OR array_key_exists('password', $_POST)){
if($_POST['docbtn']){
    $query="SELECT * FROM `Doctor` WHERE doctorId = '$docname'";
    $result=mysqli_query($conn, $query);
    $row=mysqli_fetch_array($result);
    $_SESSION['doctName']=$row['doctorName'];
    if(isset($row)){
        if(password_verify($docpassw,$row['password'])){
            header("Location: doctor.php");
        }else{
            echo '<script>alert("Invalid EmailId or Password.")</script>';
        }
    }
}
}
 if (array_key_exists('adminId', $_POST) OR array_key_exists('password', $_POST)){
    if($_POST['abtn']){
        $query = "SELECT * FROM `Admin` WHERE `adminId` = '$adminId'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $_SESSION['adminName']= $row['adminName'];
       
        if(isset($row)){
            if(password_verify($adminPassword, $row['adminPassword'])){
                header("Location: admin.php");
                
            }else{
                echo '<script>alert("Invalid EmailId or Password.")</script>';
                
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
    <title>GV Hospitals</title>
    
    </head>
    <body>
    
   <div id="navigationBar" class="container container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <div class="container-fluid">
                <span class="glyphicon glyphicon-user"></span><a href="login.php"><i class="fas fa-user-plus" style="font-size:100%"></i></a><a class="navbar-brand naigation-style" href="#">GV HOSPITALS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="registration.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactus.php">Contact Us</a>
                    </li>
                </ul>
            </div>
            </div>
        </nav>
    </div>
    <div id="error-message"><?php echo $error ,$message;?></div>
    <div id="home-page" >
        <div class="leftImage" class="container">
            <div><img class="image" src="https://image.ibb.co/n7oTvU/logo_white.png"></div>
            <p>Welcome</p>
        </div>
        <div class="container hidden" id="register-form">
            <ul class="nav nav-tabs">
                <li class=""><a href="#patient" data-toggle="tab">patient</a></li>
                <li><a href="#doctor" data-toggle="tab">Doctor </a></li>
                <li><a href="#admin" data-toggle="tab">Admin</a></li>
            </ul>

            <div class="tab-content hidden" id="register-content">
                <form id="patient" class="tab-pane active in" method="post" action="">
                    <h3 class="heading">Register as Patient</h3>
                    <input type="text" class="form-control style" placeholder="First Name*" id="firstName" name="firstName" required>
                    <input type="text" class="form-control style" placeholder="Last name*" id="lastName" name="lastName" required>
                    <input type="email" class="form-control style" id="email" aria-describedby="emailHelp" name="email" placeholder="Your Email*" required>
                    <input type="text" class="form-control style" id="phoneNumber" name="phoneNumber" placeholder="Phone Number*" required>
                    <input type="password" id="patient-password" class="form-control style" aria-describedby="passwordHelpInline" name="patientPassword" placeholder="Password*" required>
                    <input type="password" id="confirm-password" class="form-control style" aria-describedby="passwordHelpInline" name="confirmPassword" placeholder="Confim Password*" required>
                    <div id="radio-options">
                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="Male">Male</input>
                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="Female" checked >Female</input>
                    </div>
                    <a href="login.php" id="loginLink">Already have an account?</a>
                    <input type="hidden" name="signup" value="1">
                    <input type="submit" id="register" class="btn style-button"  name="submit" value="Register">
                </form>
                <form id="doctor" class="tab-pane fade" method="post">
                    <h3 class="heading">Login as doctor</h3>
                    <input type="text" class="form-control style" placeholder="User Name*" id="doctor-user-name" name="doctorId" required>
                    <input type="password" id="doctor-password" class="form-control style" aria-describedby="passwordHelpInline" name="doctorPassword" placeholder="Password*" required>
                    <input id="doctor-login" class="btn style-button" type="submit" value="Log In" name="docbtn">
                </form>

                <form id="admin" class="tab-pane fade" method="post">
                    <h3 class="heading">Login as Admin</h3>
                    <input type="text" class="form-control style" placeholder="admin" id="admin-user-name" name="adminId">
                    <input type="password" id="admin-password" class="form-control style" aria-describedby="passwordHelpInline" name="adminPassword" placeholder="Password*">
                    
                    <input id="admin-login" class="btn style-button" type="submit" value="Log In" name="abtn">
                </form>
            </div>
        </div>
    </div>
<script>
$(document).ready(function(){
  $(".nav-tabs a").click(function(){
    $(this).tab('show');
  });
});

$(function() {
  var lastTab = localStorage.getItem('lastTab');
  $('.container, .tab-content').removeClass('hidden');
  if (lastTab) {
    $('[data-target="' + lastTab + '"]').tab('show');
  }
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    localStorage.setItem('lastTab', $(this).data('target'));
  });
});
</script>
    </script>
    <script>
       if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
   </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>