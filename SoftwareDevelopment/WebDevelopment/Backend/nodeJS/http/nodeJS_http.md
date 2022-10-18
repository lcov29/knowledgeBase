# **NodeJS HTTP Module**
<br>

## **Table Of Contents**
<br>

- [**NodeJS HTTP Module**](#nodejs-http-module)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
    - [**Properties**](#properties)
      - [**METHODS**](#methods)
      - [**STATUS_CODES**](#status_codes)
    - [**Methods**](#methods-1)
      - [**createServer()**](#createserver)
      - [**request()**](#request)
      - [**get()**](#get)
  - [**Server**](#server)
    - [**Properties**](#properties-1)
      - [**headersTimeout**](#headerstimeout)
      - [**listening**](#listening)
      - [**maxHeadersCount**](#maxheaderscount)
      - [**requestTimeout**](#requesttimeout)
      - [**maxRequestsPerSocket**](#maxrequestspersocket)
      - [**timeout**](#timeout)
      - [**keepAliveTimeout**](#keepalivetimeout)
    - [**Methods**](#methods-2)
      - [**close()**](#close)
      - [**listen()**](#listen)
  - [**Client Request**](#client-request)
    - [**Properties**](#properties-2)
      - [**path**](#path)
      - [**method**](#method)
      - [**host**](#host)
      - [**protocol**](#protocol)
      - [**writableEnded**](#writableended)
      - [**writableFinished**](#writablefinished)
      - [**destroyed**](#destroyed)
      - [**maxHeadersCount**](#maxheaderscount-1)
    - [**Methods**](#methods-3)
      - [**write()**](#write)
      - [**end()**](#end)
      - [**destroy()**](#destroy)
      - [**flushHeaders()**](#flushheaders)
      - [**getHeaders()**](#getheaders)
      - [**hasHeader()**](#hasheader)
      - [**getHeader()**](#getheader)
      - [**setHeader()**](#setheader)
      - [**removeHeader()**](#removeheader)
      - [**getHeaderNames()**](#getheadernames)
      - [**getRawHeaderNames()**](#getrawheadernames)
  - [**Server Response**](#server-response)
    - [**Properties**](#properties-3)
      - [**statusCode**](#statuscode)
      - [**statusMessage**](#statusmessage)
      - [**headersSent**](#headerssent)
      - [**req**](#req)
      - [**sendDate**](#senddate)
      - [**writableEnded**](#writableended-1)
      - [**writableFinished**](#writablefinished-1)
    - [**Methods**](#methods-4)
      - [**writeHead()**](#writehead)
      - [**write()**](#write-1)
      - [**end()**](#end-1)
      - [**flushHeaders()**](#flushheaders-1)
      - [**getHeaders()**](#getheaders-1)
      - [**hasHeader()**](#hasheader-1)
      - [**getHeader()**](#getheader-1)
      - [**setHeader()**](#setheader-1)
      - [**removeHeader()**](#removeheader-1)
      - [**getHeaderNames()**](#getheadernames-1)
      - [**addTrailers()**](#addtrailers)

<br>
<br>
<br>

## **General**
<br>
<br>

### **Properties**
<br>
<br>

#### **METHODS**
* return array off supported HTTP methods

<br>
<br>

#### **STATUS_CODES**
* return object containing all standard HTTP response status codes

<br>
<br>

### **Methods**
<br>
<br>

#### **createServer()**
<br>

```
createServer([options], [requestListener]) : http.Server

options = {
    IncomingMessage : http.IncomingMessage,
    ServerResponse : http.ServerResponse,
    insecureHTTPParser : boolean (Default: false),
    maxHeaderSize : number (Default: 16 KiB),
    noDelay : boolean (Default: false),
    keepAlive : boolean (Default: false),
    keepAliveInitialDelay : number (Default: 0),
    uniqueHeaders : array
}
```

<br>

```javascript
const server = http.createServer((request, response) => {
    response.writeHead(200, {'content-type': 'text/html'});
    response.write('Hello Node');
    response.end();
});
```

<br>
<br>

#### **request()**
<br>

```
request(url, [options], [callback]) : http.ClientRequest

options = {
    agent : <http.agent | boolean>,
    auth : <string> (Basic authentication string: 'user:password),
    createConnection : function,
    defaultPort : number (Default: undefined),
    family : <4 | 6> (Default: both IP v4 and IP v6),
    headers : object,
    host : string,
    hostname: string (alias for host),
    insecureHTTPParser : boolean (Default: false),
    localAddress : string,
    localPort : number,
    lookup : function (default: dns.lookup),
    maxHeaderSize : number,
    method : string (Default: GET),
    path : string (Should include query string, Default: /),
    port : number (Default: defaultPort or 80),
    protocol : string (Default: http),
    setHost : boolean (Degault: true),
    signal : AbortSignal,
    socketPath : string,
    timeout : number,
    uniqueHeaders : array
}
```
* callback has to concume the response data

<br>
<br>

#### **get()**
<br>

```
get(url, [options], [callback])

options = {
    agent : <http.agent | boolean>,
    auth : <string> (Basic authentication string: 'user:password),
    createConnection : function,
    defaultPort : number (Default: undefined),
    family : <4 | 6> (Default: both IP v4 and IP v6),
    headers : object,
    host : string,
    hostname: string (alias for host),
    insecureHTTPParser : boolean (Default: false),
    localAddress : string,
    localPort : number,
    lookup : function (default: dns.lookup),
    maxHeaderSize : number,
    method : string (Default: GET),
    path : string (Should include query string, Default: /),
    port : number (Default: defaultPort or 80),
    protocol : string (Default: http),
    setHost : boolean (Degault: true),
    signal : AbortSignal,
    socketPath : string,
    timeout : number,
    uniqueHeaders : array
}
```
* convenience method for get requests
* very similar to [_http.request()_](#request)
* callback has to concume the response data

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
<br>

## **Client Request**
<br>
<br>

### **Properties**
<br>
<br>

#### **path**

<br>
<br>

#### **method**

<br>
<br>

#### **host**

<br>
<br>

#### **protocol**

<br>
<br>

#### **writableEnded**
* boolean indicating whether [_request.end()_](#end) was called

<br>
<br>

#### **writableFinished**
* boolean indicating whether all data was flushed

<br>
<br>

#### **destroyed**
* boolean indicating whether [_destroy()_](#destroy) was called

<br>
<br>

#### **maxHeadersCount**
* limit for maximum response headers count

<br>
<br>

### **Methods**
<br>
<br>

#### **write()**
<br>

```
write(chunk, [encoding], [callback]) : boolean

chunk : <string | buffer>
encoding : string (Default: utf8)
callback : function
```
* write _chunk_ to request body

<br>
<br>

#### **end()**
<br>

```
end([data], [encoding], [callback])
```
* finishes sending request
* optional parameters _data_ and _encoding_ equals call of _write(data, encoding)_
* optional _callback_ is called after request finished

<br>
<br>

#### **destroy()**
<br>

```
destroy([error])
```
* destroy request and emit optional _error_

<br>
<br>

#### **flushHeaders()**
<br>

```
flushHeaders()
```

<br>
<br>

#### **getHeaders()**
<br>

```
getHeaders() : object
```
* return shallow copy of headers

<br>
<br>

#### **hasHeader()**
<br>

```
hasHeader(propertyName) : boolean
```
* returns boolean indicating whether header has _propertyName_ (case insensitive)

<br>
<br>

#### **getHeader()**
<br>

```
getHeader(propertyName) : any
```
* read _propertyName_ from request

<br>

```javascript
request.setHeader('content-type', 'text/javascript');
request.setHeader('cookie', ['type=ninja', 'language=javascript']);

request.getHeader('content-type');      // returns 'text/javascript'
```

<br>
<br>

#### **setHeader()**
<br>

```
setHeader(name, value) : any
```
* set single header value 
* overwrites already existing header value of same name

<br>
<br>

#### **removeHeader()**
<br>

```
removeHeader(propertyName)
```
* remove existing _propertyName_ from header

<br>
<br>

#### **getHeaderNames()**
<br>

```
getHeaderNames() : string[]
```
* return array with all current header names in lowercase

<br>
<br>

#### **getRawHeaderNames()**
<br>

```
getRawHeaderNames() : string[]
```
* return array with all current jeader names in exact casing

<br>
<br>
<br>

## **Server Response**
<br>
<br>

### **Properties**
<br>
<br>

#### **statusCode**
* return status code (default: 200)

<br>
<br>

#### **statusMessage**
* status message when using implicit headers (not via [_response.writeHead()_](#writehead))

<br>
<br>

#### **headersSent**
* boolean indicating wheter headers were sent

<br>
<br>

#### **req**
* reference to original request object

<br>
<br>

#### **sendDate**
* boolean indicating wheter date header weii be automatically generated

<br>
<br>

#### **writableEnded**
* boolean indicating whether [response.end()_](#end1) was called

<br>
<br>

#### **writableFinished**
* boolean indicating whether all data was flushed

<br>
<br>


<br>
<br>

### **Methods**
<br>
<br>

#### **writeHead()**
<br>

```
writeHead(statusCode, [statusMessage], [headers])
```
* add response header

<br>
<br>

#### **write()**
<br>

```
write(chunk, [encoding], [callback]) : boolean
```
* write _chunk_ to respnse body

<br>
<br>

#### **end()**
<br>

```
end([data], [encoding], [callback])
```
* signal to server that response is finished
* MUST be called for each response
* optional parameters _data_ and _encoding_ equals call of _write(data, encoding)_
* optional _callback_ is called after response finished

<br>
<br>

#### **flushHeaders()**
<br>

```
flushHeaders()
```

<br>
<br>

#### **getHeaders()**
<br>

```
getHeaders() : object
```
* return shallow copy of headers

<br>
<br>

#### **hasHeader()**
<br>

```
hasHeader(propertyName) : boolean
```
* returns boolean indicating whether header has _propertyName_ (case insensitive)

<br>
<br>

#### **getHeader()**
<br>

```
getHeader(propertyName) : any
```
* read _propertyName_ from request

<br>

```javascript
response.setHeader('content-type', 'text/javascript');
response.setHeader('cookie', ['type=ninja', 'language=javascript']);

response.getHeader('content-type');      // returns 'text/javascript'
```

<br>
<br>

#### **setHeader()**
<br>

```
setHeader(name, value)
```
* set single header value 
* overwrites already existing header value of same name


<br>
<br>

#### **removeHeader()**
<br>

```
removeHeader(propertyName)
```
* remove existing _propertyName_ from header

<br>
<br>

#### **getHeaderNames()**
<br>

```
getHeaderNames() : string[]
```
* return array with all current header names in lowercase

<br>
<br>

#### **addTrailers()**
<br>

```
addTrailers(headers)
```
* adds trailing headers to response
* only works for HTTP/1.0