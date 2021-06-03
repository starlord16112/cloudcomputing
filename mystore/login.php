<?php
    require("connect.php");
    session_start();
    $err = [];
    if(isset($_POST['login']))
    {
        $email = $_POST['txtEmail'];
        $pass  = $_POST['txtpassword'];
        $pass = md5($pass);
        $sql   = "SELECT * from tai_khoan where email = '$email'";
        $query = mysqli_query($conn,$sql);
        $data  = mysqli_fetch_assoc($query);
        $checkemail = mysqli_num_rows($query);
        if($checkemail ==1)
        {   
            if($pass==$data['pass'])
            {
                $_SESSION['user'] = $data;
                
               if($data['quyendn']==1)
               {
               
                echo '<script>alert("Đăng nhập thành công")</script>';
                echo '<script>window.location="index.php"</script>';
                   
               }
               else
               {
                echo '<script>alert("Đăng nhập thành công")</script>';
                echo '<script>window.location="index.php"</script>';
               }
            }
            else{
                $err['pass']="Mật khẩu không đúng";
            }
            
        }
        else{
            $err['email']="Email không chính xác";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap">
    <!--Google font awesome-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <!--CSS-->
    <link rel="stylesheet" href="./asset/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <!--header-->
<div class="header" >
        <div class="container">
            <div class="header__menu">
                <div class="header__menu-logo">
                   <a href="index.php" class="header__menu-link">Moon House</a>
                </div>
                <div class="header-link">
                <a href="index.php"class= "list__item-link"><i class="fas fa-chevron-left"></i>Back</i></a>
                </div>
            </div>
        </div>
</div>
    <div class="login-form">
        <!--signin-->
        <form class="form-signin" method="POST">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Đăng nhập</h1>
            <input name="txtEmail"class="form-control" placeholder="Email address" required="" autofocus=""autocomple="off">
            <div class="err">
                    <span><?php echo (isset($err['email'])?$err['email']:'')?></span>
                </div>
            <input type="password" name = "txtpassword"  class="form-control" placeholder="Password" required=""autocomple="off">
            <div class="err">
                    <span><?php echo (isset($err['pass'])?$err['pass']:'')?></span>
                </div>
            <input class="btn btn-success btn-block" type="submit" value="Sign in " name = "login"></input>
        </form>
        <?php include("register.php")?>
</div>  
</body>
</html>