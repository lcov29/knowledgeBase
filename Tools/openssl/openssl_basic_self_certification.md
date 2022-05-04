## **Basic Self Certification Via Openssl**
<br>

### **Create Key**

```bash
openssl genpkey -algorithm RSA -pkeyopt rsa_keygen_bits:2048 -out <keyname>.key
chmod 400 <keyname>.key
```

<br>

### **Create Certification**

```bash
openssl req -new -sha256 -key <keyname>.key -out <certificationname>.csr
```

<br>

### **Verify Certification**

```bash
openssl x509 -req -days <number> -in <certificationname>.csr -signkey <keyname>.key -sha256 -out <signature>.pem
```