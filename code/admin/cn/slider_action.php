<?php
include_once("../../codelibrary/connection.php");
include_once("../../codelibrary/functions.php");
include("../../codelibrary/imgresizer.php");  
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$TR_Page_Name=$_POST['TR_Page_Name'];
	$TR_Alt=$_POST['TR_Title'];
	$TR_Published=$_POST['TR_Published'];
	$mode=$_POST['mode'];
	if($mode=='add')
	{
		$file=$_FILES['TR_File']['name'];
		$type=basename($_FILES['TR_File']['type']);
		if($file<>'')
		{
			$rand=rand();
			$file=$rand.$file;
			$uploaddir="../../slider/";
			$dirimage=$uploaddir.$file;
			move_uploaded_file($_FILES['TR_File']['tmp_name'],$dirimage);
		}
		mysql_query("INSERT INTO tbl_slider SET alt='".$TR_Alt."',image='".$file."',published='".$TR_Published."', lang = 2");
		$_SESSION['gallery']="Record Added Successfully..";
		header("location:manage_slider.php");
		exit();
	}else{
		$file=$_FILES['TN_File']['name'];
		$type=basename($_FILES['TN_File']['type']);
		if($file<>'')
		{
			$rand=rand();
			$file=$rand.$file;
			$uploaddir="../../slider/";
			$dirimage=$uploaddir.$file;
			move_uploaded_file($_FILES['TN_File']['tmp_name'],$dirimage);
		}else{
			$file=$_POST['oldimage'];
		}	
		$galleryid=$_POST['id'];
		mysql_query("UPDATE tbl_slider SET alt='".$TR_Alt."',image='".$file."',published='".$TR_Published."' where id='".$galleryid."'");
		$_SESSION['gallery']="Gallery Updated Successfully..";
		header("location:add_slider_image.php?mode=edit&id=".$galleryid);
		exit();
	}
}
?>
