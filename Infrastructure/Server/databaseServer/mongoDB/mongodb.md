# **MongoDB**
<br>

## **Table Of Contents**
<br>

- [**MongoDB**](#mongodb)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Shell Basics**](#shell-basics)
    - [**Open Shell**](#open-shell)
    - [**Clear Shell**](#clear-shell)
    - [**Show Available Databases**](#show-available-databases)
    - [**Change To Database**](#change-to-database)
    - [**Show Available Collections Of A Database**](#show-available-collections-of-a-database)
    - [**Exit Shell**](#exit-shell)
  - [**Create**](#create)
    - [**Create database**](#create-database)
    - [**Create Collection**](#create-collection)
    - [**Create Documents**](#create-documents)
  - [**Read**](#read)
    - [**Basic Read Statement**](#basic-read-statement)
      - [**Selection Statement**](#selection-statement)
        - [**Comparison Operators**](#comparison-operators)
        - [**Logical Operators**](#logical-operators)
        - [**Element Operators**](#element-operators)
        - [**Array Operators**](#array-operators)
      - [**Projection Statement**](#projection-statement)
      - [**Examples**](#examples)
    - [**Aggregation Pipeline**](#aggregation-pipeline)
      - [**Pipeline Operators**](#pipeline-operators)
      - [**Aggregation Operators**](#aggregation-operators)
      - [**Examples**](#examples-1)
    - [**Query All Distinct Values Of Specified Document Attribute**](#query-all-distinct-values-of-specified-document-attribute)
  - [**Update**](#update)
    - [**General**](#general-1)
    - [**Examples**](#examples-2)
    - [**Upsert**](#upsert)
    - [**Array Update Operators**](#array-update-operators)
  - [**Replace**](#replace)
  - [**Delete**](#delete)
    - [**Delete Documents**](#delete-documents)
    - [**Delete Collection**](#delete-collection)
    - [**Delete Database**](#delete-database)
  - [**Result Cursor**](#result-cursor)
    - [**Access Data From Result Cursor**](#access-data-from-result-cursor)
      - [**ForEach()**](#foreach)
      - [**toArray()**](#toarray)
      - [**For-Of-Loop**](#for-of-loop)
      - [**Manual Iteration**](#manual-iteration)
        - [**hasNext()**](#hasnext)
        - [**next()**](#next)
        - [**skip()**](#skip)
        - [**close()**](#close)
      - [**Stream Access**](#stream-access)
    - [**Set Manipulation**](#set-manipulation)
      - [**limit()**](#limit)
      - [**map()**](#map)
      - [**sort()**](#sort)
    - [**Result Set Information**](#result-set-information)
      - [**count()**](#count)


<br>
<br>
<br>

## **General**
<br>

* MongoDB is a document-oriented non relational database
  * data is stored as JSON ('documents')
  * no predefined schema
  
<br>

|relational database|non relational database|
|:------------------|:----------------------|
|database           |database               |
|table              |collection             |
|record             |document               |

<br>
<br>
<br>

## **Shell Basics**
<br>

* The mongo shell can interpret JavaScript

<br>

### **Open Shell**
<br>

```bash
mongosh
```
* shell is only accessible from host machine

<br>
<br>

### **Clear Shell**
<br>

```javascript
console.clear();
```

<br>
<br>

### **Show Available Databases**
<br>

```bash
show databases;
```

<br>
<br>

### **Change To Database**
<br>

```bash
use <databaseName>;
```
* sets variable _db_ to selected database

<br>
<br>

### **Show Available Collections Of A Database**
<br>

```bash
show collections;
```
* assuming that we navigated to a specific database using [_use_](#change-to-database)

<br>
<br>

### **Exit Shell**
<br>

```bash
exit
```

<br>
<br>
<br>

## **Create**
<br>
<br>

### **Create database**
<br>

* database is created if \<databaseName> does not exist

<br>

```javascript
use <databaseName>;
```

<br>
<br>

### **Create Collection**
<br>

* collection is created when data is inserted into a collection that does not exist

<br>

```javascript
db.<collectionName>.insertOne(<document>)
```

or

```javascript
db.<collectionName>.insertMany([<document1>, <document2>, ...])
```

<br>
<br>

### **Create Documents**
<br>

```javascript
db.<collectionName>.insertOne({document})

db.<collectionName>.insertMany([{document1}, {document2}, ...])
```

<br>

Example:

```javascript
db.person.insertOne(
   {firstName: 'John',
    lastName: 'Doe',
    age: 43,
    nationality: 'USA'  
    }
);
```

<br>
<br>
<br>

## **Read**
<br>
<br>

### **Basic Read Statement**
<br>

Statement _find_ takes two optional parameter objects:

* **selection statement**
  * selects documents from specified collection

<br>

* **projection statement**
  * selects which attributes should be visible
  * can explicitly toggle visibility of attributes via boolean value

<br>

```javascript
db.<collectionName>.find(
  {<selection statement>},
  {<projection statement>}
)


db.<collectionName>.findOne(
  {<selection statement>},
  {<projection statement>}
)
```

<br>
<br>

#### **Selection Statement**
<br>

Basic selection statement:

<br>

```javascript
{ 
  <attribute>: {<operator> <value>, <operator> <value>, ...},
  <attribute>: {<operator> <value>, <operator> <value>, ...},
  ...
}
```

<br>
<br>

##### **Comparison Operators**
<br>

|Operator |Description                              |Note
|:--------|:----------------------------------------|:------------
|$eq:     |equal                                    |shorthand: {attribute: value}
|$ne:     |not equal                                |
|$gt:     |greater than                             |
|$gte:    |greater than or equal                    |
|$lt:     |lesser than                              |
|$lte:    |lesser than or equal                     |
|$in:     |equal to any value in array              |example: {attribute: {$in: ['value1', 'value2', 'value3']}}
|$nin:    |not equal to any value in specified array|example: {attribute: {$nin: ['value1', 'value2', 'value3']}}

<br>
<br>

##### **Logical Operators**
<br>

|Operator |Description    |Note
|:--------|:--------------|:----------
|$and:    |               |shorthand: {attribute: {expression1, expression2, expression3}}
|$or:     |               |example: {$or: [{expression1}, {expression2, {expression3}}]}
|$not:    |negation       |example: {attribute: {$not: {expression}}}
|$nor:    |negation of or |example: {$nor: [{expression1}, {expression2}, {expression3}]}

<br>
<br>

##### **Element Operators**
<br>

|Operator |Description                                          |Example
|:--------|:----------------------------------------------------|:--------
|$exists: |check whether document contains an attribute         |{attribute: {$exists: \<true, false>}}
|$type:   |check wheter document attribute is of specified type |{attribute: {$type: \<type>}}

<br>
<br>

##### **Array Operators**
<br>

|Operator    |Description                                                                   |Example
|:-----------|:-----------------------------------------------------------------------------|:---------
|$size:      |check if array is of specified size                                           |{arrayAttribute: {$size: \<number>}}
|$all:       |check if array contains all specified elements                                |{arrayAttribute: {$all: [element1, element2, ...]}}
|$elemMatch: |check if array contains at least one element matching all specified conditions|{arrayAttribute: {$elemMatch: {condition1}, {condition2}, {condition3}}}


<br>
<br>

#### **Projection Statement**
<br>

```javascript
db.<collectionName>.find(
  {<selection statement>},
  {fieldName1: <0,1>, fieldName2: <0,1>, ...}
)
```

<br>

Within a projection statement we can
* explicitly include fields (value: 1)
* implicitly exclude fields (value: 0)

These methods are mutually exclusive
* only exception: _id

<br>
<br>

#### **Examples**
<br>

```javascript
db.Person.find(
  {age: {$lt: 30}},    // selection: all persons younger than 30
  {firstName: 1}       // projection: only attribute firstName (and implicitly _id)
)
```

<br>

```javascript
db.Person.find(
  {$or [{age: {$gt: 40, $lt: 50}},
        {firstname: 'John'}]
  },
  {firstName: 1, lastName: 1, nationality: 1}
)
```

<br>
<br>
<br>

### **Aggregation Pipeline**
<br>

* apply aggregation functions on documents within a collection

<br>

Basic aggregation syntax:

```javascript
db.<collectionName>.aggregate(
  [{$match: ...},
   {$group: ...},
   {$sort: ...}]
);
```

<br>
<br>

#### **Pipeline Operators**
<br>

* list is not complete

|Operator |Description |
|:--------|:-----------
|$match:  |selection of documents
|$group:  |split documents in partitions by specified key
|$project:|selection of attributes
|$sort:   |sort documents
|$limit:  |specify number of documents passed to next stage
|$skip:   |skip specified number of documents

<br>
<br>

#### **Aggregation Operators**
<br>

* list is not complete

|Operator |Description         |Example
|:--------|:-------------------|:-----------
|$avg:    |average             |\<name>: {$avg: '$attributeName'}
|$count:  |number of documents |\<name>: {$count: {}}
|$sum:    |                    |
|$max:    |maximum value       |
|$min:    |minimum value       |

<br>
<br>

#### **Examples**
<br>

```javascript
db.Person.aggregate(
  [
    {$match: {firstName: 'John'}},                  // selection

    {$group: { _id: '$nation',
               numberOfCitizens: {$count: {}},
               avgAge: {$avg: '$age'},
               maxAge: {$max: '$age'}
             }
    },

    {$sort: {numberOfCitizens: -1}}
  ]
)
```

<br>
<br>
<br>

### **Query All Distinct Values Of Specified Document Attribute**
<br>

```javascript
db.<collectionName>.distinct(fieldName, [query]);
```
* returns array of all distinct values for attributes _fieldName_

<br>

Examples:

```javascript
db.person.distinct('firstName');

// returns: ['Alice', 'Bob']
```

<br>

```javascript
db.person.distinct('firstName', {'dateOfBirth': {$lt: '2000-01-01'}});
```

<br>
<br>
<br>

## **Update**
<br>
<br>

### **General**
<br>

Update operation can
  * add attributes
  * alter value of existing attributes
  * rename attributes
  * delete attributes

<br>

```javascript
db.<collectionName>.updateOne(
  {/* selection object*/},
  {/* action */}
)


db.<collectionName>.updateMany(
  {/* selection object*/},
  {/* action */}
)
```

<br>

|Action  |Description
|:-------|:-------------
|$set:   |update attribute value / add attribute
|$unset: |remove attribute
|$rename:|rename existing attribute

<br>
<br>

### **Examples**
<br>

* update attribute value / add attribute to document

```javascript
db.Person.updateMany(
   {lastName: 'Doe'},
   {$set: {firstName: 'John'}     // attribute firstName will be added if not already existing
)
```

<br>
<br>

* rename attribute for all documents in collection

```javascript
db.Person.updateMany(
  {},
  {$rename: {birthday: 'dateOfBirth'}}
)
```

<br>
<br>

* remove attribute from documents

```javascript
db.Person.updateMany(
  {$or: [{firstName: 'John'}, {firstName: 'Jane'}]},
  {$unset: {age: ''}}
)
```

<br>
<br>

### **Upsert**
<br>

```javascript
db.<collectionName>.updateOne(
  {/* selection object*/},
  {/* action */},
  {upsert: true}
);

db.<collectionName>.updateMany(
  {/* selection object*/},
  {/* action */},
  {upsert: true}
);
```
* **Up**date existing document or In**sert** into new document

<br>

Example:

```javascript
collection.updateMany(
  {firstName: 'John'},
  {$set: {nationality: 'USA'}},
  {upsert: true}
);
```

<br>
<br>

### **Array Update Operators**
<br>

|Operator          |Operator Description
|:-----------------|:-------------------
|$                 |placeholder to update first matching element
|$[]               |placeholder to update all matching elements
|$[\<identifier\>] |placeholder to update all matching arrayFilters condition and query condition
|$addToSet         |add element to array if not already exist
|$pop              |remove first or last item of an array
|$pull             |remove all matching elements
|$push             |add element to array
|$pushAll          |remove all matching values


<br>
<br>
<br>

## **Replace**
<br>

```javascript
db.<collectionName>.replaceOne(
  { /* filter object */},
  { /* replacement document */},
  { /* options */}
)
```

<br>
<br>
<br>

## **Delete**
<br>
<br>

### **Delete Documents**
<br>

```javascript
db.<collectionName>.deleteOne(
  {/* selector object */}
)


db.<collectionName>.deleteMany(
  {/* selector object */}
)
```

<br>

Example:

```javascript
db.Person.deleteMany(
    {lastName: 'Doe'}
)
```

<br>
<br>

### **Delete Collection**
<br>

```javascript
db.<collectionName>.drop()
```

<br>
<br>

### **Delete Database**
<br>

```javascript
db.dropDatabase()
```

<br>
<br>
<br>

## **Result Cursor**
<br>
<br>


### **Access Data From Result Cursor**
<br>
<br>

#### **ForEach()**
<br>

```javascript
await resultCursor.forEach(document => { /* process document... */ });
```

<br>
<br>

#### **toArray()**
<br>

```javascript
const documentArray = await resultCursor.toArray();
```

<br>
<br>

#### **For-Of-Loop**
<br>

```javascript
for await (const document of resultCursor) {
    // process document...
}
```

<br>
<br>

#### **Manual Iteration**
<br>

```javascript
while (await resultCursor.hasNext()) {
    const document = await resultCursor.next();
    // process document...
}
```

<br>
<br>

##### **hasNext()**
<br>

```javascript
resultCursor.hasNext();
```
* return boolean indicating whether there is another document after current cursor position

<br>
<br>

##### **next()**
<br>

```javascript
resultCursor.next();
```
* return next document

<br>
<br>

##### **skip()**
<br>

```javascript
resultCursor.skip(offset);
```
* move current position of server by _offset_

<br>
<br>

##### **close()**
<br>

```javascript
resultCursor.close();
```
* close server and free associated server resources

<br>
<br>

#### **Stream Access**
<br>

```javascript
resultCursor.stream().addListener('data', document => { /* process document... */});
```

<br>
<br>

### **Set Manipulation**
<br>
<br>

#### **limit()**
<br>

```javascript
resultCursor.limit(<number>);
```
* limit number of documents referenced by _resultCursor_

<br>
<br>

#### **map()**
<br>

```javascript
resultCursor.map(document => { /* return modified document... */});
```
* returns new cursor to documents after specified method was applied

<br>
<br>

#### **sort()**
<br>

```javascript
sort({fieldName1: sortValue, fieldName2: sortValue, ...});
```
* sort result set by specified fields

<br>

|Sort Value |Description
|:---------:|:---------------
|1          |ascending order
|-1         |descending order

<br>
<br>

### **Result Set Information**
<br>
<br>

#### **count()**
<br>

```javascript
resultCursor.count();
```
* return number of documents referenced by _resultCursor_

**Deprecated in context of Node.js constructor!**