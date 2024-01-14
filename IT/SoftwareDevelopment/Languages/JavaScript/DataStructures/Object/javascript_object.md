# **JavaScript Object**
<br>

## **Table Of Contents**
<br>

- [**JavaScript Object**](#javascript-object)
  - [**Table Of Contents**](#table-of-contents)
  - [**Basics**](#basics)
    - [**Objects Are One Of JavaScript´s Data Types**](#objects-are-one-of-javascripts-data-types)
    - [**Objects Are A Collection Of Properties**](#objects-are-a-collection-of-properties)
    - [**Object Properties Can Be Of Any Type Including Other Objects**](#object-properties-can-be-of-any-type-including-other-objects)
    - [**Objects Can Inherit Properties Of Other Objects Via The Prototype Chain**](#objects-can-inherit-properties-of-other-objects-via-the-prototype-chain)
  - [**Create Objects**](#create-objects)
    - [**Object Literal**](#object-literal)
    - [**Create From Array (Object.fromEntries())**](#create-from-array-objectfromentries)
    - [**Create From Prototype Object (Object.create())**](#create-from-prototype-object-objectcreate)
    - [**Create From Constructor Function**](#create-from-constructor-function)
    - [**Create From Class**](#create-from-class)
  - [**Properties**](#properties)
    - [**Property Descriptor Attributes**](#property-descriptor-attributes)
      - [**Data Descriptor Attributes**](#data-descriptor-attributes)
        - [**Value**](#value)
        - [**Writable**](#writable)
        - [**Configurable**](#configurable)
        - [**Enumerable**](#enumerable)
      - [**Accessor Descriptor Attributes**](#accessor-descriptor-attributes)
        - [**Get**](#get)
        - [**Set**](#set)
        - [**Configurable**](#configurable-1)
        - [**Enumerable**](#enumerable-1)
    - [**Add Or Modify Property**](#add-or-modify-property)
      - [**By Key**](#by-key)
      - [**By String**](#by-string)
      - [**Single Property With Attributes (Object.defineProperty())**](#single-property-with-attributes-objectdefineproperty)
      - [**Multiple Properties With Attributes (Object.defineProperties())**](#multiple-properties-with-attributes-objectdefineproperties)
    - [**Read Property Value**](#read-property-value)
      - [**By Key**](#by-key-1)
      - [**By String**](#by-string-1)
      - [**Destructuring**](#destructuring)
    - [**Delete Property (delete)**](#delete-property-delete)
    - [**Check If Property Exists**](#check-if-property-exists)
      - [**On Object Or In Prototype Chain (in)**](#on-object-or-in-prototype-chain-in)
      - [**Only On Object (Object.hasOwn())**](#only-on-object-objecthasown)
    - [**Check Property Attributes**](#check-property-attributes)
      - [**Single Property (Object.getOwnPropertyDescriptor())**](#single-property-objectgetownpropertydescriptor)
      - [**All Properties (Object.getOwnPropertyDescriptors())**](#all-properties-objectgetownpropertydescriptors)
  - [**Iteration**](#iteration)
    - [**For-In Loop**](#for-in-loop)
    - [**For-Of Loop**](#for-of-loop)
      - [**Iterate Over Own Enumerable Property Keys (Object.keys())**](#iterate-over-own-enumerable-property-keys-objectkeys)
      - [**Iterate Over Own Enumerable Property Value (Object.values())**](#iterate-over-own-enumerable-property-value-objectvalues)
      - [**Iterate Over Own Enumerable Key-Value Pairs (Object.entries())**](#iterate-over-own-enumerable-key-value-pairs-objectentries)
      - [**Iterate Over All Own String Keys (Object.getOwnPropertyNames())**](#iterate-over-all-own-string-keys-objectgetownpropertynames)
      - [**Iterate Over All Own Symbol Keys (Object.getOwnPropertySymbols())**](#iterate-over-all-own-symbol-keys-objectgetownpropertysymbols)

<br>
<br>
<br>

## **Basics**
<br>

### **Objects Are One Of JavaScript´s Data Types**

```javascript
typeof {};     // object
```

<br>

### **Objects Are A Collection Of Properties**

```javascript
const person = {
   firstName: 'John',
   lastName: 'Doe'
};
```

<br>

### **Object Properties Can Be Of Any Type Including Other Objects**

```javascript
const obj = {
   value1: 'Some String',
   value2: 42,
   value3: false,
   value4: null,
   value5: undefined,
   value6: () => { console.log('some function'); },
   value7: { firstName: 'John', lastName: 'Doe' }
}
```

<br>

### **Objects Can Inherit Properties Of Other Objects Via The Prototype Chain**

Assume we define the following object: 

```javascript
const person = {
   firstName: 'John',
   lastName: 'Doe'
};
```

<br>

Although our object does not specify it, we can access a property `toString`:

```javascript
person.toString();         // '[object Object]'
```

<br>

We can access this property, because `person` has a reference to its prototype object `Object` which defines the property:

```javascript
const prototype = Object.getPrototypeOf(person);

/*
prototype = {
   ...
   ƒ toString()
   ...
}
*/
```

<br>
<br>
<br>

## **Create Objects**
<br>

### **Object Literal**

```javascript
const obj = { 
   key1: 'value1',
   key2: 'value2'
}
```

<br>

Object literal with `getter` and `setter` methods:

```javascript
const obj = {
    _bar: 'foo',
    set bar(value) { this._bar = `Setter: ${value}` },
    get bar() { return `Getter: ${this._bar}` }
}
```

<br>
<br>

### **Create From Array (Object.fromEntries())**

Creates an object based on a two-dimensional iterable (Array or Map) of key-value pairs.

```
Object.fromEntries(?iterable)
```

```javascript
const array = [['key1', 'value1'], ['key2', 'value2']];

const obj = Object.fromEntries(array);
```

<br>
<br>

### **Create From Prototype Object (Object.create())**

Creates an object based on a `prototypeObject`.  
Additional properties can be added via the optional `additionalProps` argument.

```javascript
Object.create(prototypeObject, ?additionalProps)
```

```javascript
additonalProps = {
   value,
   ?writeable = false,
   ?enumerable = false,
   ?configurable = false,
   ?set,
   ?get
}
```

<br>

```javascript
const person = {
   firstName: 'John',
   lastName: 'Doe'
};

const programmer = Object.create(
   person, 
   { languages: { value: ['JavaScript', 'C#'] } }
);

programmer.firstName;      // 'John'
programmer.lastName;       // 'Doe'
programmer.languages;      // ['JavaScript', 'C#']
```

<br>
<br>

### **Create From Constructor Function**

```javascript
function Obj(value1, ...) {
   this.key1 = value1;
   ...
}
```

<br>

Simple constructor function:

```javascript
function Person(firstName, lastName) {
   this.firstName = firstName;
   this.lastName = lastName;
}

const johnDoe = new Person('John', 'Doe');
```

<br>

Constructor function with `getter` and `setter` methods:

```javascript
function Person(name) {
   this._name = name;

   Object.defineProperty(this, 'name', {
      set: (name) => { this._name = `Setter: ${name}` },
      get: () => { return `Getter: ${this._name}` }
   });
}

const johnDoe = new Person('John Doe');

johnDoe.name;                 // 'Getter: John Doe'
johnDoe.name = 'Jane Doe';
johnDoe.name;                 // 'Getter: Setter: JohnDoe'
```

<br>
<br>

### **Create From Class**

A class is a syntactic alternative to constructor function.

```javascript
class ClassName {

    constructor(arg1, arg2) {
        this.attribute1 = arg1;
        this.attribute2 = arg2;
    }

    methodName() {...}
}
```

<br>

```javascript
class ClassName {
   constructor(param) {
      this._bar = param;
   }

   set bar(param) { /* implementation */ }
   get bar() { return this._bar; }
}
```

<br>

Simple Class:

```javascript
class Person {
   firstName;
   lastName;

   constructor(firstName, lastName) {
      this.firstName = firstName;
      this.lastName = lastName;
   }
}

const johnDoe = new Person('John', 'Doe');
```

<br>

Class with `getter` and `setter` methods:


```javascript
class Person {
   #name;

   constructor(name) {
      this.#name = name;
   }

   set name(name) {
      this.#name = `Setter: ${name}`;
   }

   get name() {
      return `Getter: ${this.#name}`;
   }
}

const johnDoe = new Person('John Doe');

johnDoe.name;                 // 'Getter: John Doe'
johnDoe.name = 'Jane Doe';
johnDoe.name;                 // 'Getter: Setter: JohnDoe'
```

<br>
<br>
<br>

## **Properties**
<br>
<br>

### **Property Descriptor Attributes**

A property of an object is described with different attributes. There are two types of property descriptions:

<br>

#### **Data Descriptor Attributes**
<br>

##### **Value**

Value of the property.

<br>

##### **Writable**

Specifies whether property can be assigned a new `value`.  

Default: **false**

<br>

##### **Configurable**

Specifies whether property can be deleted.  
Specifies whether property attributes (except `value`) can be changed.  

Default: **false**

<br>

##### **Enumerable**

Specifies whether property will show up during enumeration (for-in loop, object.keys()) of the object properties.  

Default: **false**

<br>

#### **Accessor Descriptor Attributes**
<br>

##### **Get**

Getter function for the property attribute `value`.  
Get current value via `this.value`. 

Default: `undefined`

<br>

##### **Set**

Setter function for the property attribute `value`.  
Gets passed an input argument and can update `this.value`.  

Default: `undefined`

<br>

##### **Configurable**

Specifies whether property can be deleted.  
Specifies whether property attributes (except `value`) can be changed.  

Default: **false**

<br>

##### **Enumerable**

Specifies whether property will show up during enumeration (for-in loop, object.keys()) of the object properties.  

Default: **false**

<br>
<br>

### **Add Or Modify Property**
<br>
<br>

#### **By Key**

Adds a new property with specified name and value to the object if it does not already exist.  
Otherwise updates the value of the existing property. 

```javascript
obj.propertyName = 'value';
```

A new property added in this way has the following attributes:

```javascript
{
   value: 'value',
   writeable: true,
   configurable: true,
   enumerable: true,
}
```

<br>
<br>

#### **By String**

Adds a new property with specified string and value to the object if it does not already exist.  
Otherwise updates the value of the existing property.

```javascript
object['attributeName'] = 'value';
```

A new property added in this way has the following attributes:

```javascript
{
   value: 'value',
   writeable: true,
   configurable: true,
   enumerable: true,
}
```

<br>
<br>

#### **Single Property With Attributes (Object.defineProperty())**

Adds a new property with specified name, value and attributes to the object if it does not already exist.  
Otherwise updates the existing property.

```javascript
Object.defineProperty(object, propertyName, descriptor)
```

```javascript
accessorDescriptor = {
   get,
   set,
   ?configurable,
   ?enumerable
};

dataDescriptor = {
   value,
   ?writeable,
   ?configurable,
   ?enumerable
}
```

<br>

**Add Accessor Property**

```javascript
const obj = {};

Object.defineProperty(obj, 'foo', {
   get: () => `Getter: "${this.value}"`,
   set: (value) => this.value = `Setter: ${value}`
});

obj.foo;             // 'Getter: "undefined"'
obj.foo = 'value';
obj.foo;             // 'Getter: "Setter: value"'
```

<br>

**Add Non-Writable Data Property**

```javascript
const obj = {};

Object.defineProperty(obj, 'foo', {
   value: 'foo'
});

obj.foo;                 // 'foo'
obj.foo = 'newValue';    // ignored, because writable = false
obj.foo;                 // 'foo'
```

<br>

**Add Writable Data Property**

```javascript
const obj = {};

Object.defineProperty(obj, 'foo', {
   value: 'foo',
   writable: true
});

obj.foo;                 // 'foo'
obj.foo = 'newValue';    
obj.foo;                 // 'newValue'
```

<br>
<br>

#### **Multiple Properties With Attributes (Object.defineProperties())**

Alternative to [Object.defineProperty()](#single-property-with-attributes-objectdefineproperty) to add multiple properties at once.

```javascript
Object.defineProperties(object, {
   propertyName1: descriptor,
   propertyName1: descriptor,
   ...
})
```

```javascript
accessorDescriptor = {
   get,
   set,
   ?configurable,
   ?enumerable
};

dataDescriptor = {
   value,
   ?writeable,
   ?configurable,
   ?enumerable
}
```

<br>
<br>

### **Read Property Value**
<br>
<br>

#### **By Key**

Returns value of property with specified `propertyName`.

```javascript
object.propertyName;

object.methodName();
```

<br>

```javascript
const object = {
   foo: 'value1',
   bar: () => { console.log('value2')}
}

object.foo;       // 'value1'
object.bar();     // value2
```

<br>
<br>

#### **By String**

Returns value of property whose key matches the specified string.

```javascript
object['propertyName'];

object['methodName']();
```

<br>

```javascript
const object = {
   foo: 'value1',
   bar: () => { console.log('value2')}
}

object['foo'];       // 'value1'
object['bar']();     // value2
```

<br>
<br>

#### **Destructuring**

Assign property values to variables.

```javascript
const { propertyName1: ?optionalAlias, ...} = obj;
```

<br>

**Read Properties**

```javascript
const obj = {
   foo: 'fooValue',
   bar: 'barValue',
   baz: 'bazValue'
};

const { foo, bar } = obj;

// foo = 'fooValue'
// bar = 'barValue'
```

<br>

**Read Properties Using Alias**


```javascript
const obj = {
   foo: 'fooValue',
   bar: 'barValue',
   baz: 'bazValue'
};

const { foo: firstProp, bar: secondProp } = obj;

// firstProp = 'fooValue'
// secondProp = 'barValue'
```

<br>

**Read Properties Using Rest Variable**

```javascript
const obj = {
   foo: 'fooValue',
   bar: 'barValue',
   baz: 'bazValue'
};

const { foo, ...props } = obj;

// foo = 'fooValue'
// props = { bar: 'barValue', baz: 'bazValue'}
```

<br>

**Read Properties Of Nested Object**

```javascript
const nestedObj = {
   foo: 'fooValue',
   bar: {
      baz: 'bazValue',
      caz: 'cazValue'
   }
};

const {foo, bar: { baz, caz }} = nestedObj;

// foo = 'fooValue'
// baz = 'bazValue'
// caz = 'cazValue'
```

<br>
<br>

### **Delete Property (delete)**

Removes specified property from object.  
Returns `false` if property could not be removed because it was marked as [non-configurable](#configurable).

```javascript
delete object.propertyName

delete object['propertyName']
```

<br>

**Successful Deletion**

```javascript
const obj = { foo: 'fooValue', bar: 'barValue' };

delete obj.foo;      // true

// obj = { bar: 'barValue' }
```

<br>

**Failed Deletion**

```javascript
const obj = { bar: 'barValue' };

Object.defineProperty(obj, 'foo', {
   value: 'fooValue',
   configurable: false
});

delete obj.foo;      // false

// obj = { foo: 'fooValue', bar: 'barValue }
```

<br>
<br>

### **Check If Property Exists**
<br>

#### **On Object Or In Prototype Chain (in)**

Returns boolean indicating whether specified property exists on the specified object or in its prototype chain.

```javascript
'propertyName' in object

'#privateMethod' in object
```

<br>

```javascript
const obj = { foo: 'fooValue', bar: undefined };

'foo' in obj;        // true
'bar' in obj;        // true
'toString' in obj;   // true, because in prototype chain
'baz' in obj;        // false
```

<br>
<br>

#### **Only On Object (Object.hasOwn())**

Returns boolean indicating whether the specified property is defined (**not inherited**) on the specified object.

```javascript
Object.hasOwn(object, propertyName)
```

<br>

```javascript
const obj = { foo: 'fooValue', bar: undefined };

Object.hasOwn(obj, 'foo');       // true
Object.hasOwn(obj, 'bar');       // true
Object.hasOwn(obj, 'toString');  // false, because in prototype chain
Object.hasOwn(obj, 'baz');       // false
```

<br>
<br>

### **Check Property Attributes**
<br>

#### **Single Property (Object.getOwnPropertyDescriptor())**

Returns copy object of the configuration of the specified property on the specified object.

```javascript
Object.getOwnPropertyDescriptor(object, propertyName)
```

<br>

```javascript
const obj = {};

Object.defineProperty(obj, 'foo', {
   value: 'foo',
   writable: true,
   enumerable: true,
   configurable: false
});

const config = Object.getOwnPropertyDescriptor(obj, 'foo');

// config = {
//    value: 'foo',
//    writable: true,
//    enumerable: true,
//    configurable: false
// }
```

<br>
<br>

#### **All Properties (Object.getOwnPropertyDescriptors())**

Returns copy object of the configurations of all **own** properties of the specified object.

```javascript
Object.getOwnPropertyDescriptors(object);
```

<br>

```javascript
const obj = {};

Object.defineProperty(obj, 'foo', {
   value: 'foo',
   writable: true,
   enumerable: true,
   configurable: false
});

Object.defineProperty(obj, 'bar', {
   value: 'bar',
   writable: false,
   enumerable: false,
   configurable: true
});

const config = Object.getOwnPropertyDescriptors(obj);

// config = {
//    foo: {
//       value: 'foo',
//       writable: true,
//       enumerable: true,
//       configurable: false
//    },
//    bar: {
//       value: 'bar',
//       writable: false,
//       enumerable: false,
//       configurable: true
//    }
// }
```

<br>
<br>
<br>

## **Iteration**
<br>

### **For-In Loop**

Iterates over all properties of the current object and in the prototype chain that are [**enumerable**](#enumerable) and whose keys are not [**Symbols**](../../PrimitiveDataTypes/javascript_symbol.md).

```javascript
const prototype = { foo: 'fooValue' };

const obj = Object.create(prototype, { 
   bar: { value: 'barValue', enumerable: true },
   caz: { value: 'cazValue', enumerable: false }
});

for (const key in obj) {
   console.log(key);
}

// foo
// bar
```

<br>
<br>

### **For-Of Loop**
<br>

#### **Iterate Over Own Enumerable Property Keys (Object.keys())**

Returns an array of all **own** [**enumerable**](#enumerable) property keys that are not [**Symbols**](../../PrimitiveDataTypes/javascript_symbol.md).  
Does not include any property keys inherited from the prototype chain.

```javascript
Object.keys(object)
```

```javascript
const prototype = { foo: 'fooValue' };

const obj = Object.create(prototype, { 
   bar: { value: 'barValue', enumerable: true },
   caz: { value: 'cazValue', enumerable: false }
});

for (const key of Object.keys(obj)) {
   console.log(key);
}

// bar
```

<br>
<br>

#### **Iterate Over Own Enumerable Property Value (Object.values())**

Returns an array of all own [**enumerable**](#enumerable) property values.  

```javascript
Object.values(object)
```

Iterates over all **own** properties of the current object that are [**enumerable**](#enumerable) and whose keys are not [**Symbols**](../../PrimitiveDataTypes/javascript_symbol.md). Does not iterate over any property in the prototype chain.

```javascript
const prototype = { foo: 'fooValue' };

const obj = Object.create(prototype, { 
   bar: { value: 'barValue', enumerable: true },
   caz: { value: 'cazValue', enumerable: false }
});

for (const value of Object.values(obj)) {
   console.log(value);
}

// barValue
```

<br>
<br>

#### **Iterate Over Own Enumerable Key-Value Pairs (Object.entries())**

Returns an array of all own [**enumerable**](#enumerable) property key-value pairs.

```javascript
Object.entries(object)
```

Iterates over all **own** properties of the current object that are [**enumerable**](#enumerable) and whose keys are not [**Symbols**](../../PrimitiveDataTypes/javascript_symbol.md). Does not iterate over any property in the prototype chain.

```javascript
const prototype = { foo: 'fooValue' };

const obj = Object.create(prototype, { 
   bar: { value: 'barValue', enumerable: true },
   caz: { value: 'cazValue', enumerable: false }
});

for (const [key, value] of Object.entries(obj)) {
   console.log(`${key}: ${value}`);
}

// bar: barValue
```

<br>
<br>

#### **Iterate Over All Own String Keys (Object.getOwnPropertyNames())**

Returns an array of all own property keys including non-enumerables. Does not include [**Symbols**](../../PrimitiveDataTypes/javascript_symbol.md).  
Does not include any property keys inherited from the prototype chain.

```javascript
Object.getOwnPropertyNames(object)
```

```javascript
const prototype = { foo: 'fooValue' };

const obj = Object.create(prototype, { 
   bar: { value: 'barValue', enumerable: true },
   caz: { value: 'cazValue', enumerable: false }
});

for (const key of Object.getOwnPropertyNames(obj)) {
   console.log(key);
}

// bar
// caz
```

<br>
<br>

#### **Iterate Over All Own Symbol Keys (Object.getOwnPropertySymbols())**

Returns an array of all own property keys including non-enumerables. Does not include [**Symbols**](../../PrimitiveDataTypes/javascript_symbol.md).  
Does not include any property keys inherited from the prototype chain.

```javascript
Object.getOwnPropertySymbols(object)
```

```javascript
const prototype = { foo: 'fooValue' };

const obj = Object.create(prototype);
obj.bar = 'barValue';
obj[Symbol('caz')] = 'cazValue';

for (const key of Object.getOwnPropertySymbols(obj)) {
   console.log(key);
   console.log(obj[key]);
}

// Symbol(caz)
// cazValue
```