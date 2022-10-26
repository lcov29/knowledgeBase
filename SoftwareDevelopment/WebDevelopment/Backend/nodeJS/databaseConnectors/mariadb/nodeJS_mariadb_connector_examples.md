# **NodeJS MariaDB Connector Examples**
<br>

## **Table Of Contents**
<br>

- [**NodeJS MariaDB Connector Examples**](#nodejs-mariadb-connector-examples)
  - [**Table Of Contents**](#table-of-contents)
  - [**Examples**](#examples)
    - [**Basic**](#basic)
    - [**Transaction**](#transaction)
    - [**Connection Pooling**](#connection-pooling)

<br>
<br>
<br>

## **Examples**
<br>
<br>

### **Basic**
<br>

```javascript
import { createConnection } from 'mariadb';


let connection = null;

try {

    const connectionOption = {
        host: 'hostname',
        port: 3306,
        user: 'username',
        password: 'secret',
        database: 'databasename'
    };

    connection = await createConnection(connectionOption);

    let resultSet = null;


    // ====== DQL Statements ======


    // Without Placeholders
    resultSet = await connection.query('select * from Persons;');


    // With Placeholders
    resultSet = await connection.query(
        `Select firstName, lastName, dateOfBirth 
        from Persons
        where lastName = (?) and dateOfBirth < (?)
        order by dateOfBirth desc`,
        ['Doe', '2000-01-01']
    );

    console.log(resultSet);

    /*
    [
       {
        firstName: 'Jane',
        lastName: 'Doe',
        dateOfBirth: 1998-02-16T23:00:00.000Z
       },

       {
        firstName: 'John',
        lastName: 'Doe',
        dateOfBirth: 1990-12-12T23:00:00.000Z
       },

        meta: [
            ColumnDef {
            collation: [Collation],
            columnLength: 200,
            columnType: 253,
            flags: 4097,
            scale: 0,
            type: 'VAR_STRING'
            },
            ColumnDef {
            collation: [Collation],
            columnLength: 200,
            columnType: 253,
            flags: 4097,
            scale: 0,
            type: 'VAR_STRING'
            },
            ColumnDef {
            collation: [Collation],
            columnLength: 19,
            columnType: 12,
            flags: 4225,
            scale: 0,
            type: 'DATETIME'
            }
        ]
    ]
    */

    // ====== DDL and DML Statements ======


    resultSet = await connection.query(
        `insert into Persons (firstName, lastName, dateOfBirth)
         values (?, ?, ?);`,
        ['Alison', 'Peter', '2010-07-23']
    );
    
    console.log(resultSet);
    // { affectedRows: 1, insertId: 4n, warningStatus: 0 }

} catch(error) {
    console.log(error);
} finally {
    connection.end();
}
```

<br>
<br>
<br>

### **Transaction**
<br>

```javascript
import { createConnection } from 'mariadb';


let connection = null;

try {

    const connectionOption = {
        host: 'hostname',
        port: 3306,
        user: 'username',
        password: 'secret',
        database: 'databasename'
    };

    connection = await createConnection(connectionOption);

    let resultSet = null;

    await connection.beginTransaction();

    resultSet = await connection.query(
        `update Persons
         set firstName = 'Max'
         where firstName = 'John' and lastName = 'Doe';`
    );

    resultSet = await connection.query(
        `insert into NonexistentTable
         values();`
    );

    await connection.commit();
    
} catch(error) {
    await connection.rollback();
    console.log(error);
} finally {
    connection.end();
}
```

<br>
<br>
<br>

### **Connection Pooling**
<br>

```javascript
import express from 'express';
import { createPool } from 'mariadb';
import { createServer } from 'node:http';


const port = 3000;

const connectionPoolOption = {
    host: 'hostname',
    port: 3306,
    user: 'username',
    password: 'secret',
    database: 'databasename',
    connectionLimit: 4
};

let dbConnectionPool = null;
let server = null;

try {

    const app = express();
    server = createServer(app);
    dbConnectionPool = createPool(connectionPoolOption);
    
    app.get('/Persons/:startIndex/:endIndex?', processDataRequest);

    server.listen(port, () => {console.log(`server listening on port ${port}...`)});
} catch(error) {
    dbConnectionPool?.end();
    server?.close();
    console.log(error);
}


async function processDataRequest(request, response) {
    let dbConnection = null;

    try {
        dbConnection = await dbConnectionPool.getConnection();

        const resultSet = await dbConnection.query(
            `select *
             from Persons
             where id between ? and ?;`,
             [request.params.startIndex - 0,
              request.params.endIndex - 0 || request.params.startIndex - 0]
        );

        response.send(resultSet.slice());
    } catch(error) {
        response.send({});
        console.log(error);
    } finally {
        dbConnection?.release();
    }
}
```