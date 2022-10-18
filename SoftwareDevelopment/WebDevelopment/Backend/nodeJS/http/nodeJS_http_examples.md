# **NodeJS HTTP Examples**
<br>

## **Table Of Contents**
<br>

- [**NodeJS HTTP Examples**](#nodejs-http-examples)
  - [**Table Of Contents**](#table-of-contents)
  - [**Fetch HTML Data Via GET-Method**](#fetch-html-data-via-get-method)
  - [**Simple HTTP Server**](#simple-http-server)
  - [**HTTPS Server**](#https-server)

<br>
<br>
<br>

## **Fetch HTML Data Via GET-Method**
<br>

```javascript
import { get } from 'node:https';
import { writeFile } from 'node:fs/promises';
import { join } from 'node:path';
import { URL } from 'node:url';

let rawData = ''

function dataListener(chunk) {
    console.log('reading data...');
    rawData += chunk;
}

async function endListener() {
    console.log('writing read data to file...');
    const dirname = new URL('.', import.meta.url).pathname;
    const filePath = join(dirname, 'fetchedWebsite.html');
    await writeFile(filePath, rawData);
    rawData = '';
}

function errorListener(error) {
    console.log(error);
}

get('https://www.google.com/', (response) => {
    response.setEncoding('utf8');
    response.addListener('data', dataListener);
    response.addListener('end', endListener);
    response.addListener('error', errorListener);
});
```

<br>
<br>
<br>

## **Simple HTTP Server**
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

<br>
<br>
<br>

## **HTTPS Server**
<br>

Assume we have a certificate _certificate.pem_ and private key _privateKey.pem_ in same directory.

For creating a certificate see [openssl](../../../../../Tools/openssl/openssl.md).

<br>

```javascript
import https from 'node:https';
import { readFile } from 'node:fs/promises';
import { join } from 'node:path';
import { URL } from 'node:url';

const port = 3000;
const dirname = new URL('.', import.meta.url).pathname;
const certificateFilePath = join(dirname, 'certificate.pem');
const privateKeyFilePath = join(dirname, 'privateKey.pem');


const certificate = await readFile(certificateFilePath, {encoding: 'utf8'});
const key = await readFile(privateKeyFilePath, {encoding: 'utf8'});


const server = https.createServer({ cert: certificate, key }, (request, response) => {
    response.writeHead(200, {'content-type': 'text/html'});
    response.write('Hello HTTPS Server');
    response.end();
});

server.listen(port);
```