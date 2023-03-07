# **Network Discovery Protocol (NDP)**
<br>

## **Table Of Contents**
<br>

- [**Network Discovery Protocol (NDP)**](#network-discovery-protocol-ndp)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Functions**](#functions)
    - [**Neighbor Solicitation**](#neighbor-solicitation)
    - [**Neighbor Advertisement**](#neighbor-advertisement)
    - [**Router Solicitation**](#router-solicitation)
    - [**Router Advertisement**](#router-advertisement)
    - [**Redirect Message**](#redirect-message)

<br>
<br>
<br>

## **General**
<br>

* used on OSI layer 2 (Data Link Layer)
* combination of **ARP** and **ICMP Router Discovery**
* used for IPv6 networks (see [ARP](./ARP.md) for IPv4)

<br>
<br>
<br>

## **Functions**
<br>
<br>

### **Neighbor Solicitation**
* determine the MAC address of neighbors
* check if neighbor is still reachable via cached MAC address

<br>
<br>

### **Neighbor Advertisement**
* response to Neighbor Solicitation message
* provide new information unsolicited

<br>
<br>

### **Router Solicitation**
* locate routers on attached link

<br>
<br>

### **Router Advertisement**
* routers send message about their existence

<br>
<br>

### **Redirect Message**
* routers can inform hosts of better route to destination
