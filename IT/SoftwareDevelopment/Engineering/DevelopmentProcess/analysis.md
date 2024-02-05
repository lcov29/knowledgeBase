# **Analysis**
<br>

## **Table Of Contents**
<br>

- [**Analysis**](#analysis)
  - [**Table Of Contents**](#table-of-contents)
  - [**Overview**](#overview)

<br>
<br>
<br>
<br>

## **Overview**

The main goal of the analysis is to translate the domain class diagram to the more detailed analysis class diagram.  

The analysis class diagram is part of the analysis specification which will be used as the basis of the implementation.

<br>

```mermaid
stateDiagram-v2
   direction LR
   classDef dotted stroke-dasharray: 4 4;

   A: Use Case Diagram
   B: Domain Class Diagram
   C:::dotted: Interaction Diagrams
   D: Analysis Class Diagram
   E: State Diagram
   F: Interaction Diagrams

   state "Input: Requirement Specification" as input {
      A
      B
      C
   }

   state "Output: Analysis Specification" as output {
      E
      D
      F
   }

   B --> D
   C --> F
```