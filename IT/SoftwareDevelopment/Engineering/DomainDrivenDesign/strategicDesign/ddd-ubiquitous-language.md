# **DDD - Ubiquitous Language**
<br>

## **Table Of Contents**

- [**DDD - Ubiquitous Language**](#ddd---ubiquitous-language)
  - [**Table Of Contents**](#table-of-contents)
  - [**Ubiquitous Language**](#ubiquitous-language)
  - [**Usage**](#usage)
  - [**Evolution**](#evolution)
  - [**Heuristics**](#heuristics)
    - [**Consistency**](#consistency)
    - [**Tools**](#tools)

<br>
<br>
<br>
<br>

## **Ubiquitous Language**

> The **ubiquitous language** is the precise and consistent language of the domain experts.  
> It is used to describe the domain models that the implementation is based upon.

<br>
<br>
<br>
<br>

## **Usage**

The ubiquitous language should be used
- by the domain experts
- by the developers
- by all stakeholders 
- in all steps of the development process
- instead of a technical translation of the domain knowledge
- within its [bounded context](#bounded-context)

<br>
<br>
<br>
<br>

## **Evolution**

The ubiquitous language should be constantly checked and evolved during the project.

<br>
<br>
<br>
<br>

## **Heuristics**
<br>
<br>

### **Consistency**

> Eliminate all assumptions from the ubiquitous language.

<br>

> Eliminate all **synonyms** (different words with the same meaning) from the ubiquitous language.

<br>

> Eliminate all **homonyms** (same words that have different meanings) from the ubiquitous langague by splitting the language into two or more [bounded contexts](#bounded-context).

<br>
<br>

### **Tools**

> Use a glossary to define the domain entities (typically described with nouns).

<br>

> Define the interaction between entities with textual use cases.