# **JavaScript String**

<br>

## **Table Of Contents**
<br>

- [**JavaScript String**](#javascript-string)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**String Types**](#string-types)
  - [**String Concatenation**](#string-concatenation)
  - [**Methods**](#methods)
    - [**Searching**](#searching)
      - [**indexOf()**](#indexof)
      - [**lastIndexOf()**](#lastindexof)
      - [**includes()**](#includes)
      - [**startsWith()**](#startswith)
      - [**endsWith()**](#endswith)
      - [**search()**](#search)
      - [**match()**](#match)
    - [**Accessing Chars**](#accessing-chars)
      - [**charAt()**](#charat)
      - [**charCodeAt()**](#charcodeat)
    - [**String Transformation And Manipulation**](#string-transformation-and-manipulation)
      - [**toLowerCase()**](#tolowercase)
      - [**toUpperCase()**](#touppercase)
      - [**slice()**](#slice)
      - [**substring()**](#substring)
      - [**split()**](#split)
      - [**replace()**](#replace)
      - [**replaceAll()**](#replaceall)
      - [**trim()**](#trim)
      - [**trimStart()**](#trimstart)
      - [**trimEnd()**](#trimend)
      - [**padStart()**](#padstart)
      - [**padEnd()**](#padend)
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



## **String Concatenation**
<br>

```javascript
let str1 = 'foo';
let str2 = 'bar';


// method 1
let str3 = str1 + str2;
console.log(str3);                  // output: foobar


// method 2
let str4 = str1.concat(str2);
console.log(str4);                  // output: foobar


console.log(str1);                  // output: foo
console.log(str2);                  // output: bar
```


<br>
<br>
<br>
<br>

## **Methods**
<br>
<br>
<br>

### **Searching**
<br>
<br>

#### **indexOf()**

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

#### **lastIndexOf()**

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

#### **includes()**

* returns boolean indicating whether searchString is includes in a string
* search is case sensitive

```javascript
includes(searchString, [startIndex])
```

<br>
<br>

#### **startsWith()**

* returns boolean indicating whether string begins with searchString

```javascript
startsWith(searchString, [startIndex])
```

```javascript
'foobar'.startsWith('fo');                // returns true
'foobar'.startsWith('fo', 1);             // returns false
'foobar'.startsWith('oo');                // returns false
```

<br>
<br>

#### **endsWith()**

* returns boolean indicating whether string ends with searchString

```javascript
endsWith(searchString, [length])
```

```javascript
'foobar'.endsWith('ar');                  // returns true
'foobar'.endsWith('ba');                  // returns false
```

<br>
<br>

#### **search()**

* returns the index of the first match of a [regular expression](./javascript_regex.md)
* returns -1 if there is no match

```javascript
search(regexp)
```

<br>
<br>

#### **match()**

* returns an array of the matches of a [regular expression](./javascript_regex.md)

```javascript
match(regex)
```

<br>
<br>
<br>

### **Accessing Chars**

<br>
<br>
<br>

#### **charAt()**

* returns char at index 

```javascript
charAt(index)
```

<br>
<br>

#### **charCodeAt()**

* returns utf-16 code for the character at index

```javascript
charCodeAt(index)
```

```javascript
'bar'.charCodeAt(0);                      // returns 98
'bar'.charCodeAt(1);                      // returns 97 
'bar'.charCodeAt(2);                      // returns 114 
```

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

#### **slice()**

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

#### **substring()**

* extracts and returns a part of a string as a new string
* original string is not modified

```javascript
substring(startIndex, [endIndex])
```

```javascript
'foo_bar'.substring(0,3);                   // returns foo
'foo_bar'.substring(3);                     // returns _bar
'foo_bar'.substring(-3);                    // returns foo_bar
'foo_bar'.substring(2, -2);                 // returns fo
```

<br>
<br>

#### **split()**

* divides string and returns array of substrings

<br>

Parameters:
* _separator_
    * split pattern
    * can be string or [regular expression](./javascript_regex.md)
    * not included in the array elements
    * if parameter is omitted, returns array containing one element with copy of entire string
* _limit_
    * limit for numbers of substrings to include in the array
  
<br>

```javascript
split([separator], [limit])
```

```javascript
let str = 'foo;bar;rab;oof';

str.split();                      // returns ['foo;bar;rab;oof']
str.split(';');                   // returns ['foo', 'bar', 'rab', 'oof']
str.split('bar');                 // returns ['foo;', ';rab;oof']
str.split(';', 2);                // returns ['foo', 'bar']
```

<br>
<br>

#### **replace()**

* returns new string where _some or all_ occurrences of a pattern are replaced
* pattern can be string or [regular expression](./javascript_regex.md)
* replacement can be string or the result of a replacementFunction
* original string is not modified

```javascript
replace(searchString, replacementString)
replace(searchString, replacementFunction)

replace(regex, replacementString)
replace(regex, replacementFunction)
```

<br>
<br>

#### **replaceAll()**

* returns new string where _all_ occurrences of a pattern are replaced
* pattern can be string or [regular expression](./javascript_regex.md)
* replacement can be string or the result of a replacementFunction
* original string is not modified

```javascript
replaceAll(searchString, replacementString)
replaceAll(searchString, replacementFunction)

replaceAll(regex, replacementString)
replaceAll(regex, replacementFunction)
```

<br>
<br>

#### **trim()**

* returns new string without leading and trailing whitespaces

```javascript
let str = '   foo bar   ';
str.trim();                              // returns 'foo bar'
console.log(str);                        // output: '   foo bar   '
```


<br>
<br>

#### **trimStart()**

* returns new string without leading whitespaces

```javascript
let str = '   foo bar   ';
str.trimStart();                         // returns 'foo bar   '
console.log(str);                        // output: '   foo bar   '
```

<br>
<br>

#### **trimEnd()**

* returns new string without trailing whitespaces

```javascript
let str = '   foo bar   ';
str.trimEnd();                           // returns '   foo bar'
console.log(str);                        // output: '   foo bar   '
```

<br>
<br>

#### **padStart()**

* pads the start of a string with the padString until the desired target length of the string is reached
* padString default: space

```javascript
padStart(targetLength, [padString])
```

```javascript
let str = 'foobar';
str.padStart(10);                         // returns '    foobar'
str.padStart(10, '-');                    // returns '----foobar'
str.padStart(10, 'abc');                  // returns 'abcafoobar'
console.log(str);                         // output: foobar
```

<br>
<br>

#### **padEnd()**

* pads the end of a string with the padString until the desired target length of the string is reached
* padString default: space

```javascript
padEnd(targetLength, [padString])
```

```javascript
let str = 'foobar';
str.padEnd(10);                         // returns 'foobar    '
str.padEnd(10, '-');                    // returns 'foobar----'
str.padEnd(10, 'abc');                  // returns 'foobarabca'
console.log(str);                       // output: foobar
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