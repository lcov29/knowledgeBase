# Switching Function
<br>

## Table Of Contents
<br>

- [Switching Function](#switching-function)
  - [Table Of Contents](#table-of-contents)
  - [Definition](#definition)
  - [Operators](#operators)
    - [Basic Operators](#basic-operators)
      - [Conjunction (AND)](#conjunction-and)
      - [Disjunction (OR)](#disjunction-or)
      - [Negation (NOT)](#negation-not)
    - [Advanced Operators](#advanced-operators)
      - [NAND](#nand)
      - [NOR](#nor)
      - [Antivalence (XOR)](#antivalence-xor)
      - [Equivalence](#equivalence)
  - [Normal Forms](#normal-forms)
    - [Conjunctive (Normal) Form (CNF / CF)](#conjunctive-normal-form-cnf--cf)
    - [Disjunctive (Normal) Form (DNF / DF)](#disjunctive-normal-form-dnf--df)
    - [Example](#example)
  - [Minimization](#minimization)
  - [Vector Function](#vector-function)

<br>
<br>
<br>
<br>

## Definition

> A **switching function** is defined as $$f(x_1, x_2, ...,x_n) \in \{0,1\} \text{ with } y, x_i \in \{0,1\}.$$
>
> For $n$ input variables there are $2^{2^n}$ switching functions.

<br>
<br>
<br>
<br>

## Operators
<br>
<br>
<br>

### Basic Operators
<br>

> **Priority**  
> [Negation](#negation-not) > [Conjunction](#conjunction-and) > [Disjunction](#disjunction-or)

<br>
<br>

#### Conjunction (AND)
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

> **Tip**  
> The conjunction operator can be omitted for better readability.  
> $x_1 \land x_2 = x_1x_x$

<br>
<br>

#### Disjunction (OR)
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

#### Negation (NOT)
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

### Advanced Operators
<br>
<br>

#### NAND
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

#### NOR
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

#### Antivalence (XOR)
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

#### Equivalence
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

<br>
<br>
<br>
<br>

## Normal Forms
<br>
<br>
<br>

### Conjunctive (Normal) Form (CNF / CF)

> A **max clause** is a disjunction of every (possibly negated) input variable that only returns `0` for exactly one combination of input variables.  
> 
> For a switching function with $n$ input variables there are $2^n$ different max clauses.

<br>

> A **conjunctive normal form (CNF)** of a switching function is a conjunction of those *max clauses* that return `0`.

<br>

> A **conjunctive form (CF)** of a switching function is a conjunction of *disjunction clauses* that do not contain all input variables.
 
<br>
<br>
<br>

### Disjunctive (Normal) Form (DNF / DF)

> A **min clause** is a conjunction of every (possibly negated) input variable that only returns `1` for exactly one combination of input variables.
>
> For a switching function with $n$ input variables there are $2^n$ different min clauses.

<br>

> A **disjunctive normal form** of a switching function is a disjunction of those *min clauses* that return `1`.

<br>

> A **disjunction form (DF)** of a switching function is a disjunction of *conjunctive clauses* that do not contain all input variables.

<br>
<br>
<br>

### Example

|$x_1$ |$x_2$ |$x_3$ |$f(x_1, x_2, x_3)$ |Min Clause                                                 |Max Clause                                               |
|:----:|:----:|:----:|:-----------------:|:----------------------------------------------------------|:--------------------------------------------------------|
|0     |0     |0     |1                  |$\overline{x}_1 \land \overline{x}_2 \land \overline{x}_3$ |-                                                        |
|0     |0     |1     |1                  |$\overline{x_1} \land \overline{x}_2 \land x_3$            |-                                                        |
|0     |1     |0     |0                  |-                                                          |$x_1 \lor \overline{x}_2 \lor x_3$                       |
|0     |1     |1     |0                  |-                                                          |$x_1 \lor \overline{x}_2 \lor \overline{x}_3$            |
|1     |0     |0     |0                  |-                                                          |$\overline{x}_1 \lor x_2 \lor x_3$                       |
|1     |0     |1     |1                  |$x_1 \land \overline{x}_2 \land x_3$                       |-                                                        |
|1     |1     |0     |1                  |$x_1 \land x_2 \land \overline{x}_3$                       |-                                                        |
|1     |1     |1     |0                  |-                                                          |$\overline{x}_1 \lor \overline{x}_2 \lor \overline{x}_3$ |

<br>

DNF:  
$f(x_1, x_2, x_3) = (\overline{x}_1 \land \overline{x}_2 \land \overline{x}_3) \lor (\overline{x_1} \land \overline{x}_2 \land x_3) \lor (x_1 \land \overline{x}_2 \land x_3) \lor (x_1 \land x_2 \land \overline{x}_3)$

<br>

CNF:  
$f(x_1, x_2, x_3) = (x_1 \lor \overline{x}_2 \lor x_3) \land (x_1 \lor \overline{x}_2 \lor \overline{x}_3) \land (\overline{x}_1 \lor x_2 \lor x_3) \land (\overline{x}_1 \lor \overline{x}_2 \lor \overline{x}_3)$

<br>
<br>
<br>
<br>

## Minimization

- [Minimization With KV-Diagrams](./minimization/switching_function_minimization_kv_diagram.md)
- [Quine-McCluskey Algorithm](./minimization/switching_function_minimization_quine_mccluskey.md)

<br>
<br>
<br>
<br>

## Vector Function

> A **vector** of a switching function is defined as $X = (x_1, x_2, ..., x_n)$.

<br>

> A **vector function** is defined as  
> $Y = F(X)$ with  
> $Y = (y_1, y_2, ... ,y_n)$ and  
> $F = (f_1, f_2, ... ,f_n)$.