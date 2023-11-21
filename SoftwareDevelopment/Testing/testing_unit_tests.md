# **Software Testing - Unit Tests**
<br>

## **Table Of Contents**
<br>

- [**Software Testing - Unit Tests**](#software-testing---unit-tests)
  - [**Table Of Contents**](#table-of-contents)
  - [**What Is A Unit?**](#what-is-a-unit)
  - [**What Are Unit Tests?**](#what-are-unit-tests)
  - [**Traits Of Maintainable Unit Tests**](#traits-of-maintainable-unit-tests)
  - [**Best Practices**](#best-practices)
    - [**General**](#general)
      - [**Test Externally Observable Behaviour - Not Implementation Details**](#test-externally-observable-behaviour---not-implementation-details)
      - [**Test General And Edge Cases**](#test-general-and-edge-cases)
      - [**Avoid Logic Like If-Statements Or Loops Inside Of Tests**](#avoid-logic-like-if-statements-or-loops-inside-of-tests)
      - [**Write A Test That Reproduces A Bug Before Fixing It**](#write-a-test-that-reproduces-a-bug-before-fixing-it)
    - [**Test Structure**](#test-structure)
      - [**Use Arrange-Act-Assert-Pattern**](#use-arrange-act-assert-pattern)
      - [**Nest Test Suites Logically**](#nest-test-suites-logically)
      - [**Write A Separate Test For Each Possible Type Of Result**](#write-a-separate-test-for-each-possible-type-of-result)
      - [**Extract Extensive Setup Code Into Factory**](#extract-extensive-setup-code-into-factory)
    - [**Naming And Description**](#naming-and-description)
      - [**Describe What Is Being Tested**](#describe-what-is-being-tested)
      - [**Avoid Useless Filler Words**](#avoid-useless-filler-words)
      - [**Pattern: Unit-Expected-Scenario**](#pattern-unit-expected-scenario)
      - [**Pattern: Unit-Scenario-Expected**](#pattern-unit-scenario-expected)
  - [**Managing External Dependencies (Services or Components)**](#managing-external-dependencies-services-or-components)
    - [**Deciding How To Manage External Dependencies**](#deciding-how-to-manage-external-dependencies)
    - [**Concepts**](#concepts)
      - [**Dummy**](#dummy)
      - [**Stub**](#stub)
      - [**Fake**](#fake)
      - [**Mock**](#mock)

<br>
<br>
<br>

## **What Is A Unit?**
<br>

> A Unit is a coherent piece of code that can be executed independently

<br>
<br>
<br>

## **What Are Unit Tests?**
<br>

>Unit tests...
>- test the **expected behaviour** of a unit, **not the implementation** (Does the unit return the expected result for a given input?)
>- protect against **code regression** (unexpected behaviour after a change in codebase)
>- always run in **isolation** and **independent** from each other
>- do **not test interaction** between units

<br>
<br>
<br>

## **Traits Of Maintainable Unit Tests**
<br>

- readable
- easy to understand
- fast execution
- independent execution without side effects
- refactoring the implementation of the unit does not lead to changes of the test

<br>
<br>
<br>

## **Best Practices**
<br>
<br>
<br>

### **General**
<br>
<br>

#### **Test Externally Observable Behaviour - Not Implementation Details**
<br>

- this will make your tests resistant against refactorings of the unit

TODO: Add Bad And Good Example

<br>
<br>

#### **Test General And Edge Cases**

<br>
<br>

#### **Avoid Logic Like If-Statements Or Loops Inside Of Tests**

<br>
<br>

#### **Write A Test That Reproduces A Bug Before Fixing It**

<br>
<br>
<br>

### **Test Structure**
<br>
<br>

#### **Use Arrange-Act-Assert-Pattern**
<br>

1. **Arrange:** set up required resources
2. **Act:** execute code under test
3. **Assert**: check if executed code returned the expected result

<br>
<br>

#### **Nest Test Suites Logically**
<br>

TODO: Add Description + example

<br>
<br>

#### **Write A Separate Test For Each Possible Type Of Result**
<br>

- every test should check exactly **one** result type

<br>

> **Tip**: Watch out for the words 'and' or 'or' in your test description!

<br>
<br>

#### **Extract Extensive Setup Code Into Factory**
<br>

- This is a tradeoff with readability

TODO: add example

<br>
<br>
<br>

### **Naming And Description**
<br>
<br>

#### **Describe What Is Being Tested**
<br>

TODO: Add good + bad example

<br>
<br>

#### **Avoid Useless Filler Words**
<br>

- filler words: 'should', 'correctly', 'always', ...

TODO: add example

<br>
<br>

#### **Pattern: Unit-Expected-Scenario**
<br>

```javascript
describe('<unit>', () => {

   it('<expected behaviour> when <scenario>', () => { /* implementation */ });

   it('<expected behaviour> when <scenario>', () => { /* implementation */ });

});
```

<br>
<br>

#### **Pattern: Unit-Scenario-Expected**
<br>

```javascript
describe('<unit>', () => {

   describe('when <scenario>', () => {

      it('<expected behaviour>', () => { /* implementation */ });

      it('<expected behaviour>', () => { /* implementation */ });

   });

});
```

<br>
<br>
<br>

## **Managing External Dependencies (Services or Components)**
<br>
<br>

### **Deciding How To Manage External Dependencies**
<br>

|Is external dependency...                |Concept To Manage External Dependency |
|:----------------------------------------|:-------------------------------------|
|not existing?                            |None
|only needed to satisfy api and not used? |[Dummy](#dummy)
|expected to return a known value?        |[Stub](#stub)
|expected to return dynamic values?       |[Fake](#fake)
|expected to execute a specific action?   |[Mock](#mock)

<br>
<br>

### **Concepts**
<br>
<br>

#### **Dummy**
<br>

- object that returns a simple value or noting at all
- does not implement any logic
- used to fulfill parameters of functions under test

<br>

```javascript
const dummyFn = () => 'foo';
```

<br>
<br>

#### **Stub**
<br>

- object that returns a predefined outputs for specific inputs
- can implement simple logic
- used to check behaviour of code for return value

<br>

```javascript
service.method = jest.fn().mockReturnValue('someValue');
```

<br>
<br>

#### **Fake**
<br>

- fake implementation of the public api of a service or component
- used to test against a simplified object

<br>

TODO: add example

<br>
<br>

#### **Mock**
<br>

- acts as an external service
- used to verify the interaction of the unit test with the external service
- can answer questions like
  - was the mock called?
  - how ofter was the mock called?
  - which mock functions were called?
  - with which parameters was a function called?
  - in which order were functions called
- not concerned with returning values
