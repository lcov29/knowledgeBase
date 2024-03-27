# **DDD - Bounded Context Communication**
<br>

## **Table Of Contents**

- [**DDD - Bounded Context Communication**](#ddd---bounded-context-communication)
  - [**Table Of Contents**](#table-of-contents)
  - [**Model Translation**](#model-translation)
    - [**Stateless**](#stateless)
    - [**Stateful**](#stateful)

<br>
<br>
<br>
<br>

## **Model Translation**
<br>
<br>

### **Stateless**

In a stateless model translation the bounded contexts communicate via a proxy.

<br>

```mermaid
flowchart LR
  A(Bounded Context A)
  B(Proxy)
  C(Bounded Context B)
  A -- Model A --> B -- Model B --> C
```

<br>
<br>
<br>

### **Stateful**

A stateful model translation is used when the translation includes aggregating data in some way.

<br>

```mermaid
stateDiagram-v2
  direction LR
  A: Bounded Context A
  B: Aggregator
  C: Bounded Context B
  D: Storage

  state Proxy {
    B D
  }

  A --> B: Request
  B --> C: Batched Request
```
