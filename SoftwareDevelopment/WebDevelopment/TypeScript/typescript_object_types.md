# **TypeScript Object Types**
<br>

## **Table Of Contents**
<br>

- [**TypeScript Object Types**](#typescript-object-types)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Object Types**](#object-types)
    - [**Type Declaration**](#type-declaration)
    - [**Interface**](#interface)
  - [**Properties**](#properties)
    - [**Optional Properties**](#optional-properties)
    - [**Index Signatures**](#index-signatures)
    - [**Readonly Properties**](#readonly-properties)
  - [**Combination Of Object Types**](#combination-of-object-types)
    - [**Union**](#union)
    - [**Intersection**](#intersection)
  - [**Object Subtyping**](#object-subtyping)
  - [**Special Object Types**](#special-object-types)
    - [**Array**](#array)
      - [**Readonly Array**](#readonly-array)
    - [**Tupel**](#tupel)
      - [**Optional Elements**](#optional-elements)
      - [**Readonly Tupel**](#readonly-tupel)
    - [**Enums**](#enums)

<br>
<br>
<br>

## **General**
<br>

* Objects are structurally typed
* Object form defines all properties and their types
* By default TypeScript blocks any attempt to add additional properties or remove defined properties
* We can declare an object form with an object literal or a class

<br>
<br>
<br>

## **Object Types**
<br>
<br>

### **Type Declaration**
<br>

Explicitly define form:

```typescript
let foo: {bar: string, baz: string} = {
	bar: 'Hello',
	baz: 'World'
}

// type: {bar: string, baz: string}
```

<br>

Implicitly define form:

```typescript
let foo = {
	bar: 'Hello',
	baz: 'World'
};

// type: {bar: string, baz: string}
```

<br>

Note: Declaring an object with the keyword `const` does not narrow the types of the attributes, because objects are mutable (see [literal Types](#literal-types)).

```typescript
const foo = {
	bar: 'Hello',
	baz: 'World'
};

// type: {bar: string, baz: string}
// NOT {bar: 'Hello', baz: 'World'} like literal types for primitive data types
```

<br>
<br>

### **Interface**
<br>

```typescript
interface foo {
  bar: string,
  baz: boolean
}
  
const myFoo: foo = {
  bar: 'test',
  baz: false
};
```

See [TypeScript Interfaces](./typescript_interfaces.md).

<br>
<br>
<br>

## **Properties**
<br>
<br>

### **Optional Properties**
<br>

Single optional property:

```
<optionalPropertyName>?: <valueType>
```

```typescript
let foo: {
	bar: string,
	baz?: string
}
```
* object might have an optional property `baz` with value _string_ or _undefined_

<br>
<br>

### **Index Signatures**
<br>

* specify multiple possible paremeters of same type

```typescript
[<keyName>: <keyType>]: <valueType>
```

```typescript
let foo: {
	bar: string,
	[baz: number]: string
} = {
	bar: 'The',
	1: 'quick',
	2: 'brown',
	7: 'fox'
};
```

<br>

Use of _string_ index prevents definition of additional string properties with other return types:

```typescript
type foo = {
    [bar: string]: number,
    baz: string 
    // error TS2411: Property 'baz' of type 'string' is not assignable to 'string' index type 'number'.
}
```

<br>
<br>

### **Readonly Properties**
<br>

```typescript
let foo: {readonly bar: string} = {
	bar: 'baz'
};

foo.bar = 'test';
// error TS2540: Cannot assign to 'bar' because it is a read-only property.
```

<br>
<br>
<br>

## **Combination Of Object Types**
<br>
<br>

### **Union**
<br>

* Values of object type unions
  * must contain all properties of at least type of the union
  * can contain additional properties from all other types of the union

<br>

```typescript
type Animal = {species: string, age: number};
type Pet = {name: string, owner: string}
type unionType = Animal | Pet;

const someAnimal: unionType = {
  species: 'mosquito',
  age: 1
};

const somePet: unionType = {
  name: 'Bello',
  owner: 'John Doe'
};

// both animal and pet properties
const bello: unionType = {
  species: 'dog',
  age: 3,
  name: 'Bello',
  owner: 'John Doe'
}

// Error because object must have all properties of at least one type of the union
const baxter: unionType = {
  species: 'dog',
  name: 'Baxter'
}
```

<br>
<br>

### **Intersection**
<br>

```typescript
type foo = {
    bar: string,
    baz: boolean
}

type intersect = foo & { bat: number};


const test1: intersect = {
    bar: 'test',
    baz: false,
    bat: 23
};

const test2: intersect = {
    bar: 'test',
    baz: false,
};
//error TS2322: Type '{ bar: string; baz: false; }' is not assignable to type 'intersect'.
//              Property 'bat' is missing in type '{ bar: string; baz: false; }' but required in type '{ bat: number; }'.
```

<br>
<br>
<br>

## **Object Subtyping**
<br>

* Object _A_ is a subtype of object _B_ when
  * _A_ contains the same properties as _B_ (order is irrelevant)
  * Each property of _A_ is a subtype or equal to the corresponding property of _B_ (covariant)

<br>

Example:

<br>

Assume we have the following code:
<br>

```typescript
type superType = {
    a: string,
    b: number,
    c: boolean
};

function test(obj: superType) : void {}
```

<br>

```typescript
type validSubType = {
    a: 'foo' | 'bar',
    b: 4,
    c: false
};

let foo: validSubType = {
    a: 'bar',
    b: 4,
    c: false
};

test(foo);			// OK, because all properties of validSubType are covariant to superType
```

<br>

```typescript
type validSubType = {
    c: false,
    b: 4,
    a: 'foo' | 'bar'
};

let foo: validSubType = {
    c: false,
    b: 4,
    a: 'bar'
};

test(foo);			// OK, properties are covariant and order of properties is irrelevant
```

<br>

```typescript
type validSubType = {
    a: 'foo' | 'bar',
    b: 4,
    c: false,
    d: string[]
};

let foo: validSubType = {
    a: 'bar',
    b: 4,
    c: false,
    d: ['foo', 'bar']
};

test(foo);			// OK, validSubType can contain additional properties
```

<br>

```typescript
type invalidSubType = {
    a: unknown,
    b: 4,
    c: false
};

let foo: invalidSubType = {
    a: 'bar',
    b: 4,
    c: false
};

test(foo);
// error TS2345: Argument of type 'invalidSubType' is not assignable to parameter of type 'superType'.
//	Types of property 'a' are incompatible.
//		Type 'unknown' is not assignable to type 'string'.
```

<br>
<br>
<br>

## **Special Object Types**
<br>
<br>

### **Array**
<br>

Explicitly define type:

```
let <arrayName>: <elementType>[] = [element1, ...]
```

Example:
```typescript
let foo: string[] = ['a', 'b', 'c'];
let bar: number[] = [1, 3, 13];
```

<br>

Implicitly define type:

```typescript
let foo = ['a', 'b', 'c'];	// string[]
let bar = [1, 3, 13];		// number[]
let baz = ['a', 1];			// (string | number)[]   (avoid mixed type arrays)
let tar = [];				// any[]
```

<br>

Note: Declaring an array with the keyword `const` does not narrow the types of the elements, because arrays are mutable (see [literal Types](#literal-types)).

<br>

Note: Avoid empty array declarationa like `let tar = []`, because it results in the type `any[]` and therefore allows every type as an element. The union type of the array is fixed when it is passed outside of its definition scope:

```typescript
function buildArray() {
    let a = [];
    a.push(1);      // number[]
    a.push('a');    // (number | string)[]
    return a;
  }
  
  let a = buildArray();
  a.push(true);     
  // error TS2345: Argument of type 'boolean' is not assignable to parameter of type 'string | number'.
```

<br>
<br>

#### **Readonly Array**
<br>

```
let <arrayName>: readonly <elementType>[] = [element1, ...]
```

Example:
```typescript
let foo: readonly string[] = ['a', 'b', 'c'];
```

<br>
<br>

### **Tupel**
<br>

Tupel is a subtype of array with fixed length and type per position

Tupel can only be declared explicitly:

```
let <tupelName>: [typePosition1, typePosition2, ...] = [valuePosition1, valuePosition2, ...];
```

Example:

```typescript
let position: [number, number] = [23, 9132];
```

<br>
<br>

#### **Optional Elements**
<br>

```
let <tupelName>: [typePosition1, ... , <typeOptionalPosition>?] = [valuePosition1, ... , valueOptional];
```

Example:

```typescript
type positionTupel = [number, number, number?];

let position: positionTupel = [12, 45, 32];
let position: positionTupel = [123, 732];
```

<br>
<br>

#### **Readonly Tupel**
<br>

```
let <tupelName>: readonly [typePosition1, typePosition2, ...] = [valuePosition1, valuePosition2, ...];
```

Example:

```typescript
let position: readonly [number, number] = [23, 9132];
```

<br>
<br>

### **Enums**
<br>

* fixed key-value structure that is known at compilation
* avoid using Enums

```
enum <EnumName> {
	value1 [= <integer | string>],
	value2 [= <integer | string>],
	...
}
```

Example:

```typescript
enum Rivers {
	Amazon = 1,
	Nile = 2,
	Yangtze = 3,
	Mississippi = 4
}

Rivers.Nile;            // 2
```