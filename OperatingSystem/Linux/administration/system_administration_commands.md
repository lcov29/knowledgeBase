# **System Administration Commands**
<br>
<br>

## **Table Of Contents**
<br>

- [**System Administration Commands**](#system-administration-commands)
  - [**Table Of Contents**](#table-of-contents)
  - [**Environment Variables**](#environment-variables)
  - [**Hardware**](#hardware)
  - [**Process**](#process)
  - [**Network**](#network)

<br>
<br>
<br>

## **Environment Variables**
<br>

Files for setting environment variables:

|File            |Description                             |
|:---------------|:---------------------------------------|
|/etc/profile    |(global) is executed upon starting bash |
|~/.bash_profile |(user) is executed upon login with bash |

<br>
<br>
<br>

## **Hardware**
<br>

```bash
lshw 							        # list hardware components
lshw -short						        # short overview of the hardware
lshw -class <class_1,...,class_n>       # list hardware components of <class_1,...,class_n>
lshw -json                              # format to json
lshw -html                              # format to html


fdisk -l                                # list partitions
fdisk <device_file>                     # edit device interactivly


mkfs -t <file_system_type> <device_file>
# create a file system of <file_system_type> on <device_file>


lsblk                                   # list block devices
bklid                                   # list block device attributes


mount                                                       # list all mounted filesystems
mount -t <file_system_type> <device_name> <directory>       # mount a filesystem device to a directory
umount <directory>                                          # unmount files systems from <directory>


df -h                                   # list file system disk space in human-readable format
du -h <directory>                       # list disk usage of <directory>
free -m                                 # display free and used memory in mebibytes 	
top                                     # display linux processes
htop                                    # interactive process viewer
mkswap <block_device | file>            # create a swap area
swapon -a                               # activate all swap partitions in /etc/fstab
swapon -s                               # print summary of swap area usage
```

<br>
<br>
<br>

## **Process**
<br>

```bash
netstat                                 # print active internet connections
netstat -lpntu                          # print all listening tcp and udp processes with port number
ss -lntup                               # alternative to netstat
```

<br>
<br>
<br>

## **Network**
<br>

```bash
dhclient        # Dynamic Host Configuration -> release or renew ip address
dhclient -r     # release ip address
```