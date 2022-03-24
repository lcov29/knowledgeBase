# **JavaScript**

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

### **Strings**

```javascript
let string1 = "String1";
let string2 = 'String2';

// escaping
let string3 = 'Example \"string\"';

// template string
let string4 = 'Hello';
let string5 = `${string4} World`;

// template string over multiple lines (linebreaks are displayed)
let string6 = `multi

line

string
`;      

// concatenation of strings
let string1 += string2;
let string6 = string2 + string3;
```

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

```javascript
// object definition as literal with attributes and method
let obj = { 
    key1: 'value';
    key2: 42.12;
    foo: function() {
        console.log(this.key1);
    }
}
```

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

## **Array**
<br>

Arrays are dynamic and loosely typed, so they can grow or shrink and can contain element of different types.

```javascript
let array = ['element1', 34 , true];    // array definition as literal with different element types

array.length;                           // return number of elements
```

<br>
<br>
<br>

## **Other Operators**
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
<br>

### **Logical Assignment Operator**