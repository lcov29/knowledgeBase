# **JavaScript Document Object Model**

<br>

## **Table Of Contents**
<br>

- [**JavaScript Document Object Model**](#javascript-document-object-model)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Types Of DOM-Tree Nodes**](#types-of-dom-tree-nodes)
    - [**Document Node**](#document-node)
    - [**Element Node**](#element-node)
    - [**Attribute Node**](#attribute-node)
    - [**Text Node**](#text-node)
  - [**Selecting Elements**](#selecting-elements)
    - [**getElementById()**](#getelementbyid)
    - [**getElementsByClassName()**](#getelementsbyclassname)
    - [**getElementsByTagName()**](#getelementsbytagname)
    - [**getElementsByName()**](#getelementsbyname)
    - [**querySelector()**](#queryselector)
  - [**CSS Selectors**](#css-selectors)

<br>
<br>
<br>
<br>

## **General**
<br>

Document Object Model (DOM) contains the components of a website in a hierarchic DOM-tree.

<br>
<br>
<br>
<br>

## **Types Of DOM-Tree Nodes**
<br>
<br>

### **Document Node**
<br>

* represents the root of the DOM-tree
* properties can be accessed by the global _document_ object

<br>

```javascript
document.title                          
document.lastModified
document.URL
document.domain
document.cookie                 // list of all cookies
document.forms                  // list of all forms
document.images                 // list of all images
document.links                  // list of all links
```

<br>
<br>

### **Element Node**

Represents elements of DOM-tree like \<table>,  \<h1>  etc.

<br>
<br>

### **Attribute Node**

Represents attributes of element nodes like _id_, _lang_ etc.

<br>
<br>

### **Text Node**

Represents text inside of element nodes. Can not have child nodes.

<br>
<br>
<br>
<br>

## **Selecting Elements**
<br>
<br>

```javascript
querySelectorAll()          // returns list of all elements with specified css selector (static nodelist)
parentElement()             // returns parent element for specified node
parentNode()                // returns parent node for specified node
previousElementSibling()    // returns previous sibling element for specified node
previousSibling()           // returns previous sibling node for specified node
nextElementSibling()        // returns next sibling element for specified node
nextSibling()               // returns next sibling node for specified node
firstElementChild()         // returns first child element for specified node
firstChild()                // returns first child node for specified node
lastElementChild()          // returns last child element for specified node
lastChild()                 // returns last child nodefor specified node
childNodes()                // returns list of child nodes for specified node
children()                  // returns list of child elements for specified node


// Temp:
// active nodelist: changes to nodes effect the document immediately
// static nodelist: changes to nodes effect the document not immediately
```

### **getElementById()**
<br>

* returns element with specified id
* returns null if no element with specified id exists

```javascript
document.getElementById('idName')
```

<br>
<br>
<br>

### **getElementsByClassName()**
<br>

* returns active node-list of elements with specified class name
* node-list is array-like
* node-list is active, so changes to noded effect the document immediately

```javascript
document.getElementsByClassName('className')
```

<br>
<br>
<br>

### **getElementsByTagName()**
<br>

* returns active node-list of elements with specified tag name
  * tag name without brackets!
* node-list is array-like
* node-list is active, so changes to noded effect the document immediately 

```javascript
document.getElementsByTagName('tagNameWithoutBracket')
```

<br>
<br>
<br>

### **getElementsByName()**
<br>

* returns active node-list of elements with specified name
* node-list is array-like
* node-list is active, so changes to noded effect the document immediately 

```javascript
document.getElementsByName('name')
```

<br>
<br>
<br>

### **querySelector()**
<br>

* returns first element with specified css selector
* returns null if no element with specified id exists

```javascript
document.querySelector('cssSelector')
```

<br>
<br>

## **CSS Selectors**
<br>

|Selector                               |Selector Name |Description
|:--------------------------------------|:-------------|:---
|*                                      |universal     |matches every element
|_elementName_                          |type          |matches all nodes with specified _elementName_
|._className_                           |class         |matches all nodes with specified _className_
|#_idName_                              |id            |matches nodes with specified _idName_
|\[_attributeName_]                     |attribute     |matches all nodes with specified _attributeName_
|\[_attributeName_="_attributeValue_"]  |attribute     |matches all nodes with specified _attributeName_ that have the specified _attributeValue_
|\[_attributeName_]~="_attributeValue_"]|attribute     |matches all nodes with specified _attributeName_ whose attribute value list contains _attributeValue_
|\[_attributeName_^="_prefix_"]         |attribute     |matches all nodes with specified _attributeName_ whose value is prefixed by _prefix_
|\[_attributeName_$="_suffix_"]         |attribute     |matches all nodes with specified _attributeName_ whose value is suffixed by _suffix_
|\[_attributeName_*="_substring_"]      |attribute     |matches all nodes with specified _attributeName_ whose value contains _substring_
|\[_attributeName_\|="_attributeValue_"]|attribute    |matches all nodes with specified _attributeName_ whose value is exactly _attributeValue_ or begins with _attributeValue_ followed by a hyphen (_attributeValue_-Text)
|:root                                  |pseudo class |matches root node of document
|:nth-child(_n_)                        |pseudo class |matches n-th child element of element
|:nth-last-child(_n_)                   |pseudo class |matches n-th child element of element starting from behind
|:nth-of-type(_n_)                      |pseudo class |matches n-th sibling element of same type
|:nth-last-of-type(_n_)                 |pseudo class |matches n-th sibling element from behind of same type
|:first-child                           |pseudo class |matches first child element of an element
|:last-child                            |pseudo class |matches last child element of an element
|:first-of-type                         |pseudo class |matches first sibling element of same type