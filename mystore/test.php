<?php
include 'connect.php';

$query1 = mysqli_query($conn,"SELECT image FROM image WHERE id_sp = 16");
while( $result1 = $query1 -> fetch_assoc()) {
  $img_link = $result1;

}
echo $img_link['image'];


?>