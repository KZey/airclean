<?php
$limit = 50; 
//Admin login check
function adminChklogin()
{
	if($_SESSION['sess_admin_id']=="")
	{
		header("location: login.php");
		exit();
	}
}
function userChklogin()
{
	if($_SESSION['id']=="")
	{
		header("location: login.php");
		exit();
	}
}
function str_replace_assoc(array $replace, $subject) 
{
   return str_replace(array_keys($replace), array_values($replace), $subject);   
} 

/******discount price*********/
//pagesdata for CMS
function pagedata($checkcol1,$chkval1,$tbl)
{
	$query="select * from $tbl where $checkcol1='$chkval1'";
	$sql=mysql_query($query);
	$data=mysql_fetch_array($sql);
	return $data;
}

function new_pagedata($chkcol2,$chkval2,$checkcol1,$chkval1,$tbl)
{
	$query="Select * from $tbl where $checkcol1='$chkval1' and $chkcol2='$chkval2'";
	$sql=mysql_query($query);
	$data=mysql_fetch_array($sql);
	return $data;
}


function getpagedata($checkcol1,$chkval1,$checkcol2,$chkval2,$tbl)
{
	$query="Select * from $tbl where $checkcol1='$chkval1' and $checkcol2='$chkval2'";
	$sql=mysql_query($query);
	return $sql;
}

function finalpagedata($colname,$checkcol1,$chkval1,$checkcol2,$chkval2,$tbl)
{
	$query="Select $colname from $tbl where $checkcol1='$chkval1' and $checkcol2='$chkval2'";
	$sql=mysql_query($query);
	$data=mysql_fetch_array($sql);
	return $data[0];
}

function countdata($checkcol1,$chkval1,$tbl)
{
	$query="select * from $tbl where $checkcol1='$chkval1'";
	$sql=mysql_query($query);
	$count_record=mysql_num_rows($sql);
	return $count_record;
}

function ShowContent($tab1)
{
	$result = mysql_query("select * from $tab1 ");
	if(!$result)
	die("get row fatal error : ".mysql_error());
	return $result;
}

function ShowContentWhere($chkval,$checkcol,$tbl)
{ 
	$result = mysql_query("Select * from $tbl where $checkcol='$chkval'");
	if(!$result)
	die("get row1 fatal error : ".mysql_error());
	return $result;
}


function ShowContentsOrder($tab1,$start,$size, $orderField, $OrderType)
{ 
	$result = mysql_query("select * from $tab1 order by $orderField $OrderType limit ".$start.",".$size);
	if(!$result)
	die("get row1 fatal error : ".mysql_error());
	return $result;
}

function fetchval($colname,$chkval,$checkcol,$tbl)
{
	$query="Select $colname from $tbl where $checkcol='$chkval'";
	$sql=mysql_query($query);
	$data=mysql_fetch_array($sql);
	return $data[0];  
}
function returnRunningPageName($phpself)
{
	$phpself=explode('/',$phpself);
	return $menuFileName=$phpself[count($phpself)-1];
}
//pagesdata for ORDER HISTORY
function ShowOrderHistoryWhere($tab1,$start,$limit, $orderField, $OrderType,$chkcol,$chkval)
{ 
	$result = mysql_query("select * from $tab1 where $chkcol=$chkval order by $orderField $OrderType limit ".$start.",".$limit);
	if(!$result)
	die("get row1 fatal error : ".mysql_error());
	return $result;
}

function ShowHistory($tab1,$orderField, $OrderType,$chkcol,$chkval)
{
	$result = mysql_query("select * from $tab1 where $chkcol=$chkval order by $orderField $OrderType ");
	if(!$result)
	die("get row fatal error : ".mysql_error());
	return $result;
}

//SHORT ORDER CHANGE
function ShowContents_swap($tab1,$start,$size)
{ 
	 $result = mysql_query("select * from $tab1 order by CategoryOrder desc limit ".$start.",".$size);
	if(!$result)
	die("get row1 fatal error : ".mysql_error());
	return $result;
}

function generate_web_link($url) {
    if(substr($url,0,7)=='http://') {
        $linkurl=$url;
        $displayurl=substr($url,7);
    } else if(substr($url,0,8)=='https://') {
        $linkurl=$url;
        $displayurl=$url;
    } else {
        $linkurl='http://'.$url.(is_bool(strpos($url,'/'))?'/':'');
        $displayurl=$url;
    }
    if(substr($displayurl,-1)=='/') {
        $displayurl=substr($displayurl,0,-1);
    }
	 return htmlentities(preg_replace('/[^(\x20-\x7F)]*/','',$linkurl));
   // return '<a href="'.htmlentities(preg_replace('/[^(\x20-\x7F)]*/','',$linkurl)).'" target="_blank">'.htmlentities(preg_replace('/[^(\x20-\x7F)]*/','',$displayurl)).'</a>';
}
?>