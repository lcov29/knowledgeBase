# **TypeScript Interfaces**
<br>

## **Table Of Contents**
<br>

- [**TypeScript Interfaces**](#typescript-interfaces)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Declaration Merging**](#declaration-merging)
  - [**Differences Between Interfaces And Types**](#differences-between-interfaces-and-types)
  - [**Differences Between Interfaces And Abstract Classes**](#differences-between-interfaces-and-abstract-classes)

<br>
<br>
<br>

## **General**
<br>

* define type
* can be extended by
  * other interfaces
  * object types
  * classes

<br>

```
interface <InterfaceName> [<<Type1>>, ...>] [extends <OtherInterfaceName>] {
  [readonly] <propertyName>: <propertyType>

  <functionName>(<parameterName1>: <parameterType>, ...) : <resultType>
}
```

<br>

```
class <className> implements <interfaceName1>, <InterfaceName2>, ...
```

<br>
<br>

Examples: 

```typescript
interface Person {
  firstName: string,
  lastName: string,
  introduce(age: number): string
}
```

<br>

```typescript
interface Programmer<ProgrammingLanguage> extends Person {
  languages: ProgrammingLanguage[],
  code(durationInHours: number) : void
}
```

<br>

```typescript
class TypeScriptProgrammer implements Programmer<ProgrammingLanguage> {
  firstName: string;
  lastName: string;
  languages: ProgrammingLanguage[];

  constructor(firstName: string, lastName: string) {
    this.firstName = firstName;
    this.lastName = lastName;
    this.languages = [];
  }

  introduce(age: number) {
    return `Hello, my name is ${this.firstName} ${this.lastName}. I am ${age} years old.`;
  }

  code(durationInHours: number) {
    console.log(`Coding for ${durationInHours} hours...`);
  }

}
```

<br>
<br>
<br>

## **Declaration Merging**
<br>

* all interfaces with the same name within a scope are automatically merged as long there is no merge conflict

<br>

```typescript
interface A {
  property1: string;
}

interface A {
  property2: number;
}

let foo: A = {
  property1: 'foo',
  property2: 12
}

let bar: A = {
  property1: 'foo'
}
// error TS2741: Property 'property2' is missing in type '{ property1: string; }' but required in type 'A'.
```

<br>
<br>
<br>

## **Differences Between Interfaces And Types**
<br>

|                                     |Interface                     |Type
|:------------------------------------|:-----------------------------|:-----------------------
|Add properties after definition      |Yes (via Declaration Merging) |No
|Use Of Type expressions              |No                            |Yes, e.g. type x = A | B
|Extension must be assignable to base |Yes                           |No

<br>
<br>
<br>

## **Differences Between Interfaces And Abstract Classes**
<br>

|                                    |Interface    |Abstract Class
|:-----------------------------------|:------------|:-----------------------
|Can define standard implementation  |No           |Yes
|Exists after compilation            |No           |Yes, as JavaScript class
|Can define Visibility Modificators  |No           |Yes
|Multiple implementations per object |Yes          |No