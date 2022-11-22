# **React Installation**
<br>

## **Table Of Contents**
<br>

- [**React Installation**](#react-installation)
  - [**Table Of Contents**](#table-of-contents)
  - [**Installation Options**](#installation-options)
    - [**Add React Directly To Website**](#add-react-directly-to-website)
    - [**Add React Directly To Website With JSX Support (For Demonstration Purposes Only)**](#add-react-directly-to-website-with-jsx-support-for-demonstration-purposes-only)
    - [**Create React App**](#create-react-app)

<br>
<br>
<br>

## **Installation Options**
<br>
<br>
<br>

### **Add React Directly To Website**
<br>

HTML
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- for development: -->
    <script src="https://unpkg.com/react@18/umd/react.development.js" crossorigin defer></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js" crossorigin defer></script>

    <!-- for production:
    <script src="https://unpkg.com/react@18/umd/react.production.min.js" crossorigin defer></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js" crossorigin defer></script>
    -->

    <!-- link to our custom component code -->
    <script src="./our-react-component.js" defer></script>
</head>
<body>

    <div id="react-component-root"></div>

</body>
</html>
```

<br>

our-react-component.js
```javascript
class ComponentName extends React.Component {

    constructor() {
      super();
      this.state = { /* implementation */};
    }

    render() {
        return React.createElement(
            type,
            [props],
            [...children]
        );
    }

}

const domContainer = document.getElementById('react-component-root');
const root = ReactDOM.createRoot(domContainer);
root.render(React.createElement(ComponentName));
```

<br>
<br>

Example:

HTML
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>React Test</title>
    <script src="https://unpkg.com/react@18/umd/react.production.min.js" crossorigin defer></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js" crossorigin defer></script>
    <script src="./our-react-component.js" defer></script>
</head>
<body>
    
    <p>HTML before react component</p>

    <div id="react-greeting-button"></div>

    <p>HTML after react component</p>

</body>
</html>
```

<br>

our-react-component.js
```javascript
'use strict';

class GreetingButton extends React.Component {

    constructor() {
      super();
      this.state = { 
        greetingList: [
            'Hello',
            'Hi',
            'Bonjour',
            'Hola',
            'Hallo',
            'Buongiorno',
            'Witam'
        ]
      };
    }

    getRandomArrayIndex() {
        const arrayLength = this.state.greetingList.length;
        return Math.floor(Math.random() * arrayLength);
    }

    render() {
        return React.createElement(
            'button',
            { onClick: () => {
                const randomGreeting = this.state.greetingList[this.getRandomArrayIndex()];
                window.alert(randomGreeting);
            }},
            'Click'
        );
    }
    
}

const domContainer = document.getElementById('react-greeting-button');
const root = ReactDOM.createRoot(domContainer);
root.render(React.createElement(GreetingButton));
```

<br>
<br>
<br>

### **Add React Directly To Website With JSX Support (For Demonstration Purposes Only)**
<br>

HTML
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>React Test</title>
    <script src="https://unpkg.com/react@18/umd/react.production.min.js" crossorigin defer></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js" crossorigin defer></script>
    
    <!-- DO NOT USE IN PRODUCTION! -->
    <script src="https://unpkg.com/babel-standalone@6/babel.min.js" defer></script>
    
    <script type="text/babel">
        
        class ComponentName extends React.Component {

            constructor() {
                super();
                this.state = {/* implementation */};
            }

            render() {
                return (
                    <button onClick={ () => { (/* implementation */) }}>
                        {this.state.propertyName}
                    </button>
                );
            }

        }
    
        const container = document.getElementById('react-greeting-button');
        const root = ReactDOM.createRoot(container);
        root.render(<GreetingButton />);
    
    </script>
</head>
<body>
    
    <p>HTML before react component</p>

    <div id="react-greeting-button"></div>

    <p>HTML after react component</p>

</body>
</html>
```

<br>
<br>

Example:

HTML
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>React Test</title>
    <script src="https://unpkg.com/react@18/umd/react.production.min.js" crossorigin defer></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js" crossorigin defer></script>
    
    <!-- DO NOT USE IN PRODUCTION! -->
    <script src="https://unpkg.com/babel-standalone@6/babel.min.js" defer></script>
    
    <script type="text/babel">
        
        class GreetingButton extends React.Component {

            constructor() {
                super();
                this.state = { 
                    greetingList: [
                        'Hello',
                        'Hi',
                        'Bonjour',
                        'Hola',
                        'Hallo',
                        'Buongiorno',
                        'Witam'
                    ]
                };
            }

            getRandomArrayIndex() {
                const arrayLength = this.state.greetingList.length;
                return Math.floor(Math.random() * arrayLength);
            }

            render() {
                return (
                    <button
                        onClick={ () => {
                            const randomGreeting = this.state.greetingList[this.getRandomArrayIndex()];
                            window.alert(randomGreeting);
                        }}>
                        Click
                    </button>
                );
            }

        }
    
        const container = document.getElementById('react-greeting-button');
        const root = ReactDOM.createRoot(container);
        root.render(<GreetingButton />);
    
    </script>
</head>
<body>
    
    <p>HTML before react component</p>

    <div id="react-greeting-button"></div>

    <p>HTML after react component</p>

</body>
</html>
```

<br>
<br>
<br>

### **Create React App**
<br>

* used for single-page-applications
* alternatives for other purposes can be found [here](https://reactjs.org/docs/create-a-new-react-app.html)

<br>

```bash
npx create-react-app <appName>
cd <appName>
npm start
```