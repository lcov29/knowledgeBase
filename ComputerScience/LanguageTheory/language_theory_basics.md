# **Language Theory - Basics**
<br>

## **Table Of Contents**
<br>

- [**Language Theory - Basics**](#language-theory---basics)
  - [**Table Of Contents**](#table-of-contents)
  - [**Definitions**](#definitions)
    - [**Variable**](#variable)
    - [**Literal Value**](#literal-value)
    - [**Operators**](#operators)
    - [**Statements**](#statements)
    - [**Expression**](#expression)
      - [**Literal Value Expression**](#literal-value-expression)
      - [**Variable Expression**](#variable-expression)
      - [**Arithmetic Expression**](#arithmetic-expression)
      - [**Assignment Expression**](#assignment-expression)
      - [**Expression Statement**](#expression-statement)
      - [**Call Expression Statement**](#call-expression-statement)
    - [**Program**](#program)
    - [**Interpreter**](#interpreter)
    - [**Compiler**](#compiler)

<br>
<br>
<br>

## **Definitions**
<br>
<br>

### **Variable**
<br>

> Symbolic placeholder for a value

<br>
<br>

### **Literal Value**
<br>

> A literal value is a value that is not stored in a variable

<br>
<br>

### **Operators**
<br>

> Operation that maps one or more input values to an output value


<br>
<br>

### **Statements**
<br>

> A statement is a group of values and operators that performs a specific task

<br>
<br>

### **Expression**
<br>

> An expression is an invocation of
> - a value **or**
> - an operator with literal values or variables

<br>
<br>

#### **Literal Value Expression**
<br>

> A literal value expression is the simple use of a literal value

<br>

```javascript
'foo'
```

<br>
<br>

#### **Variable Expression**
<br>

> A variable expression is the invocation of a variable

<br>

```javascript
foo
```

<br>
<br>

#### **Arithmetic Expression**
<br>

> An arithmetic expression is the invocation of an arithmetic operator like
> - Addition
> - Subtraction
> - Multiplication
> - Division

<br>

```javascript
2 + foo

3 * 8
```

<br>
<br>

#### **Assignment Expression**
<br>

> An assignment expression assigns a value to a variable

<br>

```javascript
foo = 2
```

<br>
<br>

#### **Expression Statement**
<br>

> An expression statement is an expression that stands alone

<br>

```javascript
foo + 3;
```

<br>
<br>

#### **Call Expression Statement**
<br>

> A call expression statment is a standalone expression that invokes a function

<br>

```javascript
foo('bar', 4);
```

<br>
<br>
<br>

### **Program**
<br>

> Collection of statements that describe how a specific problem should be solved

<br>
<br>
<br>

### **Interpreter**
<br>

> An interpreter translates the source code to machine code at **runtime**

<br>
<br>

### **Compiler**
<br>

> A compiler translates the source code to machine code only once before the first run 