# **Shell Programming Basics**
<br>
<br>

## **Table Of Contents**
<br>

- [**Shell Programming Basics**](#shell-programming-basics)
  - [**Table Of Contents**](#table-of-contents)
  - [**File Basics**](#file-basics)
  - [**Ways To Run Script**](#ways-to-run-script)
    - [**Call Interpreter with script as parameter**](#call-interpreter-with-script-as-parameter)
    - [**Call Executable Script**](#call-executable-script)
    - [**Source Command**](#source-command)

<br>
<br>
<br>

## **File Basics**
<br>

\<scriptnames>.sh
```bash
#!<full path to shell interpreter>
```

<br>

Examples for shell interpreter:
* /bin/bash
* /bin/csh
* /bin/ksh

<br>
<br>
<br>

## **Ways To Run Script**
<br>
<br>

### **Call Interpreter with script as parameter**
<br>

```bash
<interpreter> <script_name>.sh
```
* caller needs only read permission
* script is executed in subshell

<br>
<br>

### **Call Executable Script**
<br>

```bash
./<script_name>.sh
```
* caller needs execution permission 
* full path to location of the script is needed if not in PATH variable
* script is executed in subshell

<br>
<br>

### **Source Command**
<br>

```bash
source <script_name>.sh
```
* script is executed in current shell