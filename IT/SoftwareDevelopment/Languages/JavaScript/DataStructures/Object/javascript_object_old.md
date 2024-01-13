# **JavaScript Object**

<br>

## **Table Of Contents**
<br>

- [**JavaScript Object**](#javascript-object)
  - [**Table Of Contents**](#table-of-contents)
  - [**Access Attributes And Methods**](#access-attributes-and-methods)
    - [**Getter And Setter**](#getter-and-setter)
  - [**Copy Attributes Of An Object Into Another Object**](#copy-attributes-of-an-object-into-another-object)
  - [**Iterate Over Attributes And Methods**](#iterate-over-attributes-and-methods)
  - [**Use Of Symbols For Unique Attributes**](#use-of-symbols-for-unique-attributes)
  - [**Prevent Object Modification**](#prevent-object-modification)
    - [**Object.preventExtensions()**](#objectpreventextensions)
    - [**Object.seal()**](#objectseal)
    - [**Object.freeze()**](#objectfreeze)

<br>
<br>
<br>

## **Access Attributes And Methods**
<br>
<br>

### **Getter And Setter**
<br>

* define attribute as _attributeName
* add prefixes _set_ or _get_ to setter or getter functions for attribute
* call setter or getter via object.attributName

<br>

Example:
```javascript
// Object Literal
let obj = {
    _bar: 'foo',
    set bar(param) { /* implementation */ },
    get bar() { return this._bar; }
}


// Constructor Function
function Obj(param) {
    this._bar = param;
}

Obj.prototype = {
    set bar(param) { /* implementation */ }
    get bar() { return this._bar; }
}


// Class
class Obj {
    constructor(param) {
        this._bar = param;
    }
    set bar(param) { /* implementation */ }
    get bar() { return this._bar; }
}


// Function Object.create()
obj = Object.create(Object.prototype, {
                bar: {
                    set: function(param) { /* implementation */ },
                    get: function() { return this._bar; }
                }
});
```

<br>
<br>
<br>
<br>

## **Copy Attributes Of An Object Into Another Object**
<br>

```javascript
// copy attributes of obj1 into obj2
const obj1 = {
    attribute1: 'value1',
    attribute2: 'value2'
};

const obj2 = {
    ...obj1,
    attribute3: 'value3',
    attribute4: 'value4'
}

console.log(obj1);                              // output: { attribute1: 'value1', attribute2: 'value2' }
console.log(obj2);                              // output: { attribute1: value1, 
                                                //           attribute2: value2,
                                                //           attribute3: value3,
                                                //           attribute4: value4 }
```

<br>
<br>
<br>
<br>

## **Iterate Over Attributes And Methods**
<br>

```javascript
// iterate over all enumerable elements of an object and its prototype via for-in loop
for (let element in obj) {
    console.log(`element name: ${element}`);
    console.log(`element value: ${obj[element]}`);
}


// iterate over array of element names
let elementNames = Object.keys(obj);
for (let i = 0; i < elementNames.length; i++) {
    console.log(`element name: ${elementNames[i]}`);
    console.log(`element value: ${obj[elementNames[i]]}`);
}


// iterate over array of element values
let elementValues = Object.values(obj);
for (let i = 0; i < elementValues.length; i++) {
    console.log(`element value: ${elementValues[i]}`);
}


// iterate over array of key-value pairs of elements
let elementKeyValuePairs = Object.entries(obj);
for (let i = 0; i < elementKeyValuePairs.length; i++) {
    console.log(`element name: ${elementKeyValuePairs[i][0]}`);
    console.log(`element value: ${elementKeyValuePairs[i][1]}`);
}
```

<br>
<br>
<br>
<br>

## **Use Of Symbols For Unique Attributes**
<br>

Using symbols for defining unique attributes prevents any call of this attribute other than by the symbol.

```javascript
const attribute1 = Symbol('attribute1');
const obj = {};
obj[attribute1] = 'value';

console.log(obj[attribute1]);       // output: value
console.log(obj[0]);                // output: undefined
console.log(obj.attribute1);        // output: undefined
console.log(obj['attribute1']);     // output: undefined   
```

<br>
<br>
<br>
<br>

## **Prevent Object Modification**
<br>

### **Object.preventExtensions()**
<br>

:x: add new attributes and methods to an object  
:heavy_check_mark: alter values of existing attributes and methods  
:heavy_check_mark: alter attribute properties (e.g. enumerable)

```javascript
let obj = {
    attribute1: 'value'
}

Object.preventExtensions(obj);
console.log(Object.isExtensible(obj));      // output: false

obj.attribute1 = 'newValue';
console.log(obj.attribute1);                // output: newValue

obj.newAttribute = 'value';                 // TypeError: Can't add property newAttribute, object is not extensible

console.log(Object.getOwnPropertyDescriptor(obj, 'attribute1').enumerable);     // output: true
Object.defineProperty(obj, 'attribute1', { enumerable: false });
console.log(Object.getOwnPropertyDescriptor(obj, 'attribute1').enumerable);     // output: false
```

<br>
<br>

### **Object.seal()**
<br>

:x: add new attributes and methods to an object  
:heavy_check_mark: alter values of existing attributes and methods  
:x: alter attribute properties (e.g. enumerable)

```javascript
let obj = {
    attribute1: 'value'
}

Object.seal(obj);
console.log(Object.isSealed(obj));          // output: true

obj.attribute1 = 'newValue';                
console.log(obj.attribute1);                // output: newValue

obj.newAttribute = 'value';                 // TypeError: Can't add property newAttribute, object is not extensible

Object.defineProperty(obj, 'attribute1', { enumerable: false });     // Uncaught TypeError: Cannot redefine property: attribute1
```

<br>
<br>

### **Object.freeze()**
<br>

:x: add new attributes and methods to an object  
:x: alter values of existing attributes and methods  
:x: alter attribute properties (e.g. enumerable)

```javascript
let obj = {
    attribute1: 'value'
}

Object.freeze(obj);
console.log(Object.isFrozen(obj));          // output: true

obj.attribute1 = 'newValue';                
console.log(obj.attribute1);                // output: value

obj.newAttribute = 'value';                 // TypeError: Can't add property newAttribute, object is not extensible

Object.defineProperty(obj, 'attribute1', { enumerable: false });     // Uncaught TypeError: Cannot redefine property: attribute1
```