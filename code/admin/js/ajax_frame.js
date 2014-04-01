function ajaxHelper(functionName, additionalArgs) {
  var xmlHttp;
  //alert(functionName+"<br/>"+additionalArgs)
  // Firefox, Opera 8.0+, Safari, SeaMonkey
  try {
    xmlHttp=new XMLHttpRequest();
  }
  catch (e) {
    // Internet Explorer
    try {
      xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch (e) {
      try {
        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch (e) {
        alert("Sorry, your browser does not support AJAX.");
        return false;
      }
    }
  }
  xmlHttp.onreadystatechange=function() {
    //The request is complete == state 4
    if (xmlHttp.readyState==4) {
      var response=xmlHttp.responseText;
      //Send reponse to _ajax hook of passed function name
	//alert(functionName + "_ajax(" +  response + ")");
      eval(functionName + "_ajax('" +  response + "')");
    }
  }

  //Get request string from _setup hook of passed function name
  if (additionalArgs !== undefined && additionalArgs.length > 0) {
    var requestString = eval(functionName+"_init" + '(' + additionalArgs + ')');
  }
  else {
    var requestString = eval(functionName+"_init" + '()');
  } 
 
  if (requestString) {
    xmlHttp.open("GET", requestString, true);
    xmlHttp.send(null);
  }
}

function bookingprice_init(obj)
{
var script = 'booking_price.php';
var data = "?bookingid=" + obj;
var queryString = data;
//alert(queryString);
return script + queryString;
}
function bookingprice_ajax(results)
{
	//alert(results);
	document.getElementById('show_booking_price').innerHTML=results;
	document.getElementById('light4').style.display='block'
	document.getElementById('fade4').style.display='block'

}
function paymenttype_init(obj)
{
var script = 'paymenttype.php';
var data = "?paymentid=" + obj;
var queryString = data;
//alert(queryString);
return script + queryString;
}
function paymenttype_ajax(results)
{
	//alert(results);
	document.getElementById('show_payment_type').innerHTML=results;
	document.getElementById('light2').style.display='block'
	document.getElementById('fade2').style.display='block'
}

function subcategory_init()
{
var obj=document.getElementById('TR_Direction').value;	
var script = 'subcats.php';
var data = "?parentid=" + obj;
var queryString = data;
//alert(queryString);
return script + queryString;
}
function subcategory_ajax(results)
{
	//alert(results);
	document.getElementById('show_subcategory').innerHTML=results;

}

function date_init(obj)
{
var script = 'date.php';
var data = "?busid=" + obj;
var queryString = data;
//alert(queryString);
return script + queryString;
}
function date_ajax(results)
{
	//alert(results);
	document.getElementById('show_date').innerHTML=results;
}

function getdirection_init()
{
var objid=document.getElementById('TR_Trip_Date').value;	
var dt = objid.split('||');
var script = 'matchdate.php';
var data = "?parentid=" + dt[0]+"&time="+dt[1];
var queryString = data;
return script + queryString;
}

function getdirection_ajax(results)
{
	var res=results.split('||');
	document.getElementById('location').innerHTML=res[0];
	document.getElementById('time').innerHTML=res[1];
}
function bus_init()
{
var obj=document.getElementById('TR_BUS').value;
//alert(obj);
var script = 'bus_data.php';
var data = "?busrowid=" + obj;
var queryString = data;
//alert(queryString);
return script + queryString;
}
function bus_ajax(results)
{
	var res=results.split('||');
	document.getElementById('date1').innerHTML=res[0];
	document.getElementById('location1').innerHTML=res[1];
	document.getElementById('pax1').innerHTML=res[2];
}

function location_init()
{
document.getElementById('checkplace').style.display='none';	
document.getElementById('loading_img').style.display='';	
var dir=document.getElementById('TR_Travel_Time').value;
//alert(obj);
var script = 'direction.php';
var data = "?parentid=" + dir;
var queryString = data;
//alert(queryString);
return script + queryString;
}
function location_ajax(results)
{
document.getElementById('checkplace').style.display='';	
document.getElementById('loading_img').style.display='none';	
document.getElementById('checkplace').innerHTML=results;
}
function template_init()
{
document.getElementById('total_seats').style.display='none';	
document.getElementById('loading_img1').style.display='';
var busid=document.getElementById('busid').value;
var temp=document.getElementById('TR_Template').value;
var script = 'template.php';
var data = "?temp_id=" + temp+"&busid="+busid;
var queryString = data;
//alert(queryString);
return script + queryString;
}
function template_ajax(results)
{
document.getElementById('total_seats').style.display='';	
document.getElementById('loading_img1').style.display='none';
document.getElementById('total_seats').innerHTML=results;
}

function packagesearch_init()
{
var script = 'search_packages.php';
var data = "?search=" + document.getElementById("search").value;
var queryString = data;
//alert(queryString);
return script + queryString;
}
function packagesearch_ajax(results)
{
	//alert(results);
	document.getElementById('Show_result').innerHTML=results;
	document.getElementById('submitid').style.display="";
}
