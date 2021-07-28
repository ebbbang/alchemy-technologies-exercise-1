<?php

$arrays = [
    [4, 2, 3, 3, 5],
    [10, 2, 2, 3],
    [3, 4, 5, 3],
    [3, 4, 5, 6, 3, 2],
    [2, 2, 2, 2],
    [4, 2, 3, 3, 1, 2],
];

foreach ($arrays as $array) {
    $length = 0;
    $depth = 0;
    $intersectionIndex = null;

    foreach ($array as $index => $element) {
        $newLength = $length;
        $newDepth = $depth;

        if ($index % 4 === 0) {
            $newLength += $element;
        }

        if ($index % 4 === 1) {
            $newDepth -= $element;
        }

        if ($index % 4 === 2) {
            $newLength -= $element;
        }

        if ($index % 4 === 3) {
            $newDepth += $element;
        }

        if ($length >= 0) {
            if (
                ($depth < 0 && $newDepth >= 0) ||
                ($depth > 0 && $newDepth <= 0)
            ) {
                $intersectionIndex = $index;

                break;
            }
        }

        $length = $newLength;
        $depth = $newDepth;
    }

    echo json_encode($array) . PHP_EOL;

    if (is_null($intersectionIndex)) {
        echo 'Does not Intersect.' . PHP_EOL;
    } else {
        echo "Intersection Index: $intersectionIndex" . PHP_EOL;
    }

    echo PHP_EOL;
}