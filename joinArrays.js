/**
 * @param {Array} arr1
 * @param {Array} arr2
 * @return {Array}
 */
var joinArrays = function(arr1, arr2) {
    const map = new Map();
    
    [...arr1, ...arr2].forEach(obj => {
        if (map.has(obj.id)) {
            map.set(obj.id, { ...map.get(obj.id), ...obj });
        } 
        else {
            map.set(obj.id, obj);
        }
    });
    
    return Array.from(map.values()).sort((a, b) => a.id - b.id);
};