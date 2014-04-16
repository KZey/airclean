<?php
include_once("../../codelibrary/connection.php");
include_once("../../codelibrary/functions.php");
include_once("../../codelibrary/imgresizer.php");
adminChklogin();
if($_SERVER['REQUEST_METHOD']=='POST')
{
$TR_Title=$_POST['TR_Title'];
$TR_content=$_POST['TR_content'];
$Url = $_POST['Url'];
$TR_Published=$_POST['TR_Published'];
mysql_query("insert into tbl_knowledge_center SET title='".$TR_Title."',url='".$Url."',content='".$TR_content."',published='".$TR_Published."', lang = 2");
$_SESSION['sess_message']="Record Added Successfully";
header("location:manage_knowledge_center.php");
exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/global-admin.css" rel="stylesheet" type="text/css">
<? include("includes/head.php");?>
<script type="text/javascript" src="js/jquery.min.js"></script>
<link href="calender/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="calender/jquery-ui.min.js"></script>
<script>
  $(document).ready(function() {
    $("#datepicker_csd").datepicker();
	$.datepicker.formatDate('yy-mm-dd', new Date(2010, 04 - 1, 26));
  });
</script>
<style>
.cke_contents{
height: 400px !important;
width: 550px !important;
}
</style>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="10">
 <tr>
  <td align="left" valign="top"><a href="index.php" class="new_text">Home</a> >><a href="manage_knowledge_center.php" class="new_text">Manage Knowledge Center</a> >><span class="new_text"> Add Knowledge Center Article</span></td>
   </tr>
    <tr>
     <td align="center" valign="top">
	  <table width="80%" border="0" cellspacing="0" cellpadding="5">
       <tr>
        <td align="left" class="TD-Heading">Add Knowledge Center Article<div style="float:right;"><a href="manage_knowledge_center.php" class="buttonbox">Back</a></div></td>
       	</tr>
      	<tr>
        <td class="bdr-3sides">		
		<form name="form_tab" method="post"  action="" enctype="multipart/form-data" onsubmit="return ValidateForm(this);">
		<table width="100%" border="0" cellpadding="4" cellspacing="0"  class="text">
		<tr>
		<td align="left" valign="top" class="botline">Title:</td>
		<td align="left" valign="top" class="botline"><input type="text" name="TR_Title" size="50"></td>
		</tr>
		<tr valign="top">
		<td align="left" valign="top" class="botline">Content:</td>
		<td align="left" valign="top" class="botline">
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
		$ckeditor->editor('TR_content',$cms_data['page_content']);
		?>
		</td>
		</tr>
		<tr>
		<td align="left" valign="top" class="botline">Url:</td>
		<td align="left" valign="top" class="botline"><input type="text" name="Url" size="50"></td>
		</tr>
		<tr>
		<td align="left" valign="top" class="botline">Published:</td>
		<td align="left" valign="top" class="botline">
		<select name="TR_Published">
		<option value=""> Select Status </option>
		<option value="1"> Active </option>
		<option value="0"> Deactive </option>
		</select></td>
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
