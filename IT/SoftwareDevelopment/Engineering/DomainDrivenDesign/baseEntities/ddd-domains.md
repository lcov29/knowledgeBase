# **DDD - Domains**
<br>

## **Table Of Contents**

- [**DDD - Domains**](#ddd---domains)
  - [**Table Of Contents**](#table-of-contents)
  - [**Domain**](#domain)
  - [**Subdomains**](#subdomains)
    - [**Core Subdomain**](#core-subdomain)
    - [**Generic Subdomain**](#generic-subdomain)
    - [**Supporting Subdomain**](#supporting-subdomain)

<br>
<br>
<br>
<br>

## **Domain**

> A **domain** is a main activity of a company.  
> A company can be active in multiple domains.

<br>
<br>
<br>
<br>

## **Subdomains**

> A **subdomain** is a part of a domain.  
> 
> It communicates with other subdomains to fulfill the goal of the domain.
>
> From a technical perspective a subdomain represents a group of cohesive [use cases](../../Modeling/UML/behaviorDiagrams/uml_use_case_diagram.md) that work on the same data.

<br>
<br>

```mermaid
flowchart TB
  A(Subdomain)
  B(Core Subdomain)
  C(Generic Subdomain)
  D(Supporting Subdomain)
  A --> B & C & D
```

<br>
<br>

|**Subdomain**                           |**Competitive Advantage** |**Complexity** |**Volatility** |**Implementation**   |
|:---------------------------------------|:------------------------:|:-------------:|:-------------:|:-------------------:|
|[**Core**](#core-subdomain)             |Yes                       |High           |High           |Inhouse              |
|[**Generic**](#generic-subdomain)       |No                        |High           |Low            |Third party          |
|[**Supporting**](#supporting-subdomain) |No                        |Low            |Low            |Inhouse or outsource |

<br>
<br>
<br>

### **Core Subdomain**

> A **core subdomain** contains complex activities that generate a competitive advantage for the company.  
> 
> The more complex the core subdomain is the more long-term this advantage is.

<br>
<br>
<br>

### **Generic Subdomain**

> A **generic subdomain** contains complex activities that all companies do in the same or similar manner and therefore do not generate a competitive advantage.  

<br>
<br>
<br>

### **Supporting Subdomain**

> A **supporting subdomain** contains activities that support the activities of the core subdomain but do not generate a competitive advantage.  
> 
> Typical activities are [CRUD](../../glossary.md#crud-operation) and [ETL](../../glossary.md#etl-operation) Operations.
