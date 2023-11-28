# **Jest Mocking**
<br>

## **Table Of Contents**
<br>

- [**Jest Mocking**](#jest-mocking)
  - [**Table Of Contents**](#table-of-contents)
  - [**Basics**](#basics)
  - [**Mock Functions**](#mock-functions)
    - [**Creating Mock Function**](#creating-mock-function)
      - [**jest.fn()**](#jestfn)
    - [**Mock Implementation**](#mock-implementation)
      - [**jest.fn(implementation)**](#jestfnimplementation)
      - [**mockFn.mockImplementation(implementation)**](#mockfnmockimplementationimplementation)
      - [**mockFn.mockImplementationOnce(implementation)**](#mockfnmockimplementationonceimplementation)
    - [**Mock Return Value**](#mock-return-value)
      - [**mockFn.mockReturnValue(value)**](#mockfnmockreturnvaluevalue)
      - [**mockFn.mockReturnValueOnce(value)**](#mockfnmockreturnvalueoncevalue)
    - [**Mock Promise**](#mock-promise)
      - [**Mock Resolved Promise**](#mock-resolved-promise)
        - [**mockFn.mockResolvedValue(value)**](#mockfnmockresolvedvaluevalue)
        - [**mockFn.mockResolvedValueOnce(value)**](#mockfnmockresolvedvalueoncevalue)
      - [**Mock Rejected Promise**](#mock-rejected-promise)
        - [**mockFn.mockRejectedValue(value)**](#mockfnmockrejectedvaluevalue)
        - [**mockFn.mockRejectedValueOnce(value)**](#mockfnmockrejectedvalueoncevalue)
    - [**Spy On Mock Interaction**](#spy-on-mock-interaction)
      - [**mockFn.mock.calls**](#mockfnmockcalls)
      - [**mockFn.mock.lastCall**](#mockfnmocklastcall)
      - [**mockFn.mock.results**](#mockfnmockresults)
      - [**mockFn.mock.instances**](#mockfnmockinstances)
      - [**mockFn.mock.contexts**](#mockfnmockcontexts)
    - [**Resetting Mock Function**](#resetting-mock-function)
      - [**mockFn.mockClear() / jest.clearAllMocks()**](#mockfnmockclear--jestclearallmocks)
      - [**mockFn.mockReset() / jest.resetAllMocks()**](#mockfnmockreset--jestresetallmocks)
      - [**mockFn.mockRestore() / jest.restoreAllMocks()**](#mockfnmockrestore--jestrestoreallmocks)
  - [**Mock Class**](#mock-class)
    - [**Mock Without Fake Implementation Of Methods**](#mock-without-fake-implementation-of-methods)
    - [**Mock With Fake Implementation Of Methods**](#mock-with-fake-implementation-of-methods)
      - [**Manual Mock In Folder \_\_mocks\_\_**](#manual-mock-in-folder-__mocks__)
      - [**Mock With Module Factory**](#mock-with-module-factory)
        - [**Class Is Default Export**](#class-is-default-export)
        - [**Class Is Not Default Export**](#class-is-not-default-export)
      - [**Mock Only Specific Methods**](#mock-only-specific-methods)
    - [**Mock Static Methods**](#mock-static-methods)
    - [**Mock Getter Methods**](#mock-getter-methods)
  - [**Mock Modules**](#mock-modules)
    - [**Mock Complete Module**](#mock-complete-module)
    - [**Mock Parts Of Module**](#mock-parts-of-module)
      - [**Example 1**](#example-1)
      - [**Example 2**](#example-2)

<br>
<br>
<br>
<br>

## **Basics**
<br>

- used to replace external dependencies with fake implementations that capture interaction (calls, parameters)

<br>
<br>
<br>
<br>

## **Mock Functions**
<br>
<br>
<br>

### **Creating Mock Function**
<br>
<br>

#### **jest.fn()**
<br>

```
jest.fn()
```

<br>

Example:

```typescript
const mockFn = jest.fn();
```
- `mockFn` returns `undefined` when called

<br>
<br>

### **Mock Implementation**
<br>
<br>

#### **jest.fn(implementation)**
<br>

```javascript
const mockFn = jest.fn((x) => x*2);

expect(mockFn(1)).toBe(2);       // pass
expect(mockFn(2)).toBe(3);       // fail
```

<br>
<br>

#### **mockFn.mockImplementation(implementation)**
<br>

```javascript
const mockFn = jest.fn();
mockFn.mockImplementation((x) => x*2);

expect(mockFn(1)).toBe(2);       // pass
expect(mockFn(2)).toBe(3);       // fail
```

- shorthand for [`jest.fn(implementation)`](#jestfnimplementation)

<br>
<br>

#### **mockFn.mockImplementationOnce(implementation)**
<br>

```javascript
const mockFn = jest.fn();
mockFn.mockImplementationOnce((x) => x*2);
mockFn.mockImplementationOnce((x) => x*10);

expect(mockFn(1)).toBe(2);             // pass
expect(mockFn(2)).toBe(20);            // pass
expect(mockFn(3)).toBe(undefined);     // pass
```
- specify implementation that is removed when called
- can be chained

<br>
<br>

### **Mock Return Value**
<br>
<br>

#### **mockFn.mockReturnValue(value)**
<br>

```typescript
const mockFn = jest.fn();
mockFn.mockReturnValue('foo');

expect(mockFn()).toBe('foo');           // pass
expect(mockFn()).toBe('foo');           // pass
```
- shorthand for  `jest.fn().mockImplementation(() => value)`
  
<br>
<br>

#### **mockFn.mockReturnValueOnce(value)**
<br>

```typescript
const mockFn = jest.fn();
mockFn.mockReturnValueOnce('foo');
mockFn.mockReturnValueOnce('bar');

expect(mockFn()).toBe('foo');          // pass
expect(mockFn()).toBe('bar');          // pass
expect(mockFn()).toBe(undefined);      // pass
```

- shorthand for  `jest.fn().mockImplementationOnce(() => value)`
- specify implementation that is removed when called
- can be chained

<br>
<br>

### **Mock Promise**
<br>
<br>

#### **Mock Resolved Promise**
<br>
<br>

##### **mockFn.mockResolvedValue(value)**
<br>

```javascript
const asyncMockFn = jest.fn();
asyncMockFn.mockResolvedValue('resolveValue');

await expect(asyncMockFn()).resolves.toBe('resolveValue');     // pass
await expect(asyncMockFn()).resolves.toBe('resolveValue');     // pass
```

- shorthand for `jest.fn().mockImplementation(() => Promise.resolve(value))`

<br>
<br>

##### **mockFn.mockResolvedValueOnce(value)**
<br>

```javascript
const asyncMockFn = jest.fn();
asyncMockFn.mockResolvedValueOnce('resolveValue1');
asyncMockFn.mockResolvedValueOnce('resolveValue2');

await expect(asyncMockFn()).resolves.toBe('resolveValue1');    // pass
await expect(asyncMockFn()).resolves.toBe('resolveValue2');    // pass
```

- shorthand for `jest.fn().mockImplementationOnce(() => Promise.resolve(value))`
- specify resolved value that is removed removed when mock function is called
- can be chained

<br>
<br>

#### **Mock Rejected Promise**
<br>
<br>

##### **mockFn.mockRejectedValue(value)**
<br>

```javascript
const asyncMockFn = jest.fn();
asyncMockFn.mockRejectedValue('rejectValue');

await expect(asyncMockFn()).rejects.toBe('rejectValue');       // pass
```

- shorthand for `jest.fn().mockImplementation(() => Promise.reject(value))`

<br>
<br>

##### **mockFn.mockRejectedValueOnce(value)**
<br>

```javascript
const asyncMockFn = jest.fn();
asyncMockFn.mockRejectedValueOnce('rejectValue1');
asyncMockFn.mockRejectedValueOnce('rejectValue2');

await expect(asyncMockFn()).rejects.toBe('rejectValue1');      // pass
await expect(asyncMockFn()).rejects.toBe('rejectValue2');      // pass
```

- shorthand for `jest.fn().mockImplementationOnce(() => Promise.reject(value))`

<br>
<br>

### **Spy On Mock Interaction**
<br>
<br>

#### **mockFn.mock.calls**
<br>

- returns a two-dimensional array containing the arguments of each call of the mock function
- `mockFn.mock.calls.length` returns the number of calls of the mock function
- `mockFn.mock.calls[<callIndex>][<parameterIndex>]` returns specified parameter of specified call

<br>

```javascript
const mockFn = jest.fn();
mockFn('arg1');
mockFn('arg1', 'arg2');
mockFn('arg1', 2, 3);

mockFn.mock.calls;           // [ [ 'arg1' ], [ 'arg1', 'arg2' ], [ 'arg1', 2, 3 ] ]
mockFn.mock.calls.length;    // 3
mockFn.mock.calls[1][1];     // arg2
```

<br>
<br>

#### **mockFn.mock.lastCall**
<br>

- returns an array containing the arguments of the most recent call of the mock function

<br>

```javascript
const mockFn = jest.fn();
mockFn('arg1');
mockFn('arg1', 'arg2');

mockFn.mock.lastCall;         // [ 'arg1', 'arg2' ]
```

<br>
<br>

#### **mockFn.mock.results**
<br>

- returns an array of objects containing the result of each call of the mock function
- `mockFn.mock.results[<callIndex>].value` returns value of specified call

<br>

Object:

```javascript
{
   type: 'return' | 'throw' | 'incomplete',
   value: 'someValue'
}
```

<br>

```javascript
const mockFn = jest.fn();
mockFn.mockImplementationOnce((x) => x*2);
mockFn.mockImplementationOnce(() => 'SomeReturn');
mockFn.mockImplementationOnce(() => { throw new Error('Error Message'); });

mockFn(4);
mockFn();
try {
   mockFn();
} catch(e) {}

mockFn.mock.results;    

/*
   [
      { type: 'return', value: 8 },
      { type: 'return', value: 'SomeReturn' },
      { type: 'throw',  value: Error: Error Message }
   ]
*/
```

<br>
<br>

#### **mockFn.mock.instances**
<br>

- returns an array of all objects instantiated by mock function using `new` keyword

<br>

```javascript
const mockFn = jest.fn();
new mockFn();
new mockFn();
new mockFn();

mockFn.mock.instances;     // [ mockConstructor {}, mockConstructor {}, mockConstructor {} ]
```

<br>
<br>

#### **mockFn.mock.contexts**
<br>

- returns an array of all objects that the mock receives as `this` value per call 

<br>

```javascript
const context1 = { a: 'context1' };
const context2 = { a: 'context2' };

const mockFn = jest.fn();
mockFn.apply(context1);
mockFn.apply(context2);
mockFn();

console.log(mockFn.mock.contexts);     // [ { a: 'context1' }, { a: 'context2' }, undefined ]
```

<br>
<br>

### **Resetting Mock Function**
<br>
<br>

#### **mockFn.mockClear() / jest.clearAllMocks()**
<br>

- clears all spy information like
  - [mockFn.mock.calls](#mockfnmockcalls)
  - [mockFn.mock.lastCall](#mockfnmocklastcall)
  - [mockFn.mock.results](#mockfnmockresults)
  - [mockFn.mock.instances](#mockfnmockinstances)
  - [mockFn.mock.contexts](#mockfnmockcontexts)

<br>

```javascript
const mockFn = jest.fn((x) => x*2);
mockFn(1);
mockFn(1, 2);

mockFn.mock.calls;         // [ [ 'arg1' ], [ 'arg1', 'arg2' ] ]

mockFn.mockClear();

mockFn.mock.calls;         // []

mockFn(2);                 // 4
```

<br>
<br>

#### **mockFn.mockReset() / jest.resetAllMocks()**
<br>

- clears all mock implementations
- clears all spy information like
  - [mockFn.mock.calls](#mockfnmockcalls)
  - [mockFn.mock.lastCall](#mockfnmocklastcall)
  - [mockFn.mock.results](#mockfnmockresults)
  - [mockFn.mock.instances](#mockfnmockinstances)
  - [mockFn.mock.contexts](#mockfnmockcontexts)

<br>

```javascript
const mockFn = jest.fn((x) => x*2);
mockFn(1);
mockFn(1, 2);

mockFn.mock.calls;         // [ [ 'arg1' ], [ 'arg1', 'arg2' ] ]

mockFn.mockReset();

mockFn.mock.calls;         // []

mockFn(2);                 // undefined
```

<br>
<br>

#### **mockFn.mockRestore() / jest.restoreAllMocks()**
<br>

> Only works for mocks created with `jest.spy()`!

<br>

- clears all mock implementations
- restores non-mocked functionality
- clears all spy information like
  - [mockFn.mock.calls](#mockfnmockcalls)
  - [mockFn.mock.lastCall](#mockfnmocklastcall)
  - [mockFn.mock.results](#mockfnmockresults)
  - [mockFn.mock.instances](#mockfnmockinstances)
  - [mockFn.mock.contexts](#mockfnmockcontexts)

<br>
<br>
<br>
<br>

## **Mock Class**
<br>
<br>
<br>

### **Mock Without Fake Implementation Of Methods**
<br>

- use automatic mock with `jest.mock('path/to/class')`
- spy information for method can be accessed via `classMock.mock.instances[index].methodName.mock`

<br>

Person.js

```javascript
export class Person {
   firstName;
   lastName;

   constructor(firstName, lastName) {
      this.firstName = firstName;
      this.lastName = lastName;
   }

   introduce() {
      return `Hello, my name is ${this.firstName} ${this.lastName}.`;
   }
}
```

<br>

example.test.js

```javascript
jest.mock('./Person');

describe('test suite description', () => {

   it('test description', async () => {  
      expect(Person).not.toHaveBeenCalled();          // pass

      const johnDoe = new Person('John', 'Doe'); 
      
      expect(Person).toHaveBeenCalledTimes(1);        // pass

      expect(johnDoe.introduce()).toBeUndefined();    // pass

      expect(Person.mock.instances[0].introduce.mock.calls).toHaveLength(1);    // pass
   }); 

});
```

<br>
<br>
<br>

### **Mock With Fake Implementation Of Methods**
<br>
<br>

#### **Manual Mock In Folder \_\_mocks\_\_**
<br>

- save manually mocked class into folder `__mocks__`

<br>

./test/\_\_mocks\_\_/Person.js

```javascript
const introduce = jest.fn();

const mock = jest.fn().mockImplementation(
   () => {
      return { introduce };
   }
);

export { mock };
```

<br>

./test/person.test.js

```javascript
import { Person } from "../src/Person";

jest.mock('../src/Person');

describe('test suite description', () => {

   it('test description', async () => {
      expect(Person).not.toHaveBeenCalled();                                     // pass
      const johnDoe = new Person('John', 'Doe'); 
      expect(Person).toHaveBeenCalledTimes(1);                                   // pass

      expect(johnDoe.introduce()).toBeUndefined();                               // pass

      expect(Person.mock.instances[0].introduce.mock.calls).toHaveLength(1);     // pass
   }); 

});
```

<br>
<br>

#### **Mock With Module Factory**
<br>
<br>

##### **Class Is Default Export**

```javascript
import Person from './Person';                                    // Class Person is the default export

const mockIntroduce = jest.fn(() => 'mockedIntroduce');

jest.mock('./Person', () => {
   return jest.fn().mockImplementation(() => {
      return { introduce: mockIntroduce };
   });
});

describe('test suite description', () => {

   it('test description', () => {
      expect(Person).not.toHaveBeenCalled();                      // pass
      const johnDoe = new Person('John', 'Doe');
      expect(Person).toHaveBeenCalled();                          // pass
      expect(johnDoe.introduce()).toEqual('mockedIntroduce');     // pass
   });

});
```

<br>
<br>

##### **Class Is Not Default Export**

```javascript
import { Person } from '../src/Person';

const mockIntroduce = jest.fn(() => 'mockedIntroduce');

jest.mock('../src/Person', () => {
   return {
      Person: jest.fn().mockImplementation(() => {
         return { introduce: mockIntroduce };
      })
   };
});

describe('test suite description', () => {

   it('test description', () => {
      expect(Person).not.toHaveBeenCalled();
      const johnDoe = new Person('John', 'Doe');
      expect(Person).toHaveBeenCalled();
      expect(johnDoe.introduce()).toEqual('mockedIntroduce');
   });

});
```

<br>
<br>

#### **Mock Only Specific Methods**
<br>
<br>

```javascript
const mockPerson = jest
   .spyOn(Person.prototype, 'introduce')
   .mockImplementation(() => 'mockedIntroduce');

describe('test suite description', () => {

   it('test description', async () => {
      const johnDoe = new Person('John', 'Doe'); 
      
      expect(johnDoe.introduce()).toBe('mockedIntroduce');
      expect(mockPerson).toHaveBeenCalled();
   }); 

});
```

<br>
<br>
<br>

### **Mock Static Methods**
<br>

```javascript
const mockStaticMethod = jest
   .spyOn(ClassName, 'methodName')
   .mockImplementation(() => { /* implementation */ });
```

<br>
<br>
<br>

### **Mock Getter Methods**
<br>

```javascript
const mockGetterMethod = jest
   .spyOn(ClassName.prototype, 'methodName', 'get')
   .mockImplementation(() => { /* implementation */ })
```

<br>
<br>
<br>
<br>

## **Mock Modules**
<br>

```
jest.mock(moduleName, ?factory, ?options)
```

<br>
<br>

### **Mock Complete Module**
<br>

externalModule.js

```javascript
const externalModule = { 
  foo: (x) => x * 2,
  bar: (x) => x * 10
};

export { externalModule };
```

<br>

example.test.js

```javascript
// mock all module functions with empty implementation
jest.mock('./externalModule.js');

describe('test suite description', () => {

   it('test description', async () => {
      externalModule.foo.mockReturnValue('mockedFoo');
   
      expect(externalModule.foo(2)).toBe('mockedFoo');
      expect(externalModule.bar(2)).toBe(undefined);
   }); 

});
```

<br>
<br>

### **Mock Parts Of Module**
<br>
<br>

#### **Example 1**
<br>

externalModule.js:
```javascript
const foo = (x) => x * 2;
const bar = (x) => x * 10;

export { foo, bar };
```

<br>

example1.test.js

```javascript
// mock only function 'bar' from externalModule and keep implementation of other function
jest.mock('./externalModule.js', () => {
   return {
      __esModule: true,
      ...jest.requireActual('./externalModule.js'),
      bar: jest.fn((x) => 'mockedBar')
   };
});

describe('test suite description', () => {

   it('test description', async () => {
      expect(foo(2)).toBe(4);               // pass
      expect(bar(2)).toBe('mockedBar');     // pass
   }); 

});
```

<br>
<br>

#### **Example 2**
<br>

externalModule.js

```javascript
const externalModule = { 
   foo: (x) => x * 2,
   bar: (x) => x * 10
};

export { externalModule };
```

<br>

example2.test.js

```javascript
// mock only method 'bar' from externalModule and keep implementation of other methods
jest.mock('./externalModule.js', () => {
   const original = jest.requireActual('./externalModule.js');

   return {
      __esModule: true,
      externalModule: {
         ...original.externalModule,
         foo: jest.fn((x) => 'mockedFoo')
      }
   };
});

describe('test suite description', () => {

   it('test description', async () => {   
      expect(externalModule.foo(2)).toBe('mockedFoo');
      expect(externalModule.bar(2)).toBe(20);
   }); 

});
```