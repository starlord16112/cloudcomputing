    <?php
require_once('db.php');
$user=(isset($_SESSION['user'])?$_SESSION['user']:[]);
?>
<?php
    if(isset($_POST['save'])&&$_POST['evaluate']!=''&& $_POST['comment1']!=''){
            $image= $_FILES['image']['name'];
            $id_tk=$_GET['id_tk'];
            $id_sp=$_GET['sanpham'];
            $evaluate=$_POST['evaluate'];
            $comment=$_POST['comment1'];   
            $date=date("Y-m-d");
            $sqlinsert="INSERT INTO `binhluansp`(`id_tk`, `id_sp`, `sosao`, `hinhanh`, `ND`, `ngaybinhluan`) VALUES ($id_tk,$id_sp,$evaluate,'$image','$comment','$date')";
            execute($sqlinsert);
            $upload_file='image';
            move_uploaded_file($_FILES[$upload_file]['tmp_name'],'imgcmt/'.$_FILES[$upload_file]['name']);
                    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset\css\cmt.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <title>Document</title>
</head>
<body>
<!--enctype="multipart/form-data"  -->
    <form action="" method ="POST" enctype="multipart/form-data" >
    <div id="container_cmt">
        <hr style="width: 60%;">
        <h1>Đánh giá sản phẩm</h1>
        <div>     
            <?php
            ?>
            <div class = "radio"><pre>1 Sao  </pre><input type="radio" class= "cmt_radio" name="evaluate" value="1"></div>
            <div class = "radio"><pre>2 Sao  </pre><input type="radio" class= "cmt_radio" name="evaluate" value="2"></div>
            <div class = "radio"><pre>3 Sao  </pre><input type="radio" class= "cmt_radio" name="evaluate" value="3"></div>
            <div class = "radio"><pre>4 Sao  </pre><input type="radio" class= "cmt_radio" name="evaluate" value="4"></div>
            <div class = "radio" style=""><pre>5 Sao  </pre><input type="radio" class= "cmt_radio" checked="checked" name="evaluate" value="5"></div>  
            <br>
            <br>
            <input type="file" name="image" style="width:100%" multiple="multiple">
            <br>
            <br>
            <input type="text" style="width:70%" class= "cmt_text" name="comment1" placeholder="Nhập bình luận">
            <input type="submit" class="button" name ="save" value="Bình luận"> 
        </div>
        <br>
        <h1>Tổng hợp bình luận</h1>
        <?php
        // 
        echo "<br>";
        $sql='select tai_khoan.email,binhluansp.id_Bl,binhluansp.id_tk,binhluansp.id_sp,binhluansp.sosao,binhluansp.hinhanh,binhluansp.ND,binhluansp.ngaybinhluan from binhluansp,tai_khoan where binhluansp.id_tk=tai_khoan.id_tk and binhluansp.id_sp = '.$_GET['sanpham'].'';
            $listcomment=executeResuft($sql);
            foreach($listcomment as $listcm){
                echo' <div class="element_bl">'.$listcm['email'].'</div><br>';
                    if($listcm['sosao']>0){
                    for($i=0;$i<$listcm['sosao'];$i++){
                        echo '<div class="element_bl"><i style="float: left;color: #ee4d2d;" class="fas fa-star"></i></div>';
                    }
                }
                echo '<br><br>';
                echo '<div class="element_bl">'.$listcm['ND'].'</div><br><br>';
                $getid;
                if(isset($_GET['id_tk']))
                {
                    $getid='id_tk='.$_GET["id_tk"];
                }
                else{
                    $getid='';
                }
                echo '<div class="element_bl"><a href="img.php?'.$getid.'&sanpham='.$listcm["id_sp"].'&id_Bl='.$listcm["id_Bl"].'"><img style="width: 100px; height: 100px;filter: drop-shadow(0 0 5px white);" src="imgcmt/'.$listcm['hinhanh'].'"></a></div><br><br>'; 
                echo '<div class="element_bl" style="color:rgba(0,0,0,.54)">'.$listcm['ngaybinhluan'].'</div>';
                echo '<hr style="width: 100%;">';
                echo '<br>';
            }  
            
        ?>
    </div>
    </form>
</body>
</html>