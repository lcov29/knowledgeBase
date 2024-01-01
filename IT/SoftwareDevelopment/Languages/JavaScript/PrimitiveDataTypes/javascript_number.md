# **JavaScript Number**
<br>

## **Table Of Contents**
<br>

- [**JavaScript Number**](#javascript-number)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Number Systems**](#number-systems)
    - [**Decimal**](#decimal)
    - [**Binary**](#binary)
    - [**Octal**](#octal)
    - [**Hexadecimal**](#hexadecimal)
  - [**Properties**](#properties)
    - [**Number.MIN\_VALUE**](#numbermin_value)
    - [**Number.MAX\_VALUE**](#numbermax_value)
    - [**Number.NEGATIVE\_INFINITY**](#numbernegative_infinity)
    - [**Number.POSITIVE\_INFINITY**](#numberpositive_infinity)
  - [**Operators**](#operators)
    - [**Arithmetic**](#arithmetic)
      - [**Addition (+)**](#addition-)
      - [**Subtraction (-)**](#subtraction--)
      - [**Multiplication (\*)**](#multiplication-)
      - [**Division (/)**](#division-)
      - [**Modulo (%)**](#modulo-)
      - [**Exponential (\*\*)**](#exponential-)
      - [**Increment (++)**](#increment-)
      - [**Decrement (--)**](#decrement---)
    - [**Comparison**](#comparison)
      - [**Equal (==)**](#equal-)
      - [**Strict Equal (===)**](#strict-equal-)
      - [**Unequal (!=)**](#unequal-)
      - [**Strict Unequal (!==)**](#strict-unequal-)
      - [**Greater Than (\>)**](#greater-than-)
      - [**Greater Than Or Equal (\>=)**](#greater-than-or-equal-)
      - [**Less Than (\<)**](#less-than-)
      - [**Less Than Or Equal (\<=)**](#less-than-or-equal-)
  - [**Inaccuracy**](#inaccuracy)
    - [**Integer**](#integer)
    - [**Floating Point Arithmetic**](#floating-point-arithmetic)

<br>
<br>
<br>
<br>

## **General**

* Numbers are stored as 64-bit double precision floating point numbers.
* Integers are accurate up to 15 digits.
* Maximum number of decimals is 17
* Floating point arithmetic can be unprecise
* Invalid calculations return _NaN_  (**N**ot **a** **N**umber)

<br>
<br>
<br>
<br>

## **Number Systems**
<br>
<br>

### **Decimal**
<br>

|Base | Digits |
|:---:|:------:|
|10   |0 - 9   |

<br>

```javascript
24
3.14
-4.2
1_000;      // optional separator
```

<br>
<br>

### **Binary**
<br>

|Base |Digits |Prefix |
|:---:|:-----:|:-----:|
|2    |0, 1   |0b     |

<br>

```javascript
0b01011
0b1101_0100    // optional separator
```

<br>
<br>

### **Octal**
<br>

|Base |Digits |Prefix |
|:---:|:-----:|:-----:|
|8    |0 - 7  |0      |

<br>

```javascript
011147
```

<br>
<br>

### **Hexadecimal**
<br>

|Base  |Digits       |Prefix |
|:----:|:-----------:|:-----:|
|16    |0 - 9, A - F |0x     |

<br>

```javascript
0xF;
0xAF_BC_C0;    // optional separator
```

<br>
<br>
<br>
<br>

## **Properties**
<br>
<br>

### **Number.MIN_VALUE**
<br>

```javascript
Number.MIN_VALUE;    // 5e-324
```

<br>
<br>

### **Number.MAX_VALUE**
<br>

```javascript
Number.MAX_VALUE     // 1.7976931348623157e+308
```

<br>
<br>

### **Number.NEGATIVE_INFINITY**
<br>

```javascript
Number.NEGATIVE_INFINITY      // -Infinity
```

<br>
<br>

### **Number.POSITIVE_INFINITY**
<br>

```javascript
Number.POSITIVE_INFINITY      // Infinity
```

<br>
<br>
<br>
<br>

## **Operators**
<br>
<br>
<br>

### **Arithmetic**
<br>
<br>

#### **Addition (+)**
<br>

```javascript
2 + 5 = 7
```

<br>
<br>

#### **Subtraction (-)**
<br>

```javascript
2 - 5 = -3
```

<br>
<br>

#### **Multiplication (*)**
<br>

```javascript
3 * 5 = 15
```

<br>
<br>

#### **Division (\/)**
<br>

```javascript
5 / 3 = 1.6666666666666667
```

<br>
<br>

#### **Modulo (%)**
<br>

```javascript
5 % 3 = 2
```

<br>
<br>

#### **Exponential (\*\*)**
<br>

```javascript
2 ** 3 = 8
```

<br>
<br>

#### **Increment (++)**
<br>

```javascript
x++;
```
- increments x by 1
- returns value of x **before** incrementation

<br>

```javascript
++x;
```
- increments x by 1
- returns value of x **after** incrementation

<br>
<br>

#### **Decrement (--)**
<br>

```javascript
x--;
```
- decrements x by 1
- returns value of x **before** decrementation

<br>

```javascript
--x;
```
- decrements x by 1
- returns value of x **after** decrementation

<br>
<br>
<br>

### **Comparison**
<br>
<br>

#### **Equal (==)**
<br>

Checks equality of two operands **without** checking for type equality.

```javascript
3 == 3    // true

3 == '3'  // true
```

<br>
<br>

#### **Strict Equal (===)**
<br>

Checks equality of two operands by both value and type.

```javascript
3 === 3    // true

3 === '3'  // false
```

<br>
<br>

#### **Unequal (!=)**
<br>

Checks inequality of two operands **without** checking for type equality.

```javascript
3 != 5    // true

3 != '5'  // true
```

<br>
<br>

#### **Strict Unequal (!==)**
<br>

Checks inequality of two operands of the same type.

```javascript
3 !== 5    // true

3 !== '5'  // false
```

<br>
<br>

#### **Greater Than (>)**
<br>

Checks if left operand is greater than right operand.

```javascript
3 > 5     // false

5 > 3     // true
```

<br>
<br>

#### **Greater Than Or Equal (>=)**
<br>

Checks if left operand is greater than right operand or equal.

```javascript
3 >= 5     // false

5 >= 3     // true

4 >= 4     // true
```

<br>
<br>

#### **Less Than (<)**
<br>

Checks if left operand is less than right operand.

```javascript
3 < 5     // true

5 < 3     // false
```

<br>
<br>

#### **Less Than Or Equal (<=)**
<br>

Checks if left operand is less than right operand or equal.

```javascript
3 <= 5     // true

5 <= 3     // false

4 <= 4     // true
```

<br>
<br>
<br>
<br>

## **Inaccuracy**
<br>
<br>

### **Integer**
<br>

```javascript
const x = 999999999999999;    
// 999999999999999 (15 digits)
```

<br>

```javascript
const x = 9999999999999999;
// 10000000000000000 (16 digits)
```

<br>
<br>

### **Floating Point Arithmetic**
<br>

```javascript
const x = 0.2 + 0.1;
// 0.30000000000000004
```

<br>

```javascript
const x = (0.2*10 + 0.1*10) / 10;
// 0.3
```