# **React Hook useRef**
<br>

## **Table Of Contents**
<br>

- [**React Hook useRef**](#react-hook-useref)
  - [**Table Of Contents**](#table-of-contents)
  - [**Basics**](#basics)
  - [**Syntax**](#syntax)
  - [**Donts**](#donts)
  - [**Use Case: DOM Manipulation**](#use-case-dom-manipulation)

<br>
<br>
<br>

## **Basics**
<br>

- used to store references to values that should not trigger rerenders
- can be modified without triggering a rerender

<br>
<br>
<br>

## **Syntax**
<br>

```
function Component {
   const refObject = useRef(initialValue);
}
```

- initialValue: initial value of ref.current
- returns an object with only property *current*

<br>
<br>
<br>

## **Donts**
<br>

- read / modify `ref.current` during rendering
  
- do not check if ref is already initialized in case of expensive ref values

```javascript
function Component() {
   const ref = useRef(expensiveMethod());    // initial value is still computed on rerenders, but ignored
}
```

better:

```javascript
function Component() {
   const ref = useRef(null);

   if (!ref) {
      ref.current = expensiveMethod();
   }
}
```



<br>
<br>
<br>

## **Use Case: DOM Manipulation**
<br>

- initialize ref as null
- pass ref to JSX attribute `ref`
- ref now holds a reference to the specified element

<br>

Example:

```javascript
function ChangingBackgroundDiv() {
   const refDiv = useRef(null);

   const handlePointerEnter = () => refDiv.current.classList.toggle('red-background');

   return <div ref={refDiv} onPointerEnter={handlePointerEnter}>Div Text</div>;
}
```
