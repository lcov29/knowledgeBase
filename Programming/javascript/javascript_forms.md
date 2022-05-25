# **JavaScript Forms**

<br>

## **Table Of Contents**
<br>

- [**JavaScript Forms**](#javascript-forms)
  - [**Table Of Contents**](#table-of-contents)
  - [**Form Element Types**](#form-element-types)
    - [**HTMLFormElement**](#htmlformelement)
      - [**Properties**](#properties)
        - [**elements**](#elements)
        - [**length**](#length)
        - [**name**](#name)
        - [**method**](#method)
        - [**target**](#target)
        - [**action**](#action)
      - [**Methods**](#methods)
        - [**reportValidity()**](#reportvalidity)
        - [**reset()**](#reset)
        - [**submit()**](#submit)
    - [**HTMLInputElement**](#htmlinputelement)
      - [**Properties**](#properties-1)
        - [**defaultValue**](#defaultvalue)
        - [**labels**](#labels)
        - [**multiple**](#multiple)
        - [**name**](#name-1)
        - [**step**](#step)
        - [**type**](#type)
        - [**value**](#value)
        - [**valueAsDate**](#valueasdate)
        - [**valueAsNumber**](#valueasnumber)
        - [**autofocus**](#autofocus)
        - [**disabled**](#disabled)
        - [**required**](#required)
        - [**validationMessage**](#validationmessage)
        - [**validity**](#validity)
        - [**willValidate**](#willvalidate)
        - [**autocomplete**](#autocomplete)
        - [**max**](#max)
        - [**min**](#min)
        - [**pattern**](#pattern)
        - [**placeholder**](#placeholder)
        - [**readOnly**](#readonly)
        - [**checked**](#checked)
        - [**defaultChecked**](#defaultchecked)
        - [**alt**](#alt)
        - [**height**](#height)
        - [**width**](#width)
        - [**src**](#src)
        - [**accept**](#accept)
        - [**files**](#files)
      - [**Methods**](#methods-1)
        - [**blur()**](#blur)
        - [**click()**](#click)
        - [**focus()**](#focus)
        - [**select()**](#select)
        - [**setSelectionRange()**](#setselectionrange)
        - [**setRangeText()**](#setrangetext)
        - [**setCustomValidity()**](#setcustomvalidity)
        - [**showPicker()**](#showpicker)
        - [**checkValidity()**](#checkvalidity)
        - [**reportValidity()**](#reportvalidity-1)
        - [**stepDown()**](#stepdown)
        - [**stepUp()**](#stepup)

<br>
<br>
<br>
<br>

## **Form Element Types**
<br>
<br>

### **HTMLFormElement**
<br>

* dom representation of \<form> element

<br>
<br>

#### **Properties**
<br>
<br>

##### **elements**
<br>

* returns read-only list of all HTML form control elements as HTMLFormControlsCollection
* access form element by
  * index
  * name
  * id

<br>

```javascript
let elements = document.getElementById('formId').elements
elements[0]
elements['name | id']
```

<br>
<br>
<br>

##### **length**
<br>

* returns number of form control elements

<br>

```javascript
document.getElementById('formId').length
```

<br>
<br>
<br>

##### **name**
<br>

* returns name of selected form

<br>

```javascript
document.getElementById('formId').name
```

<br>
<br>
<br>

##### **method**
<br>

* returns HTTP method to submit the form as string

<br>

```javascript
document.getElementById('formId').method
```

<br>
<br>
<br>

##### **target**
<br>

* returns target of form action as string

<br>

```javascript
document.getElementById('formId').target
```

<br>
<br>
<br>

##### **action**
<br>

* returns form action as string

<br>

```javascript
document.getElementById('formId').action
```

<br>
<br>
<br>

#### **Methods**
<br>
<br>

##### **reportValidity()**
<br>

* dispatches _invalid_ event at every control element not satifying the constraints
* reports validation problems to the user
* returns boolean indicating whether all form control elements satisfy the constraints

<br>

```javascript
document.getElementById('formId').reportValidity()
```

<br>
<br>
<br>

##### **reset()**
<br>

* restores form control elements to their default value

<br>

```javascript
document.getElementById('formId').reset()
```

<br>
<br>
<br>

##### **submit()**
<br>

* submits form without dispatching a submit event

<br>

```javascript
document.getElementById('formId').submit()
```

<br>
<br>
<br>
<br>

### **HTMLInputElement**
<br>

* dom representation of \<input> element

<br>
<br>

#### **Properties**
<br>
<br>

##### **defaultValue**
<br>

* returns or sets the default value

<br>
<br>
<br>

##### **labels**
<br>

* returns NodeList element of all \<label> elements

<br>
<br>
<br>

##### **multiple**
<br>

* returns or sets boolean indicating if input can have multile values

<br>
<br>
<br>

##### **name**
<br>

* returns or sets name attribute

<br>
<br>
<br>

##### **step**
<br>

* returns or sets step attribute

<br>
<br>
<br>

##### **type**
<br>

* returns or sets type attribute

<br>
<br>
<br>

##### **value**
<br>

* returns or sets current value of control
* applies to input types:
  *  _text_
  *  _password_
  *  _radio_ 

<br>
<br>
<br>

##### **valueAsDate**
<br>

* returns or sets value converted to date or _null_ if not possible

<br>
<br>
<br>

##### **valueAsNumber**
<br>

* returns value of elemented converted to eiter a time value or a number

<br>
<br>
<br>

##### **autofocus**
<br>

* returns or sets _autofocus_ attribute via boolean

<br>
<br>
<br>

##### **disabled**
<br>

* returns or sets _disabled_ attribute via boolean

<br>
<br>
<br>

##### **required**
<br>

* returns or sets _required_ attribute via boolean

<br>
<br>
<br>

##### **validationMessage**
<br>

* returns validation message describing the failed validation constraints as string

<br>
<br>
<br>

##### **validity**
<br>

* returns current validity state

<br>
<br>
<br>

##### **willValidate**
<br>

* returns boolean indicating whether there are constraints to validate for this element

<br>
<br>
<br>

##### **autocomplete**
<br>

* returns or sets the _autocomplete_ attribute string

<br>
<br>
<br>

##### **max**
<br>

* returns or sets the _max_ attribute string

<br>
<br>
<br>

##### **min**
<br>

* returns or sets the _min_ attribute string

<br>
<br>
<br>

##### **pattern**
<br>

* returns or sets the _pattern_ attribute´s regular expression string
* for types
  * _text_
  * _search_
  * _tel_
  * _url_
  * _email_

<br>
<br>
<br>

##### **placeholder**
<br>

* returns or sets the _placeholder_ attribute string
* for types
  * _text_
  * _search_
  * _tel_
  * _url_
  * _email_

<br>
<br>
<br>

##### **readOnly**
<br>

* returns or sets the _readonly_ attribute string

<br>
<br>
<br>


##### **checked**
<br>

* returns or sets current checked state via boolean
* for types 
  * _checkbox_
  * _radiobutton_

<br>
<br>
<br>

##### **defaultChecked**
<br>

* returns or sets default state via boolean
* for types 
  * _checkbox_ 
  * _radiobutton_

<br>
<br>
<br>

##### **alt**
<br>

* returns or sets _alt_ attribute for image
* for type _image_

<br>
<br>
<br>

##### **height**
<br>

* returns or sets _height_ attribute for image
* for type _image_

<br>
<br>
<br>

##### **width**
<br>

* returns or sets _width_ attribute for image
* for type _image_

<br>
<br>
<br>

##### **src**
<br>

* returns or sets _src_ attribute for image
* for type _image_

<br>
<br>
<br>

##### **accept**
<br>

* returns or sets _accept_ attribute containing comma separated lsit of file types to accept
* for type _file_

<br>
<br>
<br>

##### **files**
<br>

* returns or sets FileList object containing File objects of selected files
* for type _file_

<br>
<br>
<br>

#### **Methods**
<br>
<br>

##### **blur()**
<br>

* remove focus from element

<br>
<br>
<br>

##### **click()**
<br>

* simulate mouse click

<br>
<br>
<br>

##### **focus()**
<br>

* focus element

<br>

```javascript
inputElement.focus()
inputElement.focus(options)


options = { preventScroll: true }
```

<br>
<br>
<br>

##### **select()**
<br>

* selects all text

<br>
<br>
<br>

##### **setSelectionRange()**
<br>

* select range of current text
* range is zero-based, INCLUDES startIndex and EXCLUDES endIndex

<br>

```javascript
inputElement.setSelectionRange(startIndex, endIndex)
```

<br>
<br>
<br>

##### **setRangeText()**
<br>

* replace range of text with new string
* range is zero-based, INCLUDES startIndex and EXCLUDES endIndex
* selectMode: selection after replacement of text

<br>

|selectMode|Description
|:---------|:-------------
|select    |selects newly inserted string
|start     |select before inserted string
|end       |select after inserted string
|preserve  |preserve selection (default)

<br>

```javascript
inputElement.setRangeText(replacement, [startIndex], [endIndex], [selectMode])
```

<br>
<br>
<br>

##### **setCustomValidity()**
<br>

* sets custom validity message

<br>

```javascript
inputElement.setCustomValidity(message)
```

<br>
<br>
<br>

##### **showPicker()**
<br>

* display browser picker for input element

<br>

```javascript
inputElement.showPicker()
```

<br>
<br>
<br>

##### **checkValidity()**
<br>

* returns boolean indicating whether element value is valid

<br>

```javascript
inputElement.checkValidity()
```

<br>
<br>
<br>

##### **reportValidity()**
<br>

* returns boolean indicating whether element value is valid
* when invalid, dispatches _invalid_ event

<br>

```javascript
inputElement.reportValidity()
```

<br>
<br>
<br>

##### **stepDown()**
<br>

* decrement value by (step * stepDecrement)

<br>

```javascript
inputElement.stepDown([stepDecrement=1])
```

<br>
<br>
<br>

##### **stepUp()**
<br>

* increment value by (step * stepDecrement)

<br>

```javascript
inputElement.stepDown([stepDecrement=1])
```





<!-- 

|Form Element       |JavaScript Object Type
|:------------------|:----------------------
|Checkbox           |HTMLInputElement
|Selection List     |HTMLSelectElement
|Selection Option   |HTMLOptionElement
|Text Area          |HTMLTextAreaElement



Access Text Password Fields:

  document.getElementById('textInput').value
  document.getElementById('passwordInput').value


Access Checkboxes

  document.getElementById('checkbox').checked


Access Radiobuttons

  let radioButtons = document.getElementById('formId').groupName
  radioButtons[0].value;


Access Selection List

  - HTMLSelectElement.selectedIndex 
    - returns zero-based index of selected option
  
  - HTMLSelectElement.value 
    - returns value of form control
  
  - HTMLSelectElement.item(index)
    - returns HTMLSelectElement of selection list at index
  
  - HTMLSelectElement.namedItem(optionName | optionId)
    - returns HTMLSelectElement of selecting list for optionName or optionId
  
  - HTMLSelectElement.remove()
    - removes element from option collection 

  - HTMLSelectElement.add(HTMLOptionElement, [beforeElement])

  - HTMLSelectElement.multiple
    - boolean indicating whether multiple items can be selected

  - HTMLSelectElement.required
    - boolean indicating whether selection is required

  - HTMLSelectElement.length
    - returns number of option elements

  - HTMLSelectElement.options
    - returns set of HTMLOptionElements (HTMLOptionsCollection) contained in the selection list

  - HTMLSelectElement.selectedOptions
    - returns set of selected HTMLOptionElements

  - HTMLOptionElement
    - new Option([text=''], [value=text], [defaultSelected=false], [selected=false])



Constraint Validation API

  - willValidate
    - indicates whether validation is active for a form control element (default true)

  - validity
    - returns ValidityState object containing information about the validity of input data 

      - valid
        - boolean indicating whether data is valid

      - valueMissing
        - boolean indicating whether required input value is missing

      - typeMismatch
        - boolean indicating whether input value is mismatching the expected type

      - patternMismatch
        - boolean indicating whether input value is mismatching the defined pattern

      - tooLong
        - boolean indicating whether input value is too long

      - tooShort
        - boolean indicating whether input value is too short

      - rangeUnderflow
        - boolean indicating whether input value is under a defined range

      - rangeOverflow
        - boolean indicating whether input value is over a defined range

      - stepMismatch
        - boolean indicating whether input value is mismatching defined step attribute

      - badInput
        - boolean indicating whether input value is unable to get converted by the browser

      - customError
        - boolean indicating whether custom validity message is set to nonempty string by setCustomValidity()
  
  - validationMessage 


-->