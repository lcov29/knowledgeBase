# **NodeJS Filesystem Streams**
<br>

## **Table Of Contents**
<br>

- [**NodeJS Filesystem Streams**](#nodejs-filesystem-streams)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**fs.ReadStream**](#fsreadstream)
    - [**Properties**](#properties)
      - [**bytesRead**](#bytesread)
      - [**path**](#path)
      - [**pending**](#pending)
      - [**destroyed**](#destroyed)
      - [**readable**](#readable)
      - [**readableEnded**](#readableended)
      - [**readableHighWaterMark**](#readablehighwatermark)
      - [**readableLength**](#readablelength)
    - [**Methods**](#methods)
      - [**destroy([error])**](#destroyerror)
      - [**isPaused()**](#ispaused)
      - [**pause()**](#pause)
      - [**pipe()**](#pipe)
      - [**unpipe()**](#unpipe)
      - [**read()**](#read)
      - [**resume()**](#resume)
      - [**setEncoding()**](#setencoding)
  - [**Example**](#example)
    - [**Open Stream**](#open-stream)

<br>
<br>
<br>

## **General**
<br>

<br>
<br>
<br>

## **fs.ReadStream**
<br>
<br>

### **Properties**
<br>
<br>

#### **bytesRead**
* number of read bytes

<br>

#### **path**
* path to file the stream is reading from

<br>

#### **pending**
* boolean indicating if file has not been opened yet

<br>

#### **destroyed**
* boolean indicating whether _destroy()_ has been called

<br>

#### **readable**
* boolean indicating whether _read()_ is safe to call

<br>

#### **readableEnded**
* boolean indication whether _end_ event is emmitted

<br>

#### **readableHighWaterMark**
<br>

#### **readableLength**
* return number of bytes in buffer

<br>





<br>
<br>

### **Methods**
<br>

#### **destroy([error])**
<br>
<br>

#### **isPaused()**
<br>
<br>

#### **pause()**
<br>
<br>

#### **pipe()**
<br>

```
pipe(destination, [option])

option = {
    end : boolean (Default: true)
}
```
* attaches _Writable_ stream to _Readable_
* cause _Readable_ to push all of its data to _Writable_
* NOTE: _Writable_ is not closed automatically when _Readable_ throws error

<br>

```javascript
readable.pipe(writable);
```

<br>
<br>

#### **unpipe()**
<br>

```
unpipe([destination])
```
* detach _Writable_ stream previously attached by _pipe()

<br>
<br>

#### **read()**
<br>

```
read(size) : <string | Buffer>
```
* NOTE: Should only be called when stream is paused
* read and return data from internal buffer
* returns data as _Buffer_ by default / Configuration via readable.setEncoding()
* _size_ specifies number of bytes

<br>
<br>

#### **resume()**
* resume explicitly paused stream to emit _data_ events
* can be used to consume data from stream without processing

<br>
<br>

#### **setEncoding()**
* Encoding default is _Buffer_
* 



<br>
<br>

## **Example**
<br>
<br>

### **Open Stream**
<br>

```javascript
import { open } from 'node:fs/promises';

const fileHandle = await open('/path/file', 'wx+');
const readStream = fileHandle.createReadStream();
```

