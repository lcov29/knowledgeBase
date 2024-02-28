# **Decorator**
<br>

## **Table Of Contents**
<br>

- [**Decorator**](#decorator)
  - [**Table Of Contents**](#table-of-contents)
  - [**Intent**](#intent)
  - [**Core Ideas**](#core-ideas)
  - [**Structure**](#structure)
  - [**Use Cases**](#use-cases)
  - [**Consequences**](#consequences)
  - [**Implementation Tips**](#implementation-tips)
  - [**Example**](#example)
    - [**Component**](#component)
    - [**ConcreteComponent**](#concretecomponent)
    - [**Decorator**](#decorator-1)
    - [**Concrete Decorator**](#concrete-decorator)
    - [**Client**](#client)

<br>
<br>
<br>
<br>

## **Intent**

Dynamic extension of the behavior of a target object by a wrapper object.

<br>
<br>
<br>
<br>

## **Core Ideas**

- The wrapper and target object implement the same interface
- The wrapper object holds a reference to the target object and delegates its work to it
- The wrapper object extends the behavior of the target object

<br>
<br>
<br>
<br>

## **Structure**

![Decorator](./picture/decorator.drawio.svg)

<br>
<br>
<br>
<br>

## **Use Cases**

- We want to dynamically add and remove changes to the base behavior of an object
- It is inconvenient to extend an object behavior via inheritance
<br>
<br>
<br>
<br>

## **Consequences**
<br>

|**Advantages**                           |**Disadvantages**          |
|:----------------------------------------|:--------------------------|
|Dynamic extension of the object behavior |Creates many small objects |
|Combine different behaviors by wrapping an object in multiple decorators

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

### **Component**

```typescript
interface Writer {
  write(text: string): void;
}
```

<br>
<br>
<br>

### **ConcreteComponent**

```typescript
class TextWriter implements Writer {
  public write(text: string) {
    console.log(text);
  }
}
```

<br>
<br>
<br>

### **Decorator**

```typescript
class WriterDecorator implements Writer {
  protected writer: Writer;

  constructor(writer: Writer) {
    this.writer = writer;
  }

  public write(text: string) {
    // delegate work to wrapped writer
    this.writer.write(text);
  }
}
```

<br>
<br>
<br>

### **Concrete Decorator**

```typescript
class CapsWriterDecorator extends WriterDecorator {
  public write(text: string) {
    const textInCaps = text.toUpperCase();
    super.write(textInCaps;)
  }
}
```

<br>

```typescript
class ParenthesisWriterDecorator extends WriterDecorator {
  public write(text: string) {
    const textInParenthesis = `(${text})`;
    super.write(textInParenthesis);
  }
}
```

<br>
<br>
<br>

### **Client**

```typescript
class Client {
  private writer: Writer;

  constructor() {
    const textWriter = new TextWriter();
    const capsDecorator = new CapsWriterDecorator(textWriter);
    this.writer = new ParenthesisWriterDecorator(capsDecorator);
  }

  public sayHello(): void {
    this.writer.write('Hello World!');
  }
}
```
