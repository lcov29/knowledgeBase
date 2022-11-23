# **React Components**
<br>

## **Table Of Contents**
<br>

- [**React Components**](#react-components)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Component Types**](#component-types)
    - [**Class Component**](#class-component)
    - [**Function Component**](#function-component)
  - [**Component Data**](#component-data)
    - [**Props**](#props)
    - [**State**](#state)
  - [**Lifecycle Methods**](#lifecycle-methods)
  - [**Event Handling**](#event-handling)
    - [**Pass Additional Parameters To Event Handler**](#pass-additional-parameters-to-event-handler)

<br>
<br>
<br>

## **General**
<br>

* components = custom reusable HTML elements with state, logic and styling
* react applications usually consist of multiple different components that are bundled into an App component

<br>
<br>
<br>

## **Component Types**
<br>
<br>

### **Class Component**
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

### **Function Component**
<br>

```javascript
function ComponentName() {
  return (/* JSX */);
}
```

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

**Components must not modify any data passed via `props`!**

<br>
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

Example:
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
<br>

### **State**
<br>

* state is accessible and modifiable only by its containing components
* component can pass down state information down to its children via `props`

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

<br>

**Note:**

1. Always modify data via `this.setState()`

<br>

2. State updates can be asynchronous, always use functions for calculating the next state based on state of props

```javascript
this.setState((state, props) => ({ newStateProperty: /* calculation with state and props */}));
```

<br>

3. Prefer using immutability for states, e.g. replace state with modified copy of state.

```javascript
changeState() {
    const modifiedState = Object.assign({}, this.state, {attribute: 'modifiedValue'});
    this.setState(modifiedState);
}
```

<br>
<br>
<br>

## **Lifecycle Methods**
<br>

* use `componentDidMount()`  to allocate resources for new component
* use `componentWillUnmount()` to free up resources of destroyed component

<br>

```javascript
import { Component } from 'react';


class Clock extends Component {

    state = {
        date: new Date(),
        intervalId: 0
    }


    tick = () => {
        const newState = Object.assign(this.state, {date: new Date()});
        this.setState(newState);
    }


    componentDidMount() {
        // runs after the component rendered to the DOM
        const intervalId = setInterval(this.tick, 1_000);
        const newState = Object.assign({}, this.state, {intervalId});
        this.setState(newState);
    }


    componentWillUnmount() {
        // runs if component is removed from the DOM
        clearInterval(this.state.intervalId);
    }


    render() {
        return (
            <p>{this.state.date.toLocaleTimeString()}</p>
        );
    }
}

export default Clock;
```

<br>
<br>
<br>

## **Event Handling**
<br>

Using event handlers is almost identical with HTML event handlers:

<br>

```javascript
class EventButton extends Component {

    clickHandler(event) {
        window.alert('Button clicked');
    }

    render() {
        return (
            <button onClick={this.clickHandler}>
                Click Me
            </button>
        );
    }
}
```

<br>

Differences for react event handlers:

* use camelcase
* returning `false` does not prevent default behavior, explicitly use `event.preventDefault()`

<br>
<br>

### **Pass Additional Parameters To Event Handler**
<br>

```javascript
<button onClick={eventHandler.bind(this, id)}>Click Me</button>
```

or

```javascript
<button onClick={(e) => eventHandler(id, e)}>Click Me</button>
```