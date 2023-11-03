# **React Hook useId**
<br>

## **Table Of Contents**
<br>

- [**React Hook useId**](#react-hook-useid)
  - [**Table Of Contents**](#table-of-contents)
  - [**Basics**](#basics)
  - [**Syntax**](#syntax)
  - [**Example**](#example)
  - [**DONTS**](#donts)

<br>
<br>
<br>

## **Basics**
<br>

- used to generate unique Id string within a component
- unique id can be used for example as value in HTML property id

<br>
<br>
<br>

## **Syntax**
<br>

```
function Component {
   const id = useId();
}
```

<br>
<br>
<br>

## **Example**
<br>

```javascript
function FormInput() {
   const id = useId();

   return (
      <>
         <label htmlFor={id}>LabelText</label>
         <input id={id} type="text" />
      </>
   );
}
```
- each instance of the component will have a unique id that is used to link the label and the input field

<br>
<br>
<br>

## **DONTS**
<br>

- use id string as value for *key* property in lists
