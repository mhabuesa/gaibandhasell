<?php

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

if (!function_exists('ImageProcess')) {
    function ImageProcess($photo)
    {
        $manager = new ImageManager(new Driver());

        // Read the image file
        $image = $manager->read($photo->getRealPath());

        return $image;
    }
}
