<?php
include_once("../codelibrary/connection.php");
include_once("../codelibrary/functions.php");
include_once("../codelibrary/pager.php");
adminChklogin();
if(isset($_GET['mode']) && $_GET['mode']=='del')
{
	mysql_query("delete from tbl_products where id='".$_GET['id']."'");
	$_SESSION['sess_message']="Product Deleted Successfully";
	header("location:manage_products.php");
	exit();
}
if(isset($_GET['mode']) && $_GET['mode']=='change_status')
{
	if($_GET['status']==1)
	{
	$status=0;
	}else{
	$status=1;
	}
	mysql_query("UPDATE tbl_products SET published='".$status."' where id='".$_GET['id']."'");
	$_SESSION['sess_message']="Updated Successfully.";
	header("location:manage_products.php");
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
<table width="100%" border="0" cellspacing="0" cellpadding="10">
 <tr>
  <td align="left" valign="top"><a href="index.php" class="new_text">Home</a> >><span class="new_text"> Manage Products</span></td>
   </tr>
	<tr>
	 <td align="center" valign="top">
	  <table width="80%" border="0" cellspacing="0" cellpadding="5">
	   <tr>
		<td align="left" class="TD-Heading">Manage Products <div style="float:right;"><a href="add_products.php" class="buttonbox">Add Product</a></div></td>
		 </tr>
		 <tr>
          <td class="bdr-3sides"><div align="center"><font color="#00CC33" size="2"><b>
		  <? if(isset($_SESSION['sess_message']) && $_SESSION['sess_message']) { echo $_SESSION['sess_message']; $_SESSION['sess_message'] = "";}?></b></font></div>
		  <table width="100%" border="0" cellpadding="4" cellspacing="1" class="text">
		  <tr>
		  <td width="25" align="left" bgcolor="#EEEEEE"><strong>#</strong></td>
		  <td width="150" align="left" bgcolor="#EEEEEE"><strong>Category</strong></td>
		  <td width="250" align="left" bgcolor="#EEEEEE"><strong>Product Name</strong></td>			  
		  <td width="150" align="left" bgcolor="#EEEEEE"><strong>Regular Price</strong></td>
		  <td width="150" align="left" bgcolor="#EEEEEE"><strong>Our Price</strong></td>
		  <td width="80" align="left" bgcolor="#EEEEEE"><strong>Status</strong></td>
		  <td width="240" align="left" bgcolor="#EEEEEE"><strong>Action</strong></td>
			</tr>
			<?
			$limit=25;
			$p = new Pager; 
			$start = $p->findStart($limit);
			$sqlcms=mysql_query("select * from tbl_products");
			$count=mysql_num_rows($sqlcms);
			$pages = $p->findPages($count, $limit);
			if($count)
			{
					if($_GET['page']=='' || $_GET['page']==1)
			{
				$i=1;
			}else{
				$i=$limit*($_GET['page']-1)+1;
			}
			$sqlcms=mysql_query("select * from tbl_products limit $start,$limit");
			while($data=mysql_fetch_array($sqlcms))
			{
			?>
		   	<tr valign="middle">
			 <td width="24" align="left" class="botline"><?=$i++;?></td>
		  	 <td align="left" class="botline"><?=fetchval('category_name',$data['cateid'],'cate_id','tbl_category');?></td>
			 <td align="left" class="botline"><?=$data['product_name'];?></td>
			 <td align="left" class="botline"><?=$data['regular_price'];?></td>
			 <td align="left" class="botline"><?=$data['our_price'];?></td>
			 <td align="left" class="botline"><a href="manage_products.php?mode=change_status&id=<?=$data['id'];?>&status=<?=$data['published'];?>">
			 <? if($data['published']==1) echo "Active";else echo "Deactive";?></a></td>
			 <td align="right" class="botline"><a href="edit_products.php?id=<?=$data['id'];?>" class="buttonbox">Edit</a>&nbsp;
			 <a href="javascript:void(0)" class="buttonbox" onclick="asktodelete('manage_products.php?id=<?=$data['id']?>&mode=del')">Delete</a></td>
		   </tr>
			<? 
			}
			$i++;
			}else{
			?>
		   <tr align="center" bgcolor="#FFFFFF">
		   <td colspan="8" nowrap="nowrap"><span style="font-weight: bold">No Data</span></td>
		   </tr>
		   <?
		   }
		  ?>
          <tr bgcolor="#FFFFFF"><br />
         <td align="center" colspan="8" bgcolor="#EEEEEE">
		<?  $p = new Pager; $start = $p->findStart($limit); $pagelist = $p->pageList($_GET['page'],$pages,""); print "$pagelist"; ?> </td> 
       </tr>
	  </table>
	 </td>
    </tr>
   </table>
  </td>
 </tr>
</table>
<? include("includes/footer.php");?>
</body>
</html>
<script language="javascript">
function asktodelete(path)
{
var ans=confirm(" Do you want to delete Product? ");
if(ans==true)
{
document.location=path;
return true;
}else{
return false;
}
}
</script>