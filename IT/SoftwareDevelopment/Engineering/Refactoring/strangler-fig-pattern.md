# **Strangler Fig Pattern**
<br>

## **Table Of Contents**

- [**Strangler Fig Pattern**](#strangler-fig-pattern)
  - [**Table Of Contents**](#table-of-contents)
  - [**Migration Process**](#migration-process)
    - [**Early Phase**](#early-phase)
    - [**Late Phase**](#late-phase)
    - [**Completed**](#completed)

<br>
<br>
<br>
<br>

## **Migration Process**
<br>
<br>

### **Early Phase**

```mermaid
flowchart TB
   A(Client)
   B(Facade)
   C("Legacy\n-code\n-code\n-code")
   D(New)
   E[(Database)]
   A --> B --> C & D --> E
```

<br>
<br>

### **Late Phase**

```mermaid
flowchart TB
   A(Client)
   B(Facade)
   C("Legacy\n-code")
   D("New\n-code\n-code")
   E[(Database)]
   A --> B --> C & D --> E
```

<br>
<br>

### **Completed**

```mermaid
flowchart TB
   A(Client)
   B("New\n-code\n-code\n-code")
   C[(Database)]
   A --> B --> C
```