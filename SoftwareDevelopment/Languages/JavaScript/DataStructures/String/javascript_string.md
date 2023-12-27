# **JavaScript String**

<br>

## **Table Of Contents**
<br>

- [**JavaScript String**](#javascript-string)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**String Types**](#string-types)
  - [**Methods**](#methods)
    - [**String Transformation And Manipulation**](#string-transformation-and-manipulation)
      - [**toLowerCase()**](#tolowercase)
      - [**toUpperCase()**](#touppercase)
      - [**repeat()**](#repeat)
    - [**Other**](#other)
      - [**String.fromCharCode()**](#stringfromcharcode)

<br>
<br>
<br>
<br>

## **General**

* Strings are similar to arrays
  * sequence of characters accessible by a numerical zero-based index
  * attribute String._length_

<br>
<br>
<br>
<br>

## **String Types**
<br>

```javascript
// string with single quote
let str = 'value1';

// string with double quote
str = "value2";

// template string
let text = 'Hello';
str = `${text} World`;
console.log(str);                   // output: Hello World


// template string over multiple lines
str = `multi

line

string`;
```

<br>
<br>
<br>
<br>

## **Methods**
<br>
<br>
<br>

### **String Transformation And Manipulation**

<br>
<br>
<br>

#### **toLowerCase()**

* returns new string with all characters of call string converted to lower case

```javascript
let str = 'FOOBAR';
str.toLowerCase();                        // returns foobar
console.log(str);                         // output: FOOBAR
```

<br>
<br>

#### **toUpperCase()**

* returns new string with all characters of call string converted to upper case

```javascript
let str = 'foobar';
str.toUpperCase();                        // returns FOOBAR
console.log(str);                         // output: foobar
```

<br>
<br>

#### **repeat()**

* returns a string containing the concatenated copied of the specified number

```javascript
repeat(number)
```

```javascript
let newString = 'foo'.repeat(3);
console.log(newString);             // output: foofoofoo
```

<br>
<br>
<br>

### **Other**

<br>
<br>

#### **String.fromCharCode()**

* static method
* returns string from sequence of utf-16 codes

```javascript
String.fromCharCode(code1, ... , codeN)
```

```javascript
String.fromCharCode(98, 97, 114);         // returns 'bar'
```