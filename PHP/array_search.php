<?php 

$array_sample = array( 0  => 178,
                        1  => 179,
                        2  => 180,
                        3  => 181,
                        4  => 182,
                        5  => 531 
                        );

$array_target = array (100, 181, 191);

var_dump($array_sample);
var_dump($array_target);
echo "-----------" . PHP_EOL;
foreach ( $array_target as $target ) {
   // if ( in_array($target, $array_sample, TRUE)) {
   //      echo "match!->". (String)$target. PHP_EOL;
   // } 
   $key = array_search($target, $array_sample);
   if ($key) {
        echo "match ". "target->". (String)$target. " key->". (String)$key. PHP_EOL;
        $array_replace = array($key => 999);
        $array_sample = array_replace($array_sample, $array_replace);
   }
}

echo "-----------" . PHP_EOL;
var_dump($array_sample);
echo "-----------" . PHP_EOL;
