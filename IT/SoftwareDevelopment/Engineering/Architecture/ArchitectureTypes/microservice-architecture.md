# **Microservice Architecture**
<br>

## **Table Of Contents**

- [**Microservice Architecture**](#microservice-architecture)
  - [**Table Of Contents**](#table-of-contents)
  - [**Microservice**](#microservice)
  - [**Advantages**](#advantages)

<br>
<br>
<br>
<br>

## **Microservice**
<br>

> A **microservice** is a [service](../../../glossary.md#service) with physical boundaries.  
> It offers a small public interface to the outside and exclusively operates on its database.

<br>
<br>

```mermaid
flowchart LR
   subgraph Microservice
      direction LR
      A(Public Interface)
      B(Service Implementation)
      C[(Database)]
      A --> B --> C
   end
   D(Outside) --> A
```

<br>
<br>
<br>
<br>

## **Advantages**
<br>

- Scalability
- Easy to understand and integrate
- Lower frequency of necessary changes
