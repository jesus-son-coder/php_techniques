<?php
/**
 * Created by PhpStorm.
 * User: rvck2
 * Date: 19/01/2019
 * Time: 11:42
 */

$images = new FilesystemIterator('./images');

foreach ($images as $image) {
    // Get the current image's MIME type :
    $mime = getimagesize($image)['mime'];
    // Strip off the leading 'image/' :
    $mime = substr($mime, 6);
    echo $mime . '<br>';

    // Usen $mime to create variable functions :
    $createResource = "imagecreatefrom$mime";
    $outputImg = "image$mime";

    // Create an image resource of the right MIME type :
    $resource = $createResource($image);
    $rotated = imagerotate($resource, 90, 0);

    // Output the rotated image using the right MIME type :
    $outputImg($rotated, $image->getPath() . '/rotated_' . $image->getFilename());

    // free up memory bu destroying the image resources :
    imagedestroy($resource);
    imagedestroy($rotated);
}
echo 'Done';