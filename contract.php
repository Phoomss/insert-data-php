<?php
include("connect66.php");

$sql_old_contract = "SELECT * FROM employee WHERE start_date > '2020-12-31'";
$q_old_contract = mysqli_query($conn_finger, $sql_old_contract);

while ($old_contract = mysqli_fetch_array($q_old_contract)) {
  $number = $old_contract['contract'];
  $start_date = $old_contract['start_date'];
  $end_date = $old_contract['end_date'];

  $compamy_id = $old_contract['companytemp'];

  $old_company_id = $old_contract['company'];
  $sql_company_id = "SELECT * FROM company_temp WHERE old_company_id='$old_company_id'";
  $result = mysqli_query($conn_local, $sql_company_id);

  if ($result) {
    $row = mysqli_fetch_assoc($result);
    if ($row !== null) {
      $company_temp_id = $row['id'];

      $sql_insert = "INSERT INTO contract_temp (number, start_date, end_date, company_id, createdAt, updatedAt) 
                      VALUES ('$number', '$start_date', '$end_date', '$company_temp_id', NOW(), NOW())";

      $q_insert_contract = mysqli_query($conn_local, $sql_insert);
      if ($q_insert_contract) {
        echo "insert complete : $number $company_temp_id $start_date $end_date<br>";
      } else {
        echo "insert failed : $number $start_date $end_date<br>";
      }
    } else {
      echo "No data found for old_company_id: $old_company_id<br>";
    }
  } else {
    echo "query failed : $sql_company_id<br>";
  }
}
