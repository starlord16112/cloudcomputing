<?php
session_start();
require_once ('../connect.php');

//xử lí yêu cầu gửi data lên form
$id_view = "";
$ten = "";
$dc = "";
$sdt = "";
if (isset($_GET['view']))
{

    $id_view = $_GET['id'];

    $sql_view = "SELECT * FROM khachhang WHERE id_kh = '$id_view'";
    $result_edit = $conn->query($sql_view);

    while ($row = $result_edit->fetch_assoc())
    {
        $ten = $row['ten_kh'];
        $dc = $row['diachi'];
        $sdt = $row['sdt'];
      
       
    }

}





?>
