# **UML Use Case Diagram**
<br>

## **Table Of Contents**
<br>

- [**UML Use Case Diagram**](#uml-use-case-diagram)
  - [**Table Of Contents**](#table-of-contents)
  - [**Actor**](#actor)
    - [**Generalization**](#generalization)
  - [**Use Case**](#use-case)
    - [**Relationships**](#relationships)
      - [**Association**](#association)
      - [**Include**](#include)
      - [**Extend**](#extend)
      - [**Generalisation**](#generalisation)

<br>
<br>
<br>
<br>

## **Actor**

> An **actor** represents a role of an external entity (i.e. human or technical user) that interacts with the system.  
> A specific external entity can have multiple roles. 

<br>

![Actor](./pictures/use-case-diagram/uml_use_case_diagram_actor.svg)

<br>
<br>

### **Generalization**

Actors can be in a generalization relationship with each other. The sub actors inherit the use case interactions of their super actor.

<br>

![Actor Generalization](./pictures/use-case-diagram/uml_use_case_diagram_actor_generalization.svg)

<br>
<br>
<br>
<br>

## **Use Case**

> A **use case** is a subfunctionality of a system that is used by at least one [actor](#actor).

<br>

![Use Case](./pictures/use-case-diagram/uml_use_case_diagram_use_case.svg)


<br>
<br>
<br>

### **Relationships**
<br>

#### **Association**

> An **association** between an [actor](./pictures/use-case-diagram/uml_use_case_diagram_actor.svg) and a [use case](./pictures/use-case-diagram/uml_use_case_diagram_use_case.svg) indicates a communication or interaction between them.

<br>

![Association](./pictures/use-case-diagram/uml_use_case_diagram_association.svg)

<br>
<br>

#### **Include**

> An **include** relationship allows a base use case to include the functionality of one or multiple other use cases.  
> The base use case is not complete without the included use cases.

<br>

![Include](./pictures/use-case-diagram/uml_use_case_diagram_include.svg)

<br>
<br>

#### **Extend**

> An **extend** relationship is an **optional** extension of a base use case with the functionality of one or multiple other use cases.  
> The base use case is complete without the extended use cases.

<br>

![Extend](./pictures/use-case-diagram/uml_use_case_diagram_extend_basic.svg)

<br>

![Extend](./pictures/use-case-diagram/uml_use_case_diagram_extend.svg)

<br>
<br>

#### **Generalisation**

> A **generalization** relationship is the realization of an incomplete abstract use case (super case) by a complete concrete use case (sub case).

<br>

![Generalization](./pictures/use-case-diagram/uml_use_case_diagram_use_case_generalization.svg)
