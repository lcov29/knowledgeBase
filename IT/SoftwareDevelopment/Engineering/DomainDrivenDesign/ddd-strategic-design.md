# **Domain Driven Design Strategic Design**
<br>

## **Table Of Contents**

- [**Domain Driven Design Strategic Design**](#domain-driven-design-strategic-design)
  - [**Table Of Contents**](#table-of-contents)
  - [**Overview**](#overview)
  - [**Mental Model**](#mental-model)
  - [**Decision Tree**](#decision-tree)

<br>
<br>
<br>
<br>

## **Overview**

Analysis:

- Identify the core, generic and supporting subdomains

<br>
<br>
<br>
<br>

## **Mental Model**

- business entities and their behavior
- Relationships between them (Cause and effect)
- invariants

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