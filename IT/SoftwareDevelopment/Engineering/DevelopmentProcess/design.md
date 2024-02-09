# **Design**
<br>

## **Table Of Contents**
<br>

- [**Design**](#design)
  - [**Table Of Contents**](#table-of-contents)
  - [**Overview**](#overview)
  - [**Design Specification**](#design-specification)
  - [**Design Process**](#design-process)
    - [**1. Basic Design**](#1-basic-design)
    - [**2. Detailed Design**](#2-detailed-design)
  - [**Design Concepts**](#design-concepts)
    - [**Information Hiding**](#information-hiding)
      - [**Advantages**](#advantages)
      - [**Heuristics**](#heuristics)
    - [**Coupling**](#coupling)
      - [**Heuristics**](#heuristics-1)

<br>
<br>
<br>
<br>

## **Overview**

In the design phase we refine the subsystems specified by the architecture according to the functional and nonfunctional requirements.

<br>

```mermaid
stateDiagram-v2
   direction LR
   classDef dotted stroke-dasharray: 4 4;

   A: Analysis Class Diagram
   B: Analysis Interaction Diagram
   C: Analysis State Diagram
   D: Architectural Specification
   E:::dotted: Requirements Specification
   F: Design Class Diagram
   G: Design Interaction Diagram
   H: Design State Diagram

   state "Input: Analysis Specification" as inputAnalysis {
      A
      B
      C
   }

   state "Input" as inputOther {
      D
      E
   }

   state "Output: Design Specification" as output {
      F
      G
      H
   }

   A --> F
   B --> G
   C --> H
   D --> output
   E --> output
```

<br>
<br>
<br>
<br>

## **Design Specification**
<br>

The design specifies the **tasks**, **relationships** and **cooperations** of the modules and subsystems.  
It contains

1. Design Class Diagram
2. Design Interaction Diagram
3. Design State Diagram

<br>
<br>
<br>
<br>

## **Design Process**
<br>
<br>

### **1. Basic Design**

We map the analysis classes to the specified architecture.

<br>
<br>

### **2. Detailed Design**

We refine the basic design and add implementation details of the **actual implementation language**.

<br>
<br>
<br>
<br>

## **Design Concepts**
<br>
<br>
<br>

### **Information Hiding**

> Modules hide their implementation details from the outside.  
> External elements can only interact with the module via their external interface.

<br>
<br>

#### **Advantages**

1. External users are forced to use the element "the right way" over the API
2. External users can not modify the element implementation
3. Changes to the implementation of an element do not impact the external users of the element

<br>
<br>

#### **Heuristics**

> In the design we declare all properties as private.

![Private Attributes](./pictures/design/design_information_hiding_private_attribute.svg)

<br>

> In generalization relationships we declare all attributes as private and add protected getter and setter methods to allow the subclasses to access the properties.

![Protected Attributes](./pictures/design/design_information_hiding_protected_attribute.svg)

<br>
<br>
<br>

### **Coupling**

> Coupling describes the complexity of relations between the design elements.  
> Two classes are coupled when there is an association between them.

<br>

Examples

1. ClassA holds at least one reference to ClassB
2. ClassA is the superclass of ClassB
3. ClassA uses instances of ClassB in its implementation
4. ClassA has at least one operation that uses instances of ClassB as a parameter

<br>
<br>

#### **Heuristics**

> The goal of the design is to minimize the coupling between the elements (**weak coupling**).

<br>

> If only a few (below four) classes are coupled, we try to unite them into a single class.

<br>

> If a lot of classes (more than three) are coupled, we try to weaken the coupling by using a broker class.

<br>

> If the coupling is caused by a single functionality we try to weaken the coupling by moving the functionality to a different class.

<br>

> We can weaken the coupling within an aggregation by removing references of the part classes to the whole class.

<br>

> We can weaken the coupling within an aggregation by removing any usage relationship between the part classes.

<br>

> **Law Of Demeter**  
> An operation `o` of a class `A` should use only operations of the following classes:  
> 1. `A` itself
> 2. Classes that are parameters of `o`
> 3. Classes that are associated with `A`
> 4. Classes that are instantiated within `o`
