<? $arr = explode("/",$_SERVER['PHP_SELF']);
$pagename = end($arr);?>
<div id="headerContainer">
<!-- Logo Part Start -->
<div class="logoContainer"><a href="index.php"><img src="../images/aircleaner_logo.png" alt="Air Cleaner" border="0" /></a></div>
<!-- Logo Part End -->
<!-- Top Right Part Start -->
<div class="toprightContainer">
<div class="free_delievery">北京地区免费送货上门</div>
<div class="cell_no">电话: 13661143811</div>
<div class="blueair_logo"><a href='../'><img src="../images/flag_en.jpg" height='20' width    ='30' alt="English" border='0'></a>&nbsp;&nbsp;<img src="../images/blueair_logo.png" alt="blueair" width="182" height="41"/></div>
</div>
<!-- Top Right Part End -->
<div class="clear"></div>
<div class="nav">
<ul>
<li><a href="index.php" style="background-image:none;" title="Home" <? if($pagename=="index.php"){?> class="active"<? }?>>首页</a></li>
<li><a href="blueair_purifiers.php" title="Blueair Purifiers" <? if($pagename=="blueair_purifiers.php" || $pagename=="blueair_purifiers_series.php" || $pagename=="blueair_purifiers_product.php" || $pagename=="compare.php"){?> class="active"<? }?>>Blueair空气净化器</a></li>
<li><a href="filter_replacements.php" title="Filters" <? if($pagename=="filter_replacements.php"){?> class="active"<? }?>>过滤器更换</a></li>
<li><a href="other_products.php" title="Other Products" <? if($pagename=="other_products.php"){?> class="active"<? }?>>其他产品</a></li>
<li><a href="faq.php" title="FAQ" <? if($pagename=="faq.php"){?> class="active"<? }?>>常见问题</a></li>
<li><a href="knowledge_center.php" title="Knowledge Center" <? if($pagename=="knowledge_center.php" || $pagename=="article_detail.php"){?> class="active"<? }?>>资讯中心</a></li>
<li><a href="promotions.php" title="Promotions" <? if($pagename=="promotions.php"){?> class="active"<? }?>>促销产品</a></li>
<li><a href="contact_us.php" title="Contact us" <? if($pagename=="contact_us.php"){?> class="active"<? }?>>联系我们</a></li>
</ul>
<div class="clear"></div>
</div>
<!-- Main Navigation Part End -->
</div>
