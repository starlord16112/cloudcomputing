<?php
require('config.php');
$conn=mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
function execute($sql){
    $conn=mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
    mysqli_query($conn,$sql);
    mysqli_close($conn);

}
function executeResuft($sql){
    $conn=mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    $resuftset=mysqli_query($conn,$sql);
    $list=[];
    while($row = mysqli_fetch_array($resuftset,1)){
        $list[]=$row;
    }
    mysqli_close($conn);
    return $list;       
}
?>
