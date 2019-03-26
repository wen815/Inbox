function $(id){
	return document.getElementById(id);
}
//注册键可用性
var cname,cemail,cps1,cps2,ccode;
function check(){
    if((cname==='yes')&&(cemail==='yes')&&(cps1==='yes')&&(cps2==='yes')){
    $('regbtn').disabled=false;     
    }
    else{
   $('regbtn').disabled=true;         
    }
    if((cname==='yes')&&(cemail==='yes')&&(cps1==='yes')&&(cps2==='yes')&&(ccode==='yes')){
          var name=$('name').value;
    var email=$('email').value;
     var ps1=$('ps1').value;
     var question=$('question').value;
       var answer=$('answer').value;
   var url='./register.php';
   url+='?name='+name+'&email='+email+'&password='+ps1+'&question='+question+'&answer='+answer;
xmlHttp.open('GET',url,true);
xmlHttp.send();
     xmlHttp.onreadystatechange=function(){ 
    if(xmlHttp.readyState===4&&xmlHttp.status===200){      
        var xmlDoc=xmlHttp.responseText;
        if(xmlDoc==='1'){
            alert("注册成功，请前往注册邮箱激活");
            location.reload();
        }
        else{
        alert("注册失败");       
        }
     }
     }
    }
}
//检测用户名
$('name').focus();
$('name').onkeyup=function(){
    var name=$('name').value;
    if(name.match(/^[a-zA-Z0-9_]*$/)===null){
     $('spname').innerHTML='<font color=red>只能包含字母、数字、下划线</font>';       
    }
  else if(name.length<4){
         $('spname').innerHTML='<font color=red>长度不能小于4位</font>'; 
           }
  else{//检测是否已存在
   var url='./chkname.php';
url+="?name="+name;
xmlHttp.open("GET",url,true);
xmlHttp.send();
 xmlHttp.onreadystatechange=function(){
       if(xmlHttp.readyState===4&&xmlHttp.status===200){
     var xmlDoc=xmlHttp.responseText;      
         if(xmlDoc==='1'){
    $('spname').innerHTML='<font color=red>用户名已被占用</font>';  
    }
    else{
      $('spname').innerHTML='<font color=green>用户名可以注册</font>';    
      cname='yes';
      check();
    }  
       }
 }
  }         
};
//检测电子邮件
	$('email').onkeyup = function(){
		emailreg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
                	if($('email').value.match(emailreg) === null){
			$('spemail').innerHTML = '<font color=red>错误的email格式</font>';
				}
                else{
      var url='./chkemail.php';
      var email=$('email').value;
url+="?email="+email;
xmlHttp.open("GET",url,true);
xmlHttp.send();
  xmlHttp.onreadystatechange=function(){
   if(xmlHttp.readyState===4&&xmlHttp.status===200){
    var xmlDoc=xmlHttp.responseText;
    if(xmlDoc==='1'){
    $('spemail').innerHTML='<font color=red>邮箱名已被注册</font>';  
    }
    else{
      $('spemail').innerHTML='<font color=green>邮箱名可以注册</font>';    
      cemail='yes';
      check();
    }    
  
}               
                }  
            }
                    };
     /*检验密码*/
  $('ps1').onkeyup=function(){
      var ps1=$('ps1').value;
      if(ps1.length<6){
  $('spps1').innerHTML='<font color=red>密码不能少于6位</font>';          
      }
else if(ps1.length >= 6 && ps1.length < 12){
			$('spps1').innerHTML = '<font color=green>密码强度：弱</font>';
			cps1 = 'yes';
		}else if((ps1.match(/^[0-9]*$/)!=null) || (ps1.match(/^[a-zA-Z]*$/) != null )){
			$('spps1').innerHTML = '<font color=green>密码强度：中</font>';
			cps1 = 'yes';
		}else{
			$('spps1').innerHTML = '<font color=green>密码强度：高</font>';
			cps1 = 'yes';
		}
		check();
  }
  /* 再次检测密码 */
$('ps2').onkeyup = function(){
   ps1=$('ps1').value;
    ps2=$('ps2').value;
    if(ps2!==ps1){
  $('spps2').innerHTML = '<font color=red>两次密码不符</font>';    
    }
   else{
  $('spps2').innerHTML = '<font color=green>两次密码相符</font>';       
    cps2='yes';
   }
   check();
}
/*生成验证码*/
window.onload =	code;	
	        $('change').onclick=code;
                function code(){
    var num=parseInt(Math.random()*9000+1000);
    	$('imgcode').src='code.php?num='+num;
        $('code1').value=num;
	}
     /*检验验证码*/  
     $('regbtn').onclick=function(){
         var code=$('code').value;
         if(code===$('code1').value){
            ccode='yes';
            check();
         }
     };                 