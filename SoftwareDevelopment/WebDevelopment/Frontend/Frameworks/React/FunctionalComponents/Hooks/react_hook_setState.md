# **React Hook setState**
<br>

## **Table Of Contents**
<br>

- [**React Hook setState**](#react-hook-setstate)
  - [**Table Of Contents**](#table-of-contents)
  - [**Basics**](#basics)
  - [**Syntax**](#syntax)
  - [**State Update Queue Inside Event Handler**](#state-update-queue-inside-event-handler)
  - [**Using State Within Asynchronous Event Handler**](#using-state-within-asynchronous-event-handler)
  - [**Update Mutable Data State**](#update-mutable-data-state)
    - [**Update Object State**](#update-object-state)
    - [**Update Array State**](#update-array-state)

<br>
<br>
<br>

## **Basics**
<br>

- adds a state variable to a functional react component
- must be declared at the top level of a component
- state change triggers rerender
- updated state value is only available **after** rerender
- state value never changes within a render

<br>
<br>
<br>

## **Syntax**
<br>

```
function Component() {
   const [stateValue, updateFunction] = useState([initialValue / initializerFunction]);
}
```

<br>

|Element             |Description                                                          |Naming Convention |
|:-------------------|:--------------------------------------------------------------------|:-----------------|
|stateValue          |Current value of state. Do not try to modify.                        |\<StateName\>
|updateFunction      |Allows modification of state. Triggers rerender.                     |set\<StateName\>
|initialValue        |Initial state value after first render                               |-
|initializerFunction |Pure function without parameters that returns an initial state value |-

<br>

Example:

```javascript
import { useState } from 'react';

function Counter() {
   const [counter, setCounter] = useState(0);

   // implementation
}
```

<br>
<br>

```
setState(nextStateValue / updateFunction)
```
* **nextStateValue** defines the value that the state will have after the next render
* **updateFunction** modifies the value that the state will have after the next render based on the current value

<br>

Example: 

```javascript
function Counter() {
   const [counter, setCounter] = useState(0);

   const handleReset = () => setCounter(0);
   const handleIncrement = () => setCounter((n) => n + 1);

   // implementation
}
```

<br>
<br>
<br>

## **State Update Queue Inside Event Handler**
<br>

- allows multiple state updates without triggering rerendering after each change 
  - all state updates **inside an event handler** are added to the queue
  - queue is processed as a batch at the end of the event handler

<br>

Example:

```javascript
function Counter() {
   const [count, setCount] = useState(0);

   const handleClick = () => {
      setCount(4);
      setCount((n) => n + 3);
   }

   return (
      <>
         <p>{`Current Value: ${count}`}</p>
         <button type="button" onClick={handleClick}>Increment</button>
      </>
   );
}
```

<br>

|Step | Action                                                                           |
|:---:|:---------------------------------------------------------------------------------|
|1    |run event handler                                                                 |
|2    |Add `replace count with 4` to queue                                               |
|3    |Add function `(n) => n + 3` to queue                                              |
|4    |process queue                                                                     |
|5    |set count to 4 (**queue content from step 2**)                                    |
|6    |execute function and increment count to 4 + 3 = 7 (**queue content from step 3**) |
|7    |trigger rerender                                                                  |

<br>
<br>
<br>

## **Using State Within Asynchronous Event Handler**
<br>
<br>

<br>
<br>
<br>

## **Update Mutable Data State**
<br>
<br>

### **Update Object State**
<br>

- state holds **reference** to object and triggers rerender only when the reference changes
- update of an object state requires a new object

<br>

Example:

```javascript
function NameInput() {
   const [name, setName] = useState({ firstName: 'John', lastName: 'Doe' });

   return (
      <form>
         <input
            type="text"
            value={name.firstName}
            onChange={(e) => setName({ ...name, firstName: e.target.value })}
         />
         <input
            type="text"
            value={name.lastName}
            onChange={(e) => {
               const newName = name;
               newName.lastName = e.target.value;
               setName(newName);
            }}
         />
      </form>
   );
}
```

- updates to property `name.firstName` are rendered, because it sets state to a clone of the object with updated property value (= new object reference)
- updates to property `name.lastName` are not rendered, the state is not updated with a new object

<br>
<br>

### **Update Array State**
<br>

- state holds **reference** to array and triggers rerender only when the reference changes
- update of an array state requires a new array

<br>

|Action           |Recommended Function                                                            |
|:----------------|:-------------------------------------------------------------------------------|
|Add Element      |`[...arrayName, newElement]`                                                    |
|Remove Element   |[array.filter()](../../../../../JavaScript/javascript_array.md#filter)          |
|Replace Elements |[array.map()](../../../../../JavaScript/javascript_array.md#map)                |
|Sorting Elements |copy array + [array.sort()](../../../../../JavaScript/javascript_array.md#sort) |

<br>

Example:

```javascript
function StateArrayTest(): ReactElement {
   const [nameList, setNameList] = useState(['Entry1', 'Entry2', 'Entry3']);

   const correctClickHandler = () => setNameList([...nameList, 'NewEntry']);

   const incorrectClickHandler = () => nameList.push('NewEntry');

   return (
      <>
         <ul>
            { nameList.map((name) => <li>{name}</li>)}
         </ul>
         <button type="button" onClick={correctClickHandler}>Click</button>
         <button type="button" onClick={incorrectClickHandler}>Click</button>
      </>
   );
}
```

- pushing a new entry to array state via `correctClickHandler` is rendered, because it pushes new entry to a clone of the array
- pushing a new entry to array state via `incorrectClickHandler` is not rendered, because the state is not updated with a new array reference