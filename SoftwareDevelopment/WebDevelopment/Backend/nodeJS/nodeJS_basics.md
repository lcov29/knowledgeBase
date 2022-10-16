# **NodeJS Basics**
<br>

## **Table Of Contents**
<br>

- [**NodeJS Basics**](#nodejs-basics)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Installation**](#installation)
  - [**Command Line**](#command-line)
    - [**Open Node Terminal**](#open-node-terminal)
    - [**Execute JavaScript Files**](#execute-javascript-files)
  - [**Modules**](#modules)
    - [**CommonJS**](#commonjs)
      - [**Import**](#import)
      - [**Export**](#export)
    - [**ES6 Modules**](#es6-modules)
      - [**Import**](#import-1)
      - [**Export**](#export-1)

<br>
<br>
<br>

## **General**
<br>

NodeJS
* is a runtime environment for JavaScript
* uses google´s [v8 engine](https://v8.dev/)
* runs on a server (and therefore can not use browser features)
* is event-driven
* user code runs on a single thread
* prefers asynchronous programming

<br>
<br>
<br>

## **Installation**
<br>

Node can be installed via the node version manager (_nvm_).

_nvm_ offers allows us to quickly install and switch between different version of nodeJS. It can be downloaded [here](https://github.com/nvm-sh/nvm).

```bash
nvm --version
nvm install-latest-npm

nvm install <version>
nvm use <version>          # change to installed <version>
nvm ls                     # list all installed versions
```

<br>
<br>
<br>

## **Command Line**
<br>
<br>

### **Open Node Terminal**
<br>

```bash
node
```
* exit node terminal with _.exit_

<br>
<br>

### **Execute JavaScript Files**
<br>

```bash
node jsFile
```

<br>
<br>
<br>

## **Modules**
<br>

NodeJS can use both [CommonJS modules](../../JavaScript/javascript_modules.md#commonjs) and [ES6 Modules](../../JavaScript/javascript_modules.md#native-module).

<br>

Loading priority of modules:
<br>

1. integrated node.js modules
2. npm modules
3. local modules

<br>
<br>

### **CommonJS**
<br>
<br>

#### **Import**
<br>

```javascript
const foo = require('moduleName')
```

<br>
<br>

#### **Export**
<br>

```javascript
module.exports = { function1, function2, value3 };

// Alternative
exports.functionName = function(param) {/* Implementation */};
```

<br>
<br>

### **ES6 Modules**
<br>
<br>

#### **Import**
<br>

```javascript
import foo from 'moduleName';

import { function1, function2 } from 'moduleName';
```

<br>
<br>

#### **Export**
<br>

```javascript
export const variableName = '';

export function foo() { /* implementation */ };

export { function1, function2 };
```