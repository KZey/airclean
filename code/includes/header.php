<? $arr = explode("/",$_SERVER['PHP_SELF']);
$pagename = end($arr);?>
<div id="headerContainer">
<!-- Logo Part Start -->
<div class="logoContainer"><a href="index.php"><img src="images/aircleaner_logo.png" alt="Air Cleaner" border="0" /></a></div>
<!-- Logo Part End -->
<!-- Top Right Part Start -->
<div class="toprightContainer">
<div class="free_delievery">Free Delivery in Beijing!</div>
<div class="cell_no">Call 13661143811</div>
<div class="blueair_logo"><a href='./cn/'><img src="../images/flag_cn.gif" hei    ght='20' width='30' alt="Chinese" border='0'></a>&nbsp;&nbsp;<img src="images/blueair_logo.png" alt="blueair" width="182" height="41" /></div>
</div>
<!-- Top Right Part End -->
<div class="clear"></div>
<div class="nav">
<ul>
<li><a href="index.php" style="background-image:none;" title="Home" <? if($pagename=="index.php"){?> class="active"<? }?>>Home</a></li>
<li><a href="blueair_purifiers.php" title="Blueair Purifiers" <? if($pagename=="blueair_purifiers.php" || $pagename=="blueair_purifiers_series.php" || $pagename=="blueair_purifiers_product.php" || $pagename=="compare.php"){?> class="active"<? }?>>Blueair Purifiers</a></li>
<li><a href="filter_replacements.php" title="Filters" <? if($pagename=="filter_replacements.php"){?> class="active"<? }?>>Filters</a></li>
<li><a href="other_products.php" title="Other Products" <? if($pagename=="other_products.php"){?> class="active"<? }?>>Other Products</a></li>
<li><a href="faq.php" title="FAQ" <? if($pagename=="faq.php"){?> class="active"<? }?>>FAQ</a></li>
<li><a href="knowledge_center.php" title="Knowledge Center" <? if($pagename=="knowledge_center.php" || $pagename=="article_detail.php"){?> class="active"<? }?>>Knowledge Center</a></li>
<li><a href="promotions.php" title="Promotions" <? if($pagename=="promotions.php"){?> class="active"<? }?>>Promotions</a></li>
<li><a href="contact_us.php" title="Contact us" <? if($pagename=="contact_us.php"){?> class="active"<? }?>>Contact us</a></li>
</ul>
<div class="clear"></div>
</div>
<!-- Main Navigation Part End -->
</div>
