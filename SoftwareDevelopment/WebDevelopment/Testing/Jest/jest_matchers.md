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
      - [**toBeNull()**](#tobenull)
      - [**toBeUndefined()**](#tobeundefined)
      - [**toBeDefined()**](#tobedefined)
      - [**not**](#not)
      - [**expect.anything()**](#expectanything)
      - [**any()**](#any)
    - [**Truthy**](#truthy)
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
      - [**toHaveLength()**](#tohavelength)
      - [**expect.stringContaining()**](#expectstringcontaining)
      - [**expect.stringMatching()**](#expectstringmatching)
    - [**Object**](#object)
      - [**toStrictEqual()**](#tostrictequal-1)
      - [**toHaveLength()**](#tohavelength-1)
      - [**toHaveProperty()**](#tohaveproperty)
      - [**toBeInstanceOf()**](#tobeinstanceof)
      - [**toMatchObject()**](#tomatchobject)
      - [**expect.closeTo**](#expectcloseto)
    - [**Array And Iterable Matchers**](#array-and-iterable-matchers)
      - [**toContain()**](#tocontain)
      - [**toHaveLength()**](#tohavelength-2)
      - [**expect.arrayContaining(array)**](#expectarraycontainingarray)
    - [**Function**](#function)
      - [**toHaveBeenCalled()**](#tohavebeencalled)
      - [**toHaveBeenCalledTimes()**](#tohavebeencalledtimes)
      - [**toHaveBeenCalledWith()**](#tohavebeencalledwith)
      - [**toHaveReturned()**](#tohavereturned)
      - [**toHaveReturnedWith()**](#tohavereturnedwith)
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

#### **not**
<br>

* negates a matcher

<br>

```typescript
expect(5).not.toBe(7);          // pass
```

<br>
<br>

#### **expect.anything()**
<br>

* matches everything but `undefined` and `null`
* used within `toEqual()` or `toBeCalledWith()`

<br>

```typescript
expect(null).toEqual(expect.anything());        // fail
expect('foo').toEqual(expect.anything());       // pass
```

<br>
<br>

#### **any()**
<br>

* matches anything created with passed constructor
* matches anything with the passed type
* used within `toEqual()` or `toBeCalledWith()`

<br>

```
any(constructor | type)
```

<br>

```typescript
class Cat {};

function getCat(fn: any) {
  return fn(new Cat());
}

const mock = jest.fn();
getCat(mock);
expect(mock).toHaveBeenCalledWith(expect.any(Cat));
```

<br>
<br>
<br>

### **Truthy**
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

#### **toHaveLength()**
<br>

* checks if string is of specified length

<br>

```typescript
expect('foo').toHaveLength(3);              // pass
expect('foo').toHaveLength(2);              // fail
```

<br>
<br>

#### **expect.stringContaining()**
<br>

* check if parameter is substring of string

<br>

```
expect.stringContaining(string)
```

<br>

```typescript
expect('Hello World').toEqual(expect.stringContaining('ello'));     // pass
expect('Hello World').toEqual(expect.stringContaining('foo'));      // fail
```

<br>
<br>

#### **expect.stringMatching()**
<br>

* match string against regular expression

```
expect.stringMatching(regexp)
```

<br>

```typescript
expect('Hello World').toEqual(expect.stringMatching(/lo.Wo/));    // pass
expect('Hello World').toEqual(expect.stringMatching(/lo..Wo/));   // fail
```

<br>
<br>
<br>

### **Object**
<br>
<br>

#### **toStrictEqual()**
<br>

* check objects for same type and structure

<br>

```typescript
const obj = { foo: 'bar' };

expect(obj).toStrictEqual(obj);              // pass
expect(obj).toStrictEqual({ foo: 'bar' });   // pass
expect(obj).toStrictEqual({ foo: 'baz' });   // fail
```

<br>
<br>

#### **toHaveLength()**
<br>

* checks if object has property length with specified value

<br>

```typescript
expect({ length: 4 }).toHaveLength(4);      // pass
expect({ length: 4 }).toHaveLength(2);      // fail
```

<br>
<br>

#### **toHaveProperty()**
<br>

* check if object has specified property and optional specified property value

<br>

```
toHaveProperty(propertyName, [propertyValue])
```

<br>

```typescript
expect({ foo: 'bar' }).toHaveProperty('foo');               // pass
expect({ foo: 'bar' }).toHaveProperty('foo', 'bar');        // pass
expect({ foo: 'bar' }).toHaveProperty('baz');               // fail
expect({ foo: 'bar' }).toHaveProperty('foo', 'baz');        // fail
```

<br>
<br>

#### **toBeInstanceOf()**
<br>

* check if object is instance of class

<br>

```typescript
class A {}

expect(new A()).toBeInstanceOf(A);        // pass
```

<br>
<br>

#### **toMatchObject()**
<br>

* check whether object matches subset of properties of other object

<br>

Pass:
```typescript
test('toMatchObject()', () => {
  const objA = {
    a: 'value',
    b: 5,
    c: {
      d: true,
      e: [1, 2, 3],
    },
  };

  const objB = {
    b: 5,
    c: {
      d: true,
      e: [1, 2, 3],
    },
  };

  expect(objA).toMatchObject(objB);
});
```

<br>

Fail:
```typescript
test('toMatchObject()', () => {
  const objA = {
    a: 'value',
    b: 5,
    c: {
      d: true,
      e: [1, 2, 3],
    },
  };

  const objB = {
    b: 5,
    e: false,
  };

  expect(objA).toMatchObject(objB);
});
```

<br>
<br>

#### **expect.closeTo**
<br>

* used to check floating number properties

```
expect.closeTo(number, numDigits?)
```

<br>

```typescript
expect({ num: 0.4 + 0.3 }).toEqual({ num: expect.closeTo(0.7) });     // pass
expect({ num: 0.5 + 0.4 }).toEqual({ num: expect.closeTo(4.3) });     // fail 
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

#### **toHaveLength()**
<br>

* checks if array is of specified length

<br>

```typescript
expect([1, 2, 3]).toHaveLength(3);              // pass
expect([1, 2, 3]).toHaveLength(2);              // fail
```

<br>
<br>

#### **expect.arrayContaining(array)**
<br>

* match every subset of expected array (arrays that contain at least all expected elements)
* used within `toEqual()` or `toBeCalledWith()`

<br>

Assume we expect the following array elements:

```typescript
const expectedArrayElementList = [1, 2, 3];
```

```typescript
expect([4, 3, 2, 1]).toEqual(expect.arrayContaining(expectedArrayElementList));     // pass

expect([1, 2, 4]).toEqual(expect.arrayContaining(expectedArrayElementList));        // fail
```

<br>
<br>
<br>

### **Function**
<br>
<br>

#### **toHaveBeenCalled()**
<br>

* check whether mock function has been called

<br>

Pass:
```typescript
test('toBeCalled()', () => {
  const foo = jest.fn();
  foo();
  expect(foo).toHaveBeenCalled();
});
```

<br>

Fail:
```typescript
test('toBeCalled()', () => {
  const foo = jest.fn();
  expect(foo).toHaveBeenCalled();
});
```

<br>
<br>

#### **toHaveBeenCalledTimes()**
<br>

* check whether mock function has been called a specified number of times

<br>

Pass:
```typescript
test('toHaveBeenCalledTimes()', () => {
  const foo = jest.fn();
  foo();
  foo();
  expect(foo).toHaveBeenCalledTimes(2);
});
```

<br>

Fail:
```typescript
test('toHaveBeenCalledTimes()', () => {
  const foo = jest.fn();
  foo();
  foo();
  expect(foo).toHaveBeenCalledTimes(10);
});
```

<br>
<br>

#### **toHaveBeenCalledWith()**
<br>

* check if mock function is called with specified argument

<br>

Pass
```typescript
test('toHaveBeenCalledWith()', () => {
  const foo = jest.fn();
  foo('bar');
  expect(foo).toHaveBeenCalledWith('bar');
});
```

<br>

Fail:
```typescript
test('toHaveBeenCalledWith()', () => {
  const foo = jest.fn();
  foo('bar');
  expect(foo).toHaveBeenCalledWith('baz');
});
```

<br>
<br>

#### **toHaveReturned()**
<br>

* check if mock function has returned at least one time

<br>

Pass:
```typescript
test('toHaveReturned()', () => {
  const foo = jest.fn();
  foo();
  expect(foo).toHaveReturned();
});
```

<br>

Fail:
```typescript
test('toHaveReturned()', () => {
  const foo = jest.fn(() => { throw new Error(); });
  foo();
  expect(foo).toHaveReturned();
});
```

<br>
<br>

#### **toHaveReturnedWith()**
<br>

* check whether mock function returned specified value

<br>

Pass:
```typescript
test('toHaveReturnedWith()', () => {
  const foo = jest.fn(() => 'bar');
  foo();
  expect(foo).toHaveReturnedWith('bar');
});
```

<br>

Fail:
```typescript
test('toHaveReturnedWith()', () => {
  const foo = jest.fn(() => 'bar');
  foo();
  expect(foo).toHaveReturnedWith('baz');
});
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
const foo = () => { throw new RangeError('Some error message'); };
```

<br>

```typescript
expect(() => foo()).toThrow();                  // pass

expect(() => foo()).toThrow(Error);             // pass, because Error is super type of RangeError

expect(() => foo()).toThrow(TypeError);         // fail

expect(() => foo()).toThrow('me er');           // pass, because foo throws an error with an error message containing 'me er'

expect(() => foo()).toThrow(/[S|s]ome/);        // pass, because foo throws an error which error message matches the regular expression

```