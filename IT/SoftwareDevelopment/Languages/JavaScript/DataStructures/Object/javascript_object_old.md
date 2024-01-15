# **JavaScript Object**

<br>

## **Table Of Contents**
<br>

- [**JavaScript Object**](#javascript-object)
  - [**Table Of Contents**](#table-of-contents)
  - [**Use Of Symbols For Unique Attributes**](#use-of-symbols-for-unique-attributes)

<br>
<br>
<br>
<br>

## **Use Of Symbols For Unique Attributes**
<br>

Using symbols for defining unique attributes prevents any call of this attribute other than by the symbol.

```javascript
const attribute1 = Symbol('attribute1');
const obj = {};
obj[attribute1] = 'value';

console.log(obj[attribute1]);       // output: value
console.log(obj[0]);                // output: undefined
console.log(obj.attribute1);        // output: undefined
console.log(obj['attribute1']);     // output: undefined   
```