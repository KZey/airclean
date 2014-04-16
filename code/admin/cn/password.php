<?php
include_once("../../codelibrary/connection.php");
include_once("../../codelibrary/functions.php");
include_once("../../codelibrary/pager.php");
adminChklogin();
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$old_password     = $_POST['pass'];
	$new_password     = $_POST['new_pass'];
	$confirm_password = $_POST['con_pass'];
	$sql = "select * from tbl_admin where user_password = '".$old_password."'";
	$row = mysql_query($sql);
	$num_row=@mysql_num_rows($row);
	if($num_row){
		$update = "update tbl_admin set user_password = '".$new_password."'";
		mysql_query($update);
		$_SESSION['register']="Password Changed successfully.";
		header("location:password.php");
		exit();
	}else{
		$_SESSION['register']="Old password is not correct";
		header("location:password.php");
		exit();
	}
}
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/global-admin.css" rel="stylesheet" type="text/css">
</head>
<? include_once("includes/head.php");
?>
<body>
<form name="change_password" method="post" action="" onsubmit="return validate();">
<table width="100%" border="0" cellspacing="0" cellpadding="10">
 <tr>
  <td align="left" valign="top"><a href="index.php" class="gray-a"><u>Home</u></a> &raquo; <strong>Change Password</strong></td>
   </tr>
    <tr>
     <td align="center" valign="top">
	  <table width="80%" border="0" cellspacing="0" cellpadding="5" class="text">
       <tr>
        <td align="left" class="TD-Heading">Change Password </td>
      	</tr>
		<tr>
		<td class="bdr-3sides">
		<div align="center"><font color="#00CC33" size="2"><b><? if($_SESSION['register'] <> "") { echo $_SESSION['register']; $_SESSION['register'] = ""; }?></b></font></div>
		<table width="100%" border="0" cellspacing="0" cellpadding="5" class="text">
		 <tr>
		  <td align="center"><b>Old Password</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="password" name="pass" id="pass" value=""></td>
		</tr>
		<tr>
		  <td align="center"><b>New Password</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="password" name="new_pass" id="new_pass" value=""></td>
		</tr>
		<tr>
		  <td align="center"><b>Confirm Password</b>&nbsp;&nbsp;&nbsp;&nbsp; <input type="password" name="con_pass" id="con_pass" value=""></td>
		</tr>
		<tr>
		  <td></td>
		</tr>
		<tr>
		  <td align="center"><input type="submit" name="submit" value="Submit"></td>
		</tr>
	 </table>
	 </td>
    </tr>	
   </table>
  </td>
 </tr>
</table>
</form>
<? include_once("includes/footer.php");?>
</body>
</html>
<script type="text/javascript">
function validate()
{
var oldpass=document.getElementById('pass').value;
var newpass=document.getElementById('new_pass').value;
var confirmnew=document.getElementById('con_pass').value;
 if(oldpass=="")
   {
     alert('Old password is empty');
	 document.getElementById('pass').focus();
	 return false; 
   }
   if(newpass =="")
   {
     alert('New password is empty');
	 document.getElementById('new_pass').focus();
	 return false; 
   }
   
     if(confirmnew =="")
   {
     alert('Confirm password is empty');
	 document.getElementById('con_pass').focus();
	 return false; 
   }
    if(newpass != confirmnew)
   {
     alert('Password not match');
	 document.getElementById('con_pass').focus();
	 return false; 
   }

}
</script>
