<?php
$thumbDir = "img/thumb";
$originalDir = "img/originals";
$images = array_slice(scandir($thumbDir),2);
foreach ($images as $image) {
    echo '<a rel="gallery" class="photo" href="' . $originalDir . '/' . $image . '" target="blank">' .
    '<img src="' . $thumbDir . '/' . $image . '" width="150" height="100" /></a>';
}

