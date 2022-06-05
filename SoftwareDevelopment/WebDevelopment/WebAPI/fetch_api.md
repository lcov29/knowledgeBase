# **Fetch API**

<br>

## **Table Of Contents**
<br>

- [**Fetch API**](#fetch-api)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**window.fetch()**](#windowfetch)
  - [**Request**](#request)
    - [**Constructor**](#constructor)
    - [**Properties**](#properties)
      - [**body**](#body)
      - [**bodyUsed**](#bodyused)
      - [**cache**](#cache)
      - [**credentials**](#credentials)
      - [**destination**](#destination)
      - [**headers**](#headers)
      - [**integrity**](#integrity)
      - [**method**](#method)
      - [**mode**](#mode)
      - [**priority**](#priority)
      - [**redirect**](#redirect)
      - [**referrer**](#referrer)
      - [**referrerPolicy**](#referrerpolicy)
      - [**url**](#url)
    - [**Methods**](#methods)
      - [**arrayBuffer()**](#arraybuffer)
      - [**blob()**](#blob)
      - [**clone()**](#clone)
      - [**formData()**](#formdata)
      - [**json()**](#json)
      - [**text()**](#text)
  - [**Response**](#response)
    - [**Constructor**](#constructor-1)
    - [**Properties**](#properties-1)
      - [**body**](#body-1)
      - [**bodyUsed**](#bodyused-1)
      - [**headers**](#headers-1)
      - [**ok**](#ok)
      - [**redirected**](#redirected)
      - [**status**](#status)
      - [**statusText**](#statustext)
      - [**type**](#type)
      - [**url**](#url-1)
    - [**Methods**](#methods-1)
      - [**arrayBuffer()**](#arraybuffer-1)
      - [**blob()**](#blob-1)
      - [**clone()**](#clone-1)
      - [**error()**](#error)
      - [**formData()**](#formdata-1)
      - [**json()**](#json-1)
      - [**redirect(url, [status])**](#redirecturl-status)
      - [**text()**](#text-1)

<br>
<br>
<br>
<br>

## **General**
<br>
<br>

* allows sending asynchronous HTTP requests and receiving HTTP responses
* method _window.fetch()_ initiates request and returns a _Promise_
* interface abstractions
  * Request
  * Response
  * Headers

<br>
<br>
<br>
<br>

## **window.fetch()**
<br>
<br>


<br>
<br>
<br>
<br>

## **Request**
<br>
<br>

* represents a resource request
* mostly returned as result of an operation, but can be manually created via constructor

<br>
<br>

### **Constructor**
<br>

```javascript
new Request(url, [options]);


// Example
const options = {
  method: 'GET',
  headers: {
    'Content-Type': 'application/json'
  },
  mode: 'cors',
  cache: 'default'
};

const request = new Request('content.json', options);
```

<br>

Optional _options_ parameter is an object with the following possible properties:
<br>
<br>

|Property   |Description And Values
|:----------|:-------------
|method     |HTTP method (GET, POST, ...). Default: GET
|headers    |Headers object or string
|body       |String, ReadableStream object, URLSearchParams object, FormData object, BufferSource object, Blob object
|mode       |cors, no-cors, same-origin, include (default: same-origin)
|credentials|omit, same-origin, include (default: same-origin)
|cache      |cache mode for request
|redirect   |redirect mode: follow, error, manual (default: follow)
|referrer   |no-referrer, client or url (default: about:client)
|integrity  |subresource integrity value of request

<br>
<br>
<br>

### **Properties**
<br>
<br>

#### **body**
* returns _ReadableStream_ object containing the body content

<br>
<br>

#### **bodyUsed**
* returns boolean indicating whether body has been uses in a request before

<br>
<br>

#### **cache**
* returns cache mode

<br>
<br>

#### **credentials**
* returns credentials (default: same-origin)

<br>
<br>

#### **destination**
* returns destination string

<br>
<br>

#### **headers**
* returns Headers object

<br>
<br>

#### **integrity**
* returns subresource integrity value of request

<br>
<br>

#### **method**
* returns request method (GET, POST, ...)

<br>
<br>

#### **mode**
* returns request mode (cors, no-cors, same-origin, navigate)

<br>
<br>

#### **priority**
* returns priority hint (auto, low, high)

<br>
<br>

#### **redirect**
* returns redirect mode (follow, error, manual)

<br>
<br>

#### **referrer**
* returns referrer 

<br>
<br>

#### **referrerPolicy**
* returns referrer policy

<br>
<br>

#### **url**
* returns url of request

<br>
<br>
<br>

### **Methods**
<br>
<br>

#### **arrayBuffer()**
* returns promise resolving with ArrayBuffer representing the request body

<br>
<br>

#### **blob()**
* returns promise resolving with Blob representing the request body

<br>
<br>

#### **clone()**
* returns clone of request object

<br>
<br>

#### **formData()**
* returns promise resolving with FormData object representing the request body

<br>
<br>

#### **json()**
* returns promise resolving with json representing the request body

<br>
<br>

#### **text()**
* returns promise resolving with text representing the request body

<br>
<br>
<br>
<br>

## **Response**
<br>
<br>

* represents as response to a request
* mostly returned as result of an operation, but can be manually created via constructor

<br>
<br>
<br>

### **Constructor**
<br>

```javascript
new Response([body], [options]);


// Example
const options = {
  status: 200,
  statusText: 'Success',
};

const response = new Response('response', options);
```

<br>

Optional _body_ parameter has to be _null_ (default) or one of the following objects:
<br>

* Blob
* BufferSource
* FormData
* ReadableStream
* URLSearchParams
* String
 
<br>
<br>

Optional _options_ parameter is an object with the following possible properties:
<br>

* status
* statusText
* headers

<br>
<br>
<br>

### **Properties**
<br>
<br>

#### **body**
* returns _ReadableStream_ object containing the body content

<br>
<br>

#### **bodyUsed**
* returns boolean indicating whether body has been uses in a response before

<br>
<br>

#### **headers**
* returns headers object

<br>
<br>

#### **ok**
* returns boolean indicating whether response was successful (status between 200 and 299)

<br>
<br>

#### **redirected**
* returns boolean indicating whether request which led to this response was redirected

<br>
<br>

#### **status**
* returns status code

<br>
<br>

#### **statusText**
* returns status message

<br>
<br>

#### **type**
* returns response type (basic, cors, error, opaque, opaqueredirect)

<br>
<br>

#### **url**
* returns url of response as a string

<br>
<br>
<br>

### **Methods**
<br>
<br>

#### **arrayBuffer()**
* returns promise resolving with ArrayBuffer representing the response body

<br>
<br>

#### **blob()**
* returns promise resolving with Blob representing the response body

<br>
<br>

#### **clone()**
* returns clone of request object

<br>
<br>

#### **error()**
* returns new Response object associated with network error

<br>
<br>

#### **formData()**
* returns promise resolving with FormData object representing the response body

<br>
<br>

#### **json()**
* returns promise resolving with json representing the response body

<br>
<br>

#### **redirect(url, [status])**
* returns new Response object resulting in a redirect to new url

<br>
<br>

#### **text()**
* returns promise resolving with string representing the response body

<br>
<br>
<br>
<br>