# **LaTeX Math**
<br>

## **Table Of Contents**

- [**LaTeX Math**](#latex-math)
  - [**Table Of Contents**](#table-of-contents)
  - [**Expression Formats**](#expression-formats)
    - [**Inline**](#inline)
    - [**Block Expression**](#block-expression)
    - [**Multiline Expression**](#multiline-expression)
      - [**With Numeration**](#with-numeration)
      - [**Without Numeration**](#without-numeration)
  - [**Text**](#text)
  - [**Set Theory**](#set-theory)
    - [**Set Definition**](#set-definition)
    - [**Set Operations**](#set-operations)
    - [**Set Relations**](#set-relations)
    - [**Number Set Symbols**](#number-set-symbols)
  - [**Logic**](#logic)
    - [**Logical Quantifiers**](#logical-quantifiers)
    - [**Logical Operations**](#logical-operations)
  - [**Arithmetic**](#arithmetic)
  - [**Functions**](#functions)
    - [**Function Definitions**](#function-definitions)
    - [**Generic Functions**](#generic-functions)
    - [**Trigonometric Functions**](#trigonometric-functions)
  - [**Comparison**](#comparison)
  - [**Powers And Indices**](#powers-and-indices)
  - [**Sequences**](#sequences)
  - [**Integrals**](#integrals)
  - [**Limit**](#limit)
  - [**Vectors And Matrices**](#vectors-and-matrices)
  - [**Overhead Symbols**](#overhead-symbols)
  - [**Others**](#others)
  - [**Theorem**](#theorem)

<br>
<br>
<br>
<br>

## **Expression Formats**
<br>
<br>
<br>

### **Inline**

```latex
$Expression$
```

<br>

Example

```latex
Inline expression: $\sqrt{a + b}$
```

Inline expression: $\sqrt{a + b}$

<br>
<br>
<br>

### **Block Expression**

```latex
\[Expression\]
```

<br>

Example

```latex
\[\sqrt{a + b}\]
```

$$\sqrt{a + b}$$

<br>
<br>
<br>

### **Multiline Expression**
<br>
<br>

#### **With Numeration**

```latex
\begin{align}
   line1 \\
   line2
\end{align}
```

<br>

Example

```latex
% aligned at equal sign
\begin{align}
    x &= y \\
    a &= 12 + 4
\end{align}
```

$$
\begin{align}
    x &= y \\
    a &= 12 + 4
\end{align}
$$

<br>
<br>

#### **Without Numeration**

```latex
\begin{align*}
   line1 \\
   line2
\end{align*}
```

<br>

Example

```latex
\begin{align*}
   x &= y \\
   a &= 12 + 4
\end{align*}
```

$$
\begin{align*}
   x &= y \\
   a &= 12 + 4
\end{align*}
$$

<br>
<br>
<br>
<br>

## **Text**
<br>

|Text                        |Description                   |LaTeX Notation              |
|:--------------------------:|:-----------------------------|:---------------------------|
|$\text{text}$               |Text within inline expression |`\text{text}`               |
|$\underbrace{x + y}_{text}$ |Text as underbrace            |`\underbrace{x + y}_{text}` |

<br>
<br>
<br>
<br>

## **Set Theory**
<br>
<br>

### **Set Definition**
<br>

|Set Definition       |Description                          |LaTeX Notation         |
|:-------------------:|:------------------------------------|:----------------------|
|$\\{a, b, \dotsc\\}$ |Basic set definition                 |`\\\{a, b, \dotsc\\\}` |
|$\\{a \mid T(a)\\}$  |Set definition with condition $T(a)$ |`\\\{a \mid T(a)\\\}`  |
|$\\{a : T(a)\\}$     |Set definition with condition $T(a)$ |`\\\{a : T(a)\\\}`     |
|$\emptyset$          |Empty set                            |`\emptyset`            |

<br>
<br>

### **Set Operations**

|Set Operation    |Description            |LaTeX Notation    |
|:---------------:|:----------------------|:-----------------|
|$\cup$           |Union                  |`\cup`           |
|$\dot\cup$       |Union (Disjunct Sets)  |`\dot\cup`      |
|$\cap$           |Intersection           |`\cap`           |
|$\setminus$      |Set Difference         |`\setminus`      |
|$\triangle$      |Symmetric Difference   |`\triangle`      |
|$\times$         |Cartesian Product      |`\times`         |
|$\mathcal{P}(A)$ |Power Set              |`\mathcal{P}(A)` |
|$\vert A \vert$  |Cardinality            |`\vert A \vert`   |

<br>
<br>

### **Set Relations**

|Set Relation |Description     |LaTeX Notation |
|:-----------:|:---------------|:--------------|
|$\subset$    |Strict Subset   |`\subset`     |
|$\subsetneq$ |Strict Subset   |`\subsetneq`  |
|$\subseteq$  |Subset Or Equal |`\subseteq`   |
|$\in$        |member of       |`\in`         |
|$\notin$     |not a member of |`\notin`      |

<br>
<br>

### **Number Set Symbols**
<br>

|Number Symbol |Description        |LaTeX Notation   |
|:------------:|:------------------|:----------------|
|$\mathbb{P}$  |Prime Numbers      |`\mathbb{P}`     |
|$\mathbb{N}$  |Natural Numbers    |`\mathbb{N}`     |
|$\mathbb{Z}$  |Integers           |`\mathbb{Z}`     |
|$\mathbb{Q}$  |Rational Numbers   |`\mathbb{Q}`     |
|$\mathbb{R}$  |Real Numbers       |`\mathbb{R}`     |

<br>
<br>
<br>
<br>

## **Logic**
<br>
<br>

### **Logical Quantifiers**
<br>

|Quantifier |Description                |LaTeX Notation |
|:---------:|:--------------------------|:--------------|
|$\forall$  |Universal quantifier       |`\forall`      |
|$\exists$  |Existential quantifier     |`\exists`      |
|$\exists!$ |Exactly one quantifier     |`\exists!`     |
|$\nexists$ |Non existential quantifier |`\nexists`     |

<br>
<br>

### **Logical Operations**
<br>

|Operation         |Description           |LaTeX Notation    |
|:----------------:|:---------------------|:-----------------|
|$\land$           |Conjunction           |`\land`           |
|$\lor$            |Disjunction           |`\lor`            |
|$\dot\lor$        |Exclusive Disjunction |`\dot\lor`        |
|$\lnot$           |Negation              |`\lnot`           |
|$\bar A$          |Negation              |`\bar A`          |
|$\Rightarrow$     |Implication           |`\Rightarrow`     |
|$\Leftrightarrow$ |Equivalence           |`\Leftrightarrow` |

<br>
<br>
<br>
<br>

## **Arithmetic**
<br>

|Symbol        |Description    |LaTeX Notation |
|:------------:|:--------------|:--------------|
|$+$           |Addition       |`+`            |
|$-$           |Subtraction    |`-`            |
|$*$           |Multiplication |`*`            |
|$\cdot$       |Multiplication |`\cdot`        |
|$\div$        |Division       |`\div`         |
|$:$           |Division       |`:`            |
|$\frac{x}{y}$ |Fraction       |`\frac{x}{y}`  |

<br>
<br>
<br>
<br>

## **Functions**
<br>
<br>

### **Function Definitions**
<br>

|Symbol           |Description          |LaTeX Notation   |
|:---------------:|:--------------------|:----------------|
|$f:A \to B$      |Function Definitions |`f: A \to B`     |
|$f: x \mapsto y$ |Element Mapping      |`f: x \mapsto y` |
|$f^{-1}$         |Inverse Function     |`f^{-1}`         |
|$f \circ g$      |Function Composition |`f \circ g`      |

<br>
<br>

### **Generic Functions**
<br>

|Symbol              |Description   |LaTeX Notation      |
|:------------------:|:-------------|:-------------------|
|$\vert x \vert$     |Absolute      |`\vert x \vert`     |
|$\lfloor x \rfloor$ |Floor         |`\lfloor x \rfloor` |
|$\lceil x \rceil$   |Ceiling       |`\lceil x \rceil`   |
|$\sqrt{x}$          |Square Root   |`\sqrt{x}`          |
|$\sqrt[n]{x}$       |$n^{th}$ Root |`\sqrt[n]{x}`       |

<br>
<br>

### **Trigonometric Functions**
<br>

|Symbol    |Description |LaTeX Notation   |
|:--------:|:-----------|:----------------|
|$\sin(x)$ |Sine        |`\sin(x)`        |
|$\cos(x)$ |Cosine      |`\cos(x)`        |
|$\tan(x)$ |Tangent     |`\tan(x)`        |
|$\cot(x)$ |Cotengent   |`\cot(x)`        |

<br>
<br>
<br>
<br>

## **Comparison**
<br>

|Symbol |Description      |LaTeX Notation |
|:-----:|:----------------|:-------------:|
|$<$    |Lesser           |`<`            |
|$>$    |Greater          |`>`            |
|$\le$  |Lesser or equal  |`\le`          |
|$\ge$  |Greater or equal |`\ge`          |

<br>
<br>
<br>
<br>

## **Powers And Indices**
<br>

|Symbol      |Description  |LaTeX Notation   |
|:----------:|:------------|:----------------|
|$x^2$       |Potency      |`x^2`            |
|$x^{2 + i}$ |Potency      |`x^{2 + i}`      |
|$x_2$       |Subscript    |`x_2`            |
|$x_{2 + i}$ |Subscript    |`x_{2 + i}`      |

<br>
<br>
<br>
<br>

## **Sequences**
<br>

|Symbol          |Description          |LaTeX Notation  |
|:--------------:|:--------------------|:---------------|
|$\sum$          |Sum                  |`\sum`          |
|$\sum_{i=0}^n$  |Sum With Indices     |`\sum_{i=0}^n`  |
|$\prod$         |Product              |`\prod`         |
|$\prod_{i=0}^n$ |Product With Indices |`\prod_{i=0}^n` |

<br>
<br>
<br>
<br>

## **Integrals**
<br>

|Symbol                      |Description |LaTeX Notation  |
|:--------------------------:|:-----------|:---------------|
|$\int_0^\infty$             |Integeral   |`\int_0^\infty` |

<br>
<br>
<br>
<br>

## **Limit**
<br>

|Symbol                |Description |LaTeX Notation        |
|:--------------------:|:-----------|:---------------------|
|$\lim_{n \to \infty}$ |Limes       |`\lim_{n \to \infty}` |

<br>
<br>
<br>
<br>

## **Vectors And Matrices**
<br>

|Symbol                                                 |Description |LaTeX Notation |
|:-----------------------------------------------------:|:-----------|:--------------|
|$$\begin{pmatrix}v_1, \dotsc, v_n \end{pmatrix}$$        |Vector      |`\begin{pmatrix}v_1, \dotsc, v_n \end{pmatrix}` |
|$$\begin{pmatrix} 1 \\ 2 \\ 3 \end{pmatrix}$$            |Vector      |`\begin{pmatrix} 1 \\ 2 \\ 3 \end{pmatrix}` |
|$$\begin{pmatrix} 1 & 2 & 3 \\ 4 & 5 & 6 \end{pmatrix}$$ |Matrix      |`\begin{pmatrix} 1 & 2 & 3 \\ 4 & 5 & 6 \end{pmatrix}` |

<br>
<br>
<br>
<br>

## **Overhead Symbols**
<br>

|Symbol          |Description |LaTeX Notation  |
|:--------------:|:-----------|:---------------|
|$\tilde{a}$     |Tilde       |`\tilde{a}`     |
|$\widetilde{a}$ |Wide Tilde  |`\widetilde{a}` |
|$\hat{a}$       |Hat         |`\hat{a}`       |
|$\vec{a}$       |Vecor       |`\vec{a}`       |
|$\dot{a}$       |Dot         |`\dot{a}`       |
|$\overline{a}$  |Overline    |`\overline{a}`  |

<br>
<br>
<br>
<br>

## **Others**

|Symbol                      |Description  |LaTeX Notation       |
|:--------------------------:|:------------|:--------------------|
|$\left(a + b\right)$        |Brackets     |`\left(a + b\right)` |
|$\square$                   |End of proof |`\square`            |

<br>
<br>
<br>
<br>

## **Theorem**

```latex
\documentclass{article}
    \newtheorem{theoremName}{printedName}
    \newtheorem{definitionName}{printedName}
\begin{document}

    \begin{theoremName}\label{theoremname:title}
        % content
    \end{theoremName}

    \begin{definitionName}
        % content
    \end{definitionName}

\end{document}
```
