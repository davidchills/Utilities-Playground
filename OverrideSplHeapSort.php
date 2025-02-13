<?php
class CustomPriorityHeap extends SplHeap {
    // Override the compare method.
    protected function compare(mixed $value1, mixed $value2): int {
        if ($value1[1] === $value2[1]) return 0;
        return ($value1[1] < $value2[1]) ? 1 : -1;
    }
}

// Example for priority queue
$heap = new CustomPriorityHeap();
$heap->insert(['Second', 1]);
$heap->insert(['Third', 2]);
$heap->insert(['First', 0]);

// Extract all elements
while (!$heap->isEmpty()) {
    print_r($heap->extract());
}
	
// Example for string length	
class CustomMaxStringHeap extends SplHeap {
    // Override the compare method.
    protected function compare(mixed $value1, mixed $value2): int {
        if (strlen($value1) === strlen($value2)) return 0;
        return (strlen($value1) > strlen($value2)) ? 1 : -1;
    }
}
	
$heap = new CustomMaxStringHeap();
$heap->insert('abcdef');
$heap->insert('abc');
$heap->insert('abcdefg');

// Extract all elements
while (!$heap->isEmpty()) {
    print $heap->extract()."\n";
}
?>