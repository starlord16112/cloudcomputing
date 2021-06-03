<?php

require_once ('logic-khachhang.php');
           
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
<h2>Danh sách các khách hàng thành viên</h2>



<table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th  class="col-sm-3">Tên khách hàng</th>
        <th class="col-sm-3">Địa chỉ</th>
        <th class="col-sm-3">Số điện thoại</th>   
        <th class="col-sm-1">Action</th>
      </tr>
    </thead>
    <tbody>

        
         
     
     
     
       
     
    

<?php
$sql = "SELECT id_kh,ten_kh,diachi,sdt FROM khachhang";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc())
{
    $idkh = $row['id_kh'];
     //////////////////////////////////
    echo '<tr>
    
        <td>' .$idkh . '<div></div></td>
        <td class="setwidth concat"><div>' .$row['ten_kh'] . '</div></td>
        <td class="setwidth concat"><div>' .$row['diachi'] . '</div></td>
        <td class="setwidth concat"><div>' .$row['sdt'] . '</div></td>
     
        <td><a href="khachhang.php?view=true&id=' . $idkh . '"><button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="View and Edit">
        <i class="fas fa-eye"></i>
      </button></a>
      
      
      </td>
      
        
      </tr>';
}

?>
      
    </tbody>
  </table>


<div style = "margin:50px 0;">
<div class="container">
<div class="row">
<div class="col-md-6">
<form>
  <div class="form-group col-10">
    <label for="">Tên khách hàng</label>
    <input type="text" class="form-control" value = "<?=$ten
?>" readonly>
  </div>
  <div class="form-group col-10">
  <label for="">Địa chỉ</label>
  <input type="text" class="form-control"  value = "<?=$dc
?>" readonly>
  </div>
  <div class="form-group col-8">
  <label for="">Số điện thoại</label>
  <input type="text" class="form-control"  value = "<?=$sdt
?>" readonly>
  </div>
  
  

 
</form>
</div>
</div>
  </body>
</html>