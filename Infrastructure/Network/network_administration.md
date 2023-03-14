# **Network Administration**
<br>

## **Table Of Contents**
<br>

- [**Network Administration**](#network-administration)
  - [**Table Of Contents**](#table-of-contents)
  - [**MAC Address**](#mac-address)
    - [**Determine MAC Address**](#determine-mac-address)
      - [**Case 1: Device has terminal**](#case-1-device-has-terminal)
      - [**Case 2: Device has no terminal**](#case-2-device-has-no-terminal)
    - [**Change MAC Address**](#change-mac-address)
    - [**Change ARP-Cache**](#change-arp-cache)
      - [**Add new entry**](#add-new-entry)
      - [**Delete entry**](#delete-entry)
  - [**IP Address**](#ip-address)
    - [**Resolve url to ip address via local *hosts* file**](#resolve-url-to-ip-address-via-local-hosts-file)
    - [**Check network connection to host**](#check-network-connection-to-host)
    - [\*\*Check name server resolve \*\*](#check-name-server-resolve-)
      - [**nslookup**](#nslookup)
      - [**host**](#host)
      - [**dig**](#dig)

<br>
<br>
<br>
<br>

## **MAC Address**
<br>
<br>
<br>

### **Determine MAC Address**
<br>
<br>

#### **Case 1: Device has terminal**
<br>

**Windows**

```bash
ipconfig/all
```

<br>

**Linux**

```bash
ifconfig -a  # select device id

ip link show <device_id>
```

<br>
<br>

#### **Case 2: Device has no terminal**
<br>

Connect device with PC via *cross-over cable*.

<br>

**Windows**

```bash
arp -a
```

<br>

**Linux**

```bash
arp -a
ip neigh    # alternative
```

<br>
<br>
<br>

### **Change MAC Address**
<br>

**Windows**  
Change registry entry

<br>

**Linux**

```bash
ifconfig <device_id> hw ether <new_mac_address>
```

<br>
<br>
<br>

### **Change ARP-Cache**
<br>
<br>

#### **Add new entry**
<br>

**Windows / Linux**

```bash
arp -s <ip_address> <mac_address>
```

<br>
<br>

#### **Delete entry**
<br>

```bash
arp -d <ip_address>
```

<br>
<br>
<br>
<br>

## **IP Address**
<br>
<br>
<br>

### **Resolve url to ip address via local *hosts* file**
<br>

**Linux**

* computer resolves url to ip address via local *hosts* file **before** using DNS
* can be used to block urls by resolving them to loopback address

<br>

/etc/hosts

```
192.168.0.2 example.com www.example.com


# block url with loopback address
127.0.0.1 www.google.com
```

<br>
<br>
<br>

### **Check network connection to host**
<br>

```bash
ping <option> <ip address or host name>
```

<br>

|Option         |Description                                       |
|:--------------|:-------------------------------------------------|
|-c \<number\>  |limit execution of ping to \<number\> repetitions |
|-v             |verbose                                           |
|-a             |play sound for each repetitions                   |
|-i \<seconds\> |time between repetitions                          |

<br>
<br>
<br>

### **Check name server resolve **
<br>
<br>

#### **nslookup**
<br>

```bash
nslookup <url>
```

<br>
<br>

#### **host**
<br>

```bash
host <option> <url>
```

<br>
<br>

#### **dig**
<br>

```bash
dig [@<nameserver>] <Hostname.domain>
```