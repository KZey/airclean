<?php
include_once("../codelibrary/connection.php");
include_once("../codelibrary/functions.php");
include_once("../codelibrary/imgresizer.php");
adminChklogin();
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$TR_Product_Name=$_POST['TR_Product_Name'];
	$TR_Regular_Price=$_POST['TR_Regular_Price'];
	$Our_Price=$_POST['Our_Price'];
	$TR_Description=$_POST['TR_Description'];
	$file=$_FILES['image']['name'];
	$type=basename($_FILES['image']['type']);
	if($file<>''){
		$rand=rand();
		$file=$rand.$file;
		$uploaddir="../uploads/";
		$dirimage=$uploaddir.$file;
		move_uploaded_file($_FILES['image']['tmp_name'],$dirimage);
	}else{
		$file=$_POST['oldimage'];
	}
	$TR_Published=$_POST['TR_Published'];
	mysql_query("update tbl_other_products SET product_name='".$TR_Product_Name."',regular_price='".$TR_Regular_Price."',our_price='".$Our_Price."',image='".$file."',description='".$TR_Description."',published='".$TR_Published."' where id='".$_GET['id']."'");
	$_SESSION['sess_message']="Product Updated successfully.";
	header("location:edit_other_products.php?id=".$_GET['id']);
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/global-admin.css" rel="stylesheet" type="text/css">
<? include("includes/head.php");?>
</head>
<body>
<? $data=mysql_fetch_array(mysql_query("select * from tbl_other_products where id='".$_GET['id']."'"));?>
<table width="100%" border="0" cellspacing="0" cellpadding="10">
 <tr>
  <td align="left" valign="top"><a href="index.php" class="new_text">Home</a> >><a href="manage_other_products.php" class="new_text">Manage Other Products</a> >><span class="new_text"> Edit Other Products</span></td>
   </tr>
    <tr>
     <td align="center" valign="top">
	  <table width="80%" border="0" cellspacing="0" cellpadding="5">
       <tr>
        <td align="left" class="TD-Heading">Edit Other Products<div style="float:right;"><a href="manage_other_products.php" class="buttonbox">Back</a></div></td>
        </tr>
        <tr>
        <td class="bdr-3sides"><div align="center">
		<font color="#00CC33" size="2"><b><? if($_SESSION['sess_message'] <> "") { echo $_SESSION['sess_message'];  $_SESSION['sess_message'] = "";} ?></b></font></div>
		<form name="form_tab" method="post"  action="" enctype="multipart/form-data" onsubmit="return ValidateForm(this);">
		<table width="100%" border="0" cellpadding="4" cellspacing="0"  class="text">
		 <tr>
		 <td align="left" valign="top" class="botline">Product Name:</td>
		 <td align="left" valign="top" class="botline"><input type="text" name="TR_Product_Name" size="50" value="<?=$data['product_name'];?>"></td>
		 </tr>
		 <tr>
		 <td align="left" valign="top" class="botline">Regular Price:</td>
		 <td align="left" valign="top" class="botline"><input type="text" name="TR_Regular_Price" size="25" value="<?=$data['regular_price'];?>"></td>
		 </tr>		 
		 <tr>
		 <td align="left" valign="top" class="botline">Our Price:</td>
		 <td align="left" valign="top" class="botline"><input type="text" name="Our_Price" size="25" value="<?=$data['our_price'];?>"></td>
		 </tr>
		 <tr>
		 <td align="left" valign="top" class="botline">Image:</td>
		 <td align="left" valign="top" class="botline"><input type="file" name="image" size="25"><?php if($data['image']){?><br /><a href="../uploads/<?=$data['image'];?>" target="_blank"><img src="../uploads/<?=$data['image'];?>" width="80" height="100" border="0" /></a><? }?>
		 <input type="hidden" name="oldimage" value="<?=$data['image'];?>" /></td>
		 </tr>
		 <tr>
		 <td align="left" valign="top" class="botline">Description:</td>
		 <td align="left" class="botline">
		<?php
		// Make sure you are using a correct path here.
		include_once '../ckeditor/ckeditor.php';
		$ckeditor = new CKEditor();
		$ckeditor->basePath = '../ckeditor/';
		$ckeditor->config['filebrowserBrowseUrl'] = 'http://www.aircleanerpros.com/ckfinder/ckfinder.html';
		$ckeditor->config['filebrowserImageBrowseUrl'] = 'http://www.aircleanerpros.com/ckfinder/ckfinder.html?type=Images';
		$ckeditor->config['filebrowserFlashBrowseUrl'] = 'http://www.aircleanerpros.com/ckfinder/ckfinder.html?type=Flash';
		$ckeditor->config['filebrowserUploadUrl'] = 'http://www.aircleanerpros.com/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
		$ckeditor->config['filebrowserImageUploadUrl'] = 'http://www.aircleanerpros.com/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
		$ckeditor->config['filebrowserFlashUploadUrl'] = 'http://www.aircleanerpros.com/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
		$ckeditor->editor('TR_Description',$data['description']);
		?>
		 </td>
		 </tr>
		 <tr>
		 <td align="left" valign="top" class="botline">Published:</td>
		 <td align="left" valign="top" class="botline">
		 <select name="TR_Published">
		 <option value=""> Select Status </option>
		 <option value="1" <? if($data['published']=='1') {?> selected <? }?>> Active </option>
		 <option value="0" <? if($data['published']=='0') {?> selected <? }?>> Deactive </option>
		 </select>
		 </td>
		 </tr>
		 <tr><td align="left">&nbsp;</td>
		 <td align="left" valign="top" rowspan="2"><input type="submit" name="submit" value="submit" /></td>
		</tr>
	   </table>
	  </form>
	 </td>
    </tr>
   </table>
  </td>
 </tr>
</table>
<? include("includes/footer.php");?>
</body>
</html>
