# **Abstract Factory**
<br>

## **Table Of Contents**
<br>

- [**Abstract Factory**](#abstract-factory)
  - [**Table Of Contents**](#table-of-contents)
  - [**Intent**](#intent)
  - [**Structure**](#structure)
  - [**Use Cases**](#use-cases)
  - [**Advantages**](#advantages)
  - [**Implementation Tips**](#implementation-tips)
  - [**Related Patterns**](#related-patterns)
  - [**Example**](#example)
    - [**Abstract Products**](#abstract-products)
    - [**Abstract Factory**](#abstract-factory-1)
    - [**Concrete Hyundai Factory**](#concrete-hyundai-factory)
      - [**Concrete Products**](#concrete-products)
      - [**Concrete Factory**](#concrete-factory)
    - [**Concrete Mercedes Factory**](#concrete-mercedes-factory)
      - [**Concrete Products**](#concrete-products-1)
      - [**Concrete Factory**](#concrete-factory-1)

<br>
<br>
<br>
<br>

## **Intent**

Creation of concrete factories that allows creating semantically related objects without specifying their concrete classes.

<br>
<br>
<br>
<br>

## **Structure**

![Structure](./picture/abstract_factory.drawio.svg)

<br>
<br>
<br>
<br>

## **Use Cases**

1. The system should be configurable with one or multiple group of related objects
2. A group of related objects is intended and requires collective usage.
3. The system should work independently of creation, composition or rendering of the products.

<br>
<br>
<br>
<br>

## **Advantages**

1. Isolates the concrete product classes from the client
2. Product families are easily replacable by using a different concrete factory
3. Ensures collective usage of product families

<br>
<br>
<br>
<br>

## **Implementation Tips**

1. Concrete factories can be implemented as singletons since the application usually only requires as single factory
2. Define a factory method for each product
3. Use a prototype if a lot of different product families should be supported

<br>
<br>
<br>
<br>

## **Related Patterns**

- [Factory Method](./factory_method.md)
- Prototype
- Singleton

<br>
<br>
<br>
<br>

## **Example**
<br>
<br>

### **Abstract Products**

```typescript
interface Engine {
  start(): void;
  stop(): void;
}

interface Body {
  setColor(color: Color): void;
}

interface Tire {
  inflate(): void;
  deflate(): void;
}
```

<br>
<br>
<br>

### **Abstract Factory**

```typescript
abstract class AbstractCarFactory {
  createEngine(): Engine;
  createBody(): Body;
  createTire(): Tire;
}
```

<br>
<br>
<br>

### **Concrete Hyundai Factory**
<br>
<br>

#### **Concrete Products**

```typescript
class HyundaiEngine implements Engine {
  start() { /* implementation */ }
  stop() { /* implementation */ }
}

class HyundaiBody implements Body {
  setColor(color: Color) { /* implementation */ }
}

class HyundaiTire implements Tire {
  inflate() { /* implementation */ }
  deflate() { /* implementation */ }
}
```

<br>
<br>

#### **Concrete Factory**

```typescript
class HyundaiCarFactory implements AbstractCarFactory {
  createEngine(): Engine {
    return new HyundaiEngine();
  }

  createBody(): Body {
    return new HyundaiBody();
  }

  createTire(): Tire {
    return new HyundaiTire();
  }
}
```

<br>
<br>
<br>

### **Concrete Mercedes Factory**
<br>
<br>

#### **Concrete Products**

```typescript
class MercedesEngine implements Engine {
  start() { /* implementation */ }
  stop() { /* implementation */ }
}

class MercedesBody implements Body {
  setColor(color: Color) { /* implementation */ }
}

class MercedesTire implements Tire {
  inflate() { /* implementation */ }
  deflate() { /* implementation */ }
}
```

<br>
<br>

#### **Concrete Factory**

```typescript
class MercedesCarFactory implements AbstractCarFactory {
  createEngine(): Engine {
    return new MercedesEngine();
  }

  createBody(): Body {
    return new MercedesBody();
  }

  createTire(): Tire {
    return new MercedesTire();
  }
}
```