<?php
include_once("../../codelibrary/connection.php");
include_once("../../codelibrary/functions.php");
include_once("../../codelibrary/imgresizer.php");
adminChklogin();
if($_SERVER['REQUEST_METHOD']=='POST')
{
$TR_Category=$_POST['TR_Category'];
$TR_Product_Name=$_POST['TR_Product_Name'];
$TR_Model_No=$_POST['TR_Model_No'];
$TR_Regular_Price=$_POST['TR_Regular_Price'];
$Our_Price=$_POST['Our_Price'];
$TR_Availability=$_POST['TR_Availability'];
$TR_SQM=$_POST['TR_SQM'];
$TR_Dust_Sensor=$_POST['TR_Dust_Sensor'];
$TR_Remote=$_POST['TR_Remote'];
$TR_Speed_Options=$_POST['TR_Speed_Options'];
$TR_Air_Inlet=$_POST['TR_Air_Inlet'];
$TR_Air_Outlet=$_POST['TR_Air_Outlet'];
$TR_Wheels=$_POST['TR_Wheels'];
$TR_Timer=$_POST['TR_Timer'];
$Delivery_Rate=$_POST['Delivery_Rate'];
$TR_Description=$_POST['TR_Description'];
$At_glance=$_POST['At_glance'];
$Design=$_POST['Design']; //addslashes
$Technology=$_POST['Technology'];
$How_it_works=$_POST['How_it_works'];
$Lang = 2;
	$file=$_FILES['image']['name'];
	$type=basename($_FILES['image']['type']);
	if($file<>'')
	{
		$rand=rand();
		$file=$rand.$file;
		$uploaddir="../../uploads/";
		$dirimage=$uploaddir.$file;
		move_uploaded_file($_FILES['image']['tmp_name'],$dirimage);
	}else{
		$file=$_POST['oldimage'];
	}

$slider_text=$_POST['slider_text'];
$TR_Published=$_POST['TR_Published'];
mysql_query("update tbl_products SET cateid='".$TR_Category."',product_name='".$TR_Product_Name."',model_no='".$TR_Model_No."',regular_price='".$TR_Regular_Price."',our_price='".$Our_Price."',image='".$file."',slider_text='".$slider_text."',availability='".$TR_Availability."',sqm='".$TR_SQM."',dust_sensor='".$TR_Dust_Sensor."',remote='".$TR_Remote."',speed_options='".$TR_Speed_Options."',air_inlet='".$TR_Air_Inlet."',air_outlet='".$TR_Air_Outlet."',wheels='".$TR_Wheels."',timer='".$TR_Timer."',delivery_rate='".$Delivery_Rate."',at_a_glance='".$At_glance."',design='".$Design."',technology='".$Technology."',how_it_works='".$How_it_works."',description='".$TR_Description."',published='".$TR_Published."', lang = ".$Lang." where id='".$_GET['id']."'");
$_SESSION['sess_message']="Product Updated successfully.";
header("location:edit_products.php?id=".$_GET['id']);
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
<? $data=mysql_fetch_array(mysql_query("select * from tbl_products where id='".$_GET['id']."'"));?>
<table width="100%" border="0" cellspacing="0" cellpadding="10">
 <tr>
  <td align="left" valign="top"><a href="index.php" class="new_text">Home</a> >><a href="manage_products.php" class="new_text">Manage Products</a> >><span class="new_text"> Edit Products</span></td>
   </tr>
    <tr>
     <td align="center" valign="top">
	  <table width="80%" border="0" cellspacing="0" cellpadding="5">
       <tr>
        <td align="left" class="TD-Heading">Edit Products<div style="float:right;"><a href="manage_products.php" class="buttonbox">Back</a></div></td>
        </tr>
        <tr>
        <td class="bdr-3sides"><div align="center">
		<font color="#00CC33" size="2"><b><? if($_SESSION['sess_message'] <> "") { echo $_SESSION['sess_message'];  $_SESSION['sess_message'] = "";} ?></b></font></div>
		<form name="form_tab" method="post"  action="" enctype="multipart/form-data" onsubmit="return ValidateForm(this);">
		<table width="100%" border="0" cellpadding="4" cellspacing="0"  class="text">
		 <tr>
		 <td align="left" valign="top" class="botline">Category:</td>
		 <td align="left" valign="top" class="botline"><select name="TR_Category" class="inp">
		 <option value="">--Select Category--</option>
		 <?
		 $sqfetcat=mysql_query("select * from tbl_category");
		  $numcat=mysql_num_rows($sqfetcat);
		  if($numcat<>"")
		  {
		   while($resultcat=mysql_fetch_array($sqfetcat))
		   {
		   ?>
			<option value="<?=$resultcat['cate_id'];?>" <? if($resultcat['cate_id']==$data['cateid']) {?> selected <? }?>><?=$resultcat['category_name'];?></option>
		   <? 
		   }
		  }
		 ?>
		</select>
		</td>
		 </tr>
		 <tr>
		 <td align="left" valign="top" class="botline">Product Name:</td>
		 <td align="left" valign="top" class="botline"><input type="text" name="TR_Product_Name" size="50" value="<?=$data['product_name'];?>"></td>
		 </tr>
		 <tr>
		 <td align="left" valign="top" class="botline">Model No:</td>
		 <td align="left" valign="top" class="botline"><input type="text" name="TR_Model_No" size="25" value="<?=$data['model_no'];?>"></td>
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
		 <td align="left" valign="top" class="botline"><input type="file" name="image" size="25"><?php if($data['image']){?><br /><a href="../../uploads/<?=$data['image'];?>" target="_blank"><img src="../../uploads/<?=$data['image'];?>" width="80" height="100" border="0" /></a><? }?>
		 <input type="hidden" name="oldimage" value="<?=$data['image'];?>" /></td>
		 </tr>
		 <tr>
		 <td align="left" valign="top" class="botline">Slider Text:</td>
		 <td align="left" valign="top" class="botline"><input type="text" name="slider_text" size="50" value="<?=$data['slider_text'];?>"></td>
		 </tr>
		 <tr>
		 <td align="left" valign="top" class="botline">Availability:</td>
		 <td align="left" valign="top" class="botline"><select name="TR_Availability">
		 <option value=""> Select Availability </option>
		 <option value="1" <? if($data['availability']=='1') {?> selected <? }?>> In stock </option>
		 <option value="0" <? if($data['availability']=='0') {?> selected <? }?>> Out of Stock </option>
		 </select></td>
		 </tr>		 
		 <tr>
		 <td align="left" valign="top" class="botline">Room Size SQM:</td>
		 <td align="left" valign="top" class="botline"><input type="text" name="TR_SQM" size="25" value="<?=$data['sqm'];?>"></td>
		 </tr>		 
		 <tr>
		 <td align="left" valign="top" class="botline">Dust Sensor:</td>
		 <td align="left" valign="top" class="botline"><select name="TR_Dust_Sensor">
		 <option value=""> Select Dust Sensor </option>
		 <option value="1" <? if($data['dust_sensor']=='1') {?> selected <? }?>> Yes </option>
		 <option value="0" <? if($data['dust_sensor']=='0') {?> selected <? }?>> No </option>
		 </select></td>
		 </tr>		 
		 <tr>
		 <td align="left" valign="top" class="botline">Remote:</td>
		 <td align="left" valign="top" class="botline"><select name="TR_Remote">
		 <option value=""> Select Remote </option>
		 <option value="1" <? if($data['remote']=='1') {?> selected <? }?>> Yes </option>
		 <option value="0" <? if($data['remote']=='0') {?> selected <? }?>> No </option>
		 </select></td>
		 </tr>		 
		 <tr>
		 <td align="left" valign="top" class="botline">Speed Options:</td>
		 <td align="left" valign="top" class="botline"><input type="text" name="TR_Speed_Options" size="25" value="<?=$data['speed_options'];?>"></td>
		 </tr>		 
		 <tr>
		 <td align="left" valign="top" class="botline">Air Inlet:</td>
		 <td align="left" valign="top" class="botline"><input type="text" name="TR_Air_Inlet" size="25" value="<?=$data['air_inlet'];?>"></td>
		 </tr>		 
		 <tr>
		 <td align="left" valign="top" class="botline">Air Outlet:</td>
		 <td align="left" valign="top" class="botline"><input type="text" name="TR_Air_Outlet" size="25" value="<?=$data['air_outlet'];?>"></td>
		 </tr>		 
		 <tr>
		 <td align="left" valign="top" class="botline">Wheels:</td>
		 <td align="left" valign="top" class="botline"><select name="TR_Wheels">
		 <option value=""> Select Wheels </option>
		 <option value="1" <? if($data['wheels']=='1') {?> selected <? }?>> Yes </option>
		 <option value="0" <? if($data['wheels']=='0') {?> selected <? }?>> No </option>
		 </select></td>
		 </tr>		 
		 <tr>
		 <td align="left" valign="top" class="botline">Timer:</td>
		 <td align="left" valign="top" class="botline"><select name="TR_Timer">
		 <option value=""> Select Timer </option>
		 <option value="1" <? if($data['timer']=='1') {?> selected <? }?>> Yes </option>
		 <option value="0" <? if($data['timer']=='0') {?> selected <? }?>> No </option>
		 </select></td>
		 </tr>		 
		 <tr>
		 <td align="left" valign="top" class="botline">Clean air Delivery Rate:</td>
		 <td align="left" valign="top" class="botline"><input type="text" name="Delivery_Rate" size="25" value="<?=$data['delivery_rate'];?>"></td>
		 </tr>
		 <tr>
		 <td align="left" valign="top" class="botline">Description:</td>
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
		$ckeditor->editor('TR_Description',$data['description']);
		?>
		 </td>
		 </tr>
		 <tr>
		 <td align="left" valign="top" class="botline">At a glance:</td>
		 <td align="left" class="botline"><? $ckeditor->editor('At_glance',$data['at_a_glance']);?></td>
		 </tr>
		 <tr>
		 <td align="left" valign="top" class="botline">Design:</td>
		 <td align="left" class="botline"><? $ckeditor->editor('Design',$data['design']);?></td>
		 </tr>
		 <tr>
		 <td align="left" valign="top" class="botline">Technology:</td>
		 <td align="left" class="botline"><? $ckeditor->editor('Technology',$data['technology']);?></td>
		 </tr>
		 <tr>
		 <td align="left" valign="top" class="botline">How it works:</td>
		 <td align="left" class="botline"><? $ckeditor->editor('How_it_works',$data['how_it_works']);?></td>
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
