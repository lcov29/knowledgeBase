# **Jest Basics**
<br>

## **Table Of Contents**
<br>

- [**Jest Basics**](#jest-basics)
  - [**Table Of Contents**](#table-of-contents)
  - [**Installation**](#installation)
    - [**1. Install Jest**](#1-install-jest)
    - [**2. Install TypeScript Support**](#2-install-typescript-support)
    - [**3. Add Test Script To Package.json**](#3-add-test-script-to-packagejson)
  - [**General**](#general)
  - [**Matchers (Assertions)**](#matchers-assertions)
  - [**Structuring Tests**](#structuring-tests)
    - [**Setup And Teardown**](#setup-and-teardown)
      - [**beforeAll(fn, ?timeout)**](#beforeallfn-timeout)
      - [**beforeEach(fn, ?timeout)**](#beforeeachfn-timeout)
      - [**afterAll(fn, ?timeout)**](#afterallfn-timeout)
      - [**afterEach(fn, ?timeout)**](#aftereachfn-timeout)
    - [**Duplicate Test Suites With Different Data**](#duplicate-test-suites-with-different-data)
  - [**Manipulate Test / Block Execution For Debugging Purposes**](#manipulate-test--block-execution-for-debugging-purposes)
    - [**.only**](#only)
    - [**.skip**](#skip)

<br>
<br>
<br>

## **Installation**
<br>
<br>

### **1. Install Jest**
<br>

```bash
npm install jest --save-dev
```

<br>
<br>

### **2. Install TypeScript Support**
<br>

```bash
npm install ts-jest @types/jest --save-dev
```

```bash
npx ts-jest config:init
```

<br>
<br>

### **3. Add Test Script To Package.json**
<br>

`package.json`:

```json
"scripts": {
    "test": "jest"
}
```

<br>
<br>
<br>

## **General**
<br>

* test suite name: `fileName.test.ts`

<br>

```typescript
import { functionToBeTested } from './fileName.ts';

description('test block description', () => {

  test('test #1 description', () => {
      const arrangedData = { /* some Data */ };
      expect(functionToBeTested(arrangedData)).toBe('expectedResult');
  });

  test('test #2 description', () => {
      const arrangedData = { /* some Data */ };
      expect(functionToBeTested(arrangedData)).toBe('expectedResult');
  });

});
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

See [jest matchers](./jest_matchers.md)

<br>
<br>
<br>

## **Structuring Tests**
<br>

```javascript
describe('test block description', () => {

  it('test1 description', () => { /* test description */ });

  it('test2 description', () => { /* test description */ });

});
```

<br>
<br>

### **Setup And Teardown**
<br>
<br>

#### **beforeAll(fn, ?timeout)**
<br>

```javascript
beforeAll(() => { /* implementation */ });
```
- executes before **any** test within its scope
- scope: top level or describe block

<br>
<br>

#### **beforeEach(fn, ?timeout)**
<br>

```javascript
beforeEach(() => { /* implementation */ });
```
- executes before each test in within its scope
- scope: top level or describe block

<br>
<br>

#### **afterAll(fn, ?timeout)**
<br>

```javascript
afterAll(() => { /* implementation */ })
```
- executes after **all** tests within its scope
- scope: top level or describe block

<br>
<br>

#### **afterEach(fn, ?timeout)**
<br>

```javascript
afterEach(() => { /* implementation */ })
```
- executes after **each** test within its scope
- scope: top level or describe block

<br>
<br>

### **Duplicate Test Suites With Different Data**
<br>

```javascript
describe.each(testdata[][])(testTitle, fn, ?timeout)
```

<br>

Example:

Lets assume we have the following test suite:

```javascript
describe('someFunction', () => {

  describe('when input is a positive number', () => {
    it('does A', () => { expect(someFunction(1)).toEqual('result') });
    it('does B', () => { expect(someFunction(2)).toEqual('result') });
    it('does C', () => { expect(someFunction(3)).toEqual('result') });
  })

  describe('when input is a negative number', () => {
    it('does A', () => { expect(someFunction(4)).toEqual('result') });
    it('does B', () => { expect(someFunction(5)).toEqual('result') });
    it('does C', () => { expect(someFunction(6)).toEqual('result') });
  })

  describe('when input is zero', () => {
    it('does A', () => { expect(someFunction(7)).toEqual('result') });
    it('does B', () => { expect(someFunction(8)).toEqual('result') });
    it('does C', () => { expect(someFunction(9)).toEqual('result') });
  })
})
```

<br>

We can reduce the duplicate test implementations by using `describe.each()`:

<br>

```javascript
describe('someFunction', () => {

  describe.each([
    ['a positive number', 1, 2, 3, 'result'],
    ['a negative number', 4, 5, 6, 'result'],
    ['zero', 7, 8, 9, 'result'],
  ])('when input is %i', (input1, input2, input3, expectedResult) => {
    it('does A', () => { expect(someFunction(input1)).toEqual(expectedResult) });
    it('does B', () => { expect(someFunction(input2)).toEqual(expectedResult) });
    it('does C', () => { expect(someFunction(input3)).toEqual(expectedResult) });
  })

})
```

<br>
<br>

## **Manipulate Test / Block Execution For Debugging Purposes**
<br>
<br>

### **.only**
<br>

```javascript
describe.only('test block description', () => { /* implementaiton */ })
```
- executes only this block in entire file

<br>

```javascript
it('test1 description', () => { /* test description */ });
it.only('test2 description', () => { /* test description */ });
```
- executes only this test in entire file

<br>
<br>

### **.skip**
<br>

```javascript
describe.skip('test block description', () => { /* implementaiton */ })
```
- executes every block in entire file except this one

<br>

```javascript
it('test1 description', () => { /* test description */ });
it.skip('test2 description', () => { /* test description */ });
```
- executes every test in entire file except this one
