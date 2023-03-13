# **Linux Shell Basics**
<br>

## **Table Of Content**
<br>

- [**Linux Shell Basics**](#linux-shell-basics)
  - [**Table Of Content**](#table-of-content)
  - [**Get Information About Command**](#get-information-about-command)
    - [**whatis**](#whatis)
    - [**apropos**](#apropos)
    - [**man**](#man)
  - [**Navigation**](#navigation)
    - [**To Input Start**](#to-input-start)
    - [**To Input End**](#to-input-end)
    - [**One Word Backward**](#one-word-backward)
    - [**One Word Forward**](#one-word-forward)
  - [**Command History**](#command-history)
    - [**Show history**](#show-history)
    - [**Delete history**](#delete-history)
    - [**Execute last command from history**](#execute-last-command-from-history)
    - [**Execute specific command in history**](#execute-specific-command-in-history)
  - [**Command Alias**](#command-alias)
    - [**List all alias**](#list-all-alias)
    - [**Create alias**](#create-alias)
    - [**Revove alias**](#revove-alias)
      - [**Remove specific alias**](#remove-specific-alias)
      - [**Remove all alias**](#remove-all-alias)
    - [**Check if command is alias**](#check-if-command-is-alias)
  - [**Periodical command execution**](#periodical-command-execution)
    - [**watch**](#watch)

<br>
<br>
<br>

## **Get Information About Command**
<br>
<br>

### **whatis**
<br>

```bash
whatis <command>
```

* get short description of `command`

<br>
<br>

### **apropos**
<br>

```bash
apropos <keyword>
```

* search for commands related to `keyword`

<br>
<br>

### **man**

```bash
man <command>
```

* open manual for command

<br>
<br>
<br>

## **Navigation**
<br>
<br>

### **To Input Start**
<br>

```
CTRL+A
```

<br>
<br>

### **To Input End**
<br>

```
CTRL+E
```

<br>
<br>

### **One Word Backward**
<br>

```
ALT+B
```

<br>
<br>

### **One Word Forward**
<br>

```
ALT+F
```

<br>
<br>
<br>

## **Command History**
<br>
<br>

### **Show history**
<br>

```bash
history
```

<br>
<br>

### **Delete history**
<br>

```bash
history -c
```

<br>
<br>

### **Execute last command from history**
<br>

```bash
!!
```

<br>
<br>

### **Execute specific command in history**
<br>

```bash
!<id_from_history_output>
```

<br>
<br>
<br>

## **Command Alias**
<br>
<br>

### **List all alias**
<br>

```bash
alias
```

<br>
<br>

### **Create alias**
<br>

```
alias <alias_name>='command'
```

* create permanent alias for specific user by editing `/home/<username>/.bashrc`
* create permanent alias for entire system by editing `/etc/bash.bashrc`

<br>
<br>

### **Revove alias**
<br>
<br>

#### **Remove specific alias**
<br>

```bash
unalias <alias_name>
```

<br>
<br>

#### **Remove all alias**
<br>

```bash
unalias -a
```

<br>
<br>

### **Check if command is alias**
<br>

```
type <command_name>
```

<br>
<br>
<br>

## **Periodical command execution**
<br>
<br>

### **watch**
<br>

```bash
watch <command>
```
* displays output on fullscreen terminal

<br>

Specify execution interval:  

```bash
watch -n <number_of_seconds> <command>
```

<br>

Highlight differences between executions:  

```bash
watch -d <command>
```