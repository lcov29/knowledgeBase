# **NodeJS File System**
<br>

## **Table Of Contents**
<br>

- [**NodeJS File System**](#nodejs-file-system)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Example**](#example)
  - [**Import Module**](#import-module)
    - [**ES Module**](#es-module)
    - [**CommonJS Module**](#commonjs-module)
  - [**Files**](#files)
    - [**Open FileHandle**](#open-filehandle)
      - [**open()**](#open)
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
    - [**Watch()**](#watch)
    - [**Permissions**](#permissions)
      - [**access()**](#access)
      - [**chmod()**](#chmod)
      - [**chown()**](#chown)
  - [**Links**](#links)
    - [**Hard Links**](#hard-links)
      - [**link()**](#link)
      - [**unlink()**](#unlink-1)
    - [**Symbolic Links**](#symbolic-links)
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
  - [**Stats**](#stats)
    - [**stat()**](#stat)

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

## **Example**
<br>

See [Examples](./nodeJS_fs_examples.md#promise-api).

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

### **Open FileHandle**
<br>

#### **open()**
<br>

```
open(path, [flags], [mode]) : Promise

flags : <string | number> (Default: 'r')
mode : <string | integer> (Default: 0o666 (readable and writable))
```
* Promise fulfills with [FileHandle](./nodeJS_fs_filehandle.md)

<br>

|Flags |Open file for
|:-----|:--------------------------------------------------
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

Note: Write operations to files are atomic! If NodeJs crashes while writing to a file, the data not already written to a file is lost!

<br>

Solution: Write to temporary file and rename it after completion of the write operation. You can use _os.tmdir_ to get your operating system´s default temporary directory.

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
* REPLACE existing file
* create file if it not already exists

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

## **Links**
<br>
<br>

### **Hard Links**
<br>
<br>


#### **link()**
<br>

```
link(existingPath, newPath) : Promise
```
* _Promise_ fulfills with _undefined_
* create hard link _newPath_ to _existingPath_

<br>

```javascript
import { link } from 'node:fs/promises';

await link('path/existingFile', 'path/newLinkFileName');
```

<br>
<br>

#### **unlink()**
<br>

```
unlink(path) : Promise
```
* Delete symbolic link
* _Promise_ fulfills with _undefined_

<br>

```javascript
import { unlink } from 'node:fs/promises';

await unlink('path');
```

<br>
<br>

### **Symbolic Links**
<br>
<br>

#### **symlink()**
<br>

```
symlink(target, path, [type]) : Promise
```
* creates symbolic link
* type = ['dir', 'file', 'junction'] (Windows only)
* _Promise_ fulfills with _undefined_

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
* _Promise_ fulfills with _undefined_ or with first created directory path if _recursive_ is true

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

* _Promise_ fulfills with file system path of temporary directory
* creates unique temporary directory
* directory name: prefix + 6 random characters

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

* opens a [fs.Dir](../objects/nodeJS_fs_dir.md) object for a directory

<br>

```
opendir(path, option) : Promise

option = {
  encoding : string(utf8')
  bufferSize : int(32)
}
```

<br>

* Promise fulfills with [fs.Dir](../objects/nodeJS_fs_dir.md)
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
* Promise fulfills to [fs.Stats](./filesystem/objects/nodeJS_fs_stats.md)

<br>

```javascript
import { stat } from 'node:fs/promises';

const statsObject = await stat('path');
```