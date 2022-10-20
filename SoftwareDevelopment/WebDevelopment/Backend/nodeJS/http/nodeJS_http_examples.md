# **NodeJS HTTP Examples**
<br>

## **Table Of Contents**
<br>

- [**NodeJS HTTP Examples**](#nodejs-http-examples)
  - [**Table Of Contents**](#table-of-contents)
  - [**HTTP**](#http)
    - [**HTTP Client: Fetch HTML Data Via GET-Method**](#http-client-fetch-html-data-via-get-method)
    - [**HTTP Server: Process GET Requests**](#http-server-process-get-requests)
  - [**HTTPS**](#https)
    - [**HTTPS Client: Fetch HTML Data Via GET-Method**](#https-client-fetch-html-data-via-get-method)
    - [**HTTPS Server: Basic**](#https-server-basic)
    - [**HTTPS Server: GET And POST**](#https-server-get-and-post)
  - [**HTTP2**](#http2)
    - [**HTTP2 Server: Basic**](#http2-server-basic)

<br>
<br>
<br>

## **HTTP**
<br>
<br>

### **HTTP Client: Fetch HTML Data Via GET-Method**
<br>

```javascript
import { get } from 'node:http';
import { writeFile } from 'node:fs/promises';
import { URL } from 'node:url';


let rawData = ''


function dataListener(chunk) {
    console.log('reading data...');
    rawData += chunk;
}


async function endListener() {
    console.log('writing read data to file...');
    const fileURL = new URL('./fetchedWebsite.html', import.meta.url);
    await writeFile(fileURL, rawData);
    rawData = '';
}


function errorListener(error) {
    console.log('==== ERROR ====');
    console.log(error);
}


get('http://www.google.com', (response) => {
    response.setEncoding('utf8');
    response.addListener('data', dataListener);
    response.addListener('end', endListener);
    response.addListener('error', errorListener);
});
```

<br>
<br>

### **HTTP Server: Process GET Requests**
<br>

Server can only handle html documents

<br>

```javascript
import http from 'node:http';
import { readFile } from 'node:fs/promises';
import { URL } from 'node:url';

const port = 3000;
let is404 = false;


async function getFileContentForRoute(route) {
    try {
        const serverFileURL = import.meta.url;
        const encodingObject = {encoding: 'utf8'};
        let fileURL = '';
        is404 = false;
    
        switch (route) {
            case '/':
            case '/index':
            case '/index.html':
                fileURL = new URL('./index.html', serverFileURL);
                return await readFile(fileURL, encodingObject);
    
            case '/files':
            case '/files/fileA':
            case '/files/fileA.html':
                fileURL = new URL('./files/fileB.html', serverFileURL);
                return await readFile(fileURL, encodingObject);
    
            case '/files/subdirectory/':
            case '/files/subdirectory/fileB':
            case '/files/subdirectory/fileB.html':
                fileURL = new URL('./files/subdirectory/fileB.html', serverFileURL);
                return await readFile(fileURL, encodingObject);
    
            default:
                is404 = true;
                fileURL = new URL('./404.html', serverFileURL);
                return await readFile(fileURL, encodingObject);
        }
    } catch(error) {
        console.log('Attempt to open non existing file: Fallback to 404.html');
        const fileURL = new URL('./404.html', import.meta.url);
        return await readFile(fileURL, {encoding: 'utf8'});
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

<br>
<br>
<br>

## **HTTPS**
<br>
<br>


### **HTTPS Client: Fetch HTML Data Via GET-Method**
<br>

```javascript
import { get } from 'node:https';
import { writeFile } from 'node:fs/promises';
import { URL } from 'node:url';


let rawData = ''


function dataListener(chunk) {
    console.log('reading data...');
    rawData += chunk;
}


async function endListener() {
    console.log('writing read data to file...');
    const fileURL = new URL('./fetchedWebsite.html', import.meta.url);
    await writeFile(fileURL, rawData);
    rawData = '';
}


function errorListener(error) {
    console.log('==== ERROR ====');
    console.log(error);
}


get('https://www.google.com', (response) => {
    response.setEncoding('utf8');
    response.addListener('data', dataListener);
    response.addListener('end', endListener);
    response.addListener('error', errorListener);
});
```

<br>
<br>

### **HTTPS Server: Basic**
<br>

Assume we have a certificate _certificate.pem_ and private key _privateKey.pem_ in same directory.

For creating a certificate see [openssl](../../../../../Tools/openssl/openssl.md).

<br>

```javascript
import https from 'node:https';
import { readFile } from 'node:fs/promises';
import { URL } from 'node:url';

const port = 3000;
const encoding = 'utf8';

const certificateURL = new URL('./certificate.pem', import.meta.url);
const privateKeyURL = new URL('./privateKey.pem', import.meta.url);

const certificate = await readFile(certificateURL, encoding);
const privateKey = await readFile(privateKeyURL, encoding);
const options = {cert: certificate, key: privateKey};

const server = https.createServer(options, (request, response) => {
    response.writeHead(200, {'content-type': 'text/html'});
    response.write('<h1>Hello HTTPS Server</h1>');
    response.end();
});

server.listen(port);
```

<br>
<br>

### **HTTPS Server: GET And POST**
<br>

Assume we have a certificate _certificate.pem_ and private key _privateKey.pem_ in same directory.

For creating a certificate see [openssl](../../../../../Tools/openssl/openssl.md).

<br>

```javascript
import https from 'node:https';
import { readFile, appendFile } from 'node:fs/promises';
import { URL } from 'node:url';

const port = 3000;
const encoding = 'utf8';

const certificateURL = new URL('./certificate.pem', import.meta.url);
const privateKeyURL = new URL('./privateKey.pem', import.meta.url);

const certificate = await readFile(certificateURL, encoding);
const privateKey = await readFile(privateKeyURL, encoding);
const options = {cert: certificate, key: privateKey};


function handleGetRequest(response) {
    response.writeHead(200, {'content-type': 'text/html'});
    response.write('<h1>Hello HTTPS Server</h1>');
    response.end();
}


function handlePostRequest(request, response) {
    let postData = '';

    function dataListener(chunk) {
        postData += chunk;
    }

    async function endListener() {
        const fileURL = new URL('./PostData.log', import.meta.url);
        const content = `${Date()}, Host: ${request.host}, POST Data: ${postData}\n`;
        await appendFile(fileURL, content, 'utf8');

        response.writeHead(200, {'content-type': 'text/html'});
        response.write(`POST data received from client:\n${postData}`);
        response.end();
    }

    request.addListener('data', dataListener);
    request.addListener('end', endListener);
}


const server = https.createServer(options, (request, response) => {
    switch(request.method) {
        case 'GET':
            handleGetRequest(response);
            break;
        case 'POST':
            handlePostRequest(request, response);
            break;
    }

});

server.listen(port);
```

<br>
<br>
<br>

## **HTTP2**
<br>
<br>

### **HTTP2 Server: Basic**
<br>

Assume we have a certificate _certificate.pem_ and private key _privateKey.pem_ in same directory.

For creating a certificate see [openssl](../../../../../Tools/openssl/openssl.md).

<br>

```javascript
import { createSecureServer } from 'node:http2';
import { readFile } from 'node:fs/promises';

const port = 3000;
const encoding = 'utf8';

const certificateURL = new URL('./certificate.pem', import.meta.url);
const privateKeyURL = new URL('./privateKey.pem', import.meta.url);

const certificate = await readFile(certificateURL, encoding);
const privateKey = await readFile(privateKeyURL, encoding);
const options = {cert: certificate, key: privateKey};


const server = createSecureServer(options, (request, response) => {
    response.writeHead(200, {'content-type': 'text/html'});
    response.write(`<h1>Hello HTTP2 Server</h1>`);
    response.end();
});

server.listen(port);
```