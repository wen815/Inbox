<?php
   include 'includes/conn.php';
   $name= mysqli_real_escape_string($dbc,trim($_GET['name']));
 $content= mysqli_real_escape_string($dbc,$_GET['content']);
 $time= mysqli_real_escape_string($dbc,$_GET['time']);

 if(!empty($name)&&(!empty($content))&&(!empty($time))){
  //是否已有记录
 $q="select * from tb_content where content='$content'";
 $r= mysqli_query($dbc, $q);
 $n= mysqli_num_rows($r);
 if($n==0){
    $sql="INSERT INTO tb_content(name,content,time)VALUES('$name','$content','$time')";
 }
$result= mysqli_query($dbc, $sql);
$num= mysqli_affected_rows($dbc);
if($num==1){
    echo "1";
}
else{
    echo "0";
}
}    

 


