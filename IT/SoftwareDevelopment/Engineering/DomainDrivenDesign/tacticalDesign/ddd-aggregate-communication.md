# **DDD - Aggregate Communication**
<br>

## **Table Of Contents**

- [**DDD - Aggregate Communication**](#ddd---aggregate-communication)
  - [**Table Of Contents**](#table-of-contents)
  - [**Publishing Domain Events**](#publishing-domain-events)
    - [**Outbox Pattern**](#outbox-pattern)
    - [**Saga Pattern**](#saga-pattern)
    - [**Process Manager Pattern**](#process-manager-pattern)

<br>
<br>
<br>
<br>

## **Publishing Domain Events**

Aggregates publish domain events to communicate with other components of the system.

<br>
<br>
<br>

### **Outbox Pattern**

```mermaid
flowchart LR
   A[Aggregate]
   B[(Database)]
   C[Message Relay]
   D[Message Bus]
   A -- commit state and domain events --> B
   B <-- query unpublished events --> C
   C -- publish events --> D
```

<br>

- The aggregate commits its state and the domain events in a single transaction
- The state and the domain events are typically stored in different tables:

```mermaid
stateDiagram-v2
   A: Aggregate Status
   B: Outbox Table (domain events)
   state Transaction {
      direction LR
      A -- B
   }
```

<br>

- The message relay can query the database by *pulling* or *pushing*

<br>
<br>
<br>

### **Saga Pattern**

> A **saga** is a business process that consists of multiple transactions.

<br>

```mermaid
flowchart LR
   A[Aggregate A]
   B[Saga]
   C[Aggregate B]

   A -. Domain Events .-> B
   B -- Commands based on domain events of B --> A
   C -. Domain Events .-> B
   B -- Commands based on domain events of A --> C
```

<br>

The saga ...
- listens to the domain events of the aggregates
- reacts to the incoming domain events by sending commands 
- is used for simple processes without variations (*if-else-statements*)
- is implicitly instantiated when a specific event occurs

<br>
<br>
<br>

### **Process Manager Pattern**

```mermaid
flowchart LR
   A[Application]
   B[Process Manager]
   C[(State)]
   D[Aggregate A]
   E[Aggregate B]
   F[Aggregate C]
   A -- instantiates --> B
   B <--> C
   B -.-> D
   B -.-> E
   B -.-> F
```

The process manager ...

- implements a process based on business logic
- decides the next process steps
- is explicitly instantiated
