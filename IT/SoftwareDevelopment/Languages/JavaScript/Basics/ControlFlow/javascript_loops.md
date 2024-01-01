# **JavaScript Loops**
<br>

## **Table Of Contents**
<br>

- [**JavaScript Loops**](#javascript-loops)
  - [**Table Of Contents**](#table-of-contents)
  - [**Loops**](#loops)
    - [**General**](#general)
      - [**For-Loop**](#for-loop)
      - [**While Loop**](#while-loop)
      - [**Do-While Loop**](#do-while-loop)
    - [**Iterate Over Objects**](#iterate-over-objects)
      - [**For-Of Loop**](#for-of-loop)
      - [**For-In Loop**](#for-in-loop)
  - [**Manipulate Loop Iteration**](#manipulate-loop-iteration)
    - [**continue**](#continue)
    - [**break**](#break)

<br>
<br>
<br>

## **Loops**
<br>
<br>

### **General**
<br>
<br>

#### **For-Loop**
<br>

Executes code block until specified condition is false.

```
for (?initialization; ?condition; ?afterthought) {
   code
}
```
- `initialization`: expression or variable declaration evaluated once before loop
- `condition`: expression that is evaluated after each loop and breaks the loop when it is false
- `afterthought`: expression that is evaluated after each loop

<br>

Examples

```javascript
for (let i = 0; i < 15; i++) {
    // code
}
```
- executes specified code 15 times

<br>

```javascript
for (let i = 1; ; i++) {
   if (i > 20) {
      break;
   }
   // code
}
```
- executed specified code 20 times
- since condition is omitted, the loop has to break via `break` keyword to prevent an infinity loop

<br>
<br>

#### **While Loop**
<br>

Executes code block as long as the specified expression is **true**. The expression is evaluated **before** each iteration.

```javascript
while (expression) {
    // code
}
```

<br>

Examples

```javascript
let i = 0;

while (i < 10) {
   // code
   i++;
}
```
- executes code 10 times

<br>

```javascript
let i = 0;

while (true) {
   if (i === 10) {
      break;
   }
   // code
   i++
}
```
- executes code 10 times
- since condition is literal `true`, the loop has to break via `break` keyword to prevent an infinity loop

<br>

```javascript
while (false) {
   // code
}
```
- does not execute code, because condition is literal `false`

<br>
<br>

#### **Do-While Loop**
<br>

Executes code block as long ad the specified expression is **true**. The expression is evaluated **after** each iteration.

```javascript
do {
    // code
} while (expression)
```

<br>

Examples

```javascript
let i = 0;

do {
   // code
   i++;
} while (i < 10)
```
- executes code 10 times

<br>

```javascript
let i = 0;

do {
   if (i === 10) {
      break;
   }
   // code
   i++;
} while (true);
```
- executes code 10 times
- since condition is literal `true`, the loop has to break via `break` keyword to prevent an infinity loop

<br>

```javascript
do {
   // code
} while (false)
```
- executes code once, because literal condition `false` is evaluated after code execution

<br>
<br>

### **Iterate Over Objects**
<br>
<br>

#### **For-Of Loop**
<br>

Iterates over all **values** of an iterable object like
- Array
- String
- Map
- Set
- NodeList
- Generators
- arguments object

<br>

```javascript
const list = ['entry1', 'entry2', 'entry3'];

for (let entry of list) {
  console.log(entry);
}

// entry1
// entry2
// entry3
```

<br>

```javascript
const str = 'foo';

for (let character of str) {
   console.log(character);
}

// f
// o
// o
```

<br>
<br>

#### **For-In Loop**
<br>

Iterates over all enumerable **property keys** of an object. Ignores symbols.

<br>

```javascript
const obj = { a: 'foo', b: 'bar', c: 'baz' };

for (let key in obj) {
  console.log(key);
}

// a
// b
// c
```

<br>
<br>
<br>

## **Manipulate Loop Iteration**
<br>
<br>

### **continue**
<br>

Aborts current iteration and moves to next iteration.

```
continue ?labelName
```

<br>

Examples:

```javascript
for (let i = 1; i <= 10; i++) {
    if (i % 2) { continue; }
    console.log(i);
}

// 2
// 4
// 6
// 8
// 10
```

<br>

```javascript
myLabel:
for (let i = 1; i <= 3; i++) {
	for (let j = 1; j <= 5; j++) {
		if (j === 3) {
			continue myLabel;
		}
      console.log(`(${i}.${j})`);
	}
}

// (1.1)
// (1.2)
// (2.1)
// (2.2)
// (3.1)
// (3.2)
```
- use label `myLabel` to abort current iteration of outer loop from inner loop

<br>
<br>

### **break**
<br>

Terminates loop.

```
break ?labelName
```

<br>

Examples:

```javascript
for (let i = 1; i <= 10; i++) {
    if (i % 2 === 0) { break; }
    console.log(i);
}

// 1
```

<br>

```javascript
myLabel:
for (let i = 1; i <= 3; i++) {
	for (let j = 1; j <= 5; j++) {
		if (j === 3) {
			break myLabel;
		}
      console.log(`(${i}.${j})`);
	}
}

// (1.1)
// (1.2)
```
- use label `myLabel` to terminate outer loop from inner loop

