# **Ports And Adapters**
<br>

## **Table Of Contents**
<br>

- [**Ports And Adapters**](#ports-and-adapters)
  - [**Table Of Contents**](#table-of-contents)
  - [**Definition**](#definition)
  - [**Layers**](#layers)
    - [**Business Logic Layer**](#business-logic-layer)
    - [**Infrastructure Layer**](#infrastructure-layer)
    - [**Application Layer**](#application-layer)
  - [**When To Use**](#when-to-use)

<br>
<br>
<br>
<br>

## **Definition**

> The **ports and adapters** pattern decouples the business logic of a system from the infrastructure by forcing it to implement adapters for the ports defined by the business logic.

<br>

![Ports And Adapters](./picture/ports-and-adapters.drawio.svg)

<br>
<br>
<br>
<br>

## **Layers**
<br>
<br>

### **Business Logic Layer**

> The **business logic layer** contains all components, rules and invariants of the business logic.  
> It also defines interfaces (*ports*) that the [infrastructure layer](#infrastructure-layer) has to implement with adapters in order to communicate.

<br>
<br>

### **Infrastructure Layer**

> The **infrastructure layer** contains all external implementation details like databases or UI frameworks.  
> It also implements an adapter for each port defined by the [business logic layer](#business-logic-layer).

<br>
<br>

### **Application Layer**

> The **application layer** is a [facade](../DesignPatterns/StructuralPatterns/facade.md) for the business logic layer that encapsulates the orchestration of the actions.

<br>
<br>
<br>
<br>

## **When To Use**

When the business logic is implemented with a [domain model](../../DomainDrivenDesign/tacticalDesign/complexBusinessLogic/ddd-domain-model.md).
