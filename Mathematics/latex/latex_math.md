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
  - [**Number Set Symbols**](#number-set-symbols)
  - [**Arithmetic**](#arithmetic)
  - [**Set Theory**](#set-theory)
    - [**Set Definition**](#set-definition)
    - [**Set Operations**](#set-operations)
    - [**Set Relations**](#set-relations)
  - [**Powers And Indices**](#powers-and-indices)
  - [**Trigonometric Functions**](#trigonometric-functions)
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

|Text                        |Description                   |LaTeX Notation            |
|:--------------------------:|:-----------------------------|:-------------------------|
|$\text{text}$               |Text within inline expression |\text{text}               |
|$\underbrace{x + y}_{text}$ |Text as underbrace            |\underbrace{x + y}_{text} |

<br>
<br>
<br>
<br>

## **Number Set Symbols**
<br>

|Number Symbol |Description        |LaTeX Notation |
|:------------:|:------------------|:--------------|
|$\mathbb{P}$  |Prime Numbers      |\mathbb{P}     |
|$\mathbb{N}$  |Natural Numbers    |\mathbb{N}     |
|$\mathbb{Z}$  |Integers           |\mathbb{Z}     |
|$\mathbb{Q}$  |Rational Numbers   |\mathbb{Q}     |
|$\mathbb{R}$  |Real Numbers       |\mathbb{R}     |


<br>
<br>
<br>
<br>

## **Arithmetic**
<br>

|Symbol      |Description    |LaTeX Notation |
|:----------:|:--------------|:--------------|
|$a + b$     |Addition       |a + b          |
|$a - b$     |Subtraction    |a - b          |
|$a * b$     |Multiplication |a * b          |
|$a \cdot b$ |Multiplication |a \cdot b      |
|$a / b$     |Division

<br>
<br>
<br>
<br>

## **Set Theory**
<br>
<br>

### **Set Definition**
<br>

|Set Definition     |Description                          |LaTeX Notation     |
|:-----------------:|:------------------------------------|:------------------|
|$\{a, b, \dotsc\}$ |Basic set definition                 |\\{a, b, \dotsc\\} |
|$\{a \mid T(a)\}$  |Set definition with condition $T(a)$ |\\{a \mid T(a)\\}  |
|$\{a : T(a)\}$     |Set definition with condition $T(a)$ |\\{a : T(a)\\}     |
|$\emptyset$        |Empty set                            |\emptyset          |

<br>
<br>

### **Set Operations**

|Set Operation    |Description            |LaTeX Notation  |
|:---------------:|:----------------------|:---------------|
|$A \cup B$       |Union                  |A \\cup B       |
|$A \dot\cup B$   |Union (Disjunct Sets)  |A \\dot\\cup B  |
|$A \cap B$       |Intersection           |A \\cap B       |
|$A \setminus B$  |Set Difference         |A \\setminus B  |
|$A \triangle B$  |Symmetric Difference   |A \\triangle B  |
|$A \times B$     |Cartesian Product      |A \\times B     |
|$\mathcal{P}(A)$ |Power Set              |\\mathcal{P}(A) |

<br>
<br>

### **Set Relations**

|Set Relation     |Description                      |LaTeX Notation  |
|:---------------:|:--------------------------------|:---------------|
|$A \subset B$    |Strict Subset                    |A \\subset B    |
|$A \subsetneq B$ |Strict Subset                    |A \\subsetneq B |
|$A \subseteq B$  |Subset Or Equal                  |A \\subseteq B  |
|$x \in A$        |$x\text{ is a member of } A$     |x \\in A        |
|$x \notin A$     |$x\text{ is not a member of } A$ |x \\notin A     |

<br>
<br>
<br>
<br>

## **Powers And Indices**
<br>

|Symbol      |Description  |LaTeX Notation |
|:----------:|:------------|:--------------|
|$x^2$       |Potency      |x^2            |
|$x^{2 + i}$ |Potency      |x^{2 + i}      |
|$x_2$       |Subscript    |x_2            |
|$x_{2 + i}$ |Subscript    |x_{2 + i}      |

<br>
<br>
<br>
<br>


## **Trigonometric Functions**
<br>

|Symbol    |Description |LaTeX Notation |
|:--------:|:-----------|:--------------|
|$\sin(x)$ |Sine        |\sin(x)        |
|$\cos(x)$ |Cosine      |\cos(x)        |
|$\tan(x)$ |Tangent     |\tan(x)        |
|$\cot(x)$ |Cotengent   |\cot(x)        |

<br>
<br>
<br>
<br>

## **Others**

|Symbol                      |Description |LaTeX Notation      |
|:--------------------------:|:-----------|:-------------------|
|$\int_0^\infty$             |Integeral   |\int_0^\infty       |
|$\sum_{i=0}^n$              |Sum         |\sum_{i=0}^n        |
|$\lim_{n \to \infty}$       |Limes       |\lim_{n \to \infty} |
|$\frac{x}{y}$               |Fraction    |\frac{x}{y}         |
|$\sqrt{x}$                  |Square Root |\sqrt{x}            |
|$\tilde{a}$                 |Tilde       |\tilde{a}           |
|$\widetilde{a}$             |Wide Tilde  |\widetilde{a}       |
|$\hat{a}$                   |Hat         |\hat{a}             |
|$\vec{a}$                   |Vecor       |\vec{a}             |
|$\dot{a}$                   |Dot         |\dot{a}             |
|$\dotsc$                    |Three dots  |\dotsc              |
|$\overline{a}$              |Overline    |\overline{a}        |
|$\left(a + b\right)$        |Brackets    |\left(a + b\right)        |
|$\square$                   |End of proof    |\square |
|$\rightarrow$               |Simple right arrow |\rightarrow |
|$\mapsto$                   |Mapping arrow      |\mapsto    |

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
