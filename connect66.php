<?php
    $conn_local = mysqli_connect("localhost", "root", "", "employ_card");
    mysqli_query($conn_local, "SET NAMES utf8");
    if(!$conn_local){
        echo "Error Connecting Local Database";
        
    }

    $conn_finger  = mysqli_connect("10.20.192.65", "finger2022", "finger2022", "finger_db");
    mysqli_query($conn_local, "SET NAMES tis620");
    if(!$conn_local){
        echo "Error Connecting Finger Database";
        
    }
?>