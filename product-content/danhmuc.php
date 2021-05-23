<?php
include 'connect.php';
$query = mysqli_query($conn,"SELECT * FROM danhmuc");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .danhmuc
        {
            display:inline-block;  
            width:60px;
            height:60px; 
        }
        img
        {
            width: 100%;
            height:100%;
        }

    </style>
</head>
<body>
    <h3>danh mục sản phẩm</h3>
   
    <?php 
         while( $result = $query -> fetch_assoc()) {
            $id = $result['id'];
            $name = $result['name'];
            $img = $result['image'];
           echo  '
           <div class="danhmuc">
           <img src= assets/img/'.$img.'>
           <a href=sanpham.php?danhmuc='.$id.'>'.$name.'</a>
           </div>';
         }
    
    ?>
   
</body>
</html>