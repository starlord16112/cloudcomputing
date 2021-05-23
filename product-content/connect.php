<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "cnpm";
 //create connection
 $conn = mysqli_connect($servername,$username,$password,$dbname);
 //check
 if(!$conn)
 {
     die("connect fail".mysqli_connect_error());

 }

 ?>