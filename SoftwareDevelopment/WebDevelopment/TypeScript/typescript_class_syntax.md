# **TypeScript Class Syntax**
<br>

## **Table Of Contents**
<br>

- [**TypeScript Class Syntax**](#typescript-class-syntax)
  - [**Table Of Contents**](#table-of-contents)
  - [**Classes**](#classes)
    - [**General**](#general)
    - [**Basic Class**](#basic-class)
    - [**Subclass**](#subclass)
    - [**Abstract Class**](#abstract-class)
  - [**Constructor Overload**](#constructor-overload)
  - [**Visibility And Access Modificators**](#visibility-and-access-modificators)
    - [**private**](#private)
      - [**Soft Private**](#soft-private)
      - [**Hard Private**](#hard-private)
    - [**protected**](#protected)
    - [**public**](#public)
    - [**readonly**](#readonly)
  - [**Structural Typing**](#structural-typing)
  - [**Generics**](#generics)
  - [**Mixins**](#mixins)

<br>
<br>
<br>

## **Classes**
<br>
<br>

### **General**
<br>

```
[abstract] class <className> [extends <SuperClassName>] {

    <private | # | public | protected> [readonly] <propertyName>: <propertyType> [= <DefaultValue>]

    constructor(<parameterName>: <parameterValue>, ...) {
        // property initialization...
    }

    <private | # | public | protected> <methodName>(<parameterName>: <parameterValue>, ...) {
        // implementation
    }
}
```

<br>
<br>
<br>

### **Basic Class**
<br>

```
class <className> {

    <private | # | public | protected> [readonly] <propertyName>: <propertyType> [= <DefaultValue>]

    constructor(<parameterName>: <parameterValue>, ...) {
        // Initialize properties...
    }

    <private | # | public | protected> <methodName>(<parameterName>: <parameterValue>, ...) {
        // Implementation
    }
}
```

<br>

Example:

```typescript
class Person {
  
  private firstName: string;
  private lastName: string;

  constructor(firstName: string, lastName: string) {
      this.firstName = firstName;
      this.lastName = lastName;
  }

  introduce() : string {
    return `Hello, i am ${this.firstName} ${this.lastName}.`
  };

}
```

<br>
<br>
<br>

### **Subclass**
<br>

```
class <className> extends <SuperclassName> {

    <private | # | public | protected> [readonly] <propertyName>: <propertyType> [= <DefaultValue>]

    constructor(<parameterName>: <parameterValue>, ...) {
        super(signatureConstructorSuperClass);
        // Initialize properties...
    }

    <private | # | public | protected> <methodName>(<parameterName>: <parameterValue>, ...) {
        // Implementation
    }
}
```
<br>

Example:

```typescript
class Programmer extends Person {

  private language: string;

  constructor(firstName: string, lastName: string, language: string) {
    super(firstName, lastName);
    this.language = language;
  }

  // overwrite superclass method
  introduce() : string {
    return `${super.introduce()} My favorite language is ${this.language}`
  };

}
```

<br>
<br>
<br>

### **Abstract Class**
<br>

* abstract class can not be instantiated
* used to define a structur for its subclasses
* can define abstract methods that subclasses have to implement

<br>

```
abstract class <className> {
    abstract <methodName>(<parameterName>: <parameterType>) : <returnType>
}
```

<br>

Example:

```mermaid
classDiagram
    direction BT
    class Introducable {
        <<Abstract>>
        +string nation*

        +introduce()* string
    }
    class Person {
        -firstName string
        -lastName string
        +nation string

        +introduce() string
    }
    class Company {
        -name string
        -foundingYear number
        +nation string

        +introduce() string
    }
    Person --|> Introducable
    Company --|> Introducable
```

<br>
<br>

```typescript
abstract class Introducable {
  abstract nation : string;

  abstract introduce() : string;
}



class Person extends Introducable {
  private firstName;
  private lastName;
  nation = '';

  constructor(firstName: string, lastName: string, nation: string) {
    super();
    this.firstName = firstName;
    this.lastName = lastName;
    this.nation = nation;
  }

  introduce(): string {
    return `Hello, my name is ${this.firstName} ${this.lastName} and i am from ${this.nation}`;
  }
}



class Company extends Introducable {
  private name;
  private foundingYear;
  nation = '';

  constructor(name: string, foundingYear: number, nation: string) {
    super();
    this.name = name;
    this.foundingYear = foundingYear;
    this.nation = nation;
  }

  introduce() {
    return `Welcome to ${this.name}. We were founded in ${this.foundingYear} and are based in ${this.nation}`;
  }
}


const introducableList: Introducable[] = [
  new Person('John', 'Doe', 'USA'),
  new Company('Lewton', 1979, 'France'),
  new Person('Jane', 'Doe', 'Australia'),
];

introducableList.forEach(element => console.log(element.introduce()));
```

<br>
<br>
<br>

## **Constructor Overload**
<br>
<br>

Constructors can be overloaded:

```typescript
class Person {

  private firstName: string;
  private lastName: string;
  private age: number;

  constructor(firstName: string, lastName: string);
  constructor(firstName: string, lastName: string, age: number);
  constructor(firstName: string, lastName: string, age?: number | undefined) {
    this.firstName = firstName;
    this.lastName = lastName;
    this.age = (age) ? age : 18;
  }

}

const johnDoe = new Person('John', 'Doe');
const janeDoe = new Person('Jane', 'Doe', 23);
```

<br>
<br>
<br>

## **Visibility And Access Modificators**
<br>
<br>

### **private**
<br>
<br>

#### **Soft Private**

* properties and methods are not visible and accessible outside of their class _during compile time_

```
private <propertyName>

private <methodName>(<parameterName>: <parameterType>, ...): <resultType>
```

<br>

#### **Hard Private**

* properties and methods are not visible and accessible outside of their defining class _during compile time and during run time_

```
#<propertyName>

#<methodName>(<parameterName>: <parameterType>, ...): <resultType>
```

<br>
<br>

### **protected**

* properties and methods are only visible and accessible in their defining class and its subclasses _during compile time_

```
protected <propertyName>

protected <methodName>(<parameterName>: <parameterType>, ...): <resultType>
```

<br>
<br>

### **public**

* properties and methods are visible and accessible both inside and outside of their defining class

```
public <propertyName>

public <methodName>(<parameterName>: <parameterType>, ...): <resultType>
```

<br>
<br>

### **readonly**
<br>

* property can not be modified outside of _constructor_

```
readonly <PropertyName>
```

<br>
<br>
<br>

## **Structural Typing**
<br>

Classes are structural typed, so TypeScript accepts all objects with the same structure of a class as instances of said class even if they were not instantiated via the constructor.

<br>

Example:

```typescript
class Person {

  name;

  constructor(name: string) {
    this.name = name;
  }

  introduce() {
    console.log(`Hello, my name is ${this.name}`);
  }

}


function demonstrateStructuralTyping(person: Person) {
  person.introduce();
}


demonstrateStructuralTyping(new Person('John Doe'));     
// 'Hello, my name is John Doe'


demonstrateStructuralTyping(
  {
    name: 'Jane Doe',
    introduce: function() { console.log(`Hi, i am ${this.name}`);}
  }
);
// 'Hi, i am Jane Doe'
```

<br>
<br>

This does not work if the class uses the visibility modifiers `protected` or `private`:

<br>

```typescript
class Person {

  private name;

  constructor(name: string) {
    this.name = name;
  }

  introduce() {
    console.log(`Hello, my name is ${this.name}`);
  }

}


function demonstrateStructuralTyping(person: Person) {
  person.introduce();
}


demonstrateStructuralTyping(new Person('John Doe'));     
// 'Hello, my name is John Doe'


demonstrateStructuralTyping(
  {
    name: 'Jane Doe',
    introduce: function() { console.log(`Hi, i am ${this.name}`);}
  }
);
// - error TS2345: Argument of type '{ name: string; introduce: () => void; }' is not assignable to parameter of type 'Person'.
//                 Property 'name' is private in type 'Person' but not in type '{ name: string; introduce: () => void; }'.

```

<br>
<br>
<br>

## **Generics**
<br>

* **Classes** can define generic types that are specified by parameter types of constructor

```typescript
class Foo<T, U> {
  property1;
  property2;

  constructor(param1: T, param2: U) {
    this.property1 = param1;
    this.property2 = param2;
  }
  
}

const foo1 = new Foo('bar', 2);
// specifies generics: T as string, U as number
```

<br>

* **Instance methods** can 
  * use generic types of class
  * define own generic types

```typescript
class Foo<T, U> {
  property1;
  property2;

  constructor(param1: T, param2: U) {
    this.property1 = param1;
    this.property2 = param2;
  }

  bar<V>(): T | V {
    return this.property1;
  }
  
}
```

<br>

* **Static methods** can
  * not use generic types of class
  * define own generic types

```typescript
class Foo<T, U> {
  property1;
  property2;

  constructor(param1: T, param2: U) {
    this.property1 = param1;
    this.property2 = param2;
  }

  static baz<V>(param: V): V {
    return param;
  }
  
}
```

<br>
<br>
<br>

## **Mixins**
<br>

* pattern that mixes properties and methods of different classes into a new class
* used to simulate multiple inheritance

<br>

```typescript
type Constructor = new (...args: any[]) => {};

function mixinName<TBase extends Constructor>(Base: TBase) {
  return class extends Class {

    constructor(...args: any[]) {
      super(...args);
    }

    mixinMethod() {
      // implementation
    }

  }
}
```

<br>

```typescript
class Person {
  // implementation
}

const PersonMixin = mixinName(Person);
let johnDoe = new PersonMixin();
johnDoe.mixinMethod();
```