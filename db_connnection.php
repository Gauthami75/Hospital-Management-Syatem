<?php

 $conn = new mysqli("localhost", "root", "","patient") or die("Connect failed");
 if($conn)
    echo "connection successfull";
   
?>