# **JavaScript Null**
<br>

## **Table Of Contents**
<br>

- [**JavaScript Null**](#javascript-null)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Bug: _Null_ is considered as Object**](#bug-null-is-considered-as-object)
  - [**Operators**](#operators)
    - [**Logical Nullish Assignment (??=)**](#logical-nullish-assignment-)
    - [**Nullish Coalescing Operator (??)**](#nullish-coalescing-operator-)

<br>
<br>
<br>

## **General**
<br>

- is a primitive value
- represents intentional absent object
- is considered as `falsy`

<br>
<br>
<br>

## **Bug: _Null_ is considered as Object**
<br>

```javascript
typeof null;      // object
```

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
let foo = null;

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
'foo' ?? 'bar';         // foo
```

<br>

```javascript
null ?? 'someValue';    // someValue
```