# **React TypeScript Support**
<br>

## **Table Of Contents**
<br>

- [**React TypeScript Support**](#react-typescript-support)
  - [**Table Of Contents**](#table-of-contents)
  - [**Enable TypeScript Support**](#enable-typescript-support)
  - [**Typing**](#typing)
    - [**Components**](#components)
      - [**Functional Component**](#functional-component)
    - [**Hooks**](#hooks)
      - [**UseState**](#usestate)
    - [**Event Handling**](#event-handling)
      - [**Change Event**](#change-event)

<br>
<br>
<br>
<br>

## **Enable TypeScript Support**
<br>

1. Install TypeScript

```bash
npm install typescript --save-dev
```

<br>

2. Install React Type Package

```bash
npm install @types/react @types/react-dom --save-dev 
```

<br>

3. Add `tsconfig.json`:

```json
{
  "compilerOptions": {
    "noImplicitAny": true,
    "sourceMap": true,
    "module": "CommonJS",
    "target": "ES2021",
    "jsx": "react-jsxdev",
    "strict": true,
    "esModuleInterop": true
  }
}
```

<br>

4. Change all `.jsx` files to `.tsx`

<br>
<br>
<br>
<br>

## **Typing**
<br>
<br>
<br>

### **Components**
<br>
<br>

#### **Functional Component**
<br>

```typescript
import { ReactElement } from 'react';
import React from 'react';

type ComponentNameProps = {
    parameter1: string
}

function ComponentName(props: ComponentNameProps): ReactElement {
  return (/* JSX */);
}

// ComponentName is of type FunctionComponent<ComponentNameProps>
```

<br>
<br>
<br>

### **Hooks**
<br>
<br>

#### **UseState**
<br>

```typescript
import { ReactElement, useState } from 'react';
import React from 'react';

type ComponentNameProps = {
    parameter1: string
}

function ComponentName(props: ComponentNameProps): ReactElement {
    const [someState, setSomeState] = useState('initialValue');  
    // state type is derived to string

    const [otherState, setOtherState] = useState<string>('initialValue);
    // state type is explicitly set to string

    return (/* JSX */);
}
```

<br>
<br>
<br>

### **Event Handling**
<br>
<br>

#### **Change Event**
<br>

```typescript
import { ChangeEvent, ChangeEventHandler, ReactElement, useState } from 'react';
import React from 'react';


function NameInput(props): ReactElement {

    function handleChange(event: ChangeEvent<HTMLInputElement>) {
        console.log(event.target.value);
    }
    // handleChange is of type ChangeEventHandler<HTMLInputElement>

    return (
        <input type='text' onChange={handleUpdate} />
    );
}
```

<br>

Example:

```tsx
import { ChangeEvent, ChangeEventHandler, ReactElement, useState } from 'react';
import React from 'react';

type NameInputProps = {
    defaultText: string,
    optionList: string[]
};

function NameInput(props: NameInputProps): ReactElement {
    const [inputText, setInputText] = useState(props.defaultText);
    const [selectedOption, setSelectedOption] = useState(props.optionList[0]);


    function handleInputUpdate(event: ChangeEvent<HTMLInputElement>) {
        setInputText(event.target.value)
    }


    function handleSelectionUpdate(event: ChangeEvent<HTMLSelectElement>) {
        setSelectedOption(event.target.value);
    }


    return (
        <React.Fragment>
            <input type='text' value={inputText} onChange={handleInputUpdate} />
            <select value={selectedOption} onChange={handleSelectionUpdate}>
                {props.optionList.map((optionName: string) => <option value={optionName}>{optionName}</option>)}
            </select>
            <p>{`Your input: ${inputText}`}</p>
            <p>{`Your selection: ${selectedOption}`}</p>
        </React.Fragment>
    );
}

```

```tsx
<NameInput defaultText='This is the default text' optionList={['A', 'B', 'C']}/>
```