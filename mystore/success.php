<?php
session_start();

$user=(isset($_SESSION['user'])?$_SESSION['user']:[]);
$idtk =  $user['id_tk'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Moon House</title>
</head>
<body>
<?php
include 'connect.php';
   if(isset($_POST['submit-dathang']))
   {
    $ten = $_POST['ten'];
    $dc = $_POST['dc'];
    $sdt = $_POST['sdt'];
   $mydate = getdate(date("U"));
   $time = $mydate['weekday'].",".$mydate['month'].",".$mydate['mday'].",".$mydate['year'];
   $ghichu =  $_SESSION['mota']." tổng tiền là: ".$_SESSION['tongtien'];
   
   $sql = "SELECT id_tk FROM khachhang";
   $result = $conn->query($sql);
   
     $arr = array();
     $i = 0;
     while($row = $result->fetch_assoc()) {
       $arr[$i] = $row['id_tk'];
       $i = $i + 1;

     }
     /* cập nhật số lượng*/
     foreach ($_SESSION['tt-donhang'] as $key => $value) {
      $sql1 = "SELECT conlai,daban FROM khohang WHERE id_sp = '$key'";
      $result = $conn->query($sql1);
      while($row = $result->fetch_assoc()) {
            $slt = (int)$row['conlai'] - (int)$value;
            
            $dban = (int)$row['daban'] + (int)$value;
      }
       $sql2 = "UPDATE khohang SET conlai='$slt',daban = '$dban' WHERE id_sp='$key'";
       if ($conn->query($sql2) === TRUE) {       
      } 
      else
      {
        echo "có lỗi cập nhật số lượng sản phẩm";
      }
     }
   /*--------------------------*/
    
     if(!in_array($idtk, $arr))/* kiểm tra xem người dùng đã có tài khoản chưa */
     {
      if($conn->query("INSERT INTO khachhang(ten_kh,id_tk,diachi,sdt) VALUES ('$ten','$idtk','$dc','$sdt')") === TRUE)
      {
        $last_id = $conn->insert_id;
        if($conn->query("INSERT INTO donhang(id_kh,ngay_dat,ghi_chu,tinhtrang_gh) VALUES ('$last_id','$time','$ghichu','đang giao')") === TRUE) 
        {
          echo "<script>alert('đặt hàng thành công')</script>";
          ?>
            <div style="text-align:center;
          margin: 150px 0;">
        <div>  <img src="https://docs.microsoft.com/vi-vn/visualstudio/ide/media/github-success-signin.png?view=vs-2019" alt=""></div>
          <a href="index.php"><button type="button" class="btn btn-primary">Quay về trang chủ</button></a>
 </div>
          <?php
        }
      }
     }
     else
     {
         
      $sql = "SELECT id_kh FROM khachhang WHERE id_tk = '$idtk'";
      $result = $conn->query($sql);
      
      while($row = $result->fetch_assoc()) {
        $last_id = $row['id_kh'];
      }
      if($conn->query("INSERT INTO donhang(id_kh,ngay_dat,ghi_chu,tinhtrang_gh) VALUES ('$last_id','$time','$ghichu','đang giao')") === TRUE) 
        {
          echo "<script>alert('đặt hàng thành công')</script>";
          ?>
          <div style="text-align:center;
          margin: 150px 0;">
          <div><img src="https://docs.microsoft.com/vi-vn/visualstudio/ide/media/github-success-signin.png?view=vs-2019" alt=""></div>
           <a style="" href="index.php"><button type="button" class="btn btn-primary">Quay về trang chủ</button></a>
           </div>
          <?php
        }

    
     }
   }
else
{
    header('location:cart.php');
}


?>

</body>
</html>
