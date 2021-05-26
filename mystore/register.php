<?php
    require("connect.php");
    $err=[];
    if(isset($_POST['register']))
    {
        $email  = $_POST['txtEmail'];
        $pass   = $_POST['txtPass'] ;
        $repass = $_POST['txtRepass'];
        $checkemail=preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$^", $email);
        $checkpass = preg_match("^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$^", $pass);
        $sqlquery1 = "SELECT email FROM tai_khoan WHERE email='$email'";
        $result1=mysqli_query($conn,$sqlquery1);
        if (!$checkemail)
        {
            $err['email']="Email bạn nhập không chính xác";
        }
        elseif(!$checkpass)
        {
            $err['pass']="Mật khẩu cần tối thiểu 8 ký tự bao gồm cả số và chữ";
        }
        elseif($pass!=$repass)
        {
            $err['repass']="Mật khẩu nhập lại không đúng";
        }
        elseif (mysqli_num_rows($result1) > 0)
        {
            $err['email']="Email đã tồn tại";
        }
        else
        {
            $pass=md5($pass);
            $sqlquery2 = "INSERT INTO `tai_khoan`(`email`, `pass`) VALUES ('$email','$pass')";
            $result2=mysqli_query($conn,$sqlquery2);
        
            if($result2)
            {
               
                echo '<script language="javascript">';
                echo 'alert("Đăng ký thành công!")';
                echo '</script>';

            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moon house</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <!--CSS-->
    <link rel="stylesheet" href="./asset/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .err{
            color:rgb(255,0,0);
            font-size:14px;
        }
    </style>
</head>
<body>
<p style="text-align:center"> OR  </p>
    <div class="register-form">
        <form action="" class="form-signup"method="POST">
        <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Đăng ký</h1>
                <input name="txtEmail"  class="form-control" placeholder="Email address" required="" >
                <div class="err">
                    <span><?php echo (isset($err['email'])?$err['email']:'')?></span>
                </div>
                <input type="password" name="txtPass"class="form-control" placeholder="Password" required="" >
                <div class="err">
                    <span><?php echo (isset($err['pass'])?$err['pass']:'')?></span>
                </div>
                <input type="password" name="txtRepass" class="form-control" placeholder="Repeat Password" required="" >
                <div class="err">
                    <span><?php echo (isset($err['repass'])?$err['repass']:'')?></span>
                </div>
                <input class="btn btn-primary btn-block" type="submit"value="Sign Up"name = "register" onclick=""> </input>
            </form>
    </div>
</body>
</html>