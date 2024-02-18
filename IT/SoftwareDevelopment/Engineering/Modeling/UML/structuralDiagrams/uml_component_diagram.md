# **UML Component Diagram**
<br>

## **Table Of Contents**
<br>

- [**UML Component Diagram**](#uml-component-diagram)
  - [**Table Of Contents**](#table-of-contents)
  - [**Component**](#component)
  - [**Interfaces**](#interfaces)
    - [**Provided Interface**](#provided-interface)
    - [**Required Interface**](#required-interface)
  - [**Ports**](#ports)
  - [**System Boundary**](#system-boundary)
  - [**Nested Components**](#nested-components)
  - [**Relationships**](#relationships)
    - [**Association**](#association)
      - [**Assembly Association**](#assembly-association)
      - [**Delegation Association**](#delegation-association)
    - [**Generalization**](#generalization)
    - [**Aggregation**](#aggregation)
    - [**Composition**](#composition)
    - [**Dependency**](#dependency)

<br>
<br>
<br>
<br>

## **Component**

> A **component** represents a single hight-level funtionality within the system.

<br>

![Notation](./pictures/component-diagram/uml_component_diagram_component_notation.svg)

<br>
<br>
<br>
<br>

## **Interfaces**
<br>
<br>

### **Provided Interface**

> A **provided interface** is either
> - realized by the component itself or
> - provided by a public [port](#ports) of the component

<br>

![Provided Interface](./pictures/component-diagram/uml_component_diagram_provided_interface.svg)

<br>
<br>
<br>

### **Required Interface**

> A **required interface** is either
> - required by a _use_ dependency from the component itself
> - required by a public [port](#ports) of the component

<br>

![Required Interface](./pictures/component-diagram/uml_component_diagram_required_interface.svg)

<br>
<br>
<br>
<br>

## **Ports**

> A **port** allows the component to communicate with its environment and typically exposed [provided](#provided-interface) and/or [required](#required-interface) interfaces.

<br>

![Port](./pictures/component-diagram/uml_component_diagram_port.svg)

<br>

Examples:

![Examples](./pictures/component-diagram/uml_component_diagram_port_example.svg)

<br>
<br>
<br>
<br>

## **System Boundary**

> A **system boundary** represents the system that contains the components.

<br>

![System Boundary](./pictures/component-diagram/uml_component_diagram_system_boundary.svg)

<br>
<br>
<br>
<br>

## **Nested Components**

> **Nested components** are part of a super component or subsystem component.

<br>

![Nested Components](./pictures/component-diagram/uml_component_diagram_nested_components.svg)

<br>
<br>
<br>
<br>

## **Relationships**
<br>
<br>

### **Association**

> An **association** is a relationship between at least two components that enables communication between them.

<br>
<br>

#### **Assembly Association**

> An **assembly association** represents the usage of a service of at least one component by at least one other component.

<br>

![Assemby Association](./pictures/component-diagram/uml_component_diagram_assembly_association.svg)

<br>
<br>

#### **Delegation Association**

> A **delegation association** represents the realization of an external service of a composite component (via a port) by an internal component.

<br>

![Delegation Association](./pictures/component-diagram/uml_component_diagram_delegation_association.svg)

<br>
<br>
<br>

### **Generalization**

> A **generalization** is a relationship between a supercomponent and a subcomponent.

<br>

![Generalization](./pictures/component-diagram/uml_component_diagram_generalization.svg)

<br>
<br>
<br>

### **Aggregation**

> An **aggregation** is a relationship between a whole and its parts.  
> The parts can be included in multiple wholes or can exist without a whole.

<br>

![Aggregation](./pictures/component-diagram/uml_component_diagram_aggregation.svg)

<br>
<br>
<br>

### **Composition**

>A **composition** is a relationship between a whole and its parts.  
The parts can only be part of a single whole and can not exist outside of it.

<br>

![Composition](./pictures/component-diagram/uml_component_diagram_composition.svg)

<br>
<br>
<br>

### **Dependency**

> A **dependency** is a relationship between a client and a supplier component.  
The client component requires or depends on the supplier component for its specification or implementation.

<br>

![Dependency](./pictures/component-diagram/uml_component_diagram_dependency.svg)
