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

