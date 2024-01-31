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
    - [**Composite State**](#composite-state)
  - [**Transition**](#transition)
    - [**Event**](#event)
    - [**Guard**](#guard)
  - [**Actions**](#actions)
    - [**Entry Action**](#entry-action)
    - [**Exit Action**](#exit-action)
    - [**Do Action**](#do-action)
    - [**Transition Action**](#transition-action)

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

### **Composite State**

> A **composite state** is a state that consists of one or more substates.

<br>

![Composite State](./pictures/state-diagram/uml_state_diagram_composite_state.svg)

<br>

![Compact Composite State](./pictures/state-diagram/uml_state_diagram_composite_state_compact.svg)

Compact Notation without displaying the substates

<br>
<br>

Transitions to the composite state lead to the entry state (here **SubstateA**):

![Composite State Incoming Event](./pictures/state-diagram/uml_state_diagram_composite_state_incoming_event.svg)

<br>
<br>

Transitions from the composite state enable every substate to transition to the specified state (here **StateA**):

![Composite State Outgoing Event](./pictures/state-diagram/uml_state_diagram_composite_state_outgoing_event.svg)

<br>
<br>

Transitions from the border of the composite state to a substate enable **all** substates to transition to this substate (here all substates can transition to **SubstateA**):

![Composite State Internal Transition](./pictures/state-diagram/uml_state_diagram_composite_state_internal_event.svg)

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

<br>
<br>
<br>
<br>

## **Actions**
<br>
<br>
<br>

### **Entry Action**

> An **entry action** is an action that gets executed on every transition to the state.

<br>

![Entry Action](./pictures/state-diagram/uml_state_diagram_entry_action.svg)

<br>
<br>
<br>

### **Exit Action**

> An **exit action** is an action that gets executed on every transition to another state.

<br>

![Exit Action](./pictures/state-diagram/uml_state_diagram_exit_action.svg)

<br>
<br>
<br>

### **Do Action**

> A **do action** is an action that is executed while the state is active and the condition for the action is fulfilled.

<br>

![Do Action](./pictures/state-diagram/uml_state_diagram_do_action.svg)

<br>
<br>
<br>

### **Transition Action**

> A **transition action** is an action that is executed during a transition between states.

<br>

![Transition Action](./pictures/state-diagram/uml_state_diagram_transition_action.svg)