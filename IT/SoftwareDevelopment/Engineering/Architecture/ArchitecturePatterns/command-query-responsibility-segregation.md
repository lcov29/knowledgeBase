# **Command Query Responsibility Segregation (CQRS)**
<br>

## **Table Of Contents**

- [**Command Query Responsibility Segregation (CQRS)**](#command-query-responsibility-segregation-cqrs)
  - [**Table Of Contents**](#table-of-contents)
  - [**Definition**](#definition)
  - [**Command Execution Model**](#command-execution-model)
  - [**Read Models**](#read-models)
  - [**Polyglot Persistance Model**](#polyglot-persistance-model)
  - [**Projections**](#projections)
    - [**Synchronous Projection**](#synchronous-projection)
    - [**Asynchronous Projection**](#asynchronous-projection)
  - [**When To Use**](#when-to-use)

<br>
<br>
<br>
<br>

## **Definition**

> The **command query responsibility segregation** (CQRS) divides the models of the system into a [command execution model](#command-execution-model) and multiple [read models](#read-models).

<br>

![CQRS](./picture/cqrs.drawio.svg)

<br>
<br>
<br>
<br>

## **Command Execution Model**

> The **command execution model** implements the business logic and contains only strictly consistent data.  
> It is the source of truth and can modify the system state by executing commands.

<br>

> **NOTE**: Executed commands is allowed to return data to the initiator!

<br>
<br>
<br>
<br>

## **Read Models**

> The **read models** are cached projections of the system data that are used for specific users or purposes. They are read-only,

<br>
<br>
<br>
<br>

## **Polyglot Persistance Model**

> In a **polyglot persistence model** we use multiple different database types to fulfill the system requirements for the data.

<br>
<br>
<br>
<br>

## **Projections**
<br>
<br>

### **Synchronous Projection**

```mermaid
flowchart LR
   A[(Command Execution Model)]
   B(Projection Engine)
   C[(Read Models)]
   A -- 2. send changes --> B
   B -- 1. query changes after last checkpoint --> A
   B -- 3. project --> C
   B -- 4. update last checkpoint --> B
```

<br>
<br>

### **Asynchronous Projection**

```mermaid
flowchart LR
   A[(Command Execution Model)]
   B(Changes)
   C(Changes)
   D(Projection Engine)
   E(Projection Engine)
   F[(Read Model)]
   G[(Read Model)]
   A -- publish --> B
   A -- publish --> C
   B -- subscribe --> D
   C -- subscribe --> E
   D -- project --> F
   E -- project --> G
```

<br>
<br>
<br>
<br>

## **When To Use**

We use CQRS when our system has to work on multiple models that share the same data.