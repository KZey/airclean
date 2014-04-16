<?php
include_once("../codelibrary/connection.php");
include_once("../codelibrary/functions.php");
$cmsdata=pagedata('id','14','tbl_cms');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$cmsdata['meta_title'];?></title>
<meta name='description' content='<?=$cmsdata['meta_keywords'];?>' />
<meta name='keywords' content='<?=$cmsdata['meta_desc'];?>' />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/slider.css" />
<script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../js/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="../js/slider-settings.js"></script>
<script type="text/javascript" src="../js/rollover.js"></script>
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
<div id="slider">
<div id="slider-container">
  <ul id="slider-box">
   <div class="slide-pager-container">
	<div id="slide-pager"></div>
	</div>
	<? $sqlslider=mysql_query("select * from tbl_slider where published=1 and lang = 2");
	while($slider=mysql_fetch_array($sqlslider)){
		?>
	<li>
	<div class="photo-banner" style="background-image:url(../slider/<?=$slider['image'];?>)">
	<!-- <div class="welcome-banner" <? //if($slider['id']==2){?> style="float:right; width:550px;"<? //}?>><? //=$slider['alt'];?></div> -->
	<div class="corners"></div>
	</div>
    </li>
	<? }?>
   </ul>
  </div>
 </div>
</div>
<!-- Main Page Banner End -->
<div class="clear"></div>
<!-- ///////////////////////Footer Three Boxes Start Here /////////////////////////-->
<div class="footerbox">
<!-- Box1 Start -->
<div class="box1">
  <img src="../images/blueair_purifier.png" width="85" height="116" align="right" />
  <h1>Blueair带你走进健康生活</h1>
<h2>立即购买</h2>

<a href="compare.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','../images/cn/cp_h.png',1)"><img src="../images/cn/cp_h.png" alt="compair model" name="Image4" width="133" height="30" border="0" id="Image4" style="margin-top:6px;" /></a>

<div class="clear"></div>
</div>
<!-- Box1 End -->

<!-- Box2 Start -->
<div class="box2">
<h1>了解更多空气污染与健康破坏的信息</h1>

<a href="knowledge_center.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image5','','../images/cn/kc_h.png',1)" style="float:right; margin-top:11px;"><img src="../images/cn/kc_h.png" alt="knowledge center" name="Image5" width="147" height="30" border="0" id="Image5" /></a>
</div>
<!-- Box2 End -->

<!-- Box3 Start -->
<div class="box3">
<h1>不能决定购买类型?<br/><br/></h1>

<a href="other_products.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','../images/cn/service_h.png',1)"><img src="../images/cn/service_h.png" alt="services" name="Image6" width="135" height="30" border="0" id="Image6" style="margin-top:11px;" /></a>
</div>
<!-- Box3 End -->

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
