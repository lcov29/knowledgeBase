# **UML State Diagram**
<br>

## **Table Of Contents**
<br>

- [**UML State Diagram**](#uml-state-diagram)
  - [**Table Of Contents**](#table-of-contents)
  - [**Basics**](#basics)
  - [**States**](#states)
    - [**Basic State**](#basic-state)
    - [**Pseudo States**](#pseudo-states)
      - [**Initial State**](#initial-state)
      - [**Final State**](#final-state)
  - [**Transition**](#transition)
    - [**Event**](#event)
    - [**Guard**](#guard)

<br>
<br>
<br>
<br>

## **Basics**

> A **state diagram** models the behavior of objects according to their state.

<br>
<br>
<br>
<br>

## **States**
<br>
<br>
<br>

### **Basic State**

> A **state** is an abstraction of the concrete property values and relationships of an entity.

<br>

![State](./pictures/state-diagram/uml_state_diagram_state.svg)

<br>

By definition multiple state symbols without a name represent **different** states:

![State without names](./pictures/state-diagram/uml_state_diagram_unnamed_state.svg)

<br>

By definition multiple state symbols with the same name represent the **same** state:

![State with name duplicates](./pictures/state-diagram/uml_state_diagram_duplicate_state.svg)

<br>
<br>
<br>

### **Pseudo States**
<br>
<br>

#### **Initial State**

> The **initial pseudo state** represents the entry point to the diagram and transitions to exactly one state without any event or guard.

<br>

![Initial Pseudo State](./pictures/state-diagram/uml_state_diagram_initial_pseudo_state.svg)

<br>
<br>

#### **Final State**

> The **final state** represents the exit of the diagram.

<br>

![Final Pseudo State](./pictures/state-diagram/uml_state_diagram_final_pseudo_state.svg)

<br>
<br>
<br>
<br>

## **Transition**

> A **transition** changes the current state to another (or the same) state.  
> Transitions without an [event](#event) or [guard](#guard) are executed immediately on entering a state.

<br>

![Transition](./pictures/state-diagram/uml_state_diagram_transition.svg)

<br>
<br>
<br>

### **Event**

> An **event** is a trigger for a transition.

<br>

|Event Type   |Description                                          |
|:------------|:----------------------------------------------------|
|call event   |an operation of the object has been called           |
|change event |instantiation or deletion of object or relationships |
|time event   |point of time reached or time interval passed        |
|signal event |outside signal                                       |

<br>

![Event](./pictures/state-diagram/uml_state_diagram_event.svg)

<br>
<br>
<br>

### **Guard**

> A **guard** is a condition for a transition to take place. It can take parameters and use object attributes or relationships.

<br>

![Guard](./pictures/state-diagram/uml_state_diagram_guard.svg)