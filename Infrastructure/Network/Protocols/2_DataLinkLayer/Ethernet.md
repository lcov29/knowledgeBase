# **Ethernet**

<br>

## **Table Of Contents**
<br>

- [**Ethernet**](#ethernet)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Ethernet Frames**](#ethernet-frames)

<br>
<br>
<br>

## **General**

* used on osi layer 2 (Data Link Layer)
* transports data within the same network segment
  * traffic between multiple segments requires protocols on higher layers
* data is distributed over several frames

<br>
<br>
<br>

## **Ethernet Frames**
<br>

* minimum size: 64 Byte
* maximum size: 1518 Byte

<br>

|Preamble |SFD    |MAC Destination |MAC Source |Type   |Payload       |FCS    |Pad         |
|:-------:|:-----:|:--------------:|:----------|:-----:|:------------:|:-----:|:----------:|
|7 Byte   |1 Byte |6 Byte          |6 Byte     |2 Byte |max 1500 Byte |4 Byte |max 46 Byte |

<br>

* **Preamble**: alternating bit sequence (101010...) for synchronizing hosts
* **SFD (Start-Frame-Delimiter)**: bit sequence (10101011) for synchronizing and determining start of frame
* **Type**: information about used network protocol of payload
* **FCS (Frame Check Sequence)**: used for checking for errors
* **Pad**: padding in case the frame does not reach the minimum size of 64Byte
