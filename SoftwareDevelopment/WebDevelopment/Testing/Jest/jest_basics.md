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
  - [**Setup And Teardown**](#setup-and-teardown)
  - [**Limit Execution To Single Test For Debugging Purposes**](#limit-execution-to-single-test-for-debugging-purposes)

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

## **Setup And Teardown**
<br>

```typescript
beforeAll(() => {
  // code to execute once at file opening
});


afterAll(() => {
  // code to execute once at file closing
})


beforeEach(() => {
  // code to execute before each test
});


afterEach(() => {
  // code to execute after each test
});
```

<br>

* `beforeEach` and `afterEach` can have two scopes:
  * top level
  * within `describe` blocks

<br>
<br>
<br>

## **Limit Execution To Single Test For Debugging Purposes**
<br>

* add `.only` for test that should be executed as only test in suite

```typescript
test.only('oly test that gets executed', () => { /* implementation */ });

test('test that gets skipped', () => { /* implementation */ });
```