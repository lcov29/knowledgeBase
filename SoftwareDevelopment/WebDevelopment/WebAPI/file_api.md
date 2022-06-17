# **File API**
<br>

## **Table Of Contents**
<br>

- [**File API**](#file-api)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Blob**](#blob)
    - [**Constructor**](#constructor)
    - [**Properties**](#properties)
      - [**size**](#size)
      - [**type**](#type)
    - [**Methods**](#methods)
      - [**arrayBuffer()**](#arraybuffer)
      - [**slice([start], [end], [contentType])**](#slicestart-end-contenttype)
      - [**stream()**](#stream)
      - [**text()**](#text)
  - [**File**](#file)
    - [**Constructor**](#constructor-1)
    - [**Properties**](#properties-1)
      - [**lastModified**](#lastmodified)
      - [**name**](#name)
      - [**type**](#type-1)
  - [**FileList**](#filelist)
    - [**Properties**](#properties-2)
      - [**length**](#length)
    - [**Methods**](#methods-1)
      - [**item(index)**](#itemindex)
  - [**FileReader**](#filereader)
    - [**Constructor**](#constructor-2)
    - [**Properties**](#properties-3)
      - [**error**](#error)
      - [**readyState**](#readystate)
      - [**result**](#result)
    - [**Methods**](#methods-2)
      - [**abort()**](#abort)
      - [**readAsArrayBuffer(blob)**](#readasarraybufferblob)
      - [**readAsBinaryString(blob)**](#readasbinarystringblob)
      - [**readAsDataURL(blob)**](#readasdataurlblob)
      - [**readAsText(blob, [encoding])**](#readastextblob-encoding)
  - [**Events**](#events)
  - [**Examples**](#examples)
    - [**Listing File Properties**](#listing-file-properties)
    - [**Implement Custom Upload Interface**](#implement-custom-upload-interface)
    - [**Drag And Drop**](#drag-and-drop)
    - [**Display Uploaded Files**](#display-uploaded-files)


<br>
<br>
<br>
<br>

## **General**
<br>

File API allows web applications to access files that a user has made available via a \<input type="file"> element or via drag and drop.
<br>
Available files are represented as File objects stored in a FileList object. FileReader objects can access the content of File objects.

<br>
<br>
<br>
<br>

## **Blob**
<br>

Blob (**B**inary **L**arge **Ob**ject) object contains raw data (text or binary) that is immutable.

<br>
<br>

### **Constructor**
<br>

```javascript
new Blob(array, [options]);
```

<br>

Parameters:

* _array_
  * array of one or more ArrayBuffer, TypedArray, DataView, Blob and String objects

<br>

* _options_ (optional object)
  * _type_
	* mime type of blob data (default "")
  * endings
	* _endings_

<br>
<br>
<br>

### **Properties**
<br>
<br>

#### **size**
* size in bytes

<br>
<br>

#### **type**
* returns MIME type

<br>
<br>
<br>

### **Methods**
<br>
<br>

#### **arrayBuffer()**
* returns _Promise_ object resolving to the blob content as binary data within an _ArrayBuffer_ object

<br>
<br>

#### **slice([start], [end], [contentType])**
* returns blob object with subset of content

Parameters:

* start (optional)
  * index of first byte to include (default 0)
  
* end (optional)
  * first byte **Not** to include (default size)
  
* contentType (optional)
  * value of _type_ property of new blob object
  
<br>
<br>

#### **stream()**
* returns _ReadableStream_ object (Streams API) which returns data from blob

<br>
<br>

#### **text()**
* returns _Promise_ resolving to content of blob as UTF_8 string

<br>
<br>
<br>
<br>

## **File**
<br>

File objects are special BLOBs and are usually retrieved from a FileList object.

<br>
<br>
<br>

### **Constructor**
<br>

```javascript
new File(bits, name, [options]);
```

<br>

Parameters:

* _bits_
  * array of one or more ArrayBuffer, TypedArray, DataView, Blob and String objects
  
* _name_
  * file name of path to file
  
* _options_ (optional)
  * _type_
    * MIME type of content
  * _lastModified_
    * number of milliseconds beween UNIX time epoch and last modification
    
<br>
<br>
<br>

### **Properties**
<br>
<br>

#### **lastModified**
* returns number of milliseconds between UNIX time epoch and last modification

<br>
<br>

#### **name**
* returns file name without path

<br>
<br>

#### **type** 
* returns MIME type of file

<br>
<br>
<br>
<br>

## **FileList**
<br>

Returned by \<input> element or by Drag And Drop API

<br>
<br>

### **Properties**
<br>
<br>

#### **length**
* returns number of files in list

<br>
<br>
<br>

### **Methods**
<br>
<br>

#### **item(index)**
* returns _File_ object for specified index

<br>
<br>
<br>
<br>

## **FileReader**
<br>

Asynchronously read fie content

<br>
<br>
<br>

### **Constructor**
<br>

```javascript
new FileReader()
```

<br>
<br>
<br>

### **Properties**
<br>
<br>

#### **error**
* returns error object for failed reading attempt

<br>
<br>

#### **readyState**
* returns state of read operation

<br>

|Value|State  |Description
|:----|:------|:----------
|0    |EMPTY  |No read method called yet
|1    |LOADING|read method called
|2    |DONE   |read complete

<br>
<br>

#### **result**
* returns file content as string or ArrayBuffer after successful read operation
* format depends on read operation method call

<br>
<br>
<br>

### **Methods**
<br>
<br>

#### **abort()**
* aborts read operation and set _readyState_ to DONE

<br>
<br>

#### **readAsArrayBuffer(blob)**
* read content as ArrayBuffer into _result_ property
* promise based alternative: [Blob.arrayBuffer()](#arraybuffer)

<br>
<br>

#### **readAsBinaryString(blob)**
* read content as raw binary data into _result_ property
* USAGE IS DISCOURAGED! Use method [readAsArrayBuffer()](#readasarraybufferblob) instead

<br>
<br>

#### **readAsDataURL(blob)**
* read content as data: URL into _result_ property

<br>
<br>

#### **readAsText(blob, [encoding])**
* read content as string into _result_ property
* promise based alternative [Blob.text()](#text)

<br>
<br>
<br>
<br>

## **Events**
<br>
<br>

|Event      |Description
|:----------|:------------------------------------------
|abort      |read aborted
|error      |read failed
|load       |read successful
|loadend    |read completed (successful or unsuccessful)
|loadstart  |read operation started
|progress   |fired periodically during read operation

<br>
<br>
<br>
<br>

## **Examples**
<br>
<br>

### **Listing File Properties**
<br>

```html
<input type="file" id="input" multiple>
```

<br>

```javascript
const fileInput = document.getElementById('input');
fileInput.addEventListener('change', listFileProperties, false);

function listFileProperties() {
  const fileList = this.files;
  for (let i = 0; i < fileList.length; i++) {
    const file = fileList[i];
    console.log(`${file.name} (${file.type}, ${file.size}B)`);
  }
}
```

<br>
<br>
<br>

### **Implement Custom Upload Interface**
<br>

```html
<input type="file" id="input" style="display:none" multiple>
<button id="customUploadButton">Upload Files</button>
```

<br>

```javascript
/* add event listener for <input> element*/

const customUploadButton = document.getElementById('customUploadButton');
customUploadButton.addEventListener('click', () => document.getElementById('input').click());
```

<br>
<br>
<br>

### **Drag And Drop**
<br>

```html
<div id="dropArea">Drop Files Here</div>
```

<br>

```javascript
let dropArea = document.getElementById('dropArea');
dropArea.addEventListener('dragenter', dragenter, false);
dropArea.addEventListener('dragover', dragover, false);
dropArea.addEventListener('drop', drop, false);

function dragenter(e) {
  e.stopPropagation();
  e.preventDefault();
  console.log('dragenter');
}

function dragover(e) {
  e.stopPropagation();
  e.preventDefault();
  console.log('dragover');
}

function drop(e) {
  e.stopPropagation();
  e.preventDefault();
  handleFiles(e.dataTranser.files);
}

function handleFiles(files) {
  for (let i = 0; i < files.length; i++) {
    console.log(files[i].name);
  }
}
```

<br>
<br>
<br>

### **Display Uploaded Files**
<br>

```html
<div id="dropbox">Drop Files Here</div>
<div id="imageDisplayArea"></div>
```

<br>

```javascript
let dropbox = document.getElementById('dropbox');
dropbox.addEventListener('dragenter', dragenter, false);
dropbox.addEventListener('dragover', dragover, false);
dropbox.addEventListener('drop', drop, false);

function dragenter(e) {
  e.stopPropagation();
  e.preventDefault();
  console.log('dragenter');
}

function dragover(e) {
  e.stopPropagation();
  e.preventDefault();
  console.log('dragover');
}

function drop(e) {
  e.stopPropagation();
  e.preventDefault();
  const dt = e.dataTransfer;
  const files = dt.files;
  handleFiles(files);
}

function handleFiles(files) {
  for (let i = 0; i < files.length; i++) {
    const file = files[i];
    if (!file.type.startsWith('image/')) { continue}
    const img = document.createElement('img');
    img.file = file;
    document.getElementById('imageDisplayArea').appendChild(img);

    const reader = new FileReader();
    reader.onload = (function(aImg) {return function(e) {aImg.src = e.target.result;};})(img);
    reader.readAsDataURL(file);
  }
}
```