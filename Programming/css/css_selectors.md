# **CSS Selectors**
<br>

## **Table Of Contents**
<br>

- [**CSS Selectors**](#css-selectors)
  - [**Table Of Contents**](#table-of-contents)
  - [**Simple Selector Types**](#simple-selector-types)
    - [**Universal Selector**](#universal-selector)
    - [**Type Selector**](#type-selector)
    - [**Class Selector**](#class-selector)
    - [**ID Selector**](#id-selector)
  - [**Grouping Selector**](#grouping-selector)
  - [**Attribute Selectors**](#attribute-selectors)
  - [**Selector Combinators**](#selector-combinators)
    - [**Descendant Combinator**](#descendant-combinator)
    - [**Child Combinator**](#child-combinator)
    - [**General Sibling Combinator**](#general-sibling-combinator)
    - [**Adjacent Sibling Combinator**](#adjacent-sibling-combinator)
  - [**Pseudo Classes**](#pseudo-classes)
    - [**Basic Syntax**](#basic-syntax)
    - [**Negation**](#negation)
    - [**Tree-Structural Pseudo Classes**](#tree-structural-pseudo-classes)
      - [**An+B Notation**](#anb-notation)
    - [**Linguistic Pseudo Classes**](#linguistic-pseudo-classes)
    - [**User Action Pseudo Classes**](#user-action-pseudo-classes)
    - [**Input Pseudo Classes**](#input-pseudo-classes)
    - [**Link States Pseudo Classes**](#link-states-pseudo-classes)
  - [**Pseudo Elements**](#pseudo-elements)
    - [**Basic Syntax**](#basic-syntax-1)
    - [**Elements**](#elements)

<br>
<br>
<br>

## **Simple Selector Types**
<br>
<br>
<br>

### **Universal Selector**
<br>

```css
* { ... }                   /* select all HTML elements */
```

<br>
<br>
<br>

### **Type Selector**
<br>

```css
nodeTypeName { ... }        /* select all nodes of the specified type nodeTypeName */

p { ... }                   /* select all <p> nodes */
```

<br>
<br>
<br>

### **Class Selector**
<br>

```css
.className { ... }                  /* select all nodes of the specified className */

p.className { ... }                 /* select all <p> nodes with className */

p.className1.className2 { ... }     /* select all <p> nodes with both className1 and className2 */
```

<br>
<br>
<br>

### **ID Selector**
<br>

```css
#idName { ... }                         /* select node with unique idName */
```

<br>
<br>
<br>
<br>

## **Grouping Selector**
<br>

* apply rule to a comma separated selector list
* beware: one invalid selector invalidates the rule for all other selectors!

<br>

```css
element1, element2, element3 { ... }        /* select all listed HTML elements */

#idName, .className, element { ... }        /* list of different selector types */
```

<br>
<br>
<br>
<br>

## **Attribute Selectors**
<br>

Basic Syntax  

```css
[attributeExpression] { ... }

element[attributeExpression] { ... }
```

<br>
<br>

```css
[attributeName]                             /* select all nodes with specified attributeName */


[attributeName="attributeValue"]            /* select all nodes with specified attributeName that have the specified attributeValue */


[attributeName~="attributeValue"]           /* select all nodes with specified attributeName whose attribute value list contains attributeValue */


[attributeName^="prefix"]                   /* select all nodes with specified attributeName whose value is prefixed by prefix */


[attributeName$="suffix"]                   /* select all nodes with specified attributeName whose value is suffixed by suffix */


[attributeName*="substring"]                /* select all nodes with specified attributeName whose value contains substring */


[attributeName|="attributeValue"]           /* select all nodes with specified attributeName whose value is exactly attributeValue or begins with attributeValue followed by a hyphen */
```

<br>
<br>
<br>
<br>

## **Selector Combinators**
<br>
<br>
<br>

### **Descendant Combinator**
<br>

```css
selector1 selector2 { ... }                 /* select all nodes matching selector2 that are descendants of nodes matching selector1 */


main p { ... }                              /* select all <p> elements that are descendants of <main> */
```

<br>
<br>
<br>

### **Child Combinator**
<br>

```css
selector1 > selector2 { ... }               /* select all nodes matching selector2 that are DIRECT children of nodes matching selector1 */


main > p { ... }                            /* select all <p> elements that are DIRECT children of <main> */
```

<br>
<br>
<br>

### **General Sibling Combinator**
<br>

```css
selector1 ~ selector2 { ... }               /* select all nodes matching selector2 that are placed after nodes matching selector1 and are children of the same parent node */


div ~ p { ... }                             /* select all <p> elements after <div> element under a same parent element */
```

<br>
<br>
<br>

### **Adjacent Sibling Combinator**
<br>

```css
selector1 + selector2 { ... }               /* select all nodes matching selector2 that is DIRECTLY placed after nodes matching selector1 and are children of the same parent node */


div + p { ... }                             /* select all <p> elements DIRECTLY after <div> element under a same parent element */
```

<br>
<br>
<br>
<br>

## **Pseudo Classes**
<br>

Pseudo-classes style elements based on their state.

<br>
<br>
<br>

### **Basic Syntax**
<br>

```css
selector:pseudoClass { ... }
```

<br>
<br>
<br>

### **Negation**
<br>

```css
:not(selectorList)                              /* matches all elements that do not match the comma separated selectorList */
```

<br>
<br>
<br>

### **Tree-Structural Pseudo Classes**
<br>

Location of an element within document tree.

<br>

```css
:root { ... }                                   /* matches root node of document */

selector:empty { ... }                          /* matches nodes with no children (other nodes or text including whitespace) */

selector:nth-child(x or An+B)                   /* matches nodes based on position in group of siblings */

selector:nth-last-child(x or An+B)              /* matches nodes based on position in group of siblings, counting backwards */

selector:first-child { ... }

selector:last-child { ... }

selector:only-child { ... }                     /* matches node which is the only child of another node*/

selector:nth-of-type(x or An+B) { ... }         /* matches nodes based on position among siblings of the same tag names */

selector:nth-last-of-type(x or An+B) { ... }    /* matches nodes based on position among siblings of the same tag names, counting backwards */

selector:first-of-type                          /* matches nodes of selector type that are first within a group of siblings */

selector:last-of-type                           /* matches nodes of selector type that are last within a group of siblings */

selector:only-of-type                           /* matches nodes of selector type that have no siblings of the same type */
```

<br>
<br>

#### **An+B Notation**
<br>

* A: integer step size
* n: integer >= 0
* B: integer offset

<br>

|Example |Values            |
|:-------|:-----------------|
|2n+1    |1,  3,  5,  7, ...|
|2n      |0,  2,  4,  6, ...|
|5n      |0,  5, 10, 15, ...|
|n+7     |7,  8,  9, 10, ...|
|3n+4    |4,  7, 10, 13, ...|

<br>
<br>
<br>

### **Linguistic Pseudo Classes**
<br>

Selection of elements based on language or direction

<br>

```css
:dir([rtl | ltr]) { ... }               /* matches nodes based on direction of text (rtl = right-to-left; ltr = left-to_right) */

:lang(languageCode) { ... }             /* matches nodes based on the language */
```

<br>
<br>
<br>

### **User Action Pseudo Classes**
<br>

Selection of elements based on user interaction

<br>

```css
element:hover { ... }                   /* mouseover */

element:active { ... }                  /* element is activated, i.e. clicked on */

element:focus { ... }
```

<br>
<br>
<br>

### **Input Pseudo Classes**
<br>

Select input elements based on attributes

<br>

```css
input:autofill { ... }

input:enabled { ... }

input:disabled { ... }

input:read-only { ... }

input:read-write { ... }

input:default { ... }

input:checked { ... }

input:blank { ... }

input:valid { ... }

input:invalid { ... }

input:in-range { ... }

input:out-of-range { ... }

input:required { ... }
```

<br>
<br>
<br>

### **Link States Pseudo Classes**
<br>

```css
a:link { ... }              /* unvisited */

a:visited { ... }

a:hover { ... }

a:active { ... }            /* moment link is clicked */

a:focus { ... }
```

<br>
<br>
<br>
<br>

## **Pseudo Elements**
<br>
<br>
<br>

### **Basic Syntax**
<br>

```css
selector::pseudo-element { ... }
```

<br>
<br>
<br>

### **Elements**
<br>

```css
element::after { content: "content"; ... }          /* creates pseudo-element as last child of selected element */

element::before { content: "content"; ... }         /* creates pseudo-element as first child of selected element */

element::first-letter { ... }                       /* applies to first letter of first line of block-level element when not preceded by other content */

element::first-line { ... }                         /* applies to first line of block-level element */

input[type=file]::file-selector-button { ... }      /* applies to button of input type file */

element::selection { ... }                          /* applies styles to the part highlighted by the user */

li::marker { ... }                                  /* applies styles to marker box of a list item */
```