# **React Hook useEffect**
<br>

## **Table Of Contents**
<br>

- [**React Hook useEffect**](#react-hook-useeffect)
  - [**Table Of Contents**](#table-of-contents)
  - [**Basics**](#basics)
  - [**Syntax**](#syntax)

<br>
<br>
<br>

## **Basics**
<br>

- used on clientside to synchronize a component with an external system (= code not controlled by React)
- generally runs after updated component is visualized

<br>
<br>
<br>

## **Syntax**
<br>

```
function Component() {
  useEffect(setupFunction, [dependencyList]);
}
```

<br>

**setupFunction**
- function executed by the effect
- can return an optional cleanUp function
  - cleanup is executed after every cleanup and after component is removed from the DOM

<br>

**dependencyList (optional)**
- list of all react values that are referenced in the setupFunction (props, states and variables/functions in the component body)
- if omitted: setupFunction is executed after every rerender


<!--

- avoid unnecessary object and function dependencies as they may force the effect to run more often than needed
- if useEffect is affecting the visuals, try using useLayoutEffect

-->