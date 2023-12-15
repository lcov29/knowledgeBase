# **NodeJS Writable Stream**
<br>

## **Table Of Contents**
<br>

- [**NodeJS Writable Stream**](#nodejs-writable-stream)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**fs.WriteStream**](#fswritestream)
    - [**Events**](#events)
      - [**close**](#close)
      - [**open**](#open)
      - [**ready**](#ready)
    - [**Properties**](#properties)
      - [**bytesWritten**](#byteswritten)
    - [**Methods**](#methods)
      - [**write()**](#write)
      - [**setDefaultEncoding()**](#setdefaultencoding)
      - [**end()**](#end)

<br>
<br>
<br>

## **General**
<br>

<br>
<br>
<br>

## **fs.WriteStream**
<br>
<br>

### **Events**
<br>
<bt>

#### **close**
<br>

#### **open**
<br>

#### **ready**
* immediately fired after _open_

<br>
<br>

### **Properties**
<br>
<br>

#### **bytesWritten**
* returns number of written bytes

<br>
<br>

### **Methods**
<br>
<br>

#### **write()**
<br>

```
write(chunk, [encoding], [callback]) : boolean

chunk : <string | Buffer>
encoding : string (Default: utf8)
callback : function
```
* _callback_: executed when data chunk is flushed
* returns boolean indicating whether stream wants caller to wait for _drain_ event before writing additional data

<br>
<br>

#### **setDefaultEncoding()**
<br>

```
setDefaultEncoding(encoding : string)
```

<br>
<br>

#### **end()**
<br>

```
end([chunk], [encoding], [callback])
```