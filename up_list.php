<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>点赞列表</title>
    </head>
    <body>
        <?php
            include 'includes/conn.php';
     include 'includes/header.html';   
     
        ?>

        <section id="main">
            <?php

   include 'includes/conn.php';
$sql="select * from tb_up where upr!='$_SESSION[name]'";
$r= mysqli_query($dbc, $sql);
while($row= mysqli_fetch_array($r,MYSQLI_ASSOC)){
    echo"<p>";
          $href='profile.php?name='.$row['upr'];
          if($row['is_read']==0){
          echo "<a href=$href style='color:red'>".$row['upr']."</a>"."赞了";       
          }
 else{
               echo "<a href=$href style='color:green'>".$row['upr']."</a>"."赞了"; 
 }
    $query="select * from tb_content where id_con=$row[id_con]";
    $result= mysqli_query($dbc, $query);
    while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $content=trim($row['content']);
 $str= substr($content,0,50);
 $str1= trim($str);
 $href="blogs.php?name=".$row['name']."&pid=".$row['id_con'];
  echo "<a href=$href>".$str1,"</a>";

    }

    echo"</p>";
}
?>
                    </section>
   <?php
   function f(){
       echo"<script>alert('a');</script>";
   }
   ?>
    </body>
</html>
