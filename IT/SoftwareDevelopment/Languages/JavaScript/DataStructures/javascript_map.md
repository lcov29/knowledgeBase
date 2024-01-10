# **JavaScript Map**

<br>

## **Table Of Contents**
<br>

- [**JavaScript Map**](#javascript-map)
  - [**Table Of Contents**](#table-of-contents)
  - [**Basics**](#basics)
  - [**Constructor**](#constructor)
  - [**Iteration**](#iteration)
    - [**For-Of Loop**](#for-of-loop)
      - [**map.values()**](#mapvalues)
      - [**map.keys()**](#mapkeys)
      - [**map.entries()**](#mapentries)
    - [**map.forEach()**](#mapforeach)
  - [**Properties**](#properties)
    - [**size**](#size)
  - [**Methods**](#methods)
    - [**clear()**](#clear)
    - [**delete()**](#delete)
    - [**get()**](#get)
    - [**has()**](#has)
    - [**Map.groupBy()**](#mapgroupby)
    - [**set()**](#set)

<br>
<br>
<br>

## **Basics**

> A Map is a collection of key-value pairs. Keys have to be unique and can be of any type.

- The insertion order of elements is remembered
- The map offers better performance at frequent additions and removals compared to objects

<br>
<br>
<br>

## **Constructor**

```javascript
new Map(?array)
```

<br>

```javascript
const map = new Map();
```

```javascript
const map = new Map(
    [
        ['key1', 'value1'],
        ...               ,
        ['keyN', 'valueN']
    ]
);
```

<br>
<br>
<br>

## **Iteration**
<br>
<br>

### **For-Of Loop**
<br>
<br>

#### **map.values()**

Iterates over all values in the map.

```javascript
const map = new Map([['A', 'foo'], ['B', 'bar'], ['C', 'baz']]);

for (const value of map.values()) {
  console.log(value);
}

// 'foo'
// 'bar'
// 'baz'
```

<br>
<br>

#### **map.keys()**

Iterates over all keys in the map.

```javascript
const map = new Map([['A', 'foo'], ['B', 'bar'], ['C', 'baz']]);

for (const key of map.keys()) {
  console.log(key);
}

// 'A'
// 'B'
// 'C'
```

<br>
<br>

#### **map.entries()**

Iterates over all key-value pairs in the map.

```javascript
const map = new Map([['A', 'foo'], ['B', 'bar'], ['C', 'baz']]);

for (const entry of map.entries()) {
  console.log(entry);
}

// ['A', 'foo']
// ['B', 'bar']
// ['C', 'baz']
```

<br>
<br>

### **map.forEach()**

Executes the specified function for each key-value pair in insertion order.

```javascript
map.forEach((value, ?key, ?map) => { code }, ?thisArg)
```

<br>

```javascript
const map = new Map([['key1', 'value1'], ['key2', 'value2']]);

map.forEach((value, key, map) => {
  console.log(`Key "${key}" has value "${value}"`);
})

// Key "key1" has value "value1"
// Key "key2" has value "value2"
```

<br>
<br>
<br>

## **Properties**
<br>

### **size**

Returns the number of key-value pairs.

```javascript
const map = new Map([[1, 'value1'], ['key', 'value2'], [6, 'value3']]);

map.size;         // 3
```

<br>
<br>
<br>

## **Methods**
<br>

### **clear()**

Removes all elements from map.

```javascript
map.clear()
```

<br>

```javascript
const map = new Map([['foo', 'bar'], ['bar', 'foo']]);

map.clear();
map.size;       // 0
```

<br>
<br>

### **delete()**

Removes element for specified `key` and returns boolean indicating whether `key` existed. 

```javascript
map.delete(key)
```

<br>

```javascript
const map = new Map([['foo', 'bar']]);

map.delete('foo');    // true
map.delete('key');    // false
```

<br>
<br>

### **get()**

Returns the value of the specified `key` argument or `undefined` when key is not included in the map.

```javascript
map.get(key)
```

```javascript
const map = new Map([['foo', 'bar']]);

map.get('foo');       // 'bar'
```

<br>
<br>

### **has()**

Returns boolean indicating whether map includes `key`.

```javascript
map.has(key)
```

<br>

```javascript
const map = new Map([['foo', 'bar']]);

map.has('foo');       // true
map.has('fo');        // false
```

<br>
<br>

### **Map.groupBy()**

Partitions array with specified group function that returns the group value as a string. Returns map object with the group name as key and the group as value.


```javascript
Map.groupBy(array, (element, ?index) => groupString)
```

<br>

**Group By Element Value**

```javascript
const array = ['foo', 'bar', 'foo', 'bar', 'baz'];

const groupMap = Map.groupBy(array, (element) => element);

// groupMap = {
//   bar => ['bar', 'bar'],
//   baz => ['baz'],
//   foo => ['foo', 'foo']
// }
```

<br>

**Group By Element Property**

```javascript
const array = [
  { firstName: 'John', lastName: 'Doe' },
  { firstName: 'Jane', lastName: 'Smith' },
  { firstName: 'Alice', lastName: 'Doe' },
  { firstName: 'Bob', lastName: 'Smith' }
];

const groupMap = Map.groupBy(array, ({ lastName }) => lastName);

// groupMap = {
//   Doe => [
//     { firstName: 'John', lastName: 'Doe' },
//     { firstName: 'Alice', lastName: 'Doe' }
//   ]
//   Smith => [
//     { firstName: 'Jane', lastName: 'Smith' },
//     { firstName: 'Bob', lastName: 'Smith' }
//   ]
// } 
```

<br>
<br>

### **set()**

Adds or updates element for specified `key` argument. Returns `Map` to enable chaining.

```javascript
set(key, value)
```

<br>

```javascript
const map = new Map();

map.set('foo', 'bar');
```