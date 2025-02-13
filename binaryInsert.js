/**
 * This is not a real heap. I needed something like a heap and 
 *	this seemed like a fast way to implement it.
 * It's basically a stack/array and every time a value gets inserted, 
 * 	it looks for the proper location to insert and then does a splice into the array.
**/
class Heap {
    /**
      * @param {null|string|function} compare
      */
    constructor(compare) {
        if (compare === 'max') { this.compare = this.maxCompare; }
        else if (compare === 'min') { this.compare = this.defaultCompare; }
        else { this.compare = compare || this.defaultCompare; }
        this.stack = [];
    }
  
    maxCompare(a, b) {
        if (a < b) { return 1; }
        if (a > b) { return -1; }
        return 0;
    }
  
    defaultCompare(a, b) {
        if (a > b) { return 1; }
        if (a < b) { return -1; }
        return 0;
    }
  
    insertPoint(value) {
        const n = this.stack.length;
        if (n === 0) { return 0; }
  
        let start = 0;
        let end = n - 1;
        while (start <= end) {
            let mid = Math.floor((start + end) / 2);
            
            if (this.compare(value, this.stack[mid]) === -1) {
                start = (mid + 1);
            }
            else if (this.compare(value, this.stack[mid]) === 1) {
                end = (mid - 1);
            }   
            else {
                return mid;
            }
        }  
        return start;    
    }

    insert(value) {
        const index = this.insertPoint(value);
        this.stack.splice(index, 0, value);
    }
  
    extract() {
        return this.stack.pop();
    }
  
    size() {
        return this.stack.length;
    }
  
    isEmpty() {
      return this.stack.length === 0;
    }
  
    peek() {
        return this.stack[0] ?? null;
    }  
  
    heapify(arr) {
        arr.forEach((val) => {
            this.insert(val);
        });
    }
}

/*
Usage you can instantiate using 'min', 'max',
null (which defaults to min), or a custom compare function.

let stones = [2,7,4,1,8,1];
const heap = new Heap('max');
heap.heapify(stones);
while (!heap.isEmpty()) {
	console.log(heap.extract());
}

***

let stones = [2,7,4,1,8,1];
const heap = new Heap('max');
stones.forEach((stone) => {
    heap.insert(stone);
});
while (!heap.isEmpty()) {
	console.log(heap.extract());
}

*** 

Custom comparator and use it like a priority queue.
const heap = new Heap((a,b) => {
  if (a[1] > b[1]) { return 1; }
  if (a[1] < b[1]) { return -1; }
  return 0;
});

let scores = [['Second', 1], ['Third', 2], ['First', 0]];
heap.heapify(scores);
while (!heap.isEmpty()) {
  console.log(heap.extract());
}

*/
