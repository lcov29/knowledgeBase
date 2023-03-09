# **IPv4 Subnetting**
<br>

## **Table Of Contents**
<br>

- [**IPv4 Subnetting**](#ipv4-subnetting)
  - [**Table Of Contents**](#table-of-contents)
  - [**Calculate Subnetwork Ids, Host IPs and Broadcast IP**](#calculate-subnetwork-ids-host-ips-and-broadcast-ip)
    - [**Examples**](#examples)
      - [**Example 1**](#example-1)
      - [**Example 2**](#example-2)
      - [**Example 3**](#example-3)
  - [**Calculate Subnetwork Id, Host IPs and Broadcast IP from a given IP address**](#calculate-subnetwork-id-host-ips-and-broadcast-ip-from-a-given-ip-address)
    - [**Examples**](#examples-1)
      - [**Example 1**](#example-1-1)
      - [**Example 2**](#example-2-1)
      - [**Example 3**](#example-3-1)
  - [**Calculate Subnetmask from given IP adress range**](#calculate-subnetmask-from-given-ip-adress-range)
    - [**Examples**](#examples-2)
      - [**Example 1**](#example-1-2)
      - [**Example 2**](#example-2-2)

<br>
<br>
<br>
<br>

## **Calculate Subnetwork Ids, Host IPs and Broadcast IP**
<br>

**Required Information**
* Network Id with Subnetmask
* Number of required subnets (n)

<br>
<br>

**Step 1: Calculate number of bits x that are needed to display the number of required subnets**

Calculate x with `2^x >= n`

<br>

**Step 2: Add number of bits x to subnet mask**

<br>

**Step 3: Calculate number of host part bits y in same octet as the end of network part**

<br>

**Step 4: Calculate step s**

Calculate `s = 2^y`

<br>

**Step 5: Calculate Network ids, first and last host ip and broadcast ip**

Calculate network ids: continually add step `s` starting from 0 to first octett with host part

Calculate broadcast ip:

Calculate first ip: add 1 to last octett

Calculate last ip: remove 1 from last octett of broadcast id

<br>
<br>
<br>

### **Examples**
<br>
<br>
<br>

#### **Example 1**
<br>

We have the network `192.168.0.0/24` and want to create 4 subnets.

<br>
<br>

**Step 1 + 2**

We need 2 bits to display the number of subnets 4, because `2^2 >= 4`. 

Therefore we need to add 2 bits to the network part of the subnet mask:

```
Old:    11111111.11111111.11111111.00000000
New:    11111111.11111111.11111111.11000000
                                   --
```

Our new subnet mask is /26.

<br>
<br>

**Step 3 + 4**

The network part of our new subnet mask ends inside of the fourth octet. The host part has 6 remaining bits in this octet.

Therefore our step is `2^6 = 64`.

<br>
<br>

**Step 5**

Starting from our given network `192.168.0.0` we first calculate all network ids by adding the calculated step `64` to the octet where the host part starts (here octet 4):

|Network Id    |First Host IP | Last Host IP |Broadcast IP |Suffix |
|:-------------|:-------------|:-------------|:------------|:-----:|
|192.168.0.0   |              |              |             |/26    |
|192.168.0.64  |              |              |             |/26    |
|192.168.0.128 |              |              |             |/26    |
|192.168.0.192 |              |              |             |/26    |

<br>
<br>

Now we calculate the first host ip address by incrementing the network id by 1:

|Network Id    |First Host IP | Last Host IP |Broadcast IP |Suffix |
|:-------------|:-------------|:-------------|:------------|:-----:|
|192.168.0.0   |192.168.0.1   |              |             |/26    |
|192.168.0.64  |192.168.0.65  |              |             |/26    |
|192.168.0.128 |192.168.0.129 |              |             |/26    |
|192.168.0.192 |192.168.0.193 |              |             |/26    |

<br>
<br>

Next we calculate the broadcast ip addresses by decrementing the **next** network id by 1:

|Network Id    |First Host IP |Last Host IP  |Broadcast IP  |Suffix |
|:-------------|:-------------|:-------------|:-------------|:-----:|
|192.168.0.0   |192.168.0.1   |              |192.168.0.63  |/26    |
|192.168.0.64  |192.168.0.65  |              |192.168.0.127 |/26    |
|192.168.0.128 |192.168.0.129 |              |192.168.0.191 |/26    |
|192.168.0.192 |192.168.0.193 |              |192.168.0.255 |/26    |

<br>
<br>

Finally we calculate the last host ip address by decrementing the broadcast ip address by 1:

|Network Id    |First Host IP |Last Host IP  |Broadcast IP  |Suffix |
|:-------------|:-------------|:-------------|:-------------|:-----:|
|192.168.0.0   |192.168.0.1   |192.168.0.62  |192.168.0.63  |/26    |
|192.168.0.64  |192.168.0.65  |192.168.0.126 |192.168.0.127 |/26    |
|192.168.0.128 |192.168.0.129 |192.168.0.190 |192.168.0.191 |/26    |
|192.168.0.192 |192.168.0.193 |192.168.0.254 |192.168.0.255 |/26    |


<br>
<br>
<br>

#### **Example 2**
<br>

We have the network `172.16.0.0/16` and want to create 33 subnets.

<br>
<br>

**Step 1 + 2**

We need 6 bits to display the number of subnets 33, because `2^6 = 64 >= 33`. 

Therefore we need to add 6 bits to the network part of the subnet mask:

```
Old:    11111111.11111111.00000000.00000000
New:    11111111.11111111.11111100.00000000
                          ------
```

Our new subnet mask is /22.

<br>
<br>

**Step 3 + 4**

The network part of our new subnet mask ends inside of the third octet. The host part has 2 remaining bits in this octet.

Therefore our step is `2^2 = 4`.

<br>
<br>


**Step 5**

Starting from our given network `172.16.0.0` we first calculate all network ids by adding the calculated step `4` to the octet where the host part starts (here octet 3):

|Network Id    |First Host IP | Last Host IP |Broadcast IP |Suffix |
|:-------------|:-------------|:-------------|:------------|:-----:|
|172.16.0.0    |              |              |             |/22    |
|172.16.4.0    |              |              |             |/22    |
|172.16.8.0    |              |              |             |/22    |
|172.16.12.0   |              |              |             |/22    |
|     ...      |     ...      |      ...     |     ...     | ...   |
|172.16.128.0  |              |              |             |/22    |
|172.16.132.0  |              |              |             |/22    |


<br>
<br>

Now we calculate the first host ip address by incrementing the last octet of the network id by 1:

|Network Id    |First Host IP | Last Host IP |Broadcast IP |Suffix |
|:-------------|:-------------|:-------------|:------------|:-----:|
|172.16.0.0    |172.16.0.1    |              |             |/22    |
|172.16.4.0    |172.16.4.1    |              |             |/22    |
|172.16.8.0    |172.16.8.1    |              |             |/22    |
|172.16.12.0   |172.16.12.1   |              |             |/22    |
|     ...      |     ...      |      ...     |     ...     | ...   |
|172.16.128.0  |172.16.128.1  |              |             |/22    |
|172.16.132.0  |172.16.132.1  |              |             |/22    |

<br>
<br>

Next we calculate the broadcast ip addresses by decrementing the last octet of the **next** network id by 1:

|Network Id    |First Host IP | Last Host IP |Broadcast IP   |Suffix |
|:-------------|:-------------|:-------------|:--------------|:-----:|
|172.16.0.0    |172.16.0.1    |              |172.16.3.255   |/22    |
|172.16.4.0    |172.16.4.1    |              |172.16.7.255   |/22    |
|172.16.8.0    |172.16.8.1    |              |172.16.11.255  |/22    |
|172.16.12.0   |172.16.12.1   |              |172.16.15.255  |/22    |
|     ...      |     ...      |      ...     |     ...       | ...   |
|172.16.128.0  |172.16.128.1  |              |172.16.131.255 |/22    |
|172.16.132.0  |172.16.132.1  |              |172.16.135.255 |/22    |

<br>
<br>

Finally we calculate the last host ip address by decrementing the broadcast ip address by 1:

|Network Id    |First Host IP | Last Host IP  |Broadcast IP   |Suffix |
|:-------------|:-------------|:--------------|:--------------|:-----:|
|172.16.0.0    |172.16.0.1    |172.16.3.254   |172.16.3.255   |/22    |
|172.16.4.0    |172.16.4.1    |172.16.7.254   |172.16.7.255   |/22    |
|172.16.8.0    |172.16.8.1    |172.16.11.254  |172.16.11.255  |/22    |
|172.16.12.0   |172.16.12.1   |172.16.15.254  |172.16.15.255  |/22    |
|     ...      |     ...      |      ...      |     ...       | ...   |
|172.16.128.0  |172.16.128.1  |172.16.131.254 |172.16.131.255 |/22    |
|172.16.132.0  |172.16.132.1  |172.16.135.254 |172.16.135.255 |/22    |


<br>
<br>
<br>

#### **Example 3**
<br>

We have the network `10.0.0.0/8` and want to create 112 subnets.

<br>
<br>

**Step 1 + 2**

We need 7 bits to display the number of subnets 112, because `2^7 = 128 >= 112`. 

Therefore we need to add 7 bits to the network part of the subnet mask:

```
Old:    11111111.00000000.00000000.00000000
New:    11111111.11111110.00000000.00000000
                 --------
```

Our new subnet mask is /15.

<br>
<br>

**Step 3 + 4**

The network part of our new subnet mask ends inside of the second octet. The host part has 1 remaining bit in this octet.

Therefore our step is `2^1 = 2`.

<br>
<br>


**Step 5**

Starting from our given network `10.0.0.0` we first calculate all network ids by adding the calculated step `2` to the octet where the host part starts (here octet 2):

|Network Id |First Host IP | Last Host IP |Broadcast IP |Suffix |
|:----------|:-------------|:-------------|:------------|:-----:|
|10.0.0.0   |              |              |             |/15    |
|10.2.0.0   |              |              |             |/15    |
|10.4.0.0   |              |              |             |/15    |
|     ...   |     ...      |      ...     |     ...     | ...   |
|10.222.0.0 |              |              |             |/15    |
|10.224.0.0 |              |              |             |/15    |

<br>
<br>

Now we calculate the first host ip address by incrementing the last octet of the network id by 1:

|Network Id |First Host IP | Last Host IP |Broadcast IP |Suffix |
|:----------|:-------------|:-------------|:------------|:-----:|
|10.0.0.0   |10.0.0.1      |              |             |/15    |
|10.2.0.0   |10.2.0.1      |              |             |/15    |
|10.4.0.0   |10.4.0.2      |              |             |/15    |
|     ...   |     ...      |      ...     |     ...     | ...   |
|10.222.0.0 |10.222.0.1    |              |             |/15    |
|10.224.0.0 |10.224.0.1    |              |             |/15    |

<br>
<br>

Next we calculate the broadcast ip addresses by decrementing the last octet of the **next** network id by 1:

|Network Id |First Host IP | Last Host IP |Broadcast IP   |Suffix |
|:----------|:-------------|:-------------|:--------------|:-----:|
|10.0.0.0   |10.0.0.1      |              |10.1.255.255   |/15    |
|10.2.0.0   |10.2.0.1      |              |10.3.255.255   |/15    |
|10.4.0.0   |10.4.0.2      |              |10.5.255.255   |/15    |
|     ...   |     ...      |      ...     |     ...       | ...   |
|10.222.0.0 |10.222.0.1    |              |10.223.255.255 |/15    |
|10.224.0.0 |10.224.0.1    |              |10.225.255.255 |/15    |

<br>
<br>

Finally we calculate the last host ip address by decrementing the broadcast ip address by 1:

|Network Id |First Host IP | Last Host IP  |Broadcast IP   |Suffix |
|:----------|:-------------|:--------------|:--------------|:-----:|
|10.0.0.0   |10.0.0.1      |10.1.255.254   |10.1.255.255   |/15    |
|10.2.0.0   |10.2.0.1      |10.3.255.254   |10.3.255.255   |/15    |
|10.4.0.0   |10.4.0.2      |10.5.255.254   |10.5.255.255   |/15    |
|     ...   |     ...      |      ...      |     ...       | ...   |
|10.222.0.0 |10.222.0.1    |10.223.255.254 |10.223.255.255 |/15    |
|10.224.0.0 |10.224.0.1    |10.225.255.254 |10.225.255.255 |/15    |

<br>
<br>
<br>
<br>

## **Calculate Subnetwork Id, Host IPs and Broadcast IP from a given IP address**
<br>

**Required Information**
* IP address
* Subnetmask

<br>
<br>

In the following we will refer to the octet where the network part of the subnetmask ends as `breaking octet`.

<br>

**Step 1: Determine the number of remaining bits `x` of the host part within the breaking octet**

<br>

**Step 2: Calculate the number of addresses `n`**

Calculate `n = 2^x`

<br>

**Step 3: Determine the next smaller or equal integer `i` that is divisible by the number of addresses `n` for the ip value in the breaking octet**

<br>

**Step 4: Determine the network id by replacing the breaking octet with `i` and set all octets to the right to 0**

<br>

**Step 5: Determine the broadcast id by replacing the breaking octet with `i + n - 1` and set all octets to the right to 255**

<br>

**Step 6: Determine first host ip by incrementing the network id by 1**

<br>

**Step 7: Determine last host ip by decrementing the broadcast id by 1**

<br>
<br>
<br>

### **Examples**
<br>
<br>
<br>

#### **Example 1**
<br>

We have the ip address `110.86.48.29/25` and want to calculate the network id, first and last host ip address and broadcast address.

<br>
<br>

**Step 1 + 2**

```
Subnetmask:    11111111.11111111.11111111.10000000
                                          --------
                                          breaking octet
```

The host part of the breaking octet has 7 bits. Therefore the subnet has `2^7 = 128` addresses.

<br>
<br>

**Step 3**

The ip value of the breaking octet is `29` which is not equal to the number of addresses `128`. 

The next smaller integer that is divisible by `128` is `0` which we will use as the new ip value for the breaking octet.

<br>
<br>

**Step 4**

We caluculate the network address.

breaking octet value: `0`  
following octets value: -

|Given IP        |Network ID      |First Host IP   |Last Host IP    |Broadcast IP    |
|:---------------|:---------------|:---------------|:---------------|:---------------|
|110.86.48.29    |110.86.48.0     |                |                |                |


<br>
<br>

**Step 5**

We calculate the broadcast address.

breaking octet value: `0 + 128 - 1 = 127`

|Given IP        |Network ID      |First Host IP   |Last Host IP    |Broadcast IP    |
|:---------------|:---------------|:---------------|:---------------|:---------------|
|110.86.48.29    |110.86.48.0     |                |                |110.86.48.127   |

<br>
<br>

**Step 6 + 7**

We calculate the first and last host address by incrementing/decrementing by 1.

|Given IP        |Network ID      |First Host IP   |Last Host IP    |Broadcast IP    |
|:---------------|:---------------|:---------------|:---------------|:---------------|
|110.86.48.29    |110.86.48.0     |110.86.48.1     |110.86.48.126   |110.86.48.127   |

<br>
<br>
<br>

#### **Example 2**
<br>

We have the ip address `10.0.0.0/20` and want to calculate the network id, first and last host ip address and broadcast address.

<br>
<br>

**Step 1 + 2**

```
Subnetmask:    11111111.11111111.11110000.00000000
                                 --------
                                 breaking octet
```

The host part of the breaking octet has 4 bits. Therefore the subnet has `2^4 = 16` addresses.

<br>
<br>

**Step 3**

The ip value of the breaking octet is `0` which is not equal to the number of addresses `16`. 

The next smaller integer that is divisible by `16` is `0` which we will use as the new ip value for the breaking octet.

<br>
<br>

**Step 4**

We caluculate the network address.

breaking octet value: `0`  
following octets value: `0`

|Given IP        |Network ID      |First Host IP   |Last Host IP    |Broadcast IP    |
|:---------------|:---------------|:---------------|:---------------|:---------------|
|10.0.0.0        |10.0.0.0        |                |                |                |


<br>
<br>

**Step 5**

We calculate the broadcast address.

breaking octet value: `0 + 16 - 1 = 15`  
following octets value: `255` 

|Given IP        |Network ID      |First Host IP   |Last Host IP    |Broadcast IP    |
|:---------------|:---------------|:---------------|:---------------|:---------------|
|10.0.0.0        |10.0.0.0        |                |                |10.0.15.255     |

<br>
<br>

**Step 6 + 7**

We calculate the first and last host address by incrementing/decrementing by 1.

|Given IP        |Network ID      |First Host IP   |Last Host IP    |Broadcast IP    |
|:---------------|:---------------|:---------------|:---------------|:---------------|
|10.0.0.0        |10.0.0.0        |10.0.0.1        |10.0.15.254     |10.0.15.255     |

<br>
<br>
<br>

#### **Example 3**
<br>

We have the ip address `28.242.196.31/11` and want to calculate the network id, first and last host ip address and broadcast address.

<br>
<br>

**Step 1 + 2**

```
Subnetmask:    11111111.11100000.00000000.00000000
                        --------
                        breaking octet
```

The host part of the breaking octet has 5 bits. Therefore the subnet has `2^5 = 32` addresses.

<br>
<br>

**Step 3**

The ip value of the breaking octet is `242` which is not equal to the number of addresses `32`. 

The next smaller integer that is divisible by `32` is `224` which we will use as the new ip value for the breaking octet.

<br>
<br>

**Step 4**

We caluculate the network address.

breaking octet value: `224`  
following octets value: `0`

|Given IP        |Network ID      |First Host IP   |Last Host IP    |Broadcast IP    |
|:---------------|:---------------|:---------------|:---------------|:---------------|
|28.242.196.31   |28.224.0.0      |                |                |                |


<br>
<br>

**Step 5**

We calculate the broadcast address.

breaking octet value: `224 + 32 - 1 = 255`
following octets value: `255` 

|Given IP        |Network ID      |First Host IP   |Last Host IP    |Broadcast IP    |
|:---------------|:---------------|:---------------|:---------------|:---------------|
|28.242.196.31   |28.224.0.0      |                |                |28.255.255.255  |

<br>
<br>

**Step 6 + 7**

We calculate the first and last host address by incrementing/decrementing by 1.

|Given IP        |Network ID      |First Host IP   |Last Host IP    |Broadcast IP    |
|:---------------|:---------------|:---------------|:---------------|:---------------|
|28.242.196.31   |28.224.0.0      |28.224.0.1      |28.255.255.254  |28.255.255.255  |

<br>
<br>
<br>
<br>

## **Calculate Subnetmask from given IP adress range**
<br>

**Required Information**
* first ip of range
* last ip of range

<br>
<br>

**Step 1: Identify the first different octet between the first and last ip**

<br>

**Step 2: Determine the id of the next network `a` after the last ip**

<br>

**Step 3: Calculate the difference `b` between first ip and next network id in first different octet**

Calculate `b = octet(a) - octet(first ip)`

<br>

**Step 4: Calculate the minimal number of bits `c` required to display difference `b`**

Calculate `minimal c with 2^c >= b`

<br>


**Step 5: Calculate subnetmask**

Calculate `(number of octets before first different octet) x 8 + c`

<br>
<br>
<br>

### **Examples**
<br>
<br>
<br>

#### **Example 1**
<br>

We have the ip address range `111.224.0.1 - 111.239.255.254` and want to calculate the subnetmask.

<br>
<br>

**Step 1**

The first different octet is the second octet.

```
111.224.0.1
111.239.255.254
    ---
    first different octet
```

<br>
<br>

**Step 2**

We determine the next network id

Next network id: `111.240.0.0`

<br>
<br>

**Step 3**

We calculate the difference between the next network id and the first ip in the second octet.

```
next network id:    111.240.0.0
first ip of range:  111.224.0.1
                        ---
                        240 - 224 = 16
```

The difference is `16`.


<br>
<br>

**Step 4 + 5**

We need 4 bits to represent the difference, because `2^4 = 16 >= 16`.

Now we can calculate the subnetmask:

```
network id:   111.224.0.0
              --- ---
               8 + 4 = 12
```

So the subnetmask is `/12`.

<br>
<br>
<br>

#### **Example 2**
<br>

We have the ip address range `192.168.0.17 - 192.168.0.30` and want to calculate the subnetmask.

<br>
<br>

**Step 1**

The first different octet is the fourth octet.

```
192.168.0.17
192.168.0.30
          --
          first different octet
```

<br>
<br>

**Step 2**

We determine the next network id

Next network id: `192.168.0.31`

<br>
<br>

**Step 3**

We calculate the difference between the next network id and the first ip in the second octet.

```
next network id:    192.168.0.31
first ip of range:  192.168.0.17
                              --
                              31 - 17 = 14
```

The difference is `14`.


<br>
<br>

**Step 4 + 5**

We need 4 bits to represent the difference, because `2^4 = 16 >= 14`.

Now we can calculate the subnetmask:

```
network id:   192.168.0.17
              --- --- - --
               8 + 8 +8+ 4
```

So the subnetmask is `/28`.