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
    - [**Access Elements**](#access-elements)
      - [**Array\[\]**](#array)
      - [**at()**](#at)
    - [**Update Elements**](#update-elements)
      - [**Array\[\]**](#array-1)
      - [**with()**](#with)
      - [**fill()**](#fill)
    - [**Add Elements**](#add-elements)
      - [**push()**](#push)
      - [**unshift()**](#unshift)
    - [**Remove Elements**](#remove-elements)
      - [**pop()**](#pop)
      - [**shift()**](#shift)
    - [**Iterate Over Elements**](#iterate-over-elements)
      - [**For Loop**](#for-loop)
      - [**For-Of Loop**](#for-of-loop)
      - [**For-In Loop**](#for-in-loop)
      - [**forEach()**](#foreach)
    - [**Sort Elements**](#sort-elements)
      - [**sort()**](#sort)
      - [**toSorted()**](#tosorted)
      - [**reverse()**](#reverse)
      - [**toReversed()**](#toreversed)
    - [**Search Elements**](#search-elements)
      - [**indexOf()**](#indexof)
      - [**lastIndexOf()**](#lastindexof)
      - [**find()**](#find)
      - [**findLast()**](#findlast)
      - [**findIndex()**](#findindex)
      - [**findLastIndex()**](#findlastindex)
    - [**Check Elements**](#check-elements)
      - [**includes()**](#includes)
      - [**every()**](#every)
      - [**some()**](#some)
    - [**Modify Array Copy**](#modify-array-copy)
      - [**filter()**](#filter)
      - [**map()**](#map)
      - [**reduce()**](#reduce)
      - [**slice()**](#slice)
      - [**copyWithin()**](#copywithin)
    - [**Multifunctional Manipulation Methods**](#multifunctional-manipulation-methods)
      - [**splice()**](#splice)
      - [**toSpliced()**](#tospliced)
    - [**Other Methods**](#other-methods)
      - [**concat()**](#concat)
      - [**join()**](#join)
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

**4. Array index is zero-based**

```javascript
const array = [1, 2, 3];

array[0];     // 1
array[1];     // 2
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

### **Access Elements**
<br>
<br>

#### **Array[]**

Returns element at specified index.

```javascript
array[index]
```

<br>

```javascript
const array = [1, 2, 3];

array[0];     // 1
array[2];     // 3
```

<br>
<br>

#### **at()**

Returns element at specified index. Allows selection from end of array via negative index.

```javascript
array.at(index)
```

<br>

```javascript
const array = [1, 2, 3, 4, 5];

array.at(0);    // 1
array.at(2);    // 3

array.at(-1);   // 5
array.at(-3);   // 3
```

<br>
<br>
<br>

### **Update Elements**
<br>

#### **Array[]**

Updates element at specified index.

```javascript
array[index] = newValue
```

<br>

```javascript
const array = [1, 2, 3, 4];

array[1] = 8;   // [1, 8, 3, 4]
```

<br>
<br>

#### **with()**

Returns a shallow array copy with updated element at specified index. Allows selection from end of array via negative index.

```javascript
array.with(index, newValue)
```

<br>

```javascript
const array = [1, 2, 3, 4];

array.with(2, 8);       // returns new array [1, 2, 8, 4] 

array.with(-1, 'foo');  // returns new array [1, 2, 3, 'foo']
```

<br>
<br>

#### **fill()**

Replaces all elements in a specified range `[start, end]` with a specified value.

```javascript
array.fill(value, ?startIndex, ?endIndex)
```

Parameters:
- `value`: Value to replace the array elements with.
- `startIndex`: Negative index counts from the end of the array. Default: `0`.
- `endIndex`: Not included in range. Negative index counts from the end of the array. Default: `array.length`

<br>

```javascript
const array = [1, 2, 3, 4];

array.fill('foo');

// array = ['foo', 'foo', 'foo', 'foo']
```

<br>

```javascript
const array = [1, 2, 3, 4];

array.fill('foo', 2);

// array = [1, 2, 'foo', 'foo']
```

<br>

```javascript
const array = [1, 2, 3, 4];

array.fill('foo', 0, 3);

// array = ['foo', 'foo', 'foo', 4]
```

<br>
<br>
<br>

### **Add Elements**
<br>

#### **push()**

Adds one or more elements to the **end** of an array and returns the new array length.

```javascript
array.push(element1, ?element2, ..., ?elementN)
```

<br>

```javascript
const array = [1, 2];

array.push('foo'); 

// returns 3
// array [1, 2, 'foo']
```

<br>

```javascript
const array = [1, 2];

const newLength = array.push(3, 4, 5);

// newLength: 5
// array [1, 2, 3, 4, 5]
```

<br>
<br>

#### **unshift()**

Adds one or more elements to the **start** of an array and returns the new array length.

```javascript
array.unshift(element1, ?element2, ..., ?elementN)
```

<br>

```javascript
const array = [1, 2];

array.unshift('foo');

// returns 3
// array ['foo', 1, 2]
```

<br>

```javascript
const array = [1, 2];

const newLength = array.unshift(3, 4, 5);

// newLength: 5
// array [3, 4, 5, 1, 2]
```

<br>
<br>
<br>

### **Remove Elements**
<br>

#### **pop()**

Removes and returns **last** array element. Returns `undefined` for empty arrays.

```javascript
array.pop()
```

<br>

```javascript
const array = [1, 2, 'foo'];

array.pop();

// returns 'foo'
// array [1, 2]
```

<br>

```javascript
const array = [];

array.pop();

// returns undefined
// array []
```

<br>
<br>

#### **shift()**

Removes and returns **first** array element. Returns `undefined` for empty arrays.

```javascript
array.shift()
```

<br>

```javascript
const array = ['foo', 1, 2];

array.shift();

// returns 'foo'
// array [1, 2]
```

<br>

```javascript
const array = [];

array.shift();

// returns undefined
// array []
```

<br>
<br>
<br>

### **Iterate Over Elements**
<br>

#### **For Loop**

```javascript
const array = ['A', 'B', 'C'];

for (let i = 0; i < array.length; i++) {
  console.log(array[i]);
}

// 'A'
// 'B'
// 'C'
```

<br>
<br>

#### **For-Of Loop**

Loop over array elements.

```javascript
const array = ['A', 'B', 'C'];

for (let element of array) {
  console.log(element);
}

// 'A'
// 'B'
// 'C'
```

<br>
<br>

#### **For-In Loop**

Loop over array indexes.

```javascript
const array = ['A', 'B', 'C'];

for (let index in array) {
  console.log(index);
}

// 0
// 1
// 2
```

<br>
<br>

#### **forEach()**

Executes specified function once for every array element.

```javascript
array.forEach((element, ?index, ?array) => { code }, ?thisArg)
```

Function parameters:
- `element`
- `index`
- `array`: reference to array the function was called upon

Optional parameter:
- `thisArg`: reference to use as `this` within the function

<br>

```javascript
const array = ['A', 'B', 'C'];

array.forEach((element) => console.log(element));

// 'A'
// 'B'
// 'C'
```

<br>

```javascript
const array = ['A', 'B', 'C'];

array.forEach((element, index) => console.log(`(${element}, ${index})`));

// (A, 0)
// (B, 1)
// (C, 2)
```

<br>

```javascript
const array = ['A', 'B', 'C'];

array.forEach((element, index) => console.log(`(${element}, ${index}, ${array})`));

// (A, 0, ['A', 'B', 'C'])
// (B, 1, ['A', 'B', 'C'])
// (C, 2, ['A', 'B', 'C'])
```

<br>
<br>
<br>

### **Sort Elements**
<br>

#### **sort()**

Sorts array elements in ascending order. An optional compare function can be specified to to implement a custom sorting order.

```javascript
array.sort(?(firstElement, secondElement) => { implementation })
```

<br>

| compareFunction(firstElement, secondElement) | Sorting Order                                             |
| :------------------------------------------: | :-------------------------------------------------------- |
|                     > 0                      | `secondElement`, `firstElement`                           |
|                     <= 0                     | `firstElement`, `secondElement`                           |
|                    === 0                     | keep original order of `firstElement` and `secondElement` |

<br>

```javascript
const array = [3, 6, 3, 2, 10, 37];

array.sort();

// array = [10, 2, 3, 3, 37, 6]
```

<br>

```javascript
const array = ['x', 'hello', 'a', 't'];

array.sort();

// array = [a, hello, t, x]
```

<br>

```javascript
const array = [3, 6, 3, 2, 10, 37];

array.sort((a, b) => a - b);

// array = [2, 3, 3, 6, 10, 37]
```

<br>

```javascript
const array = [3, 6, 3, 2, 10, 37];

array.sort((a, b) => b - a);

// array = [37, 10, 6, 3, 3, 2]
```

<br>
<br>

#### **toSorted()**

Returns shallow copy of array sorted in ascending order. An optional compare function can be specified to to implement a custom sorting order.

```javascript
array.toSorted(?(firstElement, secondElement) => { implementation })
```

<br>

| compareFunction(firstElement, secondElement) | Sorting Order                                             |
| :------------------------------------------: | :-------------------------------------------------------- |
|                     > 0                      | `secondElement`, `firstElement`                           |
|                     <= 0                     | `firstElement`, `secondElement`                           |
|                    === 0                     | keep original order of `firstElement` and `secondElement` |

<br>

```javascript
const array = [3, 6, 3, 2, 10, 37];

const sortedArray = array.toSorted();

// array = [3, 6, 3, 2, 10, 37]
// sortedArray = [10, 2, 3, 3, 37, 6]
```

<br>

```javascript
const array = ['x', 'hello', 'a', 't'];

const sortedArray = array.toSorted();

// array = ['x', 'hello', 'a', 't']
// sortedArray = [a, hello, t, x]
```

<br>

```javascript
const array = [3, 6, 3, 2, 10, 37];

const sortedArray = array.toSorted((a, b) => a - b);

// array = [3, 6, 3, 2, 10, 37]
// sortedArray = [2, 3, 3, 6, 10, 37]
```

<br>

```javascript
const array = [3, 6, 3, 2, 10, 37];

const sortedArray = array.toSorted((a, b) => b - a);

// array = [3, 6, 3, 2, 10, 37]
// sortedArray = [37, 10, 6, 3, 3, 2]
```

<br>
<br>

#### **reverse()**

Reverses the order of array elements.

```javascript
array.reverse();
```

<br>

```javascript
const array = [4, 34, 2, 7];

array.reverse();

// array = [7, 2, 34, 4]
```

<br>
<br>

#### **toReversed()**
<br>

Returns shallow copy of array with reversed order of elements.

```javascript
array.toReversed();
```

<br>

```javascript
const array = [4, 34, 2, 7];

const reversedArray = array.toReversed();

// array = [4, 34, 2, 7]
// reversedArray = [7, 2, 34, 4]
```

<br>
<br>
<br>

### **Search Elements**
<br>

#### **indexOf()**

Returns the index of the **first** occurrence of the specified element in the array.  
Returns `-1` if the specified element does not exist in the array.  
Search range can be modified via optional `fromIndex`.

```javascript
array.indexOf(element, ?fromIndex);
```

<br>

```javascript
const array = ['A', 'B', 'C', 'D', 'B'];

array.indexOf('B');     // 1

array.indexOf('B', 2);  // 4

array.indexOf('X');     // -1
```

<br>
<br>

#### **lastIndexOf()**

Returns the index of the **last** occurrence of the specified element in the array.  
Returns `-1` if the specified element does not exist in the array.  
Search range can be modified via optional `fromIndex` from which the array is searched **backwards**.

```javascript
array.lastIndexOf(element, ?fromIndex);
```

<br>

```javascript
const array = ['A', 'B', 'C', 'D', 'B'];

array.lastIndexOf('B');     // 4

array.lastIndexOf('B', 3);  // 1

array.lastIndexOf('X');     // -1
```

<br>
<br>

#### **find()**

Returns **first** element that matches the specified findFunction.  
Returns `undefined` when there are no matches.

```javascript
array.find((element, ?index, ?array) => { code }, ?thisArg)
```

Function parameters:
- `element`
- `index`
- `array`: reference to array the function was called upon

Optional parameter:
- `thisArg`: reference to use as `this` within the function

<br>

```javascript
const array = [10, 5, 4, 17, 3, 8];

array.find((element) => element < 5);         // 4

array.find((element) => element % 2 !== 0);   // 5

array.find((element) => element < 3);         // undefined
```

<br>
<br>

#### **findLast()**

Returns **last** element that matches the specified findFunction.  
Returns `undefined` when there are no matches.

```javascript
array.findLast((element, ?index, ?array) => { code }, ?thisArg)
```

Function parameters:
- `element`
- `index`
- `array`: reference to array the function was called upon

Optional parameter:
- `thisArg`: reference to use as `this` within the function

<br>

```javascript
const array = [10, 5, 4, 17, 3, 8];

array.findLast((element) => element < 5);     // 3

array.findLast((element) => element > 9);     // 17

array.findLast((element) => element < 3);     // undefined
```

<br>
<br>

#### **findIndex()**

Returns index of the **first** element that matches the specified findFunction.  
Returns `-1` when there are no matches.

```javascript
array.findIndex((element, ?index, ?array) => { code }, ?thisArg)
```

Function parameters:
- `element`
- `index`
- `array`: reference to array the function was called upon

Optional parameter:
- `thisArg`: reference to use as `this` within the function

<br>

```javascript
const array = [10, 5, 4, 17, 3, 8];

array.findIndex((element) => element < 5);    // 2

array.findIndex((element) => element > 9);    // 0

array.findIndex((element) => element < 3);    // -1
```

<br>
<br>

#### **findLastIndex()**

Returns index of the **last** element that matches the specified findFunction.  
Returns `-1` when there are no matches.

```javascript
array.findLastIndex((element, ?index, ?array) => { code }, ?thisArg)
```

Function parameters:
- `element`
- `index`
- `array`: reference to array the function was called upon

Optional parameter:
- `thisArg`: reference to use as `this` within the function

<br>

```javascript
const array = [10, 5, 4, 17, 3, 8];

array.findLastIndex((element) => element < 5);    // 4

array.findLastIndex((element) => element > 9);    // 3

array.findLastIndex((element) => element < 3);    // -1
```

<br>
<br>
<br>

### **Check Elements**
<br>

#### **includes()**

Returns boolean indicating whether array includes specified element.  
Search range can be modified via optional `fromIndex`. Negative `fromIndex` is calculated from the end of the array.

```javascript
array.includes(element, ?fromIndex);
```

<br>

```javascript
const array = [1, 9, 29, 3, 7, 12];

array.includes(3);        // true

array.includes(3, 4);     // false

array.includes(29, -3);   // false

array.includes(4);        // false
```

<br>
<br>

#### **every()**

Returns boolean indicating whether **all** elements of the array match the specified findFunction.

```javascript
array.every((element, ?index, ?array) => { code }, ?thisArg)
```

Function parameters:
- `element`
- `index`
- `array`: reference to array the function was called upon

Optional parameter:
- `thisArg`: reference to use as `this` within the function


<br>

```javascript
const array = [1, 9, 29, 3, 7, 12];

array.every(element => element < 30);   // true

array.every(element => element > 3);    // false
```

<br>
<br>

#### **some()**

Returns boolean indicating whether **at least one** element of the array matches the specified findFunction.

```javascript
array.some((element, ?index, ?array) => { code }, ?thisArg)
```

Function parameters:
- `element`
- `index`
- `array`: reference to array the function was called upon

Optional parameter:
- `thisArg`: reference to use as `this` within the function

<br>

```javascript
const array = [1, 9, 29, 3, 7, 12];

array.some(element => element < 3);   // true

array.some(element => element < 1);   // false
```

<br>
<br>
<br>

### **Modify Array Copy**
<br>

#### **filter()**

Returns new array containing shallow copies of all elements that match the specified findFunction.

```javascript
array.filter((element, ?index, ?array) => { code }, ?thisArg)
```

findFunction parameters:
- `element`
- `index`
- `array`: reference to array the function was called upon

Optional parameter:
- `thisArg`: reference to use as `this` within the function

<br>

```javascript
const array = [10, 5, 4, 17, 3, 8];

const filteredArray = array.filter(element => element < 8);

// array = [10, 5, 4, 17, 3, 8]
// filteredArray = [5, 4, 3]
```

<br>
<br>

#### **map()**

Returns new array containing the results of a customFunction envoked on every element of the orignal array.

```javascript
array.map((element, ?index, ?array) => { code }, [thisArg])
```

customFunction parameters:
- `element`
- `index`
- `array`: reference to array the function was called upon

Optional parameter:
- `thisArg`: reference to use as `this` within the function

<br>

```javascript
const array = [4, 3, 1, 25, 54, 93];

const mappedArray = array.map(element => element + 10);

// array = [4, 3, 1, 25, 54, 93]
// mappedArray = 14, 13, 11, 35, 64, 103]
```

<br>
<br>

#### **reduce()**

Envokes custom reducerFunction to reduce all elements of an array to a single value and return that value.

```javascript
array.reduce((previousValue, currentValue, ?currentIndex, ?array) => { code }, ?initialValue)
```

<br>

Parameters reduceFunction:

| Parameter       | Description                                                                                                  |
| :-------------- | :----------------------------------------------------------------------------------------------------------- |
| `previousValue` | value of previous call of reducer function: Initial value: `initialValue` if specified, otherwise `array[0]` |
| `currentValue`  | value of current element. Initial value: `array[0]` if `initialValue` is specified, otherwise `array[1]`     |
| `currentIndex`  | index of current element. Initial value: `0` if `initialValue` is specified, otherwise `0`                   |
| `array`         |

<br>

Optional parameter:
- `thisArg`: reference to use as `this` within the function

<br>

```javascript
const array = [1, 2, 3, 4, 5];


const total = array.reduce((sum, currentValue) => sum + currentValue);      // 15


const maximum = array.reduce((a, b) => Math.max(a, b));                     // 5
```

<br>

```javascript
const array = ['A', 'B', 'C', 'B', 'A', 'A']

const countObj = array.reduce((countObject, element) => {
  if (element in countObject) {
    countObject[element]++;
  } else {
    countObject[element] = 1;
  }
  return countObject;
}, {}); 

// { A: 3, B: 2, C: 1 }
```

<br>
<br>

#### **slice()**

Returns a shallow copy of an array, optionally restricted to a range `[start, end)`.

```javascript
array.slice(?startIndex, ?endIndex)
```

Parameters:
- `startIndex`: Default `0`.
- `endIndex`: Index of first element not to include in range. Negative index is counted as offset from default `array.length`.

<br>

```javascript
const array = ['A', 'B', 'C', 'D', 'E', 'F'];

const slicedArray = array.slice(2, 5);

// array = ['A', 'B', 'C', 'D', 'E', 'F'];
// slicedArray = ['C', 'D', 'E']
```

<br>

```javascript
const array = ['A', 'B', 'C', 'D', 'E', 'F'];

const slicedArray = array.slice(1, -3);

// array = ['A', 'B', 'C', 'D', 'E', 'F'];
// slicedArray = ['B', 'C']
```

<br>

```javascript
const array = ['A', 'B', 'C', 'D', 'E', 'F'];

const slicedArray = array.slice();

// array = slicedArray = ['A', 'B', 'C', 'D', 'E', 'F'];
```

<br>
<br>

#### **copyWithin()**

Shallow copies part `[start, end)` of an array to another location in the same array. The element at the target location are replaced, so that the length of the array does not change.

```javascript
array.copyWithin(targetIndex, startIndex, ?endIndex);
```

Parameters:
- `targetIndex`: First index of the target area where the copied range from `startIndex` should be inserted. Negative index is counted from end of the array.
- `startIndex`: Start of element range to copy from. Negative index is counted from end of the array.
- `endIndex`: End of element range (exclusive) to copy from. Negative index is counted from end of the array.

<br>

```javascript
const array = ['A', 'B', 'C', 'D']

array.copyWithin(0, 2);

// array = ['C', 'D', 'C', 'D']
```

<br>

```javascript
const array = ['A', 'B', 'C', 'D']

array.copyWithin(0, 2, 3);

// array = ['C', 'B', 'C', 'D']
```

<br>

```javascript
const array = ['A', 'B', 'C', 'D'];

array.copyWithin(-1);

// array = ['A', 'B', 'C', 'A']
```

<br>
<br>
<br>

### **Multifunctional Manipulation Methods**
<br>

#### **splice()**

Change array content by **adding**, **removing** or **replacing** elements.  
Returns an array containing all deleted elements.

```javascript
array.splice(startIndex, ?deleteCount, ?element1, ... ?elementN)
```

Parameters:
- `startIndex`: Index at which modification should start. Negative index counts from end of the array.
- `deleteCount`: Number of elements to deleted starting from `startIndex`. Default: `Infinity`.
- `itemN`: Element to add to the array starting from `startIndex`.

<br>

**Add Elements**

```javascript
const array = ['A', 'B', 'C', 'D'];

array.splice(1, 0, 'X', 'Y');

// returns []
// array = ['A', 'X', 'Y', 'B', 'C', 'D']
```

<br>

**Remove Elements**

```javascript
const array = ['A', 'B', 'C', 'D'];

array.splice(0, 2);

// returns ['A', 'B']
// array = ['C', 'D']
```

<br>

**Replace Elements**

```javascript
const array = ['A', 'B', 'C', 'D'];

array.splice(2, 2, 'X', 'Y');

// returns ['C', 'D']
// array = ['A', 'B', 'X', 'Y']
```

<br>

**Truncate Array And Add Elements**

```javascript
const array = ['A', 'B', 'C', 'D'];

array.splice(0, Infinity, 'X', 'Y');

// returns ['A', 'B', 'C', 'D']
// array = ['X', 'Y']
```

<br>
<br>

#### **toSpliced()**

Returns manipulated array copy with **added**, **remoded** or **replaced** elements.

```javascript
array.toSpliced(startIndex, ?deleteCount, ?element1, ... ?elementN)
```

Parameters:
- `startIndex`: Index at which modification should start. Negative index counts from end of the array.
- `deleteCount`: Number of elements to deleted starting from `startIndex`. Default: `Infinity`.
- `itemN`: Element to add to the array starting from `startIndex`.

<br>

**Add Elements**

```javascript
const array = ['A', 'B', 'C', 'D'];

const splicedArray = array.toSpliced(1, 0, 'X', 'Y');

// array = ['A', 'B', 'C', 'D'];
// splicedArray = ['A', 'X', 'Y', 'B', 'C', 'D']
```

<br>

**Remove Elements**

```javascript
const array = ['A', 'B', 'C', 'D'];

const splicedArray = array.toSpliced(0, 2);

// array = ['A', 'B', 'C', 'D'];
// splicedArray =  ['C', 'D']
```

<br>

**Replace Elements**

```javascript
const array = ['A', 'B', 'C', 'D'];

const splicedArray = array.toSpliced(2, 2, 'X', 'Y');

// array = ['A', 'B', 'C', 'D'];
// splicedArray = ['A', 'B', 'X', 'Y']
```

<br>

**Truncate Array And Add Elements**

```javascript
const array = ['A', 'B', 'C', 'D'];

const splicedArray = array.toSpliced(0, Infinity, 'X', 'Y');

// array = ['A', 'B', 'C', 'D'];
// splicedArray = ['X', 'Y']
```

<br>
<br>
<br>

### **Other Methods**
<br>

#### **concat()**

Returns new array containing shallow copies of all given arrays and values.

```javascript
array.concat(value1, ..., valueN)
```

<br>

```javascript
const array1 = ['A', 'B', 'C', 'D'];
const array2 = ['foo', 'bar'];

const concatArray = array1.concat(array2);

// array1 = ['A', 'B', 'C', 'D']
// array2 = ['foo', 'bar']
// concatArray = ['A', 'B', 'C', 'D', 'foo', 'bar']
```

<br>

```javascript
const array1 = ['A', 'B', 'C', 'D'];
const array2 = ['foo', 'bar'];
const array3 = [1, 2];

const concatArray = array1.concat(array2, array3);

// array1 = ['A', 'B', 'C', 'D']
// array2 = ['foo', 'bar']
// array3 = [1, 2]
// concatArray = ['A', 'B', 'C', 'D', 'foo', 'bar', 1, 2]
```

<br>

```javascript
const array1 = ['A', 'B', 'C', 'D'];
const array2 = ['foo', 'bar'];

const concatArray = array1.concat(array2, 'X', 1, 'Z');

// array1 = ['A', 'B', 'C', 'D']
// array2 = ['foo', 'bar']
// concatArray = ['A', 'B', 'C', 'D', 'foo', 'bar', 'X', 1, 'Z']
```

<br>
<br>

#### **join()**

Returns a string containing all elements of the array separated by the specified separator string (Default: `,`).

```javascript
array.join(?separator)
```

<br>

```javascript
const array = ['f', 'o', 'o'];

array.join();         // f,o,o

array.join('---');    // f---o---o
```

<br>
<br>

#### **flat()**

Returns new array with elements of sub-arrays concatenated up to the specified depth.

```javascript
array.flat(?depth)
```

Parameter:
- `depth`: Number of levels of the nested array that should be flattended. Default: `1`.

<br>

```javascript
const array = [1, 2, [3, 4], 5];

const flatArray = array.flat(); 

// array = [1, 2, [3, 4], 5]
// flatArray = [1, 2, 3, 4, 5]
```

<br>

```javascript
const array = [1, [2, 3, [4, 5, [6, 7]]]];

const flatArray = array.flat(2); 

// array = [1, [2, 3, [4, 5, [6, 7]]]]
// flatArray = [1, 2, 3, 4, 5, [6, 7]]
```

<br>

```javascript
const array = [1, [2, 3, [4, 5, [6, 7]]]];

const flatArray = array.flat(Infinity); 

// array = [1, [2, 3, [4, 5, [6, 7]]]]
// flatArray = [1, 2, 3, 4, 5, 6, 7]
```