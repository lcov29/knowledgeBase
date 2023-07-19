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
  - [**Variables**](#variables)
    - [**Basics**](#basics)
    - [**Special Shell Variables**](#special-shell-variables)
    - [**Expansion**](#expansion)
  - [**Parameters**](#parameters)
  - [**Arrays**](#arrays)
  - [**Command Basics**](#command-basics)

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

<br>
<br>
<br>

## **Variables**
<br>
<br>

### **Basics**
<br>

```bash
<variable_name>=<value>
# assign a value


$<variable_name>
# access value


${<variable_name>}
# access value


unset <variable_name>
# delete variable
```

<br>
<br>

### **Special Shell Variables**
<br>

|Variable |Description                           |
|:-------:|:-------------------------------------|
|$$       |process id of shell                   |
|$!       |process id of last background process |
|$-       |shell option                          |
|$_       |last argument of previous command     |
|$?       |exit status                           |

<br>
<br>

### **Expansion**
<br>

```bash
${#<variable>}
# length of <variable>


${<variable>:<position>}
# value of <variable> starting from <position> (variables are zero based)


${<variable>:<position>:<length>}
# value of <variable> starting from <position> with <length>
```

<br>

Conditional:
```bash
${<variable>:?<message>}        
# if <variable> is empty or nonexistent: send <message> on stderr and exit script
# else: return value of <variable>


${<variable>:-<String>}
# if <variable> is empty or nonexistent: return <String>
# else: return value of <variable>


${<variable>:=<String>}
# if <variable> is empty or nonexistent: assign string to variable and return <String>
# else: return value of <variable>


${<variable>:+<String>}
# if <variable> exists and is not empty: return <String>
# else: return empty String
```

<br>

Searching:
```bash
${<variable>#<pattern>}
# value of <variable> without the minimal occurrence of <pattern>


${<variable>##<pattern>}
# value of <variable> without the maximal occurrence of <pattern>


${<variable>/<pattern>[/<replacement>]}
# value of <variable> without the first occurrence of <pattern> (forward search, optional replacement)


${<variable>//<pattern>[/<replacement>]}
# value of <variable> without all occurrences of <pattern>
```

<br>

|Pattern |Description     |
|:------:|:---------------|
|#       |forward search  | 
|%       |backward search |

<br>
<br>
<br>

## **Parameters**
<br>

```bash
$0                                      # script name

$#                                      # parameter count

$1 ... $9                               # position parameters 1 - 9

${10}, ...                              # position parameters 10, ...

"$*"                                    # all parameters in one string

"$@"                                    # every parameter in separate string

set <value_1> ... <value_n>             # set position parameters $1, $2, ...

shift <number>                          # shift all position parameters to the left by <number> indices
```

<br>
<br>
<br>

## **Arrays**
<br>

```bash
declare -a <array_name>                 # optional declaration of <array_name>

<array_name>=( <value_1> <value_n> )    # continuous assignment of values

<array_name>[<index>]=<value>           # assign value to element with index

${<array_name>[<index>]}                # access value on index

${#<array_name>[*]}                     # number of elements

${<array_name>[*]}                      # all elements as separate strings

"${<array_name>[*]}"                    # all elements as string

unset <array_name>                      # delete <array_name>
```

<br>
<br>
<br>

## **Command Basics**
<br>