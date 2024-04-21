# Switching Function Minimization: KV-Diagram
<br>

## Table Of Contents

- [Switching Function Minimization: KV-Diagram](#switching-function-minimization-kv-diagram)
  - [Table Of Contents](#table-of-contents)
  - [KV-Diagram](#kv-diagram)
  - [Minimize Conjunctive Normal Form (CNF)](#minimize-conjunctive-normal-form-cnf)
    - [Create KV-Diagram](#create-kv-diagram)
    - [Minimization](#minimization)
  - [Minimize Disjunctive Normal Form (DNF)](#minimize-disjunctive-normal-form-dnf)
    - [Create KV-Diagram](#create-kv-diagram-1)
    - [Minimization](#minimization-1)

<br>
<br>
<br>
<br>

## KV-Diagram

> A **Karnaugh-Veitch-Diagram** represents a switching function in a graphical matrix. 
>
> A diagram for a switching function with $n$ input variables has $2^n$ fields.
>
> The fields are positioned in a way that switching to an adjacent field only changes the value of exactly one input variable.

<br>
<br>
<br>
<br>

## Minimize Conjunctive Normal Form (CNF)
<br>
<br>

### Create KV-Diagram


Lets assume we want to create a KV-Diagram for the following CNF:

$f(x_1, x_2, x_3) = (\overline{x}_1 \lor x_2 \lor x_3) \land (x_1 \lor \overline{x}_2 \lor x_3) \land (x_1 \lor x_2 \lor \overline{x}_3) \land (x_1 \lor \overline{x}_2 \lor \overline{x}_3)$

<br>

**Step 1:** Create basic diagram frame with input variables and their values

![Step1](../images/empty_kv_diagram.drawio.svg)

<br>

**Step 2:** Map each *max clause* to a field so that it returns `0` for the variable values of that field

![Step2](../images/cnf_kv_diagram_step_1.drawio.svg)

<br>

**Step 3:** Add missing disjunction clauses so that only one variable changes per row or column

![Step3](../images/cnf_kv_diagram_step_2.drawio.svg)

<br>

**Step 4:** Fill all remaining fields with `1`

![Step4](../images/cnf_kv_diagram_step_3.drawio.svg)

<br>
<br>
<br>

### Minimization

**Step 1:** Mark all $2^n$ adjacent fields that have the value `0` as a block

> **Note:**
> - fields of the first row are adjacent to the fields in the same column of the last row
> - fields of the first column are adjacent to the fields in the same row of the last column
> - Blocks can contain 1, 2, 4, 8, ... fields

![Step 1](../images/cnf_kv_diagram_minimization_step_1.drawio.svg)

<br>
<br>

**Step 2:** Use blocks as clauses in minimized conjunctive form (CF)

<span style="color: red; font-weight: bold;">Clause 1</span>  

$$x_1 \lor x_2 \lor \overline{x}_3 \lor x_4$$

<br>

<span style="color: green; font-weight: bold;">Clause 2</span>

$$
\begin{align*}
  (\underbrace{(\overline{x}_1 \lor \overline{x}_2) \land (\overline{x}_1 \lor x_2)}_{\text{law of distribution}}) \lor x_3 \lor x_4 &= (\overline{x}_1 \lor \underbrace{(\overline{x}_2 \land x_2)}_{0}) \lor x_3 \lor x_4 \\
  &= \overline{x}_1 \lor x_3 \lor x_4
\end{align*}
$$

<br>

<span style="color: yellow; font-weight: bold;">Clause 3</span>

$$
\begin{align*}
  \overline{x}_1 \lor \overline{x}_2 \lor (\underbrace{(x_3 \lor \overline{x}_4) \land (\overline{x}_3 \lor \overline{x}_4)}_{\text{law of distribution}}) &= \overline{x}_1 \lor \overline{x}_2 \lor (\overline{x}_4 \lor \underbrace{(x_3 \land \overline{x}_3)}_{0}) \\
  &= \overline{x}_1 \lor \overline{x}_2 \lor \overline{x}_4
\end{align*}
$$

<br>

<span style="color: blue; font-weight: bold;">Clause 4</span>  

$$
\begin{align*}
  (\underbrace{(x_1 \lor \overline{x}_2) \land (\overline{x}_1 \lor \overline{x}_2)}_{\text{Law of distribution}}) \lor (\underbrace{(x_3 \lor x_4) \land (x_3 \lor \overline{x}_4)}_{\text{Law of distribution}}) &= 
  \overline{x}_2 \lor \underbrace{(x_1 \land \overline{x}_1)}_{0} \lor x_3 \lor \underbrace{(x_4 \land \overline{x}_4)}_{0} \\
  &= \overline{x}_2 \lor x_3
\end{align*}
$$

<br>

CF:  
$f(x_1, x_2, x_3, x_4) = (x_1 \lor x_2 \lor \overline{x}_3 \lor x_4) \land (\overline{x}_1 \lor x_3 \lor x_4) \land (\overline{x}_1 \lor \overline{x}_2 \lor \overline{x}_4) \land (\overline{x}_2 \lor x_3)$

<br>
<br>
<br>
<br>

## Minimize Disjunctive Normal Form (DNF)
<br>
<br>

### Create KV-Diagram

Lets assume we want to create a KV-Diagram for the following DNF:

$f(x_1, x_2, x_3) = (\overline{x}_1 \land \overline{x}_2 \land \overline{x}_3) \lor (x_1 \land x_2 \land \overline{x}_3) \lor (\overline{x}_1 \land \overline{x}_2 \land x_3) \lor (\overline{x}_1 \land x_2 \land x_3)$

<br>

**Step 1:** Create basic diagram frame with input variables and their values

![Step1](../images/empty_kv_diagram.drawio.svg)

<br>

**Step 2:** Map each *min clause* to a field so that it returns `1` for the variable values of that field

![Step2](../images/dnf_kv_diagram_step_1.drawio.svg)

<br>

**Step 3:** Add missing conjunction clauses so that only one variable changes per row or column

![Step3](../images/dnf_kv_diagram_step_2.drawio.svg)

<br>

**Step 4:** Fill all remaining fields with `0`

![Step4](../images/dnf_kv_diagram_step_3.drawio.svg)

<br>
<br>
<br>

### Minimization
<br>

**Step 1:** Mark all $2^n$ adjacent fields that have the value `1` as a block

> **Note:**
> - fields of the first row are adjacent to the fields in the same column of the last row
> - fields of the first column are adjacent to the fields in the same row of the last column
> - Blocks can contain 1, 2, 4, 8, ... fields

![Step 1](../images/dnf_kv_diagram_minimization_step_1.drawio.svg)

<br>
<br>

**Step 2:** Use blocks as clauses in minimized conjunctive form (CF)
<br>

<span style="color: red; font-weight: bold;">Clause 1</span>  

$$
\begin{align*}
  x_2 \land x_1 \land (\underbrace{(\overline{x}_4 \land \overline{x}_3) \lor (\overline{x}_4 \land x_3)}_{\text{law of distribution}} \lor \underbrace{(x_4 \land x_3) \lor (x_4 \land \overline{x}_3)}_{\text{law of distribution}}) &= x_2 \land x_1 \land (\overline{x}_4 \land \underbrace{(\overline{x}_3 \lor x_3)}_{1} \lor x_4 \land \underbrace{(\overline{x}_3 \lor x_3)}_{1}) \\
  &= x_2 \land x_1 \land \underbrace{(\overline{x}_4 \lor x_4)}_{1} \\
  &= x_2 \land x_1
\end{align*}
$$

<br>

<span style="color: green; font-weight: bold;">Clause 2</span>

$$
\begin{align*}
  \underbrace{(\overline{x}_2 \land x_1 \lor x_2 \land x_1)}_{\text{law of distribution}} \land \overline{x}_4 \land x_3 &= (x_1 \land \underbrace{(\overline{x}_2 \lor x_2)}_{1}) \land \overline{x}_4 \land x_3 \\
  &= \overline{x}_4 \land x_3 \land x_1
\end{align*}
$$

<br>

<span style="color: blue; font-weight: bold;">Clause 2</span>

$$
\begin{align*}
  \underbrace{(\overline{x}_2 \land \overline{x}_1 \lor x_2 \land \overline{x}_1)}_{\text{law of distribution}} \land \underbrace{(\overline{x}_4 \land \overline{x}_3 \lor x_4 \land \overline{x}_3)}_{\text{law of distribution}} &= (\overline{x}_1 \land (\underbrace{\overline{x}_2 \lor x_2}_{1})) \land (\overline{x}_3 \land (\underbrace{\overline{x}_4 \lor x_4}_{1})) \\
  &= \overline{x}_1 \land \overline{x}_3
\end{align*}
$$

<br>

DF:  
$f(x_1, x_2, x_3, x_4) = (x_2 \land x_1) \lor (\overline{x}_4 \land x_3 \land x_1) \lor (\overline{x}_1 \land \overline{x}_3)$