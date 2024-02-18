# **UML Package Diagram**
<br>

## **Table Of Contents**
<br>

- [**UML Package Diagram**](#uml-package-diagram)
  - [**Table Of Contents**](#table-of-contents)
  - [**Package**](#package)
  - [**Visibility**](#visibility)
  - [**Relationships**](#relationships)
    - [**Import**](#import)
    - [**Access**](#access)

<br>
<br>
<br>
<br>

## **Package**

> A **package** is a namespace that groups semantically related elements.  
> Every element within the system can only be part of one package.

<br>

![Package](./pictures/package-diagram/uml_package_diagram_example1.svg)

<br>

![Nested Packages](./pictures/package-diagram/uml_package_diagram_example2.svg)

<br>

> **Attention:** Elements of subpackages are not automatically visible to superpackages! Use [`import`](#import) dependency.

<br>
<br>
<br>
<br>

## **Visibility**

|**Visibility Flag** |Meaning   |Accessible From                              |
|:------------------:|:---------|:--------------------------------------------|
|`+`                 |public    |inside and outside of the package            |
|`-`                 |private   |inside of the package                        |
|`~`                 |package   |inside of the package and in all subpackages |

<br>
<br>
<br>
<br>

## **Relationships**
<br>
<br>

### **Import**

> The **import** relationship imports a specific or all elements of a package into a namespace and **makes them visible to the outside**.

<br>

![import relationship](./pictures/package-diagram/uml_package_diagram_import.svg)

<br>
<br>
<br>

### **Access**

> The **access** relationship imports a specific or all elements of a package into a namespace and **does not make them visible to the outside**.

<br>

![access relationship](./pictures/package-diagram/uml_package_diagram_access.svg)


