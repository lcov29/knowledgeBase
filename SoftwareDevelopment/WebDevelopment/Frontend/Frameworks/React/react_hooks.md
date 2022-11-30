# **React Hooks**
<br>

## **Table Of Contents**
<br>

- [**React Hooks**](#react-hooks)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Hook Types**](#hook-types)
    - [**State Hook**](#state-hook)
      - [**Differences to `this.state`**](#differences-to-thisstate)
    - [**Effect Hook**](#effect-hook)
    - [**Context Hook**](#context-hook)

<br>
<br>
<br>

## **General**
<br>

* Hooks enable React functions like state or lifecycle for function components
* Hooks work only at the top level of react function components
* Not callable within loops, conditions and nested functions
* We can easily create custom hooks by adding prefix `use` to a function name that itself calls other hooks

<br>
<br>
<br>
<br>

## **Hook Types**
<br>
<br>
<br>

### **State Hook**
<br>

* add local state to function component

<br>

```javascript
import { useState } from 'react';

function SomeComponent() {

  // declare state variable 
  const [stateName, setStateName] = useState('initialStateValue');

  // modify state
  setStateName(statenName + 2);

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
import './style.css';

function Counter() {
    const [count, setCount] = useState(0);

    return (
        <div id='counter'>
            <button onClick={() => setCount(count => count > 0 ? count - 1 : count)}>-</button>
            <div>{count}</div>
            <button onClick={() => setCount(count => count < 10 ? count + 1 : count)}>+</button>
        </div>
    );
}

export {Counter};
```

<br>
<br>

#### **Differences to `this.state`**
<br>

1. state does not have to be an object
 <br>

2. state does not merge states on modification (relevant for states represented as an object)

```javascript
const [demo, setDemo] = useState({payload1: 'foo', payload2: 'bar'});

setDemo(() => ({...demo, payload1: 'baz'}));  
// {payload1: 'baz', payload2: 'bar'}

setDemo(() => ({payload2: 'bar'}));
// {payload2: 'bar'}
```
<br>

3. components can have multiple state hooks

<br>
<br>
<br>

### **Effect Hook**
<br>

* add ability to perform side effects 
* comparable to lifecycle methods like `componentDidMount` etc.
* default: run effect function after every render

<br>

```javascript
import { useEffect } from 'react';

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

### **Context Hook**
<br>

* add ability to use [Context](./react_context.md) in functional components

<br>

```javascript
import { createContext, useContext } from 'react';

const SomeContext = createContext('defaultValue');


function App() {
  return (
    <SomeContext.Provider value={'someValue'}>
      <SomeComponent />
    </SomeContext.Provider>
  );
}


function SomeComponent(props) {
  const currentContextValue = useContext(SomeContext);

  return (
    <p>{currentContextValue}</p>
  );
}
```