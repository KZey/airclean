<?php
include_once("../codelibrary/connection.php");
include_once("../codelibrary/functions.php");
include("../codelibrary/imgresizer.php");  
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$TR_Alt = $_POST['TR_Title'];
	$TR_Published = $_POST['TR_Published'];
	$mode = $_POST['mode'];
	if($mode=='add')
	{
		$file=$_FILES['TR_File']['name'];
		$type=basename($_FILES['TR_File']['type']);
		if($file<>'')
		{
			$rand=rand();
			$file=$rand.$file;
			$uploaddir="../gallery/";
			$dirimage=$uploaddir.$file;
			move_uploaded_file($_FILES['TR_File']['tmp_name'],$dirimage);
			@resampimagejpg(190, 120, '../gallery/'.$file, '../gallery/t_'.$file);
			@resampimagejpg(350, 350, '../gallery/'.$file, '../gallery/m_'.$file);
		}
		mysql_query("INSERT INTO tbl_gallery SET alt='".$TR_Alt."',image='".$file."',published='".$TR_Published."'");
		$_SESSION['gallery_msg']="Gallery Added Successfully..";
		header("location:manage_gallery.php");
		exit();
	}else{
		$file=$_FILES['TN_File']['name'];
		$type=basename($_FILES['TN_File']['type']);
		if($file<>'')
		{
			$rand=rand();
			$file=$rand.$file;
			$uploaddir="../gallery/";
			$dirimage=$uploaddir.$file;
			move_uploaded_file($_FILES['TN_File']['tmp_name'],$dirimage);
			@resampimagejpg(95, 115, '../gallery/'.$file, '../gallery/t_'.$file);
			@resampimagejpg(100, 100, '../gallery/'.$file, '../gallery/s_'.$file);
			@resampimagejpg(350, 350, '../gallery/'.$file, '../gallery/m_'.$file);
		}else{
			$file=$_POST['oldimage'];
		}	
		$galleryid=$_POST['id'];
		mysql_query("UPDATE tbl_gallery SET alt='".$TR_Alt."',image='".$file."',published='".$TR_Published."' where id='".$galleryid."'");
		$_SESSION['gallery_msg']="Gallery Updated Successfully..";
		header("location:add_gallery.php?mode=edit&id=".$galleryid."");
		exit();
	}
}
?>