<?php
include("connect66.php");

$sql_old_archive = "SELECT * FROM employee WHERE start_date > '2020-12-31'";
$q_old_archive = mysqli_query($conn_finger, $sql_old_archive);

while ($old_carchive = mysqli_fetch_array($q_old_archive)) {
    $employee_id = $old_carchive['emp_card'];
    $contract_id = $old_carchive['contract'];
    $org_id = $old_carchive['sectiontemp'];
    $remark = $old_carchive['job_desc'];

    // ตรวจสอบว่าการรวมกันของ employee_id และ contract_id มีอยู่แล้วใน archive_temp
    $check_sql = "SELECT * FROM archive_temp WHERE employee_id = '$employee_id' AND contract_id = '$contract_id'";
    $check_query = mysqli_query($conn_local, $check_sql);

    if (mysqli_num_rows($check_query) == 0) {
        // คิวรีเพื่อรับ employee_id
        $employee_temp_id_sql = "SELECT * FROM employee_temp WHERE e_num = '$employee_id'";
        $employee_temp_id_query = mysqli_query($conn_local, $employee_temp_id_sql);
        $employee_temp_id_row = mysqli_fetch_assoc($employee_temp_id_query);
        $employee_temp_id = $employee_temp_id_row['id'];
     
        // คิวรีเพื่อรับ contract_id
        $contract_temp_id_sql = "SELECT * FROM contract_temp WHERE number = '$contract_id'";
        $contract_temp_id_query = mysqli_query($conn_local, $contract_temp_id_sql);
        $contract_temp_id_row = mysqli_fetch_assoc($contract_temp_id_query);
        $contract_temp_id = $contract_temp_id_row['id'];

        // ตรวจสอบใหม่หลังจากดึง ID จากตาราง employee_temp และ contract_temp
        $check_sql = "SELECT * FROM archive_temp WHERE employee_id = '$employee_temp_id' AND contract_id = '$contract_temp_id'";
        $check_query = mysqli_query($conn_local, $check_sql);

        if (mysqli_num_rows($check_query) == 0) {
            $sql_insert = "INSERT INTO archive_temp (employee_id, contract_id, org_id, remark, createdAt, updatedAt) VALUES ('$employee_temp_id', '$contract_temp_id', '$org_id', '$remark', now(), now())";
            $q_insert_contract = mysqli_query($conn_local, $sql_insert);
            if ($q_insert_contract) {
            echo $employee_temp_id_sql;
                echo "insert complete : ลูกจ้าง: $employee_id เลขสัญญา: $contract_id  สังกัด:$org_id     $remark<br>";
            }
        } else {
            echo "มีข้อมูลอยู่แล้ว: $employee_id $contract_id<br>";
        }
    }

    // // Debug ค่า ID ที่ได้จาก employee_temp
    // var_dump($employee_temp_id);

    // // Debug ค่า ID ที่ได้จาก contract_temp
    // var_dump($contract_temp_id);
}
?>
