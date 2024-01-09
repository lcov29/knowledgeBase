# **JavaScript Map**

<br>

## **Table Of Contents**
<br>

- [**JavaScript Map**](#javascript-map)
  - [**Table Of Contents**](#table-of-contents)
  - [**Basics**](#basics)
  - [**Initialization**](#initialization)
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
<br>

## **Basics**
<br>

> A Map is a collection of key-value pairs. Keys have to be unique and can be of any type.

- The insertion order of elements is remembered
- The map offers better performance at frequent additions and removals compared to objects

<br>
<br>
<br>
<br>

## **Initialization**
<br>

```javascript
new Map([iterable])
```

```javascript
// initialize map with set method
let map1 = new Map();
map1.set('key1', 'value1');
map1.set('key2', 'value2').set('keyN', 'valueN');


// initialize map with array
let map2 = new Map(
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
<br>

## **Properties**

<br>

### **size**
<br>

* returns number of key-value pairs in map

```javascript
let map = new Map([[1, 'value1'], ['key', 'value2'], [6, 'value3']]);
map.size;                                                               // returns 3
```

<br>
<br>
<br>
<br>

## **Methods**

<br>

### **set()**
<br>

* adds or update element with key argument
* returns map object to enable chaining

```javascript
set(key, value)
```

```javascript
let map = new Map();

// add new key-value pair
map.set('key', 'value');
map.get('key');                                 // returns 'value'


// update existing key-value pair
map.set('key', 'modifiedValue');
map.get('key');                                 // returns 'modifiedValue'
```

<br>
<br>
<br>

### **get()**
<br>

* returns value for the key argument
* returns undefined if key is not included in map

```javascript
get(key)
```

```javascript
let map = new Map([['foo', 'bar']]);
map.get('foo');                                 // returns 'bar'
map.get('fo');                                  // returns undefined
```

<br>
<br>
<br>

### **has()**
<br>

* returns boolean indicating whether map includes key

```javascript
has(key)
```

```javascript
let map = new Map([['foo', 'bar']]);
map.has('foo');                                 // returns true
map.has('fo');                                  // returns false
```

<br>
<br>
<br>

### **delete()**
<br>

* removes element with key
* returns true if element existed before

```javascript
delete(key)
```

```javascript
let map = new Map([['foo', 'bar']]);

map.has('foo');                                 // returns true
map.delete('foo');                              // returns true
map.has('foo');                                 // returns false
```

<br>
<br>
<br>

### **clear()**
<br>

* removes all elements from map

```javascript
clear()
```

```javascript
let map = new Map([['foo', 'bar'], ['bar', 'foo']]);
map.size;                                                   // returns 2
map.clear();
map.size;                                                   // returns 0
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