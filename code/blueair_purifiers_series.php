<?php
include_once("codelibrary/connection.php");
include_once("codelibrary/functions.php");
$sqlserie=mysql_query("select * from tbl_category where cate_id='".$_GET['serieid']."'");
$get_serie=mysql_fetch_array($sqlserie);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Air Cleaner Professionals - Blueair Purifiers</title>
<meta name='description' content='Air Cleaner Professionals - Blueair Purifiers' />
<meta name='keywords' content='Air Cleaner Professionals - Blueair Purifiers' />
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
<div style=" background:url(uploads/<?=$get_serie['image'];?>) no-repeat; width:980px; height:240px; <? if($_GET['serieid']!=1){?>text-align:right;<? }?>">
<p style="font-family:'ZurichCnBTRegular', Arial, Helvetica, sans-serif; font-size:17px; color:#21b1cb; <? if($_GET['serieid']==1){?>padding:20px 0 0 20px;<? }else{?>padding:20px 20px 0 0px;<? }?>">Blueair <?=$get_serie['category_name'];?></p>
<h3 style="font-family:'ZurichCnBTRegular', Arial, Helvetica, sans-serif; font-size:25px; color:#115464; <? if($_GET['serieid']==1){?>padding:5px 0 0 20px;<? }else{?>padding:5px 20px 0 0px<? }?>"><? if($_GET['serieid']==1){?>The strong, silent type<? }elseif($_GET['serieid']==2){?>The tried-and-true original<? }elseif($_GET['serieid']==3){?>Stylish simplicity<? }elseif($_GET['serieid']==4){?>Powerful purification<? }?></h3>
</div>
</div>
<!-- Main Page Banner End -->
<div class="clear"></div>
<!-- ///////////////////////Body Part Start Here /////////////////////////-->
<div id="bodysubContainer">
<div class="bodyleftContainer"><h1><?=$get_serie['category_name'];?></h1><?=$get_serie['description'];?><br /><br />
<? $sqlmodel=mysql_query("select * from tbl_products where cateid='".$get_serie['cate_id']."' and published=1 order by id");
$nummodel=mysql_num_rows($sqlmodel);
if($nummodel){ $p=1;while($getmodel=mysql_fetch_array($sqlmodel)){?>
<div class="product_left" <? if($p%2==0){?> style="margin-left:35px; border-left: #CCCCCC solid 1px; padding:0 0 0 35px;"<? }?>>
<img src="uploads/<?=$getmodel['image'];?>" width="95" height="105" align="right" class="img"/><h1><?=$getmodel['product_name'];?></h1>
<p><?=substr(strip_tags($getmodel['description']),0,150);?>...<a href="blueair_purifiers_product.php?serieid=<?=$getmodel['cateid'];?>&product=<?=$getmodel['id'];?>">more info...</a><br /><br /><strong>Regular Price</strong>:- RMB <?=$getmodel['regular_price'];?><br /><strong style="color:#FF0000;">Our Price</strong>:- RMB <? if($getmodel['our_price']>0){ echo $getmodel['our_price'];}else{ echo "XXX";}?></p>
</div>
<? $p++;}}?>
</div>
<div class="bodyrightContainer">
<h1>Featured products</h1>
<div class="menu">
<ul>
<? $sql_serie=mysql_query("select * from tbl_category where published=1 order by sort_id");
while($series=mysql_fetch_array($sql_serie)){?>
<li><a href="blueair_purifiers_series.php?serieid=<?=$series['cate_id'];?>" title="<?=$series['category_name'];?>" <? if($series['cate_id']==$_GET['serieid']){?> class="active"<? }?>><?=$series['category_name'];?></a>
<? $sql_model=mysql_query("select * from tbl_products where cateid='".$series['cate_id']."' and published=1 order by id");
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
<li><a href="compare.php" style="border-bottom:none;">Compare All</a></li>
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