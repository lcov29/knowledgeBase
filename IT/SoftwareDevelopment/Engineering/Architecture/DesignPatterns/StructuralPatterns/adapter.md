# **Adapter**
<br>

## **Table Of Contents**
<br>

- [**Adapter**](#adapter)
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

Allow collaboration between classes or objects with incompatible interfaces.

<br>
<br>
<br>
<br>

## **Core Ideas**

- Encapsulate one object in an adapter object
- Adapter objects converts the actions of the wrapped object so that the other object can use it

<br>
<br>
<br>
<br>

## **Structure**

![Structure](./picture/adapter.drawio.svg)

<br>
<br>
<br>
<br>

## **Use Cases**

- We want to use classes or objects with incompatible interfaces
- We want to reuse several subclasses that lock some common functionality that can not be added to the superclass

<br>
<br>
<br>
<br>

## **Consequences**
<br>

|**Advantages** |**Disadvantages** |
|:--------------|:-----------------|
|Adapter follows single responsibility principle |Increased code complexity due to the conversion code |
|Adapter follows the open-closed principle | |

<br>
<br>
<br>
<br>

## **Implementation Tips**

- The _Adaptee_ has to be a service class that we can not change

<br>
<br>
<br>
<br>

## **Example**

```typescript
interface Target {
  public request(): string;
}
```

<br>

```typescript
class Adaptee {
  public specificRequest(): number {
    return 42;
  }
}
```

<br>

```typescript
class TargetAdapter implements Target {
  private adaptee: Adaptee;

  constructor(adaptee: Adaptee) {
    this.adaptee = adaptee;
  }

  public request(): string {
    const adapteeResult = this.adaptee.specificRequest();
    return (adapteeResult + 15).toString();
  }
}
```