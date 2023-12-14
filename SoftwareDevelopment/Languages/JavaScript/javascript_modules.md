# **JavaScript Modules**
<br>

## **Table Of Contents**
<br>

- [**JavaScript Modules**](#javascript-modules)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Optional Module File Format**](#optional-module-file-format)
    - [**Advantages**](#advantages)
    - [**Disadvantages**](#disadvantages)
    - [**Load Module To HTML**](#load-module-to-html)
  - [**Name Space Design Pattern**](#name-space-design-pattern)
  - [**Revealing Module Desing Pattern**](#revealing-module-desing-pattern)
  - [**Module Augmentation**](#module-augmentation)
  - [**Ways To Define Modules In JavaScript**](#ways-to-define-modules-in-javascript)
    - [**CommonJS**](#commonjs)
      - [**General Idea**](#general-idea)
      - [**Loose Augmentation**](#loose-augmentation)
      - [**Tight Augmentation**](#tight-augmentation)
    - [**AMD**](#amd)
  - [**Native Module**](#native-module)
    - [**Export Module Elements By Name (named export)**](#export-module-elements-by-name-named-export)
      - [**Variant 1: Export Keyword In Front Of Elements**](#variant-1-export-keyword-in-front-of-elements)
      - [**Variant 2: Export Statement At End Of File**](#variant-2-export-statement-at-end-of-file)
    - [**Export Module Elements By Default**](#export-module-elements-by-default)
    - [**Export Module Elements Under New Name**](#export-module-elements-under-new-name)
    - [**Importing Named Elements**](#importing-named-elements)
    - [**Import Default Element**](#import-default-element)
    - [**Import Module Names Under New Name**](#import-module-names-under-new-name)
    - [**Import All Module Elements Into A Module Object**](#import-all-module-elements-into-a-module-object)
    - [**Dynamic Module Loading**](#dynamic-module-loading)
    - [**Top Level Await**](#top-level-await)
    - [**Isomorphic Modules**](#isomorphic-modules)
      - [**Option1**](#option1)
      - [**Option 2**](#option-2)
      - [**Option 3**](#option-3)
    - [**Aggregating Modules**](#aggregating-modules)

<br>
<br>
<br>
<br>

## **General**
<br>

* modules are script files that group components (functions, objects, variables) for external use
* modules prevent naming conflicts
* modules structure code base in reusable parts

<br>
<br>
<br>
<br>

## **Optional Module File Format**
<br>

You can use the special file format _.mjs_ for JavaScript modules.

<br>
<br>

### **Advantages**
<br>

* explicitly states that it is a module file
* ensures file is parsed as a module by runtimes like node.js
* modules are always in strict mode without explicitly stating it
* modules are deferred automatically; there is no need for the _defer_ property
* executed only once
* exported elements are only imported into the scope of the importing file, NOT the global scope

<br>
<br>

### **Disadvantages**
<br>

* server has to serve file with _Content-Type_ header and MIME type _text/javascript_
* module can not be executed locally due to CORS errors
		
<br>
<br>
<br>
<br>

### **Load Module To HTML**
<br>

```html
<script type="module" src="module/Path/Name"></script>
```

<br>
<br>
<br>
<br>

## **Name Space Design Pattern**
<br>

* group elements into a global object (container) to prevent naming conflicts

<br>

```javascript
// prevent overriding existing object globalContainer
var globalContainer = globalContainer || {
   variable: 2,
   foo: function() { /* implementation */ }
};            
```

<br>
<br>
<br>
<br>

## **Revealing Module Desing Pattern**
<br>

* based on name space design pattern

* General Idea:
  * define context via IIFE to hide module variables and functions for external users
  * IIFE returns object containing attributes and functions for external users of the module
  * export object has access to the inner elements of the module thanks to the closure

<br>

```javascript
var moduleName = moduleName || (function() {

   const privateVariable = 'foo';

   const privateMethod = function() {
     return privateVariable + 'Bar';
   };

   const publicFunction = function() {
     return privateMethod() + privateVariable;
   }

   return { publicFunction };

})();

moduleName.publicFunction();        // 'fooBarfoo'
```

<br>

```javascript
// import module into another module

var moduleName = moduleName || (function(importModuleName) {
   /* module definition */
}(importModuleName)
```

<br>
<br>
<br>
<br>

## **Module Augmentation**
<br>

Distribute module code across multiple source files.

General disadvantage: functions defined in module parts do not have access to private variables in other module part files.

<br>
<br>
<br>
<br>

## **Ways To Define Modules In JavaScript**
<br>

1. CommonJS (server side)
2. **A**synchronous **M**odule **D**efinition (AMD, client side)
3. Native Modules (both client and server side)

<br>
<br>
<br>
<br>

### **CommonJS**
<br>
<br>

#### **General Idea**
<br>

1. set module itself as argument of IIFE
2. add properties and functions
3. return module itself

<br>
<br>
<br>

#### **Loose Augmentation**
<br>

* argument can be an empty object if file is loaded as first source file
* advantage: 
  * script modules can be loaded asynchronous
  * loading order does not matter

<br>

File A:
```javascript
var moduleName = moduleName || (function(moduleName) {

   /* add properties and functions */

   moduleName.functionName = function() {
      /* implementation */
   }

   return moduleName;

})(moduleName || {});
```

<br>
<br>
<br>

#### **Tight Augmentation**
<br>

* assumption: module already exists (at least one source file already loaded)
* advantage
  * all modules can be treated as loaded
* disadvantage
  * assumes a loading order

<br>

File B:
```javascript
var moduleName = (function(moduleName) {

   /* add properties and functions */

   moduleName.functionName = function() {
     /* implementation */
   }

   return moduleName;

})(moduleName);
```

<br>
<br>
<br>
<br>

### **AMD**
<br>
<br>

* definition of modules that enable asynchronous loading (clientside)
* implemented for example by require.js

<br>

```javascript
// define module

define(
    'moduleName',
    ['ImportedModuleNames'],
    function ('moduleName') {
        /* function and property definitions */
    }
    return module;
)


// import module
require(['moduleNames'], function('moduleName) {
    moduleName.functionName();
});
```

<br>
<br>
<br>
<br>

## **Native Module**
<br>
<br>
<br>

### **Export Module Elements By Name (named export)**
<br>

* only top level elements are exportable -> can not export inside a function
* exportable: properties, functions and classes

<br>
<br>
<br>
	
#### **Variant 1: Export Keyword In Front Of Elements**
<br>
		
```javascript
export const propertyName = '';

export function functionName(param) { /* implementation */ }
```

<br>
<br>
<br>

#### **Variant 2: Export Statement At End Of File**
<br>

```javascript
/* module definition */

export { elementName1, elementName2 };
```

<br>
<br>
<br>

### **Export Module Elements By Default**
<br>

* define function or class exported by default

<br>

```javascript
export default function functionName(param) { /* implementation */ }
```

<br>
<br>
<br>

### **Export Module Elements Under New Name**
<br>

```javascript
export { originalElementName1 as newElementName1,
         originalElementName2 as newElementName2 };
```

<br>
<br>
<br>

### **Importing Named Elements**
<br>

```javascript
import { elementName1, elementName2 } from './module/Path/Name';
```

<br>
<br>
<br>

### **Import Default Element**
<br>

```javascript
import defaultElementName from './module/path/name';
```

<br>
<br>
<br>

### **Import Module Names Under New Name**
<br>
	
```javascript
import { originalModuleElementName1 as newModuleElementName1,
         originalModuleElementName2 as newModuleElementName2 } from './module/path/name';
```

<br>
<br>
<br>

### **Import All Module Elements Into A Module Object**
<br>
	
```javascript
import * as moduleObjectName from './modules/module.js';
```

<br>
<br>
<br>

### **Dynamic Module Loading**
<br>

* allows modules to be loaded when they are needed, not up front
* use import() function that returns a promise fulfilling with a module object

<br>

```javascript
import('./module/path/name')
  .then((module) => {
    /* work with loaded module */
  });
```
	
<br>
<br>
<br>

### **Top Level Await**
<br>

* _await_ keyword can be used within modules
* allows modules to act like asynchronous function
  * code can be evaluated before use in parent modules without blocking loading of sibling modules

<br>

```javascript
const data = fetch('../data.json');
  .then(response => response.json());

export default await data;
```

<br>
<br>
<br>

### **Isomorphic Modules**
<br>

* modules can access global scope -> can effect result
* isomorphic = show the same behavior everytime
	
<br>
<br>

#### **Option1**
<br>

Seperate modules core (pure JavaScript Logic) and binding (access global context -> write specific modules for specific run environments).

<br>
<br>

#### **Option 2**
<br>

Check existence of global element before using it.

<br>
<br>

#### **Option 3**
<br> 

Provide fallback for features via polyfill

<br>
<br>
<br>

### **Aggregating Modules**
<br>

Top Level Module
```javascript
export * from './submodule1/path/name';
export * from './submodule2/path/name';
```

* exports in top level file are only passed through -> you can not use any functions of submodules




