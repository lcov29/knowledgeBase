# **JavaScript Objects**

<br>

## **Table Of Contents**
<br>

- [**JavaScript Objects**](#javascript-objects)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Ways To Create Objects**](#ways-to-create-objects)
    - [**Object Literal**](#object-literal)
    - [**Object Method fromEntries()**](#object-method-fromentries)
    - [**Constructor Function**](#constructor-function)

<br>
<br>
<br>

## **General**

<br>
<br>
<br>

## **Ways To Create Objects**
<br>
<br>

### **Object Literal**
<br>

```javascript
let obj = { 
    key1: 'value';
    key2: 42.12;
    foo: function() {
        console.log(this.key1);
    }
}
```
<br>
<br>

### **Object Method fromEntries()**
<br>
  
* create object from two-dimensional array
* array contains arrays \[key, value\]

```javascript
let array = [['key1', 'value'], ['key2', 42.12], ['foo', function() {console.log(this.key1);}]];
let obj2 = Object.fromEntries(array);
```
<br>
<br>

### **Constructor Function**
<br>

```javascript
function Obj(value1, value2) {
    this.key1 = value1;
    this.key2 = value2;
    this.foo = function() { console.log(this.key1); }
}

let obj3 = new Obj('value', 42.12);
let obj4 = new Obj(42.12, 'value');
```

<br>
<br>
<br>