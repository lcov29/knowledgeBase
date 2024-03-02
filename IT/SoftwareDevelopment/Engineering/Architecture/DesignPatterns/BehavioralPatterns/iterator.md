# **Iterator**
<br>

## **Table Of Contents**
<br>

- [**Iterator**](#iterator)
  - [**Table Of Contents**](#table-of-contents)
  - [**Intent**](#intent)
  - [**Core Ideas**](#core-ideas)
  - [**Structure**](#structure)
  - [**Use Cases**](#use-cases)
  - [**Consequences**](#consequences)
  - [**Implementation Tips**](#implementation-tips)
  - [**Example**](#example)
    - [**Iterator**](#iterator-1)
    - [**Data Structure**](#data-structure)

<br>
<br>
<br>
<br>

## **Intent**

Traverse data collection without exposing the underlying data structure.

<br>
<br>
<br>
<br>

## **Core Ideas**

- Extract the traversal of the data structure into a *iterator* object
- *Iterator* object holds all information about the iteration it represents

<br>
<br>
<br>
<br>

## **Structure**

![Iterator](./picture/iterator.drawio.svg)

<br>
<br>
<br>
<br>

## **Use Cases**

- We want to hide a data structure
- We want to to execute multiple traversals on the same data structure concurrently
- We want to dynamically switch the traversal algorithm
- We want to traverse a dynamically passed data structure

<br>
<br>
<br>
<br>

## **Consequences**
<br>

|**Advantages** |**Disadvantages** |
|:--------------|:-----------------|
|Allows concurrent iterations | |
|Encapsulates iteration alogrithm and data structure | |

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
<br>

### **Iterator**

```typescript
interface Iterator<TData> {
  getCurrentItem(): TData;
  next(): void;
  hasNext(): boolean;
}
```

<br>

```typescript
class ReverseIterator<TData> implements Iterator<TData> {
  private dataStructure: TData[];
  private currentIndex: number;

  constructor(dataStructure: TData[]) {
    this.dataStructure = dataStructure;
    this.currentIndex = dataStructure.length;
  }

  getCurrentItem(): TData {
    return this.dataStructure[this.currentIndex];
  }

  next(): void {
    if (this.currentIndex > 0) {
      this.currentIndex--;
    }
  }

  hasNext(): boolean {
    return this.currentIndex > 0;
  }
}
```

<br>
<br>
<br>

### **Data Structure**

```typescript
interface Iterable {
  createIterator(): Iterator;
}
```

<br>

```typescript
class DataStructure implements Iterable {
  private data: number[];

  constructor(data: number[]) {
    this.data = data;
  }

  createIterator(): Iterator {
    return new ReverseIterator<number>(this.data);
  }
}
```

