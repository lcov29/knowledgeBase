## HTML Basics
<br>
<br>

[Online HTML Validator](https://validator.w3.org)

<br>
<br>

## Basic HTML Structure
<br>

```html
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link rel="stylesheet" href="">
        <link rel="icon" type="image/png" href="">
        <title>title</title>
    </head>

    <body>
        <!-- content -->
        <link src="externalScript.js">
    </body>

</html>
```

<br>
<br>

## Content Area Types
<br>

```html
<body>
    <header>
        <!-- header area -->
    </header>

    <nav>
        <!-- navigation area -->
    </nav>

    <main>
        <!-- main content area -->
    </main>

    <section>
        <!-- content section -->
    </section>

    <article>
        <!-- independent, self-contained content -->
    </article>

    <aside>
        <!-- content only indirectly related to main content -->
    <aside>

    <details>
        <summary>Visible Text</summary>
        <!-- elements visible after toggling details -->
    </details>

    <address>
        <!-- contact information -->
    </address>

    <div>
        <!-- generic container for wrapping elements -->
    </div>

    <time datetime="<datetime-value>">
        <!-- time -->
    </time>

    <footer>
        <!-- footer area -->
    </footer>
</body>
```

<br>
<br>

## Headlines
<br>

```html
<h1>Header 1</h1>
<h2>Header 2</h2>
<h3>Header 3</h3>
<h4>Header 4</h4>
<h5>Header 5</h5>
<h6>Header 6</h6>
```

<br>
<br>

## Paragraphs
<br>

```html
<p>This is a paragraph</p>
```

<br>
<br>

## Separation Elements
<br>

```html
<br>    <!-- line break -->
<hr>    <!-- horizontal rule -->
```

<br>
<br>

## Inline Formatting
<br>

```html
<b>bold</b>
<strong>strong</strong>

<i>italic</i>
<em>emphasized</em>

<del>deleted</del>
<ins>inserted</ins>

<sub>subscript text</sub>
<sup>superscript text</sup>

<code>code</code>

<abbr title="explanation">Abbreviation</abbr>
```

<br>
<br>

## Hyperlinks
<br>

```html
<a href="<filename | url | #top>" [target="<value>"]>Linktext</a>

<a href="<filename | url | #top>" [target="<value>"]>
    <!-- html element -->
<a>

<a href="<filename>" download>Enforce file download</a>

<a href="mailto:example@domain.com">Send Mail</a>

<a href="tel:+XX.XXX.XXX.XXX">Telephone Call</a>
```

|Target value|Description           |
|:-----------|:---------------------|
|_self       |open in current tab   |
|_blank      |open in new tab       |
|_parent     |open in parent context|

<br>
<br>

## Images
<br>

```html
<img src="<image>" alt="alternative text" width="<width_in_pixel>" height="<height_in_pixel>">


<figure>
    <img src="<image>" alt="alternative text" width="<width_in_pixel>" height="<height_in_pixel>">
    <figcaption>Description text for image</figcaption>
</figure>
```

<br>
<br>

## Audio
<br>

```html
<audio [controls] [autoplay]>
    <source src="<audio-file>" type="<audio-type>">
    <!-- multiple sources possible -->
    Text to display when the browser does not support the audio element
</audio>


<figure>
    <audio [controls] [autoplay]>
        <source src="<audio-file>" type="<audio-type>">
        <!-- multiple sources possible -->
        Text to display when the browser does not support the audio element
    </audio>
    <figcaption>Description text for audio</figcaption>
</figure>
```

<br>
<br>

## Video
<br>

```html
<video width="<width>" height="<height>" [controls] [poster="<image>"]>
    <source src="<video-file>" type="<audio-type>">
    <!-- multiple sources possible -->
    Text to display when the browser does not support the video element
</video>


<figure>
    <video width="<width>" height="<height>" [controls] [poster="<image>"]>
        <source src="<video-file>" type="<audio-type>">
        <!-- multiple sources possible -->
        Text to display when the browser does not support the video element
    </video>
    <figcaption>Description text for video</figcaption>
</figure>
```

<br>
<br>

## Quotes
<br>

```html
<blockquote [cite="<source>"]>
    Quote
</blockquote>


<figure>
    <blockquote [cite="<source>"]>
        Quote
    </blockquote>
    <figcaption>
        <cite>source</cite>
    </figcaption>
</figure>
```

<br>
<br>

## Lists
<br>

### Unordered list

```html
<ul>
    <li>item 1</li>
    <li>item 2</li>
</ul>
```

<br>

### Ordered list

```html
<ol [start="3" type="<type>"]>
    <li>item 1</li>
    <li>item 2</li>
</ol>
```

|Type|Description             |
|:---|:-----------------------|
|1   |numbers (default)       |
|i   |lowercase roman numbers |
|I   |uppercase roman numbers |
|a   |lowercase letters       |
|A   |uppercase letters       |

<br>

### Description lists

```html
<dl>
    <dt>description term 1</dt>
    <dd>description 1</dd>

    <dt>description term 2</dt>
    <dd>description 2</dd>
</dl>
```

<br>
<br>

## Tables
<br>

```html
<table>

    <!-- optional tag for table header-->
    <thead>
        <!-- first row of table -->
        <tr>
            <th>Header column 1</th>
            <th>Header column 2</th>
            <th>Header column 3</th>
        </tr>
    </thead>


    <!-- optional tag for table body -->
    <tbody>

        <!-- second row of table -->
        <tr>
            <td>Content column 1 of row 2</td>
            <td>Content column 2 of row 2</td>
            <td>Content column 3 of row 2</td>
        </tr>

        <!-- third row of table -->
        <tr>
            <td>Content column 1 of row 3</td>
            <td>Content column 2 of row 3</td>
            <td>Content column 3 of row 3</td>
        </tr>

    </tbody>


    <!-- optional tag for table footer -->
    <tfoot>
        <!-- fourth row of table -->
        <tr>
            <td colspan="2">Content spanning over column 1 and 2 of row 3</td>
            <td>Content column 3 of row 3</td>
        </tr>
    </tfoot>

</table>
```

<br>
<br>

## Forms
<br>

```html
<form action="<urlProgram>" method="[get | post]">

    <fieldset>
        <legend>Input types</legend>


        <!-- Text -->
        <label for="inputText">Text</label>
        <input type="text" id="inputText" name="TextInput" [value="value"] [maxlength="5"] [minlength="3"][required] [autofocus]>


        <!-- Password -->
        <label for="inputPassword">Password</label>
        <input type="password" id="inputPassword" name="passwordInput">


        <!-- Search (behaves like text input) -->
        <label for="inputSearch">Search</label>
        <input type="search" id="inputSearch" name="searchInput">


        <!-- Number -->
        <label for="inputNumber">Password</label>
        <input type="number" id="inputNumber" name="numberInput" [min="1"] [max="10"] [step="2"] [value="5"]>


        <!-- Range -->
        <label for="inputRange">Range</label>
        <input type="range" id="inputRange" name="rangeInput" min="1" max="10" [step="2"] [value="5"]>


        <!-- Radio buttons can be grouped in sets; only one button of the set can be checked -->
        <label for="inputRadio1">Radio</label>
        <input type="radio" id="inputRadio1" name="radioGroup" value="value1" [checked]>
        <input type="radio" id="inputRadio2" name="radioGroup" value="value2">


        <!-- Checkboxes can be checked independently from each other -->
        <label for="checkbox1">Checkbox</label>
        <input type="checkbox" id="checkbox1" name="checkbox1" [checked]>
        <input type="checkbox" id="checkbox2" name="checkbox2">


        <!-- Color picker -->
        <label for="inputColor">Color</label>
        <input type="color" id="inputColor" name="colorInput" value="<DefaultColor>">

        
        <!-- Date -->
        <label for="inputDate">Date</label>
        <input type="date" id="inputDate" name="dateInput" value="<dateValue>">

        
        <!-- Time -->
        <label for="inputTime">Time</label>
        <input type="time" id="inputTime" name="timeInput" [min="09:00"] [max="18:00"]>

        
        <!-- Email -->
        <label for="inputEmail">Email</label>
        <input type="email" id="inputEmail" name="email">


        <!-- Telephone -->
        <label for="inputTelephone">Telephone</label>
        <input type="telephone" id="inputTelephone" name="telephoneInput" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">


        <!-- URL -->
        <label for="inputURL">URL</label>
        <input type="url" id="inputURL" name="urlInput">


        <!-- File -->
        <label for="inputFile">File</label>
        <input type="file" id="inputFile" name="file" [accept="<fileTypeList>"] [multiple]>


        <!-- Hidden -->
        <input type="hidden" id="inputHidden" name="hiddenInput" value="<text>">


        <!-- Button -->
        <input type="button" onclick="<function_call>" value="Button title">


        <!-- Button for resetting all values to their defaut values -->
        <input type="reset" value="Button title">


        <!-- Button for submitting form data to <urlProgram> -->
        <input type="submit" value="Button title">

    </fieldset>



    <fieldset>
        <legend>List attribute for various input types</legend>

        <label for="inputListText">Text input with list</label>
        <input type="text" id="inputListText" name="listTextInput" list="demoList">

        <datalist id="demoList">
            <option value="option 1">
            <option value="option 2">
            <option value="option 3">
        </datalist>
    </fieldset>



    <fieldset>
        <legend>Textarea</legend>

        <label for="inputTextarea">Text area</label>
        <textarea id="inputTextarea" name="textareaInput" rows="10" cols="10">
            This is some text within the textarea.
        </textarea>
    </fieldset>



    <fieldset>
        <legend>Select (Drop Down Field)</legend>

        <label for="selectDropdown">Select</label>
        <select id="selectDropdown" name="selectedValues" [multiple]>
            <option value="option 1">Option one</option>
            <option value="option 2">Option two</option>
            <option value="option 3">Option three</option>
        </select>
    </fieldset>



    <fieldset>
        <legend>Button</legend>

        <button type="button" [onclick="<function_call>"]>
            Title text or icon 
        </button>
    </fieldset>



    <fieldset>
        <legend>Output (can take the result of a calculation)</legend>
        <output id="outputId" name="output"></output>
    </fieldset>

</form>
```

<br>
<br>

### Inline and block levelelements
Inline elements are as wide as their content and do not start a new line.  
Block level elements start a new line and take all the width including a margin before and after.

<br>

|Inline element |Block level element |
|:--------------|:-------------------|
|\<a>           |\<address>          |
|\<abbr>        |\<article>          |
|\<acronym>     |\<aside>            |
|\<b>           |\<blockquote>       |
|\<bdo>         |\<canvas>           |
|\<big>         |\<dd>               |
|\<br>          |\<div>              |
|\<button>      |\<dl>               |
|\<cite>        |\<dt>               |
|\<code>        |\<fieldset>         |
|\<dfn>         |\<figcaption>       |
|\<em>          |\<figure>           |
|\<i>           |\<footer>           |
|\<img>         |\<form>             |
|\<input>       |\<h1>-<h6>          |
|\<kbd>         |\<header>           |
|\<label>       |\<hr>               |
|\<map>         |\<li>               |
|\<object>      |\<main>             |
|\<output>      |\<nav>              |
|\<q>           |\<noscript>         |
|\<samp>        |\<ol>               |
|\<script>      |\<p>                |
|\<select>      |\<pre>              |
|\<small>       |\<section>          |
|\<span>        |\<table>            |
|\<strong>      |\<tfoot>            |
|\<sub>         |\<ul>               |
|\<sup>         |\<video>            |
|\<textarea>    |                    |
|\<time>        |                    |
|\<tt>          |                    |
|\<var>         |                    |

<br>
<br>

## Special Characters
<br>

|Character      |Code    |
|:--------------|:-------|
|\<             |\&lt;   |
|\>             |\&gt;   |
|\&             |\&amp;  |
|–              |\&mdash;|
|€              |\&euro; |
|&copy;         |\&copy; |
|&reg;          |\&reg;  |
|&bull;         |\&bull; |
|proteced space |\&nbsp; |
|Ö              |\&Ouml; |
|ö              |\&ouml; |
|Ä              |\&Auml; |
|ä              |\&auml; |
|Ü              |\&Uuml; |
|ü              |\&uuml; |
