# **FileSystem Stats**
<br>

## **Table Of Contents**
<br>

- [**FileSystem Stats**](#filesystem-stats)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Properties**](#properties)
    - [**dev**](#dev)
    - [**mode**](#mode)
    - [**nlink**](#nlink)
    - [**uid**](#uid)
    - [**gid**](#gid)
    - [**rdev**](#rdev)
    - [**blksize**](#blksize)
    - [**ino**](#ino)
    - [**size**](#size)
    - [**blocks**](#blocks)
    - [**atime**](#atime)
    - [**atimeMs**](#atimems)
    - [**mtime**](#mtime)
    - [**mtimeMs**](#mtimems)
    - [**ctime**](#ctime)
    - [**ctimeMs**](#ctimems)
    - [**birthtime**](#birthtime)
    - [**birthtimeMs**](#birthtimems)
  - [**Methods**](#methods)
    - [**isBlockDevice()**](#isblockdevice)
    - [**isCharacterDevice()**](#ischaracterdevice)
    - [**isDirectory()**](#isdirectory)
    - [**isFIFO()**](#isfifo)
    - [**isFile()**](#isfile)
    - [**isSocket()**](#issocket)
    - [**isSymbolicLink()**](#issymboliclink)

<br>
<br>
<br>

## **General**
<br>

The _fs.Stats_ object contains meta information about a file and is returned by different methods of the filesystem module.

<br>
<br>
<br>

## **Properties**
<br>
<br>

### **dev**
* device identifier

<br>

### **mode**
* file type and mode

<br>

### **nlink**
* number of hard links

<br>

### **uid**
* user id of owner

<br>

### **gid**
* user id of owner group

<br>

### **rdev**
* numberic device indentifier

<br>

### **blksize**
* block size for i/o operations

<br>

### **ino**
* inode number

<br>

### **size**
* size in bytes

<br>

### **blocks**
* number of allocated blocks

<br>

### **atime**
* last access timestamp

<br>

### **atimeMs**
* last access in millliseconds since POSIX epoch

<br>

### **mtime**
* last modification timestamp

<br>

### **mtimeMs**
* last modification in milliseconds since POSIX epoch

<br>

### **ctime**
* last status change timestamp

<br>

### **ctimeMs**
* last status change in milliseconds since POSIX epoch

<br>

### **birthtime**
* creation timestamp

<br>

### **birthtimeMs**
* creation time in milliseconds since POSIX epoch

<br>
<br>
<br>

## **Methods**
<br>
<br>

### **isBlockDevice()**
<br>

### **isCharacterDevice()**
<br>

### **isDirectory()**
<br>

### **isFIFO()**
* returns boolean indication whether object is first-in-first-out pipe
* 
<br>

### **isFile()**
<br>

### **isSocket()**
<br>

### **isSymbolicLink()**
<br>