<?php
require_once ('logic-sanpham.php');
include ('header.php');
include ('../connect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <style>
  .setwidth
  {
    max-width:100px;
  }
  .concat div
  {
    overflow:hidden;
    -ms-text-overflow:ellipsis;
    -o-text-overflow:ellipsis;
    text-overflow:ellipsis;
    white-space:nowrap;
    width: inherit;
  }
  td button
  {
    margin: 0 10px
  }
  h2{
    margin:30px 0;
    text-align:center;
  }

  form button
  {
    margin:15px 0;
  }
  label
  {
    font-size:120%;
  }
 .table-hover
 {
   margin:50px 0;
 }
  </style>
</head>
<body>
<h2>Danh sách sản phẩm</h2>



<table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th  class="col-sm-3">Tên sản phẩm</th>
        <th class="col-sm-2">Mô tả</th>
        <th class="col-sm-1">Giá</th>
        <th  class="col-sm-1">Còn lại</th>
        <th class="col-sm-1">Đã bán</th>
        <th class="col-sm-2">Link ảnh</th>
        <th class="col-sm-2">Action</th>
      </tr>
    </thead>
    <tbody class="danhsach">

     <?php
if (isset($_SESSION['alert']))
{
    echo '<script>alert("' . $_SESSION['alert'] . '")</script>';
    unset($_SESSION['alert']);
}

?>
       
        
         
     
     
     
       
     
    

<?php
$sql = "SELECT id_sp,ten_sp,mo_ta,gia_sp,anh_sp FROM sanpham";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc())
{
    $idsp = $row['id_sp'];
     //lấy số lượng trong kho hàng
     $sql_kho = "SELECT * FROM khohang WHERE id_sp = '$idsp'";
     $result_kho = $conn->query($sql_kho);
     
     
       while($row_kho = $result_kho->fetch_assoc()) {
         $daban = $row_kho['daban'];
         $conlai = $row_kho['conlai'];
       }


     //////////////////////////////////
    echo '<tr>
    
        <td>' . $row['id_sp'] . '<div></div></td>
        <td class="setwidth concat"><div>' . $row['ten_sp'] . '</div></td>
        <td class="setwidth concat"><div>' . $row['mo_ta'] . '</div></td>
        <td class="setwidth concat"><div>' . $row['gia_sp'] . '</div></td>
        <td class="setwidth concat"><div>' .$conlai. '</div></td>
        <td class="setwidth concat"><div>' .$daban . '</div></td>
        <td class="setwidth concat"><div>' . $row['anh_sp'] . '</div></td>
        <td><a href="sanpham.php?edit=true&id=' . $idsp . '"><button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="View and Edit">
        <i class="fas fa-cogs"></i>
      </button></a>
      <a href="logic-sanpham.php?delete=true&id=' . $idsp . '"><button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete">
      <i class="fas fa-trash"></i>
      </button></a>
      
      </td>
      
        
      </tr>';
}

?>
      
    </tbody>
  </table>
<!-- form lọc sản phẩm -->

<div class="container">
<h4>Lọc sản phẩm</h4>
<div class="row">
  <!-- <form action=""> -->
  
  <!-- <div class="form-group col-1">
    <label for=""></label>
    <input type="text" class="form-control timkiem" id="" placeholder="ID">
  </div> -->
  <div class="form-group col-3">
    <label for=""></label>
    <input type="text" class="form-control timkiem_name" id="" placeholder="Nhập tên sản phẩm">
  </div>
  <div class="form-group col-1">
    <label for=""></label>
    <input type="text" class="form-control timkiem_id" id="" placeholder="ID">
  </div>
  </div>
  <div class="row" style="margin-top:20px;">
  <div class="form-group col-4">
  <select class="form-select timkiem_danhmuc">
  <option selected value = "">Chọn danh mục</option>
  <?php
    $sql_danhmuc = "SELECT id_Dsp,name_Nsp FROM danhmucsp";
    $result = $conn->query($sql_danhmuc);
    while ($row = $result->fetch_assoc())
         {
    echo '<option value = '.$row['id_Dsp'].'>'.$row['name_Nsp'].'</option>' ;
}
?>
  
</select>
  </div>
  </div>
<!-- 
  <button type="button submit" class="btn btn-primary">Lọc</button>

</form> -->
</div>  
</div>
<hr style="width:90%;text-align:center;margin:30px auto;">
<!-- form để thêm sản phẩm hoặc sửa -->
<div class="container">
<div class="row">
<div class="col-md-8">
<form action="logic-sanpham.php" method="post">
<input type="hidden" class="form-control" value = "<?=$id_view
?>"  name="id_sp">
  <div class="form-group">
    <label for="">Tên sản phẩm</label>
    <input type="text" class="form-control" id="" value = "<?=$tensp
?>" required name="tensp">
  </div>
  <div class="form-group col-2">
  <label for="">Danh mục</label>
  <input type="text" class="form-control" id="" value = "<?=$dmuc
?>" required name="danhmuc">
  </div>
  
  <div class="form-group">
    <label for="">Mô tả:</label>
    <input type="text" class="form-control" id="" value = "<?=$mota
?>" required name="mota">
  </div>
  <div class="form-group  col-5">
    <label for="">Xuất xứ</label>
    <input type="text" class="form-control" id="" value = "<?=$xxu
?>" required name="xuatxu">
  </div>
  <div class="form-group col-2">
    <label for="">Giá</label>
    <input type="text" class="form-control" id="" value = "<?=$gia
?>" required name="gia">
  </div>
  <!-- <div class="form-group col-2">
    <label for="">Còn lại</label>
    <input type="text" class="form-control" id="" value = "<?=$conlai
?>" required name="conlai">
  </div>
  <div class="form-group col-2">
    <label for="">Đã bán</label>
    <input type="text" class="form-control" id="" value = "<?=$daban
?>" required name="daban">
  </div> -->
  <div class="form-group">
    <label for="">Link ảnh</label>
    <input type="text" class="form-control" id="" value = "<?=$imglink
?>" required name="link">
  </div>
  
<?php if ($edit == true): ?>
  <button type="button submit" class="btn btn-primary" name = "edit-btn">Sửa</button>
 <?php
else: ?>  
  <button type="button submit" class="btn btn-primary" name = "add-btn">Thêm</button>
    <?php
endif ?>
 
</form>
</div>

<!-- bảng danh mục -->
<div class="col-md-4"> 
<h4>Danh mục sản phẩm hiện có</h4>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Danh mục</th>
        <th>Tên danh mục</th>
      </tr>
    </thead>
    <tbody>
     <?php
$sql_danhmuc = "SELECT id_Dsp,name_Nsp FROM danhmucsp";
$result = $conn->query($sql_danhmuc);
while ($row = $result->fetch_assoc())
{
    echo '<tr><th>' . $row['id_Dsp'] . '</th>
                   <th>' . $row['name_Nsp'] . '</th>
         
         
         </tr>';
}
?>
    </tbody>
  </table>
</div>
</div>
</div>
<script src="../asset/jquery-3.6.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<script>
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})



 ///////////////////////////////////////
 $('.timkiem_name').keyup(function(){
  $('.timkiem_id').val("");
  $('.timkiem_danhmuc').prop('selectedIndex',0);
   var key = $('.timkiem_name').val();
   $.post('sanpham_ajax.php',{data_name:key},function(result) {
     $('.danhsach').html(result);
     
   })

 })
 $('.timkiem_id').keyup(function(){
  $('.timkiem_name').val("");
  $('.timkiem_danhmuc').prop('selectedIndex',0);
   var key = $('.timkiem_id').val();
   $.post('sanpham_ajax.php',{data_id:key},function(result) {
     $('.danhsach').html(result);
     
   })

 })
 $('.timkiem_danhmuc').change(function(){
  $('.timkiem_id').val("");
  $('.timkiem_name').val("");
  var key = $('.timkiem_danhmuc').val();
   $.post('sanpham_ajax.php',{data_dmuc:key},function(result) {
     $('.danhsach').html(result);
     
     
   })


  })
  </script>
</body>
</html>
