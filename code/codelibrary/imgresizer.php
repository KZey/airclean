<?php
function resize_jpg($inputFilename, $new_side)
{	
$imagedata = getimagesize($inputFilename);	
$w = $imagedata[0];
$h = $imagedata[1];		
if ($h > $w) {		
$new_w = ($new_side / $h) * $w;		
$new_h = $new_side;		
} else {		
$new_h = ($new_side / $w) * $h;		
$new_w = $new_side;	
}		
$im2 = ImageCreateTrueColor($new_w, $new_h);	
$image = ImageCreateFromJpeg($inputFilename);	
imagecopyResampled ($im2, $image, 0, 0, 0, 0, $new_w, $new_h, $imagedata[0], $imagedata[1]);	
return $im2;
}
function resampimagejpg( $forcedwidth, $forcedheight, $sourcefile, $destfile )
{ 
 

    $fw = $forcedwidth;
    $fh = $forcedheight;
  $is = getimagesize($sourcefile);
  
    
	if( $is[0] >= $is[1] )
    {
        $orientation = 0;
    }
    else
    {
        $orientation = 1;
        $fw = $forcedheight;
        $fh = $forcedwidth;
    }
    if ( $is[0] > $fw || $is[1] > $fh )
    {
        if( ( $is[0] - $fw ) >= ( $is[1] - $fh ) )
        {
            $iw = $fw;
            $ih = ( $fw / $is[0] ) * $is[1];
        }
        else
        {
            $ih = $fh;
            $iw = ( $ih / $is[1] ) * $is[0];
        }
        $t = 1;
    }
    else
    {
        $iw = $is[0];
        $ih = $is[1];
        $t = 2;
    }
	
	
    if ( $t == 1 )
    {
	//echo $sourcefile ;
	//die();
	
        $img_src = imagecreatefromjpeg( $sourcefile ); 
        $img_dst = imagecreatetruecolor( $iw, $ih );
        imagecopyresampled( $img_dst, $img_src, 0, 0, 0, 0, $iw, $ih, $is[0], $is[1] );
        if( !imagejpeg( $img_dst, $destfile, 90 ) )
        {
            exit();
        }
    }
    else if ( $t == 2 )
    {
        copy( $sourcefile, $destfile );
    }
}

function show_thumb($file_org, $width, $height, $ratio_type = 'crop')
{
	$file_name = str_replace("/", "", $file_org);
	$file_name = str_replace("/", "^", $file_name);
	$cache_file = $width."x".$height.'__'.$ratio_type .'__'.$file_name;
	$file_fs_path = "../product_images/". $file_org;
	if(!is_file("thumb_cache/".$cache_file)) {
		//make_thumb_gd($file_fs_path, "thumb_cache/".$cache_file, $width, $height, $ratio_type );
		#ImageResizer($file_fs_path, "thumb_cache/".$cache_file, $width, $height, $quality = 70, $verbose = false);
		resize($file_fs_path, "thumb_cache/".$cache_file, 98, 110, $pictype = "");
	}
	return "thumb_cache/".$cache_file;
}
?>