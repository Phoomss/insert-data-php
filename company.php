<?php
    // migrating company data
    include("connect66.php");

    $sql_old_company = "SELECT * FROM ucf_company ";
    $q_old_company = mysqli_query($conn_finger, $sql_old_company);

    while($old_company = mysqli_fetch_array($q_old_company)){
        $company_name = $old_company['company_name'];
        $address = $old_company['address'];
        $telephone = $old_company['telephone'];
        $sql_insert = "INSERT INTO companies (name, address, telephone, createdAt, updatedAt) values('$company_name', '$address','$telephone', now(), now())  ";
        $q_insert_company = mysqli_query($conn_local, $sql_insert);
        if($q_insert_company){
            echo "insert complete :  $company_name<br>";
        }
    }
?>