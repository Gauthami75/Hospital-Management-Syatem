<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
include 'header.php';
$error="";
$conn = new mysqli("localhost", "root", "","Patient") ;
$emailId = $_POST['emailId'];
$name = $_POST['messName'];
$phone = $_POST['phoneNumber'];
$message = $_POST['message'];

$error = mysqli_connect_error();
if($error){
    die('Connection not successfull');
}


if($_POST['mess']==1){
    $query = "INSERT INTO `Messages`(`Name`, `EmailId`, `Phone`, `Message`) VALUES ('$name','$emailId','$phone','$message')";
    if(!mysqli_query($conn, $query)){
        echo '<script>alert("Somthing went wrong please try again later.")</script>';
    }
    else{
        echo '<script>alert("Thank you we will get back to you soon.")</script>' ;
    }
    mysqli_close($conn);
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
    <link rel="stylesheet" href="contactus.css" type="text/css">
    
    <title>Contact Us</title>
    </head>
    <body>
        <div><?php echo $error;?></div>
        <section class="col-md-5" id="dropmess">
            <section id="dropicon"><i class="fa-solid fa-rocket"></i></section>
            <h3>Drop Us a Message</h3>
            <form method="post">
                <input type="text" placeholder="Name" class="inputstyle" name="messName" id="messName" required>
                <input type="email" placeholder="Email id" class="inputstyle" name="emailId" id="queryid" required>
                <input type="text" placeholder="Phone number" class="inputstyle" name="phoneNumber" id="sub" required>
                <textarea  placeholder="Your message" name="message" id="mess" required></textarea>
                <input type="hidden" name="mess" value="1">
                <input type="submit" value="Send Message" id="messbtn" name="sub">
            </form>
        </section>

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