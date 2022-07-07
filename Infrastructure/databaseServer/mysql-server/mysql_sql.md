# **SQL**

<br>

## **Table Of Contents**
<br>

- [**SQL**](#sql)
  - [**Table Of Contents**](#table-of-contents)
  - [**Execute SQL Scripts**](#execute-sql-scripts)
  - [**Database**](#database)
    - [**Create Database**](#create-database)
    - [**Select Database**](#select-database)
    - [**Delete Database**](#delete-database)
  - [**Tables**](#tables)
    - [**List All Tables Of Currently Selected Database**](#list-all-tables-of-currently-selected-database)
    - [**Create Tables**](#create-tables)
    - [**Show General Structure Of Existing Table**](#show-general-structure-of-existing-table)
    - [**Show Create Statement Of Existing Table**](#show-create-statement-of-existing-table)
    - [**Copy Table**](#copy-table)
    - [**Rename Table**](#rename-table)
    - [**Clear Table Data**](#clear-table-data)
    - [**Delete Table**](#delete-table)
    - [**Replace Column**](#replace-column)
    - [**Add Column To Table**](#add-column-to-table)
    - [**Delete Column**](#delete-column)
    - [**Rename Column**](#rename-column)
  - [**Views**](#views)
    - [**Create View**](#create-view)
    - [**List All Views In Selected Database**](#list-all-views-in-selected-database)
    - [**Show Definition Statement Of View**](#show-definition-statement-of-view)
    - [**Change View Definition**](#change-view-definition)
    - [**Delete View**](#delete-view)
  - [**Procedures**](#procedures)
    - [**Create Stored Procedure**](#create-stored-procedure)
    - [**List All Procedures**](#list-all-procedures)
    - [**Show Definition Statement For View**](#show-definition-statement-for-view)
    - [**Delete Procedure**](#delete-procedure)
  - [**Index**](#index)
    - [**Create Index**](#create-index)
    - [**List All Indexes**](#list-all-indexes)
    - [**Delete Index**](#delete-index)
  - [**Select Statements**](#select-statements)
    - [**Basic Statement**](#basic-statement)
  - [**Data Manipulation**](#data-manipulation)
    - [**Insert Data**](#insert-data)
    - [**Update Data**](#update-data)
    - [**Delete Data**](#delete-data)

<br>
<br>
<br>
<br>

## **Execute SQL Scripts**
<br>

You can execute sql scripts via commandline.

<br>

Execute script while not logged in
```bash
mysql -u <username> -p <databaseName> < <Path to scriptFile.sql>
```
<br>

Execute script while logged in
```bash
source <Path to scriptFile.sql>
```

<br>
<br>
<br>
<br>

## **Database**
<br>
<br>
<br>

### **Create Database**
<br>

```sql
create database [if not exist] <databaseName>;
```

<br>
<br>
<br>

### **Select Database**
<br>

```sql
use <databaseName>;
```

<br>
<br>
<br>

### **Delete Database**
<br>

```sql
drop database [if exists] databaseName;
```

<br>
<br>
<br>
<br>

## **Tables**
<br>
<br>
<br>

### **List All Tables Of Currently Selected Database**
<br>

```sql
show tables;
```

<br>
<br>
<br>

### **Create Tables**
<br>

```sql
create table [if not exists] <tableName> (
  <attributeName1> <data type> <restriction List>,
  ... ,
  <attributeNameN> <data type> <restriction List>,
  [constraint <constraintName> Check(expression)],
  [primary key (<attributeName>),
  [foreign key (<attributeName>) references <foreignTableName>(<foreignTableAttributeName>)]
	[on update < cascade | no action | set null | set default >]
	[on delete < cascade | no action | set null | set default >]
```
  
<br>
<br>

Restrictions For Attributes:

|Restrictions	|Description
|:--------------|:------------------
|AUTO_INCREMENT |automatically generate unique integer value for new records by incrementing
|NULL			|allow attribute to be null
|NOT NULL		|attribute must not be null
|UNIQUE			|attribute must be unique --> Not duplicates allowed
|Default		|default value for attribute
|Invisible		|attribute does not show up in select *

<br>
<br>

Example

```sql
Create table Person (
	id int auto_increment not null,
	firstName varchar(50) not null default 'John',
	lastName varchar(50) not null default 'Doe',
	age int not null default 0,
	isMale boolean default true,
	countryId int not null,
	constraint constrAge check(age > 0 and age < 125),
	primary key(id),
	foreign key(countryId) references Country(id)
		on update cascade
		on delete set null
);
```

<br>
<br>
<br>

### **Show General Structure Of Existing Table**
<br>

```sql
describe <tableName>;
```

<br>
<br>
<br>

### **Show Create Statement Of Existing Table**
<br>

```sql
show create table <tableName>;
```

<br>
<br>
<br>

### **Copy Table**
<br>

```sql
create table [if not exists] <tableName> as <SelectStatement>;
```

<br>

Example
```sql
create table Person2 as 
select * from Person;
```

<br>
<br>
<br>

### **Rename Table**
<br>

```sql
rename table <oldTableName> to <newTableName>;
```

<br>
<br>
<br>

### **Clear Table Data**
<br>

```sql
truncate table <tableName>;
```

<br>
<br>
<br>

### **Delete Table**
<br>

```sql
drop table [if not exists] <tableName>;
```

<br>
<br>
<br>

### **Replace Column**
<br>

```sql
alter table <tableName>
change column <oldColumnName> <newColumnName> <columnDefinition>
[First | After <columnName>];
```

<br>
<br>
<br>

### **Add Column To Table**
<br>

```sql
alter table <tableName>
add column <columnName> <columnDefinition>
[First | After <columnName>];
```

<br>
<br>
<br>

### **Delete Column**
<br>

```sql
alter table <tableName>
drop column <columnName>;
```

<br>
<br>
<br>

### **Rename Column**
<br>

```sql
alter table <tableName>
rename column <oldColumnName> <newColumnName>;
```

<br>
<br>
<br>
<br>

## **Views**
<br>
<br>
<br>

### **Create View**
<br>

```sql
create view <viewName> as <sqlQuery>;
```

<br>
<br>
<br>

### **List All Views In Selected Database**
<br>

```sql
show full tables
where table_type = 'VIEW';
```

<br>
<br>
<br>

### **Show Definition Statement Of View**
<br>

```sql
show create view <viewName>;
```

<br>
<br>
<br>

### **Change View Definition**
<br>

```sql
alter view <viewName> as <sqlQuery>;
```

<br>
<br>
<br>

### **Delete View**
<br>

```sql
drop view [if exists] <viewName>;
```

<br>
<br>
<br>
<br>

## **Procedures**
<br>
<br>
<br>

### **Create Stored Procedure**
<br>

```sql
delimiter ;;
	
create procedure <procedureName> (
	in <parameterName> <data type>,
	out <parameterName> <data type>,
	inout <parameterName> <data type>)
begin
	<sql statement with optional logic>
end;;
	
delimiter ;
```

<br>
<br>
<br>

### **List All Procedures**
<br>

```sql
show procedure status;
```

<br>
<br>
<br>

### **Show Definition Statement For View**
<br>

```sql
show create procedure <procedureName>;      -- show definition of specific procedure
```

<br>
<br>
<br>

### **Delete Procedure**
<br>

```sql
drop procedure [if exists] <procedureName>;
```

<br>
<br>
<br>
<br>

## **Index**
<br>
<br>
<br>

### **Create Index**
<br>

```sql
create index <indexName> on <tableName>(<attributeName>);
```

<br>
<br>
<br>

### **List All Indexes**
<br>

```sql
show index from <tableName>;
```

<br>
<br>
<br>

### **Delete Index**
<br>

```sql
drop index <indexName> on <tableName>;
```

<br>
<br>
<br>
<br>

## **Select Statements**
<br>
<br>
<br>

### **Basic Statement**
<br>

```sql
select [distinct] * 
from <tableName>
[where <condition>]
[group by <attribute1>, ... ,<attributeN>]
[having <condition>]
[order by <attribute1> <asc | desc>, ... , <attributeN> <asc | desc>]
[limit <number>];
```

<br>

```sql
select [distinct] <attribute1> [ as <alias>], ..., <attributeN> [as <alias>]
from <tableName>
[where <condition>]
[group by <attribute1>, ... ,<attributeN>]
[having <condition>]
[order by <attribute1> <asc | desc>, ... , <attributeN> <asc | desc>]
[limit <number>];
```

<br>
<br>
<br>
<br>

## **Data Manipulation**
<br>
<br>
<br>

### **Insert Data**
<br>

```sql
insert into <tableName> (<attribute1>, ..., <attributeN>)
values ('value1', ..., valueN), ... ,('value1, ... , valueN);
```

<br>

```sql
insert into <tableName1> (<attribute1>, ..., <attributeN>)
select <attribute1>, ... , <attributeN> from <tableName2>
```

<br>
<br>
<br>

### **Update Data**
<br>

```sql
update <tableName>
set <attribute1> = <value1>, ... , <attributeN> = <valueN>
[where <condition>];
```

<br>
<br>
<br>

### **Delete Data**
<br>

```sql
delete from <tableName>
where <condition>;
```







