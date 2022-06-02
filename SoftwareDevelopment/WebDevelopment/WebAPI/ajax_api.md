# **Ajax API (Asynchronous JavaScript And XML**

<br>

## **Table Of Contents**
<br>

- [**Ajax API (Asynchronous JavaScript And XML**](#ajax-api-asynchronous-javascript-and-xml)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Client Server Communication**](#client-server-communication)
    - [**Synchronous Communication**](#synchronous-communication)
    - [**Asynchronous Communication**](#asynchronous-communication)
  - [**Data Exchange Formats**](#data-exchange-formats)
    - [**HTML**](#html)
    - [**XML**](#xml)
    - [**JSON**](#json)
  - [**TEMP TITLE**](#temp-title)
  - [**XMLHttpRequest**](#xmlhttprequest)
    - [**Properties**](#properties)
    - [**Methods**](#methods)
      - [**abort()**](#abort)
      - [**getAllResponseHeaders()**](#getallresponseheaders)
      - [**getResponseHeader(headerName)**](#getresponseheaderheadername)
      - [**open()**](#open)
      - [**overrideMimeType(mimeType)**](#overridemimetypemimetype)
      - [**send([body])**](#sendbody)
      - [**setRequestHeader(headerName, value)**](#setrequestheaderheadername-value)

<br>
<br>
<br>
<br>

## **General**
<br>
<br>

* **A**synchronous **J**avaScript **A**nd **X**ML
* allows to load content dynamically without reloading the entire page
* makes websites faster and more responsive

<br>

![Ajax](./pictures/ajax.png)

<br>
<br>
<br>
<br>

## **Client Server Communication**
<br>
<br>


### **Synchronous Communication**
<br>

![Synchronous Communication](./pictures/synchronousCommunication.png)

<br>

1. Client sends request to the server
2. Client waits idle for response from the server
3. Server processes the incoming request
4. Server sends response to the client
5. Client receives response
6. Client resumes code execution

<br>
<br>
<br>

### **Asynchronous Communication**
<br>

![Asynchronous Communication](./pictures/asynchronousCommunication.png)

<br>

1. Client sends request to the server
2. Client resumes code execution and can send additional requests to the server
3. Server meanwhile processes the incoming request
4. Server sends response to the client
5. Client receives response

Client does not have to wait for server response and can resume the code execution

<br>
<br>
<br>
<br>

<!-- 

use cases:
    - auto completion for user input
    - pagination
    - newsticker
    - editable ui components

-->

## **Data Exchange Formats**
<br>

Data can be exchanged between client and servers in various formats. The following formats are the most common.

<br>
<br>

### [**HTML**](../Frontend/html/html_basics.md)

* used for loading gui components from the server

<br>

### [**XML**](../../../FileFormats/xml/xml_basics.md)

* used for loading structured data from the server

<br>

### [**JSON**](../../../FileFormats/json/json_basics.md)

* used for loading data from the server to generate content on a website

<br>
<br>
<br>
<br>

## **TEMP TITLE**
<br>

<br>
<br>
<br>
<br>

## **XMLHttpRequest**
<br>

* used to retrieve various types of data from a server via HTTP request without reloading the website 

<br>
<br>

### **Properties**
<br>

<br>
<br>
<br>

### **Methods**
<br>
<br>

#### **abort()**
* aborts already sent request and changes properties _readyState_ and _status_ to 0

<br>
<br>

#### **getAllResponseHeaders()**
* returns string representing all response headers or _null_

<br>
<br>

#### **getResponseHeader(headerName)**
* returns string representing specified response header

<br>
<br>

#### **open()**
* (re-) initialize  request

<br>

```javascript
const request = new XMLHttpRequest();
request.open(method, url, [async], [user], [password]);
```

<br>

|Parameter|Description                                                                |Optional
|:--------|:--------------------------------------------------------------------------|:-------
|method   |http request method like GET, POST, PUT, DELETE                            |No
|url      |destination url                                                            |No
|async    |boolean indicating wheter request should be asynchronously (default: true) |Yes
|user     |user for authentication                                                    |Yes
|password |password for authentication                                                |Yes


<br>
<br>

#### **overrideMimeType(mimeType)**
* override mime type of the server response
* must be called before call of method _send()_

<br>
<br>

#### **send([body])**
* send request to server

<br>
<br>

#### **setRequestHeader(headerName, value)**
* set value of specified request header
* must be called after method _open()_ but before method _send()_





<!--

Ajax-request

1.) instantiate XMLHttpRequest object
2.) specify HTTP-response handler in onload event
3.) initiate HTTP-request with XMLHttpRequest.open(HTTP-Method)
4.) configurate HTTP-request 
5.) send HTTP-request with XMLHttpRequest.send()


```javascript
const request = new XMLHttpRequest();
request.onload = (event) => { /* response handler */ };

request.open('GET', 'url');
request.setRequestHeader('Accept', 'text/html');
request.send();
```

-->