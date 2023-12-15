# **React Hook useCallback**
<br>

## **Table Of Contents**
<br>

- [**React Hook useCallback**](#react-hook-usecallback)
  - [**Table Of Contents**](#table-of-contents)
  - [**Basics**](#basics)
  - [**Syntax**](#syntax)
  - [**Example**](#example)

<br>
<br>
<br>

## **Basics**
<br>

- used to cache a **function definition** between rerenders
- to cache the **result** of a function between rerenders, use the [useMemo](./react_hook_useMemo.md) hook
- often used together with `memo`
- only use it to optimize performance

<br>
<br>
<br>

## **Syntax**
<br>

```
function Component() {
  const cachedFunction = useCallback(function, dependencyList);
}
```

<br>


- on initial render: store `function` into `cachedFunction`
- on rerender:
  - if no dependency changed: no action
  - if dependency changed: store new `function` into `cachedFunction`

<br>

**function**
- function definition to cache

<br>

**dependencyList**
- list of all react values that are referenced in `function` (props, states and variables/functions in the component body)
- `function` will only be updated when a dependency changes

<br>
<br>
<br>

## **Example**
<br>

Lets assume we have a component that has a high rendering cost (in this example the cost is artificial for demostration purposes).  
The component takes a function `fn` as an argument and is wrapped in a `memo` call.

```javascript
const ExpensiveComponent = memo(({ fn }) => {
   const waitTimeInMilliseconds = 2_000;
   const startTime = Date.now();
   const isWaiting = () => Date.now() - startTime < waitTimeInMilliseconds;

   while (isWaiting()) {
      // do nothing
   }

   return (
      <>
         <p>Expensive Component</p>
         <p>{`Result of prop function: ${fn()}`}</p>
      </>
   );
});
```

<br>

Now lets assume that this component is used as a child of another component:

```javascript
function UseCallbackTest() {
   const [value1, setValue1] = useState(1);
   const [value2, setValue2] = useState(1);

   const cachedFunction = useCallback(
      () => `current value1: ${value1}`,
      [value1]
   );

   const incrementValue1 = () => setValue1(value1 + 1);
   const incrementValue2 = () => setValue2(value2 + 1);

   return (
      <>
         <button type="button" onClick={incrementValue1}>Increment value1</button>
         <button type="button" onClick={incrementValue2}>Increment value2</button>
         <ExpensiveComponent fn={cachedFunction} />
      </>
   );
}
```

This component has two states `value1` and `value2`. The state `value1` is used in the definition of the function that gets passed to the `ExpensiveComponent`. Since `ExpensiveComponent` is wrapped in a `memo` call it will only rerender when its props update.

The callback function is defined within the `useCallback` hook, which will cache the function definition in `cachedFunction` and will only create a new function if the dependency `value1` updates. Therefore the props of `ExpensiveComponent` will only change if `value1` updates, but not when `value2` is updated.

If we would not have defined the callback function in the `useCallback` hook, react would have created a new callback function on every rerender. This would force the child component `ExpensiveComponent` to also rerender every time although its props may not have changed.

