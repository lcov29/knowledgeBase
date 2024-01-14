# **JavaScript Object**

<br>

## **Table Of Contents**
<br>

- [**JavaScript Object**](#javascript-object)
  - [**Table Of Contents**](#table-of-contents)
  - [**Copy Attributes Of An Object Into Another Object**](#copy-attributes-of-an-object-into-another-object)
  - [**Use Of Symbols For Unique Attributes**](#use-of-symbols-for-unique-attributes)
  - [**Prevent Object Modification**](#prevent-object-modification)
    - [**Object.preventExtensions()**](#objectpreventextensions)
    - [**Object.seal()**](#objectseal)
    - [**Object.freeze()**](#objectfreeze)

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