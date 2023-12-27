# **JavaScript String**
<br>

## **Table Of Contents**
<br>

- [**JavaScript String**](#javascript-string)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**String Types**](#string-types)
    - [**Single Quote String**](#single-quote-string)
    - [**Double Quote String**](#double-quote-string)
    - [**Template String**](#template-string)
  - [**Wrapper Object**](#wrapper-object)
    - [**Properties**](#properties)
      - [**length**](#length)
    - [**Methods**](#methods)
      - [**Access Single Characters**](#access-single-characters)
        - [**\[\]**](#)
        - [**at()**](#at)
        - [**charAt()**](#charat)
        - [**charCodeAt()**](#charcodeat)
      - [**String Concatenation**](#string-concatenation)
        - [**+**](#-1)
        - [**concat()**](#concat)
      - [**Searching**](#searching)
        - [**indexOf()**](#indexof)
        - [**lastIndexOf()**](#lastindexof)
        - [**includes()**](#includes)
        - [**startsWith()**](#startswith)
        - [**endsWith()**](#endswith)
        - [**search()**](#search)
        - [**match()**](#match)
        - [**matchAll()**](#matchall)
      - [**Replacing**](#replacing)
        - [**replace()**](#replace)
        - [**replaceAll**](#replaceall)
      - [**Substrings**](#substrings)
        - [**substring()**](#substring)
        - [**slice()**](#slice)
        - [**split()**](#split)
      - [**Trimming**](#trimming)
        - [**trim()**](#trim)
        - [**trimStart()**](#trimstart)
        - [**trimEnd()**](#trimend)
      - [**Padding**](#padding)
        - [**padStart()**](#padstart)
        - [**padEnd()**](#padend)

<br>
<br>
<br>
<br>

## **General**
<br>

> **String:** sequence of characters to represent text

- string is a primitive value
- embedded into a wrapper

<br>
<br>
<br>
<br>

## **String Types**
<br>
<br>

### **Single Quote String**
<br>

```javascript
'bar';
```

<br>
<br>

### **Double Quote String**
<br>

```javascript
"bar";
```

<br>
<br>

### **Template String**
<br>

```javascript
const foo = 'bar';

`${foo} baz`;     // bar baz
```
- used to concat variables into strings

<br>

```javascript
const foo = `bar
baz`;                // bar\nbaz
```
- allows multi-line strings

<br>
<br>
<br>
<br>

## **Wrapper Object**
<br>
<br>
<br>

### **Properties**
<br>
<br>

#### **length**
<br>

Returns number of utf-16 characters.

```javascript
'bar'.length;       // 3
```

<br>
<br>
<br>

### **Methods**
<br>
<br>
<br>

#### **Access Single Characters**
<br>
<br>

##### **\[\]**
<br>

Access single character by addressing it via zero-based index.

```
string[index]
```

<br>

```javascript
'bar'[1];           // a
```

<br>
<br>

##### **at()**
<br>

Access single character by addressing it either
- via zero-based index (positive integer)
- via offset from end of string (negative integer)

```
string.at(index)
```

<br>

```javascript
'bar'.at(0);      // b
```

<br>

```javascript
'bar'.at(-1);     // r
```

<br>
<br>

##### **charAt()**
<br>

Access single character addressed via zero-based index.

```
string.charAt(index)
```

<br>

```javascript
'bar'.charAt(1);  // a
```

<br>
<br>

##### **charCodeAt()**
<br>

Returns utf-16 code of single character addressed via zero-based index.

```
string.charCodeAt(index)
```

<br>

```javascript
'bar'.charCodeAt(0);    // 98
'bar'.charCodeAt(1);    // 97 
'bar'.charCodeAt(2);    // 114 
```

<br>
<br>
<br>

#### **String Concatenation**
<br>
<br>

##### **+**
<br>

Concatenates two strings.

```javascript
'foo' + 'bar';       // foobar
```

<br>
<br>

##### **concat()**
<br>

Concatenates two strings.

```
string1.concat(string2)
```

<br>

```javascript
'foo'.concat('bar'); // foobar
```

<br>
<br>
<br>

#### **Searching**
<br>
<br>

##### **indexOf()**
<br>

Returns start index of _first_ occurrence of a searchString within a string.

```
string.indexOf(searchString, ?substringStartIndex)
```

<br>

```javascript
'foo1-bar1-foo2-bar2'.indexOf('ar');      // 6
```

<br>

```javascript
'foo1-bar1-foo2-bar2'.indexOf('ar', 8);   // 16
```
- shortens the string to `-foo2-bar2`

<br>
<br>

##### **lastIndexOf()**
<br>

Returns start index of _last_ occurrence of a searchString within a string.

```
string.lastIndexOf(searchString, ?substringEndIndex)
```

<br>

```javascript
'foo1-bar1-foo2-bar2'.lastIndexOf('ar');        // 16
```

<br>

```javascript
'foo1-bar1-foo2-bar2'.lastIndexOf('ar', 10);    // 6
```
- shortens the string to `foo1-bar1-f`

<br>
<br>

##### **includes()**
<br>

Returns boolean indicating whether search string is included in string.

```
string.includes(searchString, ?substringStartIndex)
```

<br>

```javascript
'foo1-bar1-foo2-bar2'.includes('foo2');      // true
```

<br>

```javascript
'foo1-bar1-FoO2-bar2'.includes('foo2');      // true
```
- search is case sensitive

<br>

```javascript
'foo1-bar1-foo2-bar2'.includes('foo1', 10);  // false
```
- shortens the string to `foo2-bar2`

<br>
<br>

##### **startsWith()**
<br>

Returns boolean indicating whether string begins with search string.

```
string.startsWith(searchString, ?substringStartIndex)
```

<br>

```javascript
'foo1-bar1-foo2-bar2'.startsWith('foo1');       // true
```

<br>

```javascript
'foo1-bar1-foo2-bar2'.startsWith('foo1', 6);    // false
```
- shortens the string to `ar1-foo2-bar2`

<br>
<br>

##### **endsWith()**
<br>

Returns boolean indicating whether string ends with search string.

```
string.endsWith(searchString, ?substringEndIndex)
```

<br>

```javascript
'foo1-bar1-foo2-bar2'.endsWith('bar2');       // true
```

<br>

```javascript
'foo1-bar1-foo2-bar2'.endsWith('bar2', 13);     // false
```
- shortens the string to `foo1-bar1-foo2`

<br>
<br>

##### **search()**
<br>

Returns the index of the first match of a [regular expression](./javascript_regex.md) or `-1` if there is no match.

```
search(regexp)
```

<br>

```javascript
'foo1-bar1-foo2-bar2'.search(/foo/g);        // 0
```

<br>

```javascript
'foo1-bar1-foo2-bar2'.search(/bar1.*2/g);    // 5
```
- because match `bar1-foo2` starts at index 5

<br>

```javascript
'foo1-bar1-foo2-bar2'.search(/foo3/g);        // -1
```

<br>
<br>

##### **match()**
<br>

Returns an array containing the matches of a [regular expression](./javascript_regex.md) or `null` if there are no matches.

```
string.match(regex)
```

<br>

```javascript
'foo1-bar1-foo2-bar2'.match(/foo/g);        // [foo, foo]
```
- returns all occurrences of string `foo`, because global flag `g` is set

<br>

```javascript
'foo1-bar1-foo2-bar2'.match(/foo/);

// ['foo', index: 0, input: 'foo1-bar1-foo2-bar2', groups: undefined]
```
- returns first occurrence of string `foo`, because global flag `g` is  not set


<br>
<br>

##### **matchAll()**
<br>

Returns iterator object of all matches of a **global** regular expression.

```
string.matchAll(regex)
```

<br>

```javascript
const matches = 'foo1-bar1-foo2-bar2'.matchAll(/foo/g);

for (let match of matches) {
   console.log(match)
}

// ['foo', index: 0, input: 'foo1-bar1-foo2-bar2', groups: undefined]
// ['foo', index: 10, input: 'foo1-bar1-foo2-bar2', groups: undefined]
```

<br>
<br>
<br>

#### **Replacing**
<br>
<br>

##### **replace()**
<br>

Returns new string where _some or all_ occurrences of the specified pattern are replaced.

```
string.replace(searchPattern, replacement)
```
- `searchPattern` can be a string or [regular expression](./javascript_regex.md)
- `replacement` can be a string or a function

<br>

```javascript
'foo1-bar1-foo2-bar2'.replace('foo', 'baz');    // baz1-bar1-foo2-bar2
```
- replaces first occurrence of `foo` with `baz`

<br>

```javascript
'foo1-bar1-foo2-bar2'.replace(/foo/g, 'baz');    // baz1-bar1-baz2-bar2
```
- replaces all occurrences of `foo` with `baz`, because regular expression has a global flag

<br>

```javascript
'foo1-bar1-foo2-bar2'.replace(/foo/g, (match, index) => index + match);    // '0foo1-bar1-10foo2-bar2'
```

<br>
<br>

##### **replaceAll**
<br>

Returns new string where all occurrences of the specified pattern are replaced.

```
string.replaceAll(searchPattern, replacement)
```
- `searchPattern` can be a string or global [regular expression](./javascript_regex.md)
- `replacement` can be a string or a function

<br>

```javascript
'foo1-bar1-foo2-bar2'.replaceAll('foo', 'baz');    // baz1-bar1-baz2-bar2
```

<br>

```javascript
'foo1-bar1-foo2-bar2'.replaceAll(/foo/g, 'baz');   // baz1-bar1-baz2-bar2
```

<br>
<br>
<br>

#### **Substrings**
<br>
<br>

##### **substring()**
<br>

Extracts part of a string from `startIndex` to `endIndex` (excluded) as a new string. Any index that is negative or exceeds string.length is treated as zero.

```
string.substring(startIndex, ?endIndex)
```

<br>

```javascript
'foo-bar'.substring(0,3);  // foo
```

<br>

```javascript
'foo-bar'.substring(3);    // -bar
```

<br>
<br>

##### **slice()**
<br>

Extracts part of a string from `startIndex` to `endIndex` (excluded) as a new string. Negative indexes are counted from the end of the string.

```
string.slice(startIndex, ?endIndex)
```

<br>

```javascript
'foo-bar'.slice(0,3);   // foo
```

<br>

```javascript
'foo-bar'.slice(3);     // -bar
```

<br>

```javascript
'foo-bar'.slice(-3);    // bar
```

<br>

```javascript
'foo-bar'.slice(2, -2); // o-b
```

<br>
<br>

##### **split()**
<br>

Returns array of substrings.

```
string.split(separator, ?limit)
```
- _separator_
  - can be string or [regular expression](./javascript_regex.md)
  - not included in array elements
  
<br>

```javascript
'foo-bar-baz'.split('-');     // ['foo', 'bar', 'baz]
```

<br>

```javascript
'foo-bar-baz'.split('-', 2);  // ['foo', 'bar']
```

<br>

```javascript
'foo-bar-baz'.split();     // [foo-bar-baz]
```

<br>
<br>
<br>

#### **Trimming**
<br>
<br>

##### **trim()**
<br>

Returns new string without leading and trailing whitespace.

```
string.trim()
```

<br>

```javascript
'   foo bar   '.trim();    // 'foo bar'
```

<br>
<br>

##### **trimStart()**
<br>

Returns new string without leading whitespace.

```
string.trimStart()
```

<br>

```javascript
'   foo bar   '.trimStart();    // 'foo bar   '
```

<br>
<br>

##### **trimEnd()**
<br>

Returns new string without trailing whitespace.

```
string.trimEnd()
```

<br>

```javascript
'   foo bar   '.trimEnd();    // '   foo bar'
```

<br>
<br>
<br>

#### **Padding**
<br>
<br>

##### **padStart()**
<br>

Pads start of a string until specified target length is reached.

```
string.padStart(targetLength, ?padString)
```
- padString defaults to space

<br>

```javascript
'foo-bar'.padStart(10);       // '   foo-bar'
```

<br>

```javascript
'foo-bar'.padStart(10, '-');  // '---foo-bar'
```

<br>

```javascript
'foo-bar'.padStart(10, 'AB');  // 'ABAfoo-bar'
```

<br>
<br>

##### **padEnd()**
<br>

Pads end of a string until specified target length is reached.

```
string.padEnd(targetLength, ?padString)
```
- padString defaults to space

<br>

```javascript
'foo-bar'.padEnd(10);       // 'foo-bar   '
```

<br>

```javascript
'foo-bar'.padEnd(10, '-');  // 'foo-bar---'
```

<br>

```javascript
'foo-bar'.padEnd(10, 'AB');  // 'foo-barABA'
```