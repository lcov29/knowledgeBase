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
  - [**Command Exit Codes**](#command-exit-codes)
  - [**Command Combination**](#command-combination)
  - [**Quoting and substitution**](#quoting-and-substitution)
  - [**Conditional Command Execution**](#conditional-command-execution)
    - [**If-Statement**](#if-statement)
    - [**Switch-Case-Statement**](#switch-case-statement)
  - [**Loops**](#loops)
    - [**For-Loop**](#for-loop)
    - [**For-Each-Loop**](#for-each-loop)
    - [**While-Loop**](#while-loop)
    - [**Until-Loop**](#until-loop)
  - [**Operators**](#operators)
    - [**Arithmetic**](#arithmetic)
    - [**Number Comparison**](#number-comparison)
    - [**Logical**](#logical)
    - [**String**](#string)
    - [**Files**](#files)
    - [**Bitwise**](#bitwise)

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

## **Command Exit Codes**
<br>

|Code |Description                 |
|:---:|:---------------------------|
|0    |Success                     |
|1    |General error               |
|126  |Command file not executable |
|127	|Command not found           |

<br>
<br>
<br>

## **Command Combination**
<br>

```bash
<cmd_1> ; ... ; <cmd_n>
# multiple commands in single line


{<cmd_1> ; ... ; <cmd_n>}
# execute grouped command list in current shell


(<cmd_1> ; ... ; <cmd_n>)
# execute grouped command list in a subshell


<cmd_1> && <cmd_2>
# <cmd_2> is only executed upon successfull execution of <cmd_1>


<cmd_1> || <cmd_2>
# <cmd_2> is only executed upon error of <cmd_1>


<cmd_1> | <cmd_2>
# stdout of <cmd_1> is piped into stdin of <cmd_2>


<cmd> > <file>
# write stdout of <cmd> in <file>


<cmd> >> <file>
# append stdout of <cmd> to <file>


<cmd> < <file>
# use content of <file> as stdin of <cmd>


<cmd> <<[-]<stopword>			
  ...
  <text>
  ...
<stopword>
# use multiline <text> as stdin of <cmd>, optional - ignores tabulator 
```

<br>
<br>
<br>

## **Quoting and substitution**
<br>

```bash
\<character> 
# stop interpretation of <character> (example: echo \$HOME --returns--> $HOME)


'<cmd,string>'
# stop substitution for <cmd,string>


"<cmd,string>"
# substitute commands, variables and arithmetic statements 


$(<cmd>)
# substitute <cmd> with stdout of <cmd>


`<cmd>`
# substitute <cmd> with stdout of <cmd>
```

<br>
<br>
<br>

## **Conditional Command Execution**
<br>
<br>

### **If-Statement**
<br>

```bash
if <command_list>
then
    <command_list>
fi


if <command_list>
then
    <command_list>
else
    <command_list>
fi


if <command_list>
then
    <command_list>
elif
    <command_list>
else
    <command_list>
fi
```

<br>
<br>

### **Switch-Case-Statement**
<br>

```bash
case <value> in
    <pattern>)
      <command_list>;;
    <pattern>)
      <command_list>;;
esac
```

<br>
<br>
<br>

## **Loops**
<br>

|Keyword  |Description                 |
|:--------|:---------------------------|
|break    |exit loop                   |
|continue |exit current loop execution |

<br>
<br>

### **For-Loop**
<br>

```bash
for ((<start_variable>; <abort_condition>; <increment>))
do
    <command_list>
done
```

<br>
<br>

### **For-Each-Loop**
<br>

```bash
for <variable> [in <list>]
do
    <command_list>
done
```

<br>
<br>

### **While-Loop**
<br>

```bash
while <command_list>
do
    <command_list>
done
```

<br>
<br>

### **Until-Loop**
<br>

```bash
until <command_list>
do
  <command_list>
done
```

<br>
<br>
<br>

## **Operators**
<br>
<br>

### **Arithmetic**
<br>

|Operator |Description    |
|:-------:|:--------------|
|+        |add            |
|-        |subtract       |
|*        |multiplicate   |
|/        |divide         |
|**       |exponent       |
|%        |modulo         |
|++       |increment by 1 |
|--       |decrement by 1 |

<br>
<br>

### **Number Comparison**
<br>

|Operator |Description      |
|:-------:|:----------------|
|-eq      |equal            |
|-gt      |greater than     |
|-lt      |lesser than      |
|-ge      |greater or equal |
|-le      |lesser or equal  |

<br>
<br>

### **Logical**
<br>

|Operator           |Description                                      |
|:-----------------:|:------------------------------------------------|
|!                  |not                                              |
|-a                 |and                                              |
|-o                 |or                                               |
|\( \<expression> \) |group brackets have to be escaped with backslash|

<br>
<br>

### **String**
<br>

|Operator                  |Description                              |
|:-------------------------|:----------------------------------------|
|-n \<string>		           |\<string> does not exist or is not empty |
|-z \<string>		           |\<string> does not exist or is empty     |
|\<string1> = \<string2>   |                                         |
|\<string1> != \<string2>  |                                         |
|\<string1> > \<string2>   |                                         |
|\<string1> < \<string2>   |                                         |

<br>
<br>

### **Files**
<br>

|Operator              |Description                                   |
|:---------------------|:---------------------------------------------|
|-e \<file>            |\<file> exists                                |
|-s \<file>            |size of \<file> > 0                           |
|-f \<file>            |\<file> is a regular file                     |
|-d \<file>            |\<file> is a directory                        |
|-b \<file>            |\<file> is a block device                     |
|-c \<file>            |\<file> is a character based device           |
|-p \<file>            |\<file> is a named-pipe                       |
|-h \<file>            |\<file> is a symbolic link                    |
|-r \<file>            |\<file> is readable for the current process   |
|-w \<file>            |\<file> is writeable for the current process  |
|-x \<file>            |\<file> is executable for the current process |
|\<file1> -ef \<file2> |\<file1> is a hardlink to \<file2>            |
|\<file1> -nt \<file2> |\<file1> is newer than \<file2>               |
|\<file1> -ot \<file2> |\<file1> is older than \<file2>               |

<br>
<br>

### **Bitwise**
<br>

|Operator |Description         |
|:-------:|:-------------------|
|<<       |bitwise left shift  |
|<<=      |left shift equal    |
|>>       |bitwise right shift |
|&        |And                 |
|&=       |And equal           |
|\|       |Or                  |
|\|=      |Or equal            |
|~        |negation            |
|!        |not                 |