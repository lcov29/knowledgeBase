# **Visitor**
<br>

## **Table Of Contents**
<br>

- [**Visitor**](#visitor)
  - [**Table Of Contents**](#table-of-contents)
  - [**Intent**](#intent)
  - [**Core Ideas**](#core-ideas)
  - [**Structure**](#structure)
  - [**Use Cases**](#use-cases)
  - [**Consequences**](#consequences)
  - [**Implementation Tips**](#implementation-tips)
  - [**Example**](#example)
    - [**Element**](#element)
    - [**Visitor**](#visitor-1)

<br>
<br>
<br>
<br>

## **Intent**

Separate algorithms from the objects they operate on.

<br>
<br>
<br>
<br>

## **Core Ideas**

- Extract algorithms into methods of a new *visitor* class
- Pass context object as a parameter to the *visitor* methods
- *Double dispatch*: context object passed as a parameter decides which *visitor* method it wants to use

<br>
<br>
<br>
<br>

## **Structure**

![Visitor](./picture/visitor.drawio.svg)

<br>
<br>
<br>
<br>

## **Use Cases**

- We want to perform an variants of the same operation on all elements of a complex structure
- We want to model auxiliary behaviors

<br>
<br>
<br>
<br>

## **Consequences**
<br>

|**Advantages** |**Disadvantages** |
|:--------------|:-----------------|
|Separates the object specific implementation of a method |We need to update all visitors when a new object class is added |

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
<br>
<br>
<br>

### **Element**

```typescript
interface Component {
  accept(visitor: Visitor): void;
}
```

<br>

```typescript
class ConcreteComponentA implements Component {
  public accept(visitor: Visitor): void {
    visitor.visitConcreteComponentA(this);
  }
}
```

<br>

```typescript
class ConcreteComponentB implements Component {
  public accept(visitor: Visitor): void {
    visitor.visitConcreteComponentB(this);
  }
}
```

<br>
<br>
<br>

### **Visitor**

```typescript
interface Visitor {
  visitConcreteComponentA(component: ConcreteComponentA): void;
  visitConcreteComponentB(component: ConcreteComponentB): void;
}
```

<br>

```typescript
class ConcreteVisitor implements Visitor {
  public visitConcreteComponentA(component: ConcreteComponentA): void {
    console.log('ConcreteVisitor: handle visit of ConcreteComponentA');
  }

  public visitConcreteComponentB(component: ConcreteComponentB): void {
    console.log('ConcreteVisitor: handle visit of ConcreteComponentB');
  }
}
```