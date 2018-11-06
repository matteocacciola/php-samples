<?php

function my_max($xs) {
    $max = 0;

    foreach ($xs as $item) {
        if (is_array($item)) {
            $item = my_max1($item);
        }

        $max = ($item > $max) ? $item : $max;
    }

    return $max;
}

echo my_max([1, 2, [3, 4]]); // 4