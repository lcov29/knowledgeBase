# **Compiler Basics**
<br>

## **Table Of Contents**
<br>

- [**Compiler Basics**](#compiler-basics)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)

<br>
<br>
<br>

## **General**
<br>

```mermaid
flowchart LR
    a[Source File] -- Compiler --> b[Abstract Syntax Tree]
    b -- Compiler --> c[Byte Code]
    c --> d[Execute Via Runtime]
```