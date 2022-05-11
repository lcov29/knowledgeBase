# **JavaScript Date**

<br>

## **Table Of Contents**
<br>

- [**JavaScript Date**](#javascript-date)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Instantiation**](#instantiation)
  - [**Static Methods**](#static-methods)
    - [**now()**](#now)
    - [**parse()**](#parse)
    - [**UTC()**](#utc)
  - [**Instance Methods**](#instance-methods)
    - [**Getter**](#getter)
      - [**getTime()**](#gettime)
      - [**getFullYear() / getUTCFullYear()**](#getfullyear--getutcfullyear)
      - [**getMonth() / getUTCMonth()**](#getmonth--getutcmonth)
      - [**getDate() / getUTCDate()**](#getdate--getutcdate)
      - [**getDay() / getUTCDay()**](#getday--getutcday)
      - [**getHours() / getUTCHours()**](#gethours--getutchours)
      - [**getMinutes() / getUTCMinutes()**](#getminutes--getutcminutes)
      - [**getSeconds() / getUTCSeconds()**](#getseconds--getutcseconds)
      - [**getMilliseconds() / getUTCMilliseconds()**](#getmilliseconds--getutcmilliseconds)
    - [**Setter**](#setter)
      - [**setTime()**](#settime)
      - [**setFullYear() / setUTCFullYear()**](#setfullyear--setutcfullyear)
      - [**setMonth() / setUTCMonth()**](#setmonth--setutcmonth)
      - [**setDate() / setUTCDate()**](#setdate--setutcdate)
      - [**setHours() / setUTCHours()**](#sethours--setutchours)
      - [**setMinutes() / setUTCMinutes()**](#setminutes--setutcminutes)
      - [**setSeconds() / setUTCSeconds()**](#setseconds--setutcseconds)
      - [**setMilliseconds() / setUTCMilliseconds()**](#setmilliseconds--setutcmilliseconds)
    - [**Other**](#other)
      - [**toString()**](#tostring)
      - [**toJSON()**](#tojson)
      - [**toUTCString()**](#toutcstring)
      - [**toDateString()**](#todatestring)
      - [**toTimeString()**](#totimestring)
      - [**toLocaleString()**](#tolocalestring)
      - [**toLocaleDateString()**](#tolocaledatestring)
      - [**toLocaleTimeString()**](#tolocaletimestring)

<br>
<br>
<br>
<br>

## **General**
<br>

* number of milliseconds since 1 January 1970 00:00:00 UTC

<br>
<br>
<br>
<br>

## **Instantiation**
<br>

```javascript
new Date()                          // date and time of instantiation

new Date(value)                     // date and time of value (number of milliseconds since 1 January 1970)

new Date(dateString)                // date and time of dateString
                                        // Formats:
                                        //  'YYYY-MM-DD'
                                        //  'YYYY-MM-DDThh:mm:ss'

new Date(dateObject)

new Date(year, month, [day], [hours], [minutes], [seconds], [milliseconds])
    /*
        year: [1900 - 1999] --> [0 - 99]
                      2000+ --> 2000+

        month: [0 - 11] --> [January - December]
                   > 11 --> add to year

        day: integer 

        hours: [0 - 23]

        minutes: integer

        seconds: integer

        milliseconds: integer
    */                                   
```

```javascript
let date1 = new Date();

let date2 = new Date('2022-05-11T09:39:00');

let date3 = new Date(2022, 4, 11, 9, 39, 0);
```

<br>
<br>
<br>
<br>

## **Static Methods**
<br>
<br>
<br>

### **now()**
<br>

* returns number of milliseconds since January 1 1970 00:00:00 UTC

```javascript
Date.now();
```

<br>
<br>
<br>

### **parse()**
<br>

* returns number of milliseconds since January 1 1970 00:00:00 UTC for string representation of a date
* DO NOT USE, there may be browser differences

```javascript
Date.parse(dateString);
```

```javascript
Date.parse('2022-05-11T09:39:00');      // returns 1652254740000
```

<br>
<br>
<br>

### **UTC()**
<br>

* returns number of milliseconds since January 1 1970 00:00:00 UTC

```javascript
Date.UTC(year, [month], [day], [hour], [minute], [second], [millisecond]);
```

```javascript
// '2022-05-11T09:39:00'
Date.UTC(2022, 4, 11, 9, 39, 0);      // returns 1652261940000
```

<br>
<br>
<br>
<br>

## **Instance Methods**
<br>
<br>
<br>

### **Getter**
<br>
<br>

#### **getTime()**
<br>

* returns number of milliseconds since 1 January 1970 00:00:00 UTC

```javascript
let date = new Date('2022-05-11T09:39:00');
date.getTime();                                         // returns 1652254740000
```

<br>
<br>
<br>

#### **getFullYear() / getUTCFullYear()**
<br>

* returns year in local / universal time

```javascript
let date = new Date('2022-05-11T09:39:00');
date.getFullYear();                                         // returns 2022
date.getUTCFullYear();
```

<br>
<br>
<br>

#### **getMonth() / getUTCMonth()**
<br>

* returns zero-based month value in local / universal time

```javascript
let date = new Date('2022-05-11T09:39:00');
date.getMonth();                                            // return 4
date.getUTCMonth();   
```

Full month name with internationalization via Intl.DateTimeFormat():

```javascript
let date = new Date('2022-05-11T09:39:00');

let option = { month: 'long' };
let monthNameEn = new Intl.DateTimeFormat('en-US', option).format(date);                // returns May
let monthNameGer = new Intl.DateTimeFormat('de-DE', option).format(date);               // returns Mai
```

<br>
<br>
<br>

#### **getDate() / getUTCDate()**
<br>

* returns day _of the month_ in local / universal time

```javascript
let date = new Date('2022-05-11T09:39:00');
date.getDate();                                             // returns 11
date.getUTCDate();
```

<br>
<br>
<br>

#### **getDay() / getUTCDay()**
<br>

* returns day _of the week_ in  local / universal time
* 0 represents Sunday, 1 represents Monday ...

```javascript
let date = new Date('2022-05-11T09:39:00');
date.getDay();                                              // returns 3 ( = Wednesday )
date.getUTCDay();
```

Full day name with internationalization via Intl.DateTimeFormat():

```javascript
let date = new Date('2022-05-11T09:39:00');

let option = { weekday: 'long' };
let dayNameEn = new Intl.DateTimeFormat('en-US', option).format(date);                // returns Wednesday
let dayNameGer = new Intl.DateTimeFormat('de-DE', option).format(date);               // returns Mittwoch
```

<br>
<br>
<br>

#### **getHours() / getUTCHours()**
<br>

* returns hour in local / universal time

```javascript
let date = new Date('2022-05-11T09:39:00');
date.getHours();                                            // returns 9
date.getUTCHours();
```

<br>
<br>
<br>

#### **getMinutes() / getUTCMinutes()**
<br>

* returns minutes in local / universal time

```javascript
let date = new Date('2022-05-11T09:39:00');
date.getMinutes();                                          // returns 39
date.getUTCMinutes();
```

<br>
<br>
<br>

#### **getSeconds() / getUTCSeconds()**
<br>

* returns seconds in local / universal time

```javascript
let date = new Date('2022-05-11T09:39:00');
date.getSeconds();                                          // returns 0
date.getUTCSeconds();
```

<br>
<br>
<br>

#### **getMilliseconds() / getUTCMilliseconds()**
<br>

* returns milliseconds in local / universal time

```javascript
let date = new Date('2022-05-11T09:39:00');
date.getMilliseconds();                                     // returns 0
date.getUTCMilliseconds();
```

<br>
<br>
<br>
<br>

### **Setter**
<br>
<br>

#### **setTime()**
<br>

* sets Date object to the number of milliseconds since 1 January 1970 00:00:00 UTC
* returns number of milliseconds

```javascript
setTime(timeValue)
```

<br>
<br>
<br>

#### **setFullYear() / setUTCFullYear()**
<br>

* set full year for a date in local / universal time

```javascript
let date = new Date('2022-05-11T09:39:00');
date.setFullYear(2019);                             // new date: '2019-05-11T09:39:00'
date.setUTCFullYear(2019);
```

<br>
<br>
<br>

#### **setMonth() / setUTCMonth()**
<br>

* set month for a date in local / universal time

```javascript
let date = new Date('2022-05-11T09:39:00');
date.setMonth(11);                             // new date: '2022-12-11T09:39:00'
date.setUTCMonth(11);
```

<br>
<br>
<br>

#### **setDate() / setUTCDate()**
<br>

* set day of the month for a date in local / universal time

```javascript
let date = new Date('2022-05-11T09:39:00');
date.setDate(3);                                // new date: '2022-05-03T09:39:00'
date.setUTCDate(3);
```

<br>
<br>
<br>

#### **setHours() / setUTCHours()**
<br>

* set hours for a date in local / universal time
* returns number of milliseconds since 1 January 1970 00:00:00 UTC

```javascript
let date = new Date('2022-05-11T09:39:00');
date.setHours(16);                             // new date: '2022-05-11T16:39:00'
date.setUTCHours(16);
```

<br>
<br>
<br>

#### **setMinutes() / setUTCMinutes()**
<br>

* set minutes for a date in local / universal time
* returns number of milliseconds since 1 January 1970 00:00:00 UTC

```javascript
let date = new Date('2022-05-11T09:39:00');
date.setMinutes(24);                           // new date: '2022-05-11T09:24:00'
date.setUTCMinutes(24);
```

<br>
<br>
<br>

#### **setSeconds() / setUTCSeconds()**
<br>

* set seconds for a date in local / universal time
* returns number of milliseconds since 1 January 1970 00:00:00 UTC

```javascript
let date = new Date('2022-05-11T09:39:00');
date.setSeconds(51);                           // new date: '2022-05-11T09:39:51'
date.setUTCSeconds(51);
```

<br>
<br>
<br>

#### **setMilliseconds() / setUTCMilliseconds()**
<br>

* set milliseconds for a date in local / universal time
* returns number of milliseconds since 1 January 1970 00:00:00 UTC

```javascript
let date = new Date('2022-05-11T09:39:00');
date.setMilliseconds(968);                      // new date: '2022-05-11T09:39:00:968'
date.setUTCMilliseconds(968);
```

<br>
<br>
<br>
<br>

### **Other**
<br>
<br>

#### **toString()**
<br>

* returns string representation of date object

```javascript
let date = new Date('2022-05-11T09:39:00');
date.toString();                                    // "Wed May 11 2022 09:39:00 GMT+0200 (Central European Summer Time)"
```

<br>
<br>
<br>

#### **toJSON()**
<br>

* returns string representation of date object

```javascript
let date = new Date('2022-05-11T09:39:00');
date.toJSON();                                      // "2022-05-11T07:39:00.000Z"
```

<br>
<br>
<br>

#### **toUTCString()**
<br>

* returns UTC time zone string

```javascript
let date = new Date('2022-05-11T09:39:00');
date.toUTCString();                                  // "Wed, 11 May 2022 07:39:00 GMT"
```

<br>
<br>
<br>

#### **toDateString()**
<br>

* returns date part in human readable form

```javascript
let date = new Date('2022-05-11T09:39:00');
date.toDateString();                                  // "Wed May 11 2022"
```

<br>
<br>
<br>

#### **toTimeString()**
<br>

* returns time part in human readable form

```javascript
let date = new Date('2022-05-11T09:39:00');
date.toTimeString();                                  // "09:39:00 GMT+0200 (Central European Summer Time)"
```

<br>
<br>
<br>

#### **toLocaleString()**
<br>

* returns language specific string of date of date object

```javascript
let date = new Date('2022-05-11T09:39:00');
date.toLocaleString('en-GB', {timeZone: 'CET'});        // "11/05/2022, 09:39:00"
date.toLocaleString('de-DE', {timeZone: 'CET'});        // "11.5.2022, 09:39:00"
```

<br>
<br>
<br>

#### **toLocaleDateString()**
<br>

* returns language specific string of date part of date object

```javascript
let date = new Date('2022-05-11T09:39:00');
date.toLocaleDateString('en-GB', {timeZone: 'CET'});        // "11/05/2022"
date.toLocaleDateString('de-DE', {timeZone: 'CET'});        // "11.5.2022"
```

<br>
<br>
<br>

#### **toLocaleTimeString()**
<br>

* returns language specific string of time part of date object

```javascript
let date = new Date('2022-05-11T09:39:00');
date.toLocaleTimeString('en-GB', {timeZone: 'CET'});        // "09:39:00"
date.toLocaleTimeString('de-DE', {timeZone: 'CET'});        // "09:39:00"
```