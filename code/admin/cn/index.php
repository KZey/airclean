<?php
include_once("../../codelibrary/connection.php");
include_once("../../codelibrary/functions.php");
adminChklogin();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/global-admin.css" rel="stylesheet" type="text/css">
<? include("includes/head.php");?>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
 <tr>
  <td>
   <table width="100%" border="0" cellspacing="10" cellpadding="10" class="text">
    <tr>
	 <td width="25%" valign="top"><span class="Tahoma-14"><strong>Manage Content</strong></span>
	  <hr size="1" noshade="noshade"/>Using this section the site administrator will be able to manage the content pages displayed on the site.<br />
	   <ul>
	    <li><a href="manage_cms.php" class="gray-a">Manage CMS Pages</a></li>
		</ul>
		</td>
		<td width="25%" valign="top"><span class="Tahoma-14"><strong>Manage Slider</strong></span>
		<hr size="1" noshade="noshade"/>Using this section the site administrator will be able to manage Slider of the site.<br />
		<ul>
		<li><a href="manage_slider.php" class="gray-a">Manage Image Slider</a></li>
		</ul>
		</td>
		<td width="25%" valign="top"><span class="Tahoma-14"><strong>Manage Gallery</strong></span>
		<hr size="1" noshade="noshade"/>Using this section the site administrator will be able to manage Knowledge Center of the site.<br />
		<ul>
		<li><a href="manage_knowledge_center.php" class="gray-a">Manage Knowledge Center</a></li>
		</ul>
		</td>
		</tr>
   		<tr>
		<td width="25%" valign="top"><span class="Tahoma-14"><strong>Manage Products</strong></span>
		<hr size="1" noshade="noshade"/>Using this section the site administrator will be able to manage Products of the site.<br />
		<ul>
		<li><a href="manage_category.php" class="gray-a">Manage Categories</a></li>
		<li><a href="manage_products.php" class="gray-a">Manage Products</a></li>
		<li><a href="manage_other_products.php" class="gray-a">Manage Other Products</a>    </li>
		</ul>
		</td>
      <td valign="top">&nbsp;</td>
     <td valign="top">&nbsp;</td>
    </tr>
   </table>
  </td>
 </tr>
</table>
<? include("includes/footer.php");?>
</body>
</html>
