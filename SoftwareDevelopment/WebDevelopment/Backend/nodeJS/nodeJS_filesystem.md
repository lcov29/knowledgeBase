# **NodeJS File System**
<br>

## **Table Of Contents**
<br>

- [**NodeJS File System**](#nodejs-file-system)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Import Module**](#import-module)
    - [**ES Module**](#es-module)
    - [**CommonJS Module**](#commonjs-module)
  - [**Files**](#files)
    - [**Create Files**](#create-files)
      - [**writeFile()**](#writefile)
      - [**appendFile()**](#appendfile)
    - [**Read Files**](#read-files)
      - [**readFile()**](#readfile)
    - [**Update Files**](#update-files)
      - [**writeFile()**](#writefile-1)
      - [**appendFile()**](#appendfile-1)
      - [**copyFile()**](#copyfile)
      - [**truncate()**](#truncate)
    - [**Delete Files**](#delete-files)
      - [**rm()**](#rm)
      - [**unlink()**](#unlink)
    - [**Rename Files**](#rename-files)
      - [**rename()**](#rename)
    - [**File Handles**](#file-handles)
      - [**open()**](#open)
      - [**appendFile()**](#appendfile-2)
      - [**chmod()**](#chmod)
      - [**chown()**](#chown)
      - [**close()**](#close)
      - [**createReadStream()**](#createreadstream)
    - [**Watch()**](#watch)
    - [**Permissions**](#permissions)
      - [**access()**](#access)
      - [**chmod()**](#chmod-1)
      - [**chown()**](#chown-1)
    - [**Other**](#other)
      - [**realpath()**](#realpath)
      - [**link()**](#link)
      - [**unlink()**](#unlink-1)
      - [**symlink()**](#symlink)
      - [**readlink()**](#readlink)
  - [**Directories**](#directories)
    - [**Create Directories**](#create-directories)
      - [**mkdir()**](#mkdir)
      - [**mkdtemp()**](#mkdtemp)
    - [**Copy Directories**](#copy-directories)
      - [**cp() (EXPERIMENTAL)**](#cp-experimental)
    - [**Delete Directories**](#delete-directories)
      - [**rm()**](#rm-1)
      - [**rmdir()**](#rmdir)
    - [**Scan Directories**](#scan-directories)
      - [**opendir()**](#opendir)
      - [**readdir()**](#readdir)
      - [**Dir**](#dir)
        - [**close()**](#close-1)
        - [**path**](#path)
        - [**read()**](#read)
        - [**dir**](#dir-1)
      - [**Dirent**](#dirent)
        - [**Dirent.name**](#direntname)
        - [**isDirectory()**](#isdirectory)
        - [**isFIFO()**](#isfifo)
        - [**isFile()**](#isfile)
        - [**isSocket()**](#issocket)
        - [**isSymbolicLink()**](#issymboliclink)
  - [**Stats**](#stats)
    - [**stat()**](#stat)
    - [**Stats Object**](#stats-object)
      - [**isBlockDevice()**](#isblockdevice)
      - [**isCharacterDevice()**](#ischaracterdevice)
      - [**isDirectory()**](#isdirectory-1)
      - [**isFIFO()**](#isfifo-1)
      - [**isFile()**](#isfile-1)
      - [**isSocket()**](#issocket-1)
      - [**isSymbolicLink()**](#issymboliclink-1)

<br>
<br>
<br>

## **General**
<br>

* allows access to the file system of the host
* available operations
  * create files
  * read files
  * update files
  * delete files
  * rename files

<br>

Most functions have three versions:

* Asynchronous
* Callback-based 
* Synchronous (blocks)

<br>

We only cover the asynchronous functions. The synchronous and callback-based functions can be found in the [documentation](https://nodejs.org/en/docs/).

<br>
<br>
<br>

## **Import Module**
<br>
<br>

### **ES Module**
<br>

```javascript
// callback and synchronous
import * as fs from 'node:fs';
import { /* object1, object2, ... */ } from 'node:fs';


// promise based
import * as fs from 'node:fs/promises';
import { /* object1, object2, ... */ } from 'node:fs/promises';
```

<br>
<br>

### **CommonJS Module**
<br>

```javascript
//callback and synchronous
const fs = require('fs');


//promise based
const fs = require('fs').promises;
```

<br>
<br>
<br>

## **Files**
<br>
<br>


### **Create Files**
<br>

There are several methods to create new files:
<br>

#### [**writeFile()**](#writefile-1)

#### [**appendFile()**](#appendfile)

<br>
<br>

### **Read Files**
<br>
<br>

#### **readFile()**
<br>

```
fsPromises.readFile(path, [option]) : Promise

option = {
  encoding : string (Defaul: Null),
  flag : string,
  signal : AbortSignal
}
```

<br>

```javascript
import { readFile } from 'node:fs/promises';

const contentString = await readFileSync('/file/path', { encoding: 'utf-8'}); 
```

<br>
<br>


### **Update Files**
<br>
<br>

#### **writeFile()**
<br>

```
writeFile(fileName, data, [options])

options = {
  encoding : string (Default: utf8),
  mode : int
  flag : string
  signal : AbortSignal
}
```
* Promise fulfills with _undefined_
* creates file or replaces existing file

<br>

```javascript
import { writeFile } from 'node:fs/promises';

await writeFile('path/file/name', 'Content');
```

<br>
<br>

#### **appendFile()**
<br>

```
appendFile(path, data, [options]) : Promise

options = {
  encoding: <string (default: utf-8)>,
  mode: <int>,
  flag: <string>
}
```

<br>

* append _data_ to file
* creates file if not already existing

<br>

```javascript
import { append } from 'node:fs/promises';

await appendFile('/path/file', 'new content');
```

<br>
<br>

#### **copyFile()**
<br>

```
copyFile(source, destination, [mode]) : Promise
```

* copies file to _destination_
* overwrites file with same name at destination by default

<br>

|Mode                   |Description
|:----------------------|:-------------
|COPYFILE_EXCL          |throw error if destination path already exists
|COPYFILE_FICLONE       |copy attempts creating a copy-on-write reflink, fallback if unpossible
|COPYFILE_FICLONE_FORCE |copy attempts creating a copy-on-write reflink, throw error if unpossible

<br>

```javascript
import { copyFile, constants } from 'node:fs/promises';

try {
  await copyFile('/path/source', '/path/destination', constants.COPYFILE_EXCL);
} catch(error) {
  console.log('destination already exists');
}
```

<br>
<br>

#### **truncate()**
<br>

```
truncate(path, [length]) : Promise
```
* truncates or shortens length of content
* Promise fulfills with _undefined_

<br>

```javascript
import { truncate } from 'node:fs/promises';

await truncate('path/file', 20);    // shorten content length
await truncate('path/file');        // truncate content completely
```

<br>
<br>

### **Delete Files**
<br>
<br>

#### **rm()**
<br>

```
rm(path, [option]) : Promise

options = {
  force : boolean (Default: false),
  maxRetries : int (Default: 0),
  recursive : boolean (Default: false),
  retryDelay : int (Default: 100)
}
```
* removes files and directories
* Promise fulfills with _undefined_

<br>

```javascript
import { rm } from 'node:fs/promises';

await rm('path/file');
```

<br>
<br>

#### **unlink()**
<br>

```
unlink(path) : Promise
```
* if path is _symbolic link_: delete link
* if path is not _symbolik link_: delete file

<br>

```javascript
import { unlink } from 'node:fs/promises';

await unlink('path');
```

<br>
<br>

### **Rename Files**
<br>

#### **rename()**
<br>

```
rename(oldPath, newPath) : Promise
```
* Promise fulfills with _undefined_

<br>

```javascript
import { rename } from 'node:fs/promises';

await rename('old/path/name', 'new/path/name');
```

<br>
<br>

### **File Handles**
<br>
<br>

#### **open()**
<br>

```
open(path, flags, mode) : Promise(FileHandle)
```

<br>

|Flags |Open file for
|:-----|:-----------
|a     |appending, nonexistent file is created
|ax    |appending, fails for nonexistent file
|a+    |reading and appending, nonexistent file is created
|ax+   |reading and appending, fails for nonexistent file
|as    |synchronous appending, nonexistent file is created
|as+   |synchronous appending and reading, nonexistent file is created
|r     |reading, fails for nonexistent file (DEFAULT)
|r+    |reading and writing, fails for nonexistent file
|rs+   |synchronous reading and writing \(!bypasses local file system cache, check documentation)
|w     |writing, nonexistent file is created, existing file is truncated
|wx    |writing, fails for nonexistent file
|w+    |reading and writing, nonexistent file is created, existing file is truncated
|wx+   |reading and writing, fails for nonexistent file

<br>

```javascript
import { open } from 'node:fs/promises';

const fileHandle = await open('/path/file', 'wx+');
```

<br>
<br>

#### **appendFile()**
<br>

```
appendFile(data, [option]) : Promise

option = {
  encoding : string (Default: utf8)
}
```
* add content to file
* create nonexistent file

<br>
<br>

#### **chmod()**
<br>

```
chmod(mode) : Promise

mode : int (file mode bit mask)
```

<br>
<br>

#### **chown()**
<br>

```
chown(uid, gid) : Promise
```

<br>
<br>

#### **close()**
<br>

```
close() : Promise
```
* close file handle

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



<br>
<br>

### **Watch()**
<br>

```
watch(filename, [option]) : AsyncIterator

option = {
  persistent : boolean (default: true),
  recursive : boolean (default: false),
  encoding: string (default: utf8),
  signal : AbortSigbat
}
```
* watch for changes of file or directory 
* AsyncIterator contains
  * eventType : string (type of change)
  * filename : string 

<br>

```javascript
import { watch } from 'node:fs/promises';

const controller = new AbortController();
const {signal} = controller;

setTimeout(() => {
  controller.abort();
  console.log('aborted');
}, 20000);

(async () => {
  try {
    const watcher = watch('file/name', {signal});
    for await(const event of watcher) {
      console.log(event);
    }
  } catch(error) {
    console.log(error)
  }
})();
```

<br>
<br>

### **Permissions**
<br>
<br>

#### **access()**
<br>

```
access(path, [mode]) : Promise
```

* modes can be chained with or operator: |
* Promise fulfills with _undefined_ when file is accessible

<br>

|Mode |Default |Description
|:----|:------:|:----------
|F_OK |X       |File exists, but no information about whether file is accessible
|R_OK |        |Read permission 
|W_OK |        |Write permission
|X_OK |        |Execution permission (no effect on windows)

<br>

```javascript
import { access, constants } from 'node:fs/promises';

try {
  const path = '/path/file';

  await access(path, constants.R_OK);
  console.log('read permission');

  await access(path, constants.W_OK);
  console.log('write permission');
} catch (error) {}
```

<br>
<br>

#### **chmod()**
<br>

```
chmod(path, mode) : Promise
```

<br>

* change permission of specified file

<br>

|Mode    |Description             
|:------:|:----------------------------
|S_IRWXU |owner: read, write, execute.
|S_IRUSR |owner: read
|S_IWUSR |owner: write
|S_IXUSR |owner: execute
|S_IRWXG |group: read, write, execute
|S_IRGRP |group: read
|S_IWGRP |group: write
|S_IXGRP |group: execute
|S_IRWXO |others: read, write, execute
|S_IROTH |others: read
|S_IWOTH |others: write
|S_IXOTH |others: execute

<br>

```javascript
import { chmod } from 'node:fs/promises';

await chmod('/path/file', 4);
```

<br>
<br>

#### **chown()**
<br>

```
chown(path, uid, gid) : Promise
```

* changes ownership of specified file

<br>

```javascript
import { chown } from 'node:fs/promises';

await chown('/path/file', 1234, 4321);
```

<br>
<br>

### **Other**

<br>
<br>

#### **realpath()**
<br>

```
realpath(path, [option]) : Promise

option =  {
  encoding : string (Default: utf8)
}
```
* Promise fulfills with actual location of path

<br>

```javascript
import { realpath } from 'node:fs/promises';

const filePath = realpath('/path');
```

<br>
<br>

#### **link()**
<br>

```
link(existingPath, newPath) : Promise
```

<br>

* create link _newPath_ to _existingPath_

<br>

```javascript
import { link } from 'node:fs/promises';

await link('path/existingFile', 'path/newLinkFileName');
```

<br>
<br>

#### [**unlink()**](#unlink)
<br>

* Delete symbolic link
* See [unlink](#unlink)

<br>
<br>


#### **symlink()**
<br>

```
symlink(target, path, [type]) : Promise
```
* creates symbolic link
* type = ['dir', 'file', 'junction'] (Windows only)

<br>

```javascript
import { symlink } from 'node:fs/promises';

await symlink('path/target', 'path/link');
```

<br>
<br>

#### **readlink()**
<br>

```
readlink(path, option) : Promise

option = {
  encoding : string (Default: utf8)
}
```
* Promise fulfills with content of symbolic link

<br>

```javascript
import { readlink } from 'node:fs/promises';

const content = readlink('path/link');
```

<br>
<br>
<br>

## **Directories**
<br>
<br>

### **Create Directories**
<br>
<br>

#### **mkdir()**
<br>

```
mkdir(path, [option]) : Promise

option = {
  recursive : boolean (false),   // creates nonexistent parent directories
  mode : string|int
}
```

<br>

```javascript
import { mkdir } from 'node:fs/promises';

await mkdir('/path/foldername',);
```

<br>
<br>

#### **mkdtemp()**
<br>

```
mkdtemp(prefix, option) : Promise

option = {
  encoding : string (utf-8)
}
```

<br>

* creates unique temporary directory
* directory name: prefix + 6 random characters
* promise fulfills with file system path of temporary directory

<br>

```javascript
import { mkdtemp } from 'node:fs/promises';

const directoryPath = await mkdtemp('prefix');
```

<br>
<br>

### **Copy Directories**
<br>
<br>

#### **cp() (EXPERIMENTAL)**
<br>

```
cp(sourceDirectory, destinationDirectory, [options]) : Promise

options = {
  defeference : boolean (false),
  errorOnExit : boolean (false),
  filter : function (undefined),
  force : boolean (false),
  preserveTimestamps : boolean (false),
  recursive : boolean (false),
  verbatimSymLinks : boolean (false)
}
}
```

<br>

* copies entire directory including subdirectories

<br>
<br>

### **Delete Directories**
<br>
<br>

#### **rm()**
<br>

```
rm(path, [option]) : Promise

options = {
  force : boolean (Default: false),
  maxRetries : int (Default: 0),
  recursive : boolean (Default: false),
  retryDelay : int (Default: 100)
}
```
* removes files and directories
* Promise fulfills with _undefined_

<br>

```javascript
import { rm } from 'node:fs/promises';

await rm('path/directory', { recursive: true });
```

<br>
<br>

#### **rmdir()**
<br>

```
rmdir(path, [options]) : Promise

options = {
  maxRetries : int (Default: 0),
  retryDelay : int (Default: 100)
}
```
* removes empty directories
* Promise fulfills with _undefined_
  
<br>

```javascript
import { rmdir } from 'node:fs/promises';

await rmdir('path/directory');
```

<br>
<br>

### **Scan Directories**
<br>
<br>

#### **opendir()**
<br>

* opens a [fs.Dir](#dir) object for a directory

<br>

```
opendir(path, option) : Promise

option = {
  encoding : string(utf8')
  bufferSize : int(32)
}
```

<br>

* Promise fulfills with [fs.Dir](#dir)
* bufferSize describes numbers of buffered directories

<br>

```javascript
import { opendir } from 'node:fs/promises';

const fsDir = await opendir('/path/directory');
```

<br>
<br>

#### **readdir()**
<br>

```
readdir(path, option) : Promise

option = {
  encoding : string (Default: utf8)
  withFileTypes : boolean (Default: false)
}
```
* read content of directory
* Promise fulfills with array of entry names in directory

<br>

```javascript
import { readdir } from 'node:fs/promises';

const entryNameList = await readdir('/path/directory');

for (const entryName of entryNameList) {
  console.log(entryName);
}
```

<br>
<br>

#### **Dir**
<br>

* object representing a directory stream

<br>
<br>

##### **close()**
<br>

```
dir.close() : Promise
```
* asynchronous close directory handle

<br>
<br>

```
dir.close(callbackFunction(error))
```
* asynchronous close directory handle and execute callback afterwards

<br>
<br>

##### **path**
<br>

```
dir.path() : string
```
* returns path of directory provided to [fs.opendir()](#opendir)

<br>
<br>

##### **read()**
<br>

```
dir.read() : Promise
```
* asynchronously read next directory entry
* Promise fulfills with [fs.Dirent](#dirent) or _null_ if no more directories to read

<br>
<br>

```
dir.read(callback(error, dirent))
```
* asynchronously reads next directory entry and execute callback

<br>
<br>

##### **dir**
<br>

```
dir[Symbol.asyncIterator]() : <asyncIterator | fs.Dirent>
```
* asynchronously iterates over all directory entries


<br>
<br>

#### **Dirent**
<br>

* represents a directory entry (file or subdirectory)

<br>
<br>

##### **Dirent.name**
<br>

##### **isDirectory()**
<br>

##### **isFIFO()**

* returns boolean indication whether _fs.Dirent_ is a first-in-first-out-pipeline

<br>

##### **isFile()**
<br>

##### **isSocket()**
<br>

##### **isSymbolicLink()**

<br>
<br>
<br>

## **Stats**
<br>
<br>

### **stat()**
<br>

```
stat(path, [option]) : Promise

option = {
  bigint : boolean (Default: false)
}
```
* Promise fulfills to [fs.Stats](#stats-object)

<br>

```javascript
import { stat } from 'node:fs/promises';

const statsObject = await stat('path');
```

<br>
<br>

### **Stats Object**
<br>

```
stats {
  dev:          <device identifier>
  mode:         <file type and mode>
  nlink:        <number of hard links>
  uid:          <user id of owner>
  gid:          <user id of owner group>
  rdev:         <numberic device indentifier>
  blksize:      <block size for i/o operations>
  ino:          <inode number>
  size:         <size in bytes>
  blocks:       <number of allocated blocks>
  atimeMs:      <last access in millliseconds since POSIX epoch>
  mtimeMs:      <last modification in milliseconds since POSIX epoch>
  ctimeMs:      <last status change in milliseconds since POSIX epoch>
  birthtimeMs:  <creation time in milliseconds since POSIX epoch>
  atime:        <last access timestamp>
  mtime:        <last modification timestamp>
  ctime:        <last status change timestamp>
  birthtime:    <creation timestamp>
}
```

<br>

#### **isBlockDevice()**
<br>

#### **isCharacterDevice()**
<br>

#### **isDirectory()**
<br>

#### **isFIFO()**
* returns boolean indication whether object is first-in-first-out pipe
<br>

#### **isFile()**
<br>

#### **isSocket()**
<br>

#### **isSymbolicLink()**
<br>