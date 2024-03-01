# **Command**
<br>

## **Table Of Contents**
<br>

- [**Command**](#command)
  - [**Table Of Contents**](#table-of-contents)
  - [**Intent**](#intent)
  - [**Core Ideas**](#core-ideas)
  - [**Structure**](#structure)
  - [**Use Cases**](#use-cases)
  - [**Consequences**](#consequences)
  - [**Implementation Tips**](#implementation-tips)
  - [**Example**](#example)
    - [**Receiver**](#receiver)
    - [**Command**](#command-1)
    - [**Sender**](#sender)

<br>
<br>
<br>
<br>

## **Intent**

Model a request as a separate command object to use it as a method argument or to enable queues or logging.

<br>

```mermaid
flowchart LR
  S[Sender]
  R[Receiver]
  C[Command Object]
  S -.- C -.-> R
```

<br>
<br>
<br>
<br>

## **Core Ideas**

- *Sender* invokes the stored *command* object
- *Command* object holds all information about the request
- *Command* object delegates the work to the *receiver* object

<br>
<br>
<br>
<br>

## **Structure**

![Command](./picture/command.drawio.svg)

<br>
<br>
<br>
<br>

## **Use Cases**

- We want to queue or schedule command executions
- We want to be keep a history of executed commands
- We want to revert commands
- We want to parametrize objects with operations

<br>
<br>
<br>
<br>

## **Consequences**
<br>

|**Advantages** |**Disadvantages** |
:---------------|:-----------------|
|Separates command logic from invocation location |More complicated code due to additional command objects |
|Prevents code duplication when command can be invoked from multiple locations | |
|Commands can be stored and reverted | |

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

### **Receiver**

```typescript
class Storage {

  private db: DataBase;

  constructor(db: Database) {
    this.db = db;
  }

  public storeData(data: string) {
    const sanitizedData = db.sanitize(data);
    db.store(sanitizedData);
  }
}
```

<br>
<br>
<br>

### **Command**

```typescript
interface Command {
  execute(): void;
}
```

<br>

```typescript
class StoreDataCommand implements Command {
  private data: string;
  private storage: Storage;

  constructor(data: string, storage: Storage) {
    this.data = data;
    this.storage = storage;
  }

  public set data(data: string) {
    this.data = data;
  }

  public execute() {
    this.storage.storeData(this.data);
  }
}
```

<br>
<br>
<br>

### **Sender**

```typescript
class FileEditor {
  private storeCommand: Command;
  private fileContent: string;

  constructor(storeCommand: Command) {
    this.storeCommand = storeCommand;
  }

  public editText() {
    // implementation
  }

  public save() {
    this.storeCommand.data = this.fileContent;
    this.storeCommand.execute();
  }
}
```
