# **NodeJS Express Basics**
<br>

## **Table Of Contents**
<br>

- [**NodeJS Express Basics**](#nodejs-express-basics)
  - [**Table Of Contents**](#table-of-contents)
  - [**Basics**](#basics)
  - [**Installation**](#installation)
  - [**Routing**](#routing)
    - [**Define Routes**](#define-routes)
    - [**Route Path**](#route-path)
    - [**Route Parameter**](#route-parameter)
    - [**Query Parameters**](#query-parameters)
  - [**Middleware**](#middleware)
    - [**Basic**](#basic)
    - [**Configuration**](#configuration)
    - [**Built-In Middleware**](#built-in-middleware)
      - [**express.static()**](#expressstatic)
      - [**express.json()**](#expressjson)
  - [**Request**](#request)
    - [**Properties**](#properties)
      - [**app**](#app)
      - [**baseUrl**](#baseurl)
      - [**body**](#body)
      - [**cookies**](#cookies)
      - [**fresh**](#fresh)
      - [**hostname**](#hostname)
      - [**ip**](#ip)
      - [**ips**](#ips)
      - [**method**](#method)
      - [**originalUrl**](#originalurl)
      - [**params**](#params)
      - [**path**](#path)
      - [**protocol**](#protocol)
      - [**query**](#query)
      - [**secure**](#secure)
      - [**subdomains**](#subdomains)
    - [**Methods**](#methods)
      - [**accepts()**](#accepts)
      - [**get()**](#get)
      - [**is()**](#is)
  - [**Response**](#response)
    - [**Methods**](#methods-1)
      - [**append()**](#append)
      - [**attachment()**](#attachment)
      - [**cookie()**](#cookie)
      - [**clearCookie()**](#clearcookie)
      - [**download()**](#download)
      - [**end()**](#end)
      - [**get()**](#get-1)
      - [**json()**](#json)
      - [**location()**](#location)
      - [**redirect()**](#redirect)
      - [**render()**](#render)
      - [**send()**](#send)
      - [**sendFile()**](#sendfile)
      - [**status()**](#status)
      - [**set()**](#set)

<br>
<br>
<br>

## **Basics**
<br>

Express is a web framework for Node.js. Its main features include:

<br>

- routing with parameterized URLs and querystrings
- middleware

<br>

Basic Usage

```javascript
import express from 'express';
import { createServer } from 'node:http';    // or https, http/2 ...

const app = express();
const server = createServer(app);

// add route handler and middleware to app

const port = 3000;
server.listen(port, () => {console.log(`Server listening on port ${port}.`)});
```

<br>
<br>
<br>

## **Installation**
<br>

```bash
npm install express --save
```

<br>
<br>
<br>

## **Routing**
<br>
<br>

### **Define Routes**
<br>

```javascript
app.<http-method>(path, callback, [additionalCallbacks...])
```
* path for which callback should be invoked
* callback is middleware function

<br>

Common Methods:

|Method   |Description
|:--------|:-------------
|delete   |delete specified resource
|get      |get specified resource
|patch    |partially modifies existing resource
|post     |send specified data to server
|put      |create or replace existing resource with specified data

<br>

A complete list of all supported methods can be found [here](http://expressjs.com/en/4x/api.html#app.METHOD).

<br>

Example:

```javascript
app.get('/', (request, response) => {
    response.send('<h1>Root</h1>');
});
```

<br>
<br>

### **Route Path**
<br>

A route path can be a
- string
- sting pattern
- [regular expression](../../../../../SoftwareDevelopment/WebDevelopment/JavaScript/javascript_regex.md)

<br>

String pattern

|Symbol |Description
|:------|:------------
|a?     |match a 0 or 1 times
|a+     |match a 1 or more times
|*      |match any substring
|(ab)?  |match substring ab 0 or 1 times
|(ab)+  |match substring ab 1 or more times
|(ab)*  |match substring ab 0 or more times

<br>

Examples

<br>

```javascript
app.get('/test1?/test2', (request, response) => { /* implementation */ });
```

Matches: `/test1/test2` and `/test/test2`.

<br>

```javascript
app.get('/test1+/test2', (request, response) => { /* implementation */ });
```

Matches: `/test1/test2`, `test11/test2`, `test111/test2`, ...

<br>

```javascript
app.get('/test1*/test2', (request, response) => { /* implementation */ });
```

Matches: `/test1/test2`, `/test1x/test2`, `/test1xyz/test2`, `/test1234567/test2`, ...

<br>
<br>

### **Route Parameter**
<br>

Every part of a route that is defined as a parameter can be accessed via the _request.params_ object.
There are two types of routing parameters:

<br>

General Parameter

```
:<parameter-name>
```

<br>
Optional Parameter

```
:<parameter-name>?
```
<br>
<br>

Example:

```javascript
app.get('/book/:title/:chapter/:page?', (request, response) => {
    const parameterObject = {
        title:   request.params.title,
        chapter: request.params.chapter,
        page:    request.params.page || 1
    };
    response.send(parameterObject);
});
```

<br>
<br>

### **Query Parameters**
<br>

Every query parameter attached to the route can be accessed via the _request.query_ object.

<br>

Example:

```javascript
app.get('/some/path', (request, response) => {
    response.send(request.query);
});
```

<br>

For a request to `/some/path?param1=Hello&param2=World` we receive the response `{"param1":"Hello","param2":"World"}`.

<br>
<br>
<br>

## **Middleware**
<br>
<br>

### **Basic**
<br>

Define a middleware function:

```javascript
function middlewareName(request, response, next) {
    // implementation
    next();
}
```
* _next_ function calls next middleware function in stack
<br>

Add a defined middleware function:

```
app.use([path], callback)
```

<br>
<br>

### **Configuration**
<br>

We can wrap the middleware function into another function to add the ability to configurate it:

```javascript
function middlewareName(configurationOptions) {
    return function(request, response, next) {
        // implementation using configurationOptions
    }
}
```

<br>

We can then call the middleware with configuration options:

```javascript
app.use(middlewareName({configuration1: 'Hello', configuration2: 'World'}));
```

<br>
<br>

### **Built-In Middleware**
<br>
<br>

#### **express.static()**
<br>

* Serves static files (html, css, javascript, pictures, videos, ...)
  
<br>

```javascript
express.static(root, [options])
```
* root specifies root directory of the static files to server
* calls _next_ to move to next middleware if a requested resource could not be found

<br>

Available options according to [documentation](http://expressjs.com/en/4x/api.html#express.static):

<br>


|Property    |Description |Type |Default
|:-----------|:-----------|:----|:----------
|dotfiles    |Determines how dotfiles (files or directories that begin with a dot “.”) are treated |String	|“ignore”
|etag        |Enable or disable etag generation|Boolean |true
|extensions  |Sets file extension fallbacks: If a file is not found, search for files with the specified extensions and serve the first one found. Example: ['html', 'htm']|	Mixed |false
|fallthrough |Let client errors fall-through as unhandled requests, otherwise forward a client error |Boolean |true
|index       |Sends the specified directory index file. Set to false to disable directory indexing |Mixed	|“index.html”
|lastModified| Set the Last-Modified header to the last modified date of the file on the OS. |Boolean |true
|maxAge      |Set the max-age property of the Cache-Control header in milliseconds or a string in ms format |Number |0
|redirect    |Redirect to trailing “/” when the pathname is a directory. |Boolean |true
|setHeaders  |Function for setting HTTP headers to serve with the file. |Function

<br>

Values for property _dotfiles_:

|Value  |Description
|:------|:-----------
|allow  |no special treatment
|deny   |deny request for dotfile, respond with `403` and call `next()`
|ignore |not acknowledge existence of dotfile, respond eith `403` and call `next()`

<br>
<br>

#### **express.json()**
<br>

* parse incoming requests with JSON data

<br>

```javascript
express.json([options])
```

<br>

Available options according to [documentation](http://expressjs.com/en/4x/api.html#express.static):

<br>

|Property |Description |Type |Default
|:--------|:-----------|:----|:----------
|inflate  |Enables or disables handling deflated (compressed) bodies; when disabled, deflated bodies are rejected |Boolean |true
|limit  |Controls the maximum request body size. If this is a number, then the value specifies the number of bytes; if it is a string, the value is passed to the bytes library for parsing |Mixed |"100kb"
|reviver |The reviver option is passed directly to JSON.parse as the second argument. You can find more information on this argument in the MDN documentation about JSON.parse |Function |null
|strict |Enables or disables only accepting arrays and objects; when disabled will accept anything JSON.parse accepts|	Boolean |true
|type |This is used to determine what media type the middleware will parse. This option can be a string, array of strings, or a function. If not a function, type option is passed directly to the type-is library and this can be an extension name (like json), a mime type (like application/json), or a mime type with a wildcard (like */* or */json). If a function, the type option is called as fn(req) and the request is parsed if it returns a truthy value |Mixed |"application/json"
|verify |This option, if supplied, is called as verify(req, res, buf, encoding), where buf is a Buffer of the raw request body and encoding is the encoding of the request. The parsing can be aborted by throwing an error|Function|undefined

<br>
<br>
<br>

## **Request**
<br>
<br>

### **Properties**
<br>
<br>

#### **app**
* return reference to _app_ instance

<br>

#### **baseUrl**
* return url path on which a router instance is mounted

<br>

#### **body**
* return data in request body as key-value pairs when using a body-parsing middleware

<br>

#### **cookies**
* return object containing all sent cookies when using cookie-parser middleware

<br>

#### **fresh**
* return boolean indicating whether response is fresh in client cache

<br>

#### **hostname**
* return hostname from http header

<br>

#### **ip**
* return remote ip address

<br>

#### **ips**
* return array of ip addresses

<br>

#### **method**
* return http method as string

<br>

#### **originalUrl**
* return request url as string

<br>

#### **params**
* return object containing defined [route parameters](#route-parameter)

<br>

#### **path**
* return path part of url as string

<br>

#### **protocol**
* returns protocol string

<br>

#### **query**
* return object containing [query string parameters](#query-parameters)

<br>

#### **secure**
* return boolean indicating whether secure TLS connection is established

<br>

#### **subdomains**
* return array of subdomains in domain name

<br>
<br>

### **Methods**
<br>
<br>

#### **accepts()**
<br>

```
accepts(type)
```
* returns best match or _false_ if request does not accept specified type

<br>

```javascript
// Accept: text/html, application.json
request.accepts('html');                // returns 'html'
request.accepts('json');                // returns 'json'
request.accepts('image/png');           // returns false
```

<br>
<br>

#### **get()**
<br>

```
get(field)
```
* returns specified HTTP request header field (case insensitive)

<br>
<br>

#### **is()**
<br>

```
is(type)
```
* returns matching 'content-type' http header field of incoming request of _false_

<br>
<br>
<br>

## **Response**
<br>
<br>

### **Methods**
<br>
<br>

#### **append()**
<br>

```
append(field, [value])
```
* append specified _value_ to http response header _field_

<br>
<br>

#### **attachment()**
<br>

```
attachment([filename])
```
* set _content-disposition_ header to attachment and set _content-type_ on specified _filename_ extension

<br>
<br>

#### **cookie()**
<br>

```
cookie(name, value, [options])
```
* set cookie

<br>

Available options:

|Property |Type
|:--------|:------------
|domain   |String
|encode   |Function
|expires  |Date
|httpOnly |Boolean
|maxAge   |Number
|path     |String
|priority |String
|secure   |Boolean
|signed   |Boolean
|sameSite |Boolean or String

<br>
<br>

#### **clearCookie()**
<br>

```
clearCookie(name, [options])
```
* clear specified cookie


<br>
<br>

#### **download()**
<br>

```
download(path, [filename], [options], [function])
```
* transfer file at _path_ as an attachment

<br>

Available options:

|Property |Description |Default
|:--------|:-----------|:------------------
|maxAge   |Sets the max-age property of the Cache-Control header in milliseconds or a string in ms format |0
|root     |Root directory for relative filenames |
|lastModified |Sets the Last-Modified header to the last modified date of the file on the OS. Set false to disable it |Enabled
|headers  |Object containing HTTP headers to serve with the file. The header Content-Disposition will be overriden by the filename argument |  |
|dotfiles |Option for serving dotfiles. Possible values are “allow”, “deny”, “ignore” |“ignore"
|acceptRanges |Enable or disable accepting ranged requests |true
|cacheControl |Enable or disable setting Cache-Control response header |true
|immutable    |Enable or disable the immutable directive in the Cache-Control response header. If enabled, the maxAge option should also be specified to enable caching. The immutable directive will prevent supported clients from making conditional requests during the life of the maxAge option to check if the file has changed. |false

<br>
<br>

#### **end()**
<br>

```
end([data], [encoding])
```
* end response process

<br>
<br>

#### **get()**
<br>

```
get(field)
```
* return https response header specified by _field_

<br>
<br>

#### **json()**
<br>

```
json([body])
```
* send JSON response

<br>
<br>

#### **location()**
<br>

```
location(path)
```
* set _Location_ http response header 

<br>
<br>

#### **redirect()**
<br>

```
redirect([status], path)
```
* redirect to _path_ with optional _status_ code

<br>
<br>

#### **render()**
<br>

```
render(view, [locals], [callback])
```
* send rendered HTML string to client

<br>
<br>

#### **send()**
<br>

```
send([body])
```
* send http response

<br>
<br>

#### **sendFile()**
<br>

```
sendFile(path, [options], [function])
```
* transfer file at _path_

<br>
<br>

#### **status()**
<br>

```
status(code)
```
* set response code

<br>
<br>

#### **set()**
<br>

```
set(field, [value])
```
* set http header _field_ to _value_

<br>
<br>



