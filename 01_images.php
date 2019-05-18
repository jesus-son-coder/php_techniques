<?php
$info = getimagesize('./images/chat.jpg');
print_r($info);

// Get directly the width of a picture :
$width = getimagesize('./images/chat.jpg')[0];
echo $width;
