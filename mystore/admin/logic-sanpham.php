<?php
session_start();
require_once ('../connect.php');
//xử lí yêu cầu xóa
$edit = false; // biến edit thay đổi nút
if (isset($_GET['delete']))
{
    $id_delete = $_GET['id'];
    if ($conn->query("DELETE FROM sanpham WHERE id_sp='$id_delete'") === true)
    {

        $_SESSION['alert'] = "Xóa sản phẩm thành công";
        echo '<script>window.location="sanpham.php"</script>';
    }
    else
    {
        $_SESSION['alert'] = "Không thể xóa";
        echo '<script>window.location="sanpham.php"</script>';
    }
}

//xử lí yêu cầu gửi data lên form
$id_view = "";
$tensp = "";
$dmuc = "";
$mota = "";
$gia = "";

$imglink = "";
$xxu = "";
if (isset($_GET['edit']))
{

    $id_view = $_GET['id'];

    $edit = true;

    $sql_view = "SELECT ten_sp,id_Dsp,mo_ta,xuat_xu,gia_sp,anh_sp FROM sanpham WHERE id_sp = '$id_view'";
    $result_edit = $conn->query($sql_view);

    while ($row = $result_edit->fetch_assoc())
    {
        $tensp = $row['ten_sp'];
        $dmuc = $row['id_Dsp'];
        $mota = $row['mo_ta'];
        $gia = $row['gia_sp'];
       
        $imglink = $row['anh_sp'];
        $xxu = $row['xuat_xu'];
    }

}

//xử lí yêu cầu khi người dùng click vào button thêm sản phẩm
if (isset($_POST['add-btn']))
{
    $tensp = $_POST['tensp'];
    $dmuc = $_POST['danhmuc'];
    $mota = $_POST['mota'];
    $gia = $_POST['gia'];
    
    $imglink = $_POST['link'];
    $xxu = $_POST['xuatxu'];

    $sql_add = "INSERT INTO sanpham (id_Dsp,ten_sp,mo_ta,xuat_xu,gia_sp,anh_sp)
      VALUES ('$dmuc', '$tensp','$mota','$xxu','$gia','$imglink')";

    if ($conn->query($sql_add) === true)
    {
        $_SESSION['alert'] = "Thêm sản phẩm thành công";
        echo '<script>window.location="sanpham.php"</script>';
    }
    else
    { //nhập sai sẽ không thể thêm
        $_SESSION['alert'] = "Không thể thêm";
        echo '<script>window.location="sanpham.php"</script>';
    }
}

// sửa sản phẩm
if (isset($_POST['edit-btn']))
{
    $id = $_POST['id_sp'];
    $tensp = $_POST['tensp'];
    $dmuc = $_POST['danhmuc'];
    $mota = $_POST['mota'];
    $gia = $_POST['gia'];
   
    $imglink = $_POST['link'];
    $xxu = $_POST['xuatxu'];

    $sql_edit = "UPDATE sanpham SET id_Dsp = '$dmuc',ten_sp = '$tensp',mo_ta='$mota',xuat_xu='$xxu',gia_sp='$gia',anh_sp='$imglink' WHERE id_sp = '$id'";

    if ($conn->query($sql_edit) === true)
    {
        $_SESSION['alert'] = "Sửa thông tin thành công";
        echo '<script>window.location="sanpham.php"</script>';
    }
    else
    {
        $_SESSION['alert'] = "Không thể sửa";
        echo '<script>window.location="sanpham.php"</script>';
    }
}

?>
