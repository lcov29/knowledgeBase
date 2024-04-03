# **Domain Driven Design Strategic Design**
<br>

## **Table Of Contents**

- [**Domain Driven Design Strategic Design**](#domain-driven-design-strategic-design)
  - [**Table Of Contents**](#table-of-contents)
  - [**Process**](#process)
    - [**1. Collect Information**](#1-collect-information)
    - [**2. Identify The Domains**](#2-identify-the-domains)
    - [**3. Work Out An Ubiquitous Language**](#3-work-out-an-ubiquitous-language)
    - [**4. Examine The High Level Components Of Existing Solution**](#4-examine-the-high-level-components-of-existing-solution)
    - [**5. Create A Context Map For The Components**](#5-create-a-context-map-for-the-components)
    - [**6. Identify Weaknesses**](#6-identify-weaknesses)
    - [**7. Improve In Small Iterative Steps**](#7-improve-in-small-iterative-steps)
  - [**Decision Tree**](#decision-tree)

<br>
<br>
<br>
<br>

## **Process**
<br>
<br>

### **1. Collect Information**

- Which products or services is the business offering?
- Who are the customers?
- How is the business creating the products or services?
- Who are the competitors of the business?
- What are the advantages and disadvantages of the product or service?

<br>
<br>

### **2. Identify The Domains**

```mermaid
flowchart
  A[Domain]
  B{Creates Competitive Advantage?}
  C[Core Subdomain]
  D{Third-party Solution Available?}
  E[Generic Subdomain]
  F[Supporting Subdomain]

  A --> B
  B -- Yes --> C
  B -- No --> D
  D -- Yes --> E
  D -- No --> F
```

<br>
<br>

### **3. Work Out An Ubiquitous Language**

<br>
<br>

### **4. Examine The High Level Components Of Existing Solution**

- Which components have independent lifecycles?
- Which identified subdomains does each component contain?
- What patterns were used to implement the logic?
- What architecture was used?

<br>
<br>

### **5. Create A Context Map For The Components**

<br>
<br>

### **6. Identify Weaknesses**

- Is domain functionality implemented multiple times?
- Are multiple teams working on the same components?
- Is the integration of the components messy?
- Is core domain functionality implemented by a third party?

<br>
<br>

### **7. Improve In Small Iterative Steps**

- Enforce the boundaries of the subdomains with logical boundary mechanisms (packages, modules, namespaces, ...)
- Transform the logical boundaries of the most important subdomains to the physical boundaries of a bounded context
- Model the relationship between the extracted bounded contexts according to the integration patterns

<br>
<br>
<br>
<br>

## **Decision Tree**

```mermaid
flowchart
  A{Subdomain}
  B{Complex Data Structure?}
  C{Audit Log or Analysis?}
  D[Transaction Script]
  E[Active Record]
  F[Domain Model]
  G[Event-Sourced Domain Model]
  H{Multiple Persistence Models?}
  I{Multiple Persistence Models?}
  J{Multiple Persistence Models?}
  K{Multiple Persistence Models?}
  L["Layered Architecture (3 Layers)"]
  M["Layered Architecture (4 Layers)"]
  N[Ports And Adapters]
  O[CQRS]
  P[CQRS]
  Q[CQRS]
  R[CQRS]
  S[Reverse Testing Pyramid]
  T[Testing Diamond]
  U[Testing Pyramid]
  V[Testing Pyramid]

  A -- Supporting or Generic --> B
  A -- Core --> C
  B -- No --> D
  B -- Yes --> E
  C -- No --> F
  C -- Yes --> G
  D --> H
  E --> I
  F --> J
  G --> K
  H -- No --> L
  H -- Yes --> O
  I -- No --> M
  I -- Yes --> P
  J -- No --> N
  J -- Yes --> Q
  K -- No --> R
  L & O --> S
  M & P --> T
  N & Q --> U
  R --> V
```