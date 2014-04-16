<?
include_once("../../codelibrary/connection.php");
if($_SERVER['REQUEST_METHOD']=="POST")
{
	$TR_User_Name=$_POST['TR_UserName'];
	$TR_Password=$_POST['TR_Password'];
	$sqlChkLogin="select * from tbl_admin where user_name='".$TR_User_Name."' and user_password='".$TR_Password."'";
	$resultChkLogin=mysql_query($sqlChkLogin);
	$numChkLogin=mysql_num_rows($resultChkLogin);
	if($numChkLogin)
	{ 
		$rowChkLogin=mysql_fetch_array($resultChkLogin);
		$_SESSION['sess_admin_id']=$rowChkLogin['id'];
		$url="index.php";
		header("location:index.php");
		exit();
	}else{
		$_SESSION['MESSAGE']="Invalid username or password.";
		header("location: login.php");
		exit();
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administrator Control Panel</title>
<script language="javascript" src="js/smart-jscript.js"></script> 
<style type="text/css">
body {
	font-family: Tahoma, Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #606060;
	text-decoration: none;
	margin: 0px;
}
form{ margin: 0px; }
.heading {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 22px;
	color: #000;
	padding-right: 4px;
	padding-left: 4px;
}
.whitetext {
	font-family: verdana;
	font-size: 11px;
	line-height: 16px;
	color: #FFF;
	text-decoration: none;
}
.Login-Stripe {
	background-color: #565C72;
	width: 100%;
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: solid;
	border-right-style: none;
	border-bottom-style: solid;
	border-left-style: none;
	border-top-color: #111217;
	border-right-color: #111217;
	border-bottom-color: #111217;
	border-left-color: #111217;
	height: 275px;
	text-align: center;
}
.button-brown {
	font-family: Tahoma, Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
	color: #fff;
	text-decoration: none;
	background-color: #111216;
	border: 1px solid #75C0CD;
	cursor:pointer;
}
</style>
</head>
<body>
<br /><br /><br /><br /><br /><br /><br />
<div align="center"><strong class="heading">ADMINISTRATOR CONTROL PANEL</strong><br /><br /></div>
<div align="left"><a href="#" class="button-brown"></a></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="Login-Stripe" height="275">
  <tr>
    <td>
	 <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><div align="center"><strong><font  color="#FFFFFF"><? if($_SESSION['MESSAGE']){echo $_SESSION['MESSAGE']; $_SESSION['MESSAGE']="";}?><br /></font></strong></div>
		<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#111217">
        <tr>
		<td height="28" align="center"><strong class="whitetext">Administrator Login</strong></td>
        </tr>
        <tr>
		<td align="center">
		<form action="" method="post" name="loginfrm" onSubmit="return ValidateForm(this);">
		<table width="100%" border="0" cellpadding="2" cellspacing="0" bgcolor="#565C72">
        <td align="right"><strong class="whitetext">User Name:</strong></td>
        <td width="59%" height="27" align="left"><input name="TR_UserName" type="text" size="16" class="blacktext" /></td>
        </tr>
        <tr>
        <td align="right"><strong class="whitetext">Password:</strong></td>
        <td height="27" align="left"><input name="TR_Password" type="password" size="16" class="blacktext" /></td>
        </tr>
        <tr>
        <td align="left">&nbsp;</td>
        <td height="27" align="left"><input name="Submit" type="submit" class="button-brown" value="LOGIN" /></td>
        </tr>
        </table>
		</form>
		</td>
       </tr>
	  </table>
	 </td>
	</tr>
   </table>
  </td>
 </tr>
</table>
</body>
</html>
