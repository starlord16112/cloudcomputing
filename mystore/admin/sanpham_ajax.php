


<?php 
   
   require('../connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_POST['data_name']))
{
$post_val  = $_POST['data_name'];
$sql = "SELECT id_sp,ten_sp,mo_ta,gia_sp,anh_sp FROM sanpham WHERE ten_sp LIKE '%$post_val%'";
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
        <td class="setwidth concat"><div>' . $conlai . '</div></td>
        <td class="setwidth concat"><div>' . $daban. '</div></td>
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
}
else if (isset($_POST['data_id']))
{
    $post_val  = $_POST['data_id'];
    $sql = "SELECT id_sp,ten_sp,mo_ta,gia_sp,anh_sp FROM sanpham WHERE id_sp LIKE '%$post_val%'";
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


        echo '<tr>
        
            <td>' . $row['id_sp'] . '<div></div></td>
            <td class="setwidth concat"><div>' . $row['ten_sp'] . '</div></td>
            <td class="setwidth concat"><div>' . $row['mo_ta'] . '</div></td>
            <td class="setwidth concat"><div>' . $row['gia_sp'] . '</div></td>
            <td class="setwidth concat"><div>' . $conlai . '</div></td>
        <td class="setwidth concat"><div>' . $daban. '</div></td>
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
}
else if(isset($_POST['data_dmuc']))
{
  $post_val  = $_POST['data_dmuc'];
  $sql = "SELECT id_sp,ten_sp,mo_ta,gia_sp,anh_sp FROM sanpham WHERE id_Dsp LIKE '%$post_val%'";
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


      echo '<tr>
      
          <td>' . $row['id_sp'] . '<div></div></td>
          <td class="setwidth concat"><div>' . $row['ten_sp'] . '</div></td>
          <td class="setwidth concat"><div>' . $row['mo_ta'] . '</div></td>
          <td class="setwidth concat"><div>' . $row['gia_sp'] . '</div></td>
          <td class="setwidth concat"><div>' . $conlai . '</div></td>
      <td class="setwidth concat"><div>' . $daban. '</div></td>
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
}
?>
</body>
</html>