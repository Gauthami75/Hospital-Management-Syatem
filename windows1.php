<div class="d-flex align-items-start container left-tabs" id="admin-left-tabs">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link active topBorder" id="v-pills-dashboad-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</button>
            <button class="nav-link" id="v-pills-doctorList-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Doctor List</button>
            <button class="nav-link" id="v-pills-patientList-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Patient List</button>
            <button class="nav-link" id="v-pills-appointmentDetails-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Appointment Details</button>
            <button class="nav-link" id="v-pills-addDoctor-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Add Doctor</button>
            <button class="nav-link bottomBorder" id="v-pills-message-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</button>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
                
                <div class="tab-pane fade show active" id="v-pills-dash" role="tabpanel" aria-labelledby="v-pills-dashboad-tab">
                    <div id="book-appointment" class="right-content">
                    <i class="fa-solid fa-people-group icon-style"></i>
                        <h3> Doctor List</h3>
                        <a href="#">View Doctor</a>   
                    </div>          
                    <div id="appointment-history" class="right-content">
                        <i class="fa-solid fa-users icon-style"></i>
                        <h3>Patient List</h3>
                        <a href="#">View Patient</a>   
                    </div> 
                    <div id="appointment-history" class="right-content">
                        <i class="fas fa-paperclip icon-style"></i>
                        <h3>Appointment Details</h3>
                        <a href="#">View Appointment</a>   
                    </div>   
                    <div id="appointment-history" class="right-content">
                    <i class="fa-solid fa-plus icon-style"></i>
                        <h3>Manage Doctor</h3>
                        <a href="#">Add Doctor</a>   
                    </div>            
                </div>
                <form class=" fade border" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-doctorList-tab" method="post" action="">
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
  </div></div>