# **Service Worker API**
<br>

## **Table Of Contents**
<br>

- [**Service Worker API**](#service-worker-api)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Events**](#events)
    - [**Install**](#install)
    - [**Activate**](#activate)
    - [**Fetch**](#fetch)
    - [**Message**](#message)
    - [**Push**](#push)
    - [**Sync**](#sync)

<br>
<br>
<br>
<br>

## **General**
<br>

![Service Worker Diagram](./pictures/service_worker_overview.png)

<br>



<br>
<br>
<br>

## **Events**
<br>

```mermaid
flowchart LR
    a[install] --> b[activate]
    b --> fetch
    b --> message
    b --> push
    b --> sync
```


<br>
<br>

### **Install**
<br>


<br>
<br>

### **Activate**
<br>

<br>
<br>

### **Fetch**
<br>

<br>
<br>

### **Message**
<br>

<br>
<br>

### **Push**
<br>

<br>
<br>

### **Sync**
<br>

<!--

- javascript file that
  - runs in your browser in a different thread than the main code of your app
  - runs over HTTPs
  - runs in a worker context for a specific website
  - acts as proxy server between web application, browser and network
    - intercept and modify network request
    - cache resources
    - allow access to push notifications
    - allow background sync APIs 



What a Service Worker can NOT do?
- access DOM
- use synchronous APIs
- dynamically import JavaScript modules



Initialization
- registered via method
- Events:
  - Download (starts when webpage is first accessed)
  - Install (downloaded worker is new or different to current service worker)
  - Activate (after installation; if older service worker is still active, the updated worker is activated when all pages are closed)


Update
- navigate to in-scope page
- event fired on service worker that was not downloaded in last 24 hours


Fetch Event

-->
