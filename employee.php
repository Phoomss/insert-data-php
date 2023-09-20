
<?php
// include('connect66.php');

// $sql_old_employee = "SELECT * FROM employee WHERE start_date > '2020-12-31'";
// $q_old_employee = mysqli_query($conn_finger, $sql_old_employee);

// while ($old_employee = mysqli_fetch_array($q_old_employee)) {
//     $full_name = $old_employee['name'];
//     $e_num = $old_employee['emp_card'];
//     $e_Idcard = $old_employee['pub_id'];
//     $telephone = $old_employee['adr_tel'];
//     $org_telephone = $old_employee['tel'];
//     $note = $old_employee['remark'];

//     // ใช้ explode เพื่อแยกชื่อและนามสกุล
//     $name_parts = explode(" ", $full_name);

//     // ตรวจสอบว่ามีชื่อและนามสกุลหรือไม่
//     if (count($name_parts) >= 2) {
//         $name = $name_parts[0]; // ชื่อ
//         $surname = end($name_parts); // นามสกุล
//     } else {
//         $name = $full_name; // ถ้ามีเฉพาะชื่อเท่านั้น
//         $surname = ""; // ไม่มีนามสกุล
//     }

//     $sql_insert = "INSERT INTO employee_temp (name,surname,e_num, telephone, note, createdAt, updatedAt) VALUES ('$name','$surname','$e_num', '$telephone', '$note', NOW(), NOW())";
//     $q_insert_employee = mysqli_query($conn_local, $sql_insert);
//     if ($q_insert_employee) {
//         echo "insert complete : $e_num <br>";
//     }
