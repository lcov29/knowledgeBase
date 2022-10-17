# **NodeJS HTTP Module**
<br>

## **Table Of Contents**
<br>

- [**NodeJS HTTP Module**](#nodejs-http-module)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Server**](#server)
    - [**Properties**](#properties)
      - [**headersTimeout**](#headerstimeout)
      - [**listening**](#listening)
      - [**maxHeadersCount**](#maxheaderscount)
      - [**requestTimeout**](#requesttimeout)
      - [**maxRequestsPerSocket**](#maxrequestspersocket)
      - [**timeout**](#timeout)
      - [**keepAliveTimeout**](#keepalivetimeout)
    - [**Methods**](#methods)
      - [**close()**](#close)
      - [**listen()**](#listen)
  - [**Example**](#example)

<br>
<br>
<br>

## **General**
<br>

HTTP interface offers many features of the protocol.

<br>
<br>
<br>

## **Server**
<br>
<br>

### **Properties**
<br>
<br>

#### **headersTimeout**
* amount of time the parser will wait to receive complete HTTP headers

<br>
<br>

#### **listening**
* return boolean indicating whether server listens for connections

<br>
<br>

#### **maxHeadersCount**
* limits maximum incoming headers

<br>
<br>

#### **requestTimeout**
* timeout in milliseconds fot receiving entire request from client

<br>
<br>

#### **maxRequestsPerSocket**
* maximum number of handable requests before closing keep alive connection

<br>
<br>

#### **timeout**
* number of milliseconds of inactivity before socket is presumed to have timed out

<br>
<br>

#### **keepAliveTimeout**
* number of milliseconds of inactivity server needs to wait for additional incoming data before socket is destroyed

<br>
<br>

### **Methods**
<br>
<br>

#### **close()**
<br>

```
close([callback])
```
* stop server from accepting new connections

<br>
<br>

#### **listen()**
<br>

```
listen(port)
```
* start server to accept new connections

<br>
<br>

## **Example**
<br>

```javascript
import http from 'node:http';
import { readFile } from 'node:fs/promises';
import { join } from 'node:path';
import { URL } from 'node:url';

const port = 3000;
let is404 = false;


async function getFileContentForRoute(route) {
    const dirname = new URL('.', import.meta.url).pathname;
    const encodingObject = {encoding: 'utf8'};
    let filePath = '';
    is404 = false;

    switch (route) {
        case '/':
        case '/index':
        case '/index.html':
            filePath = join(dirname, 'index.html');
            return await readFile(filePath, encodingObject);

        case '/files':
        case '/files/someFile':
        case '/files/someFile.html':
            filePath = join(dirname, 'files', 'someFile.html');
            return await readFile(filePath, encodingObject);

        case '/files/subdirectory/':
        case '/files/subdirectory/someOtherFile':
        case '/files/subdirectory/someOtherFile.html':
            filePath = join(dirname, 'files', 'subdirectory', 'someOtherFile.html');
            return await readFile(filePath, encodingObject);

        default:
            is404 = true;
            filePath = join(dirname, '404.html');
            return await readFile(filePath, encodingObject);
    }

}


function getStatusCode() {
    const statusCode = is404 ? 404 : 200;
    return statusCode;
}


const server = http.createServer(async (request, response) => {
    console.log(request.url);
    const fileContent = await getFileContentForRoute(request.url);
    response.writeHead(getStatusCode(), { 'content-type': 'text/html'});
    response.write(fileContent);
    response.end();
});

server.listen(port);
```
