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
    - [**Read Files**](#read-files)
      - [**readFile()**](#readfile)
    - [**Update Files**](#update-files)
      - [**appendFile()**](#appendfile)
      - [**copyFile()**](#copyfile)
    - [**Delete Files**](#delete-files)
    - [**Rename Files**](#rename-files)
    - [**File Handles**](#file-handles)
      - [**open()**](#open)
    - [**Permissions**](#permissions)
      - [**access()**](#access)
      - [**chmod()**](#chmod)
      - [**chown()**](#chown)
    - [**Other**](#other)
      - [**link()**](#link)
  - [**Directories**](#directories)
    - [**Create Directories**](#create-directories)
      - [**mkdir()**](#mkdir)
      - [**mkdtemp()**](#mkdtemp)
    - [**Copy Directories**](#copy-directories)
      - [**cp() (EXPERIMENTAL)**](#cp-experimental)

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

* [**appendFile()**](#appendfile)

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
  encoding : <string>,
  flag : <string>,
  signal : <AbortSignal>
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

### **Delete Files**
<br>
<br>

### **Rename Files**
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
import { open } from 'node:open/promises';

const fileHandle = await open('/path/file', 'wx+');
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

* copies entire directory including subdirectories 