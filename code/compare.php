<?php
include_once("codelibrary/connection.php");
include_once("codelibrary/functions.php");
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<div style=" background:url(images/compare_all.jpg) no-repeat; width:980px; height:240px;">
<h3 style="font-family:'ZurichCnBTRegular', Arial, Helvetica, sans-serif; font-size:25px; color:#115464; padding:20px 0px 0 20px;">Compare All</h3>
</div>
</div>
<!-- Main Page Banner End -->
<div class="clear"></div>
<!-- ///////////////////////Footer Three Boxes Start Here /////////////////////////-->
<div id="bodysubContainer">
<div class="bodyleftContainer">
<h1>Compare All</h1>
<table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#bcdce4">
  <tr>
    <td width="165" bgcolor="#E0EFF3"><strong>Products</strong></td>
    <td width="90" align="center" bgcolor="#FFFFFF"><img src="images/203-270E.jpg" alt="203-270E" width="80" height="93" /></td>
    <td width="95" align="center" bgcolor="#FFFFFF"><img src="images/403-450E.jpg" alt="403-450E" width="80" height="93" /></td>
    <td width="219" align="center" bgcolor="#FFFFFF"><img src="images/503-550E.jpg" alt="503-550E" width="80" height="93" /></td>
    <td align="center" bgcolor="#FFFFFF"><img src="images/600.jpg" alt="600" width="80" height="93" /></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#bcdce4">
  <tr>
    <td width="165" bgcolor="#E0EFF3"><strong>Model</strong></td>
	<?
	$sql_model=mysql_query("select model_no from tbl_products where published=1  and lang = 1 order by id");
	$i=1;
	while($model=mysql_fetch_array($sql_model)){
	if($i==1){$width='width="40"';
	}elseif($i==2){$width='width="40"';
	}elseif($i==3){$width='width="40"';
	}elseif($i==4){$width='width="45"';
	}elseif($i==5){$width='width="105"';
	}elseif($i==6){$width='width="105"';
	}else{$width='';}
	?>
    <td <?=$width;?> align="center" bgcolor="#E0EFF3"><strong><?=$model['model_no'];?></strong></td>
	<? $i++;}?>
  </tr>
  <tr>
    <td bgcolor="#F7FBFC"><strong>Room Size SQM</strong></td>
	<? $sql_model=mysql_query("select sqm from tbl_products where published=1  and lang = 1 order by id");
	while($model=mysql_fetch_array($sql_model)){?>
    <td align="center" bgcolor="#F7FBFC"><?=$model['sqm'];?></td>
	<? }?>
  </tr>
  <tr>
    <td bgcolor="#E0EFF3"><strong>Dust Sensor</strong></td>
	<? $sql_model=mysql_query("select dust_sensor from tbl_products where published=1  and lang = 1 order by id");
	while($model=mysql_fetch_array($sql_model)){?>
    <td align="center" bgcolor="#E0EFF3"><? if($model['dust_sensor']==1){echo "Yes";}else{ echo "No";}?></td>
	<? }?>
  </tr>
  <tr>
    <td bgcolor="#F7FBFC"><strong>Remote</strong></td>
	<? $sql_model=mysql_query("select remote from tbl_products where published=1  and lang = 1 order by id");
	while($model=mysql_fetch_array($sql_model)){?>
    <td align="center" bgcolor="#F7FBFC"><? if($model['remote']==1){echo "Yes";}else{ echo "No";}?></td>
	<? }?>
  </tr>
  <tr>
    <td bgcolor="#E0EFF3"><strong>Speed Options</strong></td>
	<? $sql_model=mysql_query("select speed_options from tbl_products where published=1  and lang = 1 order by id");
	while($model=mysql_fetch_array($sql_model)){?>
    <td align="center" bgcolor="#E0EFF3"><?=$model['speed_options'];?></td>
	<? }?>
  </tr>
  <tr>
    <td bgcolor="#F7FBFC"><strong>Air Inlet</strong></td>
	<? $sql_model=mysql_query("select air_inlet from tbl_products where published=1  and lang = 1 order by id");
	while($model=mysql_fetch_array($sql_model)){?>
    <td align="center" bgcolor="#F7FBFC"><?=$model['air_inlet'];?></td>
	<? }?>
  </tr>
  <tr>
    <td bgcolor="#E0EFF3"><strong>Air Outlet</strong></td>
	<? $sql_model=mysql_query("select air_outlet from tbl_products where published=1  and lang = 1 order by id");
	while($model=mysql_fetch_array($sql_model)){?>
    <td align="center" bgcolor="#E0EFF3"><?=$model['air_outlet'];?></td>
	<? }?>
  </tr>
  <tr>
    <td bgcolor="#F7FBFC"><strong>Wheels</strong></td>
	<? $sql_model=mysql_query("select wheels from tbl_products where published=1  and lang = 1 order by id");
	while($model=mysql_fetch_array($sql_model)){?>
    <td align="center" bgcolor="#F7FBFC"><? if($model['wheels']==1){echo "Yes";}else{ echo "No";}?></td>
	<? }?>
  </tr>
  <tr>
    <td bgcolor="#E0EFF3"><strong>Timer</strong></td>
	<? $sql_model=mysql_query("select timer from tbl_products where published=1  and lang = 1 order by id");
	while($model=mysql_fetch_array($sql_model)){?>
    <td align="center" bgcolor="#E0EFF3"><? if($model['timer']==1){echo "Yes";}else{ echo "No";}?></td>
	<? }?>
  </tr>
  <tr>
    <td bgcolor="#F7FBFC"><strong>Clean air Delivery Rate</strong></td>
	<? $sql_model=mysql_query("select delivery_rate from tbl_products where published=1  and lang = 1 order by id");
	while($model=mysql_fetch_array($sql_model)){?>
    <td align="center" bgcolor="#F7FBFC"><?=$model['delivery_rate'];?></td>
	<? }?>
  </tr>
  <tr>
    <td bgcolor="#E0EFF3"><strong>Regular Price(RMB)</strong></td>
	<? $sql_model=mysql_query("select regular_price from tbl_products where published=1  and lang = 1 order by id");
	while($model=mysql_fetch_array($sql_model)){?>
    <td align="center" bgcolor="#E0EFF3"><?=$model['regular_price'];?></td>
	<? }?>
  </tr>
  <tr>
    <td bgcolor="#F7FBFC"><strong style="color:#FF0000;">Our Price(RMB)</strong></td>
	<? $sql_model=mysql_query("select our_price from tbl_products where published=1  and lang = 1 order by id");
	while($model=mysql_fetch_array($sql_model)){?>
    <td align="center" bgcolor="#F7FBFC" style="color:#FF0000;"><? if($model['our_price']>0){ echo $model['our_price'];}else{ echo "XXX";}?></td>
	<? }?>
  </tr>
  <tr>
    <td bgcolor="#E0EFF3"><strong style="color:#21B1CB;">In Stock?</strong></td>
	<? $sql_model=mysql_query("select availability from tbl_products where published=1  and lang = 1 order by id");
	while($model=mysql_fetch_array($sql_model)){?>
    <td align="center" bgcolor="#E0EFF3" style="color:#21B1CB;"><? if($model['availability']==1){echo "Yes";}else{ echo "No";}?></td>
	<? }?>
  </tr>
</table>
</div>
<div class="bodyrightContainer">
<h1>Featured products</h1>
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
