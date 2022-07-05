# **JavaScript Iterator**
<br>

## **Table Of Contents**
<br>

- [**JavaScript Iterator**](#javascript-iterator)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Create A Custom Iterator**](#create-a-custom-iterator)
    - [**Basic Example**](#basic-example)
    - [**Example: Iterate Array Elements In Descending Alphabetical Order**](#example-iterate-array-elements-in-descending-alphabetical-order)
  - [**Create An Iterable Object**](#create-an-iterable-object)
    - [**Basic Example**](#basic-example-1)
    - [**Example: Iterate Array Elements In Descending Alphabetical Order**](#example-iterate-array-elements-in-descending-alphabetical-order-1)

<br>
<br>
<br>
<br>

## **General**
<br>

* iterator enables iterating over a data structure
  * can be retrieved from methods _values()_, _keys()_ and _entries()_ for datatypes Array, Set and Maps 
  * can be a custom iterator
  * can be used within for loop

<br>
<br>

Example

<br>

```javascript
const array = ['A', 'B'];

const iterator1 = array.values();
const iterator2 = array.values();


// iterator within a for loop
for (let entry of iterator1) {
    console.log(entry);             // 'A', 'B'
}


// manual use of iterator
iterator2.next();                    // {value: 'A', done: false}
iterator2.next();                    // {value: 'B', done: false}
iterator2.next();                    // {value: undefined, done: true}
```

<br>
<br>
<br>
<br>

## **Create A Custom Iterator**
<br>
<br>

### **Basic Example**
<br>

```javascript
function createIterator(iterable) {
    let index = 0;

    function next() {
        if (index === iterable.length) {
            return {value: undefined, done: true};
        } else {
            return {value: iterable[index++], done: false};
        }
    }

    return {next};
}
```

<br>
<br>
<br>

### **Example: Iterate Array Elements In Descending Alphabetical Order**
<br>

```javascript
const stringArray = ['foo', 'bar', 'car', 'test', 'hello', 'world'];

function createAlphabeticalDescendingIteratorFor(array) {
    const sortedArray = array.sort((a, b) => {return b.charCodeAt(0) - a.charCodeAt(0)});
    let currentIndex = 0;

    function next() {
        if (currentIndex === array.length) {
            return {value: undefined, done: true};
        } else {
            const currentValue = sortedArray[currentIndex];
            currentIndex++;
            return {value: currentValue, done: false};
        }
    }

    return {next};
}
```

<br>

```javascript
const iterator = createAlphabeticalDescendingIteratorFor(stringArray);

let currentElement = iterator.next();

while (!currentElement.done) {
    console.log(currentElement.value);
    currentElement = iterator.next();
}

/* Output:

    world
    test
    hello
    foo
    car
    bar

*/
```

<br>
<br>
<br>
<br>

## **Create An Iterable Object**
<br>
<br>

### **Basic Example**
<br>

```javascript
const iterableWrapper {
    iterable
}


iterableWrapper[Symbol.iterator] = function() {
    let index = 0;

    function next() {
        if (index === this.iterable.length) {
            return {value: undefined, done: true};
        } else {
            return {value: this.iterable[index++], done: false};
        }
    }

    return {next};
}


for (let element of iterableWrapper) {
    /* process element */
}
```

<br>
<br>
<br>

### **Example: Iterate Array Elements In Descending Alphabetical Order**
<br>

```javascript
const stringArrayWrapper = { stringArray };

stringArrayWrapper[Symbol.iterator] = function() {
    const sortedArray = this.stringArray.sort((a, b) => {return b.charCodeAt(0) - a.charCodeAt(0)});
    const stringArrayLength = this.stringArray.length;
    let currentIndex = 0;

    function next() {
        if (currentIndex === stringArrayLength) {
            return {value: undefined, done: true};
        } else {
            const currentValue = sortedArray[currentIndex];
            currentIndex++;
            return {value: currentValue, done: false};
        }
    }

    return {next};
};
```

<br>

```javascript
for (let element of stringArrayWrapper) {
    console.log(element);
}


/* Output:

    world
    test
    hello
    foo
    car
    bar

*/
```