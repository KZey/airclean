<?php
include_once("../codelibrary/connection.php");
include_once("../codelibrary/functions.php");
include_once("../codelibrary/pager.php");
adminChklogin();
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
  <td align="left" valign="top"><a href="index.php" class="new_text">Home</a> >> <span class="new_text">Manage CMS</span></td>
   </tr>
	<tr>
	 <td align="center" valign="top">
	  <table width="80%" border="0" cellspacing="0" cellpadding="5">
	   <tr>
		<td align="left" class="TD-Heading">Manage CMS Pages Information</td>
		 </tr>
		  <tr>
		   <td class="bdr-3sides"><div align="center" style="color:#990000; font-weight:bold;"><? if(isset($_SESSION['ses_message']) && $_SESSION['ses_message']) { echo $_SESSION['ses_message']; $_SESSION['ses_message'] = "";} ?></div>
			<table width="100%" border="0" cellpadding="4" cellspacing="1"  class="text">
			<tr>
			<td width="25" align="left" bgcolor="#EEEEEE"><strong>#</strong></td>
			<td width="475" align="left" bgcolor="#EEEEEE"><strong>Page Title</strong></td>
			<td width="115" align="left" bgcolor="#EEEEEE"><strong>Action</strong></td>
			</tr>
			<? 
			$limit=25;
			$p = new Pager; 
			$start = $p->findStart($limit);
			$sqlcms=mysql_query("select * from tbl_cms where meta_desc!='0'");
			$count=@mysql_num_rows($sqlcms);
			$pages = $p->findPages($count, $limit);
			if($count)
			{
				if($_GET['page']=='' || $_GET['page']==1)
			{
				$i=1;
			}else{
				$i=$limit*($_GET['page']-1)+1;
			}
			$sqlcms=mysql_query("select * from tbl_cms where meta_desc!='0' limit $start,$limit");
			while($data=mysql_fetch_array($sqlcms))
			{
			?>
		    <tr valign="middle">
			<td width="24" align="left" class="botline"><?=$i++;?></td>
			<td align="left" class="botline"><?=ucfirst(str_replace("_"," ",$data['page_name']));?></td>
			<td align="right" class="botline"><a href="edit_cms.php?cms_id=<?=base64_encode($data['id']);?>" class="buttonbox">Edit</a></td>
		   </tr>
		  <? } $i++;}?>		
         <tr bgcolor="#FFFFFF">
  <td align="center" colspan="5" bgcolor="#EEEEEE"><? $p = new Pager; $start = $p->findStart($limit); $pagelist = $p->pageList($_GET['page'],$pages,""); print "$pagelist"; ?></td>        </tr>
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