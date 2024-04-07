# **DDD - Transaction Script**
<br>

## **Table Of Contents**

- [**DDD - Transaction Script**](#ddd---transaction-script)
  - [**Table Of Contents**](#table-of-contents)
  - [**Definition**](#definition)
  - [**Function**](#function)
  - [**When To Use**](#when-to-use)
  - [**What To Avoid**](#what-to-avoid)
  - [**Advantages And Disadvantages**](#advantages-and-disadvantages)
  - [**Optional Extension: Active Record**](#optional-extension-active-record)

<br>
<br>
<br>
<br>

## **Definition**

> The **transaction script** provides a function for each business transaction that is part of the public system interface.

<br>
<br>
<br>
<br>

## **Function**

> The functions provided by the transaction script
> - can **access** and **modify** the system data
> - are **transactional** to ensure the consistency of the system

<br>
<br>
<br>
<br>

## **When To Use**

We use the transaction script for very simple problem domains like the supporting subdomain.

<br>
<br>
<br>
<br>

## **What To Avoid**

Avoid using **multiple storage mechanisms** (like database and message bus) within the same function, because they make the implementation of the transactional behavior of the function more complex.

<br>
<br>
<br>
<br>

## **Advantages And Disadvantages**
<br>

|**Advantage**       |**Disadvantage**                        |
|:-------------------|:---------------------------------------|
|minimal abstraction |Not suitable for complex business logic |
|easy to understand  |                                        |
|execution speed     |                                        |

<br>
<br>
<br>
<br>

## **Optional Extension: Active Record**

> An **active record** is an object that encapsulates complex stored data and implements [CRUD-Operations](../../../glossary.md#crud-operation) to reduce the complexity of mapping the data to application representations.
