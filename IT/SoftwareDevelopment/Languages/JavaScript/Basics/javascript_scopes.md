# **JavaScript Scopes**
<br>

## **Table Of Contents**
<br>

- [**JavaScript Scopes**](#javascript-scopes)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Nested Scopes**](#nested-scopes)
  - [**Scope Types**](#scope-types)
    - [**Block Scope**](#block-scope)
    - [**Function Scope**](#function-scope)
    - [**Module Scope**](#module-scope)
    - [**Globale Scope**](#globale-scope)
    - [**Lexical Scope (Static Scope)**](#lexical-scope-static-scope)
      - [**Basic Example**](#basic-example)
      - [**Closure Example**](#closure-example)

<br>
<br>
<br>
<br>

## **General**
<br>

* A scope is a set of rules for the accessibility and lifetime of elements within a specific area
* Scopes also prevent naming conflicts by isolating their variables

<br>
<br>
<br>
<br>

## **Nested Scopes**
<br>

* Scopes can be nested
  * inner scopes can access outer scopes
  * outer scopes can not access inner scopes

<br>

Every scope is linked to its parent scope via the _scope chain_.

<br>
<br>
<br>
<br>

## **Scope Types**
<br>
<br>

### **Block Scope**
<br>


|Defined by			|Relevant for
|:------------------|:-------------
|if-statement		|_let_ variables
|for-loop			|_const_ variables
|while-loop			|
|standalone block {}|

<br>

Example

<br>

```javascript
if (true) {
	// outer block scope
	let outerVariable = 'outer';

	if (true) {
		// inner block scope
		let innerVariable = 'inner';
		console.log(outerVariable);			// 'outer'
	}
	console.log(innerVariable);				// Error: 'innerVariable is not defined'
}
```

<br>
<br>
<br>

### **Function Scope**
<br>

|Defined by   |Relevant for
|:------------|:-----------
|function body|_var_ variables
|             |_let_ variables
|             |_const_ variables

<br>

Example

<br>

```javascript
function foo() {
	var variableVar = 'foo';
	let variableLet = 'bar';
	const variableConst = 'baz';
}

foo();
console.log(variableVar, variableLet, variableConst);		// Error: variables not defined
```

<br>
<br>
<br>

### **Module Scope**
<br>

|Defined by   |Relevant for
|:------------|:-----------
|module       |variables
|             |functions
|             |classes

<br>

Only exported elements are externally visible.

<br>
<br>
<br>

### **Globale Scope**
<br>

|Defined by                                      |Relevant for
|:-----------------------------------------------|:-----------
|topmost scope of files (in browser \<scipt> tag)|variables
|                                                |functions
|                                                |classes

<br>

Example

<br>

```html
<script src="source.js"></script>
```

<br>

source.js

```javascript
let globalVariable = 'foo';
```

<br>
<br>
<br>

### **Lexical Scope (Static Scope)**
<br>

* defines accessibility of variables in nested **function** scopes
* based on the definition area at compilation time
  * does not change at runtime -> static scope

<br>

```
Inner scopes can access the outer scopes of the functions they were defined in, even if these functions are terminated!
```

<br>

Lexical Scope is an important concept to understand [Closures](./javascript_function.md#closure).  

<br>
<br>

#### **Basic Example**
<br>

```javascript
function outerFunction() {
	// outer scope
	let outerVariable = 'foo';

	function innerFunction() {
		// inner scope
		console.log(outerVariable);
	}

	innerFunction();
}

outerFunction();
```

<br>

1. Call outerFunction()
2. outerFunction calls nested function innerFunction
3. innerFunction scope contains the outerFunction scope (because innerFunction is defined within outerFunction)

<br>
<br>

#### **Closure Example**
<br>

```javascript
function outerFunction() {
	// outer scope
	let outerVariable = 'foo';

	function innerFunction() {
		// inner scope
		console.log(outerVariable);
	}

	return innerFunction;
}

const innerFunc = outerFunction();
innerFunc();							
```

<br>

Here the innerFunction is passed outside of its enclosing outerFunction (definition context).

Due to the lexical scope innerFunc is still chained to the scope of outerFunction **even when outerFunction is terminated** and innerFunc is called outside its enclosing function!