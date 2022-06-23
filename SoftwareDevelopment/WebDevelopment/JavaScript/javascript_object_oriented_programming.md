# **JavaScript Object Oriented Programming**
<br>

## **Table Of Contents**
<br>

- [**JavaScript Object Oriented Programming**](#javascript-object-oriented-programming)
  - [**Table Of Contents**](#table-of-contents)
  - [**Core Principles Of Object Orientated Programming**](#core-principles-of-object-orientated-programming)
  - [**Object Oriented Programming In JavaScript**](#object-oriented-programming-in-javascript)
    - [**Prototype Object Orientation**](#prototype-object-orientation)
      - [**Create New Object Based On Prototype**](#create-new-object-based-on-prototype)
      - [**Inherit Prototype Methods And Properties**](#inherit-prototype-methods-and-properties)
      - [**Add Methods And Properties To New Object**](#add-methods-and-properties-to-new-object)
      - [**Overwrite Prototype Methods**](#overwrite-prototype-methods)
      - [**Explicitly Call Methods Within Prototype**](#explicitly-call-methods-within-prototype)
    - [**Pseudo Class Object Orientation**](#pseudo-class-object-orientation)
      - [**Add Methods To Prototype Of Constructor Function**](#add-methods-to-prototype-of-constructor-function)
      - [**Create New Object**](#create-new-object)
      - [**Set Up Inheritance**](#set-up-inheritance)
        - [**Step 1: Create Constructor Function For Subtype**](#step-1-create-constructor-function-for-subtype)
        - [**Step 2: Add Newly Created Subtype Prototype Object Referencing Supertype Object**](#step-2-add-newly-created-subtype-prototype-object-referencing-supertype-object)
        - [**Step 3: Set Constructor Property Of Newly Created Subtype Prototype Object To Subtype Constructor**](#step-3-set-constructor-property-of-newly-created-subtype-prototype-object-to-subtype-constructor)
        - [**Step 4: Define Subtype Methods**](#step-4-define-subtype-methods)
        - [**Check Implemented Inheritance**](#check-implemented-inheritance)
    - [**Class Syntax**](#class-syntax)

<br>
<br>
<br>
<br>

## **Core Principles Of Object Orientated Programming**
<br>

1. **Abstraction**
  
   Abstract behavior and state of similar objects into classes or prototypes

<br>

2. **Data Encapsulation**
   
   Attributes and methods are encapsulated by classes or prototypes

<br>

3. **Inheritance**
   
   Classes or prototypes can inherit the attributes and methods of other classes or prototypes

<br>

4. **Polymorphism**
   
   Objects can have different types in different contexts

<br>
<br>
<br>
<br>

## **Object Oriented Programming In JavaScript**
<br>

JavaScript is a prototype-based language. That means: objects are created based on other objects (= the _prototype_ of the new object).  
Objects are _NOT_ created based on 'real' classes.

<br>

Lets see whether the core principles of object oriented programming are fulfilled in JavaScript:

<br>
<br>

1. **Abstraction**
   
   Fulfilled by defining attributes and methods on prototype objects.

<br>

2. **Data Encapsulation**

   Fulfilled by class syntax object orientation (see below), otherwise only fulfilled by implementing a specific design pattern.

<br>

3. **Inheritance**
   
   Fulfilled by prototype chaining.

<br>

4. **Polymorphism**
   
   Fulfilled because JavaScript is dynamically typed and therefore has no type restrictions.

<br>
<br>

There are three ways to implement object orientation in JavaScript:

<br>
<br>
<br>
<br>

### **Prototype Object Orientation**
<br>
<br>

Assume we have the following object that we will use as a prototype:

```javascript
const person = {
    firstName: 'John',
    lastName: 'Doe',
    age: 37,
    introduce: function() {
        console.log(`Hello, my name is ${this.firstName} ${this.lastName}`);
    },
    incrementAge: function(years) {
        this.age += years;
    }
}
```

<br>
<br>
<br>

#### **Create New Object Based On Prototype**
#### **Inherit Prototype Methods And Properties**
<br>

```javascript
Object.create(prototypeObject);
```

<br>


```javascript
const johnDoe = Object.create(person);      // create new objects based on person object

const janeDoe = Object.create(person);
janeDoe.firstName = 'Jane';                 // change property values received from prototype person
janeDoe.age = 24;


johnDoe.introduce();                        // 'Hello, my name is John Doe'
johnDoe.incrementAge(2);                    
console.log(johnDoe.age);                   // 39


janeDoe.introduce();                        // 'Hello, my name is Jane Doe'
janeDoe.incrementAge(-2);
console.log(janeDoe.age);                   // 22
```

<br>
<br>
<br>

#### **Add Methods And Properties To New Object**
<br>

```javascript
newObject.propertyName = 'value';
newObject.methodName = function(param) { /* implementation */ };
```

<br>

```javascript
const johnDoe = Object.create(person);

johnDoe.isHungry = true;                    // add property

johnDoe.eat = function(food) {              // add method
  if (this.isHungry) {
    console.log(`eating ${food}...`);
  } else {
    console.log('not hungry...');
  }
  this.isHungry = !this.isHungry;
}

johnDoe.eat('apple');                       // 'eating apple...'
johnDoe.eat('cake');                        // 'not hungry...'
```

<br>
<br>
<br>

#### **Overwrite Prototype Methods**
<br>

```javascript
newObject.prototypeObjectMethodName = function(param) { /* implementation */ };
```

<br>

```javascript
const johnDoe = Object.create(person);

johnDoe.introduce();                      // 'Hello, my name is John Doe'

johnDoe.introduce = function() {
  console.log(`Hi, i am ${this.firstName} ${this.lastName}. I am currently ${this.age} years old.`);
}

johnDoe.introduce();                      // 'Hi, i am John Doe. I am currently 37 years old.'
```

<br>
<br>
<br>

#### **Explicitly Call Methods Within Prototype**
<br>

```javascript
Object.getPrototypeOf(this).prototypeObjectMethodName.call(this, param);
```

<br>

```javascript
const johnDoe = Object.create(person);

johnDoe.celebrateBirthday = function() {
  const incrementByYears = 1;
  Object.getPrototypeOf(this).incrementAge.call(this, incrementByYears);        // calls prototype method incrementAge(1) 
  console.log(`celebrating ${this.age}th birthday...`);
}

console.log(johnDoe.age);                                                       // 37
johnDoe.celebrateBirthday();                                                    // celebrating 38th birthday...
console.log(johnDoe.age);                                                       // 38
```

<br>
<br>
<br>
<br>

### **Pseudo Class Object Orientation**
<br>
<br>

Pseudo classes are based on [constructor functions](javascript_object.md#constructor-function).

Assume we have the following constructor function for person objects:

```javascript
function Person(firstName, lastName, age) {
    this.firstName = firstName;
    this.lastName = lastName;
    this.age = age;
}
```
<br>
<br>
<br>

#### **Add Methods To Prototype Of Constructor Function**
<br>

```javascript
constructorFunctionName.prototype.methodName = function(param) { /* implementation */ };
```

<br>

```javascript
Person.prototype.introduce = function() {
    console.log(`Hello, my name is ${this.firstName} ${this.lastName}`);
};

Person.prototype.incrementAge = function(years) {
    this.age += years;
};
```

<br>
<br>
<br>

#### **Create New Object**
<br>

```javascript
const newObject = new ConstructorFunctionName(param);
```

<br>

```javascript
const johnDoe = new Person('John', 'Doe', 37);

johnDoe.introduce();                              // 'Hello, my name is John Doe'
johnDoe.incrementAge(2);

console.log(johnDoe.age);                         // 39
```

<br>
<br>
<br>

#### **Set Up Inheritance**
<br>
<br>

We have already declared our constructor function and added methods to its prototype. 

We start with the following situation for the constructor function object Person:

<br>

![Step 1](./pictures/constructorFunctionInheritanceStep1.png)

<br>
<br>
<br>

##### **Step 1: Create Constructor Function For Subtype**
<br>

```javascript
function Programmer(firstName, lastName, age, language) {
    Person.call(this, firstName, lastName, age);                // call constructor of supertype
    this.language = language;                                   // define suptype specific properties
}
```

<br>

![Step 2](./pictures/constructorFunctionInheritanceStep2.png)


<br>
<br>
<br>

##### **Step 2: Add Newly Created Subtype Prototype Object Referencing Supertype Object**
<br>

* Subtype prototype references supertype object
* Supertype object references supertype prototype

<br>

```javascript
Programmer.prototype = new Person();
```

<br>

![Step 3](./pictures/constructorFunctionInheritanceStep3.png)

<br>
<br>
<br>

##### **Step 3: Set Constructor Property Of Newly Created Subtype Prototype Object To Subtype Constructor**
<br>

```javascript
Programmer.prototype.constructor = Programmer;
```

<br>

![Step 4](./pictures/constructorFunctionInheritanceStep4.png)

<br>
<br>
<br>

##### **Step 4: Define Subtype Methods**
<br>

```javascript
Programmer.prototype.program = function(durationInHours) {
    console.log(`Programming ${this.language} for ${durationInHours} hours...`);
}
```

<br>

![Step 5](./pictures/constructorFunctionInheritanceStep5.png)

<br>
<br>
<br>

##### **Check Implemented Inheritance**
<br>

```javascript
const janeDoe = new Programmer('Jane', 'Doe', 24, 'JavaScript');
janeDoe.introduce();                                                  // Hello, my name is Jane Doe
janeDoe.incrementAge(1);
console.log(janeDoe.age);                                             // 25
janeDoe.program(3);                                                   // Programming JavaScript for 3 hours...


const johnDoe = new Person('John', 'Doe', 37);
johnDoe.introduce();                                                  // Hello, my name is John Doe
johnDoe.incrementAge(1);
console.log(johnDoe.age);                                             // 38
johnDoe.program(3);                                                   // Error: johnDoe.program is not a function
```



<br>
<br>
<br>
<br>

### **Class Syntax**
<br>
<br>

<br>
<br>
<br>



<!--
===== pseudoclass object-orientation =====


- call constructor of super prototype
  - function Teacher(name, age, subject) {
        Person.call(this, name, age);
        this.subject = subject;
    };

- overwrite methods
  - ObjectA.prototype.methodName = function(param){ ... }


- call methods of super object
  - superObjectB.prototype.methodName.call(this, argument);


Object-orientation Principles:

1. Abstraction: check, abstracted into prototypes
2. Data encapsulation: No, only with specific design patterns
3. Inheritance: check, but a bit complex
4. polymorphism: check, javascript is dynamically typed



-----------------------------------------------------------------------------



===== object-orientation with class syntax =====

- class syntax reduces complexity of pseudoclass object-orientation
- realizes no class-based programming! JavaScript stays object-based


--- class declaration ---

    class ClassName {

        property1 = 'value1';       // instance properties (ES2022)
        property2 = 'value2'

        constructor(param1, param2, param3) {
            this.property1 = param1 ? param2 : this.property1;
            this.property2 = param2 ? param2 : this.property2;
            this.property3 = param3;
        }

        method1() { /* implementation */ }
    }


--- class expression ---

    const ClassName = class {

        property1 = 'value1';       // instance properties (ES2022)
        property2 = 'value2'

        constructor(param1, param2, param3) {
            this.property1 = param1 ? param2 : this.property1;
            this.property2 = param2 ? param2 : this.property2;
            this.property3 = param3;
        }

        method1() { /* implementation */ }
    };



- instantiate new object
  - const newInstance = new ClassName('value1', 'value2', 'value3');


- define Getter and Setter
  - write keywords get or set in front of method
  - CAUTION: name of getter- / setter-method must not equal a property name (-> infinity loop)
    -> typically: add underscore in front of property name


    class ClassName {

        constructor(param1, param2, param3) {
            this._property1 = param1 ? param2 : this.property1;
            this._property2 = param2 ? param2 : this.property2;
            this._property3 = param3;
        }

        get property1() {
            return this._property1;
        }

        set property1(param) {
            this._property1 = param;
        }

        get property2() {
            return this._property2;
        }

        set property2(param) {
            this._property2 = param;
        }

        method1() { /* implementation */ }

    }  



- define private properties and methods (since ES2022)
  - underscore is only a convention and does not prevent external access
  - add # in front of private properties 

    class ClassName {

        constructor(param1, param2, param3) {
            this.#property1 = param1;
            this.#property2 = param2;
            this.#property3 = param3;
        }

        get property1() {
            return this.#property1;
        }

        set property1(param) {
            this.#property1 = param;
        }

        get property2() {
            return this.#property2;
        }

        set property2(param) {
            this.#property2 = param;
        }

        #method1() { /* implementation */ }

    }  



- inheritance of classes
    - keyword extends
    - call of superclass constructor with keyword super

    class SuperClass {
        
        constructor(param1, param2) {
            this.property1 = param1;
            this.property2 = param2;
        }

        method1(param) { /* implementation */ }
    }


    class SubClass extends SuperClass {

        constructor(param1, param2, param3) {
            super(param1, param2);                  // superclass constructor must to be called BEFORE any use of keyword _this_
            this.property3 = param3;
        }
    }



- overwrite methods of superclasses
  - add method with same name to subclass

  class SuperClass {
        
        constructor(param1, param2) {
            this.property1 = param1;
            this.property2 = param2;
        }

        method1(param) { /* implementation */ }
    }


    class SubClass extends SuperClass {

        constructor(param1, param2, param3) {
            super(param1, param2);                  // superclass constructor must to be called BEFORE any use of keyword _this_
            this.property3 = param3;
        }

        method1(param) { /* implementation */ }     // overwrites SuperClass.method1()
    }




- call methods of superclass
  - super.methodName(param)



- static methods
  - static methodName(param) { /* implementation */ }



- static properties
  - static propertyName = 'value';
-->





<!-- 

---- -------------------Prototype -----------------------------

- every object is based on a prototype (except _Object_ object)
- every object can be used as a prototype for other objects
- object inherits all properties and methods from prototype
  
- access prototype of objectA with: 
  - objectA.__proto__  (do not use)
  - objectA.getPrototypeOf()

- check if objectB is prototype of objectA
  - objectB.isPrototypeOf(objectA)

- create objectB with prototype objectA
  - objectB = Object.create(objectA)


- prototype chaining:
  1. search called method on caller object
  2. if method does not exist, search on prottype
  3. if method does not exist and object <> root _Object_: go to 2


! No prototype possible for object literals !
-->


[Resource To Check Feature Availability](https://kangax.github.io/compat-table/es2016plus/)