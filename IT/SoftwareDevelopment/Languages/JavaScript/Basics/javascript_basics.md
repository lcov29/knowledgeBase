# **JavaScript Basics**

<br>

## **Table Of Contents**
<br>

- [**JavaScript Basics**](#javascript-basics)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Strict Mode**](#strict-mode)
  - [**Basic Input And Output**](#basic-input-and-output)
    - [**Object**](#object)
  - [**Array**](#array)
  - [**Map**](#map)
  - [**Set**](#set)
  - [**Date**](#date)
  - [**Type Determination**](#type-determination)
  - [**Function**](#function)
  - [**DOM Tree Manipulation**](#dom-tree-manipulation)
  - [**DOM Event Handling**](#dom-event-handling)
  - [**Error Handling**](#error-handling)
    - [**Catch Errors**](#catch-errors)
    - [**Throw Errors**](#throw-errors)
  - [**Debugging**](#debugging)


<br>
<br>
<br>

## **General**
<br>

JavaScript is asserted to be an interpreted language, but is typically compiled on the fly ("Just-In-Time Compiler").

MIME-Type (**M**ultipurpose **I**nternet **M**ail **E**xtension) for JavaScript: application/javascript

<br>
<br>
<br>
<br>

## **Strict Mode**
<br>

example.js
```javascript
'use strict';       // activate strict mode for entire file

// File Content
```

example.js
```javascript
// File Content

'use strict';       // acticate strict mode for function foo()
function foo() {}
```

<br>
<br>
<br>
<br>

## **Basic Input And Output**
<br>

```javascript
let input = prompt('Your value:');      // basic input dialog (returns input)
let bool = confirm('Proceed?');         // basic confirmation dialog (returns boolean)
alert(message);                         // basic display dialog for message
console.log(message);                   // print message to console
```

<br>
<br>
<br>

### **Object**

* collection of key-value pairs

<br>

Example:
```javascript
let obj = { 
    key1: 'value';
    key2: 42.12;
    foo: function() {
        console.log(this.key1);
    }
}
```

<br>

See [JavaScript Objects](./javascript_object.md)

<br>
<br>
<br>
<br>

## **Array**
<br>

Arrays are dynamic and loosely typed, so they can grow or shrink and can contain element of different types.

<br>

```javascript
let array = ['element1', 34 , true];    // array definition as literal with different element types

array.length;                           // return number of elements
```

<br>

See [JavaScript Arrays](./javascript_array.md)

<br>
<br>
<br>
<br>

## **Map**
<br>

Maps are collections of key-value pairs that store the pairs in the order of insertion.

<br>

```javascript
let map = new Map();
map1.set('key1', 'value1');
map1.set(2, 'value2');

map.size;                       // returns 2
map.get('key1');                // returns 'value1'
map.delete(2);
map.size;                       // returns 1
map.set('key1', 'newValue');    // returns 'newValue'
```

<br>

See [JavaScript Maps](./javascript_map.md)

<br>
<br>
<br>
<br>

## **Set**
<br>

* Sets are collections of unique elements of any type in order of insertion
* Attempts to add duplicates are ignored


<br>

```javascript
let set = new Set();
set.add('value1');
set.add('value2');

set.size;                       // returns 2
set.has('value1');              // returns true
map.delete('value1');
map.size;                       // returns 1
```

<br>

See [JavaScript Sets](./javascript_set.md)

<br>
<br>
<br>
<br>

## **Date**
<br>

Represents a single point in time as milliseconds since 1 January 1970 UTC.

```javascript
let date = new Date('2022-05-11T09:39:00');
date.getTime();                                     // returns 1652254740000
date.toString();                                    // "Wed May 11 2022 09:39:00 GMT+0200 (Central European Summer Time)"
```

See [JavaScript Date](./javascript_date.md)

<br>
<br>
<br>
<br>

## **Type Determination**
```javascript
// instanceof
let myObj = {};
myObj instanceof Object;        // true
myObj instanceof Number;        // false
```

<br>
<br>
<br>
<br>

## **Function**
<br>

* Functions can be though of as a subtype of object
* Functions can be assigned to a variable
* Functions can be used as arguments for other functions
* Functions can return functions

<br>

```javascript
// function declaration
function functionName(parameter) { /* implementation */ }


// function expression
const callName = function optionalFunctionName(parameter) { /* implementation */ }


// arrow function
(x, y, z) => { /* code */ }
```

<br>

See [JavaScript Functions](./javascript_function.md)

<br>
<br>
<br>
<br>

## **DOM Tree Manipulation**
<br>

See [Document Object Model](../../WebDevelopment/WebAPI/document_object_model_api.md)

<br>
<br>
<br>
<br>

## **DOM Event Handling**
<br>

See [DOM Event Handling](../../WebDevelopment/WebAPI/dom_event_api.md)

<br>
<br>
<br>
<br>

## **Error Handling**
<br>

* throw errors with keyword throw
* handle runtime error with try-catch-statement
  * only one catch statement allowed
  * exception parameter for catch statement is optional
  * optional finally block

<br>
<br>

### **Catch Errors**
```javascript
try {
    // code
} catch (error) {
    // code to execute if an error is thrown in try block (with error object as parameter)
}



try {
    // code
} catch {
    // code to execute if an error is thrown in try block
}



try {
    // code
} catch {
    // code to execute if an error is thrown in try block
} finally {
    // code to execute regardless of whether an error is thrown or catched
}
```

<br>
<br>

### **Throw Errors**

<br>

|Error Type    |Description                                    |
|:-------------|:----------------------------------------------|
|Error         |Base Error Type                                |
|RangeError    |Value out of range                             |
|ReferenceError|Called variable does not exist                 |
|TypeError     |Call of variable or parameter with invalid type|
|URIError      |Error with URL                                 |

<br>

**Properties of error object:**

* name
* message

<br>

```javascript
throw new Error('message');
throw new RangeError('message');
throw new RangeError('message');
throw new TypeError('message');
throw new URIError('message');
```

<br>
<br>
<br>
<br>

## **Debugging**

<br>

Defining a breakpoint for the debugger of the browser:
```javascript
debugger;
```