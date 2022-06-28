# **Functional Programming**
<br>

## **Table Of Contents**
<br>

- [**Functional Programming**](#functional-programming)
  - [**Table Of Contents**](#table-of-contents)
  - [**Core Principles Of Functional Programming**](#core-principles-of-functional-programming)
  - [**Functional Programming In JavaScript**](#functional-programming-in-javascript)

<br>
<br>
<br>
<br>

## **Core Principles Of Functional Programming**
<br>

1. **Functions are first class objects**
   
    * functions can be assigned to variables
    * functions can be used as arguments of other functions
    * functions can be created and returned by other functions

<br>

2. **Functions have no side effects**

    * functions always return same result for same input
    * functions do not modify their call scope in any form

<br>

3. **Data structures are immutable**

    * functions do not alter existing data structures
    * function return only newly created data structures as results

<br>

4. **Programs are declarative**

    * programs state _what_ should be done, not _how_ it should be done

<br>
<br>
<br>
<br>

## **Functional Programming In JavaScript**
<br>

JavaScript supports both the functional and the [object-oriented](./javascript_object_oriented_programming.md) paradigm.

Therefore it is not a pure functional language. Lets see which core principles are fulfilled:

<br>
<br>

1. **Functions are first class objects** :heavy_check_mark_:

<br>

2. **Functions have no side effects** :x:

    * functions can alter their call context
    * functions can return different results for the same arguments based on outside dependencies

<br>

3. **Data structures are immutable** :x:

    * function can alter existing data structures

<br>

4. **Programs are declarative** :x:

    * programs can be imperative

