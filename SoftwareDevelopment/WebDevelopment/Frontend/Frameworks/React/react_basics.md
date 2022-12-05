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
  - [**Rendering**](#rendering)
    - [**Conditional Rendering**](#conditional-rendering)
  - [**Lists**](#lists)
  - [**Debugging**](#debugging)
  - [**Enable TypeScript Support**](#enable-typescript-support)

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

* components = custom reusable HTML elements with state, logic and styling
* react applications usually consist of multiple different components that are bundled into an App component

<br>

See [Components](./react_components.md).

<br>
<br>
<br>

## **Rendering**
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

### **Conditional Rendering**
<br>

```javascript
function ConditionalElement(props) {
    if (props.condition) {
      return <ComponentA />;
    }
    return <ComponentB />;
}
```

```javascript
<ConditionalElement condition={true}/>
```

<br>
<br>

Use of element variables and ternary operator:

```javascript
function ConditionalElement(props) {
  let element = (props.condition) ? <ComponentA /> : <ComponentB />;
  return element;
}
```

<br>
<br>

Prevent element from rendering:

```javascript
function ConditionalElement(props) {
    if (props.condition) {
      return <ComponentA />;
    }
    return null;
}
```

<br>
<br>
<br>

## **Lists**
<br>

* we can render list entries by using a collection of JSX elements
* list elements should be provided with a react-internal `key` attribute
* list element keys must be unique only within their enclosing list

<br>

```javascript
function List(props) {
    const elementList = props.listData;
    return (
        <ul>
            {elementList.map(element => <li key={element.id}>{element}</li>)}
        </ul>
    );
}
```

```javascript
<List listData={['element1', 'element2', 'element3']}/>
```

<br>
<br>
<br>

## **Debugging**
<br>

1. Enable Source Maps 
2. Install browser extension react developer tools

<br>
<br>
<br>

## **Enable TypeScript Support**
<br>

1. Install TypeScript

```bash
npm install --save-dev typescript
```

<br>

2. Install React Type Package

```bash
npm install --save-dev @types/react
```