# **DDD - Bounded Context**
<br>

## **Table Of Contents**

- [**DDD - Bounded Context**](#ddd---bounded-context)
  - [**Table Of Contents**](#table-of-contents)
  - [**Bounded Context**](#bounded-context)
  - [**Link To Subdomains**](#link-to-subdomains)
  - [**Communication Patterns**](#communication-patterns)
    - [**Cooperation**](#cooperation)
      - [**Partnership**](#partnership)
      - [**Shared Kernel**](#shared-kernel)
    - [**Customer Supplier**](#customer-supplier)
      - [**Conformist**](#conformist)
      - [**Anticorruption Layer**](#anticorruption-layer)
      - [**Open-Host Service**](#open-host-service)
    - [**Separate Ways**](#separate-ways)
  - [**Context Map**](#context-map)
  - [**Heuristics**](#heuristics)
    - [**Implementation**](#implementation)
    - [**Size**](#size)
    - [**Cohesion**](#cohesion)

<br>
<br>
<br>
<br>

## **Bounded Context**

> A **bounded context** defines an area in which an [ubiquitous language](./ddd-ubiquitous-language.md) and the models described with it can be applied consistently.

<br>
<br>
<br>
<br>

## **Link To Subdomains**

- [subdomains](ddd-domains.md) are *identified*
- bounded contexts are *designed*

<br>

```mermaid
flowchart LR
  A(Subdomain)
  B(Bounded Context)
  A -- n:m --- B
```

<br>
<br>
<br>
<br>

## **Communication Patterns**

Bounded contexts communicate with each other via *contracts*, because their language and models can differ.

<br>
<br>
<br>

### **Cooperation**
<br>
<br>

#### **Partnership**

> The teams of two bounded context coordinate the communication between the contexts with each other, resolve conflicts and no team dominates the other.

<br>

![Partnership](./pictures/partnership.drawio.svg)

<br>
<br>

#### **Shared Kernel**

> A **shared kernel** contains models of a subdomain that are implemented in multiple bounded contexts.

<br>

![Shared Kernel](./pictures/shared-kernel.drawio.svg)

<br>

Since each change of a model immediately affects all bounded contexts the shared kernel should
- be limited in scope
- only expose elements that have to be implemented by the bounded contexts
- only contain contracts and data structures used for transportation

<br>

The usage of a shared kernel is a tradeoff between the *cost of code duplication* and the *cost of the coordination overhead* which is heavily influenced by the volatility of the models.

<br>
<br>
<br>

### **Customer Supplier**
<br>
<br>

#### **Conformist**

> The supplier (*upstream*) dictates the communication contract and the customer (*downstream*) adapts its implementation to that.

<br>

![Conformist](./pictures/conformist.drawio.svg)

<br>
<br>

#### **Anticorruption Layer**

> The supplier (*upstream*) dictates the communication contract but the customer (*downstream*)  translates the answer of the supplier to its language and models.

<br>

![Anticorruption Layer](./pictures/anticorruption-layer.drawio.svg)

<br>
<br>

#### **Open-Host Service**

> The supplier (*upstream*) offers a public interface (*Published Language*) that is independent of its implementation model to his customers (*downstream*) in order to protect them from changes.

<br>

![Open-Host Service](./pictures/open-host-service.drawio.svg)

<br>
<br>

### **Separate Ways**

> The teams duplicate functionalities in their bounded contexts in order to avoid communication and cooperation.

<br>
<br>
<br>
<br>

## **Context Map**

> A **context maps** shows all communication between the bounded context and the selected patterns.

<br>

![Context Map](./pictures/context-map.drawio.svg)

<br>
<br>
<br>
<br>

## **Heuristics**
<br>
<br>
<br>

### **Implementation**

> Each bounded context should be implemented as a separate service or project by a single team. A bounded context therefore also represents the physical border of the system they are implemented upon.

<br>
<br>
<br>

### **Size**

> Smaller bounded contexts can scale independently of one another and they can be handled by separate development teams. The downside is the integration overhead.

<br>

> Bigger bounded contexts reduce the integration overhead but make it harder to be consistent.

<br>
<br>
<br>

### **Cohesion**

> Make sure to keep cohesive functionality within the same context!

