# **JavaScript Boolean**
<br>

## **Table Of Contents**
<br>

- [**JavaScript Boolean**](#javascript-boolean)
  - [**Table Of Contents**](#table-of-contents)
  - [**Operators**](#operators)
    - [**Logical And (\&\&)**](#logical-and-)
      - [**Short Circuit**](#short-circuit)
    - [**Logical Or (||)**](#logical-or-)
      - [**Short Circuit**](#short-circuit-1)
    - [**Logical Negation (!)**](#logical-negation-)
  - [**Nonboolean Operands (Truthy / Falsy)**](#nonboolean-operands-truthy--falsy)
    - [**Operands Interpreted As False (Falsy)**](#operands-interpreted-as-false-falsy)
      - [**Number Zero**](#number-zero)
      - [**Empty String**](#empty-string)
      - [**Null**](#null)
      - [**Undefined**](#undefined)
      - [**NaN**](#nan)
    - [**Operands Interpreted As True (Truthy)**](#operands-interpreted-as-true-truthy)

<br>
<br>
<br>

## **Operators**
<br>
<br>

### **Logical And (&&)**
<br>

```javascript
const x = true && true;    // true
const y = true && false;   // false
const z = false && false;  // false
```

<br>

#### **Short Circuit**
<br>

> Short circuiting means aborting the evaluation of a boolean expression when its value can not change anymore.
>
> The expression is evaluated from left to right.  
> The first false or falsy operand is returned and the evaluation is aborted.  
> If all operands are true or truthy, the last operand is returned.

<br>

Short circuiting is especially useful for nonboolean operands:

```javascript
0 && 'foo';          // 0
```
- since `0` is falsy, the whole expression is short circuited and returns `0`

<br>

```javascript
15 && 'foo';         // foo
```
- since both `15` and `foo` are truthy, the last operand `foo` is returned

<br>
<br>

### **Logical Or (||)**
<br>

```javascript
const x = true || true;    // true
const y = true || false;   // true
const z = false || false;  // false
```

<br>

#### **Short Circuit**
<br>

> Short circuiting means aborting the evaluation of a boolean expression when its value can not change anymore.
>
> The expression is evaluated from left to right.  
> The first true or truthy operand is returned and the evaluation is aborted.  
> If all operands are false or falsy, the last operand is returned.

<br>

Short circuiting is especially useful for nonboolean operands:

```javascript
'foo' || 0;       // foo
```
- since `foo` is truthy, the whole expression is short circuited and returns `foo`

<br>

```javascript
'' || 0;         // 0
```
- since both `''` and `0` are falsy, the last operand `0` is returned


<br>
<br>

### **Logical Negation (!)**
<br>

```javascript
const x = !true;        // false
const y = !false;       // true
```

<br>
<br>
<br>

## **Nonboolean Operands (Truthy / Falsy)**
<br>

When nonboolean values are used as operands of boolean operators, they are interpreted to a boolean value.

<br>
<br>

### **Operands Interpreted As False (Falsy)**
<br>
<br>

#### **Number Zero**
<br>

|Value     |Description                                   |
|:---------|:---------------------------------------------|
|0         |number zero in all variants like 0.0, 0x0 etc.|
|-0        |number negative zero in all variants          |
|0n        |BigInt zero                                   |

<br>

```javascript
0 || false;     // false
```
- because `0` is interpreted as `false`

<br>
<br>

#### **Empty String**
<br>

```javascript
'' || false;    // false
```
- because empty string `''` is interpreted as `false`

<br>
<br>

#### **Null**
<br>

```javascript
null || false;    // false
```
- because `null` is interpreted as `false`

<br>
<br>

#### **Undefined**
<br>

```javascript
undefined || false;    // false
```
- because `undefined` is interpreted as `false`

<br>
<br>

#### **NaN**
<br>

```javascript
NaN || false;        // false
```
- because `NaN` is interpreted as `false`

<br>
<br>

### **Operands Interpreted As True (Truthy)**
<br>

All operands that are not interpreted as `falsy`.