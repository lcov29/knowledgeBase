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
  - [**Sorting**](#sorting)
    - [**sort()**](#sort)
    - [**reverse()**](#reverse)
  - [**Searching**](#searching)
    - [**indexOf()**](#indexof)
    - [**lastIndexOf()**](#lastindexof)
    - [**includes()**](#includes)
    - [**find()**](#find)
  - [**Other Methods**](#other-methods)
  
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

### **find()**

* returns first element that matches the custom findFunction

```javascript

```

<br>

```javascript

```

<br>
<br>
<br>

## **Other Methods**
<br>


