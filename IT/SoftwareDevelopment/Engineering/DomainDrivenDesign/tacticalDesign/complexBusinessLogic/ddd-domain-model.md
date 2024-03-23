# **DDD - Domain Model**
<br>

## **Table Of Contents**

- [**DDD - Domain Model**](#ddd---domain-model)
  - [**Table Of Contents**](#table-of-contents)
  - [**Definition**](#definition)
  - [**Components**](#components)
    - [**Value Object**](#value-object)
      - [**Definition**](#definition-1)
      - [**Advantages**](#advantages)
      - [**Heuristics**](#heuristics)
    - [**Entity**](#entity)
    - [**Aggregate**](#aggregate)
      - [**Commands**](#commands)

<br>
<br>
<br>
<br>

## **Definition**

> A **domain model** contains the data and the behavior of the domain objects.  
> The data is modeled as *Plain Old Objects*.

- used for complex business logic (complex state transitions, business rules and invariants)

<br>
<br>
<br>
<br>

## **Components**
<br>
<br>
<br>

### **Value Object**
<br>
<br>

#### **Definition**

> A **value object** is an immutable object that can be identified by the combination of its values.

<br>

Example:

```typescript
class Color {
   private red: number;
   private green: number;
   private blue: number;

   // implementation
}
```

<br>
<br>

#### **Advantages**

- value objects encapsulate related business logic like validation
- value objects do not have any side effects
- code becomes more descriptive


<br>
<br>

#### **Heuristics**

> Use value objects whenever it is possible.

<br>

> Use value objects for domain objects that are used as traits of other domain objects.

<br>
<br>
<br>

### **Entity**
<br>

> An **entity** is an object that can only be identified by a separate id property.

<br>

Example:

```typescript
class Person {
   public id: UserId;
   public name: Name;

   // implementation
}
```

<br>
<br>
<br>

### **Aggregate**
<br>

> An **aggregate** is an entity that references other entities and ensures the consistency of the data according to the business rules.

<br>
<br>

#### **Commands**
<br>

> **Commands** are all methods of the aggregate´s public interface that modify the aggregate data.

<br>

Commands can be implemented directly as a *public method* or a *parameter object*.

<br>

```typescript
addUser(id: UserId, name: Name) {
  // implementation
}

changeUserName(id: UserId, newName: Name) {
  // implementation
}
```

<br>

```typescript
execute(command: AddUser) {
  // implementation
}

execute(command: ChangeUserName) {
  // implementation
}
```
