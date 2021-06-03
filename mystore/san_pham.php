<?php include 'header.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moon House</title>
    <link rel="stylesheet" href="./connect.php">
    <link rel="stylesheet" href="./asset/san_pham.css">
    <link rel="stylesheet" href="./assets/fontawesome-free-5.15.3-web-20210518T155225Z-001/fontawesome-free-5.15.3-web/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link  rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap">
    
</head>
<body>
<div id="product">
        <div class="sitebar c-2">
            <ul class="category-list">
                <li class="category-item"><a href="./index.php"><i class="fas fa-bars"></i> Danh mục</a></li>
                <?php
                    include 'connect.php';
                    $sql = 'select * from danhmucsp';
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                        echo ' 
                            <li class="category-item"><a href="san_pham.php?danhmucsp='.$row['id_Dsp'].'"><i class="fas fa-angle-right category-item-icon"></i>'.$row['name_Nsp'].'</a></li>
                            ';
                    }
                ?>
                
            </ul>
        </div>


        <div class="product-list c-10">
            <div class="row">
                <?php
                    include 'connect.php';
                    $sql = 'select * from sanpham where id_Dsp = '.$_GET["danhmucsp"].'  ';
                    $result = $conn->query($sql);

                    while($row = $result->fetch_assoc()) {
                        $idsp=$row['id_sp'];
                        echo '
                            <div class="col c-2">
                                <div class="product-item">
                                    <a href="chitietsp.php?sanpham='.$idsp.'">
                                        <div class="product-item-img" style="background-image: url('.$row['anh_sp'].');"></div>
                                        <div class="product-item-name">'.$row['ten_sp'].'</div>
                                        <div class="product-item-price">
                                            <div class="product-item-star">
                                                <i class="icon-star fas fa-star"></i>
                                                <i class="icon-star fas fa-star"></i>
                                                <i class="icon-star fas fa-star"></i>
                                                <i class="icon-star fas fa-star"></i>
                                                <i class="icon-star fas fa-star"></i>
                                            </div>
                                            <div class="product-item-price-sale">đ'.$row['gia_sp'].'</div>
                                        </div>
                                            <div class="product-item-seen">Số lượng còn '.$row['soluong_ton'].'</div>
                                            <div class="product-item-sold-text">Đã bán '.$row['daban'].'</div>
                                        <div class="product-item-address">'.$row['xuat_xu'].'</div>
                                    </a>
                                </div>
                            </div>
                        ';
                    
                    }
                ?>
            </div>
        </div>



    </div>
    <?php include 'footer.php'?>
</body>
</html>