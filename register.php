<?php
error_reporting(0);
	include 'includes/conn.php';
require_once 'Zend/Mail.php';						//调用发送邮件的文件
	require_once 'Zend/Mail/Transport/Smtp.php';		//调用SMTP验证文件
            $name=trim($_GET['name']);
$email=$_GET['email'];
   $password=MD5(trim($_GET['password']));
   $question=$_GET['question'];
   $answer=$_GET['answer'];
   //发送激活邮件
   $url = 'http://'.$_SERVER['SERVER_NAME'].''.dirname($_SERVER['SCRIPT_NAME']).'/activation.php';
$url .= '?name='.$name.'&password='.$password;
	
	//发送激活邮件
	$subject="激活码的获取";
	$mailbody='注册成功。您的激活码是：'.'<a href="'.$url.'" target="_blank">'.$url.'</a><br>'.'请点击该地址，激活您的用户！';
//定义邮件内容
	$envelope="heidere@sina.com";		//定义登录使用的邮箱

	$config = array('auth' => 'login',
            'username' => 'heidere@sina.com',
            'password' => 'adg19880');				//定义SMTP的验证参数
	$transport = new Zend_Mail_Transport_Smtp('smtp.sina.com', $config);		//实例化验证的对象
	$mail = new Zend_Mail('UTF8');			//实例化发送邮件对象
    $mail->setBodyHtml($mailbody);				//发送邮件主体
    $mail->setFrom($envelope, '明日科技典型模块程序测试邮箱，恭喜您用户注册成功！');	//定义邮件发送使用的邮箱
    $mail->addTo($email, '获取用户注册激活码');		//定义邮件的接收邮箱
    $mail->setSubject('获取注册用户的激活码');				//定义邮件主题
    $mail->send($transport);
   //插入记录
$q_1="select * from tb_user where name='$name'";
$r_1= mysqli_query($dbc, $q_1);
$num_1=mysqli_num_rows($r_1);
if($num_1==0){
  $sql = "insert into tb_user(name,email,password,question,answer)values('$name','$email','$password','$question','$answer')";
$r= mysqli_query($dbc, $sql);      
if(mysqli_affected_rows($dbc)==1){
    echo "1";
}
else{
 echo "0";
}
}
else{
 echo "0";
}

