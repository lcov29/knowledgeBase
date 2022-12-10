# **Jest Mocking**
<br>

## **Table Of Contents**
<br>

- [**Jest Mocking**](#jest-mocking)
  - [**Table Of Contents**](#table-of-contents)
  - [**Basics**](#basics)
  - [**Mock Functions**](#mock-functions)
    - [**Create Mock Function**](#create-mock-function)
    - [**Set Mock Return Value**](#set-mock-return-value)
    - [**Clear Mockup Data**](#clear-mockup-data)
    - [**Check Number Of Calls**](#check-number-of-calls)
    - [**Check Parameter Values**](#check-parameter-values)
    - [**Check Return Values**](#check-return-values)
    - [**Example**](#example)
  - [**Mock Promises**](#mock-promises)
    - [**Resolve**](#resolve)
    - [**Reject**](#reject)
  - [**Mock Modules**](#mock-modules)

<br>
<br>
<br>

## **Basics**
<br>

* Mocking is used to test code units in isolation by replacing external dependencies with fake implementations

<br>
<br>
<br>

## **Mock Functions**
<br>
<br>

### **Create Mock Function**
<br>

```typescript
const mockFn = jest.fn();

const mockFn = jest.fn((x) => x*2);       // optional mock implementation
```

<br>
<br>

### **Set Mock Return Value**
<br>
<br>

```typescript
const mockFn = jest.fn();
mockFn.mockReturnValue('foo');

expect(mockFn()).toBe('foo');           // pass
expect(mockFn()).toBe('foo');           // pass
```

<br>

```typescript
const mockFn = jest.fn();
mockFn.mockReturnValueOnce('foo');

expect(mockFn()).toBe('foo');           // pass
expect(mockFn()).toBe('foo');           // fail
```

<br>
<br>

### **Clear Mockup Data**
<br>

```typescript
mockFn.mockClear();
```
* clears mock call statistics

<br>

```typescript
mockFn.mockReset();
```
* same as `mockClear` but resets also mocked return value and implementation

<br>
<br>

### **Check Number Of Calls**
<br>

```typescript
expect(mockFn.mock.calls.length).toBe(3);
```

<br>
<br>

### **Check Parameter Values**
<br>

```typescript
expect(mockFn.mock.calls[<callIndex>][<parameterIndex>]).toBe(parameterValue);
```

<br>
<br>

### **Check Return Values**
<br>

```typescript
expect(mockFn.mock.results[<callIndex>].value).toBe(resultValue)
```

<br>
<br>

### **Example**
<br>

Code under test:
```typescript
function forEach(itemList: any[], callback: any) {
   for (let i = 0; i < itemList.length; i++) {
      callback(itemList[i]);
   }
}
```

<br>

Test:
```typescript
const mockFn = jest.fn((x) => x * 2);


describe('test mock function features', () => {

   beforeEach(() => {
      forEach([1, 2, 3], mockFn);
   });

   afterEach(() => {
      mockFn.mockClear();
   });

   test('check call length', () => {
      expect(mockFn.mock.calls.length).toBe(3);
   });

   test('check passed arguments', () => {
      expect(mockFn.mock.calls[0][0]).toBe(1);
      expect(mockFn.mock.calls[1][0]).toBe(2);
      expect(mockFn.mock.calls[2][0]).toBe(3);
   });

   test('check result', () => {
      expect(mockFn.mock.results[0].value).toBe(2);
      expect(mockFn.mock.results[1].value).toBe(4);
      expect(mockFn.mock.results[2].value).toBe(6);
   });

});
```

<br>
<br>
<br>

## **Mock Promises**
<br>
<br>

### **Resolve**
<br>

```typescript
test('check resolving promise', async () => {
    const asyncMock = jest.fn().mockResolvedValue('resolveValue');
    const result = await asyncMock();
    expect(result).toBe('resolveValue');
});
```

<br>
<br>

### **Reject**
<br>

```typescript
test('check rejected promise', async () => {
    expect.assertions(1);
    const asyncMock = jest.fn().mockRejectedValue('rejectionError');
    try {
        await asyncMock();
    } catch (error) {
        expect(error).toMatch('rejectionError');
    }
});
```

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