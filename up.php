<?php
session_start();
 include 'includes/conn.php';
$id_con=$_GET['id_con'];
$upr=$_GET['upr'];
if(!empty($id_con)&&(!empty($upr))){
       $sql="select * from tb_up where id_con='$id_con'and upr='$upr'";
    $rs= mysqli_query($dbc, $sql);
    if(mysqli_num_rows($rs)==1){//已经点赞
        $sql1="delete from tb_up where id_con='$id_con'and upr='$upr'";
         $rs1= mysqli_query($dbc, $sql1);
        echo "0";
    }
    else{//没有点赞
   $sql2="INSERT INTO tb_up(id_con,up_num,upr)VALUES('$id_con',1,'$upr')";
     $rs2= mysqli_query($dbc, $sql2);
     echo "1";
    }
}

