# **Javascript Arrays**
<br>

## **Table Of Contents**
<br>

- [**Javascript Arrays**](#javascript-arrays)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Ways To Create Arrays**](#ways-to-create-arrays)
    - [**Constructor Function Array()**](#constructor-function-array)
    - [**Array Literal**](#array-literal)
  - [**Adding And Deleting Elements**](#adding-and-deleting-elements)
    - [**push()**](#push)
    - [**unshift()**](#unshift)
    - [**pop()**](#pop)
    - [**shift()**](#shift)
    - [**splice()**](#splice)
    - [**copyWithin()**](#copywithin)
  - [**Sorting**](#sorting)
    - [**sort()**](#sort)
    - [**reverse()**](#reverse)
  - [**Searching**](#searching)
    - [**indexOf()**](#indexof)
    - [**lastIndexOf()**](#lastindexof)
    - [**find()**](#find)
    - [**filter()**](#filter)
    - [**includes()**](#includes)
    - [**every()**](#every)
    - [**some()**](#some)
  - [**Other Methods**](#other-methods)
    - [**forEach()**](#foreach)
    - [**map()**](#map)
    - [**reduce()**](#reduce)
    - [**slice()**](#slice)
    - [**concat()**](#concat)
    - [**join()**](#join)
  
<br>
<br>
<br>

## **General**
<br>

* Arrays are object
* Arrays are dynamic, so they can grow or shrink
* Arrays are loosely types, so they can contain elements of different types

```javascript
array.length;       // returns number of elements
array[0];           // access element in array
```

<br>
<br>
<br>

## **Ways To Create Arrays**
<br>

### **Constructor Function Array()**
<br>

```javascript
const array1 = new Array();                 // empty array

const array2 = new Array(5);                // optional: create an array with initial length of 5

const array3 = new Array(1, 3.14, 'foo');   // optional: create an array with values
```

<br>
<br>

### **Array Literal**
<br>

```javascript
const array1 = [];                          // empty array

const array2 = [1, 3.13, 'foo'];            // create an array with values
```

<br>
<br>
<br>

## **Adding And Deleting Elements**
<br>

### **push()**

* adds one or more elements to the **end** of an array and returns new length
```javascript
let array = [1, 2, 3];
array.push(4);
let len = array.push(5, 6, 7);

console.log(len);           // output: 7
console.log(array);         // output: [1, 2, 3, 4, 5, 6, 7]
```

<br>
<br>

### **unshift()**

* adds one or more elements to the **start** of an array and returns new length
```javascript
let array = [1, 2, 3];
array.unshift(4);
let len = array.unshift(5, 6, 7);

console.log(len);           // output: 7
console.log(array);         // output: [5, 6, 7, 4, 1, 2, 3]
```

<br>
<br>

### **pop()**

* removes and returns **last** element
* returns _undefined_ for empty array
```javascript
let array = [1, 2, 3];
console.log(array.pop());   // output: 3
console.log(array);         // output: [1, 2]
```

<br>
<br>

### **shift()**

* removes and returns **first** element
* returns _undefined_ for empty array
```javascript
let array = [1, 2, 3];
console.log(array.shift());   // output: 1
console.log(array);           // output: [2, 3]
```

<br>
<br>

### **splice()**

* removes or replaces existing elements 
* adds new elements
* returns array of deleted elements

```javascript
array.splice(startIndexToInsertElements, numberOfElementsToRemoveFromStart, elementsToAdd)
```

<br>

```javascript
let array = ['A', 'C', 'D', 'X'];

array.splice(1, 0, 'B');
console.log(array);                     // output: [A, B, C, D, X]

console.log(array.splice(4, 1, 'E'));   // output: [X]
console.log(array);                     // output: [A, B, C, D, E]

array.splice(5, 1, 'I');
console.log(array);                     // output: [A, B, C, D, E, I]

array.splice(200, 1, 'J');
console.log(array);                     // output: [A, B, C, D, E, I, J]

array.splice(5, 0, 'F', 'G', 'H');
console.log(array);                     // output: [A, B, C, D, E, F, G, H, I, J]
```

<br>
<br>

### **copyWithin()**

* shallow copies parts of an array to another location in the same array
* elements at targetIndex get replaces --> array length does not change

<br>

Parameters:
* _targetIndex_
* _startIndex_
    * optional (0 if undefined)
* _endIndex_
    * optional (array.length if undefined)
    * endIndex is not included in range

<br>

```javascript
copyWithin(target, [start], [end])
```

```javascript
let array = ['A', 'B', 'C', 'D'];
console.log(array.copyWithin(-1));          // output: ['A', 'B', 'C', 'A']

array = ['A', 'B', 'C', 'D']
console.log(array.copyWithin(0, 2));        // output: ['C', 'D', 'C', 'D']

array = ['A', 'B', 'C', 'D']
console.log(array.copyWithin(0, 2, 3));        // output: ['C', 'B', 'C', 'D']
```

<br>
<br>
<br>

## **Sorting**
<br>

### **sort()**

* sorts array in ascending order
* optional custom compare function

```javascript
sort();

sort(compareFunctionName);

sort((a,b) => { /* implementation of compare function (a: first element, b: last element) */ });

sort(function compareFunctionName(a, b) { /* implementation */ })

// compareFunction(a, b) > 0      ==>   sort b before a
// compareFunction(a, b) < 0      ==>   sort a before b
// compareFunction(a, b) === 0    ==>   keep original order of a and b
```

<br>

```javascript
let array = [3, 6, 3, 2, 10, 37];
array.sort();
console.log(array);                                     // output: [10, 2, 3, 3, 37, 6]

let array2 = ['x', 'hello', 'a', 't'];
array2.sort();
console.log(array2);                                    // output: [a, hello, t, x]

let array3 = [3, 6, 3, 2, 10, 37];
array3.sort((a,b) => {return Number(a) - Number(b)});
console.log(array3);                                    // output: [2, 3, 3, 6, 10, 37]
```

<br>
<br>

### **reverse()**

* returns array with reversed order of elements

```javascript
let array = [4, 34, 2, 7];
array.reverse();
console.log(array);                                     // output: [7, 2, 34, 4]
```

<br>
<br>
<br>

## **Searching**
<br>

### **indexOf()**

* returns index of _first_ occurrence of element in array
* returns -1 if element does not exist in array
* optional fromIndex

```javascript
indexOf(element);
indexOf(element, fromIndex);
```

<br>

```javascript
let array = ['one', 'two', 'three', 'two', 'six'];
console.log(array.indexOf('two'));                      // output:  1
console.log(array.indexOf('two', 2));                   // output:  3
console.log(array.indexOf('three'));                    // output:  2
console.log(array.indexOf('ten'));                      // output: -1
```

<br>
<br>

### **lastIndexOf()**

* returns index of _last_ occurrence of element in array
* returns -1 if element does not exist in array
* optional fromIndex (array is searched backwards)

```javascript
lastIndexOf(element);
lastIndexOf(element, fromIndex);
```

<br>

```javascript
let array = ['one', 'two', 'three', 'two', 'six'];
console.log(array.lastIndexOf('two'));                  // output:  3
console.log(array.lastIndexOf('two', 2));               // output:  1
console.log(array.lastIndexOf('three'));                // output:  2
console.log(array.lastIndexOf('ten'));                  // output: -1
```

<br>
<br>

### **find()**

* returns _first_ element that matches the custom findFunction
* returns _undefined_ if no element matches the custom findFunction

<br>

Parameters:
* _findFunction_
  * _element_
  * _index_
  * _array_
* _thisArg_: optional reference to use as _this_ within the findFunction

<br>

```javascript
// general
find(findFunction, [thisArg])


// arrow findFunction
find((element) => { /* implementation */})
find((element, index) => { /* implementation */})
find((element, index, array) => { /* implementation */})


// callback findFunction
find(findFunction)
find(findFunction, thisArg)


// inline callback findFunction
find(function(element) { /* implementation */ })
find(function(element, index) { /* implementation */ })
find(function(element, index, array) { /* implementation */ })
find(function(element, index, array) { /* implementation */ }, thisArg)
```

<br>

```javascript
let array = [10, 5, 4, 17, 3, 8];

let found = array.find(element => element < 5);
console.log(found);                               // output: 4

function isOddNumber(element, index, array) {
  return element % 2 !== 0;
}
found = array.find(isOddNumber);
console.log(found);                               // output: 5
```

<br>
<br>

### **filter()**

* returns new array containing all elements that match the custom findFunction

```javascript
// general
filter(findFunction, [thisArg])


// arrow findFunction
filter((element) => { /* implementation */})
filter((element, index) => { /* implementation */})
filter((element, index, array) => { /* implementation */})


// callback findFunction
filter(findFunction)
filter(findFunction, thisArg)


// inline callback findFunction
filter(function(element) { /* implementation */ })
filter(function(element, index) { /* implementation */ })
filter(function(element, index, array) { /* implementation */ })
filter(function(element, index, array) { /* implementation */ }, thisArg)
```

<br>

```javascript
let array = [10, 5, 4, 17, 3, 8];

let filteredArray1 = array.filter(element => element < 8);
console.log(array);                                           // output [10, 5, 4, 17, 3, 8]
console.log(filteredArray1);                                  // output [5, 4, 3]
```
<br>
<br>

### **includes()**

* returns boolean indicating whether array includes element

```javascript
includes(element);
includes(element, fromIndex);
```

<br>

```javascript
let array = [1, 9, 29, 3, 7, 12];
console.log(array.includes(3));         // output: true
console.log(array.includes(3, 4));      // output: false
console.log(array.includes(4));         // output: false
```

<br>
<br>

### **every()**

* returns boolean indicating whether _all_ elements match custom findFunction

```javascript
every(findFunction, [thisArg])
```

<br>

```javascript
let array = [1, 9, 29, 3, 7, 12];

let result = array.every(element => element < 30);
console.log(result);                                  // output: true

result = array.every(element => element > 3)      
console.log(result);                                  // output: false
```

<br>
<br>

### **some()**

* returns boolean indicating whether _at least one_ element matches custom findFunction

```javascript
some(findFunction, [thisArg])
```

<br>

```javascript
let array = [1, 9, 29, 3, 7, 12];

let result = array.some(element => element === 3);
console.log(result);                                  // output: true

result = array.some(element => element < 1);
console.log(result);                                  // output: false
```

<br>
<br>
<br>

## **Other Methods**
<br>

### **forEach()**

* executes function once for every element

<br>

Parameters:
* _customFunction_
  * _element_
  * _index_
  * _array_
* _thisArg_: optional reference to use as _this_ within the function

<br>

```javascript
forEach(customFunction, [thisArg])
```

<br>

```javascript
let array = [1, 2, 3];

array.forEach(element => console.log(element));

// Output: 1 2 3
```

<br>
<br>

### **map()**

* returns new array containing the results of a customFunction envoked on every element of the original array
* do not use map() when you are not using the returned array

```javascript
map(customFunction, [thisArg])
```

<br>

```javascript
let array = [4, 3, 1, 25, 54, 93];
let map = array.map(element => element + 10);

console.log(array);                             // output: [4, 3, 1, 25, 54, 93]
console.log(map);                               // output: [14, 13, 11, 35, 64, 103]
```

<br>
<br>

### **reduce()**

* envokes customFunction to reduce all elements of an array to a single value and returns that value

<br>

Parameters:
* _customFunction_
  * _previousValue_ 
      * value from previous call of customFunction (first call: _initialValue_ or array[0])
  * _currentValue_
      * value of current element (first call: array[0] if _initialValue_ exists, else array[1])
  * _currentIndex_
      * index position of currentValue (first call: 0 if _initialValue_ exists, else 1)
  * _array_
* _initialValue_

<br>

```javascript
// general
reduce(customFunction, [initialValue])


// arrow customFunction
reduce((previousValue, currentValue) => { /* implementation */ })
reduce((previousValue, currentValue, currentIndex) => { /* implementation */ })
reduce((previousValue, currentValue, currentIndex, array) => { /* implementation */ })
reduce((previousValue, currentValue, currentIndex, array) => { /* implementation */ }, initialValue)


// callback customFunction
reduce(customFunction);
reduce(customFunction, initialValue);


// inline callback customFunction
reduce(function(previousValue, currentValue) { /* implementation */ })
reduce(function(previousValue, currentValue, currentIndex) { /* implementation */ })
reduce(function(previousValue, currentValue, currentIndex, array) { /* implementation */ })
reduce(function(previousValue, currentValue, currentIndex, array) { /* implementation */ }, initialValue)
```

<br>

```javascript
let array = [1, 2, 3, 4, 5];

// sum of all elements
let result = array.reduce((sum, currentValue) => sum + currentValue, 0);
console.log(result);                                                          // output: 15
console.log(array);                                                           // output: [1, 2, 3, 4, 5]


// maximum element
result = array.reduce((a, b) => Math.max(a, b));
console.log(result);                                                          // output: 5


// counting occurrences
array = [1, 3, 4, 2, 1, 5, 4, 1, 7, 3];

result = array.reduce(function(countObject, element) {
  if (element in countObject) {
    countObject[element]++;
  } else {
    countObject[element] = 1;
  }
  return countObject;
}, {}); 

console.log(result);

/* output:
{1: 3,
 2: 1,
 3: 2,
 4: 2,
 5: 1,
 7: 1
}
*/
```

<br>
<br>

### **slice()**

* returns array with shallow copies of elements of an array
* copies can be restricted to a range [start, end)

<br>

Parameters:
* start
    * optional zero-based start index of range to copy
    * if undefined, range starts at index 0
* end
    * optional end index of range (first element to not include in copy)
    * negative index represents offset from array.length
    * if undefined, range ends at array.length

<br>

```javascript
slice([start], [end])
```

```javascript
let array = ['A', 'B', 'C', 'D', 'E', 'F'];

let array2 = array.slice(2, 5); 
console.log(array2);                              // [C, D, E]
console.log(array);                               // [A, B, C, D, E, F]

array2 = array.slice();
console.log(array2);                              // [A, B, C, D, E, F]

array2 = array.slice(undefined, 2);
console.log(array2);                              // [A, B]

array2 = array.slice(1, -3);
console.log(array2);                              // [B, C]
```

<br>
<br>

### **concat()**

* returns array containing all elements of arrays and values given as parameters
* returns shallow copy of calling array if no parameters exist

```javascript
concat();
concat(param1);
concat(param1, ..., paramN);
```

```javascript
let array1 = ['A', 'B', 'C', 'D'];
let array2 = ['foo', 'bar'];
let array3 = [1, 2, 3];

let array4 = array1.concat(array2);
console.log(array4);                          // output: ['A', 'B', 'C', 'D', 'foo', 'bar']
console.log(array1);                          // output: ['A', 'B', 'C', 'D']
console.log(array2);                          // output: ['foo', 'bar']

array4 = array1.concat(array2, array3);       
console.log(array4);                          // output: ['A', 'B', 'C', 'D', 'foo', 'bar', 1, 2, 3]

array4 = array3.concat([4, 5], 'foo');
console.log(array4);                          // output: [1, 2, 3, 4, 5, 'foo']

array4 = array3.concat();
console.log(array4);                          // output: [1, 2, 3]
```

<br>
<br>

### **join()**

* returns string containing all elements separated by commas or a custom separator string

```javascript
join()
join([separator])
```

```javascript
let array = ['f', 'o', 'o'];
console.log(array.join());                    // output: f,o,o
console.log(array.join('---'));               // output: f---o---o
```

<br>
<br>

