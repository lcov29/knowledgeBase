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
    - [**Import**](#import)
    - [**Export**](#export)

<br>
<br>
<br>

## **General**
<br>

NodeJS
* is a runtime environment for JavaScript
* uses google´s [v8 engine](https://v8.dev/)
* runs on a server (and therefore can not use browser features)
* is asynchronous

<br>
<br>
<br>

## **Installation**
<br>

Add section

<br>
<br>
<br>

## **Command Line**
<br>
<br>

## **Open Node Terminal**
<br>

```bash
node
```

<br>
<br>

## **Execute JavaScript Files**
<br>

```bash
node jsFile
```

<br>
<br>
<br>

## **Modules**
<br>

NodeJS uses [CommonJS modules](../JavaScript/../../JavaScript/javascript_modules.md#commonjs).

<br>
<br>

### **Import**
<br>

```javascript
const foo = require('moduleName')
```

<br>
<br>

### **Export**
<br>

```javascript
modules.export = { function1, function2, value3 };

// Alternative
exports.functionName = function(param) {/* Implementation */};
```