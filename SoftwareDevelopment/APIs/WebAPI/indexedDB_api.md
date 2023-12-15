# **IndexedDB API**
<br>

## **Table Of Contents**
<br>

- [**IndexedDB API**](#indexeddb-api)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Basic Usage**](#basic-usage)
  - [**Check Availability**](#check-availability)
  - [**Open Database Connection**](#open-database-connection)
  - [**Create Object Stores And Indexes**](#create-object-stores-and-indexes)
  - [**Open Transaction**](#open-transaction)
  - [**Database Operations**](#database-operations)
    - [**Modifying Data**](#modifying-data)
      - [**Add Record**](#add-record)
      - [**Update Record Specified By Key**](#update-record-specified-by-key)
      - [**Delete Record Specified By Key**](#delete-record-specified-by-key)
      - [**Delete All Records From Store**](#delete-all-records-from-store)
    - [**Data Query**](#data-query)
      - [**Select All Records From Store Via Cursor**](#select-all-records-from-store-via-cursor)
      - [**Select Record For Specified Key**](#select-record-for-specified-key)
      - [**Select All Records Sorted Via Index**](#select-all-records-sorted-via-index)
      - [**Select Filtered Records Sorted Via Index**](#select-filtered-records-sorted-via-index)
        - [**Filter Options**](#filter-options)
  - [**Example**](#example)

<br>
<br>
<br>
<br>

## **General**
<br>

* javascript-based object-oriented transactional database implemented by browsers
* can store significant amount of structured data persistently as key-value pairs in data stores
* data is stored on client side (can be deleted by user or browser -> private mode)
* follows the same-origin policy
* indexes allow searching and filtering

<br>

* NoSQL Database
  * no defined relation schemas
  * no SQL statements

<br>
<br>
<br>
<br>

## **Basic Usage**
<br>

1. open database connection
2. create or access object store in database
3. start transaction
4. request database operation
5. process operation results in DOM event listeners

<br>
<br>
<br>
<br>

## **Check Availability**
<br>

```javascript
if(!window.indexedDB) {
  // indexedDB is not available. Make sure that your browser is not in private mode and supports indexedDB
} else {
  // indexedDB is available
}
```

<br>
<br>
<br>
<br>

## **Open Database Connection**
<br>

```javascript
const dbName = 'testDB';
const dbVersion = 1;
let database;

dbOpenRequest = window.indexedDB.open(dbName, dbVersion);


dbOpenRequest.addEventListener('error', (event) => {
  // called when opening database failed
});


dbOpenRequest.addEventListener('upgradeneeded', (event) => {
  // called when database is not created yet or version property changed

  // add objectStores and Indexes here...
});


dbOpenRequest.addEventListener('success', (event) => {
  // called when connected successfully
  database = event.target.result;
});
```

<br>
<br>
<br>
<br>

## **Create Object Stores And Indexes**
<br>

```javascript
dbOpenRequest.addEventListener('upgradeneeded', (event) => {
  database = event.target.result;

  // create new objectStore
  if (database.objectStoreNames.contains('testStore')) {
  database.deleteObjectStore('testStore');
  }
  const objectStore = database.createObjectStore(storeName, { autoIncrement: true });

  // create index for filtering and sorting data
  objectStore.createIndex('indexName', 'indexedProperty', { unique: false });
});
```

<br>
<br>

Object store options:
<br>

|Option                     |Description
|:--------------------------|:------------
|{ autoIncrement: true}     |key of object store is automatically generated
|{ keyPath: 'propertyName'} |use specified object property as key

<br>
<br>
<br>
<br>

## **Open Transaction**
<br>

```javascript
const storeName = 'testStore';
const mode = 'readwrite';         // or 'readonly

const transaction = database.transaction('testStore', mode);

transaction.addEventListener('error', (event) => {
  // optional error handling
});

transaction.addEventListener('complete', (event) => {
  // optional complete handling
});

transaction.addEventListener('success', (event) => {
  // optional success handling
});
```

<br>
<br>
<br>
<br>

## **Database Operations**
<br>
<br>
<br>
<br>

### **Modifying Data**
<br>
<br>
<br>

#### **Add Record**
<br>

```javascript
const storeName = 'testStore';
const newRecordObject = { key1: 'value1', key2: 'value2', keyN: 'valueN' };

const result = transaction.objectStore(storeName).add(newRecordObject);

result.addEventListener('error', (event) => {
  // optional error handling
});

result.addEventListener('success', (event) => {
  // optional success handling
});
```

<br>
<br>
<br>

#### **Update Record Specified By Key**
<br>

```javascript
const storeName = 'testStore';
const updatedRecordObject = { key1: 'value1', key2: 'value2', keyN: 'valueN' };
const primaryKeyOfUpdatedObject = 2     // can also be object property name

const result = transaction.objectStore(storeName).put(updatedRecordObject, primaryKeyOfUpdatedObject);

result.addEventListener('error', (event) => {
  // optional error handling
});

result.addEventListener('success', (event) => {
  // optional success handling
});
```

<br>
<br>
<br>

#### **Delete Record Specified By Key**
<br>

```javascript
const storeName = 'testStore';
const primaryKey = 2              // can also be object property name

const result = transaction.objectStore(storeName).delete(primaryKey);

result.addEventListener('error', (event) => {
  // optional error handling
});

result.addEventListener('success', (event) => {
  // optional success handling
});
```

<br>
<br>
<br>

#### **Delete All Records From Store**
<br>

```javascript
const storeName = 'testStore';

const result = transaction.objectStore(storeName)..clear();

result.addEventListener('error', (event) => {
  // optional error handling
});

result.addEventListener('success', (event) => {
  // optional success handling
});
```

<br>
<br>
<br>
<br>

### **Data Query**
<br>
<br>
<br>

#### **Select All Records From Store Via Cursor**
<br>

```javascript
const storeName = 'testStore';
const direction = 'next';           // default; check table for other directions
const request = transaction.objectStore(storeName).openCursor(direction);

request.addEventListener('success', (event) => {
  const cursor = event.target.result;
  if (cursor) {
    const recordObject = cursor.value;
    // process recordObject here
    cursor.continue();
  }
});
```

<br>
<br>

|Direction  |Description
|:----------|:------------
|next       |cursor runs over all records in increasing key order (default)
|nextunique |cursor runs over all records in increasing key order; ignoring duplicates 
|prev       |cursor runs over all records in decreasing key order
|prevunique |curose runs over all records in decreasing key order; ignoring duplicates 

<br>
<br>
<br>

#### **Select Record For Specified Key**
<br>

```javascript
const storeName = 'testStore';
const key = 2;

const request = transaction.objectStore(storeName).get(key);

request.addEventListener('success', (event) => {
  let recordObject = event.target.result;
  // process recordObject here
});
```

<br>
<br>
<br>

#### **Select All Records Sorted Via Index**
<br>

```javascript
const storeName = 'testStore';
const indexName = 'indexTest';
const direction = 'next';

const index = transaction.objectStore(storeName).index(indexName);
const request = index.openCursor(direction);

request.addEventListener('success', (event) => {
  const cursor = event.target.result;
  if (cursor) {
    const recordObject = cursor.value;
    // process recordObject here
    cursor.continue();
  }
});
```

<br>
<br>
<br>

#### **Select Filtered Records Sorted Via Index**
<br>

```javascript
const storeName = 'testStore';
const indexName = 'indexTest';
const direction = 'next';
const lowestKeyBoundary = 4;

const index = transaction.objectStore(storeName).index(indexName);
const filterRange = IDBKeyRange.lowerBound(lowestKeyBoundary);     // matches all records with key >= 4
const request = index.openCursor(filterRange, direction);

request.addEventListener('success', (event) => {
  const cursor = event.target.result;
  if (cursor) {
    const recordObject = cursor.value;
    // process recordObject here
    cursor.continue();
  }
});
```

<br>
<br>

##### **Filter Options**

<br>

```javascript
const value1 = 4;
const value2 = 10;
let filterRange;

filterRange = IDBKeyRange.lowerBound(value1, false);              // >= 4
filterRange = IDBKeyRange.lowerBound(value1, true);               //  > 4

filterRange = IDBKeyRange.upperBound(value1, false);              //  <= 4
filterRange = IDBKeyRange.upperBound(value1, true);               //  < 4

filterRange = IDBKeyRange.bound(value1, value2, false, false);    // [4, 10]
filterRange = IDBKeyRange.bound(value1, value2, false, true);     // [4, 10)
filterRange = IDBKeyRange.bound(value1, value2, true, false);     // (4, 10]
filterRange = IDBKeyRange.bound(value1, value2, true, true);      // (4, 10)

filterRange = IDBKeyRange.only(value1);                           // = 4
```

<br>
<br>
<br>
<br>

## **Example**
<br>

See demo [indexedDB_example.html](../Examples/WebAPI/indexedDB_example.html).