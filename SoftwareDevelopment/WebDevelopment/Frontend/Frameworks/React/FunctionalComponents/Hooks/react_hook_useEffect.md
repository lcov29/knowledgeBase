# **React Hook useEffect**
<br>

## **Table Of Contents**
<br>

- [**React Hook useEffect**](#react-hook-useeffect)
  - [**Table Of Contents**](#table-of-contents)
  - [**Basics**](#basics)
  - [**Syntax**](#syntax)
  - [**Lifecycle Options**](#lifecycle-options)
  - [**Use Cases**](#use-cases)
    - [**Connecting To External System**](#connecting-to-external-system)

<br>
<br>
<br>

## **Basics**
<br>

- used on clientside to synchronize a component with an external system (= code not controlled by React)
- generally runs after updated component is visualized
- avoid unnecessary object and function dependencies as they may force the effect to run more often than needed
- if useEffect is affecting the visuals, try using [useLayoutEffect](react_hook_useLayoutEffect.md)

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
  - cleanup is executed after every rerender and after component is removed from the DOM

<br>

**dependencyList (optional)**
- list of all react values that are referenced in the setupFunction (props, states and variables/functions in the component body)
- if omitted: setupFunction is executed after every rerender

<br>
<br>
<br>

## **Lifecycle Options**
<br>

```javascript
function Component() {
  
  // trigger every render
  useEffect(() => { /* implementation */ });


  // trigger only on initial render
  useEffect(() => { /* implementation */ }, []);


  // trigger on update of someValue
  useEffect(() => { /* implementation */ }, [someValue]);


  // clean up
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

## **Use Cases**
<br>
<br>

### **Connecting To External System**
<br>

Lets assume we want to connect to the [DOM](../../../../../WebAPI/document_object_model_api.md) to register an event listener to the global window object.

<br>


```javascript
function UseEffectDomManipulation() {

   const [rerenderTrigger, setRerenderTrigger] = useState(true);

   useEffect(() => {
      const handlePointerDown = () => console.log('pointer down');
      
      window.addEventListener('pointerdown', handlePointerDown);

      const cleanUp = () => {
         window.removeEventListener('pointerdown', handlePointerDown);
      };

      return cleanUp;
   }, [rerenderTrigger]);

   return (
      <button type="button" onClick={() => setRerenderTrigger(!rerenderTrigger)}>
         Rerender Component
      </button>
   );
}
```
