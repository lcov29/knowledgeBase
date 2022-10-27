# **NodeJS MariaDB Connector Cheatsheet**
<br>

## **Table Of Contents**
<br>

- [**NodeJS MariaDB Connector Cheatsheet**](#nodejs-mariadb-connector-cheatsheet)
  - [**Table Of Contents**](#table-of-contents)
  - [**Documentation**](#documentation)
  - [**Installation**](#installation)
  - [**Import**](#import)
    - [**ES6 Module Import**](#es6-module-import)
    - [**CommonJS Module Import**](#commonjs-module-import)
  - [**Database Connection**](#database-connection)
  - [**Connection Pool**](#connection-pool)
  - [**SQL Queries**](#sql-queries)
  - [**Result Sets**](#result-sets)
    - [**DQL Result Sets**](#dql-result-sets)
    - [**DML and DDL Result Sets**](#dml-and-ddl-result-sets)
  - [**Transactions**](#transactions)

<br>
<br>
<br>

## **Documentation**
<br>

[mariadb.com](https://mariadb.com/kb/en/about-mariadb-connector-nodejs/)

<br>
<br>
<br>

## **Installation**
<br>

```bash
npm install mariadb --save --save-exact
```

<br>
<br>
<br>

## **Import**
<br>
<br>

### **ES6 Module Import**
<br>

```javascript
import mariadb from 'mariadb';
```

<br>
<br>

### **CommonJS Module Import**
<br>

```javascript
const mariadb = require('mariadb');
```

<br>
<br>
<br>

## **Database Connection**
<br>

```javascript
import  { createConnection } from 'mariadb';

const connectionOption = {
    host: 'hostname',
    port: 3306,
    user: 'username',
    password: 'secret',
    database: 'databasename'
};

const connection = await createConnection(connectionOption);

// send sql queries ...

await connection.end();
```

<br>
<br>
<br>

## **Connection Pool**
<br>

```javascript
import { createPool } from 'mariadb';

const connectionOption = {
    host: 'hostname',
    port: 3306,
    user: 'username',
    password: 'secret',
    database: 'databasename',
    connectionLimit: 4
};

const connectionPool = createPool(connectionOption);
const connection = await connectionPool.getConnection();

// send sql queries ...

connection.release();

// when pool is no longer needed:

await connectionPool.end()
```

<br>

Shorthand:

```javascript
const connectionPool = createPool(connectionOption);

// get connection from pool, send query and release connection back to pool
const resultSet = await connectionPool.query('sql statement');
```

<br>
<br>
<br>

## **SQL Queries**
<br>
<br>

```
await connection.query('<sql-query>', [argumentList]) : resultSet
```

<br>

Examples

```javascript
const resultSet = connection.query('select * from Person;');
```

<br>

```javascript
const resultSet = connection.query(
    `select *
     from Person
     where firstName = ? and lastName = ?;`,
     ['John', 'Doe']
);
```

<br>
<br>
<br>

## **Result Sets**
<br>

There are two types of result sets:

<br>

### **DQL Result Sets**
<br>

```javascript
[
    // data records
    { 
        column1: 'value',
        column2: 'value',
        ...
    },

    ...
    
    ,
    {
        column1: 'value',
        column2: 'value',
        ...
    },

    // meta information
    meta: [
        ColumnDef { ... },
        ColumnDef { ... }
    ]
]
```

<br>

### **DML and DDL Result Sets**
<br>

```javascript
{ 
    affectedRows: 1,
    insertId: 4n,
    warningStatus: 0
}
```

<br>
<br>
<br>

## **Transactions**
<br>

```javascript
const connection = await createConnection(connectionOption);

try {
    await connection.beginTransaction();

    // send sql queries

    await connection.commit();

} catch(error) {
    await connection.rollback();
}
```