# **JavaScript Generator**
<br>

## **Table Of Contents**
<br>

- [**JavaScript Generator**](#javascript-generator)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
    - [**Create Generator Functions**](#create-generator-functions)
    - [**Create And Use Generator**](#create-and-use-generator)
    - [**Iterate Over A Generator**](#iterate-over-a-generator)
    - [**Infinity Generators And Parameters**](#infinity-generators-and-parameters)

<br>
<br>
<br>
<br>

## **General**
<br>

* generators can be paused at specified breakpoints and resumed later

<br>
<br>
<br>

### **Create Generator Functions**
<br>

```javascript
function* generatorFunctionName() {
    console.log('statement 1');
    yield 'yield1';
    console.log('statement 2');
    yield 'yield2';
    console.log('statement 3');
}
```

<br>
<br>
<br>

### **Create And Use Generator**
<br>

```javascript
const generator = generatorFunctionName();

generator.next();   // returns {value: 'yield1', done: false}
// 'statement1'

generator.next();   // returns {value: 'yield2', done: false}
// 'statement2'

generator.next();   // returns {value: undefined, done: true}
// 'statement3'
```

<br>
<br>
<br>

### **Iterate Over A Generator**
<br>

```javascript
const generator = generatorFunctionName();
for (let value of generator) {
    if (value) {
        console.log(value);
    } else {
        break;
    }
}
```

<br>


Output:
```
statement 1
yield1
statement 2
yield2
statement 3
```

<br>
<br>
<br>

### **Infinity Generators And Parameters**
<br>


```javascript
function* counterGenerator() {
    let counter = 0;
    while(true) {
        counter++;
        const resetParam = yield counter;
        if (resetParam) {
            counter = 0;
        }
    }
}
```

<br>

```javascript
const counter = counterGenerator();
console.log(counter.next());            // {value: 1, done: false}
console.log(counter.next());            // {value: 2, done: false}
console.log(counter.next());            // {value: 3, done: false}

console.log(counter.next(true));        // {value: 1, done: false}
```