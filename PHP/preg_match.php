<?php 
$text = '{{#user_name}}';
// .は忘れる事がないように
$reg = '/{{#(.*)}}/';
if (preg_match($reg, $text, $match)) {
    print_r($match);
} else {
    echo 'else';
}

