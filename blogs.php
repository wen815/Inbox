<?php
         include 'includes/conn.php';
     include 'includes/header.html';  
             ?>
<?php
$name=$_GET['name'];
$id_con=$_GET['pid'];
$sql="select * from tb_content where id_con='$id_con'and name='$name'";
$r= mysqli_query($dbc, $sql);
while($row= mysqli_fetch_array($r,MYSQLI_ASSOC)){
    echo $row['content'];
}
$query="UPDATE tb_up set is_read='1' where id_con='$id_con'";
$result= mysqli_query($dbc, $query);
?>


