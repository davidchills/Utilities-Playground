<?php
/**
 * Playing with ways to get easily get an array in different kinds of heaps.
 * The Spl classes are much faster than unsing a plain array and sorting etc. 
 * At least that is the way it tests out on leetcode problems.
 *
 * This wont cover every situation, like needing custom sorting depending on  
 *	entering other values. You can still over-ride the 'compare' method in 
 *	a class that extends the Spl class.
**/
function heapify(string $type = '', array $arr = []): SplHeap|SplPriorityQueue {
	if ($type === 'queue') {
		$heap = new SplPriorityQueue();
		foreach ($arr as $k => $v) {
			$heap->insert($v, $k);
		}
	}
	else {
		if ($type === 'min') { $heap = new SplMinHeap(); }
		elseif ($type === 'max') { $heap = new SplMaxHeap(); }
		else { $heap = new SplHeap(); }		
		for ($i = 0; $i < count($arr); $i++) {
			$heap->insert($arr[$i]);
		}
	}
	return $heap;
}

$myHeap = heapify('min', [1,9,0,2,8,3,7,4,6,5]);
/** 
 * Outputs:
 * 0
 * 1
 * 2
 * 3
 * 4
 * 5
 * 6
 * 7
 * 8
 * 9	
**/
	
//$myHeap = heapify('max', [1,9,0,2,8,3,7,4,6,5]);
/** 
 * Outputs:
 * 9
 * 8
 * 7
 * 6
 * 5
 * 4
 * 3
 * 2
 * 1
 * 0	
**/
	
//$myHeap = heapify('queue', [2 => 'third', 0 => 'first', 1 => 'second', 4 => 'fifth', 3 => 'fourth', 5 => 'sixth']);
/** 
 * Outputs:
 * sixth
 * fifth
 * fourth
 * third
 * second
 * first
**/


while ($myHeap->valid()) { 
	print $myHeap->extract()."\n";
}
?>