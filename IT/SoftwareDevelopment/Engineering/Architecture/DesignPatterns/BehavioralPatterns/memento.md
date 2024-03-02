# **Memento**
<br>

## **Table Of Contents**
<br>

- [**Memento**](#memento)
  - [**Table Of Contents**](#table-of-contents)
  - [**Intent**](#intent)
  - [**Core Ideas**](#core-ideas)
  - [**Structure**](#structure)
  - [**Use Cases**](#use-cases)
  - [**Consequences**](#consequences)
  - [**Implementation Tips**](#implementation-tips)
  - [**Example**](#example)

<br>
<br>
<br>
<br>

## **Intent**

Save a snapshot of the state of an object without revealing the object´s implementation.

<br>
<br>
<br>
<br>

## **Core Ideas**

- The *originator* object creates and stores snapshots of its state in an *memento* object
- The state information from the *memento* object can only be accessed by the *originator* object
- *Caretaker* objects can only interact with the *memento* object via a limited interface

<br>
<br>
<br>
<br>

## **Structure**

![Memento](./picture/memento.drawio.svg)

<br>
<br>
<br>
<br>

## **Use Cases**

- We want to revert an object to a previous state

<br>
<br>
<br>
<br>

## **Consequences**
<br>

|**Advantages** |**Disadvantages** |
|:--------------|:-----------------|
|Snapshots of the state of an object without violating its encapsulation |Snapshots consume storage |

<br>
<br>
<br>
<br>

## **Implementation Tips**

- Check your language features how to make the memento object only accessible by the originator object

<br>
<br>
<br>
<br>

## **Example**

\-