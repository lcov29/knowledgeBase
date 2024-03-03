# **Observer**
<br>

## **Table Of Contents**
<br>

- [**Observer**](#observer)
  - [**Table Of Contents**](#table-of-contents)
  - [**Intent**](#intent)
  - [**Core Ideas**](#core-ideas)
  - [**Structure**](#structure)
  - [**Use Cases**](#use-cases)
  - [**Consequences**](#consequences)
  - [**Implementation Tips**](#implementation-tips)
  - [**Example**](#example)
    - [**Observer**](#observer-1)
    - [**Subject**](#subject)
    - [**Client**](#client)

<br>
<br>
<br>
<br>

## **Intent**

Notify subscriber objects about events happening to an observed object.

<br>
<br>
<br>
<br>

## **Core Ideas**

- The *observer* objects register themself at a *subject* object
- The *subject* object notifies all its *observer* objects when an event occurs

<br>
<br>
<br>
<br>

## **Structure**

![Observer](./picture/observer.drawio.svg)

<br>
<br>
<br>
<br>

## **Use Cases**

- When events or state changes of one object requires changing other objects

<br>
<br>
<br>
<br>

## **Consequences**
<br>

|**Advantages**                 |**Disadvantages**                      |
|:------------------------------|:--------------------------------------|
|Easy addition of new observers |Observers are notified in random order |

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

### **Observer**

```typescript
interface Observer {
  update(payload: string): void;
}
```

<br>

```typescript
class ConcreteObserver implements Observer {
  private name: string;

  constructor(name: string) {
    this.name = name;
  }

  update(payload: string) {
    console.log(`Observer ${this.name}: Received payload "${payload}"`);
  }
}
```

<br>
<br>
<br>

### **Subject**

```typescript
class Subject {
  private observers: Observer[];

  public observe(observer: Observer) {
    this.observers.push(observer);
  }

  public unobserve(observer: Observer) {
    this.observers = this.observers.filter(
      (currentObserver) => currentObserver !== observer
    );
  }

  public notifyObservers(payload: string) {
    for (const observer of this.observers) {
      observer.update(payload);
    }
  }
}
```

<br>
<br>
<br>

### **Client**

```typescript
const subject = new Subject();

const observerA = new Observer('ObserverA');
const observerB = new Observer('ObserverB');

subject.observe(observerA);
subject.observe(observerB);

subject.notifyObservers('Notification');
```