## CSS (**C**ascading **S**tyle **S**heets) Basics
<br>
<br>
<br>

## Character Encoding For External CSS File
<br>

externalFile.css  
```css
@charset "UTF-8";
@import url("url/other/css/file");

/* 
...
css rules 
...
*/

```

<br>
<br>
<br>


## Basic Syntax
<br>

```css
/* css rule */
<selector> {
    /* declarations */
    <property>:<value>;
    <property>:<value>;
}
```

<br>
<br>
<br>

## Simple Selector Types
<br>

```css
* { ... }
/* universal selector 
   (select all HTML elements) */


p { ... } 
/* element selector 
   (select all HTML elements with the same tag, e.g. <p>) */


h1, p, img { ... }
/* group selector
   (select multiple HTML elements, e.g. <h1>, <p>, <img>) */


.classname { ... }
/* class selector 
   (select all HTML elements with the same class attribute) */


p.classname { ... }
/* element class selector
   (select HTML elements of specific tag from all HTML elements with same class attribute) */


#idSelector { ... }
/* id selector
   (select HTML element with unique id) */
```

<br>
<br>
<br>

## Selector Combinators
<br>

```css
main p { ... }
/* descendant selector (space)
   (select all descendants of specified elements; here all <p> descendants of <main>) */


main > p { ... }
/* child selector
   (select all children of specified element; here all <p> children of <main>) */


div + p { ... }
/* adjacent sibling selector
   (select element directly after specified element with the same parent element; here <p> element directly after <div>) */


div ~ p { ... }
/* general sibling selector
   (select all siblings positioned after specified element; here all <p> elements after <div>) */
```

<br>
<br>
<br>

## Selector Attributes
<br>
Select elements based on their attributes and attribute values  

<br>

### Basic Syntax
```css
<element>[attribute] { ... }
[attribute] { ... }
```
<br>

```css
<element>[<attribute>]           /* select elements of type <element> with <attribute> */
<element>[<attribute>=<value>]   /* select elements of type <element> where <attribute> has value <value> */
<element>[<attribute>~=<value>]  /* select elements of type <element> where attribute has a comma separated list of values where one is equal to <value> */
<element>[<attribute>|=<value]   /* select elements of type <element> where <attribute> has value <value> or starts with <value> followed by -*/
<element>[<attribute>^=<value>]  /* select elements of type <element> where <attribute> is prefixed by <value> */
<element>[<attribute>$=<value>]  /* select elements of type <element> where <attribute> is suffixed by <value> */
<element>[<attribute>*=<value>]  /* select elements of type <element> where <value> occurs at least once in <attribute> */
```

<br>
<br>
<br>

## Sources For CSS Rules
<br>

* Inline CSS
  * attach declaration to attribute style of an element  
* Internal CSS 
  * add rules to \<style> block within the \<head> of a document 
* External CSS (preferred)
  * add reference to an external css file 

<br>

```html
<!DOCTYPE html>
<html>

    <head>
        <!-- Internal CSS -->
        <style>
            body {
                background-color: red;
            }

            header {
                margin: 5px;
            }
        </style>

        <!-- External CSS -->
        <link rel="stylesheet" href="externalFile.css">
    </head>

    <body>
        <h1>Header</h1>
        <p id="paragraph1">First paragraph</p>

        <!-- Inline CSS -->
        <p style="color:green;size:10px">Second paragraph</p> 
    </body>

</html>
```

<br>

Priority of css rules (Cascading Order):  
1. Inline style
2. Internal style
3. External style
4. Default style (defined by the browser)

<br>
<br>
<br>

## CSS Colors
<br>

### RGB
```css
rgb(red, green, blue)
/* each parameter has to be in range [0, 255] */
```

### RGBA
```css
rgba(red, green, blue, alpha)
/* alpha parameter specifies opacity and has to be in range [0.0, 1.0] */
```

### HEX
```css
#rrggbb
/* rr (red), gg (green) and bb (blue) have to be in hex range [00 - ff] */
```

### HSL
```css
hsl(hue, saturation, lightness)
/* hue has to be in range [0, 360] (color wheel)
   saturation  and lightness have to be in range[0%, 100%] */
```

### HSLA
```css
hsl(hue, saturation, lightness, alpha)
/* alpha parameter specifies opacity and has to in range [0.0, 1.0] */
```

<br>
<br>
<br>

## Background Properties
<br>

|Property             |Description                                      |
|:--------------------|:------------------------------------------------|
|background-color     |                                                 |
|background-image     |default: repeat image horizontally and vertically|
|background-repeat    |options see below                                |
|background-attachment|should the image scroll or remain fixed          |
|background-position  |                                                 |
|background           |shorthand (order like in table)                  |

<br>

background-image:  
|Option   |Description             |
|:--------|:-----------------------|
|no-repeat|                        |
|repeat-x |repeat only horizontally|
|repeat-y |repeat only vertically  |

<br>

background-attachment:  
|Option   |Description             |
|:--------|:-----------------------|
|scroll   |                        |
|fixed    |                        |

<br>
<br>
<br>

## Border Properties
<br>

|Property             |Description                                      |
|:--------------------|:------------------------------------------------|
|border-style         |if more than one value: top, right, down, left   |
|border-width         |if more than one value: top, right, down, left   |
|border-color         |                                                 |
|border-radius        |add rounded borders                              |

<br>

border-style:  
|Option   |Description             |
|:--------|:-----------------------|
|dotted   |                        |
|dashed   |                        |
|solid    |                        |
|double   |                        |
|groove   |3D                      |
|ridge    |3D                      |
|inset    |3D                      |
|outset   |3D                      |
|none     |no border               |
|hidden   |                        |

<br>
<br>
<br>

## Box Model
<br>

### Default Box Model 

```css
display: block;
```
![Image not available](./cssBoxModel.png)

Width and height only apply to the content area.  
Actual Width = border-left + padding-left + width + padding-right + border-right  
Actual Height = border-top + padding-top + height + padding-bottom + border-bottom

<br>

### Border Box

```css
*, *::before, *::after {
   box-sizing: border-box;
}
```

Width and height include padding and border.

<br>
<br>
<br>

## Flex Box Layout
<br>
Flex container aligns its flex items in a row or column. Flex items share the same height.
<br>

```css
<containerElement> {
   display: flex;
   flex-direction: <row | column>;
   flex-flow: <row | row-reverse | column | column-reverse>;   /* optional: specify direction of flex container */
   flex-wrap: <nowrap | wrap>;                                 /* optional: disable or enable line break within flex container */
   flex: 1;                                                    /* optional: distributes container space evenly to all flex items */

   justify-content: <flex-start>                               /* start from container start */
                    <flex-end>                                 /* start from container end */
                    <center>                                   /* place in center without space between flex items */
                    <space-between>                            /* distribute container space evenly between flex items (not between container border) */
                    <space-around>                             /* distribute container space around flex items (also between container border) */
                    <space-evenly>                             /* distribute container space evenly around flex items (also between container border) */
}
```

<br>
<br>
<br>

## CSS Grid Layout
<br>

```css
<containerElement> {
   display: grid;

   grid-template-columns: <WidthCol1>fr <WidthCol2>fr ... <WidthColN>fr;      /* set column count and width */
   grid-template-columns: repeat(auto-fit, <ColumnLength>);                   /* divide container lenght between as much columns of <columnLength> as possible */

   grid-column-gap: <number>px;
   grid-row-gap: <number>px;
}

<gridElement> {
   grid-column: <vericalLineNumber>;
   grid-column: <verticalLineNumber> / span <optionalVerticalEndLineNumber>;
}
```

<br>
<br>
<br>

## Text Properties
<br>

|Property                 |Description                                   |
|:------------------------|:---------------------------------------------|
|color                    |                                              |
|text-align               |horizontal align                              |
|text-align-last          |applies to last line                          |
|direction                |reading order (ltr or rtl)                    |
|vertical-align           |vertical alignment in inline boxes            |
|text-decoration-line     |add line to text                              |
|text-decoration-color    |specify color of added line                   |
|text-decoration-style    |specify style of added line (see border)      |
|text-decoration-thickness|                                              |
|text-decoration          |shorthand: line, [color], [style], [thickness]|
|text-transform           |                                              |
|text-indent              |specify indentation of first line             |
|letter-spacing           |specify space between characters of a text    |
|line-height              |specify space between lines                   |
|word-spacing             |specify space between words                   |
|white-space              |specify handling of white-space               |
|text-shadow              |


<br>

### text-align:  
|Option     |Description|
|:----------|:----------|
|center     |    text   |
|left       |text       |
|right      |       text|
|justify    |    text   |

<br>

### vertical-align:  
|Option      |
|:-----------|
|baseline    |
|text-top    |
|text-bottom |
|sub         |
|super       |

<br>

### text-decoration-line:  
|Option      |
|:-----------|
|overline    |
|line-through|
|underline   |

<br>

### text-transform:
|Option        |Example     |
|:-------------|:-----------|
|uppercase     |EXAMPLE TEXT|
|lowercase     |example text|
|capitalize    |Example Test|

<br>
<br>
<br>

## Links
<br>

```css
/* Link States (order is important!) */

a:link { ... } /* unvisited */
a:visited { ... }
a:hover { ... }
a:active { ... } /* moment link is clicked */
```

<br>
<br>
<br>

## Pseudo-classes
<br>

Pseudo-classes style elements based on their state.

<br>

### Basic Syntax
```css
<selector>:<pseudo-class> {
   property: value;
   property: value;
}
```

### Examples
```css
/* Link States (order is important!) */

a:link { ... } /* unvisited */
a:visited { ... }
a:hover { ... }
a:active { ... } /* moment link is clicked */
a:focus { ... }


/* User Action */
<element>:hover { ... }    /* mouseover */
<element>:active { ... }   /* element is activated, i.e. clicked on */
<element>:focus { ... }


/* Linguistic */
<element>:dir(<rlt | ltr>) { ... } /* semantic value of directionality */
<element>:lang(<language>) { ... } 


/* Input */
<input>:autofill { ... }           /* input has been autofilled */
<input>:enabled { ... }
<input>:disabled { ... }
<input>:read-only { ... }
<input>:read-write { ... }
<input>:default { ... }
<input>:checked { ... }
<input>:blank { ... }
<input>:valid { ... }
<input>:invalid { ... }
<input>:in-range { ... }
<input>:out-of-range { ... }
<input>:required { ... }


/* Tree-structural */
:root { ... }
<element>:empty { ... }                            /* element with no children */
<element>:nth-child(< x | An+B >)                  /* elements based on position in group of siblings */
<element>:nth-last-child(< x | An+B >)             /* elements based on position in group of siblings, counting backwards */
<element>:first-child { ... }
<element>:last-child { ... }
<element>:only-child { ... }                       /* element which is only child */
<element>:nth-of-type(< x | An+B >) { ... }        /* elements based on position among siblings of the same tag names */
<element>:nth-last-of-type(< x | An+B>) { ... }    /* elements based on position among siblings of the same tag names, counting backwards */
<element>:first-of-type
<element>:last-of-type
<element>:only-of-type
```

<br>
<br>
<br>

## Pseudo-elements
<br>

Pseudo-elements style specific parts of the element.

<br>

### Basic Syntax
```css
<element>::<pseudo-element> {
   property: value;
   property: value;
}
```

### Examples
```css
<element>::after { content: "content"; ... }      /* creates pseudo-element as last child of selected element */
<element>::before { content: "content"; ... }     /* creates pseudo-element as first child of selected element */

<element>::first-letter { ... }                   /* applies to first letter of first line of block-level element when not preceded by other content */
<element>::first-line { ... }                     /* applies to first line of block-level element */
input[type=file]::file-selector-button { ... }    /* applies to button of input type file */

<element>::selection { ... }                      /* applies styles to the part highlighted by the user */
li::marker { ... }                                /* applies styles to marker box of a list item */

```

<br>
<br>
<br>

## Lists
<br>

|Property           |Description                                                        |
|:------------------|:------------------------------------------------------------------|
|list-style-type    |specify type of list item marker                                   |
|list-style-position|specify whether the item markers are 'inside' or 'outside' the list|
|list-style-image   |specify image as list item marker                                  |
|list-style         |shorthand (order like in table)                                    |

<br>

list-style-type:  
|Option     |Description            |
|:----------|:----------------------|
|none       |                       |
|disc       |filled circle (default)|
|circle     |hollow circle          |
|square     |filled square          |
|decimal    |decimals beginning at 1|
|lower-roman|                       |
|upper-roman|                       |
|lower-alpha|                       |
|upper-alpha|                       |

<br>
<br>
<br>

## Table
<br>

|Property       |Description                                          |
|:--------------|:----------------------------------------------------|
|border-collapse|specify whether cells have shared or separate borders|
|width          |                                                     |
|height         |                                                     |

<br>

border-collapse:  
|Option   |Description                |
|:--------|:--------------------------|
|collapse |cells have shared borders  |
|separate |cells have distinct borders|

<br>
<br>
<br>

## Size
<br>

|Property     |Description
|:------------|:---------------------------------|
|width        |                                  |
|height       |                                  |
|max-width    |                                  |
|min-width    |                                  |
|margin: auto |centers the element horizontally  |


<br>
<br>
<br>

## Units
<br>

### Absolute Units
|Unit|Description                        |
|:---|:----------------------------------|
|cm  |                                   |
|mm  |                                   |
|in  |inch                               |
|px  |pixel (relative to viewing device) |
|pt  |point                              |

<br>

### Relative Units
|Unit|Description                                                   |
|:---|:-------------------------------------------------------------|
|em  |relative to font size of element (3em = 3 x element font size)|
|rem |relative to font size of root element                         |
|vw  |relative to 1% to width of viewport                           |
|vh  |relative to 1% to height of viewport                          |
|%   |relative to parent element                                    |

<br>
<br>
<br>

## Positioning
<br>

```css
position: static        /* default, positioned according to the flow */
position: relative      /* positioned according to the flow plus offset to itself */
position: absolute      /* element is removed from the flow and positioned relative to the closest ancestor */

position: -webkit-sticky
position: sticky        /* acts like relative until offset position is reached, then positioned based on the scroll position */


/* element float relative to its container */
float: left
float: right            
float: none
```

<br>
<br>
<br>

## Overflow
<br>

```css
overflow: visible    /* content may be rendered outside of the padding box */
overflow: hidden     /* no scrollbars */
overflow: scroll     /* always display scrollbars */
overflow: auto       /* display scrollbars if necessary */
```

<br>
<br>
<br>

## Opacity
<br>

```css
opacity: [0.0, 1.0];
```

<br>
<br>
<br>

## Variables / Custom Properties
<br>

Global variable
```css
:root {
   --<name>: <value>;            /* Declaration */
}

<element> {
   <property>: var(--<name>);    /* Accessing variable value */
}
```
<br>

Local variable
```css
<element> {
   --<name>: <value>;            /* Declaration */
}
```
<br>

Access global CSS variables with JavaScript
```javascript
function getCSSVariable() {
   let rootElement = document.querySelection(':root');
   let style = window.getComputedStyle(rootElement);
   return style.getPropertyValue('--variableName');
}

function setCSSVariable(newValue) {
   let rootElement = document.querySelection(':root');
   let style = window.getComputedStyle(rootElement);
   style.setProperty('--variableName', newValue);
}
```

<br>
<br>
<br>

## Counters
<br>
CSS variables incremented or decremented by CSS rules to track the number of usages.

```css
counter-reset: <counterName> [<initialValue>]               /* initialize a css counter <counterName> with <initialValue> (default 0) */
counter-increment: <counterName> [<incrementValue>]         /* increment <counterName> by <initialValue> (default 0) */
counter(<counterName>)                                      /* returns value of counter <counterName> as string */
counters(<counterName>, <separatorString>, <counterStyle>)  /* return concatenated string of values of <counterName> (nested counters) */
```

Example:  
```css
body {
  counter-reset: section;
}

h2::before {
  counter-increment: section;
  content: "Section " counter(section) ": ";
}
```

<br>
<br>
<br>

## Math Functions
<br>

```css
calc(<expression>)               /* calculates expression to use as property value */
min(<value_1>, ..., <value_n>)
max(<value_1>, ..., <value_n>)
```

## Google Fonts
<br>

Convenient way of getting fonts without downloading or installing.

1. choose font at [fonts.google.com](www.fonts.google.com)
2. copy embedding information:
   1. <link> for embedding information in <link> element in <head>
   2. @IMPORT for embedding information in css file.

<br>
<br>
<br>

## Media Queries
<br>

|Media types|
|:----------|
|screen     |
|print      |

<br>

|Media property|Description                                                               |
|:-------------|:-------------------------------------------------------------------------|
|width         |viewport width including scroll bars (commonly used: min-width, max-width)|
|height        |viewport height (commonly used: min-height, max-heigth)                   |
|orientation   |values: landscape, portrait)                                              |
|resolution    |                                                                          |

<br>

### Syntax
```css
@media <type> and (<property>: value) {
   /* css rules */
}
```

<br>

### Examples
```css
@media screen and (min-width: 600px) {
   /* css rules */
}

@media screen and (min-width: 300px) and (max-width: 500px) {
   /* css rules */
}
```