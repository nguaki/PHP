<?php

$myImage = ImageCreate( 300, 300 );

$white = ImageColorAllocate( $myImage, 255, 255, 255 );
$red = ImageColorAllocate( $myImage, 255, 0, 0 );
$blue = ImageColorAllocate( $myImage, 0, 0, 255 );

ImageFilledRectangle( $myImage, 15, 15, 95, 155, $red );
ImageFilledRectangle( $myImage, 95, 155, 175, 295, $blue );
ImageFilledRectangle( $myImage, 175, 15, 255, 155, $red );

header ("Content-type: image/png" );

ImagePng($myImage);

ImageDestroy($myImage);

?>