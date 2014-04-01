<?php
include_once("codelibrary/connection.php");
include_once("codelibrary/functions.php");
$cmsdata=pagedata('id','1','tbl_cms');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<div class="slider"><img src="uploads/<?=$cmsdata['image'];?>" alt="Blueair Purifiers" /></div>
<!-- Main Page Banner End -->
<div class="clear"></div>
<!-- ///////////////////////Footer Three Boxes Start Here /////////////////////////-->
<div id="bodysubContainer">
<div class="bodyleftContainer"><h1>Blueair Purifiers</h1><?=$cmsdata['page_content'];?></div>
<div class="bodyrightContainer"><h1>Featured products</h1>
<div class="menu">
<ul>
<? $sql_serie=mysql_query("select * from tbl_category where published=1 order by sort_id");
while($series=mysql_fetch_array($sql_serie)){?>
<li><a href="blueair_purifiers_series.php?serieid=<?=$series['cate_id'];?>" title="<?=$series['category_name'];?>"><?=$series['category_name'];?></a></li>
<? }?>
<li><a href="compare.php" style="border-bottom:none;">Compare All</a></li>
</ul>
</div>
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