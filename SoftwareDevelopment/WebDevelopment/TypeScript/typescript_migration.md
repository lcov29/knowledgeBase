# **TypeScript Migration**
<br>

## **Table Of Contents**
<br>

- [**TypeScript Migration**](#typescript-migration)
  - [**Table Of Contents**](#table-of-contents)
  - [**1. Add TypeScript Configuration**](#1-add-typescript-configuration)
  - [**2. Activate Typechecking For JavaScript Files (Optional)**](#2-activate-typechecking-for-javascript-files-optional)
    - [**Explicitly Activate Typechecking For Specific Files**](#explicitly-activate-typechecking-for-specific-files)
    - [**Explicitly Deactivate Typechecking For Specific Files**](#explicitly-deactivate-typechecking-for-specific-files)
  - [**3. Add JSDOC Annotations (Optional)**](#3-add-jsdoc-annotations-optional)
  - [**4. Change File Extensions .js to .ts**](#4-change-file-extensions-js-to-ts)
  - [**5. Activate Strict Mode**](#5-activate-strict-mode)

<br>
<br>
<br>

## **1. Add TypeScript Configuration**
<br>

_tsconfig.json_

```json
{
    "compilerOptions": {
        "allowJs": true
    }
}
```
* enables javascript code for current project

<br>
<br>
<br>

## **2. Activate Typechecking For JavaScript Files (Optional)**
<br>

_tsconfig.json_

```json
{
    "compilerOptions": {
        "allowJs": true,
        "checkJs": true
    }
}
```

<br>
<br>

### **Explicitly Activate Typechecking For Specific Files**
<br>

_someFile.js_

```javascript
// @ts-check


// javascript code...
```

<br>
<br>

### **Explicitly Deactivate Typechecking For Specific Files**
<br>

_someFile.js_

```javascript
// @ts-nocheck


// javascript code...
```

<br>
<br>
<br>

## **3. Add JSDOC Annotations (Optional)**
<br>

```javascript
/**
 * @param {type} <paramName> - <description>
 * @returns {type} <description>
*/
```

_someFile.js_

```javascript
/**
 * @param {number} x - first parameter 
 * @param {string} y - second parameter
 * @returns {boolean} - return value
*/
function foo(x,y) {
    // implementation
}
```

<br>
<br>
<br>

## **4. Change File Extensions .js to .ts**
<br>

Tip: You can use a temporary type alias like `TODO` for the type `any`.

<br>
<br>
<br>

## **5. Activate Strict Mode**
<br>

_tsconfig.json_

```json
{
    "compilerOptions": {
        "allowJs": false,
        "checkJs": false
    }
}
```