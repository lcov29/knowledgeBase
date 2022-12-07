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

* we group our tests in separate files `fileName.test.ts` called test suites 
* each test suite contains at least one test. 
* each test consists of three steps:

<br>

|Step    |Description                                |
|:-------|:------------------------------------------|
|Arrange |set up test resources                      |
|Act     |execute test and get result                |
|Assert  |compare actual result with expected result |

<br>

```typescript
import { functionToBeTested } from './fileName.ts';

test('test description', () => {
    const arrangedData = { /* some Data */ };
    expect(functionToBeTested(arrangedData)).toBe('expectedResult');
});
```

<br>
<br>
<br>

