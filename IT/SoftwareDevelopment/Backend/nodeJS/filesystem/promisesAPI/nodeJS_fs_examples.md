# **NodeJS File System Examples**
<br>

## **Table Of Contents**
<br>

- [**NodeJS File System Examples**](#nodejs-file-system-examples)
  - [**Table Of Contents**](#table-of-contents)
  - [**Promise API**](#promise-api)
  - [**FileHandle**](#filehandle)

<br>
<br>
<br>

## **Promise API**
<br>
<br>

```javascript
import fs from 'node:fs/promises';
import { join } from 'node:path';
import { URL } from 'node:url';


try {

    const dirname = new URL('.', import.meta.url).pathname;


    // create directory
    const directoryPath = join(dirname, 'subdirectory1', 'subdirectory2');
    await fs.mkdir(directoryPath, {recursive: true});


    // create and (over-)write to file
    const fileName = 'fileName.txt';
    const filePath = join(directoryPath, fileName);
    const fileContent = 'Content Line 1\nContent Line 2\nContent Line 3\n';
    await fs.writeFile(filePath, fileContent);


    // append content to file
    const additionalFileContent = 'Content Line 4\nContent Line 5\n';
    await fs.appendFile(filePath, additionalFileContent);


    // rename folder
    const newDirectoryPath = join(dirname, 'subdirectory1', 'renamedSubDirectory');
    await fs.rename(directoryPath, newDirectoryPath);


    // rename file
    const newFileName = 'renamedFileName.txt';
    const currentFilePath = join(newDirectoryPath, fileName);
    const newFilePath = join(newDirectoryPath, newFileName);
    await fs.rename(currentFilePath, newFilePath);


    // copy file
    const copyFileName = 'copiedFileName.txt';
    const copyFilePath = join(newDirectoryPath, copyFileName);
    await fs.copyFile(newFilePath, copyFilePath);


    // truncate file
    await fs.truncate(newFilePath);


    // remove file
    await fs.rm(newFilePath);


    // remove directory with all subdirectories and files
    const directoryToRemove = join(dirname, 'subdirectory1');
    await fs.rm(directoryToRemove, {recursive: true});


} catch(error) {
    console.log(error);
}
```

<br>
<br>
<br>

## **FileHandle**
<br>
<br>

```javascript
import fs from 'node:fs/promises';
import { join } from 'node:path';


let fileHandle = null;

try {

    const dirname = new URL('.', import.meta.url).pathname;
    const filePath = join(dirname, 'testFileHandle.txt');

    // create file handle (a+: read and append, create file if it not already exists)
    fileHandle = await fs.open(filePath, 'w+');
    
    // append content
    await fileHandle.writeFile('Content Line 1\nContent Line 2', 'utf8');
    await fileHandle.truncate(10);

    // read File
    const fileContent = await fs.readFile(filePath, 'utf8');
    console.log(fileContent);

} catch(error) {

    console.log(error); 

} finally {

    // explicitly close file handle to prevent memory leak
    await fileHandle?.close();
    console.log('file handle closed');

}
```