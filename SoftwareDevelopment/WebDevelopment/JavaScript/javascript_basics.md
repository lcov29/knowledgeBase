# **JavaScript Basics**

<br>

## **Table Of Contents**
<br>

- [**JavaScript Basics**](#javascript-basics)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Strict Mode**](#strict-mode)
  - [**Basic Input And Output**](#basic-input-and-output)
  - [**Variables and Constants**](#variables-and-constants)
  - [**Data Types**](#data-types)
    - [**Number**](#number)
    - [**String**](#string)
    - [**Boolean**](#boolean)
      - [**Usage of boolean operators for nonboolean operands**](#usage-of-boolean-operators-for-nonboolean-operands)
    - [**Object**](#object)
    - [**Symbol**](#symbol)
    - [**Null**](#null)
    - [**Undefined**](#undefined)
  - [**Array**](#array)
  - [**Map**](#map)
  - [**Set**](#set)
  - [**Date**](#date)
  - [**Operators**](#operators)
    - [**Comparison**](#comparison)
    - [**Logical Assignment Operators**](#logical-assignment-operators)
      - [**Logical Or Assignment**](#logical-or-assignment)
      - [**Logical And Assignment**](#logical-and-assignment)
      - [**Logical Nullish Assignment**](#logical-nullish-assignment)
      - [**Ternary Operator**](#ternary-operator)
    - [**Type Determination**](#type-determination)
  - [**If-Statements**](#if-statements)
  - [**Switch-Case-Statements**](#switch-case-statements)
  - [**Loops**](#loops)
    - [**For Loop**](#for-loop)
    - [**For In Loop**](#for-in-loop)
    - [**For Of Loop**](#for-of-loop)
    - [**Head-Controlled While Loop**](#head-controlled-while-loop)
    - [**Foot-Controlled While Loop**](#foot-controlled-while-loop)
    - [**Break and Continue Keyword**](#break-and-continue-keyword)
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

JavaScript is an interpreted language.

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
<br>

## **Variables and Constants**
<br>

```javascript
let myVariable1;                // declaration without assignment (default value: undefined)
let myVariable2 = 'value';

const MY_CONSTANT = 'value';  
```
Variables and Constants are case sensitive.

<br>

Rules for naming variables and constants:
* start with character, underscore (_) or dollar sign ($)
* rest can contain characters, numbers, underscores(_) and dollar signs ($)

<br>
<br>
<br>
<br>

## **Data Types**
<br>

JavaScript has a dynamic type system (loose typing).

|Type           |Description                                            |
|:--------------|:------------------------------------------------------|
|number         |stored as 64-bit double precision floating point number|
|string         |                                                       |
|boolean        |                                                       |
|object         |collection of key-value pairs                          |
|symbol         |used to define unique and immutable values             |
|null           |represent empty object                                 |
|undefined      |default value of uninitialized variable                |

<br>
<br>
<br>

### **Number**

* Numbers are stored as 64-bit double precision floating point numbers.
* Integers are accurate up to 15 digits.
* Maximum number of decimals is 17
* Floating point arithmetic can be unprecise
* Invalid calculations return _NaN_  (**N**ot **a** **N**umber)

<br>

```javascript
// decimal system (base 10)
let number1 = 24;
let number2 = 3.14;
let number3 = -4.2;
let number4 = 1_000;        // number 1000 with separator to enhance readability


// binary system (base 2, prefix 0b, digits 0 and 1)
let number5 = 0b01011;
let number6 = 0b1101_0100;


// octal system (base 8, prefix 0, digits 0 - 7)
let number7 = 011147;


// hexadecimal system (base 16, prefix 0x, digits 0 - 9 and A - F)
let number8 = 0xF;
let number9 = 0xAF_BC_C0;
```

<br>

Number Properties:
```javascript
Number.MIN_VALUE;
Number.MAX_VALUE;
Number.NEGATIVE_INFINITY;
Number.POSITIVE_INFINITY;
```

<br>

Examples:
```javascript
// Integer Inaccuracy
let x = 999999999999999;                    // => 999999999999999   (15 digits)
let y = 9999999999999999;                   // => 10000000000000000 (16 digits)

// Unprecise floating point arithmetic
let x = 0.2 + 0.1;                          // => 0.30000000000000004
let y = (0.2*10 + 0.1*10) / 10;             // => 0.3
```

<br>

|Operator|Description    |
|:------:|:--------------|
|+       |addition       |
|-       |subtraction    |
|*       |multiplication |
|/       |division       |
|%       |modulo         |
|**      |power of       |
|++      |increment value|
|--      |decrement value|

<br>
<br>
<br>

### **String**

Strings are similar to arrays.

<br>

```javascript
let string1 = "String1";
let string2 = 'String2';

let string3 = 'Hello';
let string4 = `${string3} World`;
```

<br>

See [JavaScript Strings](./javascript_string.md)  
See [JavaScript Regular Expressions](./javascript_regex.md)

<br>
<br>
<br>

### **Boolean**

```javascript
let isTrue = true;
let isFalse = false;
```

<br>

|Operator|Description|
|:------:|:----------|
|&&      |logical and|
|\|\|    |logical or |
|!       |negation   |

<br>
<br>

#### **Usage of boolean operators for nonboolean operands**
<br>

Nonboolean operands are evaluated as falsy for the following values:

|Value     |Description                                   |
|:---------|:---------------------------------------------|
|false     |                                              |
|0         |number zero in all variants like 0.0, 0x0 etc.|
|-0        |number negative zero in all variants          |
|0n        |BigInt zero                                   |
|""        |empty string                                  |
|''        |empty string                                  |
|``        |empty string                                  |
|null      |                                              |
|undefined |                                              |
|NaN       |not a number                                  |

<br>
<br>
<br>

**Logical And**
* returns first operand if evaluated as **falsy**
* otherwise returns second operand

```javascript
false && 'string';      // false

0 && 'string';          // 0, because 0 is falsy

true && 'string'        // string

15 && 'string'          // string, because 15 is not falsy
```

<br>
<br>

**Logical Or**
* returns first operand if evaluated as **truthy** (= not falsy)
* otherwise returns second operand

```javascript
false || 'string';      // string

0 || 'string';          // string, because 0 is falsy

true || 'string';       // true

15 || 'string';         // 15, because it is truthy
```

<br>
<br>

**Logical Negation**
* inverts evaluated value (truthy / falsy)

<br>
<br>

**Nullish Coalescing Operator**
* first operand is null or undefined -> return second operand
* first operand is not null and not undefined -> return first operand

```javascript
null ?? 'string';       // string

undefined ?? 'string';  // string

13 ?? 'string';         // 13

false ?? 'string';      // false
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

### **Symbol**

```javascript
let sym1 = Symbol();
let sym2 = Symbol('description');

console.log(sym1);      // Symbol()
console.log(sym2);      // Symbol(description)
```

<br>
<br>
<br>

### **Null**

* represents an empty object

<br>
<br>
<br>

### **Undefined**

* represents an uninitialized variable
  
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

## **Operators**
<br>
<br>

### **Comparison**

|Operator|Description                           |
|:-------|:-------------------------------------|
|===     |operands are equal in value and type  |
|!==     |operands are unequal in value or type |
|<       |lesser than                           |
|>       |greater than                          |
|<=      |lesser than or equal                  |
|>=      |greater than or equal                 |

<br>
<br>

### **Logical Assignment Operators**

<br>

#### **Logical Or Assignment**
* if first operand is falsy, assign value of second operand
```javascript
let operand1 = 0;
let operand2 = 'string';

operand1 ||= operand2;      // operand1 -> 'string'
operand2 ||= operand1;      // operand2 -> 'string'
```

<br>
<br>

#### **Logical And Assignment**
* if first operand is truthy, assign value of second operand
```javascript
let operand1 = 1;
let operand2 = 0;

operand1 &&= operand2;      // operand1 -> 0
operand2 &&= operand1;      // operand2 -> 0
```

<br>
<br>

#### **Logical Nullish Assignment**
* if first operand is null or undefined, assign value of second operand
```javascript
let operand1 = null;
let operand2 = 'string';

operand1 ??= operand2;      // operand1 -> 'string'
operand2 ??= operand1;      // operand2 -> 'string'
```

<br>
<br>

#### **Ternary Operator**
* returns second or third operator based on the evaluation of the first operand
* \<condition\> ? <if_value> : <else_value>
```javascript
result = (1 > 0) ? 'A' : 'B';       // result -> A
result = (1 < 0) ? 'A' : 'B';       // result -> B
```

<br>
<br>

### **Type Determination**
```javascript
// instanceof
let myObj = {};
myObj instanceof Object;        // true
myObj instanceof Number;        // false

// typeof
typeof 1;                       // number
typeof 'foo';                   // string
```

<br>
<br>
<br>
<br>

## **If-Statements**
<br>

```javascript
if (condition) {
    // code
}


if (condition) {
    // code
} else {
    // code
}


if (condition1) {
    // code
} else if (condition2) {
    // code
} else if (condition3) {
    // code
} 


if (condition1) {
    // code
} else if (condition2) {
    // code
} else {
    //code
}
```

<br>
<br>
<br>
<br>

## **Switch-Case-Statements**
<br>

```javascript
switch(expression) {
    case value1:
        // code
        break;
    case value2:
        // code
        break;
    // ...
    case valueN:
        // code
        break;
    default:
        // code to execute if no case was executed
}


switch(expression) {
    case value1:
        // code
        break;
    case value2:
    case value3:
    case value4:
        // code
        break;
    default:
        // code to execute if no case was executed
}
```

<br>
<br>
<br>
<br>

## **Loops**
<br>
<br>

### **For Loop**

```javascript
for (let i = 0; i < 15; i++) {
    // code
}
```
<br>
<br>

### **For In Loop**
* iterates over all enumberable **properties** of an object that are keyed by strings

```javascript
// Iterate through object properties
let myObject = { property1: 1,property2: 2, property3: 3 };

for (let x in myObject) {
  console.log(myObject[x]);
}


// Iterate through array properties (not recommended when index order is important)
let myArray = [3, 45, 1, 7, 25];

for (let x in myArray) {
    console.log(myArray[x]);
}
```

<br>
<br>

### **For Of Loop**
* iterates over all **values** of an iterable object

```javascript
let myArray = ['entry1', 'entry2', 'entry3'];

for (let entry of myArray) {
  console.log(entry);
}
```

<br>
<br>

### **Head-Controlled While Loop**
```javascript
while (expression) {
    // code
}
```

<br>
<br>

### **Foot-Controlled While Loop**
```javascript
do {
    // code
} while (expression)
```

<br>
<br>

### **Break and Continue Keyword**
<br>

|Keyword               |Description                                        |
|:---------------------|:--------------------------------------------------|
|continue              |continue with next iteration                       |
|continue \<labelname\>|continue execution ofcodeblock with label labelname|
|break                 |abort loop                                         |
|break \<labelname\>   |break execution of codeblock with label labelname  |

<br>

Examples:

```javascript
// write all even number between 1 and 10 to console
for (let i = 1; i <= 10; i++) {
    if (i % 2 === 1) { continue; }
    console.log(i);
}


// write all numbers between 1 and 10 to console until first even number appears
for (let i = 1; i <= 10; i++) {
    if (i % 2 === 0) { break; }
    console.log(i);
}


// continue outer loop from inner loop
myLabel:
for (let i = 1; i <= 10; i++) {
	for (let j = 1; j <= 10; j++) {
		console.log(`(${i}.${j})`);
		if (i === 2 && j === 6) {
			break myLabel;
		}
	}
}


// break outer loop from inner loop
myLabel:
for (let i = 1; i <= 10; i++) {
	for (let j = 1; j <= 10; j++) {
		console.log(`(${i}.${j})`);
		if (i === 2 && j === 6) {
			break myLabel;
		}
	}
}
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

See [Document Object Model](../WebAPI/document_object_model_api.md)

<br>
<br>
<br>
<br>

## **DOM Event Handling**
<br>

See [DOM Event Handling](../WebAPI/dom_event_api.md)

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