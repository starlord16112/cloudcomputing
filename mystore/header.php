<?php
    session_start();
    require('connect.php');
    $user=(isset($_SESSION['user'])?$_SESSION['user']:[]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moon House</title>
    <link rel="shortcut icon" href="asset/img/1200px-Shopee_logo.svg.png" type="image/x-icon">
    <!--Google font-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap">
    <!--Google font awesome-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <!--CSS-->
    <link rel="stylesheet" href="./asset/style.css">
    <style>
    .admin-btn
    {
        margin:0 0 0 20px;
    }
    .admin-btn a
    {
        color:white;
        font-size:120%;
    }
    .header__menu-logo img
    {
        width:50px;
        height:50px;
    }

    </style>
</head>
<body>
    <!--header-->
    <div class="header">
        <div class="container">
            <div class="header__menu">
                <div class="header__menu-logo">
                   <a href="index.php" class="header__menu-link">Moon House</a>
              
                </div>
                <div class="header__menu-search">
                    <form action="" method ="GET">
                    <input class="form-control search" type="text"name="name" placeholder="Bạn cần mua gì hôm nay ?"autofocus="">
                    <input class= "btn-search button" type='submit' value = "Search">   
                    
                    
                </div>
                <ul class="header__menu-list">
                    <li class="list__item"> 
                        <a href="cart.php" class="list__item-link">
                        <i class="fas fa-shopping-cart" ></i>
                            Giỏ Hàng</a>
                    </li>
                   
                    <li class="list__item">
                   
                        <?php if(isset($user['email']))
                        {
                            echo '<a href="#" class="list__item-link">';
                            echo '<i class="far fa-user-circle"></i>';
                            $email = str_replace( '@gmail.com', '',$user['email']);
                                 echo $email;
                            echo '</a> ';
                            
                             echo  ' <li class="list__item"> ';
                             echo   '<a href="logout.php" class="list__item-link">';
                             echo   '<i class="fas fa-sign-out-alt" ></i>';
                             echo   'Đăng xuất</a></li>';
                        }
                         else{
                            echo'<a href="./login.php" class="list__item-link">';
                            echo'<i class="far fa-user-circle"></i>';
                            echo '    Tài Khoản';
                            echo '</a> ';
                         }
                        ?>
                    </li>
                    <?php
                   if($user != [])
                   {
                     if($user['quyendn'] == 1)
                     {
                    ?>
                    <li class="list__item admin-btn">
                        <a href="admin/index.php?admin=true"><i class="fas fa-users-cog"></i>Admin</a>
                    </li>
                    <?php
                     }
                    }
                
                    ?>
                </ul>
            </div>

        </div>
    </div>
    <!--end header-->
</body>
</html>