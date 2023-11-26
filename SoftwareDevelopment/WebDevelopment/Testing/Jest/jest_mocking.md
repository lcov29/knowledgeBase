# **Jest Mocking**
<br>

## **Table Of Contents**
<br>

- [**Jest Mocking**](#jest-mocking)
  - [**Table Of Contents**](#table-of-contents)
  - [**Basics**](#basics)
  - [**Mock Functions**](#mock-functions)
    - [**Creating Mock Function**](#creating-mock-function)
      - [**jest.fn()**](#jestfn)
    - [**Mock Implementation**](#mock-implementation)
      - [**jest.fn(implementation)**](#jestfnimplementation)
      - [**mockFn.mockImplementation(implementation)**](#mockfnmockimplementationimplementation)
      - [**mockFn.mockImplementationOnce(implementation)**](#mockfnmockimplementationonceimplementation)
    - [**Mock Return Value**](#mock-return-value)
      - [**mockFn.mockReturnValue(value)**](#mockfnmockreturnvaluevalue)
      - [**mockFn.mockReturnValueOnce(value)**](#mockfnmockreturnvalueoncevalue)
    - [**Mock Promise**](#mock-promise)
      - [**Mock Resolved Promise**](#mock-resolved-promise)
        - [**mockFn.mockResolvedValue(value)**](#mockfnmockresolvedvaluevalue)
        - [**mockFn.mockResolvedValueOnce(value)**](#mockfnmockresolvedvalueoncevalue)
      - [**Mock Rejected Promise**](#mock-rejected-promise)
        - [**mockFn.mockRejectedValue(value)**](#mockfnmockrejectedvaluevalue)
        - [**mockFn.mockRejectedValueOnce(value)**](#mockfnmockrejectedvalueoncevalue)
    - [**Spy On Mock Interaction**](#spy-on-mock-interaction)
      - [**mockFn.mock.calls**](#mockfnmockcalls)
      - [**mockFn.mock.lastCall**](#mockfnmocklastcall)
      - [**mockFn.mock.results**](#mockfnmockresults)
      - [**mockFn.mock.instances**](#mockfnmockinstances)
      - [**mockFn.mock.contexts**](#mockfnmockcontexts)
  - [**Mock Manipulation**](#mock-manipulation)
    - [**mockFn.mockClear()**](#mockfnmockclear)
    - [**mockFn.mockReset()**](#mockfnmockreset)
    - [**mockFn.mockRestore()**](#mockfnmockrestore)
  - [**Mock Modules**](#mock-modules)
    - [**Mock Only Parts Of Module**](#mock-only-parts-of-module)

<br>
<br>
<br>
<br>

## **Basics**
<br>

- used to replace external dependencies with fake implementations that capture interaction (calls, parameters)

<br>
<br>
<br>
<br>

## **Mock Functions**
<br>
<br>
<br>

### **Creating Mock Function**
<br>
<br>

#### **jest.fn()**
<br>

```
jest.fn()
```

<br>

Example:

```typescript
const mockFn = jest.fn();
```
- `mockFn` returns `undefined` when called

<br>
<br>

### **Mock Implementation**
<br>
<br>

#### **jest.fn(implementation)**
<br>

```javascript
const mockFn = jest.fn((x) => x*2);

expect(mockFn(1)).toBe(2);       // pass
expect(mockFn(2)).toBe(3);       // fail
```

<br>
<br>

#### **mockFn.mockImplementation(implementation)**
<br>

```javascript
const mockFn = jest.fn();
mockFn.mockImplementation((x) => x*2);

expect(mockFn(1)).toBe(2);       // pass
expect(mockFn(2)).toBe(3);       // fail
```

- shorthand for [`jest.fn(implementation)`](#jestfnimplementation)

<br>
<br>

#### **mockFn.mockImplementationOnce(implementation)**
<br>

```javascript
const mockFn = jest.fn();
mockFn.mockImplementationOnce((x) => x*2);
mockFn.mockImplementationOnce((x) => x*10);

expect(mockFn(1)).toBe(2);             // pass
expect(mockFn(2)).toBe(20);            // pass
expect(mockFn(3)).toBe(undefined);     // pass
```
- specify implementation that is removed when called
- can be chained

<br>
<br>

### **Mock Return Value**
<br>
<br>

#### **mockFn.mockReturnValue(value)**
<br>

```typescript
const mockFn = jest.fn();
mockFn.mockReturnValue('foo');

expect(mockFn()).toBe('foo');           // pass
expect(mockFn()).toBe('foo');           // pass
```
- shorthand for  `jest.fn().mockImplementation(() => value)`
  
<br>
<br>

#### **mockFn.mockReturnValueOnce(value)**
<br>

```typescript
const mockFn = jest.fn();
mockFn.mockReturnValueOnce('foo');
mockFn.mockReturnValueOnce('bar');

expect(mockFn()).toBe('foo');          // pass
expect(mockFn()).toBe('bar');          // pass
expect(mockFn()).toBe(undefined);      // pass
```

- shorthand for  `jest.fn().mockImplementationOnce(() => value)`
- specify implementation that is removed when called
- can be chained

<br>
<br>

### **Mock Promise**
<br>
<br>

#### **Mock Resolved Promise**
<br>
<br>

##### **mockFn.mockResolvedValue(value)**
<br>

```javascript
const asyncMockFn = jest.fn();
asyncMockFn.mockResolvedValue('resolveValue');

await expect(asyncMockFn()).resolves.toBe('resolveValue');     // pass
await expect(asyncMockFn()).resolves.toBe('resolveValue');     // pass
```

- shorthand for `jest.fn().mockImplementation(() => Promise.resolve(value))`

<br>
<br>

##### **mockFn.mockResolvedValueOnce(value)**
<br>

```javascript
const asyncMockFn = jest.fn();
asyncMockFn.mockResolvedValueOnce('resolveValue1');
asyncMockFn.mockResolvedValueOnce('resolveValue2');

await expect(asyncMockFn()).resolves.toBe('resolveValue1');    // pass
await expect(asyncMockFn()).resolves.toBe('resolveValue2');    // pass
```

- shorthand for `jest.fn().mockImplementationOnce(() => Promise.resolve(value))`
- specify resolved value that is removed removed when mock function is called
- can be chained

<br>
<br>

#### **Mock Rejected Promise**
<br>
<br>

##### **mockFn.mockRejectedValue(value)**
<br>

```javascript
const asyncMockFn = jest.fn();
asyncMockFn.mockRejectedValue('rejectValue');

await expect(asyncMockFn()).rejects.toBe('rejectValue');       // pass
```

- shorthand for `jest.fn().mockImplementation(() => Promise.reject(value))`

<br>
<br>

##### **mockFn.mockRejectedValueOnce(value)**
<br>

```javascript
const asyncMockFn = jest.fn();
asyncMockFn.mockRejectedValueOnce('rejectValue1');
asyncMockFn.mockRejectedValueOnce('rejectValue2');

await expect(asyncMockFn()).rejects.toBe('rejectValue1');      // pass
await expect(asyncMockFn()).rejects.toBe('rejectValue2');      // pass
```

- shorthand for `jest.fn().mockImplementationOnce(() => Promise.reject(value))`

<br>
<br>

### **Spy On Mock Interaction**
<br>
<br>

#### **mockFn.mock.calls**
<br>

- returns a two-dimensional array containing the arguments of each call of the mock function
- `mockFn.mock.calls.length` returns the number of calls of the mock function
- `mockFn.mock.calls[<callIndex>][<parameterIndex>]` returns specified parameter of specified call

<br>

```javascript
const mockFn = jest.fn();
mockFn('arg1');
mockFn('arg1', 'arg2');
mockFn('arg1', 2, 3);

mockFn.mock.calls;           // [ [ 'arg1' ], [ 'arg1', 'arg2' ], [ 'arg1', 2, 3 ] ]
mockFn.mock.calls.length;    // 3
mockFn.mock.calls[1][1];     // arg2
```

<br>
<br>

#### **mockFn.mock.lastCall**
<br>

- returns an array containing the arguments of the most recent call of the mock function

<br>

```javascript
const mockFn = jest.fn();
mockFn('arg1');
mockFn('arg1', 'arg2');

mockFn.mock.lastCall;         // [ 'arg1', 'arg2' ]
```

<br>
<br>

#### **mockFn.mock.results**
<br>

- returns an array of objects containing the result of each call of the mock function
- `mockFn.mock.results[<callIndex>].value` returns value of specified call

<br>

Object:

```javascript
{
   type: 'return' | 'throw' | 'incomplete',
   value: 'someValue'
}
```

<br>

```javascript
const mockFn = jest.fn();
mockFn.mockImplementationOnce((x) => x*2);
mockFn.mockImplementationOnce(() => 'SomeReturn');
mockFn.mockImplementationOnce(() => { throw new Error('Error Message'); });

mockFn(4);
mockFn();
try {
   mockFn();
} catch(e) {}

mockFn.mock.results;    

/*
   [
      { type: 'return', value: 8 },
      { type: 'return', value: 'SomeReturn' },
      { type: 'throw',  value: Error: Error Message }
   ]
*/
```

<br>
<br>

#### **mockFn.mock.instances**
<br>

- returns an array of all objects instantiated by mock function using `new` keyword

<br>

```javascript
const mockFn = jest.fn();
new mockFn();
new mockFn();
new mockFn();

mockFn.mock.instances;     // [ mockConstructor {}, mockConstructor {}, mockConstructor {} ]
```

<br>
<br>

#### **mockFn.mock.contexts**
<br>

- returns an array of all objects that the mock receives as `this` value per call 

<br>

```javascript
const context1 = { a: 'context1' };
const context2 = { a: 'context2' };

const mockFn = jest.fn();
mockFn.apply(context1);
mockFn.apply(context2);
mockFn();

console.log(mockFn.mock.contexts);     // [ { a: 'context1' }, { a: 'context2' }, undefined ]
```

<br>
<br>
<br>
<br>

## **Mock Manipulation**
<br>
<br>

### **mockFn.mockClear()**
<br>

- clears all spy information like
  - [mockFn.mock.calls](#mockfnmockcalls)
  - [mockFn.mock.lastCall](#mockfnmocklastcall)
  - [mockFn.mock.results](#mockfnmockresults)
  - [mockFn.mock.instances](#mockfnmockinstances)
  - [mockFn.mock.contexts](#mockfnmockcontexts)

<br>

```javascript
const mockFn = jest.fn((x) => x*2);
mockFn(1);
mockFn(1, 2);

mockFn.mock.calls;         // [ [ 'arg1' ], [ 'arg1', 'arg2' ] ]

mockFn.mockClear();

mockFn.mock.calls;         // []

mockFn(2);                 // 4
```

<br>
<br>

### **mockFn.mockReset()**
<br>

- clears all mock implementations
- clears all spy information like
  - [mockFn.mock.calls](#mockfnmockcalls)
  - [mockFn.mock.lastCall](#mockfnmocklastcall)
  - [mockFn.mock.results](#mockfnmockresults)
  - [mockFn.mock.instances](#mockfnmockinstances)
  - [mockFn.mock.contexts](#mockfnmockcontexts)

<br>

```javascript
const mockFn = jest.fn((x) => x*2);
mockFn(1);
mockFn(1, 2);

mockFn.mock.calls;         // [ [ 'arg1' ], [ 'arg1', 'arg2' ] ]

mockFn.mockReset();

mockFn.mock.calls;         // []

mockFn(2);                 // undefined
```

<br>
<br>

### **mockFn.mockRestore()**
<br>

- clears all mock implementations
- restores non-mocked functionality
- clears all spy information like
  - [mockFn.mock.calls](#mockfnmockcalls)
  - [mockFn.mock.lastCall](#mockfnmocklastcall)
  - [mockFn.mock.results](#mockfnmockresults)
  - [mockFn.mock.instances](#mockfnmockinstances)
  - [mockFn.mock.contexts](#mockfnmockcontexts)

<br>
<br>
<br>
<br>

## **Mock Modules**
<br>

```
jest.mock('moduleLocation', [() => {customImplementation}], [optionObject])
```

<br>

```typescript
import { moduleFunc } from 'modulePath';

jest.mock('modulePath');

test('test description', () => {
   internalMethod.mockReturnValue('value');
   expect(moduleFunc('parameter')).toEqual('resultValue');
});
```

<br>
<br>

### **Mock Only Parts Of Module**
<br>

module.ts:
```typescript
const foo = () => 'foo';
const bar = () => 'bar';
const baz = () => 'baz';

export { foo, bar, baz };
```

<br>

```typescript
jest.mock('./module', () => {
   return {
      __esModule: true,
      ...jest.requireActual('./module'),
      bar: jest.fn(() => 'mocked bar'),
      baz: jest.fn(() => 'mocked baz'),
   };
});
```












<!-- 

unit test = test units in isolation (= not relying on any dependencies)

====== mocks ====== 
- replacement for external interface
- does NOT chech function behavior or return value
- checks:
  - was mock function called
  - how many times have the mock function been called
  - what parameters are passed

====== stubs ======
- generate predefined output (success, failure or execption)
- checks function behavior based on generated stub output  

====== fakes ======
- replace actual implementation with local limited implementation
- checks function behavior based on actually received data

-->