# **Linux VIM**

<br>

## **Table Of Contents**
<br>

- [**Linux VIM**](#linux-vim)
  - [**Table Of Contents**](#table-of-contents)
  - [**Open VIM**](#open-vim)
  - [**Commands**](#commands)
    - [**Basics**](#basics)
    - [**Navigation**](#navigation)
    - [**Line Numbers**](#line-numbers)
    - [**Copy And Paste**](#copy-and-paste)
    - [**Reverting Changes**](#reverting-changes)
    - [**Inserting**](#inserting)
    - [**Deleting**](#deleting)
    - [**Replacing**](#replacing)
    - [**Searching**](#searching)
    - [**Recording**](#recording)
    - [**Execute External Command**](#execute-external-command)
    - [**Moving Vim To Background**](#moving-vim-to-background)

<br>
<br>
<br>
<br>

## **Open VIM**
<br>

```bash
vim filename                # open file

vimdiff file_1 file_2       # open and edit up to four files and show differences
```

<br>
<br>
<br>
<br>

## **Commands**
<br>
<br>

### **Basics**
<br>

|Command    |Description
|:----------|:-----------
|:w         |save file
|:w filename|save file as filename
|:q         |exit vim
|:q!        |exit vim without saving
|:wq        |save and exit vim
|:help      |open help menu

<br>
<br>
<br>

### **Navigation**
<br>

Cursor:

```
	  ^
	  k
< h	      l >
	  j
	  V
```

<br>

|Command   |Description
|:---------|:----------
|0         |move cursor to start of line
|$         |move cursor to end of line
|e         |move cursor to end of word
|\<x>w     |move cursor x words forward
|\<x>G     |move to line x
|gg        |move to start of file
|G         |move to end of file
|%         |move to matching parentheses if cursor is over (, [ or {

<br>
<br>
<br>

### **Line Numbers**
<br>

|Command      |Description
|:------------|:-----------
|:set number  |show line numbers
|:set nonumber|hide line numbers
|\<CTRL>G     |show current line number

<br>
<br>
<br>

### **Copy And Paste**
<br>

|Command                    |Description
|:--------------------------|:---------------------------------------------------------------
|v                          |visual selection mode (select parts of text)
|y                          |copy highlighted text
|p                          |paste copied or last deleted text
|:r file/externalCommand    |add content of file or externalCommand under current cursor line

<br>
<br>
<br>

### **Reverting Changes**
<br>

|Command    |Description
|:----------|:-------------------------------
|u          |undo last command
|U          |undo all changes to current line

<br>
<br>
<br>

### **Inserting**
<br>

|Command    |Description
|:----------|:----------------------------------
|i          |insert before the current character
|A          |append at the end of line
|o          |insert into next new line
|O          |insert into previous new line

<br>
<br>
<br>

### **Deleting**
<br>

|Command    |Description
|:----------|:---------------------------------
|dw         |delete current word
|x          |delete current character
|d\<x>w	    |delete next x words
|d$         |delete to the end of line
|\<x>dd     |delete x lines

<br>
<br>
<br>

### **Replacing**
<br>

|Command                            |Description
|:----------------------------------|:------------------------------------------------------------------------------------------
|r\<character>                      |replace character at current cursor position with \<character>
|ce                                 |delete content of word after cursor position, puts you in insertion mode to replace content
|R                                  |replacement mode
|:s/\<old>/\<new>                   |replace first occurrence of \<old> with \<new> in current line
|:s/\<old>/\<new>/g                 |replace all occurrences of \<old> with \<new> in current line
|:%s/\<old>/\<new>/g                |replace all occurrences of \<old> with \<new> in whole file
|:%s/\<old>/\<new>/gc               |replace all occurrences of \<old> with \<new> in whole file with prompt before every replacement
|:\<start>,\<end>s/\<old>/\<new>/g  |replace all occurrences of \<old> with \<new> between lines \<start> and \<end>

<br>
<br>
<br>

### **Searching**
<br>

|Command        |Description
|:--------------|:--------------------------------
|/\<pattern>    |forward search for \<pattern>
|?\<pattern>    |backward search for \<pattern>
|n              |next occurrence
|N              |previous occurrence
|:noh           |reset highligh of all occurrences

<br>
<br>
<br>

### **Recording**
<br>


|Command        |Description
|:--------------|:---------------------------------------
|q\<character>  |start recording a macro for \<character>
|               |type the content
|q              |end current recording
|@\<character>  |use recorded macro

<br>
<br>
<br>

### **Execute External Command**
<br>

|Command        |Description
|:--------------|:-----------------------
|:!\<command>   |execute external command

<br>
<br>
<br>

### **Moving Vim To Background**
<br>

|Command        |Description
|:--------------|:----------------------------------------------------
|\<CTRL>z       |move vim to the background and return to command line

<br>

```bash
fg              # from command line: get vim back to the foreground
```