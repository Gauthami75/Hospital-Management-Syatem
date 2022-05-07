<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
session_start();
//include($_SERVER['DOCUMENT_ROOT']."/test/header.php");
$message="";
$error="";
$pname=$_SESSION['patname'];
$paID = $_SESSION['pmail'];
$conn = new mysqli("localhost", "root", "","Patient") ;

$error = mysqli_connect_error();
if($error){
    die('Connection not successfull');
}
function display_docs()
{
	global $conn;
	$query="SELECT * FROM Doctor";
	$result=mysqli_query($conn,$query);
	while($row=mysqli_fetch_array($result))
	{
		$name1=$row['doctorName'];
        $price = $row['doctorFee'];
        $time = $row['Intime']. "-" . $row['OutTime'];
        $day1 = $row['day1'];
        $day2 = $row['day2'];
        $day3 = $row['day3'];
        echo '<option value="' .$name1. '" data-value="'.$price.'" data-time="'.$time.'" data-day1="'.$day1 .'" data-day2="'.$day2 .'" data-day3="'.$day3 .'" name="info" required>'.$name1.'</option>';
    }
}
    $conn = new mysqli("localhost", "root", "","Patient") ;
    global $conn;
    $query = "SELECT * FROM Appointments WHERE patientName = '$pname'";
    $result=mysqli_query($conn, $query);

if($_POST){
    if($_POST['doctorName']=="Select Doctor"){
        $error .= "Select a doctor";
    }

    else{
        if($_POST['signin']=='1'){
            $dname=$_POST['doctorName'];
            $consultaion=$_POST['doctorFee'];
            $cday=$_POST['appDate'];
            $ctime=$_POST['appTime'];
            $appNum=$_POST['appNum'];
            $query = "INSERT INTO Appointments(`doctorName`, `consultaionFee`,`day`,`time`,`patientName`,`patientNumber`) VALUES('$dname','$consultaion','$cday','$ctime','$pname','$appNum')";
            if(mysqli_query($conn, $query)){
                echo '<script>alert("Appointment Booked")</script>';
            }
            else{
                echo'<script>alert("Problem while registering try again later.")</script>';
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
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="welcome.css" type="text/css">
    
    <title>Welcome</title>
    <style text="text/css">
    
    </style>
    </head>
    <body>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a href="login.php"><i class="fas fa-user-plus nav-style"></i></a>
                <span id="title"><a class="navbar-brand nav-style" href="index.php">GV HOSPITAL</a></span>
                <span class="nav-style"><i class="fas fa-sign-out-alt "></i><a id="logout" href="login.php">Logout</a></span>
            </div>
        </nav> 
        <div id="message"><?php echo $message,$error;?></div>
        <h2>Welcome <?php echo $_SESSION['patname'];?></h2>
        <div class="d-flex align-items-start container left-tabs" id="welcome-left-tabs">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active topBorder" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</button>
                <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Book Appointment</button>
                <button class="nav-link bottomBorder" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Appointment History</button>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
                
                <div class="tab-pane fade show active " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div id="book-appointment" class="right-content">
                        <i class="fas fa-clinic-medical icon-style"></i>
                        <h3> Book My Appointment</h3>
                        <a href="#">Book Appointment</a>   
                    </div>          
                    <div id="appointment-history" class="right-content">
                        <i class="fas fa-paperclip icon-style"></i>
                        <h3>My Appointment</h3>
                        <a href="#">View Appointment History</a>   
                    </div>          
                </div>
                <form class=" fade border" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" method="post" action="">
                    <h3>Create An Appointment</h3>
                    <div class="col-md-4 appointment-form">
                        <label for="inputState" class="form-label">Doctor</label>
                        <select id="inputState" class="form-select" name="doctorName" >
                            <option value="" disabled selected>Select Doctor</option>
                                <?php display_docs();?>
                        </select>
                    </div>
                    
                    <div class="col-md-4 appointment-form">
                        <label>Consultaion fee: </label>
                        <input id="fee" name="doctorFee" readonly></input>
                    </div>
                    <div id="rate"></div>
                    <div class="col-md-4 appointment-form">
                        <label for="appointment-date">Day</label>
                        <select id="appointment-date" name="appDate" >
                            <option selected id="d1"></option>
                            <option id="d2"></option>
                            <option id="d3"></option>
                        </select>
                    </div>
                    <div class="col-md-4 appointment-form">
                        <label for="appontment-time">Time</label>
                        <input type="text" id="appontment-time" name="appTime"></input>
                    </div>
                    <div class="col-md-4 appointment-form">
                        <label for="appointmentNumber">Phone Number</label>
                        <input type="text" id="appointmentNumber" name="appNum"></input>
                    </div>
                    
                    <input type="hidden" value="1" name="signin">
                    <button type="submit" class="welcome-btn" id="appointment-btn" name="sub">Create a new entry</button>
                
                </form>
                <form class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" method="post">
                    <table id="Apphistory"  class="tbl">
                    
                        <tr>
                            <th>Doctor Name</th>
                            <th>Doctor Fee</th>
                            <th>Appointment Day</th>
                            <th>Appointment Time</th>
                            <th>Patient Name</th>
                            <th>Appointment Status</th>
                            <th></th>
                         </tr>
                         <!-- PHP CODE TO FETCH DATA FROM ROWS-->
                       <?php   // LOOP TILL END OF DATA 
                            while($row = mysqli_fetch_array($result))
                            {
                        ?>
                        <tr>
                            <!--FETCHING DATA FROM EACH 
                                ROW OF EVERY COLUMN-->
                            <td><?php echo $row['doctorName'];?></td>
                            <td><?php echo $row['consultaionFee'];?></td>
                            <td><?php echo $row['day'];?></td>
                            <td><?php echo $row['time'];?></td>
                            <td><?php echo $row['patientName'];?></td>
                            <td id="appointmentStatus" name="appStatus">
                        
                            </td>
                            <td><button id="appCancel" name="status" value="1" onclick="cancelAppointment();return false">Cancel</button></td>
                        </tr>
                     <?php
                        }
                     ?>
                </table>

                    </form>
            </div>
        </div>
   <script src="welcome.js"></script>
    <!-- Optional JavaScript; choose one of the two! -->
   <script>
       if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
   </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>