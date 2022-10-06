# **Mermaid Flowchart**
<br>

## **Table Of Contents**
<br>

- [**Mermaid Flowchart**](#mermaid-flowchart)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Comments**](#comments)
  - [**Nodes**](#nodes)
    - [**General**](#general-1)
    - [**Shapes**](#shapes)
    - [**Style**](#style)
      - [**Single Node**](#single-node)
      - [**Style Class**](#style-class)
    - [**Tooltips**](#tooltips)
  - [**Edges**](#edges)
    - [**General**](#general-2)
    - [**Shapes**](#shapes-1)
    - [**Style**](#style-1)
  - [**Subgraphs**](#subgraphs)
  - [**Escape Special Syntax Characters**](#escape-special-syntax-characters)

<br>
<br>
<br>

## **General**
<br>

A flowchart consists of of _nodes_ and _edges_ between the nodes.

<br>

```mermaid
flowchart LR
    node1-- edge1 ---node2-- edge2 ---node3
```

<br>
<br>
<br>

## **Comments**
<br>

```
flowchart LR
    %% This is a comment
    node1 --> node2
```

<br>
<br>
<br>

## **Nodes**
<br>
<br>

### **General**
<br>

```
flowchart LR
    nodeId --> id2[Text]
```

```mermaid
flowchart LR
    nodeId --> id2[Text]
```

<br>
<br>

### **Shapes**
<br>

```mermaid
flowchart LR
    x["id[Text]"] --- a("id(Text)") --- b(["id([Text])"]) --- c[["id[[Text]]"]] --- d[("id[(Text)]")]
    e(("id((Text))")) --- f((("id(((Text)))"))) --- g>"id>Text]"] --- h{"id{Text}"} --- i{{"id{{Text}}"}}
    j[\"id[\Text\]"\] --- k[/"id[/Text/]"/] --- l[/"id[/Text\]"\] --- m[\"id[\Text/]"/]
```

<br>
<br>

### **Style**
<br>
<br>

#### **Single Node**
<br>

```
flowchart LR
    A[Node1] --> B[Node2]
    style B fill:green,stroke:red,stroke-width:2px,stroke-dasharray: 4 4;
```

<br>

```mermaid
flowchart LR
    A[Node1] --> B[Node2]
    style B fill:green,stroke:red,stroke-width:2px,stroke-dasharray: 4 4;
```

<br>
<br>

#### **Style Class**
<br>

* Style class can be defined inside the diagram definition or can reference an existing css class

```
flowchart LR
    A[Node1] --> B[Node2] --> C[Node3]
    classDef myStyleClass fill:green,stroke:red,stroke-width:2px,stroke-dasharray: 4 4;
    class A,C myStyleClass;
```

<br>

Shorthand:

```
flowchart LR
    A[Node1]:::myStyleClass --> B[Node2] --> C[Node3]:::myStyleClass
    classDef myStyleClass fill:green,stroke:red,stroke-width:2px,stroke-dasharray: 4 4;
```

<br>


```mermaid
flowchart LR
    A[Node1]:::myStyleClass --> B[Node2] --> C[Node3]:::myStyleClass
    classDef myStyleClass fill:green,stroke:red,stroke-width:2px,stroke-dasharray: 4 4;
```

<br>
<br>

### **Tooltips**
<br>

* requires _securityLevel='loose'_

<br>

```html
<script>
    var callback = function() {
        /* implementation */
    }
</script>
```

<br>

```
flowchart LR
    A --> B --> C
    click A callback "Tooltip A"
    click B "https://www.github.com" "Tooltip B For Link" _blank
```

<br>

|Link Targets |Description
|:------------|:--------------
|_self        |open link in current tab
|_blank       |open link in new tab

<br>

```mermaid
flowchart LR
    A --> B --> C
    click A callback "Tooltip A"
    click B "https://www.github.com" "Tooltip B For Link"
    click C "https://www.github.com" "Tooltip B For Link" _blank
```

<br>
<br>
<br>

## **Edges**
<br>
<br>

### **General**
<br>

```
flowchart LR
    id1[Node1] --> id2[Node2]
```

```mermaid
flowchart LR
    a[Node1] --> b[Node2]
```

<br>
<br>

### **Shapes**
<br>

```mermaid
flowchart LR
    1[A] -- "A -- B" --- 2[B] -- "B -- Text --- C" --- 3[C]
    4[A] -- "A --> B" --> 5[B] -- "B -- Text --> C" --> 6[C]
    7[A] <-- "A <--> B" --> 8[B] <-- "B <-- Text --> C" --> 9[C]
    10[A] -. "A -.-> B" .-> 11[B] -. "B -. Text .-> C" .-> 12[C]
    13[A] <-. "A <-.-> B" .-> 14[B] <-. "B <-. Text .-> C" .-> 15[C]
    16[A] == "A ==> B" ==> 17[B] == "B == Text ==> C" ==> 18[C]
    19[A] <== "A <==> B" ==> 20[B] <== "B <== Text ==> C" ==> 21[C]
    22[A] -- "A --o B" --o 23[B] -- "B -- Text --o C" --o 24[C]
    25[A] o-- "A o--o B" --o 26[B] o-- "B o-- Text --o C" --o 27[C]
    28[C] -- "A --x B" --x 29[B] -- "B -- Text --x C" --x 30[C]
    31[A] x-- "A x--x B" --x 32[B] x-- "B x-- Text --x C" --x 33[C]
```

<br>
<br>

### **Style**
<br>

```
flowchart LR
    A --> B --> C
    linkStyle 1 stroke:black,stroke-width:6px,color:black;
```

<br>

```mermaid
flowchart LR
    A --> B --> C
    linkStyle 1 stroke:black,stroke-width:6px,color:black;
```

<br>
<br>
<br>

## **Subgraphs**
<br>
<br>

```
flowchart TB
    node2 --> node5
    
    subgraph sub1[subgraph1]
        node1 --> node2
        node2 --> node3
    end

    subgraph sub2
        direction BT
        node4 --> node5
    end

    subgraph sub3
        node6 --> node7
    end
    sub2 --> sub3
    node8 --> sub2
```

<br>

```mermaid
flowchart TB
    node2 --> node5
    
    subgraph sub1[subgraph1]
        node1 --> node2
        node2 --> node3
    end

    subgraph sub2
        direction BT
        node4 --> node5
    end

    subgraph sub3
        node6 --> node7
    end
    sub2 --> sub3
    node8 --> sub2
```

<br>
<br>
<br>

## **Escape Special Syntax Characters**
<br>
<br>

```
flowchart LR
    a("Text with special syntax characters")
```