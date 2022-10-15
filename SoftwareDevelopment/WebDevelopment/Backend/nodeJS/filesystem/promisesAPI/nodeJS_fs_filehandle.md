# **FileSystem Promises API FileHandle**
<br>

## **Table Of Contents**
<br>

- [**FileSystem Promises API FileHandle**](#filesystem-promises-api-filehandle)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Create FileHandle**](#create-filehandle)
  - [**Close FileHandle**](#close-filehandle)
  - [**Properties**](#properties)
    - [**fd**](#fd)
  - [**Methods**](#methods)
    - [**Create Files**](#create-files)
      - [**writeFile()**](#writefile)
    - [**Create Stream**](#create-stream)
      - [**createReadStream()**](#createreadstream)
      - [**createWriteStream()**](#createwritestream)
    - [**Read File**](#read-file)
      - [**readFile()**](#readfile)
      - [**read()**](#read)
    - [**Write To File**](#write-to-file)
      - [**writeFile()**](#writefile-1)
      - [**write()**](#write)
    - [**Delete File Content**](#delete-file-content)
      - [**truncate()**](#truncate)
    - [**Close FileHandle**](#close-filehandle-1)
      - [**close()**](#close)
    - [**Change Meta Data**](#change-meta-data)
      - [**chmod()**](#chmod)
      - [**chown()**](#chown)
      - [**utimes()**](#utimes)
    - [**stat()**](#stat)

<br>
<br>
<br>

## **General**
<br>

The _FileHandle_ object is a file wrapper and also an EventEmitter.

<br>


<br>
<br>
<br>

## **Create FileHandle**
<br>

We can create a FileHandle object by calling [fsPromises.open()](./nodeJS_fs_fsPromises.md#open).

<br>

```javascript
import { open } from 'node:fs/promises';

const fileHandle = await open('/path/file', 'wx+');
```

<br>
<br>
<br>

## **Close FileHandle**
<br>

IMPORTANT: Always close fileHandle explicitly via method [_close()_](#close) to prevent memory leaks!

<br>

```javascript
await fileHandle.close();
```

<br>
<br>
<br>

## **Properties**
<br>
<br>

### **fd**
* returns numeric file descriptor

<br>
<br>
<br>

## **Methods**
<br>
<br>

### **Create Files**
<br>
<br>

#### **writeFile()**
<br>

```
writeFile(data, [option]) : Promise

option = {
  encoding : string (Default: utf8)
}
```
* write _data_ to file
* create nonexistent file

<br>
<br>

### **Create Stream**
<br>
<br>

#### **createReadStream()**
<br>

```
createReadStream([option]) : ReadStream

option = {
  encoding : string (Default: null),
  autoClose : boolean (Default: true),
  emitClose : boolean (Default: true),
  start : int,
  end : int (Default: Infinity),
  highWaterMark : int (Default: 65 * 1024)
}
```
* options _start_ and _end_ (inclusive) can define a byte range to read from the file
* stream emits _close_ event after destruction

<br>

See [streams](../../stream/nodeJS_filesystem_streams.md)

<br>
<br>

#### **createWriteStream()**
<br>

```
createWriteStream([option]) : WriteStream

option = {
  encoding : string (Default: utf8),
  autoClose : boolean (Default: true),
  emitClose : boolean (Default: true),
  start : int [0,Number.MAX_SAFE_INTEGER]
}
```
* option _start_: write data at position after beginning of file

<br>

See [streams](../../stream/nodeJS_filesystem_streams.md)

<br>
<br>

### **Read File**
<br>
<br>

#### **readFile()**
<br>

```
readFile(option) : Promise 

option = {
  encoding : string (Default: null),
  signal : AbortSignal
}
```
* _Promise_ fulfills with file content

<br>
<br>

#### **read()**
<br>

```
read(buffer, offset, length, position) : Promise
```
* reads data from file and stores it in _buffer_
* parameters can be stored within an _option_ object
* _Promise_ fulfills with {bytesRead, buffer}

<br>
<br>

### **Write To File**
<br>
<br>

#### **writeFile()**
<br>

```
writeFile(data, [option]) : Promise

option = {
  encoding : string (Default: utf8)
}
```
* write _data_ to file, create file if it not already exists

<br>
<br>

#### **write()**
<br>

```
write(buffer, [option]) : Promise

option = {
  offset : int (Default: 0),
  length : int (Default: buffer.byteLength - offset),
  position : int (Default: null)
}
```
* write _buffer_ to file
* _Promise_ fulfills with {bytesWritten, buffer}

<br>
<br>

### **Delete File Content**
<br>
<br>

#### **truncate()**
<br>

```
truncate([length]) : Promise
```
* _length_ specifies how many bytes from the beginning of the file should be retained
* _Promise_ fulfills with _undefined_

<br>
<br>

### **Close FileHandle**
<br>
<br>

#### **close()**
<br>

```
close() : Promise
```
* _Promise_ fulfills with _undefined_
* close file handle

<br>

```javascript
import { open } from 'node:fs/promises';

const fileHandle = null;

try {
    fileHandle = await open('/file/path');
} finally {
    await fileHandle?.close();
}
```

<br>
<br>

### **Change Meta Data**
<br>
<br>

#### **chmod()**
<br>

```
chmod(mode) : Promise

mode : int (file mode bit mask)
```
* modify file permission

<br>
<br>

#### **chown()**
<br>

```
chown(uid, gid) : Promise
```
* change file owner

<br>
<br>

#### **utimes()**
<br>

```
utime(atime, mtime) : Promise

atime : <number | string | date>
mtime : <number | string | date>
```
* modify last access and manipulation timestamp

<br>
<br>

### **stat()**
<br>

```
stat() : Promise
```
* Promise fulfills with [_fs.Stats_](../objects/nodeJS_fs_stats.md)