# **UML Class Diagram**
<br>

## **Table Of Contents**
<br>

- [**UML Class Diagram**](#uml-class-diagram)
  - [**Table Of Contents**](#table-of-contents)
  - [**Classes**](#classes)
    - [**Attributes**](#attributes)
      - [**Instance Attributes**](#instance-attributes)
        - [**Visibility Flags**](#visibility-flags)
        - [**Modification Flags**](#modification-flags)
      - [**Derived Attributes**](#derived-attributes)
      - [**Class Attribute**](#class-attribute)
    - [**Methods**](#methods)
      - [**Instance Methods**](#instance-methods)
        - [**Parameter Modes**](#parameter-modes)
        - [**Standard Methods**](#standard-methods)
      - [**Abstract Methods**](#abstract-methods)
      - [**Class Methods**](#class-methods)
    - [**Associations**](#associations)
      - [**Association**](#association)
        - [**Direction**](#direction)
        - [**Multiplicity**](#multiplicity)
        - [**Association Class**](#association-class)
      - [**Inheritance**](#inheritance)
      - [**Aggregation**](#aggregation)
      - [**Composition**](#composition)
      - [**Dependency**](#dependency)
  - [**Interfaces**](#interfaces)

<br>
<br>
<br>

## **Classes**
<br>
<br>

### **Attributes**
<br>
<br>

#### **Instance Attributes**
<br>

```
[visibilityFlag] <attributeName>: <type> [= <defaultValue>] [{modificationFlag}]
```

<br>

Example:

```mermaid
classDiagram
    class Person {
        -firstName: String = 'John'
        -lastName: String = 'Doe'
    }
```

<br>
<br>

##### **Visibility Flags**
<br>

|Flag |Description
|:---:|:------------
|+    |public
|-    |private
|#    |protected
|~    |package visibility

<br>
<br>

##### **Modification Flags**
<br>

|Flag       |Description
|:----------|:-----------
|changeable |attribute can be modified
|frozen     |attribute is readonly

<br>
<br>

#### **Derived Attributes**
<br>

* attribute that is calculated from other attributes
* does not determine whether attribute is physically stored

```
/ <attributeName>: <type>
```

<br>

Example:

```mermaid
classDiagram
    class Timer {
        -start: datetime
        -end: datetime
        /duration
    }
```

<br>
<br>

#### **Class Attribute**
<br>

```
<attributeName>: <type>
-----------------------
```

<br>

Example:

```mermaid
classDiagram
    class Person {
        numberOfPersons int$
        -firstName: String = 'John'
        -lastName: String = 'Doe'
    }
```

<br>
<br>

### **Methods**
<br>
<br>

#### **Instance Methods**
<br>

```
[visibilityFlag] <methodName>([parameterMode] <parameterName>: <parameterType>): <resultType> [{isQuery}]
```

<br>

Example:

```mermaid
classDiagram
    class Person {
        -firstName: string = 'John'
        -lastName: string = 'Doe'

        +introduce(in greeting: string) string
        +changeName(in firstName: string, in lastName: string) boolean
    }
```

<br>
<br>

##### **Parameter Modes**
<br>

|Mode  |Description
|:-----|:------------------------------
|in    |use parameter argument by value (= can not be modified for outer scope)
|inout |use parameter argument by reference (= can be modified for outer scope)
|out   |reference parameter that is used to return method results to outer scope

<br>
<br>

##### **Standard Methods**
<br>

The following methods are part of every class without being explicitly listed:

* setter methods for attributes
* getter methods for attributes
* setter methods for associations
* delete methods for associations

<br>
<br>

#### **Abstract Methods**
<br>

* method signature that has no implementation
* implementation is handled by subclasses
* abstract methods are written in cursive

```mermaid
classDiagram
    class ClassName {
        abstractMethod(in parameter: string)* boolean
    }
```

<br>
<br>

#### **Class Methods**
<br>

```mermaid
classDiagram
    class Person {
        -firstName: string = 'John'
        -lastName: string = 'Doe'

        printText(in text: string)$ void
        +introduce(in greeting: string) string
        +changeName(in firstName: string, in lastName: string) boolean
    }
```

<br>
<br>

### **Associations**
<br>
<br>

#### **Association**
<br>

```mermaid
classDiagram
    direction LR
    class A { }
    class B { }
    A --> B
```

<br>
<br>

##### **Direction**
<br>

```mermaid
classDiagram
    direction LR
    class A { }
    class B { }
    A <--> B : bidirectional
```
* All connected instances know about the connection

<br>

```mermaid
classDiagram
    direction LR
    class A { }
    class B { }
    A --> B : unidirectional
```
* only instances of A know about their connection to instances of B

<br>

```mermaid
classDiagram
    direction LR
    class A { }
    class B { }
    A -- B : not navigable
```
* connected instances do not know about the connection

<br>
<br>

##### **Multiplicity**
<br>

Multiplicity defines upper and lower boundaries for connected instances:

|Multiplicity |Shorthand |Description                                |
|:-----------:|:--------:|-------------------------------------------|
|1..1         |1         |exactly one connected instance             |
|0..1         |          |no or exactly one connected instance       |
|1..*         |          |many connected instances, but at lease one |
|0..*         |*         |no or many connected instances             |
|_number_     |          |exactly _number_ of connected instances    |
|[2, 3]       |          |range for number of connected instances    |

<br>

Examples:

```mermaid
classDiagram
    direction LR
    class A { }
    class B { }
    A "1" -- "1" B
```
* every instance of A is connected to exactly one instance of B
* every instance of B is connected to exactly one instance of A

<br>

```mermaid
classDiagram
    direction LR
    class A { }
    class B { }
    A "0..1" -- "1..n" B
```
* every instance of A is connected to one or multiple instances of B
* every instance of B is connected to either none or exactly one instance of A

<br>
<br>

##### **Association Class**
<br>

* class assigned to a specific association between classes
* used to model additional attributes or methods of an association
* association class represents exactly one association!

```mermaid
classDiagram
    direction LR
    class A { }
    class B { }
    class AssociationClass { }
    A "0..1" -- "1..n" AssociationClass
    AssociationClass "1..n" -- "0..1" B
```

<br>
<br>

#### **Inheritance**
<br>

```mermaid
classDiagram
    direction LR
    class SuperClass { }
    class SubClass { }
    SubClass --|> SuperClass
```

<br>
<br>

#### **Aggregation**
<br>

```mermaid
classDiagram
    direction LR
    class Workplace { }
    class Desk { }
    class Chair { }
    class Computer { }
    Workplace o-- Desk
    Workplace o-- Chair
    Workplace o-- Computer
```

* defines a relationship between a whole and its parts
* whole has the reponsibility to deal with its parts
* parts can exist without their whole

<br>
<br>

#### **Composition**
<br>

```mermaid
classDiagram
    direction LR
    class Human { }
    class Heart { }
    class Brain { }
    class Liver { }
    Human *-- Heart
    Human *-- Brain
    Human *-- Liver
```

* defines a relationship between a whole and its parts
* parts can not exist without their whole
* parts can only be part of a single whole

<br>
<br>

#### **Dependency**
<br>

```mermaid
classDiagram
    direction LR
    class A { }
    class B { }
    A ..> B
```

<br>
<br>
<br>

## **Interfaces**
<br>

* lists only method signatures
* can not be instantiated

```mermaid
classDiagram
    direction LR
    class Sortable {
        <<interface>>
        isGreaterThan()* boolean
        isLesserThan()* boolean
    }
    class Number {
        - value: int
        
        isGreaterThan(): boolean
        isLesserThan(): boolean
    }
    Number --|> Sortable: realize
```