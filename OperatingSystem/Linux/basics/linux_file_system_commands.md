# **Linux File System Commands**
<br>

## **Table Of Contents**
<br>

- [**Linux File System Commands**](#linux-file-system-commands)
  - [**Table Of Contents**](#table-of-contents)
  - [**Change Working Directory**](#change-working-directory)
  - [**Directory Commands**](#directory-commands)
    - [**Create**](#create)
    - [**Remove**](#remove)
  - [**File Commands**](#file-commands)
    - [**Create**](#create-1)
    - [**Remove**](#remove-1)
    - [**Copy**](#copy)
    - [**Move**](#move)
    - [**Links**](#links)
    - [**Other**](#other)
  - [**Change Ownership**](#change-ownership)
  - [**Permission**](#permission)
      - [**Change all permissions**](#change-all-permissions)
      - [**Change specific permission**](#change-specific-permission)
      - [**Add specific permission**](#add-specific-permission)
      - [**Remove specific permission**](#remove-specific-permission)
  - [**Searching**](#searching)
  - [**Archive**](#archive)
  - [**Comparing Files**](#comparing-files)

<br>
<br>
<br>
<br>

## **Change Working Directory**
<br>

```bash
cd <path> 
```

<br>
<br>
<br>
<br>

## **Directory Commands**
<br>
<br>

### **Create**
<br>

|Command                                    |Description
|:------------------------------------------|:-------------------------------------------------------------------
|mkdir \<directoryName>                     |add new directory
|mkdir -p \<path>                           |[option parents]: add all nonexisting path directories
|mkdir -p \<path>/{folder_1,folder_n}/{1..n}|add multiple subdirectories and add all nonexisting path directories

<br>
<br>
<br>

### **Remove**
<br>

|Command                |Description
|:----------------------|:----------------------------------------------------
|rmdir \<directoryName> |delete _empty_ directory
|rmdir -p \<path>       |[option parents]: delete all empty direcories in path

<br>
<br>
<br>
<br>

## **File Commands**
<br>
<br>


### **Create**
<br>

|Command                  |Description
|:------------------------|:------------------------------------
|touch \<fileName>        |create file
|> \<fileName>            |create file with redirection operator
|echo "Text" > \<fileName>|create file with text

<br>
<br>
<br>

### **Remove**
<br>

|Command            |Description
|:------------------|:--------------------------------------------------------------------------------
|rm \<fileName>     |remove file
|rm -iv \<filename> |remove file (with prompt before removal) and print status to console
|rm -rd \<directory>|removes all files in \<directory>, all subdirectories and \<directory> recursivly

<br>
<br>
<br>

### **Copy**
<br>

|Command                                           |Description
|:-------------------------------------------------|:---------------------------------------------------------------------------
|cp \<filePath1> \<filePath2>                      |copy \<filePath1> to location of \<filePath2>
|cp -r \<source_directory> \<destination_directory>|copy content of \<source_directory> recursivly into \<destination_directory>
|cp \<source_directory>/* \<destination_directory> |copy content of \<source_directory> into \<destination_directory>

<br>
<br>
<br>

### **Move**
<br>

|Command                |Description
|:----------------------|:---------------------------------------
|mv \<file_1> \<file_2> |move and rename \<file_1> into \<file_2>


<br>
<br>
<br>

### **Links**
<br>

|Command                            |Description
|:----------------------------------|:---------------------
|ln \<file> [path/]\<link_name>			|create a hardlink to <file>
|ln -s \<file> [path/]\<link_name>  |create a symbolic link to <file>

<br>
<br>
<br>

### **Other**
<br>

```bash
file -i <file>      # print file encoding


dirname             # extract dirname of a file path
```

<br>
<br>
<br>
<br>

## **Change Ownership**
<br>

```bash
chown <new_owner> <file> 
```

<br>

```bash
chown <new_owner>[:<group>] <file> 
```
* change ownership and group of file

<br>
<br>
<br>
<br>

## **Permission**
<br>

Permissions:  

|Symbol |Name    |File Permission       |Directory Permission               |
|:-----:|:-------|:---------------------|:----------------------------------|
|r      |read    |content can be viewed |content can be viewed              |
|w      |write   |file can be modified  |content can be modified            |
|x      |execute |file can be executed  |directory can be navigated by `cd` |

<br>

User Groups:  

|Symbol |Name  |Description
|:-----:|:-----|:----------
|u      |user  |user that owns this file or directory
|g      |group |specific group of users
|o      |other |everybody

<br>

Example:

```
rwxrw-r--
-- -- ---
 u  g  o
```

<br>
<br>

#### **Change all permissions**
<br>

```bash
chmod <[0-7][0-7][0-7]> <file>  
```

* the permissions for every entity are treated as a sequence of three bits
* the bit sequence is then displayed as decimal

<br>

**Example:**

We want to change the permission to `rwxrw-r--`.

We display this permission as `111 (user) - 110 (group) - 100 (other)`.

By converting each sequence to decimal we get `7 (user) - 6 (group) - 4 (other)`.

Therefore we get the command `chmod 764 <file>`

<br>
<br>

#### **Change specific permission**
<br>

```bash
chmod <user_class>=<privilege_sequence><file>
```

<br>

Example:

```bash
chmod g=rwx .fileName
```
* set permission for `group` to read, write and execute

<br>
<br>

#### **Add specific permission**
<br>

```bash
chmod <user_class>+<privilege> <file>
```

<br>

Example:

```bash
chmod g+w .fileName
```
* add `write` permission to `group`

<br>
<br>

#### **Remove specific permission**
<br>

```bash
chmod <user_class>-<privilege> <file>
```

<br>

Example:

```bash
chmod g-w .fileName
```
* remove `write` permission from `group`


<br>
<br>
<br>
<br>

## **Searching**
<br>
<br>

```bash
find [directory] [-test] [-action]


# default directory: current work directory
# tests:
#   -name <filename>
#   -perm <privilege>
#   -type <filetype>
#   -user <username>
# options to combinate tests:
#   -a					and
#   -o					or
#    !					negation
# actions:
#   -print 					default
#   -fprint <file>				print result to <file>
#   -exec <command> [{}] \;			{} represents the path to all found files, \; ends the command
#   -ok					-exec with interactive prompt
```

<br>
<br>
<br>
<br>

## **Archive**
<br>
<br>

|Command                                                |Description
|:------------------------------------------------------|:--------------
|tar -cvzf \<archive_name>.tar.gz \<directory \| file>  |create a zipped archive \<archive_name>.tar.gz of all contents of \<directory \| file> (verbose)
|tar -xvzf \<archive_name>.tar.gz                       |unzip and unpack \<archive_name>.tar.gz relative to the current working directory

<br>
<br>
<br>
<br>

## **Comparing Files**
<br>
<br>

```bash
meld <file1> <file2>        # open graphical comparison of files
```