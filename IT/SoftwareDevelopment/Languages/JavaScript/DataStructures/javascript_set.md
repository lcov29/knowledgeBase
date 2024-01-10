# **JavaScript Set**

<br>

## **Table Of Contents**
<br>

- [**JavaScript Set**](#javascript-set)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Constructor**](#constructor)
  - [**Properties**](#properties)
    - [**size**](#size)
  - [**Iteration**](#iteration)
    - [**For-Of Loop**](#for-of-loop)
      - [**set.values() / set.keys()**](#setvalues--setkeys)
    - [**forEach()**](#foreach)
  - [**Methods**](#methods)
    - [**add()**](#add)
    - [**clear()**](#clear)
    - [**delete()**](#delete)
    - [**has()**](#has)

<br>
<br>
<br>

## **General**

> A **Set** is a collection of unique values. Any attempt to add duplicates are ignored.

<br>
<br>
<br>

## **Constructor**

```javascript
new Set(?array)
```

<br>

```javascript
const set = new Set();
```

```javascript
const set = new Set(['value1', 1, false]);
```

<br>
<br>
<br>

## **Properties**

<br>

### **size**

Returns the number of elements in the set.

```javascript
const set = new Set(['value1', 'value2', 'value3']);

set.size;     // 3
```

<br>
<br>
<br>

## **Iteration**
<br>

### **For-Of Loop**
<br>

#### **set.values() / set.keys()**

Iterates over all elements in the set.

```javascript
const set = new Set(['value1', 'value2']);

for (const value of set.values()) {
  console.log(value);
}

// 'value1'
// 'value2'
```

```javascript
const set = new Set(['value1', 'value2']);

for (const key of set.keys()) {
  console.log(key);
}

// 'value1'
// 'value2'
```

<br>
<br>

### **forEach()**

Executes the specified function for each element of the set in insertion order.

```javascript
set.forEach((value, ?key, ?set) => { code }, ?thisArg)
```

<br>

```javascript
const set = new Set(['value1', 'value2']);

set.forEach((value, key) => {
  console.log(`(Key: ${key}, Value: ${value})`);
});

// '(Key: value1, Value: value1)'
// '(Key: value2, Value: value2)'
```

<br>
<br>
<br>

## **Methods**
<br>

### **add()**

Adds specified element to set if it is not included in the set. Returns the set object to enable chaining.
  
```javascript
set.add(value)
```

<br>

```javascript
const set= new Set();

set
  .add('value1')
  .add('value2')
  .add('value3');

set.size;     // 3
```

<br>
<br>

### **clear()**

Remove all elements from set.

```javascript
map.clear()
```

<br>

```javascript
const set = new Set(['foo', 'bar']);

set.size;       // 2
set.clear();
set.size;       // 0
```

<br>
<br>

### **delete()**

Removes specified element from set and returns boolean indicating whether element existed in set.

```javascript
set.delete(value)
```

<br>

```javascript
const set = new Set(['foo', 'bar']);

set.size;             // 2
set.delete('foo');    // true
set.size;             // 1
```

<br>
<br>

### **has()**

Returns boolean indicating whether element exists in the set.

```javascript
set.has(value)
```

<br>

```javascript
const set = new Set(['foo', 'bar']);

set.has('foo');     // true
set.has('fo');      // false
```