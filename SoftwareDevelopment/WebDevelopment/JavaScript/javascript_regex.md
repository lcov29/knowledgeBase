# **JavaScript Regular Expressions**

<br>

## **Table Of Contents**
<br>

- [**JavaScript Regular Expressions**](#javascript-regular-expressions)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Functions That Use Regular Expressions**](#functions-that-use-regular-expressions)
    - [**RexExp.test()**](#rexexptest)
    - [**RegExp.exec()**](#regexpexec)
    - [**String.match()**](#stringmatch)
    - [**String.replace()**](#stringreplace)
    - [**String.replaceAll()**](#stringreplaceall)
    - [**String.search()**](#stringsearch)
    - [**String.split()**](#stringsplit)
  - [**Ways To Create A Regular Expression**](#ways-to-create-a-regular-expression)
  - [**Flags**](#flags)
  - [**Character Classes**](#character-classes)
  - [**Groups And Ranges**](#groups-and-ranges)
  - [**Quantifiers**](#quantifiers)
  - [**Assertions**](#assertions)

<br>
<br>
<br>
<br>

## **General**

* Regular expressions: patterns to match character combinations in strings
* [Online tool for testing regular expressions](https://regexr.com/)

```javascript
// basic syntax
/pattern/[flags]
```

<br>
<br>
<br>
<br>

## **Functions That Use Regular Expressions**

<br>
<br>
<br>

### **RexExp.test()**

* returns boolean indicating whether the regular expression matches the searchString

```javascript
RegExp.test(searchString)
```

<br>
<br>
<br>

### **RegExp.exec()**

* returns array of all matches of the regular expression for the searchString

```javascript
RegExp.exec(searchString)
```

<br>
<br>
<br>

### **String.match()**

* returns an array of the matches of a regular expression

```javascript
match(regex)
```

<br>
<br>
<br>

### **String.replace()**

* returns new string where _some or all_ occurrences of a pattern are replaced
* original string is not modified

```javascript
replace(regex, replacementString)
replace(regex, replacementFunction)
```

<br>
<br>
<br>

### **String.replaceAll()**

* returns new string where _all_ occurrences of a pattern are replaced
* original string is not modified

```javascript
replaceAll(regex, replacementString)
replaceAll(regex, replacementFunction)
```

<br>
<br>
<br>

### **String.search()**

* returns the index of the first match
* returns -1 if there is no match

```javascript
search(regex)
```

<br>
<br>
<br>

### **String.split()**

* divides string and returns array of substrings

<br>

Parameters:
* _separator_
    * split pattern
    * not included in the array elements
    * if parameter is omitted, returns array containing one element with copy of entire string
* _limit_
    * limit for numbers of substrings to include in the array
  
<br>

```javascript
split([separator], [limit])
```

<br>
<br>
<br>
<br>

## **Ways To Create A Regular Expression**

```javascript
// literal (use when regex does not change at runtime)
/pattern/[flags];
let regex = /abcd/g;


// constructor function (use when regex does change at runtime)
new RegExp(pattern [, flags])
regex = new RegExp('abcd', 'g');
```

<br>
<br>
<br>
<br>

## **Flags**

* flags enable additional functionality (multiline search, case-insensitive search etc.)

<br>

```javascript
/pattern/flags
```

<br>

|Flag|Name         |Description                                           |
|:--:|:------------|:-----------------------------------------------------|
|g   |global search|find all matches in string, not only the first        |
|i   |ignore case  |expression is case-insensitive --> /abc/i matches aBc |
|m   |multiline    |anchors (^ and $) match start and end of a line       |
|u   |unicode      |enables unicode escapes \x{0041}                      |
|s   |dotall       |dot character . matches any character                 |

<br>

Example

```javascript
/foo/gi.test('bar foo rab Foo bAr FOO baR FoO');
```

bar **foo** rab **Foo** bAr **FOO** baR **FoO**

<br>
<br>
<br>
<br>

## **Character Classes**

* match characters 

<br>

|Character |Description                                                                             |
|:---------|:---------------------------------------------------------------------------------------|          
|.         |matches any character except line terminators                                           |
|\d        |matches any digit [0-9]                                                                 |
|\D        |matches any character _except_ digits [0-9]                                             |
|\w        |matches any alphanumeric character from basic latin alphabet                            |
|\W        |matches any character that is _not_ an alphanumeric character from basic latin alphabet |
|\s        |matches any white space character (space, tab, form feed, line feed, ...)               |
|\S        |matches any character that is _not_ a white space character                             |
|\t        |matches horizontal tab                                                                  |
|\r        |matches carriage return                                                                 |
|\n        |matches linefeed                                                                        |
|\v        |matches vertical tab                                                                    |
|\f        |matches form feed                                                                       |
|\xhh      |matches character with code _hh_ (twow hexadecimals)                                    |
|\uhhhh    |matched utf-16 code unit with value hhhh (four hexadecimals)                            |
|\         |escape character                                                                        |

<br>
<br>
<br>
<br>

## **Groups And Ranges**

<br>

|Assertion         |Description                                                                                            |
|:-----------------|:------------------------------------------------------------------------------------------------------|
|a|b               |matches either a or b                                                                                  |
|[abc]             |matches any of the enclosed characters                                                                 |
|[^abc]            |matches any character not equal to any of the enclosed characters                                      |
|[a-z]             |matches any character in range a to z                                                                  |
|[^a-z]            |matches any character not in range a to z                                                              |
|(a)               |capturing group: matches a and remembers the match --> output for String.match() and String.matchAll() |
|(?NAMEa)          |capturing group (see above): output accessible via NAME for String.match() and String.matchAll()       |
|(?:a)             |matches x but do not remember                                                                          |
|\positiveInteger  |references the content of the n-th capturing group starting from the left                              |
|\k\NAME           |references the content of the capturing group with NAME                                                |

<br>
<br>
<br>
<br>

## **Quantifiers**

* number of characters to match

<br>

|Quantifier            |Description                                                    |
|:---------------------|:--------------------------------------------------------------|
|a*                    |matches item a **0 or more** times                             |
|a+                    |matches item a **1 or more** times                             |
|a?                    |matches item a **0 or 1** times                                |
|a{NUMBER}             |matches **exactly NUMBER occurrences** of item a               |
|a{NUMBER,}            |matches **at least NUMBER occurrences** of item a              |
|a{MIN,MAX}            |matches **at least MIN and at most MAX occurrences** of item a |

<br>
<br>

* Non-greedy quantifiers will stop at first match

<br>

|Non-greedy quantifiers|
|:---------------------|
|a*?                   |
|a+?                   |
|a??                   |
|a{n}?                 |
|a{n,}?                |
|a{n,m}?               |


<br>
<br>
<br>
<br>

## **Assertions**

* matches boundaries (beginning and ending of words, lines etc.)

<br>

|Assertion|Description                                                                                                  |
|:--------|:------------------------------------------------------------------------------------------------------------|
|^a       |matches beginning of string; matches after a line break character if flag multiline is set                   |
|a$       |matches end of string; matches before a line break character if flag multiline is set                        |
|\b       |matches word boundary (position where word character is not followed of preceeded by another word character) |
|\B       |matches non-word boundary (position where previous and next character are of the same type)                  |
|a(?=x)   |**lookahead**: matches a only if followed by x                                                               |
|a(?!x)   |**negative lookahead**: matches a only if _not_ followed by x                                                |
|(?<=x)a  |**lookbehind**: matches a only if preceeded by x                                                             |
|(?<!x)a  |**negative lookbehind**: matches a only if _not_ preceeded by x                                              |