# **JavaScript Prototype**

<br>

## **Table Of Contents**
<br>

- [**JavaScript Prototype**](#javascript-prototype)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Check Prototype**](#check-prototype)

<br>
<br>
<br>
<br>


## **General**
<br>

* every object (except root _Object_) is based on another object (prototype)
  
* reference to prototype of an object is stored in the \__proto__ property

* prototype of root _Object_ is _null_ 

* every object can be used as a prototype of other objects (default: _Object_)

* objects inherit all properties (= variables and functions) of their prototype

<br>
<br>

![Diagram](./pictures/diagramPrototype.png)

<br>
<br>
<br>
<br>

## **Check Prototype**
<br>

```javascript
objectA.isPrototypeOf(ObjectB)
```

<br>

```javascript
newObject.isPrototypeOf(prototypeObject);           // false
prototypeObject.isPrototypeOf(newObject);           // true              
```