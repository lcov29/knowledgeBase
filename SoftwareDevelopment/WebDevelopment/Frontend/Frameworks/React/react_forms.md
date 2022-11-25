# **React Forms**
<br>
<br>

## **Table Of Contents**
<br>

- [**React Forms**](#react-forms)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Elements**](#elements)
    - [**Textarea**](#textarea)
    - [**Select**](#select)

<br>
<br>
<br>

## **General**
<br>

* mutable state is managed by state property

<br>

```javascript
class Form extends Component {

    state = {propertyName: ''};


    handleChange(event) {
        this.setState({
            [event.target.name]: event.target.value
        });
    }


    handleSubmit(event) { /* implementation */ }


    render() {
        return (
            <form onSubmit={this.handleSubmit.bind(this)}>
                <label>Label Text</label>
                <input name="propertyName" type="text" value={this.state.propertyName} onChange={this.handleChange.bind(this)} />
                <input type="submit" value="Submit" />
            </form>
        );
    }

}
```

<br>
<br>
<br>

## **Elements**
<br>
<br>

### **Textarea**
<br>

```javascript
render() {
    return (
        <form onSubmit={this.handleSubmit.bind(this)}>
            <textarea name="propertyName" value={this.state.textareaValue} onChange={this.handleChange.bind(this)} />
            <input type="submit" value="Submit" />
        </form>
    );
}
```

<br>
<br>

### **Select**
<br>

```javascript
render() {
    return (
        <select name="propertyName" value={this.state.selectOptionValue} onChange={this.handleChange.bind(this)}>
            <option value="option1">OptionText1</option>
            <option value="option2">OptionText2</option>
        </select>
    );
}
```