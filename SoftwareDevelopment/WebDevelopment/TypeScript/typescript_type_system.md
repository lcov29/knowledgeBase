# **TypeScript Type System**
<br>

## **Table Of Contents**
<br>

- [**TypeScript Type System**](#typescript-type-system)
  - [**Table Of Contents**](#table-of-contents)
  - [**General System**](#general-system)
  - [**Type Declaration**](#type-declaration)
    - [**Implicit Declaration**](#implicit-declaration)
    - [**Explicit Declaration**](#explicit-declaration)
    - [**Type Aliases**](#type-aliases)
  - [**Literal Types**](#literal-types)
  - [**Assignability**](#assignability)
  - [**Type Operations**](#type-operations)
    - [**Union**](#union)
    - [**Intersection**](#intersection)
    - [**Keybased Access To Nested Types**](#keybased-access-to-nested-types)
    - [**keyof**](#keyof)
    - [**typeof**](#typeof)
  - [**Conditional Types**](#conditional-types)
    - [**Distributive**](#distributive)
    - [**Keyword Infer**](#keyword-infer)
    - [**Build-In Conditional Types**](#build-in-conditional-types)
      - [**Exclude**](#exclude)
      - [**Extract**](#extract)
      - [**NonNullable**](#nonnullable)
      - [**Return Type**](#return-type)
      - [**InstanceType**](#instancetype)
  - [**Mapped Type**](#mapped-type)
    - [**Build-In Mapped Types**](#build-in-mapped-types)
      - [**Record**](#record)
      - [**Partial**](#partial)
      - [**Required**](#required)
      - [**Readonly**](#readonly)
      - [**Pick**](#pick)
  - [**Assertions**](#assertions)
    - [**Type Assertion**](#type-assertion)
    - [**Not Null Assertion**](#not-null-assertion)

<br>
<br>
<br>

## **General System**
<br>
<br>

|                              |TypeScript          |JavaScript |
|:-----------------------------|:-------------------|:----------|
|Type Conversion               |Strong              |Weak       |
|Type Declaration              |Static (Structural) |Dynamic    |
|Type Errors are thrown during |Compilation         |Runtime    |

<br>

See also [Type System](../../../LanguageTheory/language_theory_type_systems.md).

<br>
<br>
<br>

## **Type Declaration**
<br>
<br>

### **Implicit Declaration**
<br>

* type is inferred from the assigned value
* inferred type is widened when keyword let is used
  * _null_ and _undefined_ are widened to type _any_

<br>

```typescript
let foo = 3;                // implicitly inferred to type number (widened)

const bar = 3;              // implicitly inferred to literal type 3

let baz = null;             // implicitly inferred to type any

const bat = null;           // implicitly inferred to literal type null
```

It is recommended to use implicit type declaration whenever possible.

<br>
<br>

### **Explicit Declaration**
<br>

```
<const | let> <variable>: <type> [= <value>]
```

```typescript
let foo: string = 'foo';    // explicitly declared type 
```

<br>
<br>

### **Type Aliases**
<br>

* reuse of type definition
* block scoped
* not inferred by TypeScript
* every occurrence of alias can be replaced with its type definition

```
type <aliasName> = <typeDefinition>
```

<br>

```typescript
type Person = {
	firstName: string,
	lastName: string,
	age: number
};

let johnDoe: Person = {
	firstName: 'John',
	lastName: 'Doe',
	age: 43
}
```

<br>
<br>
<br>

## **Literal Types**
<br>

* We can use a specific type value as a type.

<br>

Example:

```typescript
const foo = 'bar';          // implicitly inferred literal type via const (type: 'bar' instead of string)

let bar : 'baz' = 'baz';    // explicitly declared literal type (type: 'baz' instead of string)
```
<br>

Note: Avoid using empty object literal `{}`, because we can then assign every value except _null_ and _undefined_ !

<br>
<br>
<br>

## **Assignability**
<br>

Type _A_ is assignable to type _B_ when
* _A_ is equal to _B_ or
* _A_ is subtype of _B_ or
* _A_ is type _any_

<br>
<br>
<br>

## **Type Operations**
<br>
<br>

### **Union**
<br>

* custom type that combines multiple existing types
* values can be any of the union types

```
<type1> | <type2> | ...
```

<br>

* operations are limited to operations defined on every type of the union (operation intersection)
* use _narrowing_ (type checks) to use operations specific to one type of the union

```typescript
function foo(input: string | number) {
	return input.trim();
}

foo('  bar  ');
// error TS2339: Property 'trim' does not exist on type 'string | number'.
```

```typescript
function foo(input: string | number) {
	if (typeof input === 'string') {
		return input.trim();
	}
	return input;
}

foo('  bar  ');
// bar
```

<br>

**TIP:** add literal string attribute to every type of the union for easy narrowing

```typescript
type foo = {type: 'foo', payload: string};
type bar = {type: 'bar', payload: string};


function test(param: foo | bar) {
  switch (param.type) {
    case 'foo':
      // implementation
      break;

    case 'bar':
      // implementation
      break;
  }
}
```


<br>
<br>

### **Intersection**
<br>

* custom type that combines multiple existing types
* values must contain all properties of intersected types

```
<type1> & <type2> & ...
```

<br>

```typescript
type foo = {a: string};

let test: foo & {b: number} = {a: 'test', b: 4};
```

<br>
<br>

### **Keybased Access To Nested Types**
<br>

```
<type>['<attributeName>']
```

<br>

```typescript
type foo = {
  a: {
    b: {payload: string},
    c: {payload: number}
  }
}

type typeA = foo['a'];
type typeB = foo['a']['b'];
type typeC = foo['a']['c'];
```

<br>
<br>

### **keyof**
<br>

* returns union string of all keys of first level of given type

<br>

```typescript
type foo = {
  a: {x: number, y: boolean},
  b: number,
  c: boolean
}

type bar = keyof foo;   // 'a' | 'b' | 'c'
```

<br>
<br>

### **typeof**
<br>

* returns type of a variable or property
* usable in _type context_

<br>

```typescript
let foo = 'foo';

let bar: typeof foo;    // type 'string'
```

<br>
<br>
<br>

## **Conditional Types**
<br>

```
type <conditionalTypeName><T> = T extends <ComparisonType> ? <IfType> : <ThenType>
```

* ternary operator at type level
  
* can be used in
  * type aliases
  * interfaces
  * classes
  * parameter types 
  * generics

<br>

```typescript
type conditionalType<T> = T extends string ? number : boolean;

type foo = conditionalType<string>;     // number
type bar = conditionalType<number>;     // boolean
```

<br>
<br>

### **Distributive**
<br>

Conditional types are distributive:

```typescript
type foo = (A | B | C) extends D ? E : F;
```

equals

```typescript
type foo =
    (A extends D) ? E : F |
    (B extends D) ? E : F |
    (C extends D) ? E : F;
```

<br>
<br>

### **Keyword Infer**
<br>

We can define an inline generic type within the condition by using the keyword _infer_

```typescript
type foo<T> = T extends (infer U) ? U : T;
```
* generic type _U_ is inferred from _T_

<br>
<br>

### **Build-In Conditional Types**
<br>
<br>

#### **Exclude**
<br>

```typescript
type test = Exclude<T, U>;
```
* returns types in _T_ that are not included in _U_

<br>

```typescript
type foo = number | boolean;
type bar = number;

type test = Exclude<foo, bar>;      // boolean
```

<br>
<br>

#### **Extract**
<br>

```typescript
type test = Extract<T, U>;
```
* return types in _T_ thatcan be assigned to _U_

<br>

```typescript
type foo = number | boolean;
type bar = number;

type test = Extract<foo, bar>;      // number
```

<br>
<br>

#### **NonNullable**
<br>

```typescript
type test = NonNullable<T>;
```
* return T without types _null_ and _undefined_

<br>

```typescript
type foo = number | boolean | null | undefined;

type test = NonNullable<foo>;       // number | boolean
```

<br>
<br>

#### **Return Type**
<br>

```typescript
type test = ReturnType<F>
```
* returns return type of function type _F_
* do not use for generic and overloaded function types

<br>

```typescript
type foo = (a: number) => number | string;

type test = ReturnType<foo>;   // number | string
```

<br>
<br>

#### **InstanceType**
<br>

```typescript
type test = InstanceType<C>
```
* return instance type of class constructor

<br>
<br>
<br>

## **Mapped Type**
<br>

* maps types of keys to types af values

```
type <mapTypeName> = {
  [<keyName> in <keyType>]: <valueType>
}
```

<br>

```typescript
type foo = {
    property1: string,
    property2: number,
    property3: boolean
};


// mark all properties of type foo as optional
type optionalFoo = {
    [Key in keyof foo]?: foo[Key];
}
```

<br>
<br>

### **Build-In Mapped Types**
<br>
<br>

#### **Record**
<br>

```typescript
type test = Record<KeyType, ValueType>;
```

<br>
<br>

#### **Partial**
<br>

```typescript
type test = Partial<T>;
```
* mark all properties in T as optional

<br>
<br>

#### **Required**
<br>

```typescript
type test = Required<T>;
```
* mark all properties in T as required

<br>
<br>

#### **Readonly**
<br>

```typescript
type test = Readonly<T>;
```
* mark all properties in T as readonly

<br>
<br>

#### **Pick**
<br>

```typescript
type test = Pick<objectType, propertyName>;
```
* extract subtype of property _propertyName_ in _objectType_

<br>
<br>
<br>

## **Assertions**
<br>

* used as emergency exits for the typesystem
* avoid whenever possible!

<br>

### **Type Assertion**
<br>

* assures TypeScript that a given value is a super- or subtype of a specific type

```typescript
const foo = 'bar';    // type: 'bar'

bar(foo as string);
```

<br>
<br>

### **Not Null Assertion**
<br>

* assure TypeScript that a given value is of a type is neither _null_ nor _undefined

```typescript
foo(bar!)
```