<?php
function getImgSrc($src){
    $imgType = [
        '.jpeg',
        '.jpg',
        '.png',
        '.gif',
        '.JPEG',
        '.JPG',
        '.PNG',
        '.GIF',
    ];
    foreach ($imgType as $type){
        if (file_exists($src.$type)) {
            return asset($src.$type);
        };
    }
}
