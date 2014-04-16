<?php
include_once 'codelibrary/connection.php';
include_once 'codelibrary/functions.php';
$cmsdata=pagedata('id','6','tbl_cms');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$cmsdata['meta_title'];?></title>
<meta name='description' content='<?=$cmsdata['meta_keywords'];?>' />
<meta name='keywords' content='<?=$cmsdata['meta_desc'];?>' />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/slider.css" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="js/slider-settings.js"></script>
<script type="text/javascript" src="js/rollover.js"></script>
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
    <?php $sqlslider=mysql_query("select * from tbl_slider where published=1 and  lang = 1");
    while ($slider=mysql_fetch_array($sqlslider)) {?>
    <li>
    <div class="photo-banner" style="background-image:url(slider/<?=$slider['image'];?>)">
    <!-- <div class="welcome-banner" <?php //if ($slider['id']==2) {?> style="float:right; width:550px;"<?php //}?>><?php //=$slider['alt'];?></div> -->
    <div class="corners"></div>
    </div>
    </li>
    <?php }?>
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
  <img src="images/blueair_purifier.png" width="85" height="116" align="right" />
  <h1>Dont take chances with your health</h1>
<h2>Buy a Blueair Purifier now!</h2>

<a href="compare.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','images/cp_h.png',1)"><img src="images/cp.png" alt="compair model" name="Image4" width="133" height="30" border="0" id="Image4" style="margin-top:6px;" /></a>

<div class="clear"></div>
</div>
<!-- Box1 End -->

<!-- Box2 Start -->
<div class="box2">
<h1>Learn more about Air Pollution and its health effects</h1>

<a href="knowledge_center.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image5','','images/kc_h.png',1)" style="float:right; margin-top:11px;"><img src="images/kc.png" alt="knowledge center" name="Image5" width="147" height="30" border="0" id="Image5" /></a>
</div>
<!-- Box2 End -->

<!-- Box3 Start -->
<div class="box3">
<h1>Looking for other Pollution Control Products?</h1>

<a href="other_products.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','images/otherproduct.png',1)"><img src="images/otherproduct.png" alt="services" name="Image6" width="135" height="30" border="0" id="Image6" style="margin-top:11px;" /></a>
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
