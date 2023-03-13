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
    - [**Ownership And Permissions**](#ownership-and-permissions)
    - [**Other**](#other)
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

### **Remove**
<br>

|Command            |Description
|:------------------|:--------------------------------------------------------------------------------
|rm \<fileName>     |remove file
|rm -iv \<filename> |remove file (with prompt before removal) and print status to console
|rm -rd \<directory>|removes all files in \<directory>, all subdirectories and \<directory> recursivly

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

### **Move**
<br>

|Command                |Description
|:----------------------|:---------------------------------------
|mv \<file_1> \<file_2> |move and rename \<file_1> into \<file_2>


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

### **Ownership And Permissions**
<br>

```bash
chown <new_owner>[:<group>] <file>                    # change ownership of <file> to <new_owner>
                                                      # optional: change also group of <file> to <group>



chgrp <group> <file>                                  # change group of <file> to <group>



chmod <[0-7][0-7][0-7]> <file>                        # change privileges of <file> to the privileges represented as a three-digit number
                                                      # example:  set privileges of <file> to -rw-rw-r--
                                                      #           (user u) rw-	(group g) rw-	(other o) r--
                                                      #           (user u) 110	(group g) 110	(other o) 100
                                                      #           (user u) 4+2=6	(group g) 4+2=6	(other o) 4
                                                      #           --> chmod 664 <file>



chmod <user_class>[+ | - | =]<privilege> <file>       # add, revoke or set privilege of <file> for specific <user_class>
                                                      # examples: chmod g+w test 		add write-privilege for test to group
                                                      #           chmod o-x test		revoke execute-privilege for test from other
                                                      #           chmod g=rw test		set privilege of test to read and write for group



chmod <user_class_1> =<user_class_2> <file>           # set privileges of <file> for <user_class_1> to privileges of <user_class_2>
```

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