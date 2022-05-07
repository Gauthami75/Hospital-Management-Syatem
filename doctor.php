<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
$day =$_POST['daySearch'];
$docname=$_SESSION['doctName'];

$conn = new mysqli("localhost", "root", "","Patient") ;
$error = mysqli_connect_error();
if($error){
    die("connection was not succesfull");
}
if($day== ""){
    $query="SELECT * FROM Appointments WHERE doctorName='$docname'";
    $result=mysqli_query($conn, $query);
}else{
    $query="SELECT * FROM Appointments WHERE doctorName='$docname' AND `day`='$day'";
    $result=mysqli_query($conn, $query);
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
        <link rel="stylesheet" href="doctor.css" type="text/css">
        <link rel="stylesheet" href="welcome.css" type="text/css">
        <title>Login Page</title>
    </head>
    <body>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <div id="docnav">
                    <a href="login.php"><i class="fas fa-user-plus nav-style"></i></a>
                    <span id="title"><a class="navbar-brand nav-style" href="index.php">GV HOSPITAL</a></span>
                    <span class="nav-style"><i class="fas fa-sign-out-alt "></i><a id="logout" href="index.php">Logout</a></span>
                </div>
                
            </div>
        </nav>
           <h3 id="docWel">Welcome <?php echo $docname;?></h3>
           <div class="d-flex align-items-start container">
                <div class="nav flex-column nav-pills me-3" id="leftTab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="dashTab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</button>
                    <button class="nav-link" id="appTab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Appointment</button>
                </div>
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="dashTab">
                       <div id="dashboardContent">
                            <i class="fa-solid fa-list"></i>    
                            <h3>View Appointments</h3>
                            <a href="#">Appointment List</a>
                        </div>
                    </div>
                    <div class="tab-pane fade tbl" id="v-pills-profile" role="tabpanel" aria-labelledby="appTab">
                    <table id="Apphistory" >
                        <tr>
                            <th>Patient Name</th>
                            <th>Patient Number</th>
                            <th>Appointment Day</th>
                            <th>Appointment Time</th>
                            <th>Appointment Status</th>
                            <th></th>
                        </tr>
                        <?php
                            while($row = mysqli_fetch_array($result))
                            {
                        ?>
                        <tr>
                            <td><?php echo $row['patientName'];?></td>
                            <td><?php echo $row['patientNumber'];?></td>
                            <td><?php echo $row['day'];?></td>
                            <td><?php echo $row['time'];?></td>
                            <td id="appointmentStatus" name="appStatus">
                        
                            </td>
                            <td><button id="appCancel" name="status" value="1">Cancel</button></td>
                        </tr>
                     <?php
                        }
                     ?>
                        </table>
                    </div>
                </div>
            </div>
             <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        -->
    </body>
</html>