<?php
// Best Case: O(n) (if already sorted)
// Worst/Average Case: O(n²) (if array is reversed or unsorted)
function bubbleSort($arr) {
    $n = count($arr);

    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                // Swap $arr[$j] and $arr[$j+1]
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
    return $arr;
}

// Test the bubble sort
$nums = [64, 34, 25, 12, 22, 11, 90];
$sorted = bubbleSort($nums);

echo "Sorted array: " . implode(", ", $sorted) . "\n";
?>