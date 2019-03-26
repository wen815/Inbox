<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
       <title>微型博客</title>
    <link href="css/index.css" rel="stylesheet">      
    </head>
    <body>
  <!--Logo-->
        <a href="index.php" id="alogo">微博</a>
         <!--广告语-->
         <a id="aad">记录你的生活</a> 
      <!--登录-->
         <section id="sform">
             <h2>登录</h2>    
             <span id="sperror" style="visibility: hidden;color:red;">用户名或密码错误，请重新输入</span>           
             <p> <input type="text" placeholder="请输入用户名" id="name"></p>
              <p><input type="password" placeholder="请输入密码" id="password"></p> 
              <p> <button onclick="checklog" id="logbtn" style="background-color: green;color:white;">登录</button></p>
             <h3>没有账号？请<a href="reg.php">注册</a></h3>
              <h3>忘记密码？请<a href="reset.php">重置</a></h3>
         </section>
                  <script src="js/xmlHttp.js"></script>      
         <script src="js/login.js"></script>         
    </body>
</html>
