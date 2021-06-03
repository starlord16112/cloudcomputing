<?php
  if(!isset($_GET['admin']))
  {
    
    echo '<script>window.location="../index.php"</script>';
  }
   else
   {
      include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
  div.imgwelcome
  {
    text-align:center;
    margin:50px;  
  }
    </style>
</head>
<body>
<div class = "imgwelcome">
  <img src="https://hocspringmvc.net/wp-content/uploads/2020/10/image-9.png" alt="">
  </div>
</body>
</html>


<?php }
?>