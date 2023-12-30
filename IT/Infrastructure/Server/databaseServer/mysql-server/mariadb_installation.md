# **MariaDB Installation**
<br>

## **Table Of Contents**
<br>

- [**MariaDB Installation**](#mariadb-installation)
  - [**Table Of Contents**](#table-of-contents)
  - [**Download**](#download)
  - [**Initialize Database Environment**](#initialize-database-environment)
  - [**Start MariaDB**](#start-mariadb)
  - [**Configuration**](#configuration)

<br>
<br>

## **Download**
<br>

```bash
sudo apt install mariadb-server mariadb-client
```

<br>
<br>

## **Initialize Database Environment**
<br>

```bash
sudo mysql_install_db --user=mysql
```

<br>
<br>

## **Start MariaDB**
<br>

```bash
sudo systemctl start mariadb
```

<br>
<br>

## **Configuration**
<br>

```bash
sudo mysql_secure_installation
```