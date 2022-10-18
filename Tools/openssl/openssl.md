# **Openssl**
<br>

## **Table Of Contents**
<br>

- [**Openssl**](#openssl)
  - [**Table Of Contents**](#table-of-contents)
  - [**Basic Certification**](#basic-certification)
    - [**1. Create Key**](#1-create-key)
    - [**2. Create Certificate Signing Request (CSR)**](#2-create-certificate-signing-request-csr)
    - [**3. Verify And Sign Certificate Request**](#3-verify-and-sign-certificate-request)
      - [**3.1 Create Certificate**](#31-create-certificate)
      - [**3.2 Show Details**](#32-show-details)

<br>
<br>
<br>

## **Basic Certification**
<br>
<br>

### **1. Create Key**
<br>

```bash
openssl genpkey -algorithm RSA -pkeyopt rsa_keygen_bits:4096 -out <keyname>.key
```

<br>
<br>

### **2. Create Certificate Signing Request (CSR)**
<br>

```bash
openssl req -new -sha256 -key <keyname>.key -out <certificationRequestName>.pem
```

<br>
<br>

### **3. Verify And Sign Certificate Request**
<br>

This step is normally done by a certification authority (CA). You can also sign the request yourself by using your private key ('self certificate'). In this case the browser will issue a warning that your site is not trustworthy, so use self certificates only for test environments.

<br>

#### **3.1 Create Certificate**
<br>

```bash
openssl x509 -in <certificationname>.pem -out <certificationRequestName>.pem -req -signkey <keyname>.pem -sha512 -days <number>
```
<br>

After the certificate is created we can delete our certification request file.

<br>
<br>

#### **3.2 Show Details**
<br>

```bash
openssl x509 -in <certificationname>.pem -text -noout
```