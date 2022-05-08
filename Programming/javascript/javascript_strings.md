# **JavaScript Strings**

<br>

## **Table Of Contents**
<br>

- [**JavaScript Strings**](#javascript-strings)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**String Types**](#string-types)
  - [**Methods**](#methods)
    - [**indexOf()**](#indexof)
    - [**lastIndexOf()**](#lastindexof)
    - [**slice()**](#slice)
    - [**charAt()**](#charat)
    - [**includes()**](#includes)
    - [**repeat()**](#repeat)

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

### **indexOf()**

* returns start index of _first_ occurrence of a searchString in a string

```javascript
indexOf(searchString, [startPosition])
```

```javascript
'foo_bar_foo_bar'.indexOf('ar');          // returns 5
'foo_bar_foo_bar'.indexOf('ar', 6);       // returns 13
```

<br>
<br>

### **lastIndexOf()**

* returns start index of _last_ occurrence of a searchString in a string 

```javascript
lastIndexOf(searchString, [startPositionBackwards])
```

```javascript
'foo_bar_foo_bar'.lastIndexOf('ar');        // returns 13
'foo_bar_foo_bar'.lastIndexOf('ar', 10);    // returns 5
```

<br>
<br>

### **slice()**

* extracts and returns a part of a string as a new string
* original string is not modified

```javascript
slice(startIndex, [endIndex])
```

```javascript
'foo_bar'.slice(0,3);                       // returns foo
'foo_bar'.slice(3);                         // returns _bar
'foo_bar'.slice(-3);                        // returns bar
'foo_bar'.slice(2, -2);                     // returns o_b
```

<br>
<br>

### **charAt()**

* returns char at index 

```javascript
charAt(index)
```

<br>
<br>

### **includes()**

* returns boolean indicating whether searchString is includes in a string
* search is case sensitive

```javascript
includes(searchString, [startIndex])
```

<br>
<br>

### **repeat()**

* returns a string containing the concatenated copied of the specified number

```javascript
repeat(number)
```

```javascript
let newString = 'foo'.repeat(3);
console.log(newString);             // output: foofoofoo
```