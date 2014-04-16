<?php
include_once("codelibrary/connection.php");
include_once("codelibrary/functions.php");
$sqlarticle=mysql_query("select * from tbl_knowledge_center where id=".$_GET['aid']." and published=1");
$getarticle=mysql_fetch_array($sqlarticle);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>空气净化专家 - Blueair Purifiers</title>
<meta name='description' content='Air Cleaner Professionals - Blueair Purifiers' />
<meta name='keywords' content='Air Cleaner Professionals - Blueair Purifiers' />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/slider.css" rel="stylesheet" type="text/css" />
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
<div style=" background:url(../images/knowledge_center_img.jpg) no-repeat; width:980px; height:240px;">
<h3 style="font-family:'ZurichCnBTRegular', Arial, Helvetica, sans-serif; font-size:25px; color:#115464; padding:25px 0 0 20px;">Knowledge Center</h3>
</div>
</div>
<!-- Main Page Banner End -->
<div class="clear"></div>
<!-- ///////////////////////Footer Three Boxes Start Here /////////////////////////-->
<div id="bodysubContainer">
<div class="bodyleftContainer1"><h1><?=$getarticle['title'];?></h1><?=$getarticle['content'];?></div>
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
