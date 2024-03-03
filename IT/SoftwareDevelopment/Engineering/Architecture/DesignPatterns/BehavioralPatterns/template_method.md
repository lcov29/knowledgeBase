# **Template Method**
<br>

## **Table Of Contents**
<br>

- [**Template Method**](#template-method)
  - [**Table Of Contents**](#table-of-contents)
  - [**Intent**](#intent)
  - [**Core Ideas**](#core-ideas)
  - [**Structure**](#structure)
  - [**Use Cases**](#use-cases)
  - [**Consequences**](#consequences)
  - [**Implementation Tips**](#implementation-tips)
  - [**Example**](#example)

<br>
<br>
<br>
<br>

## **Intent**

Create base algorithm in a superclass and allow subclasses to implement and overwrite parts of the implementation.

<br>
<br>
<br>
<br>

## **Core Ideas**

- Split algorithm in small coherent steps and model them as methods
- Provide base implementation using all methods within a single *template method*
- Allow subclasses to implement or overwrite the methods of the base algorithnm

<br>
<br>
<br>
<br>

## **Structure**

![Template Method](./picture/template_method.drawio.svg)

<br>
<br>
<br>
<br>

## **Use Cases**

- We want to be able to customize specific steps of an algorithm

<br>
<br>
<br>
<br>

## **Consequences**
<br>

|**Advantages**                           |**Disadvantages** |
|:----------------------------------------|:-----------------|
|Overwrite specific steps of an algorithm |Violation of the substitution principle by supressing default steps of the base algorithm |
|Avoid code duplication                   |

<br>
<br>
<br>
<br>

## **Implementation Tips**

\-

<br>
<br>
<br>
<br>

## **Example**

```typescript
abstract class BaseAlgorithm {
  public templateMethod: void {
    this.step1();
    this.step2();
    this.step3();
  }

  protected step1() {
    // default implementation
  }

  protected step2() {
    // default implementation
  }

  protected step3() {
    // default implementation
  }
}
```

<br>

```typescript
class ModifiedAlgorithm extends BaseAlgorithm {
  protected step2() {
    // modified implementation
  }
}
```