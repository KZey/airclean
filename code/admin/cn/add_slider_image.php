<?php
ob_start();
include_once("../../codelibrary/connection.php");
include_once("../../codelibrary/functions.php");
adminChklogin();
$gallerydata=@mysql_fetch_array(mysql_query("select * from tbl_slider where id='".$_GET['id']."'"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/global-admin.css" rel="stylesheet" type="text/css">
<? include("includes/head.php");?>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="10">
 <tr>
  <td align="left" valign="top"><a href="index.php" class="new_text">Home</a> >><a href="manage_slider.php" class="new_text">Manage Slider</a> >><span class="new_text"> Add Slider</span></td>
   </tr>
    <tr>
     <td align="center" valign="top">
	  <table width="80%" border="0" cellspacing="0" cellpadding="5">
       <tr>
        <td align="left" class="TD-Heading"><? if($_GET['mode']=='add') echo "Add";else echo "Edit";?> Slider Image <div style="float:right;"><a href="manage_slider.php" class="buttonbox">Back</a></div></td>
       	</tr>
 		<tr> 
        <td class="bdr-3sides"><div align="center"><font color="#990000"><strong><? if($_SESSION['gallery'] <> "") { echo $_SESSION['gallery']; } $_SESSION['gallery'] = ""; ?></strong></font></div>
		<form name="form_tab" method="post" enctype="multipart/form-data" action="slider_action.php" onsubmit="return ValidateForm(this) && validate();">
		<table width="100%" border="0" cellpadding="4" cellspacing="0" class="text">
		<td width="20%" align="left" valign="top" class="botline">Image:</td>
<td width="80%" align="left" valign="top" class="botline"><input type="file" name="<? if($_GET['mode']=='add') echo "TR_File";else echo "TN_File";?>" id="in_file" size="35" /> (Image size 980 x 290) <?php if($gallerydata['image']){?><br /><a href="../gallery/<?=$gallerydata['image'];?>" target="_blank"><img src="../../slider/<?=$gallerydata['image'];?>" width="800" height="200" border="0" /></a><? }?></td>
		 </tr>
		<!-- <tr>
		 <td width="20%" align="left" valign="top" class="botline">Title:</td>
		 <td width="80%" align="left" valign="top" class="botline">
		  <? /*include_once("../fckeditor/fckeditor.php");
		 $sBasePath = $_SERVER['PHP_SELF'];
		 $sBasePath= "../fckeditor/";
		 $oFCKeditor->BasePath = '../fckeditor/';
		 $oFCKeditor = new FCKeditor('TR_Title');
		 $oFCKeditor->BasePath = $sBasePath ;
		 $oFCKeditor->ToolbarSet = 'mynew';
		 $oFCKeditor->Height	= 450;
		 $oFCKeditor->Width = 800;
		 $oFCKeditor->Value = str_replace("'", "'", str_replace(chr(13).chr(10), "", str_replace("'", "'", str_replace(chr(13).chr(10), "",$gallerydata['alt']))));
		 $oFCKeditor->Create();*/ ?>
		 </td>
		 </tr> --><div style="display:none"><testarea name="TR_Title"><?=$gallerydata['alt']?></testarea></div>
		 <tr>
		 <td width="20%" align="left" valign="top" class="botline">Published:</td>
		 <td width="80%" align="left" valign="top" class="botline">
		 <select name="TR_Published" style="width:200px;">
		 <option value="">Select Status</option>
		 <option value="1" <? if($gallerydata['published']=='1'){?> selected="selected" <? }?>>Yes</option>
		 <option value="0" <? if($gallerydata['published']=='0'){?> selected="selected" <? }?>>No</option>
		 </select></td>
		 </tr>
		 
		 <tr>
		 <td align="left">&nbsp;</td>
		 <td align="left" valign="top" rowspan="2">
		 <input type="hidden" name="oldimage" value="<?=$gallerydata['image'];?>" />
		 <input type="hidden" name="mode" id="mode" value="<? if(isset($_GET['mode'])){echo $_GET['mode'];}?>" />
		 <input type="hidden" name="id" value="<? if(isset($_GET['id'])){echo $_GET['id'];}?>" />
		 <input type="submit" name="submit" value="submit" /></td>
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
<script>
function validate()
{
// File Type Validation
var imagePath=document.getElementById('in_file').value;

if(imagePath!='')
{
var pathLength = imagePath.length;
var lastDot = imagePath.lastIndexOf(".");
var fileType = imagePath.substring(lastDot,pathLength);

if((fileType == ".gif") || (fileType == ".jpg") || (fileType == ".jpeg") || (fileType == ".png") || (fileType == ".GIF") || (fileType == ".JPG") || (fileType == ".PNG") || (fileType == ".JPEG")) {
return true;
}else{
alert("We supports .JPG, .PNG, and .GIF image formats.");
document.getElementById('in_file').focus();
return false;
}
}
return true;
}
</script>
