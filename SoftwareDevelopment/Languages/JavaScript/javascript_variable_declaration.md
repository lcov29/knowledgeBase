# **JavaScript Variable Declaration**
<br>

## **Table Of Contents**
<br>

- [**JavaScript Variable Declaration**](#javascript-variable-declaration)
  - [**Table Of Contents**](#table-of-contents)
  - [**Overview**](#overview)
  - [**Keywords To Declare Variables**](#keywords-to-declare-variables)
    - [**Var**](#var)
    - [**Let**](#let)
    - [**Const**](#const)

<br>
<br>
<br>
<br>

## **Overview**
<br>

|                                               |**var**                     |**let**|**const**
|:----------------------------------------------|:---------------------------|:------|:----
|**Scope**                                      |global/function             |block  |block
|**declaration without assigned value possible**|yes                         |yes    |no
|**assign new value**                           |yes                         |yes    |no
|**redeclare variable**                         |yes                         |no     |no
|**hoisted (can be used before declaration)**   |yes (without assigned value)|no     |no


<br>
<br>
<br>
<br>

## **Keywords To Declare Variables**
<br>
<br>

### **Var**
<br>

Function Scoped:

```javascript
var global = 'global';

function foo() {
    while(true) {
        var functionVar = 'functionVar';
        break;
    }
    console.log(functionVar);               // returns 'functionVar'
}

console.log(global);                        // returns 'global'
console.log(functionVar);                   // error: functionVar is not defined
```

<br>
<br>

Declaration without assignment:

```javascript
var foo;
console.log(foo);                           // returns undefined                        
```

<br>
<br>

Assign new value:

```javascript
var foo = 'foo';
foo = 'bar'
console.log(foo);                           // returns 'bar'
```

<br>
<br>

Redeclare variable:

```javascript
var foo = {};
var foo = 'foo';
console.log(foo);                           // returns 'foo'
```

<br>
<br>

Hoisted:

```javascript
console.log(foo);                           // returns 'foo'
var foo = 'foo';
```

<br>
<br>
<br>

### **Let**
<br>

Block Scoped:

```javascript
let global = 'global';

function foo() {
    while(true) {
        let bar = 'bar';
        break;
    }
    console.log(bar);                       // error: bar is not defined
}

console.log(global);                        // returns 'global'
console.log(bar);                           // error: bar is not defined
```

<br>
<br>

Declaration without assignment:

```javascript
let foo;
console.log(foo);                           // returns undefined                        
```

<br>
<br>

Assign new value:

```javascript
let foo = 'foo';
foo = 'bar';
console.log(foo);                           // returns 'bar'
```

<br>
<br>

Redeclare variable:

```javascript
let foo = {};
let foo = 'foo';                            // error: redeclaration of let foo
```

<br>
<br>

Hoisted:

```javascript
console.log(foo);                           // error: can´t access lexical declaration 'foo' before initialization
let foo = 'foo';
```

<br>
<br>
<br>

### **Const**
<br>

Block Scoped:

```javascript
const global = 'global';

function foo() {
    while(true) {
        const bar = 'bar';
        break;
    }
    console.log(bar);                       // error: bar is not defined
}

console.log(global);                        // returns 'global'
console.log(bar);                           // error: bar is not defined
```

<br>
<br>

Declaration without assignment:

```javascript
const foo;
console.log(foo);                           // error: missing = in const declaration                       
```

<br>
<br>

Assign new value:

```javascript
const foo = 'foo';
foo = 'bar';                                // error: invalid assignment to const 'foo'
```

<br>
<br>

Redeclare variable:

```javascript
const foo = {};
const foo = 'foo';                          // error: redeclaration of const foo
```

<br>
<br>

Hoisted:

```javascript
console.log(foo);                           // error: can´t access lexical declaration 'foo' before initialization
const foo = 'foo';
```