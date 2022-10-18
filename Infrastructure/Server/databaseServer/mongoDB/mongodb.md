# **MongoDB**
<br>

## **Table Of Contents**
<br>

- [**MongoDB**](#mongodb)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
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
      - [**Examples**](#examples)
    - [**Aggregation Pipeline**](#aggregation-pipeline)
      - [**Pipeline Operators**](#pipeline-operators)
      - [**Aggregation Operators**](#aggregation-operators)
      - [**Examples**](#examples-1)
  - [**Update**](#update)
    - [**General**](#general-1)
    - [**Examples**](#examples-2)
  - [**Delete**](#delete)
    - [**Delete Documents**](#delete-documents)
    - [**Delete Collection**](#delete-collection)
    - [**Delete Database**](#delete-database)


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
db.collectionName.insertOne({document})

db.collectionName.insertMany([{document1}, {document2}, ...])
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
db.Person.updateOne(
  {/* selection object*/},
  {/* action */}
)


db.Person.updateMany(
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
<br>

## **Delete**
<br>
<br>

### **Delete Documents**
<br>

```javascript
db.Person.deleteOne(
  {/* selector object */}
)


db.Person.deleteMany(
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