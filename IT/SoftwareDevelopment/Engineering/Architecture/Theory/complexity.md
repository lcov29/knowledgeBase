# **Complexity**
<br>

## **Table Of Contents**

- [**Complexity**](#complexity)
  - [**Table Of Contents**](#table-of-contents)
  - [**Types**](#types)
    - [**Local Complexity**](#local-complexity)
    - [**Global Complexity**](#global-complexity)
  - [**Heuristic**](#heuristic)

<br>
<br>
<br>
<br>

## **Types**
<br>
<br>

### **Local Complexity**

> The **local complexity** is defined as the complexity of the implementation of a single component.

<br>

The local complexity is visualized by the height of a component.

<br>

Example:

![Local Complexity Example](./pictures/local-complexity.drawio.svg)

Here the left component has a lower local complexity than the right component. 

<br>
<br>

### **Global Complexity**

> The **global complexity** is defined as the complexity of the associations and interactions between the components of a [system](../../../glossary.md#system).

<br>

The global complexity is influenced by the interface sizes of the different components.

<br>

The size of an interface is visualized by the width of a component.

<br>

Example:

![Global Complexity Example](./pictures/global-complexity.drawio.svg)

Here the interface of the left component is smaller than the interface of the right component.

<br>
<br>
<br>
<br>

## **Heuristic**
<br>

> Balance the local and the global complexity.

<br>
<br>

> Components should have a high local complexity and a small interface to reduce the global complexity.

<br>

![Heuristic](./pictures/heuristic-complexity.drawio.svg)