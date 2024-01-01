# **JavaScript Undefined**
<br>

## **Table Of Contents**
<br>

- [**JavaScript Undefined**](#javascript-undefined)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Operators**](#operators)
    - [**Logical Nullish Assignment (??=)**](#logical-nullish-assignment-)
    - [**Nullish Coalescing Operator (??)**](#nullish-coalescing-operator-)

<br>
<br>
<br>

## **General**
<br>

- is a primitive value
- represents the absence of a value
- is considered as `falsy`

<br>
<br>
<br>

## **Operators**
<br>
<br>

### **Logical Nullish Assignment (??=)**
<br>

Assign specified value to right-hand operand if its current value is `null` or `undefined`.

```javascript
let foo = undefined;

foo ??= 'someValue';    // someValue
```

<br>

```javascript
let foo = 'foo';

foo ??= 'someValue';    // foo
```

<br>
<br>

### **Nullish Coalescing Operator (??)**
<br>

- returns left-hand operand if it is not `null` or `undefined`
- returns right-hand operand if left-hand operand is `null` or `undefined`

```javascript
'foo' ?? 'bar';           // foo
```

<br>

```javascript
undefined ?? 'someValue'; // someValue
```