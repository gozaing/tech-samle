<?php 
$text = '{CCM:FID_4894}';

$test = 'FID_4894';
$pattern = '/FID_/';
if (preg_match('/'.$test.'/', $text, $match)) {
    print_r($match);
} else {
    echo 'else';
}

