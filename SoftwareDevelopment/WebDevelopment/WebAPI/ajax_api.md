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