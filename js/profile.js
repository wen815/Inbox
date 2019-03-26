function $(id){
	return document.getElementById(id);
}
       var name=$('name').innerText;
 var sname=$('sname').value;
window.onload=function(){
   var x=document.getElementsByClassName('up'); 
   for(var i=0;i<x.length;i++){
       //不能给自己点赞
 if(name===sname){
    x[i].disabled=true;
}      
else{
      x[i].disabled=false; 
      //重复点赞则为取消
x[i].onclick=function(){
   var id_con=this.id;
  url="./up.php";
  url+="?id_con="+id_con+"&upr="+sname;
 xmlHttp.open("GET",url,true);
 xmlHttp.send();
  xmlHttp.onreadystatechange=function(){
   if(xmlHttp.readyState===4&&xmlHttp.status===200){
    var xmlDoc=xmlHttp.responseText;
    if(xmlDoc==='1'){
$(id_con).style.color='red';
    }
    else{
   $(id_con).style.color='';
    }    
  
}               
                }
};
}
   }
//突出显示已点赞的按钮
var y=document.getElementsByClassName('sp');
for(var i=0;i<y.length;i++){
var id=y[i].innerHTML;
if(sname!==name){
$(id).style.color='red';
}
}

};


        



