# **Systemd Basics**
<br>

## **Table Of Contents**
<br>

- [**Systemd Basics**](#systemd-basics)
  - [**Table Of Contents**](#table-of-contents)
  - [**Unit File Types**](#unit-file-types)
  - [**Service Management Commands With Systemctl**](#service-management-commands-with-systemctl)
    - [**Modification**](#modification)
      - [**start**](#start)
      - [**stop**](#stop)
      - [**restart**](#restart)
      - [**reload**](#reload)
      - [**daemon-reload**](#daemon-reload)
      - [**enable**](#enable)
      - [**disable**](#disable)
      - [**edit**](#edit)
      - [**cat**](#cat)
    - [**Information**](#information)
      - [**status**](#status)
      - [**show**](#show)
      - [**is-enabled**](#is-enabled)
      - [**is-active**](#is-active)
      - [**list-unit-files**](#list-unit-files)
      - [**list-units**](#list-units)
      - [**list-timers**](#list-timers)
      - [**list-sockets**](#list-sockets)
      - [**list-dependencies**](#list-dependencies)
  - [**System Management Commands**](#system-management-commands)
    - [**rescue**](#rescue)
    - [**emergency**](#emergency)
    - [**halt**](#halt)
    - [**poweroff**](#poweroff)
    - [**reboot**](#reboot)
    - [**suspend**](#suspend)
    - [**hibernate**](#hibernate)
    - [**hibernate**](#hibernate-1)

<br>
<br>
<br>
<br>

## **Unit File Types**
<br>

|File     |Description
|:--------|:-----------
|.target  |define groups of units and synchronization point
|.service |start and stop commands and services
|.network |
|.timer   |define recurring tasks
|.path    |track changes of files or directories
|.mount   |
|.swap    |
|.socket  |

<br>
<br>
<br>
<br>

## **Service Management Commands With Systemctl**
<br>
<br>

```bash
systemctl [<option>] <command> [<arguments>]
```

<br>

|Option   |Description
|:--------|:-----------
|--user   |target service-manager of the user
|--system |target service-manager of the system (default)
|-H       |target host via ssh (username@hostname)

<br>
<br>
<br>

### **Modification**
<br>
<br>

#### **start**

```bash
systemctl start <unit>
```
* start service

<br>
<br>

#### **stop**

```bash
systemctl stop <unit>
```
* stop service

<br>
<br>

#### **restart**

```bash
systemctl restart <unit>
```

<br>
<br>

#### **reload**

```bash
systemctl reload <unit>
```
* reload configuration files of \<unit\>

<br>
<br>

#### **daemon-reload**

```bash
systemctl daemon-reload
```
* reload all configuration files and units

<br>
<br>

#### **enable**

```bash
systemctl enable <unit>
```
* load \<unit\> on reboot of the system
*  \<unit\> is not started

<br>
<br>

#### **disable**

```bash
systemctl disable <unit>
```
* do not load \<unit\> on reboot of the system
* \<unit\> is not stopped

<br>
<br>

#### **edit**

```bash
systemctl edit <unit_file>
```

<br>
<br>

#### **cat**

```bash
systemctl cat <unit_file>
```
* writes content of \<unit_file\> to console

<br>
<br>
<br>

### **Information**
<br>
<br>

#### **status**

```bash
systemctl status <unit>
```
* print human-readable status information

<br>
<br>

#### **show**

```bash
systemctl show <unit>
```
* print status information in key-value-pairs

<br>
<br>

#### **is-enabled**

```bash
systemctl is-enabled <unit>
```
* check if at least one of the units in \<unit\> is enabled 

<br>
<br>

#### **is-active**

```bash
systemctl is-active <unit>
```
* check if at least one of the units in \<unit\> is running 

<br>
<br>

#### **list-unit-files**

```bash
systemctl list-unit-files
```
* list all installed unit files

<br>
<br>

#### **list-units**

```bash
systemctl list-units
```
* list all loaded units

<br>
<br>

#### **list-timers**

```bash
systemctl list-timers
```

<br>
<br>

#### **list-sockets**

```bash
systemctl list-sockets
```

<br>
<br>

#### **list-dependencies**

```bash
systemctl list-dependencies <unit>
```

<br>
<br>
<br>
<br>

## **System Management Commands**
<br>
<br>

### **rescue**

```bash
systemctl rescue
```
* set system in rescue mode without services and gui

<br>
<br>

### **emergency**

```bash
systemctl emergency
```
* set system in emergency mode

<br>
<br>

### **halt**

```bash
systemctl halt
```

<br>
<br>

### **poweroff**

```bash
systemctl poweroff
```

<br>
<br>

### **reboot**

```bash
systemctl reboot
```

<br>
<br>

### **suspend**

```bash
systemctl suspend
```

<br>
<br>

### **hibernate**

```bash
systemctl hibernate
```

<br>
<br>

### **hibernate**

```bash
systemctl isolate
```