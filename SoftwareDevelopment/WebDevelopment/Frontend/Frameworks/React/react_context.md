# **React Context**
<br>

## **Table Of Contents**
<br>

- [**React Context**](#react-context)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Usage**](#usage)
    - [**1. Create Context Object**](#1-create-context-object)
    - [**2. Add Context Provider**](#2-add-context-provider)
    - [**3. Mark All Component Classes That Should Use Context**](#3-mark-all-component-classes-that-should-use-context)
    - [**Optional: Add Context Consumer**](#optional-add-context-consumer)
  - [**Example**](#example)

<br>
<br>
<br>

## **General**
<br>

We use `context` to share data with many different components without passing it to every component of the tree via `props`.


<br>
<br>
<br>

## **Usage**
<br>
<br>

### **1. Create Context Object**
<br>

```javascript
const ContextName = React.createContext(defaultValue);
ContextName.displayName = 'SomeName';   // optional for ReactDevTools
```

<br>
<br>

### **2. Add Context Provider**
<br>

```javascript
<ContextName.Provider value={/* context value */}>
    <ChildComponent1 />
    <ChildComponent2 />
</ContextName.Provider>
```
* allows setting the value of a context for all its descendants

<br>
<br>

### **3. Mark All Component Classes That Should Use Context**
<br>

```javascript
class ComponentClassName extends React.Component {
    render() {
        const currentContextValue = this.context;
        // render component using currrentContextValue
    }
}

ComponentClassName.contextType = contextName;
```
* allows component to access value of context set by nearest provider via `this.context`

<br>
<br>

### **Optional: Add Context Consumer**
<br>

```javascript
<ContextName.Consumer>
    {value => /* render react element */}
</ContextName.Consumer>
```
* allows access to context value of closest provider from descending function component
* requires function as child: contextValue => react element

<br>
<br>
<br>

## **Example**
<br>
<br>

Context.js

```javascript
import React from "react";

const data = [
    {firstName: 'John', lastName: 'Doe', age: 35},
    {firstName: 'Jane', lastName: 'Doe', age: 46},
    {firstName: 'Xiu', lastName: 'Jye', age: 25}
];

const PersonContext = React.createContext(data[0]);
PersonContext.displayName = 'DisplayNamePersonContext';

export {data, PersonContext};
```

<br>
<br>

TableRow.js

```javascript
import { Component } from 'react';
import { data, PersonContext } from './Context';


class TableRow extends Component {
    render() {
        const {firstName, lastName, age} = this.context;
        return(
            <tr>
                <td>{firstName}</td>
                <td>{lastName}</td>
                <td>{age}</td>
            </tr>
        );
    }
}

TableRow.contextType = PersonContext;

export default TableRow;
```

<br>
<br>

```javascript
import { Component } from 'react';
import { PersonContext, data } from './Context';
import TableRow from './TableRow';


class DemoTable extends Component {
    render() {
        return(
            <table>
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                    </tr>
                </thead>
                <tbody>
                    <PersonContext.Provider value={data[1]}>
                        <TableRow />
                        <TableRow />
                        <TableRow />
                        <TableRow />
                        <TableRow />
                    </PersonContext.Provider>
                </tbody>
            </table>
        );
    }
}

export default DemoTable;
```