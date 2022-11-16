# **UML Use Case Diagram**
<br>

## **Table Of Contents**
<br>

- [**UML Use Case Diagram**](#uml-use-case-diagram)
  - [**Table Of Contents**](#table-of-contents)
  - [**Actors**](#actors)
  - [**Use Cases**](#use-cases)
    - [**Connections Between Use Cases**](#connections-between-use-cases)
      - [**Include Connections**](#include-connections)
      - [**Extend Connections**](#extend-connections)
      - [**Generalisation Connections**](#generalisation-connections)

<br>
<br>
<br>

## **Actors**
<br>

* abstraction of a group of users (human or technical)
* actors can have generalization relationships with each other

<br>

```mermaid
flowchart BT
    A["fa:fa-person ActorName"]
    B["fa:fa-person SubActorName"]
    C["fa:fa-person SubActorName"]
    B ==> A
    C ==> A
```

<br>
<br>
<br>

## **Use Cases**
<br>

A use case describes an external function of an application that returns a result for at least one actor.

<br>

```mermaid
flowchart BT
    A([Use Case Description])
```

<br>
<br>

### **Connections Between Use Cases**
<br>
<br>

#### **Include Connections**
<br>

* connects sub use case to one or multiple base use cases

<br>

```mermaid
flowchart RL
    A([Base Use Case 1])
    B([Base Use Case 2])
    C([Sub Use Case 1])
    D([Sub Use Case 2])
    C -. include .-> A
    D -. include .-> A
    D -. include .-> B
```

<br>
<br>

#### **Extend Connections**
<br>

* extends base use case with optional sub use case
* specifies condition for the sub suse case

<br>

```mermaid
flowchart RL
    A([Base Use Case])
    B([Optional Sub Use Case])
    B -. "extend [condition]" .-> A
```

<br>
<br>

#### **Generalisation Connections**
<br>

```mermaid
flowchart BT
    A([Base Use Case])
    B([Use Case 1])
    C([Use Case 2])
    D([Use Case 3])
    B ==> A
    C ==> A
    D ==> A
```