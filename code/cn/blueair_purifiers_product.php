<?php
include_once("../codelibrary/connection.php");
include_once("../codelibrary/functions.php");
$sqlserie=mysql_query("select * from tbl_category where cate_id='".$_GET['serieid']."'");
$get_serie=mysql_fetch_array($sqlserie);
/******************************************/
$sql_model=mysql_query("select * from tbl_products where id='".$_GET['product']."' and published=1");
$get_model=mysql_fetch_array($sql_model);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Air Cleaner Professionals - Blueair Purifiers</title>
<meta name='description' content='Air Cleaner Professionals - Blueair Purifiers' />
<meta name='keywords' content='Air Cleaner Professionals - Blueair Purifiers' />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
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
<div style=" background:url(../uploads/<?=$get_serie['image'];?>) no-repeat; width:980px; height:240px; <? if($_GET['serieid']!=1){?>text-align:right;<? }?>">
<p style="font-family:'ZurichCnBTRegular', Arial, Helvetica, sans-serif; font-size:17px; color:#21b1cb; <? if($_GET['serieid']==1){?>padding:20px 0 0 20px;<? }else{?>padding:20px 20px 0 0px;<? }?>">Blueair <?=$get_model['model_no'];?></p>
<h3 style="font-family:'ZurichCnBTRegular', Arial, Helvetica, sans-serif; font-size:25px; color:#115464; <? if($_GET['serieid']==1){?>padding:5px 0 0 20px;<? }else{?>padding:5px 20px 0 0px;<? }?>"><?=$get_model['slider_text'];?></h3>
</div>
</div>
<!-- Main Page Banner End -->
<div class="clear"></div>
<!-- ///////////////////////Body Part Start Here /////////////////////////-->
<div id="bodysubContainer">
<div class="bodyleftContainer"><h1>Blueair <?=$get_model['model_no'];?></h1>
<?=$get_model['description'];?><br />
<strong style="font-size:14px; line-height:18px;">Regular Price</strong>:- RMB <?=$get_model['regular_price'];?><br />
<strong style="color:#FF0000; font-size:14px;">Our Price</strong>:- RMB <? if($get_model['our_price']>0){ echo $get_model['our_price'];}else{ echo "XXX";}?><br /></p><br />
<div class="commentContainer">
<div><h2>At a glance</h2><?=$get_model['at_a_glance'];?>
<div class="clear"></div>
</div>
<div class="bottom_shadow"></div>
<div><h2>Design</h2><?=$get_model['design'];?>
<div class="clear"></div>
</div>
<div class="bottom_shadow"></div>
<div><h2>Technology</h2><?=$get_model['technology'];?>
<div class="clear"></div>
</div>
<div class="bottom_shadow"></div>
<div><h2>How it works</h2><?=$get_model['how_it_works'];?>
<div class="clear"></div>
</div>
</div>
<div class="clear"></div>
</div>
<div class="bodyrightContainer">
<h1>特色产品</h1>
<div class="menu">
<ul>
<? $sql_serie=mysql_query("select * from tbl_category where published=1 order by sort_id");
while($series=mysql_fetch_array($sql_serie)){?>
<li><a href="blueair_purifiers_series.php?serieid=<?=$series['cate_id'];?>" title="<?=$series['category_name'];?>" <? if($series['cate_id']==$_GET['serieid']){?> class="active"<? }?>><?=$series['category_name'];?></a>
<? $sql_model=mysql_query("select * from tbl_products where cateid='".$series['cate_id']."' and published=1 and lang =2 order by id");
$num_model=mysql_num_rows($sql_model);
if($num_model){?>
<div class="menu1" style="display:<? if($series['cate_id']==$_GET['serieid']){echo "inline";}else{ echo "none";}?>">
<ul>
<? while($model=mysql_fetch_array($sql_model)){?>
<li><a href="blueair_purifiers_product.php?serieid=<?=$series['cate_id'];?>&product=<?=$model['id'];?>" title="<?=$model['product_name'];?>"><?=$model['product_name'];?></a></li>
<? }?>
</ul>
</div>
<? }?>
</li>
<? }?>
<li><a href="compare.php" style="border-bottom:none;">比较全部</a></li>
</ul>
</div>
</div>
<div class="clear"></div>
</div>
<!-- ///////////////////////Body Part End Here /////////////////////////-->
<div class="clear"></div>
</div>
<!-- ///////////////////////Body Part End Here /////////////////////////-->
<div class="clear"></div>
</div>
<?php include('includes/footer.php');?>
</body>
</html>
