<?php
  include 'connect.php';





  if(!isset($_GET['sanpham']))
  {
    header('location: index.php');
  }
  else
  {
  
              $query = mysqli_query($conn,"SELECT * FROM sanpham WHERE id_sp = ".$_GET["sanpham"]);
              while( $result = $query -> fetch_assoc()) {
                 
  $idsp = $result['id_sp'];
  $name = $result['ten_sp'];
  $img = $result['anh_sp'];
  $price = $result['gia_sp'];
 /* $daban = $result['daban'];
  $conlai = $result['soluong_ton'];*/
  $mota = $result['mo_ta'];  
                
                

   
              }
   
              $img_link=array();
              $i = 0;
              $query1 = mysqli_query($conn,"SELECT image FROM image WHERE id_sp = ".$_GET["sanpham"]);
              while( $result1 = $query1 -> fetch_assoc()) {
                $img_link[$i] = $result1['image'];
                $i = $i + 1;
               
                 
  
                

   
              }

              
        
  

  }

  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="asset/img/1200px-Shopee_logo.svg.png" type="image/x-icon">
    
      <!-- link css -->
    
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
      <link rel="stylesheet" href="asset/css/chitiet.css">
      <!-- link font awesome -->
    
      <title>Moon House</title>
  <style>
  /* .cart
    {
      position: relative;
      top:-30px;
      right:15px;
    
    }
    .cart a
    {
      position: absolute;
      right:0px
    }*/
  </style>
  </head>
  <body>
    <div class="header">
  <div class="btn-back">
  <a id="btn-back" href="index.php">Quay về trang danh mục sản phẩm</a>
  </div>
  <div class="cart">
            

            <a href="cart.php"><button type="button" class="btn btn-info"><i class="fas fa-cart-plus"></i> Giỏ hàng</button></a>
  </div>
  </div>
    <div class="product-content">
      <div class="product-price">
      
        <div class="container clearfix">
          <div class="col-5">
            <div class="product-price__image">
              <div class="image__main">
              <img src="<?php echo $img;?>" alt="" id="main_image">
              </div>
              
                <div class="list-item">
                    <div class="item"><img src="<?php echo $img;?>" onclick="click_image(this)"></div>
                    <div class="item"><img src="<?php echo $img_link[0]?>" onclick="click_image(this)"></div>
                    <div class="item"><img src="<?php echo $img_link[1]?>" onclick="click_image(this)"></div>
                    <div class="item"><img src="<?php echo $img_link[2]?>" onclick="click_image(this)"></div>
                    <div class="item"><img src="<?php echo $img_link[3]?>" onclick="click_image(this)"></div>                 
                </div>        
          </div>
          </div>
          

          <div class="col-7">
            <div class="product-price__detail">
              <div class="name">
              <p><span>Yêu thích</span>[MÃ MADE20K3Q GIẢM 20% TỐI ĐA 30K ĐƠN TỐI THIỂU 500K] <?php echo ucwords($name);?></p>
              </div>
              <!-- <div class="rate-bar">
                            
                <div style="margin:0 20px 0 0;"class="number-sell"><span><?php/* echo $conlai." ";*/s?></span>Còn lại</div>
                <div class="number-sold"><span><?php/* echo $daban." ";*/?></span>Đã bán</div>

              </div> -->
              <div class="price">
                <p><?php echo $price;?>đ</p>
              </div>
              
              <div class="mota"><p>Mô tả sản phẩm:</p>
              <ul>
              <li>Sản phẩm phân phối chính hãng tại moon house</li>
              <li>Sản phẩm bảo đảm an toàn và còn hạn sử dụng</li>
              <li><?php echo ucwords($mota);?></li>
              
              
              </ul>
              
              </div>
              <form action="cart.php" method = "POST">
              
              <div class="add-btn">
              <button type="submit" name="add-to-cart"><i class="fas fa-cart-plus"></i>Thêm vào giỏ hàng</button>
              </div>
              
                <input type="hidden" name = "idsp" value ="<?php echo $idsp;?>">
                <input type="hidden" name = "name" value = "<?php echo $name;?>">
                <input type="hidden" name = "img" value = "<?php echo $img;?>">
                <input type="hidden" name = "price" value = "<?php echo $price;?>">
      
              
              
              </form>


            
              <div class="share">
                Chia sẻ:
                <a href="https://www.facebook.com/manhpt.tlu/"><i style="color:#4965A0;font-size: 30px;"class="fab fa-facebook-square"></i></a>
                <a href=""><i style="color:#4965A0;font-size: 30px;"class="fab fa-facebook-messenger"></i></a>
                <a href=""><i style="color:#4965A0;font-size: 30px;"class="fab fa-twitter"></i></a>
                <a href=""><i style="color:#4965A0;font-size: 30px;"class="fab fa-instagram"></i></a>
              </div>
            </div>
            </div>
            </div>
          </div>

        
      
      
      
    
      
        </div>
      
      
      </div>
      
    
     
      

    <script src="asset/main.js"></script>

    
    <?php include 'cmt.php';?>
  </body>
  </html>