# **Factory Method**
<br>

## **Table Of Contents**
<br>

- [**Factory Method**](#factory-method)
  - [**Table Of Contents**](#table-of-contents)
  - [**Intent**](#intent)
  - [**Structure**](#structure)
  - [**Use Cases**](#use-cases)
  - [**Consequences**](#consequences)
  - [**Implementation Tips**](#implementation-tips)
  - [**Related Patterns**](#related-patterns)
  - [**Example**](#example)
    - [**Product**](#product)
    - [**Creator**](#creator)

<br>
<br>
<br>
<br>

## **Intent**

Define a method for object creation in a superclass and delegate creation of a concrete object to the subclasses.

<br>
<br>
<br>
<br>

## **Structure**

![Structure](./picture/factory_method.drawio.svg)

<br>
<br>
<br>
<br>

## **Use Cases**

- We do not know the type and dependencies of the created object
- We develop a framework and want to grant the users the ability to extend the internal components

<br>
<br>
<br>
<br>

## **Consequences**
<br>

|**Advantages**                         |**Disadvantages** |
|:--------------------------------------|:-----------------|
|Object creation is customizable        |Each customization requires a subclass |
|Construction code is isolated from the client |    |
|Loose coupling between creator and product

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
- [Builder](./builder.md)
- Prototype

<br>
<br>
<br>
<br>

## **Example**
<br>
<br>

### **Product**

```typescript
interface Car {
   start(): void;
   drive(): void;
   stop(): void;
}
```

<br>

```typescript
class HyundaiCar implements Car {
   public start() {
      // implementation
   }

   public drive() {
      // implementation
   }

   public stop() {
      // implementation
   }
}
```

<br>

```typescript
class MercedesCar implements Car {
   public start() {
      // implementation
   }

   public drive() {
      // implementation
   }

   public stop() {
      // implementation
   }
}
```

<br>
<br>
<br>

### **Creator**

```typescript
abstract class CarManufacturer {
   public someMethod() {
      // implementation
   }

   public abstract produce(): Car;
}
```

<br>

```typescript
class Hyundai extends CarManufacturer {
   public produce() {
      return new HyundaiCar();
   }
}
```

<br>

```typescript
class Mercedes extends CarManufacturer {
   public produce() {
      return new Mercedes();
   }
}
```