# **TypeScript Project References**
<br>

## **Table Of Contents**
<br>

- [**TypeScript Project References**](#typescript-project-references)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**1. Split Project Into Folders With Separate _tsconfig.json_**](#1-split-project-into-folders-with-separate-tsconfigjson)
    - [**Composite**](#composite)
    - [**declarationMap**](#declarationmap)
    - [**References**](#references)
  - [**2. Create Main _tsconfig.json_**](#2-create-main-tsconfigjson)
  - [**3. Build Project**](#3-build-project)

<br>
<br>
<br>

## **General**
<br>

* separate existing project into multiple projects (directories with _tsconfig.json_)
* improve compile time
* reduce memory usage of editor
* logical grouping of components

<br>
<br>
<br>

## **1. Split Project Into Folders With Separate _tsconfig.json_**
<br>

_tsconfig.json_

```json
{
    "compilerOptions": {
        "composite": true,
        "declaration": true,
        "declarationMap": true,
        "rootDir": "."
    },

    "include": ["./**/*.ts"],

    "references": [
        {"path": "../myReferencedProject", "prepend": true}
    ]
}
```

<br>
<br>

### **Composite**
* enable quick determination of output location

<br>
<br>

### **declarationMap**
* enable creation of declarationMaps to improve mapping between JavaScript and TypeScript for debugging

<br>
<br>

### **References**
* _path_ references directory with separate _tsconfig.json_

<br>
<br>
<br>

## **2. Create Main _tsconfig.json_**
<br>

* needs to reference all subprojects that are not referenced my other subprojects

```json
{
    "files": [],
    "references": [
        {"path": "./subproject1"},
        {"path": "./subproject2"}
    ]
}
```

<br>
<br>
<br>

## **3. Build Project**
<br>

```bash
tsc --build
```