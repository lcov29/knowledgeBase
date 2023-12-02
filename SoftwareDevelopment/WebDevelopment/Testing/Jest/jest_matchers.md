# **Jest Matchers**
<br>

## **Table Of Contents**
<br>

- [**Jest Matchers**](#jest-matchers)
  - [**Table Of Contents**](#table-of-contents)
  - [**Modifiers**](#modifiers)
    - [**.not**](#not)
    - [**.resolves**](#resolves)
    - [**.rejects**](#rejects)
  - [**Matchers (Assertions)**](#matchers-assertions)
    - [**General Matchers**](#general-matchers)
      - [**toBe()**](#tobe)
      - [**toStrictEqual()**](#tostrictequal)
      - [**toBeNull()**](#tobenull)
      - [**toBeUndefined()**](#tobeundefined)
      - [**toBeDefined()**](#tobedefined)
      - [**toBeNaN()**](#tobenan)
      - [**expect.anything()**](#expectanything)
      - [**expect.any()**](#expectany)
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
      - [**toContainEqual()**](#tocontainequal)
      - [**toHaveLength()**](#tohavelength-2)
      - [**expect.arrayContaining(array)**](#expectarraycontainingarray)
    - [**Mock Function**](#mock-function)
      - [**toHaveBeenCalled()**](#tohavebeencalled)
      - [**toHaveBeenCalledTimes()**](#tohavebeencalledtimes)
      - [**toHaveBeenCalledWith()**](#tohavebeencalledwith)
      - [**toHaveBeenLastCalledWith()**](#tohavebeenlastcalledwith)
      - [**toHaveBeenNthCalledWith()**](#tohavebeennthcalledwith)
      - [**toHaveReturned()**](#tohavereturned)
      - [**toHaveReturnedTimes()**](#tohavereturnedtimes)
      - [**toHaveReturnedWith()**](#tohavereturnedwith)
      - [**toHaveLastReturnedWith()**](#tohavelastreturnedwith)
      - [**toHaveNthReturnedWith()**](#tohaventhreturnedwith)
    - [**Exceptions**](#exceptions)
      - [**toThrow()**](#tothrow)

<br>
<br>
<br>

## **Modifiers**
<br>
<br>

### **.not**
<br>

- inverts matcher


```javascript
expect(3).not.toBe(8);
```

<br>
<br>

### **.resolves**
<br>

- unwraps the value of a resolved promise

```javascript
const mockFn = jest.fn();
mockFn.mockResolvedValue('foo');
await expect(mockFn()).resolves.toEqual('foo');   // pass
```

<br>
<br>

### **.rejects**
<br>

- unwrapps the value of a rejected promise

```javascript
const mockFn = jest.fn();
mockFn.mockRejectedValue('foo');
await expect(mockFn()).rejects.toEqual('foo');
```

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

- checks primitive value for equality
- checks objects for **referential** equality

<br>

> To check floating-point numbers use [`toBeCloseTo`](#tobecloseto)!

<br>

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

- checks objects for same type and structure

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

- checks if value is `null`

```typescript
expect(null).toBeNull();        // pass
expect(undefined).toBeNull();   // fail
```

<br>
<br>

#### **toBeUndefined()**
<br>

- checks if value is `undefined`

```typescript
expect(undefined).toBeUndefined();      // pass
expect(foo).toBeUndefined();            // pass
expect('foo').toBeUndefined();          // fail
```

<br>
<br>

#### **toBeDefined()**
<br>

- checks if value is anything else than `undefined`

<br>
<br>

#### **toBeNaN()**
<br>

- checks if value is `NaN`

```typescript
expect(2).toBeNaN();      // fail
expect(NaN).toBeNaN();    // pass
```

<br>
<br>

#### **expect.anything()**
<br>

- matches everything but `undefined` and `null`
- used within `toEqual()` or `toBeCalledWith()`

<br>

```typescript
expect(null).toEqual(expect.anything());        // fail
expect('foo').toEqual(expect.anything());       // pass
```

<br>
<br>

#### **expect.any()**
<br>

- matches anything created with passed constructor
- matches anything with the passed type
- used within `toEqual()` or `toBeCalledWith()`

<br>

```
expect.any(constructor | type)
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

- checks if value is truthy

```typescript
expect(null).toBeTruthy();          // fail
expect('foo').toBeTruthy();         // pass
```

<br>
<br>

#### **toBeFalsy()**
<br>

- checks if value is falsy

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

- checks equality of floating-point numbers

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

- checks string against regular expression

```typescript
expect('foo').toMatch(/oo/);                // pass
expect('foo').toMatch(/abc/);               // fail
```

<br>
<br>

#### **toHaveLength()**
<br>

- checks if string is of specified length

<br>

```typescript
expect('foo').toHaveLength(3);              // pass
expect('foo').toHaveLength(2);              // fail
```

<br>
<br>

#### **expect.stringContaining()**
<br>

- checks if parameter is substring of string

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

- matches string against regular expression

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

- checks objects for same type and structure

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

- checks if object has property length with specified value

<br>

```typescript
expect({ length: 4 }).toHaveLength(4);      // pass
expect({ length: 4 }).toHaveLength(2);      // fail
```

<br>
<br>

#### **toHaveProperty()**
<br>

- checks if object has specified property and optional specified property value
- access deeply nested properties via dot notation

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

- checks if object is instance of class

<br>

```typescript
class A {}

expect(new A()).toBeInstanceOf(A);        // pass
```

<br>
<br>

#### **toMatchObject()**
<br>

- checks whether object matches subset of properties of other object

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

- used to check floating number properties

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

- checks if element is included in array
- checks for strict equality

```typescript
expect([1, 2, 3]).toContain(2);             // pass
expect([1, 2, 3]).toContain(7);             // fail
```

<br>
<br>

#### **toContainEqual()**
<br>

- checks if **object** is included in array
- does not check for strict equality

```typescript
const persons = [
  { firstName: 'John', lastName: 'Doe' },
  { firstName: 'Jane', lastName: 'Smith' }
];

expect(persons).toContainEqual({ firstName: 'John', lastName: 'Doe' });     // pass
expect(persons).toContainEqual({ firstName: 'Jane', lastName: 'Doe' });     // fail
```


<br>
<br>

#### **toHaveLength()**
<br>

- checks if object has a property `length` with specified value

<br>

```typescript
expect([1, 2, 3]).toHaveLength(3);              // pass
expect([1, 2, 3]).toHaveLength(2);              // fail
```

<br>
<br>

#### **expect.arrayContaining(array)**
<br>

- matches every subset of expected array (arrays that contain at least all expected elements)
- used within `toEqual()` or `toBeCalledWith()`

<br>

```typescript
const expectedArrayElementList = [1, 2, 3];

expect([4, 3, 2, 1]).toEqual(expect.arrayContaining(expectedArrayElementList));     // pass

expect([1, 2, 4]).toEqual(expect.arrayContaining(expectedArrayElementList));        // fail
```

<br>
<br>
<br>

### **Mock Function**
<br>
<br>

#### **toHaveBeenCalled()**
<br>

- checks whether mock function has been called

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

- checks whether mock function has been called a specified number of times

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

- checks if mock function was called with specified arguments at some time in the past

<br>

Pass
```typescript
test('toHaveBeenCalledWith()', () => {
  const foo = jest.fn();
  foo('bar', 1);
  foo('baz');
  expect(foo).toHaveBeenCalledWith('baz');
  expect(foo).toHaveBeenCalledWith('bar', 1);
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

#### **toHaveBeenLastCalledWith()**
<br>

- checks if mock function was last called with specified arguments

<br>

Pass
```typescript
test('toHaveBeenLastCalledWith()', () => {
  const foo = jest.fn();
  foo('baz');
  foo('bar', 1);
  expect(foo).toHaveBeenLastCalledWith('bar', 1);
});
```

<br>

Fail:
```typescript
test('toHaveBeenLastCalledWith()', () => {
  const foo = jest.fn();
  foo('baz');
  foo('bar', 1);
  expect(foo).toHaveBeenLastCalledWith('baz');
});
```

<br>
<br>

#### **toHaveBeenNthCalledWith()**
<br>

- checks if the specified call of mock function was called with specified arguments

<br>

Pass
```typescript
test('toHaveBeenNthCalledWith()', () => {
  const foo = jest.fn();
  foo('baz');
  foo('bar', 1);
  expect(foo).toHaveBeenNthCalledWith(1, 'baz');
  expect(foo).toHaveBeenNthCalledWith(2, 'bar', 1);
});
```

<br>

Fail:
```typescript
test('toHaveBeenNthCalledWith()', () => {
  const foo = jest.fn();
  foo('baz');
  foo('bar', 1);
  expect(foo).toHaveBeenNthCalledWith(1, 'bar', 1);
  expect(foo).toHaveBeenNthCalledWith(2, 'baz');
});
```

<br>
<br>

#### **toHaveReturned()**
<br>

- checks if mock function has returned (= did not throw an error) at least one time

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

#### **toHaveReturnedTimes()**
<br>

- checks if mock function has returned (= did not throw an error) exactly a specified amount of times

<br>

Pass:
```typescript
test('toHaveReturnedTimes()', () => {
  const foo = jest.fn();
  foo();
  foo();
  foo();
  expect(foo).toHaveReturnedTimes(3);
});
```

<br>

Fail:
```typescript
test('toHaveReturnedTimes()', () => {
  const foo = jest.fn();
  const foo = jest.fn();
  foo();
  foo();
  foo();
  expect(foo).toHaveReturnedTimes(2);});
```

<br>
<br>

#### **toHaveReturnedWith()**
<br>

- checks whether mock function returned specified value

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

#### **toHaveLastReturnedWith()**
<br>

- checks whether mock function returned specified value at last call

<br>

Pass:
```typescript
test('toHaveLastReturnedWith()', () => {
  const foo = jest.fn((i) => `call_${i}`);
  foo(1);
  foo(2);
  expect(foo).toHaveLastReturnedWith('call_2');
});
```

<br>

Fail:
```typescript
test('toHaveLastReturnedWith()', () => {
  const foo = jest.fn((i) => `call_${i}`);
  foo(1);
  foo(2);
  expect(foo).toHaveLastReturnedWith('call_1');
});
```

<br>
<br>

#### **toHaveNthReturnedWith()**
<br>

- checks whether mock function returned specified value at specified call

<br>

Pass:
```typescript
test('toHaveNthReturnedWith()', () => {
  const foo = jest.fn((i) => `call_${i}`);
  foo(1);
  foo(2);
  foo(3);
  expect(foo).toHaveNthReturnedWith(2,'call_2');
});
```

<br>

Fail:
```typescript
test('toHaveNthReturnedWith()', () => {
  const foo = jest.fn((i) => `call_${i}`);
  foo(1);
  foo(2);
  foo(3);
  expect(foo).toHaveNthReturnedWith(2, 'call_3');
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

- checks whether function throws error

<br>

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