# **Requirements Engineering**
<br>

## **Table Of Contents**
<br>

- [**Requirements Engineering**](#requirements-engineering)
  - [**Table Of Contents**](#table-of-contents)
  - [**Overview**](#overview)
  - [**Domain Focus**](#domain-focus)
  - [**Tasks**](#tasks)
    - [**1. Get an overview of the domain**](#1-get-an-overview-of-the-domain)
    - [**2. Understand the domain**](#2-understand-the-domain)
    - [**3. Extract the requirements**](#3-extract-the-requirements)
    - [**4. Negotiate the prioritization and scope of the extracted requirements**](#4-negotiate-the-prioritization-and-scope-of-the-extracted-requirements)
    - [**5. Specify the extracted requirements to act as a basis for the development and acceptance test**](#5-specify-the-extracted-requirements-to-act-as-a-basis-for-the-development-and-acceptance-test)
    - [**6. Validate the generated specification to be complete and correct**](#6-validate-the-generated-specification-to-be-complete-and-correct)
  - [**Goal: Requirement Specification**](#goal-requirement-specification)

<br>
<br>
<br>
<br>

## **Overview**

```mermaid
stateDiagram-v2
   direction LR
   classDef dotted stroke-dasharray: 4 4;

   state join1 <<join>>
   state join2 <<join>>
   state fork1 <<fork>>
   state fork2 <<fork>>

   A: Specification sheets
   B: Talks with users and domain experts
   C: Practical experience
   D: Functional Requirements
   E:::dotted : Non Functional Requirements
   F: Use Case Diagram
   G: Domain Class Diagram
   H:::dotted: GUI Draft
   I:::dotted: Interaction Diagrams
   J:::dotted: Domain Glossary

   state Input {
      A --> join1
      B --> join1
      C --> join1
   }

   join1 --> join2

   state Requirements {
      join2 --> D
      join2 --> E
      D --> fork1
   }

   fork1 --> fork2

   state "Output: Requirement Specification" as output {
      fork2 --> F
      fork2 --> G
      fork2 --> H
      fork2 --> I
      fork2 --> J
   }
```

<br>
<br>
<br>
<br>

## **Domain Focus**

Every activity during the requirement engineering process focuses **only** on the requirements within the domain and uses the domain language.  
There are no specifications for any part of the implementation.  

<br>
<br>
<br>
<br>

## **Tasks**
<br>

### **1. Get an overview of the domain**

<br>

### **2. Understand the domain**

<br>

### **3. Extract the requirements**

<br>

### **4. Negotiate the prioritization and scope of the extracted requirements**

<br>

### **5. Specify the extracted requirements to act as a basis for the development and acceptance test**

<br>

### **6. Validate the generated specification to be complete and correct**

<br>
<br>
<br>
<br>

## **Goal: Requirement Specification**
<br>

