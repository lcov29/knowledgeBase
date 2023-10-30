# **React Forms**
<br>
<br>

## **Table Of Contents**
<br>

- [**React Forms**](#react-forms)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Elements**](#elements)
    - [**Label**](#label)
    - [**Textarea**](#textarea)
    - [**Select**](#select)
    - [**Checkbox**](#checkbox)

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
                <label htmlFor='inputId'>Label Text</label>
                <input id='inputId' name='propertyName' type='text' value={this.state.propertyName} onChange={this.handleChange.bind(this)} />
                <input type='submit' value='Submit' />
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

### **Label**
<br>

**Option 1:**

```javascript
<label>
    LabelText: <input type='text' value={this.state.data} onChange={this.handleChange.bind(this)} />
</label>
```

<br>
<br>

**Option 2:**

```javascript
<label htmlFor='inputId'>LabelText</label>
<input id='inputId' type='text' value={this.date.data} onChange={this.handleChange.bind(this)}>
```

<br>
<br>

### **Textarea**
<br>

```javascript
render() {
    return (
        <form onSubmit={this.handleSubmit.bind(this)}>
            <textarea name='propertyName' value={this.state.textareaValue} onChange={this.handleChange.bind(this)} />
            <input type='submit' value='Submit' />
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
        <select name='propertyName' value={this.state.selectOptionValue} onChange={this.handleChange.bind(this)}>
            <option value='option1'>OptionText1</option>
            <option value='option2'>OptionText2</option>
        </select>
    );
}
```

<br>
<br>

### **Checkbox**
<br>

* data of checkboxes is referenced as `checked` instead of `value`

```javascript
render() {
    return (
        <form onSubmit={this.handleSubmit.bind(this)}>
            <input type='checkbox' checked={this.state.checkboxValue} onChange={this.handleChange.bind(this)/>
            <input type='submit' value='Submit' />
        </form>
    );
}
```