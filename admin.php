<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
session_start();
include($_SERVER['DOCUMENT_ROOT']."/test/navWithLogout.php");
$adminName = $_SESSION['adminName'];
$conn = new mysqli("localhost", "root", "","Patient") ;
$error="";
$docName = $_POST['docName'];
$docPasswd = $_POST['passwd'];
$docConfirmPasswd = $_POST['confirmPassword'];
$docPhone = $_POST['phoneNumber'];
$docEmailId = $_POST['emailId'];
$consultationFee = $_POST['consultationFee'];
$day1 =$_POST['consultationDay1'];
$day2 =$_POST['consultationDay2'];
$day3 =$_POST['consultationDay3'];
$inTime =$_POST['inTime'];
$outTime = $_POST['outTime'];

$error = mysqli_connect_error();
if($error){
    die('Connection not successfull');
}
    $conn = new mysqli("localhost", "root", "","Patient") ;
    global $conn;
    $query = "SELECT * FROM Doctor";
    $result = mysqli_query($conn, $query);
    $query1 = "SELECT * FROM patientDetails";
    $result1 = mysqli_query($conn,$query1);
    $query2 = "SELECT * FROM Appointments";
    $result2 = mysqli_query($conn, $query2);
    $query3 = "SELECT * FROM Messages";
    $result3 = mysqli_query($conn, $query3);

if($_POST['addDocSubmit']=='1'){
    if($docPasswd != $docConfirmPasswd){
        echo '<script>alert("Password Donot match")</script>';
    }else{
        $hashed_password= password_hash($docPasswd, PASSWORD_DEFAULT);
        $query = "INSERT INTO Doctor(`doctorName`,`doctorId`,`doctorFee`,`doctorPhone`,`password`,`day1`,`day2`,`day3`,`InTime`,`OutTime`)VALUES('$docName','$docEmailId','$consultationFee','$docPhone','$hashed_password','$day1','$day2','$day3','$inTime','$outTime')";
        $result= mysqli_query($conn, $query);
        if($result){
            echo '<script>alert("Doctor information added sucessfully.")</script>';
        }else{
            echo '<script>alert("Doctor information was not added.")</script>';
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
    <script src="https://kit.fontawesome.com/97ebf72da8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="welcome.css" type="text/css">

    <title>Admin</title>
    <style type="text/css">
        #v-pills-adddoc input{
            width: 60%;
        }
        #addDoctor{
            margin:0% 3%;
        }
    </style>
  </head>
  <body>
    <div><?php echo $error; ?></div>
  <h2>Welcome <?php echo $_SESSION['adminName'];?></h2>
  <div class="d-flex align-items-start container left-tabs" id="admin-left-tabs">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active topBorder" id="v-pills-dash-tab" data-bs-toggle="pill" data-bs-target="#v-pills-dash" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</button>
                <button class="nav-link" id="v-pills-docList-tab" data-bs-toggle="pill" data-bs-target="#v-pills-doclist" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Doctor List</button>
                <button class="nav-link " id="v-pills-palist-tab" data-bs-toggle="pill" data-bs-target="#v-pills-patientlist" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Patient List</button>
                <button class="nav-link" id="v-pills-appDetails-tab" data-bs-toggle="pill" data-bs-target="#v-pills-appdetails" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Appointment Details</button>
                <button class="nav-link bottomBorder" id="v-pills-addDoc-tab" data-bs-toggle="pill" data-bs-target="#v-pills-adddoc" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Add Doctor</button>
                <button class="nav-link bottomBorder" id="v-pills-mess-tab" data-bs-toggle="pill" data-bs-target="#v-pills-message" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</button>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
                
                <div class="tab-pane fade show active " id="v-pills-dash" role="tabpanel" aria-labelledby="v-pills-dash-tab">
                    <div id="doc-list" class="right-content">
                        <i class="fa-solid fa-people-group icon-style"></i>
                        <h3> Doctor List</h3>
                        <a href="#" style="text-decoration:none; color:#753DC9;" >View Doctor</a>   
                    </div>          
                    <div id="patient-list" class="right-content">
                        <i class="fa-solid fa-users icon-style"></i>
                        <h3>Patient List</h3>
                        <a href="#" style="text-decoration:none; color:#753DC9;">View Patient</a>    
                    </div>
                    <div id="appointment-details" class="right-content">
                        <i class="fas fa-paperclip icon-style"></i>
                        <h3>Appointment Details</h3>
                        <a href="#" style="text-decoration:none; color:#753DC9;">View Appointment</a>   
                    </div>   
                    <div id="manage-doctor" class="right-content">
                    <i class="fa-solid fa-plus icon-style"></i>
                        <h3>Manage Doctor</h3>
                        <a href="#" style="text-decoration:none; color:#753DC9;">Add Doctor</a>   
                    </div>                      
                </div>
                <form class="tab-pane fade border" id="v-pills-doclist" role="tabpanel" aria-labelledby="v-pills-docList-ta" method="post" action="">
                    <input class="form-control me-2 search" type="search" placeholder="Search" aria-label="Search" id="docSearch" onkeyup="myFunction(this.id,'doctorList')">
                    <button class="btn btn-outline-success seacrchButton" type="submit">Search</button>
                    <table id="doctorList" class="tbl" >
                        <tr>
                            <th>Doctor Name</th>
                            <th>Doctor MailId</th>
                            <th>Doctor Contact</th>
                            <th>Doctor Fee</th>
                            <th>Doctor InTime</th>
                            <th>Doctor OutTime</th>
                        </tr>
                        <?php   // LOOP TILL END OF DATA 
                                while($row = mysqli_fetch_array($result))
                                {
                            ?>
                            <tr>
                                <!--FETCHING DATA FROM EACH 
                                    ROW OF EVERY COLUMN-->
                                <td><?php echo $row['doctorName']?></td>
                                <td><?php echo $row['doctorId'];?></td>
                                <td><?php echo $row['doctorPhone'];?></td>
                                <td><?php echo $row['doctorFee'];?></td>
                                <td><?php echo $row['Intime'];?></td>
                                <td><?php echo $row['OutTime'];?></td>
                            </tr>
                        <?php
                            }
                        ?>
                    </table>
                </form>
                <form class="tab-pane fade" id="v-pills-patientlist" role="tabpanel" aria-labelledby="v-pills-palist-tab" method="post">
                    <input class="form-control me-2 search" type="search" placeholder="Search" aria-label="Search" id="patientSearch" onkeyup="myFunction(this.id,'patientlist')">
                    <button class="btn btn-outline-success seacrchButton" type="submit">Search</button>
                    <table id="patientlist"  class="tbl">
                    
                        <tr>
                            <th>Patient FirstName</th>
                            <th>Patient LastName</th>
                            <th>Patient Number</th>
                            <th>Email Id</th>
                            <th>gender</th>
                         </tr>
                         <!-- PHP CODE TO FETCH DATA FROM ROWS-->
                       <?php   // LOOP TILL END OF DATA 
                            while($row = mysqli_fetch_array($result1))
                            {
                        ?>
                        <tr>
                            <!--FETCHING DATA FROM EACH 
                                ROW OF EVERY COLUMN-->
                            <td><?php echo $row['firstName']?></td>
                            <td><?php echo $row['lastName'];?></td>
                            <td><?php echo $row['phoneNumber'];?></td>
                            <td><?php echo $row['emailId'];?></td>
                            <td><?php echo $row['gender'];?></td>
                        </tr>
                     <?php
                        }
                     ?>
                </table>

                    </form>
                <form class="tab-pane fade" id="v-pills-appdetails" role="tabpanel" aria-labelledby="v-pills-appDetails-tab" method="post">
                    <input class="form-control me-2 search" type="search" placeholder="Search" aria-label="Search" id="appointmentSearch" onkeyup="myFunction(this.id,'appointmentList')">
                    <button class="btn btn-outline-success seacrchButton" type="submit">Search</button>
                <table id="appointmentList"  class="tbl">
                    
                    <tr>
                        <th>Patient Name</th>
                        <th>Doctor Name</th>
                        <th>Patient Number</th>
                        <th>Appointment day</th>
                        <th>Appointment Time</th>
                     </tr>
                     <!-- PHP CODE TO FETCH DATA FROM ROWS-->
                   <?php   // LOOP TILL END OF DATA 
                        while($row = mysqli_fetch_array($result2))
                        {
                    ?>
                    <tr>
                        <!--FETCHING DATA FROM EACH 
                            ROW OF EVERY COLUMN-->
                        <td><?php echo $row['patientName']?></td>
                        <td><?php echo $row['doctorName'];?></td>
                        <td><?php echo $row['patientNumber'];?></td>
                        <td><?php echo $row['day'];?></td>
                        <td><?php echo $row['time'];?></td>
                    </tr>
                 <?php
                    }
                 ?>
            </table>


                </form>
                <form class="tab-pane fade" id="v-pills-adddoc" role="tabpanel" aria-labelledby="v-pills-appDetails-tab" method="post">
                <div id="addDoctor">
                    <div class="row mb-3">
                        <label for="docName" class="col-sm-2 col-form-label">Doctor Name :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="docName" name="docName" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="passwd" class="col-sm-2 col-form-label">Password : </label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="passwd" name="passwd" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Password : </label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="emailId" class="col-sm-2 col-form-label">Email Id: </label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="emailId" name="emailId" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phoneNumber" class="col-sm-2 col-form-label">Phone: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="consultationFee" class="col-sm-2 col-form-label">Consultation Fee: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="consultationFee" name="consultationFee" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="consultationDay1" class="col-sm-2 col-form-label">Consultation Day 1: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="consultationDay1" name="consultationDay1" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="consultationDay2" class="col-sm-2 col-form-label">Consultation Day 2: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="consultationDay2" name="consultationDay2" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="consultationDay3" class="col-sm-2 col-form-label">Consultation Day 3: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="consultationDay3" name="consultationDay3" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inTime" class="col-sm-2 col-form-label">In-Time: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inTime" name="inTime" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="outTime" class="col-sm-2 col-form-label">Out-Time: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="outTime" name="outTime" required>
                        </div>
                    </div>
                    <button class="btn btn-outline-success seacrchButton" type="submit" name="addDocSubmit" value="1">Add Doctor</button>
                </div>
                   
                </form>
                <form class="tab-pane fade" id="v-pills-message" role="tabpanel" aria-labelledby="v-pills-appDetails-tab" method="post">
                    <input class="form-control me-2 search" type="search" placeholder="Search" aria-label="Search" id="messageSearch" onkeyup="myFunction(this.id,'messageList')">
                    <button class="btn btn-outline-success seacrchButton" type="submit">Search</button>
                    <table id="messageList"  class="tbl">
                    
                        <tr>
                            <th>Name</th>
                            <th>Email Id</th>
                            <th>Phone Number</th>
                            <th>Message</th>
                         </tr>
                         <!-- PHP CODE TO FETCH DATA FROM ROWS-->
                       <?php   // LOOP TILL END OF DATA 
                            while($row = mysqli_fetch_array($result3))
                            {
                        ?>
                        <tr>
                            <!--FETCHING DATA FROM EACH 
                                ROW OF EVERY COLUMN-->
                            <td><?php echo $row['Name']?></td>
                            <td><?php echo $row['EmailId'];?></td>
                            <td><?php echo $row['Phone'];?></td>
                            <td><?php echo $row['Message'];?></td>
                            
                        </tr>
                     <?php
                        }
                     ?>
                </table>

                </form>
            </div>
        </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="admin.js">
    //     function myFunction(id,tableId) {
    //     var input, filter, table, tr, td, i, txtValue;
    //     input = document.getElementById(id);
    //     filter = input.value.toUpperCase();
    //     table = document.getElementById(tableId);
    //     tr = table.getElementsByTagName("tr");
    //     for (i = 0; i < tr.length; i++) {
    //         td = tr[i].getElementsByTagName("td")[0];
    //         if (td) {
    //         txtValue = td.textContent || td.innerText;
    //         if (txtValue.toUpperCase().indexOf(filter) > -1) {
    //             tr[i].style.display = "";
    //         } else {
    //             tr[i].style.display = "none";
    //         }
    //         }       
    //     }
    // }
    // if ( window.history.replaceState ) {
    //     window.history.replaceState( null, null, window.location.href );
    // }
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