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
    - [**Test Structure**](#test-structure)
      - [**Arrange-Act-Assert-Pattern**](#arrange-act-assert-pattern)

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
- independent execution without side effects
- fast execution
- refactoring the implementation of the unit does not lead to changes of the test 


They should be **fast**, **repeatable** and **easy to read and write**.

<br>
<br>
<br>

## **Best Practices**
<br>
<br>
<br>

### **Test Structure**
<br>
<br>

#### **Arrange-Act-Assert-Pattern**
<br>


<!--


Test Structure
  - nest suits logically
  - pattern: Arrange - Act - Assert
    - Arrange: set up test
    - Act: execute code under test
    - Assert: compare result of executed code to expectation
  - avoid logic like if-statements or loops
  - test externally observable behaviour, NOT the internal implementation details
  - extract extensive setup code into factory function (tradeoff with readability)
  - test every possible end result of a unit with a separate test (look out for words 'and'/'or in the test descriptions!)
  - test general AND edge cases


Naming of tests:
   - describe what is being tested
   - do not contain useless filler words ('should', 'correctly', 'always', ..)
   - description should not contain the word `should`
   - pattern: <Unit> - <Scenario> - <Expected Behaviour>

   ```javascript
   describe('<unit>', () => {

      it('<expected behaviour> when <scenario>', () => {
         // test implementation
      });

   });
   ```

   or 

   ```javascript
   describe('<unit>', () => {

      describe('when <scenario>', () => {

         it('<expected behaviour>', () => {
            // test implementation
         })

         it('<expected behaviour>', () => {
            // test implementation
         })
      });

   });
   ```

Mocking
   - mock only when original
     - creates shared state between tests
     - initiates HTTP requests
     - initiates page reloads
     - has a negative impact on execution speed of test
     - allows easier setup

For each bug, write a test before fixing it



============= Managing external dependencies ================

=== Dummy ===

Exp1:
- object that returns a value without implementing any functionality
- used to fulfill parameters of functions under test

```javascript
const dummyFn = () => 'foo';
```


=== Stub ===

Exp1: fake implementation of only a single behaviour of a service or component
Exp2: 
- working implementation of an api
- returns pre-canned value
Exp3:
- configured to respond to specific inputs with specific outputs
Exp4:
- generates predefined output
- used to check behaviour of code for return value

```javascript
service.method = jest.fn().mockReturnValue('someValue');
```


=== Fake ===

Exp1:
- fake implementation of multiple behaviours of a service or component
Exp2:
- pre-written implementation of object
- used to simplify the implementation
Exp3:
- almost working implementation


=== Mock ===

Exp1:
- concerned with
  - was mock called?
  - which functions were called?
  - with which parameters was a function called?
  - in which order were functions called?
- not concerned with return values or state
Exp2: 
- configured to respond to specific inputs with specific outputs
- add verification about interaction
Exp3:
- replaces external interface
- NOT used for checking function behaviour or return values
- Used for
  - was mock function called?
  - how many times was mock called?
  - what parameters were passed?


=== Fixture ===

Exp1: collection of pre-canned test data objects


=== Decision Tree ====


Test independent of external services / components? ------ Yes -----|> Done!
       |
       |
       No
       |
       V
Is dependency...
       |
       |
       V
never used in the test and only needed to satisfy the API? ---- Yes --|> Dummy
       |
       |
       No
       |
       V
external infrastructure with dynamic values? ---- Yes --|> Fake
       |
       |
       No
       |
       V
expected to return a known value? ---- Yes --|> Stub
       |
       |
       V
expected to execute a specific action? ---- Yes ---|> Mock


-->