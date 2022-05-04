# **SQL**

<br>

## **Table Of Contents**
<br>

- [**SQL**](#sql)
  - [**Table Of Contents**](#table-of-contents)
  - [**Executing SQL Scripts**](#executing-sql-scripts)
  - [**Data Definition Language (DDL)**](#data-definition-language-ddl)
    - [**Database**](#database)
    - [**Tables**](#tables)
    - [**Views**](#views)
    - [**Procedures**](#procedures)
  - [**Data Manipulation Language (DML)**](#data-manipulation-language-dml)
  - [**Data Query Language (DQL)**](#data-query-language-dql)
  - [**Data Control Language (DCL)**](#data-control-language-dcl)
  - [**Transaction Control Language (TCL)**](#transaction-control-language-tcl)
<br>
<br>
<br>

## **Executing SQL Scripts**
<br>

You can execute sql scripts via commandline.

<br>

Execute script while not logged into mysql:
```bash
mysql -u <username> -p <databaseName> < <Path to scriptFile.sql>
```
<br>

Execute script while logged into mysql:
```bash
source <Path to scriptFile.sql>
```

<br>
<br>
<br>

## **Data Definition Language (DDL)**
<br>
<br>

### **Database**
<br>

```sql
create database [if not exist] databaseName;

drop database [if exists] databaseName;
```

<br>
<br>

### **Tables**
<br>

```sql
show tables;                                  -- show all tables of currently selected database;


show create table <tableName>;                -- show definition statement of specified table


describe <tableName>;                         -- show all columns of specific table


create table [if not exists] <tableName> (
  id int auto_increment,
  attribute1 varchar(20) not null default 'default',
  attribute2 int,
  primary key (id),
  foreign key (attribute2) references <foreignTable>(foreignAttribute)
  [on update < cascade | no action | set null | set default >]
  [on update < cascade | no action | set null | set default >]
);


create table [if not exists] <tableName> as <sqlQuery>;


drop table [if not exists] <tableName>;       -- delete table definition and data


truncate table <tableName>;                   -- delete and recreate table


rename table oldTableName to newTableName;    


alter table <tableName>                       -- add column to table
add column <columnName> <columnDefinition>
[First | After <columnName>];


alter table <tableName>
change column <oldColumnName> <newColumnName> <columnDefinition>
[First | After <columnName>];


alter table <tableName>
drop column <columnName>;


alter table <tableName>
rename column <oldColumnName> <newColumnName>;
```

<br>
<br>

### **Views**
<br>

```sql
create view <viewName> as <sqlQuery>;


show create view <viewName>;               -- show definition of view viewName


show full tables                           -- show all views
where table_type = 'VIEW';


alter view <viewName> as <sqlQuery>;


drop view [if exists] <viewName>;
```

<br>
<br>

### **Procedures**
<br>

```sql
show procedure status;                      -- show all procedures


show create procedure <procedureName>;      -- show definition of specific procedure
```

<br>
<br>

## **Data Manipulation Language (DML)**
<br>

## **Data Query Language (DQL)**
<br>

## **Data Control Language (DCL)**
<br>

## **Transaction Control Language (TCL)**





