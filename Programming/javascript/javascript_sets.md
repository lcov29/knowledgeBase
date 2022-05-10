# **JavaScript Set**

<br>

## **Table Of Contents**
<br>

- [**JavaScript Set**](#javascript-set)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Initialization**](#initialization)
  - [**Properties**](#properties)
    - [**size**](#size)
  - [**Methods**](#methods)
    - [**add()**](#add)
    - [**has()**](#has)
    - [**delete()**](#delete)
    - [**clear()**](#clear)
    - [**values()**](#values)
    - [**entries()**](#entries)
    - [**forEach()**](#foreach)

<br>
<br>
<br>
<br>

## **General**
<br>

* collection of unique values
* attempts to add duplicates are ignored
* value can be anything (primitive values, functions, objects)

<br>
<br>
<br>
<br>

## **Initialization**
<br>

```javascript
new Set([iterable])
```

```javascript
// initialize map with add method
let set1 = new Set();
set1.add('value1');
set1.add(2).add(false);


// initialize map with array
let set2 = new Set(['value1', 2, false]);
```

<br>
<br>
<br>
<br>

## **Properties**

<br>

### **size**
<br>

* returns number of elements in set

```javascript
let set = new Set(['value1', 'value2', 'value3']);
set.size;                                                               // returns 3
```

<br>
<br>
<br>
<br>

## **Methods**

<br>

### **add()**
<br>

* adds new element to set
* attempts to add duplicates are ignored
* returns set object to enable chaining
  
```javascript
add(value)
```

```javascript
let set= new Set();
set.add('value1');
set.add('value2').add('value3');
set.size;                                // returns 3

set.add('value1');
set.size;                                // returns 3
```

<br>
<br>
<br>


### **has()**
<br>

* returns boolean indicating whether element exist in set

```javascript
has(value)
```

```javascript
let set = new Set(['foo', 'bar']);
set.has('foo');                                 // returns true
set.has('fo');                                  // returns false
```

<br>
<br>
<br>

### **delete()**
<br>

* removes element from set
* returns true if element existed before

```javascript
delete(value)
```

```javascript
let set = new Set(['foo', 'bar']);

set.has('foo');                                 // returns true
set.delete('foo');                              // returns true
set.has('foo');                                 // returns false
```

<br>
<br>
<br>

### **clear()**
<br>

* removes all elements from set

```javascript
clear()
```

```javascript
let set = new Set(['foo', 'bar']);
set.size;                                                   // returns 2
set.clear();
set.size;                                                   // returns 0
```

<br>
<br>
<br>

### **values()**
<br>

* returns iterator object containing all values of set object
* iterator can be iterated via for-of-loop

```javascript
values()
```

```javascript
let set = new Set(['value1', 'value2']);
let setIterator = set.values();

setIterator.next().value;                               // returns 'values1'
setIterator.next().value;                               // returns 'values2'

setIterator = set.values();
for (let element of setIterator) {
    console.log(element);
}
```

<br>
<br>
<br>

### **entries()**
<br>

* returns iterator object containing an array of [value, value] for each element in set in insertion order
* iterator can be iterated via for-of-loop

```javascript
entries()
```

```javascript
let set = new Set(['value1', 'value2']);
let setIterator = set.entries();

setIterator.next().value;                               // returns ['value1', 'value1']
setIterator.next().value;                               // returns ['value2', 'value2']

setIterator = set.entries();
for (let item of setIterator) {
    console.log(item);
}
```

<br>
<br>
<br>

### **forEach()**
<br>

* executes function for each element in insertion order

<br>

Parameters:
* _customFunction_
    * _value_
      * value of current element
    * _key_
      * value of current element as there are no keys in sets
    * _set_
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
forEach((value, key, set) => { /* implementation */ } )


// callback customFunction
forEach(customFunction)
forEach(customFunction, thisArg)


// inline callback customFunction
forEach(function() { /* implementation */ })
forEach(function(value) { /* implementation */ })
forEach(function(value, key) { /* implementation */ })
forEach(function(value, key, set) { /* implementation */ })
forEach(function(value, key, set) { /* implementation */ }, thisArg)
```

```javascript
let set = new Set(['value1', 'value2']);

set.forEach(function(value, key, set){
    console.log(`value is ${value}`);
});
```