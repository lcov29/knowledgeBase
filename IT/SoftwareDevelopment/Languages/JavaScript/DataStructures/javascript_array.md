# **Javascript Array**
<br>

## **Table Of Contents**
<br>

- [**Javascript Array**](#javascript-array)
  - [**Table Of Contents**](#table-of-contents)
  - [**Basics**](#basics)
  - [**Create Arrays**](#create-arrays)
    - [**Constructor Array()**](#constructor-array)
    - [**Array Literal**](#array-literal)
  - [**Destructuring**](#destructuring)
  - [**Spread Operator**](#spread-operator)
  - [**Properties**](#properties)
    - [**length**](#length)
  - [**Methods**](#methods)
    - [**Accessing Elements**](#accessing-elements)
      - [**Array\[\]**](#array)
      - [**at()**](#at)
    - [**Update Elements**](#update-elements)
      - [**Array\[\]**](#array-1)
      - [**with()**](#with)
    - [**Adding Elements**](#adding-elements)
      - [**push()**](#push)
      - [**unshift()**](#unshift)
    - [**Removing Elements**](#removing-elements)
      - [**pop()**](#pop)
      - [**shift()**](#shift)
    - [**Iterating over elements**](#iterating-over-elements)
      - [**For Loops**](#for-loops)
      - [**forEach()**](#foreach)
    - [**Sorting**](#sorting)
      - [**sort()**](#sort)
      - [**toSorted()**](#tosorted)
      - [**reverse()**](#reverse)
      - [**toReversed()**](#toreversed)
    - [**Searching**](#searching)
      - [**indexOf()**](#indexof)
      - [**lastIndexOf()**](#lastindexof)
      - [**find()**](#find)
      - [**findLast()**](#findlast)
      - [**findIndex()**](#findindex)
      - [**findLastIndex()**](#findlastindex)
    - [**Checking Elements**](#checking-elements)
      - [**includes()**](#includes)
      - [**every()**](#every)
      - [**some()**](#some)
    - [**Get Modified Array Copy**](#get-modified-array-copy)
      - [**filter()**](#filter)
      - [**map()**](#map)
      - [**reduce()**](#reduce)
    - [**Multifunctional Manipulation Methods**](#multifunctional-manipulation-methods)
      - [**splice()**](#splice)
      - [**copyWithin()**](#copywithin)
      - [**slice()**](#slice)
    - [**Other Methods**](#other-methods)
      - [**concat()**](#concat)
      - [**join()**](#join)
      - [**fill()**](#fill)
      - [**flat()**](#flat)
  
<br>
<br>
<br>

## **Basics**
<br>

**1. Arrays are objects**

```javascript
const array = [1, 2, 3];

typeof array;   // 'object'
```

<br>

**2. Arrays are resizable**

```javascript
const array = [1, 2, 3];

array.push(4);
array;            // [1, 2, 3, 4]

array.pop();
array.pop();
array;            // [1, 2]
```

<br>

**3. Arrays can contain elements of different types**

```javascript
const array = [1, '2', false, { foo: 'bar' }, [1, 2, 3]];
```

<br>
<br>
<br>

## **Create Arrays**
<br>
<br>

### **Constructor Array()**
<br>

```
Array(?initialLength, ?element1, ... ?elementN)
```

<br>

**Examples**

```javascript
const array = new Array();          // []
```

```javascript
const array = new Array(3);         // [empty × 3]
```

```javascript
const array = new Array(1, 2, 3);   // [1, 2, 3]
```

<br>
<br>

### **Array Literal**
<br>

```javascript
const array = [];         // []
```

```javascript
const array = [1, 2, 3];  // [1, 2, 3]
```

<br>
<br>
<br>

## **Destructuring**
<br>

* assign element values of an array to variables
* array is not changed
* if more variables than array elements exist, the variables without assignment are _undefined_ or their custom default value

```javascript
[variable1, ... , variableN] = array;

let [variable1, ... , variableN] = array;

let [variable1 = default1, ... , variableN = defaultN] = array;

let [variable1, ..., variableN, ...rest] = array;
```

```javascript
let array = [1, 2, 3, 4, 5];


// assign element values to new variables
let  [a, b, c] = array;
console.log(a);                                        // output: 1
console.log(b);                                        // output: 2
console.log(c);                                        // output: 3


// assign element values to existing variables
[b, c] = array;
console.log(b);                                        // output: 1
console.log(c);                                        // output: 2


// default value
let [a ='A', 
     b = 'B', 
     c = 'C', 
     d = 'D', 
     e = 'E', 
     f = 'F'] = array;
console.log(a);                                         // output: 1
console.log(b);                                         // output: 2
console.log(c);                                         // output: 3
console.log(d);                                         // output: 4
console.log(e);                                         // output: 5
console.log(f);                                         // output: F


// use rest
let [a, ...rest] = array;                               
console.log(a);                                         // output: 1
console.log(rest);                                      // output: [2, 3, 4, 5]


// extract specific elements
let [a, , c] = array;
console.log(a);                                         // output: 1
console.log(c);                                         // output: 3


// multidimensional array destructuring
let multiArray = [['A', 'B'], ['C', 'D'], ['E']];
let [
  [a, b],
  [c, d],
  [e]
] = multiArray;
console.log(a);                                         // output: A
console.log(b);                                         // output: B
console.log(c);                                         // output: C
console.log(d);                                         // output: D
console.log(e);                                         // output: E


// destructuring inside for of loop
let array = [[1, 2, 3], [7, 8, 9], [5, 8, 13]];

for (let [a, b, c] of array) {
    console.log(`a: ${a}`);
    console.log(`b: ${b}`);
    console.log(`c: ${c}`);
}

/*
output:
  a: 1    b: 2    c: 3
  a: 7    b: 8    c: 9
  a: 5    b: 8    c: 13
*/
```

<br>
<br>
<br>

## **Spread Operator**
<br>

* expands array element to the outside scope

<br>

```javascript
...array
```

<br>

```javascript
let array = ['a', 1, true];


// spread array elements to function arguments
function print(arg1, arg2, arg3) {
  console.log(`${arg1} ${arg2} ${arg3}`);
}
print(...array);


// shallow copy of an array
let array2 = [...array];


// add elements to array
array = [...array, newElement1, newElement2];


// concat arrays
let concatArray = [...array, ...array2];
```

<br>
<br>
<br>

## **Properties**
<br>
<br>

### **length**
<br>

Returns number of elements of array.

```javascript
const array = [1, 2, 3, 4, 5];

array.length;   // 5
```

<br>
<br>
<br>

## **Methods**
<br>
<br>

### **Accessing Elements**
<br>
<br>

#### **Array[]**
<br>

* returns element at specified index
* index is zero-based

```javascript
const array = [1, 2, 3, 4, 5];

array.[0];                  // returns 1
array.[2];                  // returns 3
```

<br>
<br>

#### **at()**
<br>

* returns element at specified index
* positive index is zero-based
* allows selection from end of array via negative index

```javascript
const array = [1, 2, 3, 4, 5];

array.at(0);                // returns 1
array.at(2);                // returns 3
array.at(-1);               // returns 5
array.at(-3);               // returns 3
```

<br>
<br>
<br>

### **Update Elements**
<br>

#### **Array[]**

* updates element at specified index

```javascript
const array = [1, 2, 3, 4];
array[1] = 8;

// array = [1, 8, 3, 4]
```

<br>
<br>

#### **with()**
<br>

* returns a new array with updated element at specified index

```javascript
const array = [1, 2, 3, 4];
array.with(2, 8);                 // returns new array [1, 2, 8, 4] 
array.with(-1, 6);                // returns new array [1, 2, 3, 6]
```

<br>
<br>
<br>

### **Adding Elements**
<br>

#### **push()**

* adds one or more elements to the **end** of an array
* returns new length
```javascript
let array = [1, 2, 3];
array.push(4);
let len = array.push(5, 6, 7);

console.log(len);           // output: 7
console.log(array);         // output: [1, 2, 3, 4, 5, 6, 7]
```

<br>
<br>

#### **unshift()**

* adds one or more elements to the **start** of an array
* returns new length
```javascript
let array = [1, 2, 3];
array.unshift(4);
let len = array.unshift(5, 6, 7);

console.log(len);           // output: 7
console.log(array);         // output: [5, 6, 7, 4, 1, 2, 3]
```

<br>
<br>
<br>

### **Removing Elements**
<br>

#### **pop()**

* removes and returns **last** element
* returns _undefined_ for empty array
```javascript
let array = [1, 2, 3];
console.log(array.pop());   // output: 3
console.log(array);         // output: [1, 2]
```

<br>
<br>

#### **shift()**

* removes and returns **first** element
* returns _undefined_ for empty array
```javascript
let array = [1, 2, 3];
console.log(array.shift());   // output: 1
console.log(array);           // output: [2, 3]
```

<br>
<br>
<br>

### **Iterating over elements**
<br>

#### **For Loops**

```javascript
const array = ['A', 'B', 'C'];

// count loop over index
for (let i = 0; i < array.length; i++) {
  console.log(array[i]);
}

// iterate over index
for (let index in array) {
  console.log(array[index]);
}

// iterate over values
for (let value of array) {
  console.log(value);
}
```

<br>
<br>

#### **forEach()**

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
<br>

### **Sorting**
<br>

#### **sort()**

* sorts array elements in ascending order
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
array.sort();                                     // array = [10, 2, 3, 3, 37, 6]

let array2 = ['x', 'hello', 'a', 't'];
array2.sort();                                    // array2 = [a, hello, t, x]

let array3 = [3, 6, 3, 2, 10, 37];
array3.sort((a,b) => a - b);                      // array3 = [2, 3, 3, 6, 10, 37]
```

<br>
<br>

#### **toSorted()**

* returns **copy** of array sorted in ascending order
* optional custom compare function

```javascript
toSorted();

toSorted(compareFunctionName);

toSorted((a,b) => { /* implementation of compare function (a: first element, b: last element) */ });

toSorted(function compareFunctionName(a, b) { /* implementation */ })

// compareFunction(a, b) > 0      ==>   sort b before a
// compareFunction(a, b) < 0      ==>   sort a before b
// compareFunction(a, b) === 0    ==>   keep original order of a and b
```

<br>

```javascript
const array = [3, 6, 3, 2, 10, 37];
array.toSorted();                               // returns [10, 2, 3, 3, 37, 6]

const array2 = ['x', 'hello', 'a', 't'];
array2.toSorted();                              // returns [a, hello, t, x]

const array3 = [3, 6, 3, 2, 10, 37];
array3.toSorted((a,b) => a - b);                // returns [2, 3, 3, 6, 10, 37]
```

<br>
<br>

#### **reverse()**

* reverses order of array elements

```javascript
const array = [4, 34, 2, 7];
array.reverse();                            // array: [7, 2, 34, 4]
```

<br>
<br>

#### **toReversed()**
<br>

* returns **copy** of array with reversed order or elements

```javascript
const array = [4, 34, 2, 7];
array.toReversed();                         // returns [7, 2, 34, 4]
```

<br>
<br>
<br>

### **Searching**
<br>

#### **indexOf()**

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

#### **lastIndexOf()**

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

#### **find()**

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

#### **findLast()**

* returns _last_ element that matches the custom findFunction
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
findLast(findFunction, [thisArg])


// arrow findFunction
findLast((element) => { /* implementation */})
findLast((element, index) => { /* implementation */})
findLast((element, index, array) => { /* implementation */})


// callback findFunction
findLast(findFunction)
findLast(findFunction, thisArg)


// inline callback findFunction
findLast(function(element) { /* implementation */ })
findLast(function(element, index) { /* implementation */ })
findLast(function(element, index, array) { /* implementation */ })
findLast(function(element, index, array) { /* implementation */ }, thisArg)
```

<br>

```javascript
let array = [10, 5, 4, 17, 3, 8];

array.findLast(element => element > 9);               // output: 17

function isOddNumber(element, index, array) {
  return element % 2 !== 0;
}

array.findLast(isOddNumber);                          // output: 3
```

<br>
<br>

#### **findIndex()**

* returns index of _first_ element that matches the custom findFunction
* returns -1 if no element matches the custom findFunction

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
findIndex(findFunction, [thisArg])


// arrow findFunction
findIndex((element) => { /* implementation */})
findIndex((element, index) => { /* implementation */})
findIndex((element, index, array) => { /* implementation */})


// callback findFunction
findIndex(findFunction)
findIndex(findFunction, thisArg)


// inline callback findFunction
findIndex(function(element) { /* implementation */ })
findIndex(function(element, index) { /* implementation */ })
findIndex(function(element, index, array) { /* implementation */ })
findIndex(function(element, index, array) { /* implementation */ }, thisArg)
```

<br>

```javascript
let array = [10, 5, 4, 17, 3, 8];

array.findIndex(element => element < 5);               // returns index 2

function isOddNumber(element, index, array) {
  return element % 2 !== 0;
}

array.findIndex(isOddNumber);                          // returns index 1
```

<br>
<br>

#### **findLastIndex()**

* returns index of _last_ element that matches the custom findFunction
* returns -1 if no element matches the custom findFunction

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
findLastIndex(findFunction, [thisArg])


// arrow findFunction
findLastIndex((element) => { /* implementation */})
findLastIndex((element, index) => { /* implementation */})
findLastIndex((element, index, array) => { /* implementation */})


// callback findFunction
findLastIndex(findFunction)
findLastIndex(findFunction, thisArg)


// inline callback findFunction
findLastIndex(function(element) { /* implementation */ })
findLastIndex(function(element, index) { /* implementation */ })
findLastIndex(function(element, index, array) { /* implementation */ })
findLastIndex(function(element, index, array) { /* implementation */ }, thisArg)
```

<br>

```javascript
let array = [10, 5, 4, 17, 3, 8];

array.findLastIndex(element => element > 9);            // returns index 3

function isOddNumber(element, index, array) {
  return element % 2 !== 0;
}

array.findLastIndex(isOddNumber);                       // returns index 4
```

<br>
<br>
<br>

### **Checking Elements**
<br>

#### **includes()**

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

#### **every()**

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

#### **some()**

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

### **Get Modified Array Copy**
<br>

#### **filter()**

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

#### **map()**

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

#### **reduce()**

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
<br>

### **Multifunctional Manipulation Methods**
<br>

#### **splice()**

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

#### **copyWithin()**

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

#### **slice()**

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
<br>

### **Other Methods**
<br>

#### **concat()**

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

#### **join()**

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

#### **fill()**

* set all elements in a specified range to a static value
* modifies array

<br>

Parameters:
* value
* start
    * optional zero-based start index of range to copy
    * if undefined, range starts at index 0
* end
    * optional end index of range (first element to not include in copy)
    * if undefined, range ends at array.length

<br>

```javascript
let array = [1, 2, 3, 4];
array.fill(2);                        // array = [2, 2, 2, 2]

array = [1, 2, 3, 4];
array.fill(8, 1);                     // array = [1, 8, 8, 8]

array = [1, 2, 3, 4];
array.fill(8, 1, 3);                  // array = [1, 8, 8, 4]
```

<br>
<br>

#### **flat()**

* returns new array with elements of sub arrays concatenated up to specified depth

<br>

Parameters:
* depth

<br>

```javascript
const array1 = [1, 2, [3, 4], 5];
array1.flat();                                      // return [1, 2, 3, 4, 5]

const array2 = [1, [2, 3, [4, 5, [6, 7]]]];
array2.flat(1);                                     // return [1, 2, 3, Array(3)]
array2.flat(2);                                     // return [1, 2, 3, 4, 5, Array(2)]
array2.flat(Infinity);                              // return [1, 2, 3, 4, 5, 6, 7]
```