# **Boolean Algebra**
<br>

## **Table Of Contents**
<br>

- [**Boolean Algebra**](#boolean-algebra)
  - [**Table Of Contents**](#table-of-contents)
  - [**Definition Set**](#definition-set)
  - [**Operations**](#operations)
    - [**Conjunction**](#conjunction)
      - [**Definition**](#definition)
      - [**Laws**](#laws)
    - [**Disjunction**](#disjunction)
      - [**Definition**](#definition-1)
      - [**Laws**](#laws-1)
  - [**Laws**](#laws-2)
    - [**Distributivity**](#distributivity)
    - [**Absorption**](#absorption)
    - [**De Morgan**](#de-morgan)

<br>
<br>
<br>
<br>

## **Definition Set**

The boolean algebra is defined over the set $B = \\\{0, 1\\\}$.

<br>
<br>
<br>
<br>

## **Operations**
<br>
<br>
<br>

### **Conjunction**
<br>
<br>

#### **Definition**

> $\land: B \times B \to B$

<br>
<br>

#### **Laws**
<br>

|Name            |Shorthand|Definition                                                          |
|:---------------|:-------:|:-------------------------------------------------------------------|
|Commutativity   |$C\land$ |$\forall a, b \in B: a \land b = b \land a$                         |
|Associativity   |$A\land$ |$\forall a, b, c \in B: (a \land b) \land c = a \land (b \land c)$  |
|Neutral Element (1) |$N\land$ |$\forall a \in B: a \land 1 = a$ |
|Complementation Element |$C\land$ |$\forall a \in B: a \land \lnot a = 0$ |

<br>
<br>
<br>

### **Disjunction**
<br>
<br>

#### **Definition**

> $\lor: B \times B \to B$

<br>
<br>

#### **Laws**
<br>

|Name            |Shorthand|Definition                                                          |
|:---------------|:-------:|:-------------------------------------------------------------------|
|Commutativity   |$C\lor$ |$\forall a, b \in B: a \lor b = b \lor a$                         |
|Associativity   |$A\lor$ |$\forall a, b, c \in B: (a \lor b) \lor c = a \lor (b \lor c)$  |
|Neutral Element (0) |$N\lor$ |$\forall a \in B: a \lor 0 = a$ |
|Complementary Element |$C\lor$ |$\forall a \in B: a \lor  \lnot a = 1$ |

<br>
<br>
<br>
<br>

## **Laws**
<br>
<br>

### **Distributivity**
<br>

|Name                       |Shorthand |Definition |
|:--------------------------|:--------:|:----------|
|Conjunction Distributivity |$C\land$  |$\forall a, b, c \in B: a \land (b \lor c) = (a \land b) \lor (a \land c)$ |
|Disjunction Distributivity |$C\lor$   |$\forall a, b, c \in B: a \lor (b \land c) = (a \lor b) \land (a \lor c)$ |

<br>
<br>

### **Absorption**
<br>

|Name                   |Shorthand |Definition                                   |
|:----------------------|:--------:|:--------------------------------------------|
|Conjunction Absorption |$Ab\land$ |$\forall a, b \in B: a \land (a \lor b) = a$ |
|Disjunction Absorption |$Ab\lor$  |$\forall a, b \in B: a \lor (a \land b) = a$ |

<br>
<br>

### **De Morgan**
<br>

|Name                  |Definition                                                    |
|:---------------------|:-------------------------------------------------------------|
|Conjunction De Morgan |$\forall a, b \in B: \lnot(a \land b) = \lnot a \lor \lnot b$ |
|Disjunction De Morgan |$\forall a, b \in B: \lnot(a \lor b) = \lnot a \land \lnot b$ |