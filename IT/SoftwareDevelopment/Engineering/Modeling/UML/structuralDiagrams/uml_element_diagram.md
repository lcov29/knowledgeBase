# **UML Element Diagram**
<br>

## **Table Of Contents**
<br>

- [**UML Element Diagram**](#uml-element-diagram)
  - [**Table Of Contents**](#table-of-contents)
  - [**Object**](#object)
    - [**State**](#state)
    - [**Identity**](#identity)
    - [**Operations**](#operations)
      - [**Modificator**](#modificator)
      - [**Selector**](#selector)
    - [**Equality**](#equality)
      - [**State Equality**](#state-equality)
      - [**Referential Equality**](#referential-equality)
    - [**Clone**](#clone)
  - [**Association**](#association)
    - [**Undirected Association**](#undirected-association)
    - [**Unidirectional Association**](#unidirectional-association)
    - [**Bidirectional Association**](#bidirectional-association)
  - [**Example**](#example)

<br>
<br>
<br>
<br>

## **Object**

> An **object** is an abstraction of a real world entity that is defined by its **name**, **attributes** and **operations**.

<br>

![object diagram](./pictures/object-diagram//uml_object_diagram.svg)

**Note**: Operations are not displayed in the object diagram.

<br>
<br>
<br>

### **State**

The state of an object is defined by the value of its attributes.

<br>
<br>
<br>

### **Identity**

Every object has a unique identity that is independent from its state.

<br>
<br>
<br>

### **Operations**
<br>
<br>

#### **Modificator**

Operation that changes the state of the object by modifying the value of one or more attributes.

<br>
<br>

#### **Selector**

Operation that simply returns the value of one or more attributes without changing the state.

<br>
<br>
<br>

### **Equality**
<br>
<br>

#### **State Equality**

Two objects are **equal by state** if they have the same operations, attributes and attribute values.

<br>
<br>

#### **Referential Equality**

Two objects are **equal by reference** when they have the same identity, e.g. one is an alias for the other.

<br>
<br>
<br>

### **Clone**

Create an object with the same state and operations than another object, but with a different identity.

<br>
<br>
<br>
<br>

## **Association**

An association connects two objects. It can have an optional name and roles.

<br>
<br>

### **Undirected Association**

![undirectedAssociation](./pictures/object-diagram/uml_object_diagram_undirected_association.svg)

<br>
<br>

### **Unidirectional Association**

![unidirectionalAssociation](./pictures/object-diagram/uml_object_diagram_unidirectional_association.svg)

<br>
<br>

### **Bidirectional Association**

![bidirectionalAssociation](./pictures/object-diagram/uml_object_diagram_bidirectional_association.svg)

<br>
<br>
<br>
<br>

## **Example**

![example](./pictures/object-diagram/uml_object_diagram_example.svg)