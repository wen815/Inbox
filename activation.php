<?php
error_reporting(0);
session_start();
include'includes/conn.php';
$name=$_GET['name'];
$password=$_GET['password'];
$q="SELECT * FROM tb_user WHERE name='$name'AND password='$password'";
$r= mysqli_query($dbc, $q);
$num= mysqli_num_rows($r);
if($num>0){
    $q_1="UPDATE tb_user SET active=1 WHERE name='$name'AND password='$password'";
    $r_1= mysqli_query($dbc, $q_1);
    $num_1= mysqli_num_rows($r_1);
    if($num_1>0){
 $_SESSION['name'] = $name;
 echo "<script>alert('激活成功');window.location.href='index.php';</script>";
    }
    else{
         $_SESSION['name'] = $name;
    echo "<script>alert('您已激活');window.location.href='index.php';</script>";     
    }
}
else{
    	echo "<script>alert('激活失败');window.location.href='reg.php';</script>";
}

