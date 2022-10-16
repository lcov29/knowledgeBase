## **Node Package Manager (NPM)**
<br>

## **Table Of Contents**
<br>

- [**Node Package Manager (NPM)**](#node-package-manager-npm)
- [**Table Of Contents**](#table-of-contents)
- [**General**](#general)
- [**Initialize NPM Module Support**](#initialize-npm-module-support)
- [**Installing Modules**](#installing-modules)
  - [**Install Module globally**](#install-module-globally)
  - [**Install Production Module locally**](#install-production-module-locally)
  - [**Install Developer Module locally**](#install-developer-module-locally)
  - [**Install Options**](#install-options)
- [**Update Module**](#update-module)
- [**Uninstall Modules**](#uninstall-modules)
  - [**Uninstall Global Module**](#uninstall-global-module)
  - [**Uninstall Production Module**](#uninstall-production-module)
  - [**Uninstall Developer Module**](#uninstall-developer-module)
- [**package.json**](#packagejson)
  - [**Version Handling**](#version-handling)

<br>
<br>
<br>

## **General**
<br>

Node Package Manager (NPM) is a repository and command line interface to add external modules to your project.

We can search for external modules on the [npm website](https://www.npmjs.com). All external dependencies in our project are stored in the file _package.json_.

Every project stores its external modules separately in the directory _node\_modules_.

Projects do not share the installation of their modules.

<br>
<br>
<br>

## **Initialize NPM Module Support**
<br>

```bash
npm init 
```
* Generates _package.json_ with all information about the package

<br>
<br>
<br>

## **Installing Modules**
<br>
<br>

### **Install Module globally**
<br>

```bash
npm install <moduleName>[@<version>] -g
```

<br>
<br>

### **Install Production Module locally**
<br>

```bash
npm install <moduleName>[@<version>]
```
* Modules are installed to the local _node\_modules_ directory

<br>
<br>

### **Install Developer Module locally**
<br>

```bash
npm install <moduleName>[@<version>] -D
```
* Modules are installed to the local _node\_modules_ directory
* _-D_ adds installed package to the dev dependecies in _package.json_

<br>
<br>

### **Install Options**
<br>

```bash
npm install --save --save-exact <moduleName>[@<version>]
```
* install module and save **exact** version to _package.json_

<br>
<br>
<br>

## **Update Module**
<br>

```bash
npm update
```
* Update modules according to their update policy defined in package.json

<br>
<br>
<br>

## **Uninstall Modules**
<br>
<br>

### **Uninstall Global Module**
<br>

```bash
npm uninstall <moduleName> -g
```

<br>
<br>

### **Uninstall Production Module**
<br>

```bash
npm uninstall <moduleName>
```

<br>
<br>

### **Uninstall Developer Module**
<br>

```bash
npm uninstall <moduleName> -D
```

<br>
<br>
<br>

## **package.json**
<br>

The _package.json_ file of a project contains all dependencies from npm modules. It is created automatically by running [_git init_](#initialize-npm-module-support) or manually. The required
minimum information is the project´s _name_ and _version_

Every module is described by the modules _name_ and _version_.

The _package.json_ file should be included in _.gitignore_.

<br>

```json
{
  "name": "application name",
  "version": "0.1.0",
  "dependencies": {
    "express": "^4.15.0"
  }
}
```

<br>
<br>

### **Version Handling**
<br>

The version of modules is described according to the semantic versioning standard:

```
<major version>.<minor version>.<patch version>
```

<br>

|Version |Description                                             |
|:-------|:-------------------------------------------------------|
|Major   |new features and optional bugfixes, breaking changes    |
|Minor   |new features and optional bugfixes, no breaking changes |
|Patch   |Bugfixes, no breaking changes                           |

<br>

In the [_package.json](#packagejson) we can define the following modifier for the used version of an external module:

|Version Modifier |Description
|:---------------:|:--------------
|*                |use newest available version
|1.2.3            |use exactly version 1.2.3
|^1.2.3           |allow update of minor and patch version
|~1.2.3           |allow update of patch version

<br>

**NOTE:**
<br>
 Adding modifiers assumes that the semantic versioning of the external modules are correct. Breaking changes can still occur, for example when your application relies on a bug in the external module that is being fixed by a patch. It is recommended to use version numbers without modifiers and ensure the regular update of your dependencies via automatic bots, e.g. _dependabot_.