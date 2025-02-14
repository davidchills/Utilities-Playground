<?php
// Best/Worst/Average Case: O(n²) because we compare all elements in the inner loop.
// Space Complexity: O(1) (in-place sorting).
function selectionSort($arr) {
    $n = count($arr);

    for ($i = 0; $i < $n - 1; $i++) {
        $minIndex = $i;

        // Find the index of the minimum element in the unsorted part
        for ($j = $i + 1; $j < $n; $j++) {
            if ($arr[$j] < $arr[$minIndex]) {
                $minIndex = $j;
            }
        }

        // Swap the found minimum element with the first element of the unsorted part
        if ($minIndex != $i) {
            $temp = $arr[$i];
            $arr[$i] = $arr[$minIndex];
            $arr[$minIndex] = $temp;
        }
    }

    return $arr;
}

// Test the selection sort
$nums = [64, 25, 12, 22, 11];
$sorted = selectionSort($nums);

echo "Sorted array: " . implode(", ", $sorted) . "\n";
?>