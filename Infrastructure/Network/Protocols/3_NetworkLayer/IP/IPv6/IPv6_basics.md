# **IPv6 Basics**
<br>

## **Table Of Contents**
<br>

- [**IPv6 Basics**](#ipv6-basics)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**IP Addresses**](#ip-addresses)
  - [**Address Types**](#address-types)
    - [**Unicast Addresses**](#unicast-addresses)
      - [**Link Local Unicast Addresses**](#link-local-unicast-addresses)
      - [**Global Unicast Addresses**](#global-unicast-addresses)
    - [**Anycast Addresses**](#anycast-addresses)
    - [**Multicast Addresses**](#multicast-addresses)
  - [**Loopback Address**](#loopback-address)

<br>
<br>
<br>

## **General**
<br>

The Internet Protocol (IP) is a layer 3 (network layer) protocol.

It is used is used for:
* network identification
* logical location addressing
* enabling connections between different network segments

<br>

There are two versions:

* [IPv4](../IPv4/IPv4_basics.md)
* IPv6 (discussed here)

<br>
<br>

## **IP Addresses**
<br>

* length: 128 Bit (8 x 16 Bit)
* uses hexadecimal system
* must be unique within a network
* can be split into a **network part** and a **host part**
* integrated encryption of IP packages (IPsec)

<br>

Usual division of an IPv6 address:

|XX:XX:XX:       |XX:       |XX:XX:XX:XX  |
|:---------------|:---------|:------------|
|location prefix |subnet id |interface id |

<br>

Example

```
fe80:0000:0000:0000:0223:54ff:fe5b:869d
```

<br>

```
fe80:0000:0000:0000:223:54ff:fe5b:869d
                    ---
```
* leading zeros can be left out

<br>

```
fe80::223:54ff:fe5b:869d
    --
```

* a **single** sequence of blocks filled with zeros can be left out 

<br>

```
https://[fe80::223:54ff:fe5b:869d]:8080
```

* URL: IPv6 address is placed in square brackets followed by the port 

<br>
<br>
<br>

## **Address Types**
<br>

* every interface needs at least one unicast address
* an interface can be assigned multiple addresses (possibly of different types)
* a unicast address can be assigned multiple interfaces of a computer for load balancing

<br>
<br>

### **Unicast Addresses**

* used for unique identification of hosts

<br>

#### **Link Local Unicast Addresses**

* used for local network
* not routed via internet
* prefix: FE80::/10
* required for every interface in a private network

<br>

#### **Global Unicast Addresses**

* worldwide unique
* routed via internet
* prefix: 2000::/3

<br>
<br>

### **Anycast Addresses**

* unicast addresses that are assigned to multiple interfaces
* used for load balancing and redundancy
* specific destination interface can not be chosen and is determined by the routing protocol
* same prefix as unicast addresses
* interface indentifier of address: all bits are `0`

<br>
<br>

### **Multicast Addresses**

* used to address multiple interfaces
* packages are sent to all inferfaces assigned to a multicast address
* interfaces can have multiple multicast addresses
* prefix: FF00::/8

<br>
<br>
<br>

## **Loopback Address**
<br>

```
0:0:0:0:0:0:0:1/128

Shorthand: ::1/128
```