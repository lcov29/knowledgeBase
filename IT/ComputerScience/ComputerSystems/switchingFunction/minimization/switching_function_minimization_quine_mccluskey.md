# Switching Function Minimization: Quine-McCluskey Algorithm
<br>

## Table Of Contents

- [Switching Function Minimization: Quine-McCluskey Algorithm](#switching-function-minimization-quine-mccluskey-algorithm)
  - [Table Of Contents](#table-of-contents)
  - [When To Use](#when-to-use)
  - [Quine-McCluskey Algorithm](#quine-mccluskey-algorithm)
    - [Prerequisites](#prerequisites)
    - [Step 1](#step-1)
    - [Step 2 (iterative)](#step-2-iterative)
    - [Step 3](#step-3)
    - [Step 4](#step-4)

<br>
<br>
<br>
<br>

## When To Use

When we have to minimize a switching function in the disjunctive normal form with more than four input variables.

<br>
<br>
<br>
<br>

## Quine-McCluskey Algorithm

> The **Quine-McCluskey algorithm** minimizes a switching function in the **disjunctive normal form (DNF)**

<br>
<br>
<br>

### Prerequisites

We have a switching function ordered by the decimal value of its input variables:

<br>

|Decimal |$x_4$ |$x_3$ |$x_2$ |$x_1$ |$f(x_4, x_3, x_2, x_1)$ |
|:------:|:----:|:----:|:----:|:----:|:----------------------:|
|0       |0     |0     |0     |0     |1                       |
|1       |0     |0     |0     |1     |0                       |
|2       |0     |0     |1     |0     |1                       |
|3       |0     |0     |1     |1     |0                       |
|4       |0     |1     |0     |0     |1                       |
|5       |0     |1     |0     |1     |1                       |
|6       |0     |1     |1     |0     |1                       |
|7       |0     |1     |1     |1     |1                       |
|8       |1     |0     |0     |0     |0                       |
|9       |1     |0     |0     |1     |0                       |
|10      |1     |0     |1     |0     |1                       |
|11      |1     |0     |1     |1     |1                       |
|12      |1     |1     |0     |0     |0                       |
|13      |1     |1     |0     |1     |0                       |
|14      |1     |1     |1     |0     |0                       |
|15      |1     |1     |1     |1     |0                       |

<br>
<br>
<br>

### Step 1

- Insert all min clauses with output value `1` into a new table
- Group min clauses by the amount of input variables with the value `1`

<br>

|Decimal |$x_4$ |$x_3$ |$x_2$ |$x_1$ |     |Group |
|:------:|:----:|:----:|:----:|:----:|:---:|-----:|
|0       |0     |0     |0     |0     |     |0     |
|--------|------|------|------|------|-----|------|
|2       |0     |0     |1     |0     |     |1     |
|4       |0     |1     |0     |0     |     |1     |
|--------|------|------|------|------|-----|------|
|5       |0     |1     |0     |1     |     |2     |
|6       |0     |1     |1     |0     |     |2     |
|10      |1     |0     |1     |0     |     |2     |
|--------|------|------|------|------|-----|------|
|7       |0     |1     |1     |1     |     |3     |
|11      |1     |0     |1     |1     |     |3     |
|--------|------|------|------|------|-----|------|

<br>
<br>
<br>

### Step 2 (iterative)

We try to combine each entry of a group with each entry of the next group.

If two entries **only differ in one input variable:**
  1. replace the input value of the first entry with `-`
  2. note the decimal value of the second entry in the decimal column of the first entry
  3. mark the both combined entries with a checkmark

Iterate this step until no more entries can be combined.

<br>
<br>

**Iteration 1**
<br>

Start table:

|Decimal |$x_4$ |$x_3$ |$x_2$ |$x_1$ |                  |Group |
|:------:|:----:|:----:|:----:|:----:|:----------------:|-----:|
|0       |0     |0     |0     |0     |:heavy_checkmark: |0     |
|--------|------|------|------|------|------------------|------|
|2       |0     |0     |1     |0     |:heavy_checkmark: |1     |
|4       |0     |1     |0     |0     |:heavy_checkmark: |1     |
|--------|------|------|------|------|------------------|------|
|5       |0     |1     |0     |1     |:heavy_checkmark: |2     |
|6       |0     |1     |1     |0     |:heavy_checkmark: |2     |
|10      |1     |0     |1     |0     |:heavy_checkmark: |2     |
|--------|------|------|------|------|------------------|------|
|7       |0     |1     |1     |1     |:heavy_checkmark: |3     |
|11      |1     |0     |1     |1     |:heavy_checkmark: |3     |

<br>

End Table:

|Decimal |$x_4$ |$x_3$ |$x_2$ |$x_1$ |                  |Group |
|:------:|:----:|:----:|:----:|:----:|:----------------:|-----:|
|0,2     |0     |0     |-     |0     |                  |0     |
|0,4     |0     |-     |0     |0     |                  |0     |
|--------|------|------|------|------|------------------|------|
|2,6     |0     |-     |1     |0     |                  |1     |
|2,10    |-     |0     |1     |0     |                  |1     |
|4,5     |0     |1     |0     |-     |                  |1     |
|4,6     |0     |1     |-     |0     |                  |1     |
|--------|------|------|------|------|------------------|------|
|5,7     |0     |1     |-     |1     |                  |2     |
|6,7     |0     |1     |1     |-     |                  |2     |
|10,11   |1     |0     |1     |-     |                  |2     |

<br>
<br>

**Iteration 2**
<br>

Start Table:

|Decimal |$x_4$ |$x_3$ |$x_2$ |$x_1$ |                  |Group |
|:------:|:----:|:----:|:----:|:----:|:----------------:|-----:|
|0,2     |0     |0     |-     |0     |:heavy_checkmark: |0     |
|0,4     |0     |-     |0     |0     |:heavy_checkmark: |0     |
|--------|------|------|------|------|------------------|------|
|2,6     |0     |-     |1     |0     |:heavy_checkmark: |1     |
|2,10    |-     |0     |1     |0     |                  |1     |
|4,5     |0     |1     |0     |-     |:heavy_checkmark: |1     |
|4,6     |0     |1     |-     |0     |:heavy_checkmark: |1     |
|--------|------|------|------|------|------------------|------|
|5,7     |0     |1     |-     |1     |:heavy_checkmark: |2     |
|6,7     |0     |1     |1     |-     |:heavy_checkmark: |2     |
|10,11   |1     |0     |1     |-     |                  |2     |

<br>

End Table:

|Decimal   |$x_4$ |$x_3$ |$x_2$ |$x_1$ |                  |Group |
|:--------:|:----:|:----:|:----:|:----:|:----------------:|-----:|
|0,2 ; 4,6 |0     |-     |-     |0     |                  |0     |
|0,4 ; 2,6 |0     |-     |-     |0     |                  |0     |
|----------|------|------|------|------|------------------|------|
|4,5 ; 6,7 |0     |1     |-     |-     |                  |1     |
|4,6 ; 5,7 |0     |1     |-     |-     |                  |1     |

<br>
<br>
<br>

### Step 3

Determine all `prime implicants` of the switching function:

1. Remove all clauses from the table that are marked as combined
2. Remove all remaining rows with the same input variables


|Decimal   |$x_4$ |$x_3$ |$x_2$ |$x_1$ |
|:--------:|:----:|:----:|:----:|:----:|
|2,10      |-     |0     |1     |0     |
|10,11     |1     |0     |1     |-     |
|0,4 ; 2,6 |0     |-     |-     |0     |
|4,6 ; 5,7 |0     |1     |-     |-     |

<br>

Index form:  
$f(x_4, x_3, x_2, x_1) = (2,10) \lor (10,11) \lor (0,2,4,6) \lor (4,5,6,7)$

<br>

Boolean form:  
$f(x_4, x_3, x_2, x_1) = (\overline{x}_3 \land x_2 \land \overline{x_1}) \lor (x_4 \land \overline{x}_3 \land x_2) \lor (\overline{x}_4 \land \overline{x}_1) \lor (\overline{x}_4 \land x_3)$

<br>
<br>
<br>

### Step 4

We want to minimize the `prime implicants` further by finding a minimal set (`essential prime implicants`) that covers all min clauses.

<br>

1. Create a table with the indices of the min clauses as columns and the prime implicants as rows
2. Mark all indices for each prime implicant with a cross
3. Mark all rows that have an exclusive node within at least one column (`essential prime implicants`)
5. Select minimal amount of essential and other prime implicants so that all column indices are covered

<br>

![Prime Implicants](../images/quine_mccluskey_prime_implicant_table.drawio.svg)

<br>

In this example the essential prime implicants are:
- (10,11)
- (0,2,4,6)
- (4,5,6,7)

<br>

Since the essential prime implicants cover all column indices, we get the minimized disjunctive form:  
$f(x_4, x_3, x_2, x_1) = (x_4 \land \overline{x}_3 \land x_2) \lor (\overline{x}_4 \land \overline{x}_1) \lor (\overline{x}_4 \land x_3)$