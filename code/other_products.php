<?php
include_once("codelibrary/connection.php");
include_once("codelibrary/functions.php");
$cmsdata=pagedata('id','3','tbl_cms');
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
<h3 style="font-family:'ZurichCnBTRegular', Arial, Helvetica, sans-serif; font-size:25px; color:#fff; padding:25px 0 0 20px;">Other Products</h3>
</div>
</div>
<!-- Main Page Banner End -->
<div class="clear"></div>
<!-- ///////////////////////Footer Three Boxes Start Here /////////////////////////-->
<div id="bodysubContainer">
<div class="bodyleftContainer1">
<h1>Other Products</h1>
<?
$sql_model=mysql_query("select * from tbl_products where published=1 order by id");
$i=1;
while($getmodel=mysql_fetch_array($sql_model)){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="120" align="left" valign="top"><img src="uploads/<?=$getmodel['image'];?>" width="120" height="90" /></td>
    <td width="15" align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top"> <p><h4><a href="blueair_purifiers_product.php?serieid=<?=$getmodel['cateid'];?>&product=<?=$getmodel['id'];?>">Model <?=$getmodel['product_name'];?>:-</a></h4><?=strip_tags($getmodel['description']);?></p>
      <br />
      <strong>Regular Price</strong>:- RMB <?=$getmodel['regular_price'];?><br />
      <strong>Our Price</strong>:- RMB <? if($getmodel['our_price']>0){ echo $getmodel['our_price'];}else{ echo "XXX";}?></td>
  </tr>
</table>

<hr color="#d5e1e4" size="0.1em" style="margin:10px 0 10px 0px;" />
<? }?>
<!--<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="120" align="left" valign="top"><img src="images/450-series.jpg" alt="" width="120" height="90" /></td>
    <td width="15" align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top"><p><h4>Model 203:-</h4>
      A perfect bedroom companion, the Blueair 203 packs a complete,   high-performance air purifier into a beautifully compact design that’s   incredibly quiet.
      But you don’t have to leave the Blueair 203 in the bedroom. It’s also   great in small areas and workspaces to get rid of pesky airborne   allergens, such as pollen, dust, smoke, mold spores, pet dander and   other impurities.<br />
                <br />
      All that remains? Impeccably clean air.</p>
        <br />
        <strong>Regular Price</strong>:- RMB 3800<br />
        <strong>Our Price</strong>:- RMB 3590</td>
  </tr>
</table>
<hr color="#d5e1e4" size="0.1em" style="margin:10px 0 10px 0px;" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="120" align="left" valign="top"><img src="images/503-series.jpg" alt="" width="120" height="90" /></td>
    <td width="15" align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top"><p><h4>Model 203:-</h4>
      A perfect bedroom companion, the Blueair 203 packs a complete,   high-performance air purifier into a beautifully compact design that’s   incredibly quiet.
      But you don’t have to leave the Blueair 203 in the bedroom. It’s also   great in small areas and workspaces to get rid of pesky airborne   allergens, such as pollen, dust, smoke, mold spores, pet dander and   other impurities.<br />
                <br />
      All that remains? Impeccably clean air.</p>
        <br />
        <strong>Regular Price</strong>:- RMB 3800<br />
        <strong>Our Price</strong>:- RMB 3590</td>
  </tr>
</table>
<hr color="#d5e1e4" size="0.1em" style="margin:10px 0 10px 0px;" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="120" align="left" valign="top"><img src="images/503-series.jpg" alt="" width="120" height="90" /></td>
    <td width="15" align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top"><p><h4>Model 203:-</h4>
      A perfect bedroom companion, the Blueair 203 packs a complete,   high-performance air purifier into a beautifully compact design that’s   incredibly quiet.
      But you don’t have to leave the Blueair 203 in the bedroom. It’s also   great in small areas and workspaces to get rid of pesky airborne   allergens, such as pollen, dust, smoke, mold spores, pet dander and   other impurities.<br />
                <br />
      All that remains? Impeccably clean air.</p>
        <br />
        <strong>Regular Price</strong>:- RMB 3800<br />
        <strong>Our Price</strong>:- RMB 3590</td>
  </tr>
</table>
<hr color="#d5e1e4" size="0.1em" style="margin:10px 0 10px 0px;" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="120" align="left" valign="top"><img src="images/503-series.jpg" alt="" width="120" height="90" /></td>
    <td width="15" align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top"><p><h4>Model 203:-</h4>
      A perfect bedroom companion, the Blueair 203 packs a complete,   high-performance air purifier into a beautifully compact design that’s   incredibly quiet.
      But you don’t have to leave the Blueair 203 in the bedroom. It’s also   great in small areas and workspaces to get rid of pesky airborne   allergens, such as pollen, dust, smoke, mold spores, pet dander and   other impurities.<br />
                <br />
      All that remains? Impeccably clean air.</p>
        <br />
        <strong>Regular Price</strong>:- RMB 3800<br />
        <strong>Our Price</strong>:- RMB 3590</td>
  </tr>
</table>
<hr color="#d5e1e4" size="0.1em" style="margin:10px 0 10px 0px;" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="120" align="left" valign="top"><img src="images/503-series.jpg" alt="" width="120" height="90" /></td>
    <td width="15" align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top"><p><h4>Model 203:-</h4>
      A perfect bedroom companion, the Blueair 203 packs a complete,   high-performance air purifier into a beautifully compact design that’s   incredibly quiet.
      But you don’t have to leave the Blueair 203 in the bedroom. It’s also   great in small areas and workspaces to get rid of pesky airborne   allergens, such as pollen, dust, smoke, mold spores, pet dander and   other impurities.<br />
                <br />
      All that remains? Impeccably clean air.</p>
        <br />
        <strong>Regular Price</strong>:- RMB 3800<br />
        <strong>Our Price</strong>:- RMB 3590</td>
  </tr>
</table>
 --></div>
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