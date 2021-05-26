<?php
require_once('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />     
    <title>Document</title>
</head>
<body style="overflow:hidden; background-color:black">
    <div class="container_image">
            <?php
           echo'<a href="cmt.php?id_tk='.$_GET["id_tk"].'&id_sp='.$_GET["id_sp"].'"><i style="color:white; font-size:30px"class="fas fa-times-circle"></i></a>';
                $sql="select * from binhluansp where binhluansp.id_Bl=".$_GET['id_Bl'];
                $listimage=executeResuft($sql);
                foreach($listimage as $li)
                    echo'<div style="width: 500px; height:500px; margin:100px 500px 200px 500px" ><img style="width: 100%; height:100%;" src="img/'.$li['hinhanh'].'" alt=""></div>';
            ?>
    </div>
</body>
</html>