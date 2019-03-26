<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">                
        <title><?php session_start();echo $_SESSION['name']."的首页";?></title>
    <link href="css/home.css" rel="stylesheet">           
    </head>
    <body>
    <?php
    error_reporting(E_ALL ^ E_NOTICE);
           include 'includes/conn.php';
        include 'includes/header.html';
      ?>   
        <section id="time" style="display:none"><?php echo $time;?></section>  
           <section id="name" style="display:none"><?php echo $_SESSION['name'];?></section>  
        <section id="post">
            <textarea id="content"></textarea><br>
            <button id="subbtn" disabled="disabled">发布</button>
        </section>  
        <?php
        //如果并非本人首页
        if($_GET['name']!=$_SESSION['name']){
            $other="profile.php?name=".$_GET['name'];
            header("Location:$other");
        }
        ?>
    <!--JS-->     
      <script src="js/xmlHttp.js"></script>
   <script src="js/home.js"></script>    
    </body>
</html>
