# **JavaScript Type System**
<br>

## **Table Of Contents**
<br>

- [**JavaScript Type System**](#javascript-type-system)
  - [**Table Of Contents**](#table-of-contents)
  - [**Data Types**](#data-types)
  - [**Type System**](#type-system)
    - [**Dynamic**](#dynamic)
    - [**Weak**](#weak)
  - [**Operators**](#operators)
    - [**Determine Type (typeof)**](#determine-type-typeof)

<br>
<br>
<br>

## **Data Types**
<br>

|Type           |Description                                            |
|:--------------|:------------------------------------------------------|
|number         |stored as 64-bit double precision floating point number|
|string         |collection of characters                               |
|boolean        |binary data type (_true_ and _false_)                  |
|symbol         |used to define unique and immutable values             |
|null           |represent empty object                                 |
|undefined      |default value of uninitialized variable                |
|object         |collection of key-value pairs                          |


<br>
<br>
<br>

## **Type System**
<br>
<br>

### **Dynamic**
<br>

JavaScript has a dynamic type system (also: loose typed).

That means that the type of a variable is defined by its assigned valeue and can therefore change during the runtime of the program.

<br>

```javascript
let foo = 'foo';    // type foo: string

foo = 4;            // type foo: number

foo = false;        // type foo: boolean
```

<br>
<br>

### **Weak**
<br>

JavaScript has a weak type system (also: weakly typed).

That means that types can be implicitly casted to another type if necessary.

<br>

```javascript
const foo = 'foo';
const bar = 5 + foo;  // '5foo', because 5 is implicitly casted to a string
```

<br>
<br>
<br>

## **Operators**
<br>
<br>

### **Determine Type (typeof)**
<br>

Returns the type of the operand as a string.

```javascript
typeof 'foo';       // 'string'

typeof 5;           // 'number'

typeof false;       // 'boolean;

typeof undefined;   // 'undefined'

typeof {};          // 'object'
```

<br>

**BUG**: null is determined to be an object

```javascript
typeof null;        // 'object'
```