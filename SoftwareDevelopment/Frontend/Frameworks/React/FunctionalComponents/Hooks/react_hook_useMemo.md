# **React Hook useMemo**
<br>

## **Table Of Contents**
<br>

- [**React Hook useMemo**](#react-hook-usememo)
  - [**Table Of Contents**](#table-of-contents)
  - [**Basics**](#basics)
  - [**Syntax**](#syntax)
  - [**Example**](#example)

<br>
<br>
<br>

## **Basics**
<br>

- used to cache result of expensive operation between rerenders
- only use it to optimize performance

<br>
<br>
<br>

## **Syntax**
<br>

```
function Component() {
  const cachedValue = useMemo(calculationFunction, dependencyList);
}
```

<br>

- on initial render: execute `calculationFunction`, cache and return value
- on rerender:
  - if no dependency changed: return stored value
  - if dependency changed: execute `calculationFunction`, cache and return value


<br>

**calculationFunction**
- pure function without arguments calculating the result that should be cached

<br>

**dependencyList**
- list of all react values that are referenced in `calculationFunction` (props, states and variables/functions in the component body)
- value will only be re-calculated when a dependency changes

<br>
<br>
<br>

## **Example**
<br>

Lets assume we have an expensive calculation like this simulated function:

```javascript
function expensiveCalculation(input) {
   const waitTimeInMilliseconds = 2_000;
   const startTime = Date.now();
   const isWaiting = () => Date.now() - startTime < waitTimeInMilliseconds;

   while (isWaiting()) {
      // do nothing
   }

   return `Result of expensive calculation with input ${input}`;
}
```

<br>

If this expensive calculation is called with a react state value, we can cache the result with the `useMemo` hook. Now the result is only recalculated during a rerender when the state value has actually changed.

```javascript
function SomeCompontent() {
   const [value1, setValue1] = useState(1);
   const [value2, setValue2] = useState(1);
   const cachedResult = useMemo(() => expensiveCalculation(value1), [value1]);

   const incrementValue1 = () => setValue1(value1 + 1);
   const incrementValue2 = () => setValue2(value2 + 1);

   return (
      <>
         <button type="button" onClick={incrementValue1}>Increment value1</button>
         <button type="button" onClick={incrementValue2}>Increment value2</button>
         <p>{`Value1: ${value1} (increment causes recalculation of cache)`}</p>
         <p>{`Value2: ${value2} (increment does not affect cache)`}</p>
         <p>{cachedResult}</p>
      </>
   );
}
```

