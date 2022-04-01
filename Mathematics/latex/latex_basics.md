# **LaTeX**

[Find command for symbol](https://detexify.kirelabs.org/classify.html)

<br>
<br>
<br>

## **Output Files**
<br>

|Extension|File Content    |
|:--------|:---------------|
|.log     |Logging         |
|.aux     |Cross-References|
|.toc     |Table of content|
|.lof     |List of figures |
|.lot     |List of tables  |
|.idx     |Index page      |

<br>
<br>
<br>

## **Basic File Structure**

```latex
\documentclass{article}
    % document settings
\begin{document}
    % content
\end{document}
```

<br>
<br>
<br>

## **Basic Command Syntax**

```latex
\commandname[option1,option2]{argument}
```

<br>
<br>
<br>

## **Defining Custom Commands**

```latex
\newcommand{\commandname}{ command definition}
```

<br>
<br>
<br>

## **Title**

```latex
\documentclass{article}
\title{Title}
\author{Author}
\date{Date}
\begin{document}
    \maketitle

    % content

\end{document}
```

<br>
<br>
<br>

## **Chapters and Sections**

```latex
\part{title}

\chapter{title}         % only for documentclass book and report

\section{title}
\subsection{title}
\subsubsection{title}
```

<br>
<br>
<br>

## **Reference to Chapters or Pages**

```latex
\section{title}
\label{refName}
...

In this sentence we will refer to the section \ref{refName} on page \pageref{refName}.
```

* \ref{refName} refers to the section number
* \pageref{refName} refers to the page number
* **Latex needs to run over the document twice to build the reference!**

<br>
<br>
<br>

## **Table of Contents**

```latex
\tableofcontents

\section{section 1}
...

\section{section 2}
...
```

* **Latex needs to run over the document at least twice to build the correct table of contents!**

<br>
<br>
<br>

## **Text Formatting**

<br>

### **Font Family**
|Option  |Description                       |
|:-------|:---------------------------------|
|\textrm |roman font                        |
|\textsf |sans serif                        |
|\texttt |typewriter (font not proportional)|

<br>

### **Font Weight**
|Option |Description  |
|:------|:------------|
|\textbf|bold         |
|\textmd|medium weight|

<br>

### **Font Shapes**
|Option |Description|
|:------|:----------|
|\textup|upright    |
|\textit|italic     |
|\textsl|slanted    |
|\textsc|small caps |
|\emph  |emphasize  |

<br>

### **Centering**

```latex
\begin{center}
    Text
\end{center}
```

<br>

### **Manual Hyphenation**

```latex
Man\-ual Hy\-phen\-ation
```

<br>

### **Nonbreaking Whitespace**

```latex
Rio~de~Janeiro
```

<br>

### **Manual Linebreak**

```latex
Line 1 \\
Line 2 \\[0.7cm]  % optional distance in cm or pt
```

<br>
<br>
<br>

## **Lists**

```latex
% bullet points
\begin{itemize}
    \item
        % content
    \item
        % content
\end{itemize}


% Numbers
\begin{enumerate}
    \item
        % content
    \item
        % content
\end{enumerate}
```

<br>
<br>
<br>

## **Special Characters**

|Characters|Encoding |
|:--------:|:--------|
|{         |\\{      |
|}         |\\}      |
|#         |\\#      |
|&         |\\&      |
|_         |\\_      |
|%         |\\%      |
|$         |\\$      |
|\         |\verb=\\=|
|^         |\verb=^= |
|~         |\verb=~  |

<br>
<br>
<br>

## **Enabling German Language Features**

```latex
\documentclass{article}
	\usepackage[utf8]{inputenc}
	\usepackage[T1]{fontenc}
	\usepackage{lmodern}
	\usepackage[ngerman]{babel}
\begin{document}
	% content
\end{document}
```
Requires installation of texlive-lang-german.

<br>
<br>
<br>

## **Math Mode**

<br>

### **Enabling Additional Features**

```latex
\usepackage{amsmath}
\usepackage{amsthm}
```

<br>

### **Formula**

```latex
% inline formula
$ ... $


% formula area
\[ ... \]
```

<br>

### **Text in Math Mode**

```latex
\[
x = a * b \text{Text}
\]
```

<br>

### **Operators**

|Operator                 |Description                     |
|:------------------------|:-------------------------------|
|x^2                      |potency                         |
|x^{2 + i}                |potency                         |
|x_2                      |subscript                       |
|x_{2 + i}                |subscript                       |
|\int_0^infty             |integral                        |
|\sum_{i=0}^n             |sum with index 0 to n           |
|\lim_{n \to \infty}      |limes                           |
|\frac{dividend}{divisor} |fraction                        |
|\sin(x)                  |sinus                           |
|\cos(x)                  |cosinus                         |
|\sqrt{x}                 |quare root                      |
|\tile{a}                 |tilde over a                    |
|\hat{a}                  |hat over a                      |
|\vec{a}                  |vector over a                   |
|\dot{a}                  |dot over a                      |
|\overline{x + y}         |line over a+y                   |
|\widetilde{x + y}        |tilde over a+y                  |
|\underbrace{x + y}_{text}|underbrace beneath x+y with text|

<br>

### **Theorem**

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