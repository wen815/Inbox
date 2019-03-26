<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $_GET['name']."的个人主页";?></title>
        <style>
   #main{width:60%;margin-left:20%;}    
   #main p{margin-top: 10px;}
   .up{width:150px;}
   .id_con{display: none;}
            </style>
    </head>
    <body>
                 <?php
            include 'includes/conn.php';
     include 'includes/header.html';    
        ?>
        <section id='main'>
             <?php  
  if($_GET['name']==$_SESSION['name'])//当前页是本人的主页
  {
      $q="select * from tb_content where name='$_SESSION[name]'";   
  }          
    else{//当前页不是本人的主页
      $q="select * from tb_content where name='$_GET[name]'";        
    }  

 $r= mysqli_query($dbc, $q);
 echo mysqli_error($dbc);
$num= mysqli_num_rows($r);
//if($num!=0){
   while ($row = mysqli_fetch_array($r,MYSQLI_ASSOC)) {    
 echo"<p>";
 $id=$row['id_con'];
 $href='blogs.php?name='.$_SESSION['name'].'&pid='.$id;
   echo"<input type='text'  class='id_con' value='$row[id_con]'>";
 echo "<a id='name'>".$row['name']."</a>"."<br>"."发布于&nbsp"
                  ."<a href=$href>".$row['time']."</a>"
         . "<br>";  
    echo $row['content']."<br>";
     echo "<button id='$row[id_con]' class='up'disabled='disabled'>赞</button>";  

              /*       //点赞颜色
    $q_2="select * from tb_up where id_con='$row[id_con]' and upr='$row[upr]'";
    $r_2= mysqli_query($dbc, $q_2);
    $num_2= mysqli_num_rows($r_2);

     if($num_2>0){
              echo "<button id='$row[id_con]' class='up' style='color:red'>赞</button>";  

      
    }*/
// "<button id='up' class='up' disabled='disabled'>赞</button>";

//"<button id='$row[id_con]' class='up'disabled='disabled' >赞</button>";
    echo"</p>";
  
} 
        ?>     
            <?php
$query="select * from tb_up where upr='$_SESSION[name]'";
$result= mysqli_query($dbc, $query);
while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
    echo "<span class=sp style='display:none'>".$row['id_con']."</span>";
}
            ?>
        </section>
        <!--获取会话名-->
        <input id="sname" style="display:none" value="<?php echo trim($_SESSION['name']);?>">
        <script src="js/xmlHttp.js"></script> 
   <script src="js/profile.js"></script>
   
    </body>
</html>
