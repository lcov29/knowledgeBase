# Markdown Cheatsheet
<br>
<br>

## Headers

```markdown
# Header 1
## Header 2
### Header 3
#### Header 4
##### Header 5
###### Header 6
```

<br>
<br>

## Text Formatting

```markdown
This is _italic_.


This is **bold**.


This sentence is above a horizontal rule.
---
This sentence is under a horizontal rule.


> This sentence is within a blockquote
>
> This sentence is within the same blockquote
```

<br>
<br>

## Different Type Of Links

```markdown
Inline Link:
[Some text](www.test.com "optional title")


Inline link to header in same document:
[Some text](#different-type-of-links)


Inline image link:
![Alternative text](www.test.com/testimage.png)


Reference link to reference defined within the document:
[Some text][myReference]
...
[myReference]: www.test.com 


Reference link to image defined within the document:
![Alternative text][myReference]
...
[myReference]: www.test.com/testimage.png
```

<br>
<br>

## Line Breaks

Hard line break:

```markdown
This sentence is before a line break.

This sentence is after a line break.
```

Soft line break (two spaces at the end of a line):

```markdown
This sentence is in line 1.  
This sentence is in line 2.
```

<br>
<br>

## Lists

Unordered list

```markdown
* Item 1
* Item 2
* Item 3
```
<br>

Ordered list

```markdown
1. Item 1
2. Item 2
3. Item 3
```
<br>

Nested list

```markdown
* Item 1
  * Item 1.1
  * Item 1.2
  * Item 1.3
* Item 2
```
<br>

Task list

```markdown
- [ ] This item is not completed
- [x] This item is completed
```

<br>
<br>

## Code Quote (GitHub Extension)

```markdown
```language(optional)
code
`` `
```

<br>

Example:

```markdown
```javascript
function sayHello() {
   console.log('Hello World');
} 
`` `
```

<br>
<br>

## Table (GitHub Extension)

```markdown
| Header 1     | Header 2       | Header 3      |
|:-------------|:---------------|--------------:|
| Content      | Content        | Content       |
| Left-aligned | Center-aligned | Right-aligned |
```

<br>
<br>

## Emoticons (GitHub Extension)

```markdown
:smile:  
```
<br>

[Emoticon Cheat Sheet](https://github.com/ikatyang/emoji-cheat-sheet/blob/master/README.md)