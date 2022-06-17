# **Naming Conventions**

<br>

## **Table Of Contents**
<br>

- [**Naming Conventions**](#naming-conventions)
  - [**Table Of Contents**](#table-of-contents)
  - [**General Rules**](#general-rules)
  - [**Conventions For Names With Multiple Words**](#conventions-for-names-with-multiple-words)
  - [**Commonly Used Verbs**](#commonly-used-verbs)

<br>
<br>
<br>
<br>

## **General Rules**
<br>

1. Be consistent
2. Describe intention
3. Choose explicit names
4. Avoid adding data type to name
5. Avoid negations in names
6. Names reflect used design patterns
7. Functions start with verbs
8. Use domain specific names

<br>
<br>
<br>
<br>

## **Conventions For Names With Multiple Words**
<br>

|Convention         |Description                                        |Example
|:------------------|:--------------------------------------------------|:--------------
|CamelCase          |initial word lowercase, following words uppercase  |variableName
|Upper Camel Case   |all words uppercase                                |VariableName
|Snake Case         |words separated by underscores                     |variable_name
|Kebab Case         |words separated by dashes                          |variable-name


<br>
<br>
<br>
<br>

## **Commonly Used Verbs**
<br>
<br>

|Verb           |Used For
|:--------------|:---------------
|get            |simple synchronous return of value
|compute        |return calculated value
|calculate      |return calculated value
|fetch          |get remote resource
|download       |get remote resource
|retrieve       |get expensive resource
|request        |asynchronous return of value
|find           |simple search of a resource
|search         |simple search of a resource
|include        |use additional resource
|scan           |search entire resource
|dump           |return unformatted object for debugging
|render         |visual represent a data
|show           |make object visible
|hide           |make object invisible
|display        |make object visible without option to be invisible
|join           |aggregate objects
|merge          |aggregate objects
|split          |split data
|append         |add element to end of collection
|prepend        |add element to start of collection
|concatenate    |add elements of collection to another collection
|slice          |return part of collection without removing it
|splice         |return part of collection and remove it
|parse          |apply grammar rules to data
|to\<Type>      |convertTo\<Type>: convertToString, ...
|invert         |change sign of value
|reverse        |change direction or order 
|start, stop    |begin and end action
|begin, end     |begin and end action
|open, close    |begin and end action
|construct      |create complex data structure
|destruct       |remove complex data structure
|destroy        |remove object
|kill           |remove or stop in an exceptional situation
|flush          |remove and process buffered data
|clear          |remove buffered data
|cleanup        |end unfinished actions
|collapse       |minimize size of something
|move           |move entity
|tidy           |visual optimization
|pretty         |visual optimization
|beautify       |visual optimization
|save           |save data persistently
|store          |save data persistently
|write          |save data persistently in database
|commit         |end transaction
|undo\<Verb>    |revert action described by \<Verb>
|redo\<Verb>    |repeat action described by \<Verb>
|rollback       |revert transaction
|restore        |set object back to default state
|revert         |revert state change
|recover        |attempt recover in exceptional situation
|toggle         |change binary state