function $(id){
	return document.getElementById(id);
}
//文本框为空时不能发布
$('content').onkeyup=function(){
  var content=$('content').value;
  if(content.length>0){
      $('subbtn').disabled=false;
  }
  else{
      $('subbtn').disabled=true;   
  }
};
//文本框值
 $('subbtn').onclick=function(){
       var content=$('content').value;
   var time=$('time').innerHTML;
    var name=$('name').innerHTML;
   url="./submit.php";
   url+="?name="+name+"&content="+content+"&time="+time;
    xmlHttp.open("GET",url,true);
   xmlHttp.send();
 xmlHttp.onreadystatechange=function(){
   if(xmlHttp.readyState===4&&xmlHttp.status===200){
    var xmlDoc=xmlHttp.responseText;
    if(xmlDoc==='1'){
alert("发布成功");  
location.reload();
    }
    else{
 alert("发布失败");     
    }    
  
}               
                }
 };

