# **XML (Extensible Markup Language)**

<br>

## **Table Of Contents**
<br>

- [**XML (Extensible Markup Language)**](#xml-extensible-markup-language)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Serialising**](#serialising)
  - [**Parsing**](#parsing)

<br>
<br>
<br>
<br>

## **General**
<br>

* E**x**tensible **M**arkup **L**anguage
* used for loading structured data from the server
* consists of user-defined elements and attributes
* XML-Tree can be processed by the [DOM API](../../SoftwareDevelopment/WebDevelopment/WebAPI/document_object_model_api.md)

<br>

Example.xml
```xml
<?xml version="1.0" encoding="UTF-8"?>
<persons>
  <person>
    <firstName>John</firstName>
    <lastName>Doe</lastName>
  </person>
  <person>
    <firstName>Jane</firstName>
    <lastName>Doe</lastName>
  </person>
</persons>
```

<br>
<br>
<br>
<br>

## **Serialising**
<br>

* conversion of xml object to string

<br>

JavaScript:
```javascript
const xmlString = new XMLSerializer().serializeToString(xmlDocumentNode);
```

<br>
<br>
<br>
<br>

## **Parsing**
<br>

* conversion of string to xml object

<br>

JavaScript:
```javascript
const xmlDocumentObject = new DOMParser().parseFromString(xmlString, 'text/xml');
```