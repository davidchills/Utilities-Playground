<?php
// Best Case: O(n) (if the array is already sorted).
// Worst/Average Case: O(n²) (when the array is reversed or unsorted).
// Space Complexity: O(1) (in-place sorting).    
function insertionSort($arr) {
    $n = count($arr);

    for ($i = 1; $i < $n; $i++) {
        $key = $arr[$i];
        $j = $i - 1;

        // Move elements that are greater than $key one position ahead
        while ($j >= 0 && $arr[$j] > $key) {
            $arr[$j + 1] = $arr[$j];
            $j--;
        }
        $arr[$j + 1] = $key;
    }

    return $arr;
}

// Test the insertion sort
$nums = [12, 11, 13, 5, 6];
$sorted = insertionSort($nums);

echo "Sorted array: " . implode(", ", $sorted) . "\n";
?>