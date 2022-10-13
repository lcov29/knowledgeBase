## **Node Package Manager (NPM)**
<br>

## **Table Of Contents**
<br>

- [**Node Package Manager (NPM)**](#node-package-manager-npm)
- [**Table Of Contents**](#table-of-contents)
- [**General**](#general)
  - [**Initialize NPM Package**](#initialize-npm-package)
  - [**Installing Modules**](#installing-modules)
    - [**Global Install**](#global-install)
- [**Local Install**](#local-install)
  - [**Update Packages**](#update-packages)
  - [**Uninstall Packages**](#uninstall-packages)
    - [**Uninstall Global Package**](#uninstall-global-package)
    - [**Uninstall Production Package**](#uninstall-production-package)
    - [**Uninstall Developer Package**](#uninstall-developer-package)

<br>
<br>
<br>

## **General**
<br>

* [Website](https://www.npmjs.com)

<br>
<br>
<br>

### **Initialize NPM Package**
<br>

* Generates _package.json_ with all information about the package

<br>

```bash
npm init 
```

<br>
<br>
<br>

### **Installing Modules**
<br>
<br>

#### **Global Install**
<br>

```bash
npm install <moduleName>[@<version>] -g
```

<br>
<br>

## **Local Install**
<br>

```bash
npm install <moduleName>[@<version>]
```

<br>

```bash
npm install <moduleName>[@<version>] -D
```

_-D_ adds installed package to the dev dependecies in _package.json_

<br>
<br>
<br>

### **Update Packages**
<br>

* Update packages according to their update policy defined in package.json

<br>

```bash
npm update
```

<br>
<br>
<br>

### **Uninstall Packages**
<br>
<br>

#### **Uninstall Global Package**
<br>

```bash
npm uninstall <packageName> -g
```

<br>
<br>

#### **Uninstall Production Package**
<br>

```bash
npm uninstall <packageName>
```

<br>
<br>

#### **Uninstall Developer Package**
<br>

```bash
npm uninstall <packageName> -D
```





<!-- 

Semantic Versioning Numbers
X.Y.Z

X = Major Version
Y = Minor Version
Z = Patch Version

Modifier:

X.Y.Z           use exactly this version
^X.Y.Z          allow update of minor and patch version
~X.Y.Z          allow update of patch version
*               always use newest version

-->