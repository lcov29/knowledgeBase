# **JavaScript Map**

<br>

## **Table Of Contents**
<br>

- [**JavaScript Map**](#javascript-map)
  - [**Table Of Contents**](#table-of-contents)
  - [**Basics**](#basics)
  - [**Constructor**](#constructor)
  - [**Properties**](#properties)
    - [**size**](#size)
  - [**Methods**](#methods)
    - [**set()**](#set)
    - [**get()**](#get)
    - [**has()**](#has)
    - [**delete()**](#delete)
    - [**clear()**](#clear)
    - [**keys()**](#keys)
    - [**values()**](#values)
    - [**entries()**](#entries)
    - [**forEach()**](#foreach)

<br>
<br>
<br>

## **Basics**
<br>

> A Map is a collection of key-value pairs. Keys have to be unique and can be of any type.

- The insertion order of elements is remembered
- The map offers better performance at frequent additions and removals compared to objects

<br>
<br>
<br>

## **Constructor**
<br>

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

<br>
<br>

### **get()**
<br>

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
<br>

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

### **delete()**
<br>

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

### **clear()**
<br>

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
<br>

### **keys()**
<br>

* returns iterator object containing all keys of map object
* iterator can be iterated via for-of-loop

```javascript
keys()
```

```javascript
let map = new Map([['key1', 'value1'], [1, 'value2']]);
let mapIterator = map.keys();

mapIterator.next().value;                               // returns 'key1'
mapIterator.next().value;                               // returns 1

mapIterator = map.keys();
for (let item of mapIterator) {
    console.log(item);
}
```

<br>
<br>
<br>

### **values()**
<br>

* returns iterator object containing all values of map object
* iterator can be iterated via for-of-loop

```javascript
values()
```

```javascript
let map = new Map([['key1', 'value1'], [1, 'value2']]);
let mapIterator = map.values();

mapIterator.next().value;                               // returns 'values1'
mapIterator.next().value;                               // returns 'values2'

mapIterator = map.values();
for (let item of mapIterator) {
    console.log(item);
}
```

<br>
<br>
<br>

### **entries()**
<br>

* returns iterator object containing all key-value pairs as an array
* iterator can be iterated via for-of-loop

```javascript
entries()
```

```javascript
let map = new Map([['key1', 'value1'], [1, 'value2']]);
let mapIterator = map.entries();

mapIterator.next().value;                               // returns ['key1', 'values1']
mapIterator.next().value;                               // returns [1, 'values2']

mapIterator = map.entries();
for (let item of mapIterator) {
    console.log(item);
}
```

<br>
<br>
<br>

### **forEach()**
<br>

* executes function for each key-value pair in insertion order

<br>

Parameters:
* _customFunction_
    * _value_
      * value of current iteration
    * _key_
      * key of current iteration
    * _map_
* _thisArg_

<br>

```javascript
// general
forEach(customFunction, [thisArg]

)
// arrow customFunction
forEach(() => { /* implementation */ } )
forEach((value) => { /* implementation */ } )
forEach((value, key) => { /* implementation */ } )
forEach((value, key, map) => { /* implementation */ } )


// callback customFunction
forEach(customFunction)
forEach(customFunction, thisArg)


// inline callback customFunction
forEach(function() { /* implementation */ })
forEach(function(value) { /* implementation */ })
forEach(function(value, key) { /* implementation */ })
forEach(function(value, key, map) { /* implementation */ })
forEach(function(value, key, map) { /* implementation */ }, thisArg)
```

```javascript
let map = new Map([['key1', 'value1'], [1, 'value2']]);

map.forEach(function(value, key, map){
    console.log(`key ${key} has value ${value}`);
});
```