# **NodeJS Events**
<br>

## **Table Of Contents**
<br>

- [**NodeJS Events**](#nodejs-events)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Event Handler**](#event-handler)
  - [**Event Emitter**](#event-emitter)
    - [**Trigger Event**](#trigger-event)
      - [**emit()**](#emit)
    - [**Register Event Handler**](#register-event-handler)
      - [**addListener()**](#addlistener)
      - [**prependListener()**](#prependlistener)
      - [**prependOnceListener()**](#prependoncelistener)
      - [**on()**](#on)
      - [**once()**](#once)
    - [**Remove Event Handler**](#remove-event-handler)
      - [**removeListener()**](#removelistener)
      - [**off()**](#off)
    - [**Information About Listeners**](#information-about-listeners)
      - [**eventNames()**](#eventnames)
      - [**setMaxListeners()**](#setmaxlisteners)
      - [**getMaxListeners()**](#getmaxlisteners)
      - [**listenerCount()**](#listenercount)
      - [**listeners()**](#listeners)
      - [**rawListeners()**](#rawlisteners)

<br>
<br>
<br>

## **General**
<br>

An Event is created by an object ([Event Emitter](#event-emitter)) and is handled by a function ([Event Handler](#event-handler)).

<br>
<br>
<br>

## **Event Handler**
<br>

An event handler is a function that is registered at the event emitter as a listener for a specific event.

<br>

```javascript
function eventHandlerName(event) { 
  // implementation
}
```
<br>

You can register a listener for a specific event with different [methods](#register-event-handler).

<br>
<br>
<br>

## **Event Emitter**
<br>

All objects that emit events have to extend the class _EventEmitter_.

<br>
<br>

### **Trigger Event**
<br>
<br>

#### **emit()**
<br>

```
emit(eventName, [arguments]) : boolean
```
* synchronously calls all registered listeners for _eventName_
* returns boolean indicating whether ther were any listeners

<br>
<br>

### **Register Event Handler**
<br>
<br>

#### **addListener()**
<br>

```
addListener(eventName, listener)
```
* register _listener_ function for _eventName_
* _listener_ is added at the end of the array

<br>
<br>

#### **prependListener()**
<br>

```
prependListener(eventName, listener)
```
* register _listener_ function for _eventName_
* _listener_ is added at the start of the array

<br>
<br>

#### **prependOnceListener()**
<br>

```
prependOnceListener(eventName, listener)
```
* register _listener_ function as single-use listener for _eventName_
* after _eventName_ is triggered, _listener_ is executed and then automatically removed
* _listener_ is added at the start of the array

<br>
<br>

#### **on()**
<br>

```
on(eventName, listener)
```
* register _listener_ function for _eventName_
* _listener_ is added at the end of the array
* alias for [_addListener_](#addlistener)

<br>
<br>

#### **once()**
<br>

```
once(eventName, listener)
```
* register _listener_ function as single-use listener for _eventName_
* after _eventName_ is triggered, _listener_ is executed and then automatically removed

<br>
<br>

### **Remove Event Handler**
<br>
<br>

#### **removeListener()**
<br>

```
removeListener(eventName, listener)
```
* remove (only one) specified _listener_ from _eventName_
* if a _listener_ was registered multiple times, _removeListener()_ will only 

<br>
<br>

#### **off()**
<br>

```
off(eventName, listener)
```
* remove (only one) specified _listener_ from _eventName_
* if a _listener_ was registered multiple times, _removeListener()_ will only 
* alias for [_removeListener_](#removelistener)

<br>
<br>

### **Information About Listeners**
<br>
<br>

#### **eventNames()**
<br>

```
eventNames() : Array
```
* return array of all event names for which the emitter has registered listeners

<br>
<br>

#### **setMaxListeners()**
<br>

```
setMaxListeners(n)
```
* set maximum of allowed listeners per event

<br>
<br>

#### **getMaxListeners()**
<br>

```
getMaxListeners() : int
```
* return current maximum of allowed listeners per event

<br>
<br>

#### **listenerCount()**
<br>

```
listenerCount(eventName) : int
```
* return number of registered listeners for _eventName_

<br>
<br>

#### **listeners()**
<br>

```
listeners(eventName) : array
```
* return array of listener functions as copies for _eventName_

<br>
<br>

#### **rawListeners()**
<br>

```
rawListeners(eventName)
```
* return array of listener functions including wrappers as copies for _eventName_

