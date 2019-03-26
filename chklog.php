<?php
session_start();
include'includes/conn.php';
$name=trim($_GET['name']);
$password=MD5(trim($_GET['password']));
$q="SELECT * FROM tb_user WHERE name='$name'AND password='$password'AND active=1";
$r=mysqli_query($dbc,$q);
$num= mysqli_num_rows($r);
if($num==1){
    echo "1";
    $_SESSION['name']=$name;
}
else{
    echo "0";
}

