<?php
include("../codelibrary/connection.php");
include("../codelibrary/functions.php");
adminChklogin();
$cate_id=base64_decode($_GET['cate_id']);
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$TR_Category_Name=$_POST['TR_Category_Name'];
	$TR_Description=$_POST['TR_Description'];
	$file=$_FILES['TN_File']['name'];
	$type=basename($_FILES['TN_File']['type']);
	if($file<>'')
	{
		$rand=rand();
		$file=$rand.$file;
		$uploaddir="../uploads/";
		$dirimage=$uploaddir.$file;
		move_uploaded_file($_FILES['TN_File']['tmp_name'],$dirimage);
	}else{
		$file=$_POST['oldimage'];
	}	
	$TR_Status=$_POST['TR_Status'];
	if($_GET['mode']=='add')
	{
		$sqlmax = mysql_fetch_array(mysql_query("SELECT max(sort_id) as sort FROM tbl_category LIMIT 1"));
		$max = ($sqlmax['sort']+1);
		mysql_query("INSERT INTO tbl_category SET category_name='".$TR_Category_Name."',image='".$file."',description='".$TR_Description."',sort_id='".$max."',published='".$TR_Status."'");
		$_SESSION['sess_message']="Added Successfully..";
		header("location:manage_category.php");
		exit();
	}else{
		mysql_query("UPDATE tbl_category SET category_name='".$TR_Category_Name."',image='".$file."',description='".$TR_Description."',published='".$TR_Status."' where cate_id='".$cate_id."'");
		$_SESSION['sess_message']="Updated Successfully..";
		header("location:add_category.php?cate_id=".$_GET['cate_id']."&mode=edit");
		exit();
	}
}
if($_GET['mode']=='edit') { $cat_data=mysql_fetch_array(mysql_query("select * from tbl_category where cate_id='".$cate_id."'"));}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/global-admin.css" rel="stylesheet" type="text/css">
<? include("includes/head.php");?>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td align="left" valign="top"><a href="index.php" class="new_text">Home</a> >> <a href="manage_category.php" class="new_text">Manage Categories</a> >><span class="new_text"> Add Category</span></td>
  </tr>
   <tr>
     <td align="center" valign="top">
	  <table width="80%" border="0" cellspacing="0" cellpadding="5">
       <tr>
         <td align="left" class="TD-Heading">Add Category<div style="float:right;"><a href="manage_category.php" class="buttonbox">Back</a></div></td>
       </tr>
      <tr>
        <td class="bdr-3sides">
		<div align="center"><font color="#990000"><strong><? if($_SESSION['sess_message'] <> "") { echo $_SESSION['sess_message']; } $_SESSION['sess_message'] = ""; ?></strong></font></div>
		<form action="" method="post" enctype="multipart/form-data" onSubmit="return ValidateForm(this);">
		<table width="100%" border="0" cellspacing="0" cellpadding="4" align="center">
	   <tr valign="bottom">
		 <td width="100" align="left" class="botline">Category Name</td>
		 <td align="left" valign="top" class="botline"><input name="TR_Category_Name" type="text" size="50" value="<?=$cat_data['category_name'];?>" ></td>
	   </tr>
	   <tr valign="bottom">
		 <td width="100" align="left" class="botline" valign="middle">Description</td>
		 <td align="left" valign="top" class="botline">
		<?php
		include("../ckeditor/ckeditor.php");
		$CKeditor = new CKeditor();
		$CKeditor->BasePath = '../ckeditor/';
		$CKeditor->editor('TR_Description',$cat_data['description']);
		?>
		</td>
	    <tr valign="top">
		 <td width="123" align="left" class="botline">Image</td>
		 <td align="left" class="botline"><input type="file" name="TN_File" size="45">(Image size 980 x 290)</td>
	    </tr>
	   <tr valign="top">
		<td width="123" align="left" class="botline">&nbsp;</td>
		 <td align="left" class="botline"><? if($cat_data['image']){?><img src="../uploads/<?=$cat_data['image'];?>" width="800" height="250"><? }?></td>
	   </tr>
	    </tr>
	 	<tr valign="middle">
		 <td width="123" align="right" class="botline">Status</td>
		 <td align="left" class="botline">
		 <select name="TR_Status" style="width:250px;">
		 <option value="">Select Status</option>
		 <option value="1" <? if($cat_data['published']=='1'){?> selected <? }?>>Active</option>
		 <option value="0" <? if($cat_data['published']=='0'){?> selected <? }?>>Deactive</option>
		 </select></td>
	   </tr>   
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
</body>
</html>