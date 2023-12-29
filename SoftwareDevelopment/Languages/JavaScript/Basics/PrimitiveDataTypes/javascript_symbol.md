# **JavaScript Symbol**
<br>

## **Table Of Contents**
<br>

- [**JavaScript Symbol**](#javascript-symbol)
  - [**Table Of Contents**](#table-of-contents)
  - [**Basics**](#basics)
  - [**Constructor**](#constructor)
  - [**Static Methods**](#static-methods)
    - [**Symbol.for()**](#symbolfor)
    - [**Symbol.keyFor()**](#symbolkeyfor)
  - [**Static Properties**](#static-properties)

<br>
<br>
<br>

## **Basics**
<br>

A `Symbol` is a wrapper object that returns a guaranteed unique primitive symbol.  
It is commonly used to add hidden unique properties to objects to enable a weak encapsulation.

<br>
<br>
<br>

## **Constructor**
<br>

- returns an existing symbol for the specified `key`. 
- creates and returns new symbol for the specified `key` if it does not exist

```
Symbol(key)
```

<br>

```javascript
const foo = Symbol('bar');    // Symbol(bar)
```

<br>
<br>
<br>

## **Static Methods**
<br>
<br>

### **Symbol.for()**
<br>

- returns an existing symbol for the specified `key`. 
- creates and returns new symbol for the specified `key` if it does not exist
- symbol is guaranteed to be unique across files and realms during the lifetime of the program

```
Symbol.for(key)
```

<br>

```javascript
const foo = Symbol.for('bar');    // Symbol(bar)
```

<br>
<br>

### **Symbol.keyFor()**
<br>

Returns the key for a specified symbol from global symbol registry.

```
Symbol.keyFor(symbol)
```

<br>

```javascript
const foo = Symbol.for('bar');

Symbol.keyFor(foo);     // bar
```

<br>
<br>
<br>

## **Static Properties**
<br>

- all properties are also symbols (so called _well-known symbols_)
- values are constant across realms
- can weakly encapsulate customizations of the behavior of the language

<br>

|Symbol                    |Well-known Symbol    |Used by                              |
|:-------------------------|:--------------------|:------------------------------------|
|Symbol.asyncIterator      |@@asyncIterator      |`for await ...of`                    |
|Symbol.hasInstance        |@@hasInstance        |`instanceof`                         |
|Symbol.isConcatSpreadable |@@isConcatSpreadable |`Array.prototype.concat()`           |
|Symbol.iterator           |@@iterator           |`for...of`                           |
|Symbol.match              |@@match              |`String.prototype.match()`           |
|Symbol.matchAll           |@@matchAll           |`String.prototype.matchAll()`        |
|Symbol.replace            |@@replace            |`String.prototype.replace()`         |
|Symbol.search             |@@search             |`String.prototype.search()`          |
|Symbol.species            |@@species            |create derived objects (avoid usage) |
|Symbol.split              |@@split              |`String.prototype.split()`           |
|Symbol.toPrimitive        |@@toPrimitive        |type coercion algorithms             |
|Symbol.toStringTag        |@@toStringTag        |`Object.prototype.toString()`        |
|Symbol.unscopables        |@@unscopables        |                                     |


<!--

   - Object.getOwnPropertySymbols()
     - returns array of symbol properties on given object
     - since objects are initialized with no own symbol properties,
       it only returns symbols added by the user


-->
