<?php

/*
//Example of use:
$sql = "SELECT * FROM users where 1";
$pager = new pager($sql,'page',15);
while($row = mysql_fetch_array($pager->result))
{
    echo $row['id']." ".$row['name']."<br>";
}
echo $pager->show();
*/

class pager
{
    var $sql;
    var $getvar;
    var $rows;
    var $start;
    var $getvar_val;
    var $pager;
    var $result;
    
    function __construct($sql,$getvar,$length)
    {
        $this->result=null;
        $this->sql = $sql;
        $this->getvar = $getvar;
        $this->rows = 0;
        $this->start = 0;
        $this->getvar_val = 1;
        $this->pager = null;
        $this->SetLength($length);
        $this->GetStart();
        $this->doQuery();
    }
    
    //Sets $length
  function SetLength($length)
  {
      $this->length = (int)$length;
      if($this->length<0)
      {
          $this->length = 0;
      }
  }
  
  function doQuery()
  {
      $sql = trim($this->sql);
      //$sql = substr($sql,7);
	  $sql = 'SELECT SQL_CALC_FOUND_ROWS * from ('.$sql.') as tbl limit '.$this->start.', '.$this->length;
      $this->result = mysql_query($sql);
      $sql = "SELECT FOUND_ROWS()";
      $result = mysql_query($sql);
      $this->rows = mysql_result($result,0);
  }
  
  //getvar_val() gets the
  //$getvar_val is a positive integer - > 0
  function Set_Getvar_val()
  {
      $this->getvar_val = (int)$_GET[$this->getvar];
      if($this->getvar_val<1)
      {
          $this->getvar_val = 1;
      }
  }

  //Gets the start of the data
  function GetStart()
  {
      $this->Set_Getvar_val();
      $this->start = (($this->getvar_val-1)*$this->length);
  }
  
    function show($next=" ",$Previous=" ",$separator=" ")
    {
        $array = $this->pager();
        $str = array();
        foreach($array as $k => $v)
        {
            if($k!='next'&&$k!='Previous')
            {
                if($k==$this->getvar_val)
                {
                    $str[] = '<span class="active">'.$k.'</span>';
                }
                else
                {
                    $str[] = '<a href="'.$v.'" class="page">'.$k.'</a>';
                }
            }
        }
        $str = implode($separator, $str);
        $rt = $array['Previous']===null?"":'<a href="'.$array['Previous'].'" class="page11">Prev'.$Previous.'</a>'.$separator;
        $rt .= $str.$separator;
        $rt .= $array['next']===null?"":'<a href="'.$array['next'].'" class="page">'.$next.'Next</a>';
        return $rt;
    }
    
     //Returns an array of the links arround the given point
    //['next'] => next page
    //['Previous'] => Previous page
    function pager($margin=9)
    {
        $path = $_GET;
        $newpath = $PHP_SELF."?";
        foreach($path as $key => $value)
        {
            if($key!=$this->getvar)
            {
                $newpath .= $key."=".$value;
                $newpath .="&amp;";
            }
        }
        $newpath .= $this->getvar;

        $linkpaths = array();
        $current = $this->start / $this->length + 1;
        $pages = ceil(($this->rows/$this->length));
        $pagerstart = $current-$margin;
        $pagerstart = ($pagerstart<1)?1:$pagerstart;
        $pagerend = $current+$margin;
        
        $pagerend = ( $pagerend > $pages ) ? ( ceil( ( $this->rows / $this->length ) ) ): $pagerend;

        for($i=$pagerstart;$i < ($pagerend+1);$i++)
        {
            $linkpaths[$i] = $newpath."=".($i);
        }
        if($linkpaths[($current+1)]!=null)
        {
            $linkpaths['next']=$linkpaths[($current+1)];
        }
        if($linkpaths[($current-1)]!=null)
        {
            $linkpaths['Previous']=$linkpaths[($current-1)];
        }
        return $linkpaths;
    }
}
?> 