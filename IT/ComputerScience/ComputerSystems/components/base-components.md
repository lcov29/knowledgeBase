# Base Components

<br>

## Table Of Contents

<br>

- [Base Components](#base-components)
  - [Table Of Contents](#table-of-contents)
  - [Code Converter](#code-converter)
  - [Adders](#adders)
    - [Half Adder (HA)](#half-adder-ha)
    - [Full Adder (FA)](#full-adder-fa)
    - [Parallel Adder](#parallel-adder)
      - [Normal Form Parallel Adder](#normal-form-parallel-adder)
      - [Ripple-Carry Adder](#ripple-carry-adder)
  - [Comparator](#comparator)
  - [Multiplexer](#multiplexer)
  - [Demultiplexer](#demultiplexer)

<br>
<br>
<br>
<br>

## Code Converter

> A **code converter** converts converts codes between a specific input and output set.  
> It therefore changes the representation of data.

<br>

```mermaid
flowchart LR
  A([Input]) --> B([Output])
```

<br>

![Code Converter Sign](./images/code_converter.drawio.svg)

<br>
<br>
<br>
<br>

## Adders

> An **adder** adds two dual numbers.

<br>
<br>
<br>

### Half Adder (HA)

> A **half adder** adds two single-digit dual numbers and returns the sum and carry.

<br>

![Half Adder Sign](./images/half_adder_sign.drawio.svg)

<br>

**Implementation**

$S = (A \land \overline{B}) \lor (\overline{A} \land B) = A \oplus B$

$C = A \land B$

![Half Adder Implementation](./images/half_adder_implementation.drawio.svg)

<br>
<br>
<br>

### Full Adder (FA)

> A **full adder** adds two single-digit dual numbers with carry input and returns the sum and carry.

<br>

![Full Adder Sign](./images/full_adder_sign.drawio.svg)

<br>

**Implementation**

$S = A \oplus B \oplus C$

$C = (A \land B) \lor (A \lor B) \land C$

<br>
<br>
<br>

### Parallel Adder

> A **parallel adder** adds two multi-digit dual numbers.

<br>
<br>

#### Normal Form Parallel Adder

> A **normal form parallel adder** adds two multi-digit dual numbers with a 3-tier architecture consisting of NOT, AND and OR.

<br>

| Advantages                                              | Disadvantages      |
| :------------------------------------------------------ | :----------------- |
| constant execution time                                 | high hardware cost |
| execution time is independent of amount of input digits |                    |

<br>

![Normal Form Parallel Adder Sign](./images/normal_form_parallel_adder_sign.drawio.svg)

<br>

**Implementation**

![Normal Form Parallel Adder Implementation](./images/normal_form_parallel_adder_implementation.drawio.svg)

Example with three digits.

<br>
<br>

#### Ripple-Carry Adder

> A **ripple-carry adder** adds two multi-digit dual numbers with a multi-tier architecture consisting of a half adder for the lowest digit and full adders for all other digits.

<br>

![Ripple Carry Adder](./images/ripple_carry_adder_implementation.drawio.svg)

<br>
<br>
<br>
<br>

## Comparator

> A **comparator** compares two dual numbers.

<br>

![Comparator Sign](./images/comparator_sign.drawio.svg)

<br>
<br>
<br>
<br>

## Multiplexer

> A **multiplexer** selects one of multiple inputs based on the value of the control inputs.

<br>

![Multiplexer](./images/multiplexer_sign.drawio.svg)

<br>
<br>
<br>
<br>

## Demultiplexer

> A **demultiplexer** selects one of multiple output lines for an input based on the value of the control inputs.

<br>

![Demultiplexer](./images/demultiplexer_sign.drawio.svg)
