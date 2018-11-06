<?php

function my_rev1($str) {
    $length = preg_match_all('(.)su', $str);

    $result = '';
    for ($i = $length; $i >= 0; $i--) {
        $result .= $str[$i];
    }

    return $result;
}

function my_rev2($str) {
    $length = preg_match_all('(.)su', $str);

    $result = array();
    for ($i = $length; $i >= 0; $i--) {
        $result[] = $str[$i];
    }

    return implode('', $result);
}

$time_start = microtime(true);
echo my_rev1('abc') . '<br />'; // cba
$time_end = microtime(true);
$time = $time_end - $time_start;
echo "Process Time: {$time}<br />";

$time_start = microtime(true);
echo my_rev2('abc') . '<br />'; // cba
$time_end = microtime(true);
$time = $time_end - $time_start;
echo "Process Time: {$time}<br />";