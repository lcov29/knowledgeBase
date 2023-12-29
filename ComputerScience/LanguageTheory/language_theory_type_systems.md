# **Type Systems**
<br>

## **Table Of Contents**
<br>

- [**Type Systems**](#type-systems)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Strong VS. Weak Type Systems**](#strong-vs-weak-type-systems)
  - [**Static VS. Dynamic Type Systems**](#static-vs-dynamic-type-systems)
    - [**Structural VS Nominal Static Type System**](#structural-vs-nominal-static-type-system)
  - [**Explicit VS. Implicit Type System**](#explicit-vs-implicit-type-system)
  - [**Variance**](#variance)
    - [**Invariance**](#invariance)
    - [**Covariance**](#covariance)
    - [**Contravariance**](#contravariance)
    - [**Bivariance**](#bivariance)

<br>
<br>
<br>

## **General**
<br>

The Type System is a part of a programming language that defines 
* which data types are available
* value range for each type
* which types are compatible to each other
* which types can be casted (transformed) to which other types

<br>
<br>
<br>

## **Strong VS. Weak Type Systems**
<br>
 
|                  | **Strong Type System**       |**Weak Type System**      |
|:-----------------|:-----------------------------|:-------------------------|
|**variable type** |can not change during runtime |can change during runtime |


<br>
<br>
<br>

## **Static VS. Dynamic Type Systems**
<br>

|**Static Type System**                                    |**Dynamic Type System**                                    |
|:---------------------------------------------------------|:----------------------------------------------------------|
|type of a variable is defined by the variable declaration |type of a variable is defined by the assigned value        |
|variable always have the specified type during runtime    |variable can therefore have different types during runtime |

<br>
<br>

### **Structural VS Nominal Static Type System**
<br>

|**Structural Static Type System**                                      |**Nominal Static Type System**                       |
|:----------------------------------------------------------------------|:----------------------------------------------------|
|compatibility of types is defined by their same structure (ducktyping) |compatibility of types is defined by their hierarchy |(substitution principle)


<br>
<nr>
<br>

## **Explicit VS. Implicit Type System**
<br>

|**Explicit Type System**         |**Implicit Type System**                   |
|:--------------------------------|:------------------------------------------|
|types must be defined explicitly |types can be inferred from assigned values |

<br>

Not mutually exclusive!

<br>
<br>
<br>

## **Variance**
<br>

* Describes what other types can be used in place of a certain type T
* Assume that we have a specified type T

<br>

### **Invariance**

* only exact type T

<br>

### **Covariance**

* subtype of T or 
* exact type T

<br>

### **Contravariance**

* supertype of T or 
* exact type T

<br>

### **Bivariance**

* subtype of T or
* supertype of T or
* exact type T
