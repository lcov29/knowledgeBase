# **Jest Matchers**
<br>

## **Table Of Contents**
<br>

- [**Jest Matchers**](#jest-matchers)
  - [**Table Of Contents**](#table-of-contents)
  - [**Matchers (Assertions)**](#matchers-assertions)
    - [**General Matchers**](#general-matchers)
      - [**toBe()**](#tobe)
      - [**toStrictEqual()**](#tostrictequal)
      - [**not**](#not)
    - [**Truthy**](#truthy)
      - [**toBeNull()**](#tobenull)
      - [**toBeUndefined()**](#tobeundefined)
      - [**toBeDefined()**](#tobedefined)
      - [**toBeTruthy()**](#tobetruthy)
      - [**toBeFalsy()**](#tobefalsy)
    - [**Number Matchers**](#number-matchers)
      - [**toBe()**](#tobe-1)
      - [**ToBeCloseTo()**](#tobecloseto)
      - [**toBeGreaterThan()**](#tobegreaterthan)
      - [**toBeGreaterThanOrEqual()**](#tobegreaterthanorequal)
      - [**toBeLessThan()**](#tobelessthan)
      - [**toBeLessThanOrEqual()**](#tobelessthanorequal)
    - [**String Matchers**](#string-matchers)
      - [**toBe()**](#tobe-2)
      - [**toMatch()**](#tomatch)
    - [**Array And Iterable Matchers**](#array-and-iterable-matchers)
      - [**toContain()**](#tocontain)
    - [**Exceptions**](#exceptions)
      - [**toThrow()**](#tothrow)

<br>
<br>
<br>

## **Matchers (Assertions)**
<br>

* used to compare the actual result of an `expect()` call with the expected result

```typescript
expect(someValue).<Matcher>()
```

See [jest matchers](./jest_matchers.md)

<br>
<br>
<br>

### **General Matchers**
<br>
<br>

#### **toBe()**
<br>

* checks for strict equality of a value

```typescript
expect(5 + 3).toBe(8);  // pass
```

<br>

```typescript
const obj = { foo: 'bar' };

expect(obj).toBe(obj);              // pass
expect(obj).toBe({ foo: 'bar' });   // fail
```

<br>
<br>

#### **toStrictEqual()**
<br>

* check objects for same type and structure

```typescript
expect(5 + 3).toStrictEqual(8);             // pass
```

<br>

```typescript
const obj = { foo: 'bar' };

expect(obj).toStrictEqual(obj);              // pass
expect(obj).toStrictEqual({ foo: 'bar' });   // pass
```

<br>
<br>

#### **not**
<br>

* negates a matcher

<br>

```typescript
expect(5).not.toBe(7);          // pass
```

<br>
<br>
<br>

### **Truthy**
<br>
<br>

#### **toBeNull()**
<br>

* matches only `null`

```typescript
expect(null).toBeNull();        // pass
expect(undefined).toBeNull();   // fail
```

<br>
<br>

#### **toBeUndefined()**
<br>

* matches only `undefined`

```typescript
expect(undefined).toBeUndefined();      // pass
expect(foo).toBeUndefined();            // pass
expect('foo').toBeUndefined();          // fail
```

<br>
<br>

#### **toBeDefined()**
<br>

* matches everything except `undefined`

<br>
<br>

#### **toBeTruthy()**
<br>

* matches truthy values

```typescript
expect(null).toBeTruthy();          // fail
expect('foo').toBeTruthy();         // pass
```

<br>
<br>

#### **toBeFalsy()**
<br>

* matches falsy values

```typescript
expect(null).toBeFalsy();          // pass
expect('foo').toBeFalsy();         // fail
```

<br>
<br>
<br>

### **Number Matchers**
<br>
<br>

#### **toBe()**
<br>

```typescript
expect(5).toBe(5);                  // pass
```

<br>
<br>

#### **ToBeCloseTo()**
<br>

* use for floating point equality

```typescript
expect(0.2 + 0.7).toBeCloseTo(0.9);     // pass
```

<br>
<br>

#### **toBeGreaterThan()**
<br>

```typescript
expect(5).toBeGreaterThan(2);       // pass
expect(5).toBeGreaterThan(5);       // fail
expect(5).toBeGreaterThan(7);       // fail
```

<br>
<br>

#### **toBeGreaterThanOrEqual()**
<br>

```typescript
expect(5).toBeGreaterThanOrEqual(2);       // pass
expect(5).toBeGreaterThanOrEqual(5);       // pass
expect(5).toBeGreaterThanOrEqual(7);       // fail
```

<br>
<br>

#### **toBeLessThan()**
<br>

```typescript
expect(5).toBeLessThan(2);                  // fail
expect(5).toBeLessThan(5);                  // fail
expect(5).toBeLessThan(7);                  // pass
```

<br>
<br>

#### **toBeLessThanOrEqual()**
<br>

```typescript
expect(5).toBeLessThanOrEqual(2);           // fail
expect(5).toBeLessThanOrEqual(5);           // pass
expect(5).toBeLessThanOrEqual(7);           // pass
```

<br>
<br>
<br>

### **String Matchers**
<br>
<br>

#### **toBe()**
<br>

```typescript
expect('foo').toBe('foo');                  // pass
expect('foo').toBe('bar');                  // fail
```

<br>
<br>

#### **toMatch()**
<br>

* check string against regular expression

```typescript
expect('foo').toMatch(/oo/);                // pass
expect('foo').toMatch(/abc/);               // fail
```

<br>
<br>
<br>

### **Array And Iterable Matchers**
<br>
<br>

#### **toContain()**
<br>

* check if element is included in array

```typescript
expect([1, 2, 3]).toContain(2);             // pass
expect([1, 2, 3]).toContain(7);             // fail
```

<br>
<br>
<br>

### **Exceptions**
<br>
<br>

#### **toThrow()**
<br>

* checks whether function throws error

Assume we have the following function:

```typescript
const foo = (): void => { throw new RangeError('Some error message'); };
```

<br>

```typescript
expect(() => foo()).toThrow();                  // pass

expect(() => foo()).toThrow(Error);             // pass, because Error is super type of RangeError

expect(() => foo()).toThrow(TypeError);         // fail

expect(() => foo()).toThrow('me er');           // pass, because foo throws an error with an error message containing 'me er'

expect(() => foo()).toThrow(/[S|s]ome/);        // pass, because foo throws an error which error message matches the regular expression

```
