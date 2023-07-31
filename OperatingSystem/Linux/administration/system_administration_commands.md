# **System Administration Commands**
<br>
<br>

## **Table Of Contents**
<br>

- [**System Administration Commands**](#system-administration-commands)
  - [**Table Of Contents**](#table-of-contents)
  - [**Print System Information**](#print-system-information)
  - [**Print Distribution Information**](#print-distribution-information)
  - [**Root Privilege**](#root-privilege)
  - [**Environment Variables**](#environment-variables)
  - [**Hardware**](#hardware)
  - [**Process**](#process)
  - [**Network**](#network)
  - [**User Management**](#user-management)
    - [**Create User**](#create-user)
    - [**Modify Existing User**](#modify-existing-user)
    - [**Delete User**](#delete-user)

<br>
<br>
<br>

## **Print System Information**
<br>

```bash
uname -a
```

* prints system information
  * kernel-name
  * network node hostname
  * kernel-release
  * kernel version
  * machine hardware name
  * processor type
  * hardware platform
  * operating system

<br>
<br>
<br>

## **Print Distribution Information**
<br>

```bash
cat /etc/*release
```

<br>
<br>
<br>

## **Root Privilege**
<br>

```bash
sudo <command>
# execute <command> as root (if allowed)


sudo -u <user_name | user_id> <command>
# execute <command> as <user_name>


sudo -i
# start subshell with root privilege (if allowed)



visudo
# edit /etc/sudoers (describes who can execute root commands)
    # User Specification Format:	  <initial_user> <host> = (tartget_user>) <commands>
    # Alias Format: 			          <alias_name> = <user_names | hosts | target_users | command_list>
    # Defaults Format:		          Defaults <option>
```

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

<br>
<br>
<br>

## **User Management**
<br>

Files for defining users:

|File            |Description                            |
|:---------------|:--------------------------------------|
|/etc/passwd     |                                       |
|/etc/group      |                                       |
|/etc/shadow     |                                       |
|/etc/login.defs |setting for password-aging, length etc |

<br>
<br>

### **Create User**
<br>

```bash
useradd --defaults            # print default useradd configuration


useradd <user_name>	          # add new user <user_name>
	-u <uid>
	-g <primary group>
	-G <secondary_group_1,...,secondary_group_n>
	-c <comment>
	-m <home_directory> -k <reference_directory>
	-d <login_directory>
	-s <shell_path>
```

<br>
<br>

### **Modify Existing User**
<br>

```bash
usermod <user_name>           # modify user <user_name>
	-m                          # create home directory				
	-u <uid>
	-g <primary_group>
	-G <secondary_group_1,...,secondary_group_n>
	-c <comment>
	-d <home_directory>
	-s <startprogram>
	-f <lock_time>
	-e <expiration_date>
	-l <new_user_name>
```

<br>
<br>

### **Delete User**
<br>

```bash
userdel -r <user_name>          # delete user <user_name> with login directory and mail (-r)
```