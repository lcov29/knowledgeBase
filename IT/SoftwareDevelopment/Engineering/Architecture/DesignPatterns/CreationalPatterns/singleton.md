# **Singleton**
<br>

## **Table Of Contents**
<br>

- [**Singleton**](#singleton)
  - [**Table Of Contents**](#table-of-contents)
  - [**Intent**](#intent)
  - [**Core Ideas**](#core-ideas)
  - [**Structure**](#structure)
  - [**Use Cases**](#use-cases)
  - [**Consequences**](#consequences)
  - [**Implementation Tips**](#implementation-tips)
  - [**Example**](#example)

<br>
<br>
<br>
<br>

## **Intent**

Ensure that there is only a single instance of a class with global access.

<br>
<br>
<br>
<br>

## **Core Ideas**

- Create instance on first call
- All subsequent calls return the already created instance

<br>
<br>
<br>
<br>

## **Structure**

![Singleton](./picture/singleton.drawio.svg)

<br>
<br>
<br>
<br>

## **Use Cases**

- We want to control the access to a shared resource (e.g. file or database)
- We want global access to a resource

<br>
<br>
<br>
<br>

## **Consequences**
<br>

|**Advantages**                               |**Disadvantages** |
|:--------------------------------------------|:-----------------|
|Ensure that class has only a single instance |                  |
|Global access to the singleton               |                  |

<br>
<br>
<br>
<br>

## **Implementation Tips**

- declare constructor as private
- save single instance in a static field
- create a static construction function that creates, caches and returns the instance

<br>
<br>
<br>
<br>

## **Example**

```typescript
class Singleton {
  private static instance: Singleton;

  private constuctor() {}

  public static getInstance(): Singleton {
    if (!Singleton.instance) {
      Singleton.instance = new Singleton();
    }
    return Singleton.instance;
  }
}
```