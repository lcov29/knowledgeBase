# **JavaScript Function**

<br>

## **Table Of Contents**
<br>

- [**JavaScript Function**](#javascript-function)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Ways To Declare Functions**](#ways-to-declare-functions)
    - [**Function Declaration**](#function-declaration)
    - [**Function Expression**](#function-expression)
    - [**Arrow Function**](#arrow-function)
  - [**Parameters**](#parameters)
  - [**Spread Operator**](#spread-operator)
  - [**Special Functions**](#special-functions)
    - [**Closure**](#closure)
    - [**Generator Function**](#generator-function)
  - [**Keyword _this_**](#keyword-this)
    - [**General Use**](#general-use)
    - [**What _this_ References**](#what-this-references)
    - [**What _this_ Does NOT References**](#what-this-does-not-references)
      - [**Function Itself**](#function-itself)
      - [**Definition Context**](#definition-context)
    - [**Determination Rules At Call-Site**](#determination-rules-at-call-site)
      - [**Rule 1: Default Binding**](#rule-1-default-binding)
      - [**Rule 2.1: Implicit Binding**](#rule-21-implicit-binding)
      - [**Rule 2.2: Implicity Lost**](#rule-22-implicity-lost)
      - [**Rule 3.1: Explicit Binding**](#rule-31-explicit-binding)
      - [**Rule 3.2: Hard Binding**](#rule-32-hard-binding)
      - [**Rule 4: _new_ Binding**](#rule-4-new-binding)
    - [**Precedence Of Rules**](#precedence-of-rules)
    - [**Binding Exceptions**](#binding-exceptions)
      - [**Ignore _this_**](#ignore-this)
      - [**Indirection**](#indirection)
      - [**Lexical _this_**](#lexical-this)
  - [**Methods**](#methods)
    - [**bind()**](#bind)
    - [**apply()**](#apply)
    - [**call()**](#call)

<br>
<br>
<br>
<br>

## **General**
<br>

* Functions are objects
* Functions can be assigned to a variable
* Functions can be used as arguments for other functions
* Functions can return functions

<br>
<br>
<br>
<br>

## **Ways To Declare Functions**
<br>
<br>

### **Function Declaration**
<br>

* Declaration is hoisted by the interpreter (function can be used before declaration)
* Function is called by the name of the function

<br>

```javascript
function writeToConsole() {
    // code
}
```

<br>
<br>
<br>

### **Function Expression**
<br>

* Expression is not hoisted by the interpreter (function can not be used before expression)
* Function name is optional
* Function is called by the name of the assigned variable

<br>

```javascript
// anonymous function
const foo = function() {
    // code
}


// function expression with optional name bar
const foo = function bar() {
    // code
}


foo();
```

<br>
<br>
<br>

### **Arrow Function**
<br>

* alternative version of function expression
* attribute _this_ refers to the definition context, not the context in which the function is called!

<br>

Without parameters:
```javascript
() => { /* code */ }
```

<br>

One parameter:
```javascript
x => { /* code */ }
(x) => { /* code */ }
```

<br>

Multiple parameters:
```javascript
(x, y, z) => { /* code */ }
```

<br>

Function with single return statement:
```javascript
(x, y) => x + y
```

<br>
<br>
<br>
<br>

## **Parameters**
<br>

* Function can be called with
  * _exact_ number of arguments for parameters
  * _less_ arguments than parameters
  * _more_ arguments than parameters
 
<br>

* less arguments than parameters
  * missing arguments are initialized with default value if defined
  * else missing arguments are undefined

<br>

* more arguments than parameters
  * can be _implicitly_ stored in array-like variable _arguments_
  * can be _explicitly_ stored in array _restArgs_

<br>

```javascript
function foo(param1, param2 = 'DefaultValue', param3) { /* implementation */ }



// Call with matching argument numbers
foo('argument1', 'argument2', 'argument3');



// Call with less arguments than parameters
foo('argument1');
// param1 = 'argument1'                            
// param2 = 'DefaultValue'
// param3 = undefined



// Call with more arguments than parameters (implicit array-like variable 'arguments')
foo('argument1', 'argument2', 'argument3', 'argument4', 'argument5');
// param1 = 'argument1'
// param2 = 'argument2'
// param3 = 'argument3'
// 'arguments' contains 'argument4' and 'argument5'


// Call with more arguments than parameters (explicit array restArgs)
function bar(param1, param2, ...restArgs) {
    if (restArgs.length > 0) {
        for (let arg of restArgs) {
            // code
        }
    }
}

bar('argument1', 'argument2', 'argument3', 'argument4', 'argument5');
// param1 = 'argument1'
// param2 = 'argument2'
// restArgs= ['argument3', 'argument4', 'argument5']
```

<br>
<br>
<br>
<br>

## **Spread Operator**
<br>

* extends elements of an iterable object (i.e. arrays or string) in places where arguments are expected.

<br>

```javascript
let myArray1 = [1, 9, 7, 2];
let myArray2 = ['Hello', 'World'];

function foo(param1, param2, param3) {
    console.log(`${param1} ${param2} ${param3}`);
}

// function call with spread operator
foo(...myArray1);       // 1 9 7
foo(...myArray2, '!');  // Hello World !
foo(...'Hello');        // H e l
```

<br>
<br>
<br>
<br>

## **Special Functions**
<br>
<br>
<br>

### **Closure**
<br>

A closure is a function that   
* is defined within another function
* can access scope of enclosing function no matter where closure is executed ([lexical scope](./javascript_scopes.md#lexical-scope-static-scope))

<br>
<br>

**Example:**

<br>

```javascript
function outerFunction() {

	let outerVariable = 'outerVariable';

	function innerFunction() {				// closure
		console.log(outerVariable);
	}

	return innerFunction;
}

const innerFunc = outerFunction();			// reference to instance of innerFunction created on runtime of outerFunction
innerFunc();								// 'outerVariable'					
```

<br>

* closure with nested lexical scopes
  * nested lexical scopes can be accessed by closure 

<br>

```javascript
function topLevel() {

let topLevelProperty = 'topLevelProperty';

	function midLevel() {
		let midLevelProperty = 'midLevelProperty';

		function lowLevel() {
		let lowLevelProperty = 'lowLevelProperty';
			console.log(lowLevelProperty, midLevelProperty, topLevelProperty);
		}

		return lowLevel;
	}

	return midLevel();

}


let closureLowLevel = topLevel();
closureLowLevel();									// 'lowLevelProperty midLevelProperty topLevelProperty'
``` 

<br>
<br>
<br>

### **Generator Function**
<br>

* generators can be paused at specified breakpoints and resumed later
* see [Generators](./javascript_generator.md)

<br>

```javascript
function* generatorFunctionName() {
    // some code 
    yield 'returnValue';
    // some code
    yield 3;
    // some code
}
```

<br>

```javascript
const generator = generatorFunctionName();

generator.next();   // returns {value: 'returnValue', done: false}

generator.next();   // returns {value: 3, done: false}

generator.next();   // returns {value: undefined, done: true}
```

<br>
<br>
<br>
<br>

## **Keyword _this_**
<br>

### **General Use**
<br>

* automatically defined in the scope of every function
* allows reuse of functions in different contexts

<br>
<br>
<br>

### **What _this_ References**
<br>

* _this_ references the context of the invocation of a function at runtime (call site)

<br>

```javascript
function foo() {
    return this.bar.toUpperCase();
}

const obj1 = { bar: 'obj1.barValue' };
const obj2 = { bar: 'obj2.barValue' };

foo.call(obj1);                                          // returns 'OBJ1.BARVALUE'
foo.call(obj2);                                          // returns 'OBJ2.BARVALUE'
```

<br>
<br>
<br>

### **What _this_ Does NOT References**
<br>
<br>

#### **Function Itself**
<br>

```javascript
function foo() {
    this.count++;                       // 'this' references NOT the function! 
}                                       // 'this' references the call context, here the global scope!

foo.count = 0;                          // adds attribute to foo function object

for (let i = 0; i < 5; i++) {
    foo();
}

console.log(foo.count);                 // returns 0, because function foo() increments the variable count in the global scope
```

<br>
<br>
<br>

#### **Definition Context**
<br>

```javascript
function foo() {
    var x = 7;
    bar();
}

function bar() {
    console.log(this.x);                // attempt to access lexical scope of foo() from lexical scope of bar() fails
}                                 

foo();                                  // undefined
```

<br>
<br>
<br>

### **Determination Rules At Call-Site**
<br>
<br>
<br>

#### **Rule 1: Default Binding**
<br>

Default Binding if no other rule applies:

* _this_ references the global object
* NOTE: _this_ is undefined when content of function is in _strict mode_!

<br>

```javascript
function foo() {
    console.log(this.x);
}

var x = 156;                        // global variable

foo();                              // call site: global; returns 156
```

<br>
<br>
<br>

#### **Rule 2.1: Implicit Binding**
<br>

* _this_ references last context object in the call site chain

<br>

```javascript
function foo() {
    console.log(this.x);
}

let obj2 = {
    x: 234,
    foo: foo
};

let obj1 = {
    x: 32,
    obj2: obj2
};

obj1.obj2.foo();                // call site chain: 'this' references obj2. Returns 234.
```

<br>
<br>
<br>

#### **Rule 2.2: Implicity Lost**
<br>

* alias to implicit bound function loses the binding 

<br>

```javascript
function foo() {
    console.log(this.x);
}

let obj = {
    x: 'obj',
    foo: foo
};

var x = 'global';               // global variable

let alias = obj.foo;            // alias to function foo() with implicit binding to obj

alias();                        // explicit binding to obj is lost --> default binding applies --> returns 'global'
```

<br>
<br>
<br>

#### **Rule 3.1: Explicit Binding**
<br>

* explicitly bound _this_ can still be overwritten

```javascript
functionName.call([thisArgument], [argument1], ..., [argumentN]);
functionName.apply(thisArgument, [argsArray]);
```

<br>
<br>
<br>

#### **Rule 3.2: Hard Binding**
<br>

* forces invocation of a function with provided binding
* hard binding can not be overwritten

<br>

```javascript
function foo() {
    console.log(this.x);
}

let obj = {x: 345};

let boundFoo = foo.bind(obj);

boundFoo();                          // Uses hard bound reference. Returns 345

boundFoo.call(window);               // Hard bound reference can not be overwritten. Returns 345
```

<br>
<br>
<br>

#### **Rule 4: _new_ Binding**
<br>

* constructors are regular functions that are called with a preceeding _new_ operator
  * constructor = construction call of function

<br>

* invocation of a function with _new_ operator triggers the following actions:
  * create new object
  * link new object to prototype
  * set _this_ binding to new object for the function call
  * return created object

<br>
<br>
<br>

### **Precedence Of Rules**
<br>

1. new binding
2. explicit binding
3. implicit binding
4. default binding

<br>
<br>
<br>

### **Binding Exceptions**
<br>
<br>
<br>

#### **Ignore _this_**
<br>

* methods: call, apply and bind
  * passing _null_ or _undefined_ to _this_ parameter is ignored
  * default binding is applied instead

<br>

```javascript
function foo() {
    console.log(this.x);
}

var x = 2;

foo.call(undefined);            // default binding applies. Returns 2
foo.call(null);                 // default binding applies. Returns 2
```

<br>

* better alternative: 
  * pass empty object to _this_ parameter
  * helps preventing side effects

<br>

```javascript
function foo() {
    console.log(this.x);
}

var x = 2;
let emptyObject = Object.create(null);

foo.call(emptyObject);
```

<br>
<br>
<br>

#### **Indirection**
<br>

* default binding rules applies to indirect references to functions

<br>

```javascript
function foo() {
    console.log(this.x);
}

var x = 324;

var obj1 = {x: 123,
            foo: foo};

var obj2 = {x: 76};

obj1.foo();                     // implicit binding to obj1. Returns 123

(obj2.foo = obj1.foo)();        // indirect reference to obj1.foo. Returns 324 according to default binding rule
```

<br>
<br>
<br>

#### **Lexical _this_**
<br>

* arrow functions are _this_ bound to their enclosing scope (definition scope)

<br>

```javascript
var x = 'global x';

let arrowFunction = () => console.log(this.x);

let obj = {x: 'object x'};

arrowFunction.call(obj);        // returns 'global x', because arrowFunction is bound to its definition scope
```

<br>
<br>
<br>
<br>

## **Methods**

<br>
<br>
<br>

### **bind()**
<br>

* returns copy of a function which uses the specified _this_ argument
* optional arguments are prepended to the arguments of the bound function

<br>

```javascript
bind(thisArgument, [argument1], ..., [argumentN])
```

<br>

Example:
 
```javascript
this.a = 'value of global.a';


const obj = {
    a: 'value of obj.a',
    foo: function() { return this.a; }
}


obj.foo();                                          // returns 'value of obj.a', because foo is called on obj --> this references obj

const unboundFoo = obj.foo;
unboundFoo();                                       // returns 'value of global.a', because unboundFoo --> foo is called on global scope

const boundFoo = unboundFoo.bind(obj);              // create function where this references obj again
boundFoo();                                         // returns 'value of obj.a'
```

<br>

Example with optional arguments:

```javascript
function sum(number1, number2) { return number1 + number2; }

const boundSum = sum.bind(null, 10);                // preset leading argument to 10

boundSum(5);                                        // returns 15 = 10 + 5

boundSum(3, 4);                                     // returns 13 = 10 + 3; argument 4 is ignored
```

<br>
<br>
<br>

### **apply()**
<br>

* calls function with specified _this_ argument 
* calls function with arguments from optional array / array-like object _arguments_
* returns result of function

<br>

```javascript
apply(thisArgument, [argsArray])
```

<br>

```javascript
function foo(start, end) {
    return `${start} ${this.attribute} ${end}`;
}

const obj = {attribute: 'bar'}

foo.apply(obj, ['foo', 'tar']);                     // returns 'foo bar tar'
```

<br>
<br>
<br>

### **call()**
<br>

* calls function with specified _this_ argument
* optional arguments are prepended to the arguments of to the bound function
* returns result of function call

<br>

```javascript
call([thisArgument], [argument1], ..., [argumentN])
```

<br>

Example:

```javascript
const objArray = [{a: 'a1'}, {a: 'a2'}, {a: 'a3'}];

function printProperty() {
    console.log(this.a);
}

for (let obj of objArray) {
    printProperty.call(obj);
}

// output:  a1    a2    a3
```