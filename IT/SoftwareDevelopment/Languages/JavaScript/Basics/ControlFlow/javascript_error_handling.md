# **JavaScript Error Handling**
<br>

## **Table Of Contents**
<br>

- [**JavaScript Error Handling**](#javascript-error-handling)
  - [**Table Of Contents**](#table-of-contents)
  - [**Error Objects**](#error-objects)
    - [**Error (Base Object)**](#error-base-object)
      - [**Properties**](#properties)
        - [**name**](#name)
        - [**message**](#message)
        - [**cause**](#cause)
      - [**Methods**](#methods)
        - [**toString()**](#tostring)
    - [**EvalError**](#evalerror)
    - [**RangeError**](#rangeerror)
    - [**ReferenceError**](#referenceerror)
    - [**SyntaxError**](#syntaxerror)
    - [**TypeError**](#typeerror)
    - [**URIError**](#urierror)
  - [**Throw Error**](#throw-error)
  - [**Catch Error**](#catch-error)
    - [**Try-Block**](#try-block)
    - [**Catch-Block**](#catch-block)
    - [**Finally-Block**](#finally-block)

<br>
<br>
<br>

## **Error Objects**
<br>
<br>

### **Error (Base Object)**
<br>

```javascript
new Error(?message, ?{ cause })
```
- optional `cause` argument to hold the original error object when catching and re-throwing the error

<br>
<br>

#### **Properties**
<br>

##### **name**
- name of error type (here: "Error")

<br>

##### **message**
- human-readable error description

<br>

##### **cause**
- original error object  

<br>
<br>

#### **Methods**
<br>

##### **toString()**
- returns string representation of the error in the format `name: message`

<br>
<br>
<br>

### **EvalError**
<br>

The `EvalError` is used for errors of the global `eval()` function.

```javascript
new EvalError(?message, ?{ cause });
```

<br>
<br>
<br>

### **RangeError**
<br>

The `RangeError` is used when a value is not within the allowed value range.

```javascript
new RangeError(?message, ?{ cause });
```

<br>
<br>
<br>

### **ReferenceError**
<br>

The `ReferenceError` is used whenever a nonexisting or not yet initialized variable is referenced.

```javascript
new ReferenceError(?message, ?{ cause });
```

<br>
<br>
<br>

### **SyntaxError**
<br>

The `SyntaxError` is used when there is an attempt to interpret syntactically invalid code.

```javascript
new SyntaxError(?message, ?{ cause });
```

<br>
<br>
<br>

### **TypeError**
<br>

The `TypeError` is used when an operation could not be executed because a value is not of the expected type.

```javascript
new TypeError(?message, ?{ cause });
```

<br>
<br>
<br>

### **URIError**
<br>

The `URIError` is used when a global URI handling function was misused.

```javascript
new URIError(?message, ?{ cause });
```

<br>
<br>
<br>

## **Throw Error**
<br>

```
throw object;
```

- aborts the execution of the current function
- passes control to the first `catch` block in call stack
- terminates the program if no `catch` block exists in call stack

<br>

> Although `throw` can throw any object, it should always throw an `Error` object.

<br>
<br>
<br>

## **Catch Error**
<br>

```javascript
try {
   // code
} catch (error) {
   // handle error
}
```

<br>
<br>

### **Try-Block**

The `try`-block is always executed first. The execution is aborted when an error is thrown by its code.

<br>
<br>

### **Catch-Block**

The `catch`-block is executed when the code in the `try`-block threw an error.

```javascript
try {
   // code
} catch (error) {
   // handle error that was thrown by code in try-block
}
```

<br>
<br>

### **Finally-Block**

The `finally`-block is executed after either
- the `try`-block when it did not threw any errors
- the `catch`-block.

<br>

> The `finally`-block **always** executes before any control flow statement (return, throw, break, ...) within the `try`- or `catch`-block

<br>

```javascript
function test() {
   try {
      return 'foo';
   } finally {
      console.log('finally-block');
   }
}

test();

// 'finally-block'
// return 'foo'
```

```javascript
function test() {
   try {
      return 'foo';
   } finally {
      return 'bar';
   }
}

test();     // 'bar'
```

<br>
<br>

**Examples:**

```javascript
try {
   console.log('foo');
} finally {
   console.log('bar');
}

// foo
// bar
```

<br>

```javascript
try {
   console.log('foo1');
   throw new Error('someError');
   console.log('foo2');
} catch {
   console.log('bar');
} finally {
   console.log('baz');
}

// foo1
// bar
// baz
```