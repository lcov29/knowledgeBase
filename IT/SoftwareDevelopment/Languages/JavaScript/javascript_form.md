# **JavaScript Form**

<br>

## **Table Of Contents**
<br>

- [**JavaScript Form**](#javascript-form)
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
      - [**Acess Radiobuttons**](#acess-radiobuttons)
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
    - [**HTMLTextAreaElement**](#htmltextareaelement)
      - [**Properties**](#properties-2)
        - [**autofocus**](#autofocus-1)
        - [**cols**](#cols)
        - [**defaultValue**](#defaultvalue-1)
        - [**disabled**](#disabled-1)
        - [**maxLength**](#maxlength)
        - [**minLength**](#minlength)
        - [**name**](#name-2)
        - [**placeholder**](#placeholder-1)
        - [**readOnly**](#readonly-1)
        - [**required**](#required-1)
        - [**type**](#type-1)
        - [**value**](#value-1)
        - [**validationMessage**](#validationmessage-1)
        - [**validity**](#validity-1)
        - [**willValidate**](#willvalidate-1)
      - [**Methods**](#methods-2)
        - [**blur()**](#blur-1)
        - [**click()**](#click-1)
        - [**focus()**](#focus-1)
        - [**select()**](#select-1)
        - [**setSelectionRange()**](#setselectionrange-1)
        - [**setRangeText()**](#setrangetext-1)
        - [**setCustomValidity()**](#setcustomvalidity-1)
        - [**checkValidity()**](#checkvalidity-1)
        - [**reportValidity()**](#reportvalidity-2)
    - [**HTMLSelectElement**](#htmlselectelement)
      - [**Properties**](#properties-3)
        - [**autofocus**](#autofocus-2)
        - [**disabled**](#disabled-2)
        - [**form**](#form)
        - [**labels**](#labels-1)
        - [**length**](#length-1)
        - [**multiple**](#multiple-1)
        - [**name**](#name-3)
        - [**options**](#options)
        - [**required**](#required-2)
        - [**selectedIndex**](#selectedindex)
        - [**selectedOptions**](#selectedoptions)
        - [**type**](#type-2)
        - [**validationMessage**](#validationmessage-2)
        - [**validity**](#validity-2)
        - [**value**](#value-2)
      - [**Methods**](#methods-3)
        - [**add()**](#add)
        - [**blur()**](#blur-2)
        - [**checkValidity()**](#checkvalidity-2)
        - [**focus()**](#focus-2)
        - [**item()**](#item)
        - [**namedItem()**](#nameditem)
        - [**remove()**](#remove)
        - [**setCustomValidity()**](#setcustomvalidity-2)
    - [**HTMLSelectElement**](#htmlselectelement-1)
      - [**Constructor**](#constructor)
      - [**Properties**](#properties-4)
        - [**defaultSelected**](#defaultselected)
        - [**disabled**](#disabled-3)
        - [**form**](#form-1)
        - [**index**](#index)
        - [**label**](#label)
        - [**selected**](#selected)
        - [**text**](#text)
        - [**value**](#value-3)

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

#### **Acess Radiobuttons**
<br>

```javascript
let radioButtons = document.getElementById('formId').groupName
radioButtons[0].value;
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

* returns ValidityState object containing validation information

<br>

|Validity State |Description
|:--------------|:------------------------------------------------------------------------------------------------
|valid          |boolean indicating whether data is valid
|valueMissing   |boolean indicating whether required input value is missing
|typeMismatch   |boolean indicating whether input value is mismatching the expected type
|patternMismatch|boolean indicating whether input value is mismatching the defined pattern
|tooLong        |boolean indicating whether input value is too long
|tooShort       |boolean indicating whether input value is too short
|rangeUnderflow |boolean indicating whether input value is under a defined range
|rangeOverflow  |boolean indicating whether input value is over a defined range
|stepMismatch   |boolean indicating whether input value is mismatching defined step attribute
|badInput       |boolean indicating whether input value is unable to get converted by the browser
|customError    |boolean indicating whether custom validity message is set to nonempty string by setCustomValidity()

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

<br>
<br>
<br>
<br>

### **HTMLTextAreaElement**
<br>

* dom representation of \<textarea> element

<br>
<br>

#### **Properties**
<br>
<br>

##### **autofocus**
<br>

* returns or sets _autofocus_ attribute via boolean

<br>
<br>
<br>

##### **cols**
<br>

* returns or sets the _cols_ attribute via number indicating the width of the elmeent

<br>
<br>
<br>

##### **defaultValue**
<br>

* returns or sets the default value

<br>
<br>
<br>

##### **disabled**
<br>

* returns or sets _disabled_ attribute via boolean

<br>
<br>
<br>

##### **maxLength**
<br>

* returns or sets the _maxLength_ attribute indicating the maximum number of characters

<br>
<br>
<br>

##### **minLength**
<br>

* returns or sets the _minLength_ attribute indicating the minimum number of characters

<br>
<br>
<br>

##### **name**
<br>

* returns or sets name attribute

<br>
<br>
<br>

##### **placeholder**
<br>

* returns or sets the _placeholder_ attribute string

<br>
<br>
<br>

##### **readOnly**
<br>

* returns or sets _readOnly_ attribute via boolean

<br>
<br>
<br>

##### **required**
<br>

* returns or sets _required_ attribute via boolean

<br>
<br>
<br>

##### **type**
<br>

* returns type string 'textarea'

<br>
<br>
<br>


##### **value**
<br>

* returns or sets current value of control

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

* returns ValidityState object containing validation information

<br>

|Validity State |Description
|:--------------|:------------------------------------------------------------------------------------------------
|valid          |boolean indicating whether data is valid
|valueMissing   |boolean indicating whether required input value is missing
|typeMismatch   |boolean indicating whether input value is mismatching the expected type
|patternMismatch|boolean indicating whether input value is mismatching the defined pattern
|tooLong        |boolean indicating whether input value is too long
|tooShort       |boolean indicating whether input value is too short
|rangeUnderflow |boolean indicating whether input value is under a defined range
|rangeOverflow  |boolean indicating whether input value is over a defined range
|stepMismatch   |boolean indicating whether input value is mismatching defined step attribute
|badInput       |boolean indicating whether input value is unable to get converted by the browser
|customError    |boolean indicating whether custom validity message is set to nonempty string by setCustomValidity()

<br>
<br>
<br>

##### **willValidate**
<br>

* returns boolean indicating whether there are constraints to validate for this element

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
textAreaElement.focus()
textAreaElement.focus(options)


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
textAreaElement.setSelectionRange(startIndex, endIndex)
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
textAreaElement.setRangeText(replacement, [startIndex], [endIndex], [selectMode])
```

<br>
<br>
<br>

##### **setCustomValidity()**
<br>

* sets custom validity message

<br>

```javascript
textAreaElement.setCustomValidity(message)
```


<br>
<br>
<br>

##### **checkValidity()**
<br>

* returns boolean indicating whether element value is valid

<br>

```javascript
textAreaElement.checkValidity()
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
textAreaElement.reportValidity()
```

<br>
<br>
<br>
<br>

### **HTMLSelectElement**
<br>
<br>

#### **Properties**
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

##### **form**
<br>

* returns HTMLFormElement

<br>
<br>
<br>

##### **labels**
<br>

* returns NodeList element of all \<label> elements

<br>
<br>
<br>

##### **length**
<br>

* returns number of option elements

<br>
<br>
<br>

##### **multiple**
<br>

* returns or sets _multiple_ attribute boolean indicating whether multiple items can be selected

<br>
<br>
<br>

##### **name**
<br>

* returns or sets _name_ attribute

<br>
<br>
<br>

##### **options**
<br>

* returns set of HTMLOptionElements (HTMLOptionsCollection) contained in the selection list 

<br>
<br>
<br>

##### **required**
<br>

* returns or sets boolean indicating whether selection is required

<br>
<br>
<br>

##### **selectedIndex**
<br>

* returns or sets set of selected HTMLOptionElements

<br>
<br>
<br>

##### **selectedOptions**
<br>

* returns set of selected option elements as a HTMLCollection object

<br>
<br>
<br>

##### **type**
<br>

* returns type string:
  * 'select-one'
  * 'select-multiple'

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

* returns ValidityState object containing validation information

<br>

|Validity State |Description
|:--------------|:------------------------------------------------------------------------------------------------
|valid          |boolean indicating whether data is valid
|valueMissing   |boolean indicating whether required input value is missing
|typeMismatch   |boolean indicating whether input value is mismatching the expected type
|patternMismatch|boolean indicating whether input value is mismatching the defined pattern
|tooLong        |boolean indicating whether input value is too long
|tooShort       |boolean indicating whether input value is too short
|rangeUnderflow |boolean indicating whether input value is under a defined range
|rangeOverflow  |boolean indicating whether input value is over a defined range
|stepMismatch   |boolean indicating whether input value is mismatching defined step attribute
|badInput       |boolean indicating whether input value is unable to get converted by the browser
|customError    |boolean indicating whether custom validity message is set to nonempty string by setCustomValidity()

<br>
<br>
<br>

##### **value**
<br>

* returns _value_ property of first selected option

<br>
<br>
<br>

#### **Methods**
<br>
<br>

##### **add()**
<br>

* add option element to select element
* arguments:
  * _item_: 
    * HTMLOptionElement
  * _before_: 
    * element or elementIndex where new option should be inserted before
    * _null_ to append option to the end 

<br>

```javascript
selectElement.add(optionElement, [beforeElement | beforeIndex])
```

<br>
<br>
<br>

##### **blur()**
<br>

* removes focus

<br>
<br>
<br>

##### **checkValidity()**
<br>

* returns false and dispatches an invalid event if element is not valid

<br>
<br>
<br>

##### **focus()**
<br>

* focus element

<br>
<br>
<br>

##### **item()**
<br>

* returns HTMLOptionElement for specified index

<br>

```javascript
selectElement.item(index)
```

<br>
<br>
<br>

##### **namedItem()**
<br>

* returns HTMLOptionElement for specified _name_ or _id_

<br>

```javascript
selectElement.namedItem(string)
```

<br>
<br>
<br>

##### **remove()**
<br>

* removes option element for specified zero-based index

<br>

```javascript
selectElement.remove(index)
```

<br>
<br>
<br>

##### **setCustomValidity()**
<br>

* sets custom validity message

<br>

```javascript
selectElement.setCustomValidity(message)
```

<br>
<br>
<br>
<br>

### **HTMLSelectElement**
<br>
<br>

#### **Constructor**
<br>

* arguments
  * _text_ : string
  * _value_ : string
  * _defaultSelected_ : boolean
  * _selected_ : boolean

<br>

```javascript
let option = new Option([text], [value], [defaultSelected], [selected]);
```

<br>
<br>
<br>

#### **Properties**
<br>
<br>

##### **defaultSelected**
<br>

* boolean indicating whether option is selected by default

<br>
<br>
<br>

##### **disabled**
<br>

* boolean indicating whether option is available for selection

<br>
<br>
<br>

##### **form**
<br>

* reference to _form_ attribute

<br>
<br>
<br>

##### **index**
<br>

* returns index of option element within the selection

<br>
<br>
<br>

##### **label**
<br>

* returns value of _label_ attribute

<br>
<br>
<br>

##### **selected**
<br>

* returns or sets current selection

<br>
<br>
<br>

##### **text**
<br>

* returns or sets text

<br>
<br>
<br>

##### **value**
<br>

* returns and sets _value_ attribute

