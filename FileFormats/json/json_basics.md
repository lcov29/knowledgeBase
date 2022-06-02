# **JSON (JavaScript Object Notation)**

<br>

## **Table Of Contents**
<br>

- [**JSON (JavaScript Object Notation)**](#json-javascript-object-notation)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Difference Between JSON And JavaScript Objects**](#difference-between-json-and-javascript-objects)
  - [**Serialising**](#serialising)
  - [**Parsing**](#parsing)

<br>
<br>
<br>
<br>

## **General**
<br>

* **J**ava**S**cript **O**bject **N**otation
* used for loading data from the server to generate content on a website
* can directly be used within javascript code

<br>

Example.json
```javascript
{
  "persons": [
    {
      "firstName": "John",
      "lastName": "Doe"
    },
    {
      "firstName": "Jane",
      "lastName": "Doe"
    }
  ]
}
```

<br>
<br>
<br>
<br>

## **Difference Between JSON And JavaScript Objects**
<br>

|Component|JSON                                                     |[JavaScript Objects](../../SoftwareDevelopment/WebDevelopment/JavaScript/javascript_object.md)
|:--------|:--------------------------------------------------------|:-------------------------
|keys     |double quotation                                         |no, single or double quotation
|values   |string, number, boolean, other JSON-objects, arrays, null|like JSON + functions, regex, other objects,...

<br>
<br>
<br>
<br>

## **Serialising**
<br>

* conversion of javascript object to json string

<br>

JavaScript:
```javascript
const jsonString = JSON.stringify(javascriptObject);
```

<br>
<br>
<br>
<br>

## **Parsing**
<br>

* conversion of json string to javascript object

<br>

JavaScript:
```javascript
const javascriptObject = JSON.parse(jsonString);
```