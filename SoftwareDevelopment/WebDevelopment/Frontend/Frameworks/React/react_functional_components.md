# **React Functional Components**
<br>

## **Table Of Contents**
<br>

- [**React Functional Components**](#react-functional-components)
  - [**Table Of Contents**](#table-of-contents)
  - [**Basic**](#basic)
  - [**Hooks**](#hooks)
  - [**Component Data**](#component-data)
    - [**Props**](#props)
    - [**State**](#state)
  - [**Lifecycle Methods**](#lifecycle-methods)
  - [**Context**](#context)

<br>
<br>
<br>

## **Basic**
<br>

* function components map parameter `props` to JSX object

```javascript
import React from 'react';

function ComponentName(props) {
  return (/* JSX */);
}
```

<br>
<br>
<br>

## **Hooks**
<br>

* Hooks enable React functions like state or lifecycle for function components
* Hooks work only at the top level of react function components
* Not callable within loops, conditions and nested functions
* We can easily create custom hooks by adding prefix `use` to a function name that itself calls other hooks

<br>
<br>
<br>

## **Component Data**
<br>
<br>
<br>

### **Props**
<br>

* we can pass data to components by using the `props` parameter
* `props` is an object containing all attributes attached to the react element
* user specifies props via attributes when calling component
* numbers are specified via `attributeName={12}` 

**Components must not modify any data passed via `props`!**

<br>

`FunctionComponent.jsx`
```javascript
import React from 'react';

function ComponentName(props) {
  const attribute = props.attribute;
  return(/* JSX using attribute */)
}
```

<br>
<br>

Example for object destructuring of `props` with default values:

```javascript
import React from 'react';

function PersonEntry({firstName = 'John', lastName = 'Doe'}) {
  return(<p>{`${firstName} ${lastName}`}</p>);
}
```

<br>
<br>

Example:

`PersonTable.jsx`
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

```javascript
<PersonTable firstName='John' lastName='Doe' age={36} />
```

<br>
<br>
<br>

### **State**
<br>

* state is accessible and modifiable only by its containing components
* component can pass down state information down to its children via `props`
* state is provided via the `useState` [hook](./react_hooks.md)
* components can have multiple state hooks

<br>

```javascript
import { useState } from 'react';

function SomeComponent() {

  // declare state variable 
  const [stateName, setStateName] = useState('initialStateValue');

  // modify state
  setStateName(previousValue => /* modification of previousValue */);

  // access state value
  return (
    <div>
      <p>{stateName}</p>
    </div>
  )
}
```

<br>

Example:
```javascript
import { useState } from 'react';
import React from 'react';

function Counter() {
    const [count, setCount] = useState(0);

    return (
        <React.Fragment>
            <button onClick={() => setCount(count => count > 0 ? count - 1 : count)}>-</button>
            <div>{count}</div>
            <button onClick={() => setCount(count => count < 10 ? count + 1 : count)}>+</button>
        </React.Fragment>
    );
}

export {Counter};
```

<br>
<br>

**Notes:**

1. Always modify data via returned setter method

<br>

2. State updates can be asynchronous, so always use functions for calculating the next state based on current state

```javascript
setState(previousValue => /* modification of previousValue */);
```

<br>

3. Prefer using immutability for states, e.g. replace state with modified copy of state.

```javascript
changeState() {
    const modifiedState = {...stateName, modifiedProperty: 'value'};
    setState(modifiedState);
}
```

<br>
<br>
<br>

## **Lifecycle Methods**
<br>

* lifecycle methods are provided via the `useEffect` [hook](./react_hooks.md)
* add ability to perform side effects 
* comparable to class lifecycle methods like `componentDidMount` etc.
* default: run effect function after every render

<br>

```javascript
import { useEffect } from 'react';
import React from 'react';

function SomeComponent() {
  
  // trigger argument function on every render
  useEffect(() => { /* implementation */ });


  // trigger argument function only on initial render
  useEffect(() => { /* implementation */ }, []);


  // trigger argument function on update of some value
  useEffect(() => { /* implementation */ }, [someValue]);


  // clean up previous render and after component unmounts
  useEffect(
    () => { 

      // implementation

      return function cleanup() {
        // implementation
      }
    }
    
  );

}
```

<br>
<br>
<br>

## **Context**
<br>

* add ability to use [Context](./react_context.md) in functional components via `useContext` [hook](./react_hooks.md)
* used to share data with many different components without explicitly passing it via `props`

<br>

`SomeComponent.jsx`
```javascript
import { useContext } from 'react';
import React from 'react';

function SomeComponent(props) {
  const currentContextValue = useContext(SomeContext);

  return (
    /* JSX using currentContextValue */
  );
}
```

<br>

`App.jsx`
```javascript
import { createContext } from 'react';
import { SomeComponent } from './SomeComponent';
import React from 'react';

const SomeContext = createContext('defaultValue');


function App() {
  return (
    <SomeContext.Provider value={'someValue'}>
      <SomeComponent />
      <SomeOtherComponent />
    </SomeContext.Provider>
  );
}
```


