# **UML Sequence Diagram**
<br>

## **Table Of Contents**

- [**UML Sequence Diagram**](#uml-sequence-diagram)
  - [**Table Of Contents**](#table-of-contents)
  - [**Basics**](#basics)
  - [**Object**](#object)
  - [**Activity Elements**](#activity-elements)
    - [**Activity Bar**](#activity-bar)
    - [**Active Objects**](#active-objects)
  - [**Control Flow**](#control-flow)
    - [**Messages**](#messages)
      - [**Synchronous Message**](#synchronous-message)
      - [**Asynchronous Message**](#asynchronous-message)
      - [**Return Message**](#return-message)
    - [**Conditional**](#conditional)
      - [**Guard Syntax**](#guard-syntax)
      - [**If-Else Syntax**](#if-else-syntax)
    - [**Iteration**](#iteration)
      - [**Single Method**](#single-method)
      - [**Method Block**](#method-block)
  - [**Comment**](#comment)

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

## **Activity Elements**
<br>
<br>

### **Activity Bar**

> An **activity bar** on a lifeline of an object represents the time period between receiving a message and sending an answer.

<br>

![Activity Bar](./pictures/sequenceDiagram/uml_sequence_diagram_activity_bar.svg)

<br>

![Activity Bar Example](./pictures/sequenceDiagram/uml_sequence_diagram_activity_bar_example.svg)

<br>
<br>
<br>

### **Active Objects**

> **Active objects** are all objects that execute methods concurrently to one another due to one or multiple [asynchronous messages](#asynchronous-message).  
> We mark active objects with a bold frame.

<br>

![Active Objects](./pictures/sequenceDiagram/uml_sequence_diagram_activity_object.svg)

<br>
<br>
<br>
<br>

## **Control Flow**
<br>
<br>

### **Messages**
<br>

#### **Synchronous Message**

> The sender of a **synchronous message** waits idle until the receiver has processed it.

<br>

![Synchronous Message](./pictures/sequenceDiagram/uml_sequence_diagram_synchronous_message.svg)

<br>
<br>

#### **Asynchronous Message**

> The sender of an **asynchronous message** can concurrently continue its execution without having to wait until the receiver processed the message.

<br>

![Asynchronous Message](./pictures/sequenceDiagram/uml_sequence_diagram_asynchronous_message.svg)

<br>
<br>

#### **Return Message**

> The optional `return message` indicates that the receiver has processed the message of the sender.

<br>

![Return Message](./pictures/sequenceDiagram/uml_sequence_diagram_return_message.svg)

<br>
<br>
<br>

### **Conditional**

> A **conditional** method is only executed if the condition is fulfilled.

<br>
<br>

#### **Guard Syntax**

![Simple Conditional Syntax](./pictures/sequenceDiagram/uml_sequence_diagram_conditional_syntax1.svg)

<br>
<br>

#### **If-Else Syntax**

![Complex Conditional Syntax](./pictures/sequenceDiagram/uml_sequence_diagram_conditional_syntax2.svg)

<br>
<br>
<br>

### **Iteration**

> An **iteration** executes a single method or a block of methods multiple times.

<br>

|Iteration Condition |Example                   |
|:-------------------|:-------------------------|
|Number              |`[5]`                     |
|Range               |`[2..7]`                  |
|Boolean             |`[list.items > ]5`        |
|Text                |`[for all items in list]` |

<br>
<br>

#### **Single Method**

![Single Method Iteration](./pictures/sequenceDiagram/uml_sequence_diagram_iteration_single_method.svg)

<br>
<br>

#### **Method Block**

![Block Iteration Version 1](./pictures/sequenceDiagram/uml_sequence_diagram_iteration_block_example1.svg)

<br>

Alternative notation:

![Block Iteration Version 2](./pictures/sequenceDiagram/uml_sequence_diagram_iteration_block_example2.svg)

<br>
<br>
<br>
<br>

## **Comment**

Comments can be added left from the sequence diagram.

<br>

![Comments](./pictures/sequenceDiagram/uml_sequence_diagram_comment.svg)
