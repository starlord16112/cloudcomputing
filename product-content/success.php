
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php
include 'connect.php';
   if(isset($_POST['submit-dathang']))
   {
   $ten = $_POST['ten'];
    if(mysqli_query($conn,"INSERT INTO donhang(mota) VALUES ('$ten')") == TRUE)
    {
       echo '<div class="alert alert-success" role="alert">
       Đặt hàng thành công
     </div>';
    }
    else
    {
        echo "lỗi rồi sorry";
    }
   }
else
{
    header('location: http://localhost/product-content/cart.php');
}


?>
<img style=""src="assets/img/success1.png" alt="">
</body>
</html>
