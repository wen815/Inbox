function $(id){
	return document.getElementById(id);
}
window.onload=function(){
   var sname=$('s1').innerText;
url="./up_show.php?sname="+sname;
xmlHttp.open("GET",url,true);
xmlHttp.send();
xmlHttp.onreadystatechange=function(){
    if(xmlHttp.readyState===4&&xmlHttp.status===200){
 var xmlDoc=xmlHttp.responseXML;
 $('main').innerHTML=xmlDoc;
    }
}
};