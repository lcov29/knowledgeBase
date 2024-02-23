# **Prototype**
<br>

## **Table Of Contents**
<br>

- [**Prototype**](#prototype)
  - [**Table Of Contents**](#table-of-contents)
  - [**Intent**](#intent)
  - [**Core Ideas**](#core-ideas)
  - [**Structure**](#structure)
  - [**Use Cases**](#use-cases)
  - [**Consequences**](#consequences)
  - [**Implementation Tips**](#implementation-tips)
  - [**Related Patterns**](#related-patterns)
  - [**Example**](#example)

<br>
<br>
<br>
<br>

## **Intent**

Create new objects by copying a prototype object.

<br>
<br>
<br>
<br>

## **Core Ideas**

- The Prototype handles the cloning via a method `clone()`
- Define an interface that all clonable objects have to implement

<br>
<br>
<br>
<br>

## **Structure**

![Prototype](./picture/prototype.drawio.svg)

<br>
<br>
<br>
<br>

## **Use Cases**

- The instantiated class is specified at runtime
- The usage of factories should be avoided
- Instances should only have one of few specified states

<br>
<br>
<br>
<br>

## **Consequences**

|**Advantages**                           |**Disadvantages**                              |
|:----------------------------------------|:----------------------------------------------|
|No need for external initialization code |Difficult for objects with circular references |
|Convenient production of complex objects |                                               |

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

## **Related Patterns**

- [Abstract Factory](./abstract_factory.md)
- Singleton
- Command
- Composite
- Decorator
- Memento

<br>
<br>
<br>
<br>

## **Example**
<br>

```typescript
interface Prototype {
  clone(): Prototype;
}
```

<br>

```typescript
class ConcretePrototype implements Prototype {
  public state: string;

  clone() {
    const clone = Object.create(this);
    return clone;
  }
}
```