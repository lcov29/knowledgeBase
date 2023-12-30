# **JavaScript Variable And Constants**
<br>

## **Table Of Contents**
<br>

- [**JavaScript Variable And Constants**](#javascript-variable-and-constants)
  - [**Table Of Contents**](#table-of-contents)
  - [**Names**](#names)
    - [**Valid Characters**](#valid-characters)
    - [**Case Sensitive**](#case-sensitive)
  - [**Declaration Keywords**](#declaration-keywords)
    - [**Overview**](#overview)
    - [**Var**](#var)
      - [**Function Scoped**](#function-scoped)
      - [**Module Scoped**](#module-scoped)
      - [**Global Scoped**](#global-scoped)
      - [**Declarable Without Assignment**](#declarable-without-assignment)
      - [**Reassignable**](#reassignable)
      - [**Redeclarable**](#redeclarable)
      - [**Hoisted**](#hoisted)
    - [**Let**](#let)
      - [**Block Scoped**](#block-scoped)
      - [**Declarable Without Assignment**](#declarable-without-assignment-1)
      - [**Reassignable**](#reassignable-1)
      - [**Not Redeclarable**](#not-redeclarable)
      - [**Not Hoisted**](#not-hoisted)
    - [**Const**](#const)
      - [**Block Scoped**](#block-scoped-1)
      - [**Not Declarable Without Assignment**](#not-declarable-without-assignment)
      - [**Not Reassignable**](#not-reassignable)
      - [**Not Redeclarable**](#not-redeclarable-1)
      - [**Not Hoisted**](#not-hoisted-1)
  - [**Assignment Operators**](#assignment-operators)
    - [**Standard Assignment (_=_)**](#standard-assignment-)
    - [**Compound Assignments**](#compound-assignments)
      - [**String**](#string)
        - [**Concatenation Assignment (+=)**](#concatenation-assignment-)
      - [**Number**](#number)
        - [**Addition Assignment (+=)**](#addition-assignment-)
        - [**Subtraction Assignment (-=)**](#subtraction-assignment--)
        - [**Multiplication Assignment (\*=)**](#multiplication-assignment-)
        - [**Division Assignment (/=)**](#division-assignment-)
        - [**Modulo Assignment (%=)**](#modulo-assignment-)
        - [**Power-Of Assignment (\*\*=)**](#power-of-assignment-)
      - [**Logic**](#logic)
        - [**Logical And Assignment (\&\&=)**](#logical-and-assignment-)
        - [**Logical Or Assignment (||=)**](#logical-or-assignment-)
        - [**Logical Nullish Assignment (??=)**](#logical-nullish-assignment-)

<br>
<br>
<br>

## **Names**
<br>
<br>

### **Valid Characters**
<br>

**First character**
- alphabetical character
- underscore (_)
- dollar sign ($)

<br>

**Subsequent characters**
- alphabetical character
- numbers
- underscore (_)
- dollar sign ($)

<br>
<br>

### **Case Sensitive**
<br>

Names of variables and constants are **case sensitive**.

<br>

```javascript
const foo = 'A';
const Foo = 'B';

foo   // A
Foo   // B
```

<br>
<br>
<br>

## **Declaration Keywords**
<br>
<br>

### **Overview**
<br>

|                                  |**var**         |**let**|**const**
|:---------------------------------|:---------------|:------|:----
|**Scope**                         |[function](#function-scoped), [module](#module-scoped) or [global](#global-scoped)|[block](#block-scoped)  |[block](#block-scoped-1)
|**Declarable Without Assignment** |[yes](#declarable-without-assignment)             |[yes](#declarable-without-assignment-1)    |[no](#not-declarable-without-assignment)
|**Reassignable**                  |[yes](#reassignable)             |[yes](#reassignable-1)    |[no](#not-reassignable)
|**Redeclarable**                  |[yes](#redeclarable)             |[no](#not-redeclarable)     |[no](#not-redeclarable-1)
|**Hoisted**                       |[yes](#hoisted)             |[no](#not-hoisted)     |[no](#not-hoisted-1)

<br>
<br>

### **Var**
<br>

```javascript
var foo = 3;
```

<br>
<br>

#### **Function Scoped**
<br>

Variables declared with `var` inside a function are **function scoped**:

```javascript
function foo(bool) {
   console.log(bar);
   if (bool) {
      var bar = 'bar';
   }
}
```

```javascript
foo(true);        // bar
foo(false);       // bar
```

The scope of the variable `bar` is the function `foo`. Although `bar` is declared within an if-block inside of `foo`, the declaration is hoisted to the top level of the function. Therefore it can be accessed from everywhere inside of `foo`.

<br>
<br>

#### **Module Scoped**
<br>

Variables declared with `var` inside a module are **module scoped**:

<br>

foo.module.mjs
```javascript
var foo = 'foo';

export function bar() {
  // can access foo
}

export function baz() {
  // can access foo
}
```

<br>
<br>

#### **Global Scoped**
<br>

Variables declared with `var` in a script are **global scoped**:

<br>

script.js
```javascript
var foo = 'foo';
```
- `foo` is added to the global object

<br>
<br>

#### **Declarable Without Assignment**
<br>

Variable can be declared without an assigned value:

```javascript
var foo;
console.log(foo);    // undefined                        
```

<br>
<br>

#### **Reassignable**
<br>

Variable can be assigned a new value:

```javascript
var foo = 'foo';
foo = 'bar'
console.log(foo);    // bar
```

<br>
<br>

#### **Redeclarable**
<br>

Variable can be redeclared:

```javascript
var foo = {};
var foo = 'foo';
console.log(foo);    // foo
```

<br>

Redeclaring without reassigning does not change the value:

```javascript
var foo = 'foo';
var foo;
console.log(foo);   // foo
```

<br>
<br>

#### **Hoisted**
<br>

Variable declaration is hoisted to the top of its scope:

```javascript
console.log(foo);    // foo
var foo = 'foo';
```

<br>
<br>

### **Let**
<br>

```javascript
let foo = 3;
```

<br>
<br>

#### **Block Scoped**
<br>

```javascript
function foo(bool) {
   console.log(bar);
   if (bool) {
      let bar = 'bar';
   }
}
```

```javascript
foo(true);     // Uncaught ReferenceError: bar is not defined
foo(false);    // Uncaught ReferenceError: bar is not defined
```

The scope of the variable `bar` is limited to its declaration block (here: if-block). Therefore it can only be accessed witin this block.

<br>
<br>

#### **Declarable Without Assignment**

Variable can be declared without an assigned value:

```javascript
let foo;
console.log(foo);    // undefined                        
```

<br>
<br>

#### **Reassignable**
<br>

Variable can be assigned a new value:

```javascript
let foo = 'foo';
foo = 'bar';
console.log(foo);    // bar
```

<br>
<br>

#### **Not Redeclarable**
<br>

Variable can not be redeclared:

```javascript
let foo = {};
let foo = 'foo';  // Uncaught SyntaxError: Identifier 'foo' has already been declared
```

<br>
<br>

#### **Not Hoisted**
<br>

Variable declaration is not hoisted to the top of its scope:

```javascript
console.log(foo);    // Uncaught ReferenceError: foo is not defined
let foo = 'foo';
```

<br>
<br>

### **Const**
<br>

```javascript
const foo = 3;
```

<br>
<br>

#### **Block Scoped**
<br>

```javascript
function foo(bool) {
   console.log(bar);
   if (bool) {
      const bar = 'bar';
   }
}
```

```javascript
foo(true);     // Uncaught ReferenceError: bar is not defined
foo(false);    // Uncaught ReferenceError: bar is not defined
```

The scope of the constant `bar` is limited to its declaration block (here: if-block). Therefore it can only be accessed witin this block.

<br>
<br>

#### **Not Declarable Without Assignment**

Constant can not be declared without an assigned value:

```javascript
const foo;     // Uncaught SyntaxError: Missing initializer in const declaration
```

<br>
<br>

#### **Not Reassignable**
<br>

Constant can not be assigned a new value:

```javascript
const foo = 'foo';
foo = 'bar';      // Uncaught SyntaxError: Identifier 'foo' has already been declared
```

<br>
<br>

#### **Not Redeclarable**
<br>

Constant can not be redeclared:

```javascript
const foo = {};
const foo = 'foo';  // Uncaught SyntaxError: Identifier 'foo' has already been declared
```

<br>
<br>

#### **Not Hoisted**
<br>

Constant declaration is not hoisted to the top of its scope:

```javascript
console.log(foo);    // Uncaught ReferenceError: foo is not defined
const foo = 'foo';
```

<br>
<br>
<br>

## **Assignment Operators**
<br>
<br>

### **Standard Assignment (_=_)**
<br>

```javascript
let foo = 'foo';
```

<br>
<br>

### **Compound Assignments**
<br>
<br>

#### **String**
<br>
<br>

##### **Concatenation Assignment (+=)**
<br>

```javascript
let foo = 'foo';
foo += 'bar';     // foobar
```
- concatenates the specified string to content of `foo`

<br>
<br>

#### **Number**
<br>
<br>

##### **Addition Assignment (+=)**
<br>

```javascript
let foo = 1;
foo += 5;      // 6
```
- increment the value of `foo` by the specified number

<br>
<br>

##### **Subtraction Assignment (-=)**
<br>

```javascript
let foo = 7;
foo -= 5;      // 2
```
- decrement the value of `foo` by the specified number

<br>
<br>

##### **Multiplication Assignment (*=)**
<br>

```javascript
let foo = 7;
foo *= 3;      // 21
```
- multiply the value of `foo` by the specified number

<br>
<br>

##### **Division Assignment (/=)**
<br>

```javascript
let foo = 7;
foo /= 2;      // 3.5
```
- divide the value of `foo` by the specified number

<br>
<br>

##### **Modulo Assignment (%=)**
<br>

```javascript
let foo = 7;
foo %= 4;      // 3
```
- assign the modulo of `foo` and the specified number to `foo`

<br>
<br>

##### **Power-Of Assignment (\*\*=)**
<br>

```javascript
let foo = 2;
foo **= 3;     // 8
```
- assign `2^3` to `foo`

<br>
<br>

#### **Logic**
<br>
<br>

##### **Logical And Assignment (&&=)**
<br>

```javascript
let foo = 0;
let bar = 'bar';

foo &&= 'someValue';    // 0
bar &&= 'someValue';    // someValue
```
- assign specified value if current value is **truthy**

<br>
<br>

##### **Logical Or Assignment (||=)**
<br>

```javascript
let foo = 0;
let bar = 'bar';

foo ||= 'someValue';    // someValue
bar ||= 'someValue';    // bar
```
- assign specified value if current value is **falsy**

<br>
<br>

##### **Logical Nullish Assignment (??=)**
<br>

```javascript
let foo = null;
let bar = undefined;
let baz = 'baz';

foo ??= 'someValue';    // someValue
bar ??= 'someValue';    // someValue
baz ??= 'baz';          // baz
```
- assign specified value if current value is **null** or **undefined**