<?php
include_once("codelibrary/connection.php");
include_once("codelibrary/functions.php");
include_once("codelibrary/newpager.php");
$cmsdata=pagedata('id','7','tbl_cms');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$cmsdata['meta_title'];?></title>
<meta name='description' content='<?=$cmsdata['meta_keywords'];?>' />
<meta name='keywords' content='<?=$cmsdata['meta_desc'];?>' />
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="wrapper">
<!-- ///////////////////////Header Part Start Here /////////////////////////-->
<?php include('includes/header.php');?>
<!-- ///////////////////////Header Part End Here /////////////////////////-->
<div class="clear"></div>

<!-- ///////////////////////Body Part Start Here /////////////////////////-->
<div id="bodyContainer">
<!-- Main Page Banner Start -->
<div class="slider">
<div style=" background:url(uploads/<?=$cmsdata['image'];?>) no-repeat; width:980px; height:240px;">
<h3 style="font-family:'ZurichCnBTRegular', Arial, Helvetica, sans-serif; font-size:25px; color:#115464; padding:25px 0 0 20px;">Knowledge Center</h3>
</div>
</div>
<!-- Main Page Banner End -->
<div class="clear"></div>
<!-- ///////////////////////Footer Three Boxes Start Here /////////////////////////-->
<div id="bodysubContainer">
<div class="bodyleftContainer1">
<h1>Knowledge Center</h1>
<? $sql = "SELECT * FROM tbl_knowledge_center where published ='1'  and lang     = 2";
$pager = new pager($sql,'page',10);
$num_rows=$pager->rows;
if($num_rows>0){
$i=1;
while($article = mysql_fetch_array($pager->result)){
?>
<div class="artical" <? if($i%2==0){ echo 'style="float:right;"';}?>>
<h3><?=$article['title'];?></h3>
<p><?=substr(strip_tags($article['content']),0,121);?>......</p>
<? if($article['url']){?>
<a href="<?=generate_web_link($article['url']);?>" target="_blank">View Articles</a>
<? }else{?>
<a href="article_detail.php?aid=<?=$article['id'];?>">View Articles</a>
<? }?>
</div>
<? 
$i++;
}
}else{
	echo '<div align="center"><br /><br /><br />Record Not Available.<br /><br /><br /></div>';
}
?>
<div class="clear"></div>
<div style="float:right"><div class="pagination"><? echo $pager->show();?></div>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
<!-- ///////////////////////Footer Three Boxes End Here /////////////////////////-->
<div class="clear"></div>
</div>
<!-- ///////////////////////Body Part End Here /////////////////////////-->

<div class="clear"></div>
</div>

<?php include('includes/footer.php');?>
</body>
</html>
