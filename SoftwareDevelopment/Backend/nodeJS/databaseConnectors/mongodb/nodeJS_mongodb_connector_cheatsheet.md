# **NodeJS MongoDB Connector Cheatsheet**
<br>

## **Table Of Contents**
<br>

- [**NodeJS MongoDB Connector Cheatsheet**](#nodejs-mongodb-connector-cheatsheet)
  - [**Table Of Contents**](#table-of-contents)
  - [**Documentation**](#documentation)
  - [**Installation**](#installation)
  - [**Connection**](#connection)
    - [**Connection String**](#connection-string)
    - [**Create Connection**](#create-connection)
    - [**Connection Options**](#connection-options)
  - [**Select Database**](#select-database)
  - [**Select Collection Within Selected Database**](#select-collection-within-selected-database)
  - [**Read Operation**](#read-operation)
    - [**Query Data**](#query-data)
    - [**Aggregate Data**](#aggregate-data)
    - [**Project Data**](#project-data)
  - [**Write Operation**](#write-operation)
    - [**Insert Data**](#insert-data)
    - [**Delete Data**](#delete-data)
    - [**Update**](#update)
    - [**Upsert**](#upsert)
    - [**Replace**](#replace)

<br>
<br>
<br>

## **Documentation**
<br>

[mongodb.com](https://www.mongodb.com/docs/drivers/node/current/)

<br>
<br>
<br>

## **Installation**
<br>

```bash
npm install mongodb --save --save-exact
```

<br>
<br>
<br>

## **Connection**
<br>
<br>

### **Connection String**
<br>

```
mongodb://<username>:<password>@<hostname_or_ip>:<port>/?<options>
```
* username and password can be omitted if authentification is not enabled on server

<br>

Example:

```javascript
const connectionString = 'mongodb://username:secret@localhost:27017/testDB/?w=majority';
```

<br>
<br>

### **Create Connection**
<br>

```javascript
import { MongoClient } from 'mongodb';

const connectionString = 'mongodb://username:secret@localhost:27017/testDB/?w=majority';
const client = new MongoClient(connectionString);

try {
    await client.connect();

    // send queries...
}

client.close();
```

<br>
<br>

### **Connection Options**
<br>

* list is not complete
* [full list](https://www.mongodb.com/docs/drivers/node/current/fundamentals/connection/connection-options/)

<br>

|Option          |Type    |Default |Description
|:---------------|:-------|:-------|:-------------------------------------------------------------
|appname         |string  |null    |specify app name send to the server. Will show up in logs
|connectTimeoutMS|integer |10000   |specify wait period to establisch TCP socket connection
|journal         |boolean | null   |specify default write concertn "j"
|loadBalanced    |boolean |null    |specify whether driver is connecting to a load balancer
|maxPoolSize     |integer |100     |maximum number of connections driver can create in connection pool
|minPoolSize     |integer |0       |minimum number of connections driver should maintain in pool even when no operations are occurring
|maxConnecting   |integer |2       |maximum number of concurrent connections
|proxyHost       |string  |null    |ip address or domain name of proxy server used for connection to mongodb
|proxyPort       |integer |null    |
|proxyUsername   |string  |null    |
|proxyPassword   |string  |null    |

<br>
<br>
<br>

## **Select Database**
<br>

```javascript
const database = client.db('databaseName');
```

<br>
<br>
<br>

## **Select Collection Within Selected Database**
<br>

```javascript
const collection = database.collection('collectionName');
```

<br>
<br>
<br>

## **Read Operation**
<br>
<br>

### **Query Data**
<br>

```javascript
resultCursor = collectionName.find(/* optional selection */);
```
<br>

```javascript
const resultObject = await collectionName.findOne(/* optional selection */);
```
<br>

* see [mongoDB](../../../../../../Infrastructure/Server/databaseServer/mongoDB/mongodb.md#read) for documentation of _find()_ and _findOne()_;
* **ATTENTION: Projection Statement must not be placed in find() or findOne() when using Node.js Connector**

<br>
<br>

### **Aggregate Data**
<br>

```javascript
const resultCursor = await collectionName.aggregate(/* aggregation options */);
```
* see [mongoDB](../../../../../../Infrastructure/Server/databaseServer/mongoDB/mongodb.md#aggregation-pipeline)

<br>
<br>

### **Project Data**
<br>

```javascript
const resultCursor = collectionName.find(/* optional selection */).project({fieldName1: <0,1>, ...})
```

<br>
<br>
<br>

## **Write Operation**
<br>
<br>

### **Insert Data**
<br>

```javascript
const result = await collectionName.insertOne(<document>)
```

<br>

```javascript
const result = await collectionName.insertMany([<document>, ...])
```

<br>
<br>

### **Delete Data**
<br>

```javascript
const result = await collectionName.deleteOne(<selectionObject>);
```

<br>

```javascript
const result = await collectionName.deleteMany(<selectionObject>);
```

<br>
<br>

### **Update**
<br>

```javascript
const result = await collectionName.updateOne(filterObject, updateDocument);
```

<br>

```javascript
const result = await collectionName.updateMany(filterObject, updateDocument);
```

<br>
<br>

### **Upsert**
<br>

```javascript
const result = await collectionName.updateOne(filterObject, updateDocument, {upsert: true});
```
* **Up**date existing document or In**sert** into new document

<br>
<br>

### **Replace**
<br>

```javascript
const result = await collectionName.replaceOne(filterObject, replacementDocument);
```

