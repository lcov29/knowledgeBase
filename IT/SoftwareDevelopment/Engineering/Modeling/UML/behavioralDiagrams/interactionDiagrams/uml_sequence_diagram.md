# **UML Sequence Diagram**
<br>

## **Table Of Contents**

- [**UML Sequence Diagram**](#uml-sequence-diagram)
  - [**Table Of Contents**](#table-of-contents)
  - [**Basics**](#basics)
  - [**Object**](#object)
  - [**Messages**](#messages)
    - [**Synchronous Message**](#synchronous-message)
    - [**Asynchronous Message**](#asynchronous-message)
    - [**Return Message**](#return-message)
  - [**Activity Elements**](#activity-elements)
    - [**Activity Bar**](#activity-bar)

<br>
<br>
<br>
<br>

## **Basics**

> A **sequence diagram** models complex interactions between different class instances within a specific time frame.

<br>

![Basic Sequence Diagram](./pictures/sequenceDiagram/uml_sequence_diagram_basic_example.svg)

<br>
<br>
<br>
<br>

## **Object**

> An **object** is an instance of a class that has a dotted lifeline.  
> Objects can get created during the diagram lifespan by an incoming arrow.  
> Objects can get destroyed during the diagram lifespan by a cross on their lifeline.

<br>

![Object](./pictures/sequenceDiagram/uml_sequence_diagram_object.svg)

<br>
<br>
<br>
<br>

## **Messages**
<br>
<br>

### **Synchronous Message**

> The sender of a **synchronous message** waits idle until the receiver has processed it.

<br>

![Synchronous Message](./pictures/sequenceDiagram/uml_sequence_diagram_synchronous_message.svg)

<br>
<br>

### **Asynchronous Message**

> The sender of an **asynchronous message** can concurrently continue its execution without having to wait until the receiver processed the message.

<br>

![Asynchronous Message](./pictures/sequenceDiagram/uml_sequence_diagram_asynchronous_message.svg)

<br>
<br>

### **Return Message**

> The optional `return message` indicates that the receiver has processed the message of the sender.

<br>

![Return Message](./pictures/sequenceDiagram/uml_sequence_diagram_return_message.svg)

<br>
<br>
<br>
<br>

## **Activity Elements**
<br>
<br>

### **Activity Bar**

> An **activity bar** on a lifeline of an object represents the time period between receiving a message and sending an answer.

<br>

![Activity Bar](./pictures/sequenceDiagram/uml_sequence_diagram_activity_bar.svg)