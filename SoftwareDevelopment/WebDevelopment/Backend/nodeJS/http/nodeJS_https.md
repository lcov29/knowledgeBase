# **NodeJS HTTPS**
<br>

## **Table Of Contents**
<br>

- [**NodeJS HTTPS**](#nodejs-https)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
    - [**createServer()**](#createserver)
    - [**request()**](#request)
    - [**get()**](#get)
  - [**Server**](#server)
    - [**Properties**](#properties)
      - [**headersTimeout**](#headerstimeout)
      - [**requestTimeout**](#requesttimeout)
      - [**keepAliveTimeout**](#keepalivetimeout)
      - [**timeout**](#timeout)
      - [**maxHeadersCount**](#maxheaderscount)
    - [**Methods**](#methods)
      - [**listen()**](#listen)
      - [**close()**](#close)
      - [**setTimeout()**](#settimeout)

<br>
<br>
<br>

## **General**
<br>
<br>

### **createServer()**
<br>

```
createServer([options], [requestListener]) : https.Server
```
* options must contain both a _certificate_ and a _key_

<br>

```javascript
const key = fs.readFileSync('path/to/keyfile.pem');
const cert = fs.readFileSync('path/to/certfile.pem');
const options = { key, cert };
const port = 3000;

const server = https.createServer(options, (request, response) => {
    response.writeHead(200);
    response.write('Hello HTTPS');
    response.end();
});

server.listen(port);
```

<br>
<br>

### **request()**
<br>

```[](https://nodejs.org/dist/latest-v16.x/docs/api/cli.html)
request(url, [options], [callback]) : http.ClientRequest
```
* makes a request to a secure webserver
* options like [_https.request()_](./nodeJS_http.md#request) with following exceptions:
  * protocol : string (Default: https)
  * port : number (Default: 443)
  * agent : http.agent (Default: https.globalAgent)

<br>
<br>

### **get()**
<br>

```
get(url, [options], [callback])
```
* convenience method for get requests
* callback has to consume the response data

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

#### **requestTimeout**
* timeout in milliseconds fot receiving entire request from client

<br>
<br>

#### **keepAliveTimeout**
* number of milliseconds of inactivity server needs to wait for additional incoming data before socket is destroyed

<br>
<br>

#### **timeout**
* number of milliseconds of inactivity before socket is presumed to have timed out

<br>
<br>

#### **maxHeadersCount**
* limits maximum incoming headers

<br>
<br>

### **Methods**
<br>
<br>

#### **listen()**
* start listening for encrypted connections

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

#### **setTimeout()**
<br>

```
setTimeout([milliseconds], [callback]) : https.server
```
* set timeout for sockets and emits a _timeout_ event on server object
