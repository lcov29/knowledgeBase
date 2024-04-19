# **Switching Function**
<br>

## **Table Of Contents**
<br>

- [**Switching Function**](#switching-function)
  - [**Table Of Contents**](#table-of-contents)
  - [**Definition**](#definition)
  - [**Operators**](#operators)
    - [**Basic Operators**](#basic-operators)
      - [**Conjunction (AND)**](#conjunction-and)
      - [**Disjunction (OR)**](#disjunction-or)
      - [**Negation (NOT)**](#negation-not)
    - [**Advanced Operators**](#advanced-operators)
      - [**NAND**](#nand)
      - [**NOR**](#nor)
      - [**Antivalence (XOR)**](#antivalence-xor)
      - [**Equivalence**](#equivalence)

<br>
<br>
<br>
<br>

## **Definition**

> A **switching function** is defined as $$f(x_1, x_2, ...,x_n) \in \{0,1\} \text{ with } y, x_i \in \{0,1\}.$$
>
> For $n$ input variables there are $2^{2^n}$ switching functions.

<br>
<br>
<br>
<br>

## **Operators**
<br>
<br>
<br>

### **Basic Operators**
<br>
<br>

#### **Conjunction (AND)**
<br>

![Conjunction Symbol](./images/conjunction_symbol.drawio.svg)

<br>

$f(x_1,x_2) = x_1 \land x_2$

<br>

|$x_1$ |$x_2$ |$f(x_1, x_2)$ |
|:----:|:----:|:------------:|
|0     |0     |0             |
|0     |1     |0             |
|1     |0     |0             |
|1     |1     |1             |

<br>
<br>

#### **Disjunction (OR)**
<br>

![Disjunction Symbol](./images/disjunction_symbol.drawio.svg)

<br>

$f(x_1,x_2) = x_1 \lor x_2$

<br>

|$x_1$ |$x_2$ |$f(x_1, x_2)$ |
|:----:|:----:|:------------:|
|0     |0     |0             |
|0     |1     |1             |
|1     |0     |1             |
|1     |1     |1             |

<br>
<br>

#### **Negation (NOT)**
<br>

![Negation Symbol](./images/negation_symbol.drawio.svg)

<br>

$f(x) = \overline{x}$

<br>

|$x$ |$f(x)$ |
|:--:|:-----:|
|0   |1      |
|1   |0      |

<br>
<br>
<br>

### **Advanced Operators**
<br>
<br>

#### **NAND**
<br>

![NAND symbol](./images/nand_symbol.drawio.svg)

<br>

$f(x_1, x_2) = \overline{x_1 \land x_2}$

<br>

|$x_1$ |$x_2$ |$f(x_1, x_2)$ |
|:----:|:----:|:------------:|
|0     |0     |1             |
|0     |1     |1             |
|1     |0     |1             |
|1     |1     |0             |

<br>
<br>

#### **NOR**
<br>

![NOR symbol](./images/nor_symbol.drawio.svg)

<br>

$f(x_1, x_2) = \overline{x_1 \lor x_2}$

<br>

|$x_1$ |$x_2$ |$f(x_1, x_2)$ |
|:----:|:----:|:------------:|
|0     |0     |1             |
|0     |1     |0             |
|1     |0     |0             |
|1     |1     |0             |

<br>
<br>

#### **Antivalence (XOR)**
<br>

![Antivalence symbol](./images/antivalence_symbol.drawio.svg)

<br>

$$
\begin{align*}
   f(x_1, x_2) &= x_1 \not\equiv x_2 \\
               &= (x_1 \land \overline{x_2}) \lor (\overline{x_1} \land x_2)
\end{align*}
$$

<br>

|$x_1$ |$x_2$ |$f(x_1, x_2)$ |
|:----:|:----:|:------------:|
|0     |0     |0             |
|0     |1     |1             |
|1     |0     |1             |
|1     |1     |0             |

<br>
<br>

#### **Equivalence**
<br>

![Equivalence symbol](./images/equivalence_symbol.drawio.svg)

<br>

$$
\begin{align*}
   f(x_1, x_2) &= x_1 \equiv x_2 \\
               &= (x_1 \land x_2) \lor (\overline{x_1} \land \overline{x_2})
\end{align*}
$$

<br>

|$x_1$ |$x_2$ |$f(x_1, x_2)$ |
|:----:|:----:|:------------:|
|0     |0     |1             |
|0     |1     |0             |
|1     |0     |0             |
|1     |1     |1             |
