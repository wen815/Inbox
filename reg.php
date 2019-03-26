
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>注册</title>
    </head>
    <body>
            <link href="css/reg.css" rel="stylesheet">
<body>
            <!--Logo-->
        <a href="index.php" id="alogo">微型博客</a>
  <!--表单-->      
        <section id="sform">
            <h2>注册</h2>      
       <section id="spara">       
                <p><a>用户名:&nbsp;</a><input type="text" id="name"><span id="spname"></span></p>           
    <p><a>电子邮箱:&nbsp;</a><input type="text" id="email"><span id="spemail"></span></p>   
    <p><a>密码:&nbsp;</a><input type="password" id="ps1"><span id="spps1"></span></p>   
        <p><a>确认密码:&nbsp;</a><input type="password" id="ps2"><span id="spps2"></span></p>         
        <p><a>密码提示问题:&nbsp;</a>
            <select id="question">
                <option value="idol">您的童年偶像是谁？</option>
      <option value="school">您就读小学的校名？</option>
      <option value="food">您喜欢什么食物？</option>
            </select>
        </p>
  <p><a>密码答案:&nbsp;</a><input type="text" id="answer"></p>          
          <p><a>验证码:&nbsp;</a><input type="text" id="code"><img src="" id="imgcode"><span id="change"><a href="javascript:void(0)">看不清楚?</a></span></p> 
        <input type="text" id="code1" style="visibility: hidden;">
       <button id="regbtn" disabled="disabled">注册</button>
     </section> 
        </section>     
   <!--JS-->     
      <script src="js/xmlHttp.js"></script>
   <script src="js/reg.js"></script>
        </body>
</html>
