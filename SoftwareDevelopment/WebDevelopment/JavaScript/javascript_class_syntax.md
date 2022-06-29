# **JavaScript Class Syntax**

<br>

## **Table Of Contents**
<br>

- [**JavaScript Class Syntax**](#javascript-class-syntax)
  - [**Table Of Contents**](#table-of_contents)
  - [**General**](#general)

  
<br>
<br>
<br>
<br>

## **General**
<br>

There are no real classes in JavaScript. The class syntax is only a convenient way to use object orientation via [constructor functions](./javascript_object_oriented_programming.md#pseudo-class-object-orientation). 

See [JavaScript Object Oriented Programming](./javascript_object_oriented_programming.md) for more information.

<br>
<br>
<br>
<br>

## **Basic Class Syntax**
<br>
<br>

### **Class Declaration**
<br>

* class declarations are not hoisted by the interpreter

<br>

```javascript
class ClassName {

  constructor(param1, param2) {
      this.property1 = param1;
      this.property2 = param2;
  }

  method1() { /* implementation */ }

}
```

<br>
<br>
<br>

### **Class Expression**
<br>

* class expressions are hoisted by the interpreter

<br>

```javascript
const ClassName = class {

    constructor(param1, param2) {
        this.property1 = param1;
        this.property2 = param2;
    }

    method1() { /* implementation */ }

};
```

<br>
<br>
<br>
<br>

## **Private Properties And Methods**
<br>

* add property declaration block to top of class
* add _#_ in front of all private property and method names

<br>

```javascript
const ClassName = class {

	publicProperty1;
	#privateProperty1;

    constructor(param1, param2) {
        this.publicProperty1 = param1;
        this.#privateProperty1 = param2;
    }

    publicMethod1() { /* implementation */ }
   
    #privateMethod1() { /* implementation */ }

};
```

<br>
<br>
<br>
<br>

## **Getter And Setter Methods**
<br>

* set keywords _get_ or _set_ in front of method with the same name as the referenced property1
* change name of property slightly, i.e. by adding privacy symbol _#_ to avoid infinity loops

<br>

```javascript
const ClassName = class {

	publicProperty1;
	#privateProperty1;

    constructor(param1, param2) {
        this.publicProperty1 = param1;
        this.#privateProperty1 = param2;
    }
	
	get getterMethod() { 
		/* implementation */
		return this.#privateProperty;
	}
	
	set setterMethod(param) { /* implementation */ }

    publicMethod1() { /* implementation */ }
   
    #privateMethod1() { /* implementation */ }

};
```

<br>
<br>
<br>
<br>

## **Static Properties And Methods**
<br>

* static properties and methods can invoked via the classname without any instance

<br>

```javascript
class ClassName {

    static staticProperty = 'value';

    static staticMethod(param) {
        return param;
    }
}


// access static elements
ClassName.staticProperty;               // 'value'
ClassName.staticMethod('foo');          // 'foo'
```

<br>
<br>
<br>
<br>

## **Create Subclass**
## **Call Superclass Method**
## **Overwrite Superclass Method**
## **Explicitly Call Superclass Method**
<br>

```javascript
class SuperClass { 

    constructor(param1) {
        this.property1 = param1;
    }

    method1() { /* implementation */ }

    method2(param) { /* implementation*/ }

}


class SubClass extends SuperClass {

    constructor(param1, param2) {
        super(param1);                            // call of superclass constructor (must be called before use of keyword this)
        this.property2 = param2;
    }

    method2(param) {                              // overwrite superclass method
        super.method2(param);                     // explicit call of superclass method
        /* additional implementation */
    }

    method3() { /* implementation */ }

}
```


















































