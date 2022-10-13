# **FileSystem Dir**
<br>

## **Table Of Contents**
<br>

- [**FileSystem Dir**](#filesystem-dir)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Properties**](#properties)
    - [**path**](#path)
  - [**Methods**](#methods)
    - [**read()**](#read)
    - [**close()**](#close)
    - [**dir**](#dir)

<br>
<br>
<br>

## **General**
<br>

The _Dir_ objects represents a directory stream is created by method _opendir()_.

<br>
<br>
<br>

## **Properties**
<br>
<br>

### **path**
* returns directory path provided to opening method _opendir()_.

<br>
<br>
<br>

## **Methods**
<br>
<br>

### **read()**
<br>

```
dir.read() : Promise
```
* asynchronously read next directory entry
* Promise fulfills with 
  * [fs.Dirent](./nodeJS_fs_dirent.md) or 
  * _null_ if no more directories to read

<br>

```
dir.read(callback(error, dirent))
```
* asynchronously reads next directory entry and execute callback

<br>
<br>

### **close()**
<br>

```
dir.close() : Promise
```
* asynchronously close directory handle

<br>

```
dir.close(callbackFunction(error))
```
* asynchronous close directory handle and execute callback afterwards


<br>
<br>

### **dir**
<br>

```
dir[Symbol.asyncIterator]() : <asyncIterator | fs.Dirent>
```
* asynchronously iterates over all directory entries

<br>

```javascript
for await (const dirent of dir) {
    console.log(dirent.name);
}
```