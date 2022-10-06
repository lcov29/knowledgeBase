# **Mermaid Class Diagram**
<br>

## **Table Of Contents**
<br>

- [**Mermaid Class Diagram**](#mermaid-class-diagram)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Class**](#class)
    - [**General Syntax**](#general-syntax)
    - [**Attributes**](#attributes)
      - [**Standard**](#standard)
      - [**Static**](#static)
    - [**Methods**](#methods)
      - [**Standard**](#standard-1)
      - [**Abstract**](#abstract)
      - [**Static**](#static-1)
    - [**Class Annotations**](#class-annotations)
    - [**Visibility Modifiers**](#visibility-modifiers)
    - [**Generic Types**](#generic-types)
  - [**Relationships**](#relationships)
    - [**Inheritance**](#inheritance)
    - [**Association**](#association)
    - [**Aggregation**](#aggregation)
    - [**Composition**](#composition)
    - [**Dependency**](#dependency)
    - [**Realization**](#realization)
    - [**Solid Link**](#solid-link)
    - [**Dashed Link**](#dashed-link)
    - [**Cardinality**](#cardinality)
  - [**Diagram Direction**](#diagram-direction)
  - [**Tooltips**](#tooltips)

<br>
<br>
<br>

## **General**
<br>

A class diagram describes the structure of classes and their relationships to other classes.

<br>

```mermaid
classDiagram
    class Person {
        -string firstName
        -string firstName
        -int age
        +introduce() string
        +incrementAgeBy(int number) 
    }
    class Programmer {
        -List~string~ favoriteLanguages
        +code(duration)
        +setFavoriteLanguages(List~string~)
        +getFavoriteLanguages() List~string~
    }
    Person <|-- Programmer
```

<br>
<br>
<br>

## **Class**
<br>
<br>

### **General Syntax**
<br>

Basic syntax:

```
classDiagram
    class <class name> {
        <attribute definition>
        <method definition>
    }
    <relationship definition>
```

<br>
<br>

### **Attributes**
<br>
<br>

#### **Standard**
<br>

Basic syntax:

```
<visibility modifier><type> <attribute name>
```

<br>

Example:

```
classDiagram
    class Person {
        -string firstName
        -string firstName
        -int age
    }
```

<br>

```mermaid
classDiagram
    class Person {
        -string firstName
        -string firstName
        -int age
    }
```
<br>
<br>

#### **Static**
<br>

Syntax:

```
<type><attribute name>$
```

<br>

```mermaid
classDiagram
    class Person {
         string staticAttribute$
        -string firstName
        -string firstName
        -int age
    }
```

<br>
<br>

### **Methods**
<br>
<br>

#### **Standard**
<br>

Basic syntax:

```
<visibility modifier><method name>(<optional type> <parameter name>) <optional return type>
```

<br>

Example:

```
classDiagram
    class Person {
        -string firstName
        -string firstName
        -int age

        +introduce() string
        +incrementAgeBy(int number) 
    }
```

<br>

```mermaid
classDiagram
    class Person {
        -string firstName
        -string firstName
        -int age
        
        +introduce() string
        +incrementAgeBy(int number) 
    }
```

<br>
<br>

#### **Abstract**
<br>

Syntax:

```
<method name>(<optional type> <parameter name>)* <optional return type>
```

<br>

```mermaid
classDiagram
    class Person {
        -string firstName
        -string firstName
        -int age
        
        abstractMethod(int parameter)* string
    }
```

<br>
<br>

#### **Static**
<br>

Syntax:

```
<method name>(<optional type> <parameter name>)$ <optional return type>
```

<br>

```mermaid
classDiagram
    class Person {
        -string firstName
        -string firstName
        -int age
        
        staticMethod(int parameter)$ string
    }
```

<br>
<br>

### **Class Annotations**
<br>

Syntax:

```
class className
    <<Annotation>>
```

<br>

|Available Annotation |
|:--------------------|
|\<\<Interface>>      |
|\<\<Abstract>>       |
|\<\<Service>>        |
|\<\<Enumeration>>    |

<br>

```
classDiagram
    class Person {
        <<interface>>
        firstName
        lastName
        introduce()
    }
    class ProgrammingLanguage {
        <<enumeration>>
        Python
        C
        Java
        C#
        JavaScript
    }
```

<br>

```mermaid
classDiagram
    class Person {
        <<interface>>
        firstName
        lastName
        introduce()
    }
    class ProgrammingLanguage {
        <<enumeration>>
        Python
        C
        Java
        C#
        JavaScript
    }
```

<br>
<br>

### **Visibility Modifiers**
<br>

|Modifier |Description |
|:--------|:-----------|
|+        |public      |
|-        |private     |
|#        |protected   |
|~        |package     |


<br>
<br>

### **Generic Types**
<br>

Basic syntax:

```
List~<data type>~
```

<br>

```
classDiagram
    class Programmer {
        -List~string~ favoriteLanguages
        +code(duration)
        +setFavoriteLanguages(List~string~)
        +getFavoriteLanguages() List~string~
    }
```

<br>

```mermaid
classDiagram
    class Programmer {
        -List~string~ favoriteLanguages
        +code(duration)
        +setFavoriteLanguages(List~string~)
        +getFavoriteLanguages() List~string~
    }
```

<br>
<br>

## **Relationships**
<br>
<br>

Basic Syntax:

```
<class name 1> <arrow> <class name 2> : <optional label text>
```

<br>
<br>

### **Inheritance**
<br>


```mermaid
classDiagram
    direction LR
    class Superclass {

    }
    class Subclass {

    }
    Subclass --|> Superclass : Subclass --|> Superclass
```

<br>
<br>

### **Association**
<br>

```mermaid
classDiagram
    direction LR
    class ClassA {

    }
    class ClassB {

    }
    ClassB --> ClassA : ClassB --> ClassA
```

<br>
<br>

### **Aggregation**
<br>

```mermaid
classDiagram
    direction LR
    class Whole {

    }
    class Part {

    }
    Part --o Whole : Part --o Whole
```

<br>
<br>

### **Composition**
<br>

```mermaid
classDiagram
    direction LR
    class Whole {

    }
    class Part {

    }
    Part --* Whole : Part --* Whole
```

<br>
<br>

### **Dependency**
<br>

```mermaid
classDiagram
    direction LR
    class ClassA {

    }
    class ClassB {

    }
    ClassB ..> ClassA : ClassB ..> ClassA
```

<br>
<br>

### **Realization**
<br>

```mermaid
classDiagram
    direction LR
    class ClassA {

    }
    class ClassB {

    }
    Class B ..|> ClassA : ClassB ..|> ClassA
```

<br>
<br>

### **Solid Link**
<br>

```mermaid
classDiagram
    direction LR
    class ClassA {

    }
    class ClassB {

    }
    Class B -- ClassA : ClassB -- ClassA
```

<br>
<br>

### **Dashed Link**
<br>

```mermaid
classDiagram
    direction LR
    class ClassA {

    }
    class ClassB {

    }
    Class B .. ClassA : ClassB .. ClassA
```

<br>
<br>

### **Cardinality**
<br>

|Cardinality |Description
|:-----------|:--------------
|1           |exactly 1
|0..1        |0 or 1
|1..*        |one or more
|*           |zero or more
|n           |exactly n
|0..n        |zero or up to n
|1..n        |one or up to n

<br>


Syntax:

```
<class name 1> "<cardinality1>" <arrow> "<cardinality>" <class name 2> : <optional label text>
```

<br>

Example: 

```
classDiagram
    Page "1..*" --> "1" Book 
```

<br>

```mermaid
classDiagram
    Page "1..*" -- "1" Book 
```

<br>
<br>
<br>

## **Diagram Direction**
<br>

Syntax:

```
classDiagram
    direction <direction>
```

<br>

LR:

```mermaid
classDiagram
    direction LR
    Test1 --|> Test2
```

<br>

RL:

```mermaid
classDiagram
    direction RL
    Test1 --|> Test2
```

<br>

TB:

```mermaid
classDiagram
    direction TB
    Test1 --|> Test2
```

<br>

BT:

```mermaid
classDiagram
    direction BT
    Test1 --|> Test2
```

<br>
<br>
<br>

## **Tooltips**
<br>

* requires _securityLevel='loose'_

<br>

```html
<script>
    var config = {
        startOnLoad: true,
        securityLevel: 'loose'
    };
    mermaid.initialize(config);
</script>
```

<br>

```html
<script>
    var callback = function() {
        /* implementation */
    }
</script>
```

<br>

```
classDiagram
    class ClassName1
    link ClassName1 "https://github.com" "Tooltip text"
    class ClassName2
    callback className2 call callback() "Tooltip text"
```

<br>

```mermaid
classDiagram
    class ClassName1
    link ClassName1 "https://github.com" "Tooltip text"
    class ClassName2
    click ClassName2 call callback() "Tooltip text"
```