# **Pass**
<br>
<br>

## **Table Of Contents**
<br>

- [**Pass**](#pass)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Installation**](#installation)
    - [**Step 1: Install _pass_ command**](#step-1-install-pass-command)
    - [**Step 2: Generate GPG Key**](#step-2-generate-gpg-key)
    - [**Step 3: Get secret key id _sec_**](#step-3-get-secret-key-id-sec)
    - [**Step 4: Initialize data store with generated key**](#step-4-initialize-data-store-with-generated-key)
  - [**Commonly used commands**](#commonly-used-commands)
    - [**List all available password stores**](#list-all-available-password-stores)
    - [**Get password for specific store**](#get-password-for-specific-store)
    - [**Add existing password to store**](#add-existing-password-to-store)
    - [**Generate new password**](#generate-new-password)
    - [**Edit existing password**](#edit-existing-password)
    - [**Remove password store**](#remove-password-store)
    - [**Rename password store**](#rename-password-store)


<br>
<br>
<br>

## **General**
<br>

Simple command line tool for secure password storage.

<br>
<br>
<br>

## **Installation**
<br>
<br>

### **Step 1: Install _pass_ command**
<br>

```bash
sudo apt install pass
```

<br>
<br>

### **Step 2: Generate GPG Key**
<br>

```bash
gpg --full-generate-key
```

<br>

* key type: option 1 (RSA and RSA)
* set password

<br>
<br>

### **Step 3: Get secret key id _sec_**
<br>

```bash
gpg --list-secret-keys --keyid-format LONG
```

<br>

Output Format:

```
<key-lenght-in-bits>/<sec-key>
```

<br>
<br>

### **Step 4: Initialize data store with generated key**
<br>

```bash
pass init '<sec-key>'
```

<br>
<br>
<br>

## **Commonly used commands**
<br>
<br>

### **List all available password stores**
<br>

```bash
pass show
```

<br>
<br>

### **Get password for specific store**
<br>

Requires master password.

<br>

```bash
pass show <store-name>
```
* prints password of `store-name` to command line

<br>

```bash
pass show -c <store-name>
```
* writes password of `store-name` to clipboard
* clipboard is cleared after 45 seconds

<br>
<br>

### **Add existing password to store**
<br>

```bash
pass insert <store-name>
```
* enter password via command prompt

<br>
<br>

### **Generate new password**
<br>

```bash
pass generate <store-name> [<password-length>]
```
* prints newly generated password of `store-name` to command line

<br>

```bash
pass generate -c <store-name> [<password-length>]
```
* writes newly generated password of `store-name` to clipboard
* clipboard is cleared after 45 seconds

<br>
<br>

### **Edit existing password**
<br>

```bash
pass edit <store-name>
```

<br>
<br>

### **Remove password store**
<br>

```bash
pass rm <store-name>
```

<br>
<br>

### **Rename password store**
<br>

```bash
pass mv <current-store-name> <new-store-name>
```
