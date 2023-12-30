# **JavaScript Proxy**
<br>

## **Table Of Contents**
<br>

- [**JavaScript Proxy**](#javascript-proxy)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Create A Proxy**](#create-a-proxy)
  - [**Example**](#example)

<br>
<br>
<br>
<br>

## **General**
<br>

A proxy is an object handles or delegates calls to the target object and returns the results.

<br>

![proxy principle](./pictures/proxy.png)

<br>
<br>
<br>
<br>

## **Create A Proxy**
<br>

```javascript
new Proxy(targetObject, handlerObject)
```

<br>
<br>

The _handlerObject_ contains predefined methods (traps):

<br>

|Handler Method                                         |Proxy Call                                                 |Restriction
|:------------------------------------------------------|:----------------------------------------------------------|:----------
|construct(target, argumentList, newTarget)             |new proxy(...argumentsList)                                |function only
|get(targetObject, property, proxy)                     |proxy.property                                             |all objects
|set(targetObject, property, value)                     |proxy.property = value                                     |all objects
|apply(target, thisArgument, argumentList)              |proxy.apply(this.argument, argumentList)                   |function only
|defineProperty(target, property, propertyDescriptot)   |Object.defineProperty(proxy, property, propertyDescriptor) |all objects
|deleteProperty(target, property)                       |delete proxy.property                                      |all objects
|has(property)                                          |property in proxy                                          |all objects
|getPrototypeOf(target)                                 |Object.getPrototypeOf(Proxy)                               |all objects
|setPrototypeOf(target, proto)                          |Object.setPrototypeOf(proxy, proto)                        |all objects

<br>
<br>
<br>
<br>

## **Example**
<br>

Assume we have the following object:

```javascript
const person = {
    firstName: 'John',
    lastName: 'Doe',
    age: 34
};
```

<br>
<br>

Define the handler object (here: catch read and write access to person properties):

```javascript
const handler = {

    get(target, property) {
        console.log(`Read property ${property}: ${target[property]}`);
        return target[property];
    },

    set(target, property, value) {

        switch (property) {

            case 'firstName':
            case 'lastName':
                if (typeof value !== 'string') {
                    throw new TypeError('String expected');
                }
                break;

            case 'age':
                if (typeof value !== 'number') {
                    throw new TypeError('Number expected');
                } else if (value < 0 || value > 125) {
                    throw new RangeError(`Age ${value} is not between 0 and 125`);
                }
                break;

            default:
                throw new Error(`Property ${property} does not exist`);
        }

        console.log(`Write property ${property}: ${value}`);
        target[property] = value;

    }
};
```

<br>
<br>

Create proxy object:

```javascript
const proxy = new Proxy(person, handler);
```

<br>
<br>

Access properties of person object via proxy:

```javascript
console.log(proxy.firstName);
// Read property firstName: John
// John


try {
    proxy.firstName = 6;
} catch(err) {
    console.error(err);
}
// TypeError: String expected


proxy.firstName = 'Jane';
// Write property firstName: Jane  


try {
    proxy.age = -8;
} catch(err) {
    console.error(err);
}
// RangeError: Age -8 is not between 0 and 125


try {
    proxy.age = 245;
} catch(err) {
    console.error(err);
}
// RangeError: Age 245 is not between 0 and 125


proxy.age = 55;
// Write property age: 55


console.log(proxy.firstName);
// Read property firstName: Jane
// Jane


console.log(proxy.age);
// Read property age: 55
// 55


proxy.nonExistingProperty = 5;
// Uncaught Error: Property nonExistingProperty does not exist
```