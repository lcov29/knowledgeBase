# **Coupling**
<br>

## **Table Of Contents**

- [**Coupling**](#coupling)
  - [**Table Of Contents**](#table-of-contents)
  - [**What is coupling?**](#what-is-coupling)
  - [**Coupling Types**](#coupling-types)
    - [**Implementation Coupling**](#implementation-coupling)
    - [**Functional Coupling**](#functional-coupling)
    - [**Time Coupling**](#time-coupling)

<br>
<br>
<br>
<br>

## **What is coupling?**

> **Coupling** describes the degree of interdependence between different components in a system.

<br>

**Good:** Weak Coupling

```mermaid
flowchart LR
   A(Component A)
   B(Component B)
   C(Component C)
   D(Component D)
   A --- B & C
   C --- D
```

<br>
<br>

**Bad:** Strong Coupling

```mermaid
flowchart LR
   A(Component A)
   B(Component B)
   C(Component C)
   D(Component D)
   A --- B & C & D
   B --- C & D
   C ---D
```

<br>
<br>
<br>
<br>

## **Coupling Types**
<br>
<br>
<br>

### **Implementation Coupling**

> **Implementation coupling** describes that a component relies on implementation details of another component and is affected by changes to it.

<br>

```mermaid
flowchart LR
   A(Change)
   B(Component A)
   subgraph C[Component B]
      D[Implementation Details]
   end
   A -- affects --> B & D
   B -. implementation coupling -.- C
```

<br>
<br>
<br>

### **Functional Coupling**

> **Functional coupling** describes that multiple components contain the same functionality and are therefore affected by changes to this functionality.

<br>

```mermaid
flowchart LR
   X(Change)
   subgraph A[Component B]
      B(Shared Functionality)
      C(Custom Functionality)
   end
   subgraph D[Component A]
      E(Shared Functionality)
      F(Custom Functionality)
   end
   X -- affects --> B & E
   A -. functional coupling -.- D
```

<br>
<br>
<br>

### **Time Coupling**

> **Time coupling** describes that component A depends on the *previous* execution of component B.  
>
> In other words there is a specific order of execution.

<br>

```mermaid
flowchart LR
   A(Component A)
   B(Component B)
   A -. depends on previous execution -.-> B
```
