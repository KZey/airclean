<?php
include("../../codelibrary/connection.php");
include("../../codelibrary/functions.php");
adminChklogin();
$cms_id=base64_decode($_GET['cms_id']);
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$TR_Meta_title=$_POST['TR_Meta_title'];
	$TR_Meta_keyword=$_POST['TR_Meta_keyword'];
	$TR_Meta_description=$_POST['TR_Meta_description'];
	$TR_Page_content=$_POST['TR_Page_content'];
	$file=$_FILES['TN_File']['name'];
	$type=basename($_FILES['TN_File']['type']);
	if($file<>'')
	{
		$rand=rand();
		$file=$rand.$file;
		$uploaddir="../../uploads/";
		$dirimage=$uploaddir.$file;
		move_uploaded_file($_FILES['TN_File']['tmp_name'],$dirimage);
	}else{
		$file=$_POST['oldimage'];
	}

	mysql_query("update tbl_cms set page_content='".$TR_Page_content."',image='".$file."',meta_title='".$TR_Meta_title."',meta_keywords='".$TR_Meta_keyword."',meta_desc='".$TR_Meta_description."' where id='".$cms_id."'");
	$_SESSION['sess_message']="Updated Successfully..";
	header("location:edit_cms.php?cms_id=".base64_encode($cms_id));
	exit();
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link href="css/global-admin.css" rel="stylesheet" type="text/css">
<? include("includes/head.php");?>
<style>
.cke_contents{
height: 400px !important;
width: 550px !important;
}
</style>
</head>
<body topmargin="0" leftmargin="0" bottommargin="0" rightmargin="0">
<? $cms_data=mysql_fetch_array(mysql_query("select * from tbl_cms where id='".$cms_id."'"));?>
<table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td align="left" valign="top"><a href="index.php" class="new_text">Home</a> >><a href="manage_cms.php" class="new_text">Manage CMS</a> >> <span class="new_text">Edit <?=$cms_data['page_name'];?> Page</span></td>
  </tr>
   <tr>
     <td align="center" valign="top">	  
	 <table align="center" width="80%" border="0" cellspacing="0" cellpadding="5">
       <tr>
         <td align="left" class="TD-Heading">Edit CMS Pages Information <div style="float:right;"><a href="manage_cms.php" class="buttonbox">Back</a></div></td>
       </tr>
       <tr>
        <td width="95%" class="bdr-3sides"><div align="center"><font color="#00CC33" size="2"><strong><? if($_SESSION['sess_message'] <> "") { echo $_SESSION['sess_message'];  $_SESSION['sess_message'] = "";} ?></strong></font></div>
		<form action="" method="post" enctype="multipart/form-data" onSubmit="return ValidateForm(this);">
		<table width="100%" border="0" cellspacing="0" cellpadding="4" align="center">
		   <tr valign="bottom">
			 <td width="123" align="left" class="botline">Page Name</td>
			 <td  align="left" valign="top" class="botline"><input name="TR_Page_Name" type="text" size="45" value="<?=$cms_data['page_name'];?>" readonly="true"></td>
		   </tr>
		   <tr valign="top">
			 <td width="123" align="left" class="botline">Meta Title</td>
			 <td align="left" class="botline"><input type="text" name="TR_Meta_title" size="45" maxlength="64" value="<?=$cms_data['meta_title'];?>"></td>
		   </tr>
		   <tr valign="top">
			 <td width="123" align="left" class="botline">Meta Keywords</td>
			 <td align="left" class="botline"><textarea name="TR_Meta_keyword" cols="45" rows="3"><?=$cms_data['meta_keywords'];?></textarea></td>
		   </tr>
		   <tr valign="top">
			 <td width="123" align="left" class="botline">Meta Description</td>
			 <td align="left" class="botline"><textarea name="TR_Meta_description" cols="45" rows="3"><?=$cms_data['meta_desc'];?></textarea></td>
		   </tr>
		   <? if($cms_data['page_name']!="home"){?>
		   <? if($cms_data['id']!="7"){?>
		   <tr valign="top">
			<td width="123" align="left" class="botline">Page Content</td>
			<td align="left" class="botline">
			<?php
			// Make sure you are using a correct path here.
			include_once '../../ckeditor/ckeditor.php';
			$ckeditor = new CKEditor();
			$ckeditor->basePath = '../../ckeditor/';
			$ckeditor->config['filebrowserBrowseUrl'] = 'http://www.aircleanerpros.com/ckfinder/ckfinder.html';
			$ckeditor->config['filebrowserImageBrowseUrl'] = 'http://www.aircleanerpros.com/ckfinder/ckfinder.html?type=Images';
			$ckeditor->config['filebrowserFlashBrowseUrl'] = 'http://www.aircleanerpros.com/ckfinder/ckfinder.html?type=Flash';
			$ckeditor->config['filebrowserUploadUrl'] = 'http://www.aircleanerpros.com/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
			$ckeditor->config['filebrowserImageUploadUrl'] = 'http://www.aircleanerpros.com/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
			$ckeditor->config['filebrowserFlashUploadUrl'] = 'http://www.aircleanerpros.com/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
			//$ckeditor->editor('CKEditor1');
			$ckeditor->editor('TR_Page_content',$cms_data['page_content']);
			?>
			</td>
		   </tr>
			<? }?>
		   <tr valign="top">
			 <td width="123" align="left" class="botline">Image</td>
			 <td align="left" class="botline"><input type="file" name="TN_File" size="45" maxlength="64">(Image size 980 x 290)</td>
		   </tr>
		   <tr valign="top">
		    <td width="123" align="left" class="botline">&nbsp;</td>
			 <td align="left" class="botline"><? if($cms_data['image']){?><img src="../../uploads/<?=$cms_data['image'];?>" width="800" height="250"><? }?></td>
		   </tr>
		   <? }?>
		   <tr valign="middle">
			<td width="123" align="right" class="botline">&nbsp;</td>
			<td align="left" class="botline"><input type="submit" name="Submit" value="Submit"></td>
		  </tr>
		</table>
		<input type="hidden" name="oldimage" value="<?=$cms_data['image'];?>" />
	  </form>
	 </td>
	</tr>
   </table>
  </td>
 </tr>
</table>
<? include("includes/footer.php");?>
<br>
<br>
</body>
</html>
<script language="javascript" type="text/javascript">
function limitText(limitField, limitCount, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
}
</script>
