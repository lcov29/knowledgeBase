# **TypeScript Functions**
<br>

## **Table Of Contents**
<br>

- [**TypeScript Functions**](#typescript-functions)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Parameters**](#parameters)
    - [**Optional Parameters**](#optional-parameters)
    - [**Default Parameter Value**](#default-parameter-value)
    - [**Rest Parameters**](#rest-parameters)
    - [**_this_ Parameter**](#this-parameter)
  - [**Function Typing**](#function-typing)
    - [**Function Type Expressions**](#function-type-expressions)
    - [**Call Signatures**](#call-signatures)
  - [**Overload Signatures**](#overload-signatures)
    - [**Overload Function Expressions**](#overload-function-expressions)
    - [**Overload Function Declarations**](#overload-function-declarations)
  - [**Generator Function**](#generator-function)

<br>
<br>
<br>

## **General**
<br>

* always explicitly annotate the parameters
* avoid explicitly annotating the return value

```
function <functionName>(<parameterName>: <parameterType, ...)[: <returnType>]
```

<br>

```typescript
function foo(param1: string, param2: number) {
	// implementation
}
```

<br>
<br>
<br>

## **Parameters**
<br>
<br>

### **Optional Parameters**
<br>

* if not specified, optional parameter is _undefined_

```
function <functionName>(<optionalParameterName>?: <optionalParameterType)
```

```typescript
function foo(param1: string, optionalParam?: string) {
	// implementation
}
```

<br>
<br>

### **Default Parameter Value**
<br>

```
function <functionName>(<parameterName> = <defaultValue>)
```

```typescript
function foo(param1 = 'bar') {
	// implementation
}
```

<br>
<br>

### **Rest Parameters**
<br>

```
function <functionName>(...<restParameterName>: <elementType>[])
```

```typescript
function foo(param1: string, ...restParamList: number[]) {
	// implementation
}
```

<br>
<br>

### **_this_ Parameter**
<br>

The `this` parameter an implicit parameter usually referencing the caller of the function [see here](../JavaScript/javascript_function.md#keyword-this).

If we decide to use `this` inside of a function that is not a class method it is recommended to explicitly add it to the parameters and assign it a type.

<br>

```
function foo(this: <type>, <parameterName1>: <parameterValue>, ...)
```

```typescript
function foo(this: Date, bar: string) {
    // implementation using parameter this
}
```

<br>
<br>
<br>

## **Function Typing**
<br>
<br>

### **Function Type Expressions**
<br>

* allows to describe the type of a function signature

```
(<parameterName1>: <parameterType>, ...) => <returnType>
```

<br>

```typescript
function execute(fn: (a: string, b: string) => string) {
  const result = fn('John', 'Doe');
  console.log(result);
}

function greet(firstName: string, lastName: string) {
  return `Hello ${firstName} ${lastName}`;
}

function sum(value1: number, value2: number) {
  return value1 + value2;
}

execute(greet);
//Hello John Doe
execute(sum);
//error TS2345: Argument of type '(value1: number, value2: number) => number' is not assignable to parameter of type '(a: string, b: string) => string'.
```

<br>
<br>

### **Call Signatures**
<br>

* allows to describe the type of a function signature
* allows to describe additional properties of a function

```
type <signatureName> = {
  <propertyName>: <propertyType>;
  ...
  (<parameterName1>: <parameterType>, ...): <returnType>;
}
```

<br>

```typescript
type greetingFunction = {
  description: string;
  (firstName: string, lastName: string): string;
}

const greet : greetingFunction = function(firstName, lastName) {
  return `Hello ${firstName} ${lastName}`;
}
greet.description = 'A simple function to casually greet people';


const welcome: greetingFunction = function(firstName, lastName) {
  return `Welcome ${firstName} ${lastName}`;
}
welcome.description = 'A simple function to welcome people';


function greetJohnDoe(fn: greetingFunction) {
  console.log(`
    ${fn('John', 'Doe')}
    (${fn.description})
  `);
}


greetJohnDoe(greet);
greetJohnDoe(welcome);
```

<br>
<br>
<br>

## **Overload Signatures**
<br>

* allows adding different signatures to a function
* implementation has to work with the combined types of all signatures
* check types and optional parameters in implementation

<br>
<br>

### **Overload Function Expressions**
<br>

```typescript
type overloadedSignature = {
  (a: string): string
  (a: number, b: number): string
}


// implementation needs to work with combination of signatures of type overloadedSignature
let foo: overloadedSignature = function(a: string | number, b?: number): string {
  if (typeof a === 'number' && b !== undefined) {
    return `${a + b}`;
  }

  return `foo() was called with string argument ${a}`;
};


foo('Hello World');     // 'foo() was called with string argument Hello World'
foo(12, 32);            // '44'
foo('Hello', 12);       // error TS2345: Argument of type 'string' is not assignable to parameter of type 'number'
```

<br>
<br>

### **Overload Function Declarations**
<br>

```typescript
function foo(a: string): string                             // external signature
function foo(a: number, b: number): string                  // external signature
function foo(a: string | number, b?: number) : string {     // internal combination signature
  if (typeof a === 'number' && b !== undefined) {
    return `${a + b}`;
  } 

  return `foo() was called with string argument ${a}`;
}

foo('Hello World');     // 'foo() was called with string argument Hello World'
foo(12, 32);            // '44'

foo('Hello', 12);       
// error TS2345: Argument of type 'string' is not assignable to parameter of type 'number'. 
// The call would have succeeded against this implementation, but implementation signatures of overloads are not externally visible.

```

<br>
<br>
<br>

## **Generator Function**
<br>

```
function* <functionName>(): IterableIterator<<type>> {
	// implementation
}
```

```typescript
function* createCounter(): IterableIterator<number> {
  let counter = 0;
  while(true) {
    yield counter++;
  }
}

const counter = createCounter();
console.log(counter.next());            // { value: 0, done: false }
console.log(counter.next());            // { value: 1, done: false }
console.log(counter.next());            // { value: 2, done: false }
```