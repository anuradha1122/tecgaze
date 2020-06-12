function header(val,url){
  if (window.XMLHttpRequest)
  { 
    xmlhttp=new XMLHttpRequest(); 
  }
  else 
  { 
     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
  }

  xmlhttp.onreadystatechange=function() { 
     if (xmlhttp.readyState==4 && xmlhttp.status==200)
     {
        document.getElementById("main").innerHTML=xmlhttp.responseText;
     }
  }
    var btn = val;
    var url = url;
  xmlhttp.open("GET",url+"?q="+btn,true);
  xmlhttp.send();
}

function customer_register_email_validation()
{
  if (window.XMLHttpRequest)
  {
    xmlhttp=new XMLHttpRequest(); 
  }
  else 
  {
     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
  }
  xmlhttp.onreadystatechange=function() { 
     if (xmlhttp.readyState==4 && xmlhttp.status==200)
     {
        document.getElementById("email_err").innerHTML=xmlhttp.responseText;
     }
  }
  var e = document.forms["customerregisterform"]["email"].value;
  xmlhttp.open("GET","emailerr.php?e="+e,true);
    xmlhttp.send();
}

function customer_register()
{
  if (window.XMLHttpRequest)
  { 
    xmlhttp=new XMLHttpRequest(); 
  }
  else 
  {
     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
  }
  xmlhttp.onreadystatechange=function() { 
     if (xmlhttp.readyState==4 && xmlhttp.status==200)
     {
        document.getElementById("register_msg").innerHTML=xmlhttp.responseText;
     }
  }
    var email= document.forms["customerregisterform"]["email"].value;
    var telephone= document.forms["customerregisterform"]["telephone"].value;
    var password= document.forms["customerregisterform"]["password"].value;
    var district= document.forms["customerregisterform"]["district"].value;

  xmlhttp.open("GET","customerregister.php?q="+district+ "&p="+email+ "&r="+telephone+ "&s="+password,true);
  xmlhttp.send();
}

function sell_catagory(){
  if (window.XMLHttpRequest)
  { 
    xmlhttp=new XMLHttpRequest(); 
  }
  else 
  { 
     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
  }

  xmlhttp.onreadystatechange=function() { 
     if (xmlhttp.readyState==4 && xmlhttp.status==200)
     {
        document.getElementById("sell_form").innerHTML=xmlhttp.responseText;
     }
  }
    var catagory = document.getElementById("catagory").value;
  xmlhttp.open("GET","js/sell_form.php?p="+catagory,true);
  xmlhttp.send();
}

function search_function() // call function without parameter
{
  if (window.XMLHttpRequest)
  {
    // code for IE7+, Firefox, Chrome, Opera, Safari 
    xmlhttp=new XMLHttpRequest(); 
  }
  else 
  {
     // code for IE6, IE5 
     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
  }

  xmlhttp.onreadystatechange=function() { 
     if (xmlhttp.readyState==4 && xmlhttp.status==200)
     {
        document.getElementById("search_results").innerHTML=xmlhttp.responseText;
     }
  }

  var search = document.forms["searchform"]["search"].value;
  



  xmlhttp.open("GET","js/searchitemjs.php?q="+search,true);
    xmlhttp.send();
}

function search_sell() // call function without parameter
{
  if (window.XMLHttpRequest)
  {
    // code for IE7+, Firefox, Chrome, Opera, Safari 
    xmlhttp=new XMLHttpRequest(); 
  }
  else 
  {
     // code for IE6, IE5 
     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
  }

  xmlhttp.onreadystatechange=function() { 
     if (xmlhttp.readyState==4 && xmlhttp.status==200)
     {
        document.getElementById("search_results").innerHTML=xmlhttp.responseText;
     }
  }

  var search = document.getElementById("search").value;;
  var catagory = document.getElementById("catagory").value;
  var district = document.getElementById("district").value;
  var district2 = document.getElementById("district2").value;
  var catagory2 = document.getElementById("catagory2").value;


  xmlhttp.open("GET","js/buysearchitemjs.php?q="+search+"&p="+catagory+"&s="+district+"&t="+district2+"&u="+catagory2,true);
    xmlhttp.send();
}

function sellform() // call function without parameter
{
  if (window.XMLHttpRequest)
  {
    // code for IE7+, Firefox, Chrome, Opera, Safari 
    xmlhttp=new XMLHttpRequest(); 
  }
  else 
  {
     // code for IE6, IE5 
     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
  }

  xmlhttp.onreadystatechange=function() { 
     if (xmlhttp.readyState==4 && xmlhttp.status==200)
     {
        document.getElementById("sell_results").innerHTML=xmlhttp.responseText;
     }
  }

  var catagory = document.getElementById("catagory").value;


  xmlhttp.open("GET","js/itemdata.php?q="+catagory,true);
    xmlhttp.send();
}

function session() // call function without parameter
{
  if (window.XMLHttpRequest)
  {
    // code for IE7+, Firefox, Chrome, Opera, Safari 
    xmlhttp=new XMLHttpRequest(); 
  }
  else 
  {
     // code for IE6, IE5 
     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
  }

  xmlhttp.onreadystatechange=function() { 
     if (xmlhttp.readyState==4 && xmlhttp.status==200)
     {
        search_sell();
     }
  }


  var search = 10;


  xmlhttp.open("GET","js/sessionjs.php?q="+search,true);
    xmlhttp.send();
}