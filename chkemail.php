<?php
include 'includes/conn.php';
$email=$_GET['email'];
$sql="select id from tb_user where email='$email'";
$r= mysqli_query($dbc,$sql);
$num= mysqli_num_rows($r);
echo $num;

