# **Bridge**
<br>

## **Table Of Contents**
<br>

- [**Bridge**](#bridge)
  - [**Table Of Contents**](#table-of-contents)
  - [**Intent**](#intent)
  - [**Core Ideas**](#core-ideas)
  - [**Structure**](#structure)
  - [**Use Cases**](#use-cases)
  - [**Consequences**](#consequences)
  - [**Implementation Tips**](#implementation-tips)
  - [**Example**](#example)
    - [**Abstraction**](#abstraction)
    - [**Implementation**](#implementation)

<br>
<br>
<br>
<br>

## **Intent**

Split single or multiple classes into two independent hierarchies called *Abstraction* and *Implementation*.

<br>
<br>
<br>
<br>

## **Core Ideas**

- Realize bridge between the *Abstraction* and *Implementation* as a composition
- The *Abstraction* is a high-level control layer for other entities

<br>
<br>
<br>
<br>

## **Structure**

![Bridge](./picture/bridge.drawio.svg)

<br>
<br>
<br>
<br>

## **Use Cases**

- We want to expand a hierarchy into two **independent** dimensions.
- We want to divide a big class with several functionality variants
- We want to switch implementations at runtime

<br>
<br>
<br>
<br>

## **Consequences**
<br>

|**Advantages**                             |**Disadvantages** |
|:------------------------------------------|:-----------------|
|*Implementation* can be switched at runtime |Complicated code when the pattern is applied to a class with high cohesion |
|*Abstraction* and *Implementation* can be extended independently from each other | |
|Hide implementation details from client | |

<br>
<br>
<br>
<br>

## **Implementation Tips**

- Identify the dimensions
- Model the abstraction based on the clients needs

<br>
<br>
<br>
<br>

## **Example**
<br>
<br>

### **Abstraction**
<br>

```typescript
class PizzaRestaurant {
  protected pizzaTypes: Pizza[];

  constructor(pizzaTypes: Pizza[]) {
    this.pizzaTypes = pizzaTypes;
  }

  public selectPizza(type: string) {
    const selectedPizzas = this.pizzaTypes.filter(
      (pizza) => pizza.type === type
    );

    if (selectedPizzas.length === 1) {
      return selectedPizzas[0];
    }

    throw new Error('Your specified pizza type is unknown.');
  }

  public preparePizza(pizzaType: Pizza) {
    return pizza.prepare();
  }
}
```

<br>
<br>
<br>

### **Implementation**

```typescript
abstract class Pizza {
  type: string;
  ingredients: string[];

  constructor(type: string, ingredients: string[]) {
    this.type = type;
    this.ingredients = ingredients;
  }

  abstract prepare();
}
```

<br>

```typescript
class AmericanMargherita extends Pizza {
  constructor() {
    super('American Margherita', ['Cheese', 'Tomatoes'])
  }

  public prepare() {
    // implementation
  }
}
```

<br>

```typescript
class ItalianMargherita extends Pizza {
  constructor() {
    super('Italian Margherita', ['Cheese', 'Tomatoes'])
  }

  public prepare() {
    // implementation
  }
}
```