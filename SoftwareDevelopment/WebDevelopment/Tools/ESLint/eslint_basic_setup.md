# **ESLint**
<br>

## **Table Of Contents**
<br>

- [**ESLint**](#eslint)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Installation With TypeScript Support And Airbnb Style Guide Rules**](#installation-with-typescript-support-and-airbnb-style-guide-rules)
    - [**1. Create package.json**](#1-create-packagejson)
    - [**2. Install TypeScript**](#2-install-typescript)
    - [**3. Install ESLint**](#3-install-eslint)
    - [**4. Install TypeScript Support For ESLint**](#4-install-typescript-support-for-eslint)
    - [**5. Install Airbnb Configuration For ESLint**](#5-install-airbnb-configuration-for-eslint)

<br>
<br>
<br>

## **General**
<br>

ESLint

* is a configurable Linter for JavaScript
* helps to identify 
  * runtime bugs
  * styling issues
  * violations of best practices

<br>
<br>
<br>

## **Installation With TypeScript Support And Airbnb Style Guide Rules**
<br>
<br>

### **1. Create package.json**
<br>

```bash
npm init
```

<br>
<br>

### **2. Install TypeScript**
<br>

```bash
npm install typescript --save-dev

npx tsc --init    # create tsconfig.json
```

Configure _tsconfig.json_:

* target
* module
* rootDir
* outDir

<br>
<br>

### **3. Install ESLint**
<br>

```bash
npm init @eslint/config
```

Make sure to select the following options in the dialog:
* add json format
* no usage of typescript

<br>

Result: _eslintrc.json_

<br>
<br>

### **4. Install TypeScript Support For ESLint**
<br>

```bash
npm install @typescript-eslint/parser @typescript-eslint/eslint-plugin --save-dev
```

<br>

Add to _eslintrc.json_:

```json
"overrides": [
  {
    "files": ["*.ts", "*.tsx"],
    "parser": "@typescript-eslint/parser",
    "plugins": ["@typescript-eslint"]
  }
],
    
"parserOptions": {
      "project": "./tsconfig.json"
}
```

<br>
<br>

### **5. Install Airbnb Configuration For ESLint**
<br>

Install ES config:
```bash
npx install-peerdeps --dev eslint-config-airbnb
```

<br>

Install TS config:
```bash
npm install eslint-config-airbnb-typescript --save-dev
```

<br>

Add to _eslintrc.json_:

```json
"extends": [
  "airbnb",
  "airbnb/hooks",
  "airbnb-typescript"
],
```