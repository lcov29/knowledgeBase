# **State**
<br>

## **Table Of Contents**
<br>

- [**State**](#state)
  - [**Table Of Contents**](#table-of-contents)
  - [**Intent**](#intent)
  - [**Core Ideas**](#core-ideas)
  - [**Structure**](#structure)
  - [**Use Cases**](#use-cases)
  - [**Consequences**](#consequences)
  - [**Implementation Tips**](#implementation-tips)
  - [**Example**](#example)
    - [**Context**](#context)
    - [**State**](#state-1)

<br>
<br>
<br>
<br>

## **Intent**

Alter the behavior of an object based on its state.

<br>
<br>
<br>
<br>

## **Core Ideas**

- Extract each state-specific behavior into a separate *state* object
- The *context* object holds one specific *state* object at each time
- *State* objects can know other state objects and can initiate transitions to them


<br>
<br>
<br>
<br>

## **Structure**

![State](./picture/state.drawio.svg)

<br>
<br>
<br>
<br>

## **Use Cases**

- We want to modify the behavior of an object based on its stats

<br>
<br>
<br>
<br>

## **Consequences**
<br>

|**Advantages**             |**Disadvantages** |
|:--------------------------|:-----------------|
|Removes state conditionals |May be too complicated if there are only a few states |

<br>
<br>
<br>
<br>

## **Implementation Tips**

\-

<br>
<br>
<br>
<br>

## **Example**
<br>
<br>

### **Context**

```typescript
class Context {
  private state: State;
  private text: string;

  constructor(initialState: State, text: string) {
    this.state = initialState;
    this.text = text;
  }

  changeState(state: State) {
    this.state = state;
  }

  actionA() {
    this.state.actionA();
  }
}
```

<br>
<br>
<br>

### **State**

```typescript
interface State {
  action(): void;
}
```

<br>

```typescript
class StateA implements State {
  private context: Context;

  constructor(context: Context) {
    this.context = context;
  }

  action() {
    console.log(`StateA.action: ${this.context.text}`);
  }
}
```

<br>

```typescript
class StateB implements State {
  private context: Context;

  constructor(context: Context) {
    this.context = context;
  }

  action() {
    console.log(`StateB.action: ${this.context.text}`);
  }
}
```