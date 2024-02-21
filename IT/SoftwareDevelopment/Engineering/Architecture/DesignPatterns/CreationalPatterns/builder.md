# **Builder**
<br>

## **Table Of Contents**
<br>

- [**Builder**](#builder)
  - [**Table Of Contents**](#table-of-contents)
  - [**Intent**](#intent)
  - [**Core Idea**](#core-idea)
  - [**Structure**](#structure)
  - [**Use Cases**](#use-cases)
  - [**Advantages**](#advantages)
  - [**Implementation Tips**](#implementation-tips)
  - [**Related Patterns**](#related-patterns)
  - [**Example**](#example)
    - [**Builder**](#builder-1)
      - [**Interface**](#interface)
      - [**Concrete Hyundai Builder**](#concrete-hyundai-builder)
    - [**Director**](#director)
  
<br>
<br>
<br>
<br>

## **Intent**

Step by step process to construct different types and representations of **complex** objects.

<br>
<br>
<br>
<br>

## **Core Idea**

- Extract the build process into a class that implements each build step as a method
- Clients can configure the desired object by calling some or all of the builder´s methods
- Optionally encapsulate a specific build process with a class _Director_

<br>
<br>
<br>
<br>

## **Structure**

![Structure](./picture/builder.drawio.svg)

<br>
<br>
<br>
<br>

## **Use Cases**

- Expensive creation of complex objects with many fields and/or nested objects
- Covering every configuration with subclasses would be too extensive
- Covering every configuration within the constructor would lead to many optional parameters

<br>
<br>
<br>
<br>

## **Advantages**

- Encapsulation and isolation of the creation and representation of complex objects from other code
- Builder has full control over build process
- Objects can be created step by step
  
<br>
<br>
<br>
<br>

## **Implementation Tips**

- Design the builder interface to enable a correct build process for all concrete builders
- Every concrete build method should return a reference to its class to enable chaining build methods
- Create a new builder for each product representation

<br>
<br>
<br>
<br>

## **Related Patterns**

- [Abstract Factory](./abstract_factory.md)
- Composite

<br>
<br>
<br>
<br>

## **Example**
<br>
<br>

### **Builder**
<br>
<br>

#### **Interface**

```typescript
interface CarBuilder {
  addEngine(): Carbuilder;
  addBody(): Carbuilder;
  addTires(): Carbuilder;
  reset(): void;
  build(): Car;
}
```

<br>
<br>

#### **Concrete Hyundai Builder**

```typescript
class Car {
  private manufacturer: string;
  private engine: Engine;
  private body: Body;
  private tires: TireSet;

  constructor(manufacturer: string) {
    this.manufacturer = manufacturer;
  }

  set engine(engine: Engine) {
    this.engine = engine;
  }

  set body(body: Body) {
    this.body = body;
  }

  set tires(tires: Tire[]) {
    this.tires = tires;
  }
}
```

<br>

```typescript
class HyundaiBuilder implements CarBuilder {
  private car: Car;

  constructor() {
    this.car = new Car('Hyundai');
  }

  addEngine(type: string) {
    switch (type) {
      case 'V3':
        this.car.engine = new Engine('Model-X3');
        break;
      case 'V6':
        this.car.engine = new Engine('Model-X6');
        break;
      case 'V8':
        this.car.engine = new Engine('Model-X8');
        break;
      default:
        this.car.engine = new Engine('Model-X5');
    }
    return this;
  }

  addBody(color: string) {
    this.car.body = new Body(color);
    return this;
  }

  addTires(model: string) {
    const tires = new Array(5)
      .fill(null);
      .map(() => new Tire(model));

    this.car.tires = tires;
    return this;
  }

  reset() {
    this.car = new HyundaiCar('Hyundai');
  }

  build() {
    return this.car;
  }
}
```

<br>
<br>
<br>

### **Director**

```typescript
class HyundaiDirector {
  private builder: HyundaiBuilder;

  constructor() {
    this.builder = new HyundaiBuilder();
  }

  buildModelA() {
    this.builder.reset();
    this.builder.addEngine('V6');
    this.builder.addBody('K3');
    this.builder.addTires('LH-3');
    return this.builder.build();
  }

  buildModelB() {
    this.builder.reset();
    this.builder.addEngine('V3');
    this.builder.addTires('GBK-13');
    return this.builder.build();
  }
}
```