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
  - [**Textual Specification**](#textual-specification)

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

<br>
<br>
<br>
<br>

## **Textual Specification**

> The **textual specification** is an alternative way to describe a use case that allows for a more precise description.

<br>

**use case** useCaseName  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**actors**  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*list of actors*   
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**precondition**  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*condition to execute the use case*    
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**main flow**  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*description of the normal execution*  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**alternative  flow 1**  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*description of alternative execution that still satisfies the postcondition*  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;...  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**alternative  flow n**  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*description of alternative execution that still satisfies the postcondition*  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**postcondition**  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*condition that has to be satisfied after the main- or alternative flows have been executed*  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**exceptional  flow 1**  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*description how to handle exceptions that happened during the main- or an alternaive flow*  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**postcondition**  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*condition that has to be satisfied after **exceptional flow 1** has been executed*  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;...  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**exceptional  flow n**  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*description how to handle exceptions that happened during the main- or an alternaive flow*  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**postcondition**  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*condition that has to be satisfied after **exceptional flow n** has been executed*  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;...  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*optional notes*  
**end** useCaseName