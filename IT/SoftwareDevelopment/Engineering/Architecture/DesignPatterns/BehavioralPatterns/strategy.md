# **Strategy**
<br>

## **Table Of Contents**
<br>

- [**Strategy**](#strategy)
  - [**Table Of Contents**](#table-of-contents)
  - [**Intent**](#intent)
  - [**Core Ideas**](#core-ideas)
  - [**Structure**](#structure)
  - [**Use Cases**](#use-cases)
  - [**Consequences**](#consequences)
  - [**Implementation Tips**](#implementation-tips)
  - [**Example**](#example)
    - [**Strategy**](#strategy-1)
    - [**Context**](#context)

<br>
<br>
<br>
<br>

## **Intent**

Family of interchangeable algorithms that all solve the same problem in a different way.

<br>
<br>
<br>
<br>

## **Core Ideas**

- Extract a common interface for the interaction between the *context* object and the algorithms
- Implement each algorithm as a separate *strategy* object
- Client passes a *strategy* object to the *context* object
- *Context* object delegates work to the *strategy* object

<br>
<br>
<br>
<br>

## **Structure**

![Strategy](./picture/strategy.drawio.svg)

<br>
<br>
<br>
<br>

## **Use Cases**

- We want to be able to solve the a problem with various algorithms
- We want to dynamically change the algorithm
- We want to isolate the business logic from the implementation details

<br>
<br>
<br>
<br>

## **Consequences**
<br>

|**Advantages**                           |**Disadvantages** |
|:----------------------------------------|:-----------------|
|Dynamic change of algorithm              |May be too complicated for only a few algorithm variants |
|Isolate and reuse implementation details |Client must choose algorithm

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

### **Strategy**

```typescript
interface SortStrategy {
  execute(list: number[]): number[];
}
```

<br>

```typescript
class AscendingSortStrategy implements SortStrategy {
  public execute(list: number[]) {
    return list.toSorted((a, b) => a - b);
  }
}
```

<br>

```typescript
class DescendingSortStrategy implements SortStrategy {
  public execute(list: number[]) {
    return list.toSorted((a, b) => b - a);
  }
}
```

<br>
<br>
<br>

### **Context**

```typescript
class Context {
  private strategy: Strategy;
  private list: number[];

  public setStrategy(strategy: Strategy) {
    this.strategy = strategy;
  }

  public getSortedList() {
    if (this.strategy) {
      return this.strategy.execute(this.list);
    }
  }
}
```
