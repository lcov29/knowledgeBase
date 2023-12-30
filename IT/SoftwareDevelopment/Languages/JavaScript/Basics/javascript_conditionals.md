# **JavaScript Conditionals**
<br>

## **Table Of Contents**
<br>

- [**JavaScript Conditionals**](#javascript-conditionals)
  - [**Table Of Contents**](#table-of-contents)
  - [**If-Statements**](#if-statements)
    - [**Simple If-Statement**](#simple-if-statement)
    - [**If-Else-Statement**](#if-else-statement)
    - [**If-Else-If-Statement**](#if-else-if-statement)
    - [**Inline If-Else-Statement (Ternary Operator)**](#inline-if-else-statement-ternary-operator)
  - [**Switch-Case-Statement**](#switch-case-statement)

<br>
<br>
<br>

## **If-Statements**
<br>

Used to conditionally execute code blocks based on the value of a truthy or falsy condition.

<br>
<br>

### **Simple If-Statement**
<br>

```javascript
if (condition) {
   // code
}
```

<br>
<br>

### **If-Else-Statement**
<br>

```javascript
if (condition) {
   // code
} else {
   // code
}
```

<br>
<br>

### **If-Else-If-Statement**
<br>

```javascript
if (condition1) {
   // code
} else if (condition2) {
   // code
}
```

<br>
<br>

### **Inline If-Else-Statement (Ternary Operator)**
<b>

```javascript
(condition) ? expressionIfTrue : expressionIfFalse;
```

<br>

```javascript
const result1 = (1 > 0) ? 'A' : 'B';       // A

const result2 = (1 < 0) ? 'A' : 'B';       // B
```

<br>
<br>
<br>

## **Switch-Case-Statement**
<br>

Conditionally executes code blocks based on the value of an expression.

<br>

```javascript
switch(expression) {
   case value1:
      // code
      break;
   case value2:
   case value3:
      // code
      break;
   case value4:
      // code
      break;
   default:
      // code to execute if no case was executed
}
```
- executes specific case when expression matches
- `default` block is executed at the end when no case was executed and aborted the switch via `break` keyword
