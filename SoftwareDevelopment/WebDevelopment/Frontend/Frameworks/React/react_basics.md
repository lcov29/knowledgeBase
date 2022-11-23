# **React Basics**
<br>

## **Table Of Contents**
<br>

- [**React Basics**](#react-basics)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Installation**](#installation)
  - [**JSX**](#jsx)
    - [**General**](#general-1)
    - [**Example**](#example)
    - [**Key Differences To HTML**](#key-differences-to-html)
  - [**Components**](#components)
    - [**General**](#general-2)
    - [**Component Types**](#component-types)
      - [**Class Component**](#class-component)
      - [**Function Component**](#function-component)
    - [**Rendering Components**](#rendering-components)
    - [**Pass Data To Components**](#pass-data-to-components)
      - [**Pass Data To Class Component**](#pass-data-to-class-component)
        - [**Example**](#example-1)
      - [**Pass Data To Function Component**](#pass-data-to-function-component)
        - [**Example**](#example-2)
      - [**Call Component With Data**](#call-component-with-data)
        - [**Example**](#example-3)
    - [**Component State**](#component-state)

<br>
<br>
<br>

## **General**
<br>

* used for building user interfaces
* emphasizes the use of components 

<br>
<br>
<br>

## **Installation**
<br>

See [React Installation](./react_installation.md)

<br>
<br>
<br>

## **JSX**
<br>
<br>

### **General**
<br>

* JSX = **J**ava**S**cript + **X**ML
* allows creation of custom tags that can incorporate JavaScript expressions
* internally translates to a call of `React.createElement()`, so usage is optional
* all embedded values in JSX are escaped by the React DOM

<br>

```
<tagname attribute1Name={js expression}>
  {js expression}
</tagname>
```

<br>
<br>

### **Example**
<br>

```javascript
<button onClick={ () => {window.alert('onClick');} }>
  {`Button #${1+3}`}
</button>
```
* renders a button with text `Button #4` and specified onclick event

<br>

This JSX internally translates to:

```javascript
React.createElement(
  "button", 
  {onClick: () => { window.alert('onClick'); }},
  `Button #${1 + 5}`
)
```

<br>
<br>

### **Key Differences To HTML**
<br>

* use camelCase
* use attribute `className` instead of `class` for css classes
* always end self closing tags with a slash: `<img />`

<br>
<br>
<br>

## **Components**
<br>
<br>

### **General**
<br>

* components = custom reusable HTML elements with state, logic and styling
* react applications usually consist of multiple different components that are bundled into an App component

<br>
<br>

### **Component Types**
<br>
<br>

#### **Class Component**
<br>

Minimal Class Component:
```javascript
import { Component } from 'react';


class ComponentName extends Component {
    render() {
        return (/* JSX */);
    }
}

export default ComponentName;
```
<br>
<br>

#### **Function Component**
<br>

```javascript
function ComponentName() {
  return (/* JSX */);
}
```

<br>
<br>

### **Rendering Components**
<br>

```javascript
import { createRoot } from 'react-dom/client';
import App from './AppComponent.js';


const container = document.getElementById('root');
const root = createRoot(container);
root.render(<App />);
```

<br>
<br>

### **Pass Data To Components**
<br>

* we can pass data to components by using the `props` parameter
* `props` is an object containing all attributes attached to the react element

**Components must not modify any data passed via `props`!**

<br>
<br>

#### **Pass Data To Class Component**
<br>

ClassComponent.js
```javascript
import { Component } from 'react';

class ClassComponent extends Component {
  render() {
    const attribute = this.props.attribute;
    // JSX using attribute
  }  
}
```

<br>
<br>

##### **Example**
<br>

PersonTable.js
```javascript
import { Component } from "react";


class PersonTable extends Component {

    render() {
        const {firstName, lastName, age} = this.props;
        return (
            <table>
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>{firstName}</th>
                        <th>{lastName}</th>
                        <th>{age}</th>
                    </tr>
                </tbody>
            </table>
        );
    }
}


export default PersonTable;
```

<br>
<br>

#### **Pass Data To Function Component**
<br>

FunctionComponent.js
```javascript
function functionComponent(props) {
  const attribute = props.attribute;
  return(/* JSX using attribute */)
}
```

<br>
<br>

##### **Example**
<br>

PersonTable.js
```javascript
function PersonTable(props) {
    const {firstName, lastName, age} = props;
    return (
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>{firstName}</th>
                    <th>{lastName}</th>
                    <th>{age}</th>
                </tr>
            </tbody>
        </table>
    );
}
```


<br>
<br>

#### **Call Component With Data**
<br>

App.js
```javascript
import { createRoot } from 'react-dom/client';
import ComponentName from 'componentName.js'

const container = document.getElementById('root');
const root = createRoot(container);
root.render(<ComponentName attribute1='foo' attribute2='bar' />);
```

<br>
<br>

##### **Example**
<br>

```javascript
import { createRoot } from 'react-dom/client';
import PersonTable from 'PersonTable.js'

const container = document.getElementById('root');
const root = createRoot(container);
root.render(<ComponentName firstName='John' lastName='Doe' age='43' />);
```

<br>
<br>

### **Component State**
<br>

```javascript
import { Component } from 'react';

class ClassComponent extends Component {
  state = {
    payload: 'foo'
  };

  render() {
    this.setState({payload: 'bar'});  // modify state

    return (
      // access state
      <div>
        <p>{`payload: ${this.state.payload}`}</p>
      </div>
    );
  }
}
```

