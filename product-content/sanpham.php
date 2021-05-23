<?php
require 'danhmuc.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <style>
    .sanpham
        {
            margin:20px;
            display:inline-block;  
            width:100px;
            height:100px; 
        }
        img
        {
            width: 100%;
            height:100%;
        }
</style>
</head>
<body>
<h3>danh sách sản phẩm thuộc danh mục</h3>
 <?php
        if(isset($_GET['danhmuc']))
        {
            $query = mysqli_query($conn,"SELECT * FROM sanpham WHERE id = ".$_GET["danhmuc"]);
            while( $result = $query -> fetch_assoc()) {
                $idsp = $result['id_sp'];
                $name = $result['name'];
                $img = $result['image'];
                $price = $result['price'];
               
               echo  '
               <div class="sanpham">
               <img src= assets/img/'.$img.'>
               <a href = chitietsp.php?sanpham='.$idsp.'>'.$name.'</a>
               </div>';

            }
        }
        else
        {
            header('location: http://localhost/product-content/danhmuc.php');
        }
 
 ?>

</body>
</html>