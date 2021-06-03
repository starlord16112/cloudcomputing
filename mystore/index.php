<?php 
require('connect.php');
    $name = isset($_GET['name']) ? $_GET['name']:'';
    $sql = "SELECT * FROM `sanpham`";
    $sql1 = "SELECT * FROM `sanpham` WHERE `ten_sp`LIKE '%$name %'or `gia_sp`<'$name'";
    
    if($sql1)
    {
        $query = mysqli_query($conn,$sql1);
    }
    else
    {
        $query = $conn->query($sql);
    }
    include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moon House</title>
    <!--Google font-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap">
    <!--Google font awesome-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <!--CSS-->
    <link rel="stylesheet" href="./asset/style.css">
    <link rel="stylesheet" href="./asset/danh_muc_san_pham.css">
    <link rel="stylesheet" href="./asset/fontawesome-free-5.15.3-web-20210518T155225Z-001/fontawesome-free-5.15.3-web/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap">
</head>
<style>
    * {
        box-sizing: inherit;
    }

    html {
        font-family: 'Roboto', sans-serif;
        box-sizing: border-box;
    }
    div.recommend-list
    {
        background-color:#F5F5F5;
    }
    div.recommend-item
    {
        background-color:white;
        box-shadow: 0.5px 0.5px 0.5px  #999999;
        
    }
    div.recommend-item:hover
    {
        border:1px solid red;
    }
 
</style>

<body>
    <div id="category">
        <div class="category-list">
            <div class="category-header">DANH MỤC</div>
            <div class="row">
            <?php
                include 'connect.php';
                $sql = 'select * from danhmucsp';
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {  
                    echo '
                        <div class="col c-10">
                            <div class="category-item">
                                <a href="san_pham.php?danhmucsp= '.$row['id_Dsp'].' ">
                                    <p class="category-item-name">'.$row['name_Nsp'].'</p>
                                </a>
                            </div>
                        </div>  ';
                }

            ?>
        </div>
        
        <div class="recommend-list">
            <div class="recommend-header">GỢI Ý HÔM NAY</div>
            <div class="row">
                <?php
                    include 'connect.php';
                   
                    while($row = $query->fetch_assoc()) {
                        $idsp=$row['id_sp'];

                        //lấy số lượng trong kho hàng
                        $sql_kho = "SELECT * FROM khohang WHERE id_sp = '$idsp'";
                        $result_kho = $conn->query($sql_kho);
                        
                        
                          while($row_kho = $result_kho->fetch_assoc()) {
                            $daban = $row_kho['daban'];
                          }


                        //////////////////////////////////
                        
                        if(!isset($user['email']))
                        {echo '
                            <div class="col c-2">
                                <div class="recommend-item">
                                    <a href="chitietsp.php?sanpham='.$idsp.'">
                                        <div class="recommend-item-img" style="background-image: url('.$row['anh_sp'].');"></div>
                                        <div class="recommend-item-name">'.$row['ten_sp'].'</div>
                                        <div class="recommend-item-price">
                                            <div class="recommend-item-price-initial">59.900.000đ</div>
                                            <div class="recommend-item-price-sale">'.$row['gia_sp'].'</div>
                                        </div>
                                        <div class="recommend-item-sold">
                                            <div class="recommend-item-star c-5">
                                                <i class="icon-star fas fa-star"></i>
                                                <i class="icon-star fas fa-star"></i>
                                                <i class="icon-star fas fa-star"></i>
                                                <i class="icon-star fas fa-star"></i>
                                                <i class="icon-star fas fa-star"></i>
                                            </div>
                                            <div class="recommend-item-sold-text c-5">Đã bán '.$daban.'</div>
                                        </div>
                                        <div class="recommend-item-address">'.$row['xuat_xu'].'</div>
                                    </a>
                                </div>
                            </div>';}
                        else{
                        echo '
                            <div class="col c-2">
                                <div class="recommend-item">
                                    <a href="chitietsp.php?id_tk='.$user['id_tk'].'&sanpham='.$idsp.'">
                                        <div class="recommend-item-img" style="background-image: url('.$row['anh_sp'].');"></div>
                                        <div class="recommend-item-name">'.$row['ten_sp'].'</div>
                                        <div class="recommend-item-price">
                                            <div class="recommend-item-price-initial">59.900.000đ</div>
                                            <div class="recommend-item-price-sale">'.$row['gia_sp'].'</div>
                                        </div>
                                        <div class="recommend-item-sold">
                                            <div class="recommend-item-star c-5">
                                                <i class="icon-star fas fa-star"></i>
                                                <i class="icon-star fas fa-star"></i>
                                                <i class="icon-star fas fa-star"></i>
                                                <i class="icon-star fas fa-star"></i>
                                                <i class="icon-star fas fa-star"></i>
                                            </div>
                                            <div class="recommend-item-sold-text c-5">Đã bán '.$daban.'</div>                                      </div>
                                        <div class="recommend-item-address">'.$row['xuat_xu'].'</div>
                                    </a>
                                </div>
                            </div>';
                        }
                    }
                ?>

            </div>
        </div>
    </div> 
                
</div>
<?php include 'footer.php'?>
</body>
</html>


