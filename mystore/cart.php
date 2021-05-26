<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['user']))
{
 header('location: login.php');
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['add-to-cart']))
    {
        if(isset($_SESSION['cart']))
        {
            $item_array_id = array_column($_SESSION['cart'],'item_id');
            if(!in_array($_POST['idsp'],$item_array_id))
            {
                $count = count($_SESSION['cart']);
                
            $item_array = array(
                'item_id'=> $_POST["idsp"],
                'item_name' => $_POST["name"],
                'item_price' => $_POST["price"],
                'item_img' => $_POST['img']
            );
            $_SESSION['cart'][$count] = $item_array;   
            echo '<script>alert("thêm vào giỏ hàng thành công")</script>';
            }
            else
            {
               
                echo '<script>alert("sản phẩm đã có trong giỏ hàng,không thể thêm")</script>';
            }

        }
        else
        {
            $item_array = array(
                'item_id'=> $_POST["idsp"],
                'item_name' => $_POST["name"],
                'item_price' => $_POST["price"],
                'item_img' => $_POST['img']


            );
            $_SESSION['cart'][0] = $item_array;

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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/cart.css">
    <style>
      .cart-page {
    margin: 90px auto;
  }
  
  table {
    margin: 0 auto;
    width: 60%;
    border-collapse: collapse;
  }
  
  .cart-info {
    display: flex;
    flex-wrap: wrap;
  }
  
  th {
    text-align: left;
    padding: 5px;
    color: #ffffff;
    background: #ff523b;
    font-weight: normal;
  }
    td {
    padding: 10px 5px;
   
  }
  
  td input {
    width: 60px;
    height: 30px;
    padding: 5px;
  }
  
  td a {
    color: #ff523b;
    font-size: 12px;
  }
  
  td img {
    width: 130px;
    height: 130px;
    margin-right: 10px;
  }
  
  .total-price {
    display: flex;
    justify-content: flex-end;
  }
  
  .total-price table {
  
    border-top: 3px solid #ff523b;
    width: 100%;
    max-width: 400px;
  }
  
  td:last-child {
    text-align: right;
  }
  
  th:last-child {
    text-align: right;
  }
  .btn-back
  {
    text-align: center;
    margin: 25px 0 30px 0;
  }
  h1
  {
    text-align: center;
  }
   .info
   {
     display:none;
     width: 60%;
     margin:60px auto;
     
   }
   .info input
   {
     margin:15px 0;
   }
     .first
     {
       margin: 0 0 0 300px;
     }
     .content
     {
       font-size:150%;
       display:inline-block;
     }
    </style>
</head>
<body>

<div class="info">
 <h2>Điền thông tin của bạn</h2>
 <form action="success.php" method = "POST">
  <div class="form-group">
    <label for="name">Họ tên:</label>
    <input type="text" class="form-control" name = "ten" id="ten" placeholder="Nhập tên của bạn" required>
    
  </div>
  <div class="form-group">
    <label for="name">Địa chỉ:</label>
    <input type="text" class="form-control" name = "dc" id="diachi" placeholder="Nhập địa chỉ" required>
    
  </div>
  <div class="form-group">
    <label for="name">Số điện thoại:</label>
    <input type="text" class="form-control" name = "sdt" id="sdt" placeholder="Nhập số điện thoại" required>
    
  </div>
  <input type="hidden" name = "tong">
  <button type="submit" name = "submit-dathang" class="btn btn-primary">Đặt hàng</button>
</form>
</div>
<?php

$user=(isset($_SESSION['user'])?$_SESSION['user']:[]);
$idtk =  $user['id_tk'];
     $sql = "SELECT  id_tk FROM khachhang";
     $result = $conn->query($sql);
     
       $arr = array();
       $i = 0;
       while($row = $result->fetch_assoc()) {
         $arr[$i] = $row['id_tk'];
         $i = $i + 1;
  
       }
       if(in_array($idtk, $arr))
       {
        $sql1 = "SELECT  *  FROM khachhang WHERE id_tk = '$idtk'";
        $result1 = $conn->query($sql1);
        while($row = $result1->fetch_assoc()) {
        $tenkh =$row['ten_kh']; 
        $dckh =$row['diachi'];
        $sdtkh =$row['sdt'];
   
        }
          ?>
             
          <script>
                var ten = document.getElementById('ten');
                var dc = document.getElementById('diachi');
                var sdt = document.getElementById('sdt');
                ten.value = "<?php echo $tenkh; ?>";
                dc.value = "<?php echo $dckh; ?>";
                sdt.value = "<?php echo $sdtkh; ?>";
          
          </script>
          <?php
       }



?>

<h1 class="display-cart">Giỏ hàng</h1>



<div class="small-container cart-page display-cart">
        <table>
          <tr>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Tổng</th>
           
           
            
            
          </tr>
      
          
            <?php
            if(!empty($_SESSION['cart']))
                {
               
                if(isset($_GET['action']))
                {
                    if($_GET['action'] == 'delete')
                    {
                        foreach($_SESSION['cart'] as $keys => $values)
                        {
                            if($values['item_id'] == $_GET['id'])
                            {
                               
                              unset($_SESSION['cart'][$keys]);
                              
                            }
                        }
                    }
                }


                
                foreach($_SESSION['cart'] as $keys => $values)
                {          
                        
              
              
             
            
                                           
          ?>
            <tr>
            <td>
              <div class="cart-info display-cart">
                <img src="assets/img/<?php echo $values['item_img'];?>" alt="" />
                <div>
                  <p style="font-size:120%;"><?php echo $values['item_name']; ?></p>
                  <small style="font-size:120%;">Giá <?php echo $values['item_price']; ?>đ</small>
                  <input type="hidden" class="itemname" value ='<?php echo $values['item_name'];?>'/>
                   <input type="hidden" class="itemprice" value ='<?php echo $values['item_price'];?>'/>
                  <br />
                  <a style="font-size:120%;" href="cart.php?action=delete&id=<?php echo $values['item_id'];?>">Xóa</a>
                
                </div>
              </div>
            </td>
            <td style="font-size:120%;"><input type="number" onchange='subTotal()' value="0" class="itemquantity"  min = "0" max = "9"/></td>

            <td style="font-size:120%;" class="itemtotal"></td>
             
        
            
          </tr>
          <?php 
              }
            }
              ?>
            
            
            
            
           
          </table>
        </div>
      </div>



      <div class="total-price display-cart">
          <table>
            <tr>
              <td style="font-size:120%;">Tổng tiền</td>
              <td style="font-size:150%;" id = "total"></td>
            </tr>
            
          </table>
        </div>
        <div class="btn-back display-cart">

  <div style="margin-bottom:15px;">
  <form action="" method = "POST" id = "form-thanhtoan">
  <a href=""><button type="submit" name="submit" class="btn btn-success" style="font-size:140%;">Thanh toán</button>
   <input type="hidden" name = "soluong" id="soluong">
   <input type="hidden" name = "tong" id="tong">
</form>
</a></div>


      <?php
if(isset($_POST['idsp']))
{ ?>
 
<a href="chitietsp.php?sanpham=<?php echo $_POST['idsp'];?>"><button type="button" class="btn btn-primary">Quay về trang sản phẩm</button></a>

<?php }?>
<a href="index.php"><button type="button" class="btn btn-primary">Quay về trang danh mục</button></a>
</div>
<script>
  var iprice = document.getElementsByClassName('itemprice');
  var iname = document.getElementsByClassName('itemname');
  var iquantity = document.getElementsByClassName('itemquantity');
  var itotal = document.getElementsByClassName('itemtotal');
  var total = document.getElementById('total');
var sum = 0;
  function subTotal() {
    sum = 0;
    for(i = 0;i < iprice.length;i++)
    {
      
     
      itotal[i].innerText = (iprice[i].value * iquantity[i].value) + "đ";
      sum = sum + (iprice[i].value * iquantity[i].value);
      document.getElementById('soluong').value += iquantity[i].value;
    
    

    }
    total.innerText = sum + "đ";
    document.getElementById('tong').value = sum + "đ";

  }
  subTotal();
</script>
<?php
if(isset($_POST['submit']))
{
  if($_POST['tong'] == '0đ')
  {
    echo '<script>alert("Bạn chưa chọn số lượng")</script>';

  }
  else
  {
   ?>
 <script>
 var info = document.getElementsByClassName('info');
 info[0].style.display = 'block';
 var display_cart = document.getElementsByClassName('display-cart');
for(i = 0;i < display_cart.length;i++)
{
  display_cart[i].style.display = 'none';
}
 </script>
     
   <?php
   $mota = "";
   $count = count($_SESSION['cart']);
   $str = substr($_POST['soluong'],-($count),$count);
  
  

   echo '<table style="width:75%">
   <tr>
     <th>Tên sản phẩm</th>
     <th>Số lượng</th>
     
   </tr>';
   

   foreach($_SESSION['cart'] as $keys => $values)
   {
     if($str[0] == "0")
     {
      $str = substr($str,1);
       continue;
     }
     /*echo "<span class='content'>[".$str[0]."]</span>";
    
     echo "-";
     echo "<span class='content'>".$values['item_name']."</span>";
     $mota =    $mota." [".$str[0]."] ".$values['item_name']." ";
     */
    echo '<tr>
    <td>'.$values['item_name'].'</td>
    
    <td>'.$str[0].'</td>
   
    </tr>';
     
     $str = substr($str,1);
   }
   echo  '</table>';
 
   echo "<h2 style='text-align:center;'> Tổng tiền là: ".$_POST['tong']."</h2>";
   $_SESSION['tongtien'] = $_POST['tong'];
   $_SESSION['mota'] = $mota;
  }
 
}
  
?>

</body>
</html>