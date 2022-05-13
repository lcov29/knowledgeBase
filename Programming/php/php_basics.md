# **PHP Basics**
<br>

- [**PHP Basics**](#php-basics)
  - [**Configuration: Display and Log Errors**](#configuration-display-and-log-errors)
  - [**File Basics**](#file-basics)
  - [**Include external modules**](#include-external-modules)
  - [**Comments**](#comments)
  - [**Variables, Constants and References**](#variables-constants-and-references)
  - [**Type Checks**](#type-checks)
  - [**Arrays**](#arrays)
    - [**General**](#general)
    - [**Numeric Arrays**](#numeric-arrays)
    - [**Associative Arrays (Hash-Table, Dictionary)**](#associative-arrays-hash-table-dictionary)
    - [**Array Functions**](#array-functions)
  - [**Operators**](#operators)
    - [**Arithmetic**](#arithmetic)
    - [**Logical**](#logical)
    - [**Comparison**](#comparison)
    - [**Assignment**](#assignment)
    - [**Operator Hierarchy**](#operator-hierarchy)
  - [**Mathematical Functions**](#mathematical-functions)
  - [**String Functions**](#string-functions)
  - [**Casting**](#casting)
  - [**Conditional Statements**](#conditional-statements)
  - [**Loops**](#loops)
  - [**Functions**](#functions)
    - [**Call By Reference**](#call-by-reference)
    - [**Optional Type Declarations (since PHP 7.0)**](#optional-type-declarations-since-php-70)
    - [**Variable Number Of Parameters**](#variable-number-of-parameters)
      - [**Option 1: Variadic Function**](#option-1-variadic-function)
      - [**Option 2**](#option-2)
  - [**Classes**](#classes)
  - [**Exceptions**](#exceptions)
  - [**Receiving Data**](#receiving-data)
  - [**Files and Directories**](#files-and-directories)
    - [**Uploading files to the server**](#uploading-files-to-the-server)
    - [**Write To A File**](#write-to-a-file)
    - [**Read From A File**](#read-from-a-file)
    - [**Metafile Data**](#metafile-data)
    - [**Directories**](#directories)
  - [**Database Connection**](#database-connection)
  - [**Sessions and Cookies**](#sessions-and-cookies)
  - [**XML Files**](#xml-files)
  - [**Date And Time**](#date-and-time)
    - [**Format String Elements**](#format-string-elements)
  - [**Formatting**](#formatting)

<br>
<br>
<br>

## **Configuration: Display and Log Errors**

<br>

```php
// php.ini

...
error_reporting = <error_type_list>
display_errors = [On | Off]
log_errors = [On | Off]
error_log = <path>/<file>
...
```

| Error Type | Description                            |
|:-----------|:---------------------------------------|
|E_ERROR     |runtime error                           |
|E_WARNING   |runtime warnings                        |
|E_NOTICE    |runtime notice                          |
|E_STRICT    |notice for improvement in the future    |
|E_DEPRECATED|notice for deprecated elements          |
|E_ALL       |all runtime errors, warnings and notices|

<br>

|Setting         |Recommended for development |
|:---------------|:---------------------------|
|error_reporting |E_ALL                       |
|display_errors  |On                          |
|log_errors      |On                          |
|error_log       |php_errors.log              |

<br>

|Setting         |Recommended for production       |
|:---------------|:--------------------------------|
|error_reporting |E_ALL & ~E_DEPRECATED & ~E_STRICT|
|display_errors  |Off                              |
|log_errors      |On                               |
|error_log       |php_errors.log                   |

<br>

```php
// Set properties at runtime

init_get(<property>);
init_set(<property>, <value>);
```

<br>
<br>

## **File Basics**

<br>

```php
// Embedded PHP

<!DOCTYPE html>
<html lang='en'>
   <head>
      <meta charset='utf-8'>
	  <?php
	     echo "Hello World";
	  ?>
   </head>
   <body>
      first line in HTML<br>
	  <?php
	     echo "second line in PHP<br>";
		 echo "third line " . "in PHP" . "<br>";
	  ?>
   </body>
</html>
```

<br>
<br>

## **Include external modules**

<br>

```php
// <module_name>.inc.php

<?php
   function foo() {..}
   function bar() {..}
?>
```

```php
// <file_name>.php

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      ...
   </head>
   <body>
      first line in HTML<br>
      <?php
         include "<module_name>.inc.php";
         $result = foo();
      ?>
   </body>
</html>
```

|Keyword      |Description                                           |
|:------------|:-----------------------------------------------------|
|include      |includes module, throws warning for nonexistent module|
|require      |includes module, exits program for nonexistent module |
|include_once |like include, prevents second inclusion of same module|
|require_once |like require, prevents second inclusion of same module|

<br>
<br>

## **Comments**

<br>

```php
// comment in a single line

/* multi
   line
   comment */
```

<br>
<br>

## **Variables, Constants and References**

<br>

```php
$<variable_name>                                            // access value of <variable_name>
$<variable_name> = <value>;                                 // assign <value> to <variable_name> (dynamicly typed)
$<variable_name> = <condition> ? <if_value> : <else_value>; // ternary assign operator
$<variable_name> ??= <if_null_or_nonexistent_value>;        // null coalescing assign operator
isset($<variable_name>)                                     // check existence of <variable_name>
unset($<variable_name>)                                     // delete <variable_name>
$<variable_name> = null;                                    // delete <variable_name>
const <constant_name> = <value>;                            // assign <value> to <constant_name> (dynamically typed)
$<reference_name> = &$<variable_name>;                      // declare reference <reference_name> to <variable_name>|
```


<br>
<br>

## **Type Checks**

<br>

```php
is_int(<variable | value>)
is_float(<variable | value>)
is_string(<variable | value>)
is_numeric(<variable | value>)
is_bool(<variable | value>)
```

<br>
<br>

## **Arrays**

Arrays are dynamic.
<br>
<br>

### **General**

```php
$<array_variable_2> = $<array_variable_1>                              // DEEP COPY of <array_variable_1> and save reference on copy to <array_variable_2>
$<array_new> = array(<value_1>, ...$<array_old>, ... <value_n>         // Spread-Operator: use values of <array_old> as values for <array_new>
$<array_variable> = range(<start_value>, <end_value>, <step>)          // return array with range [<start_value], <end_value>) with <step>
```

<br>

### **Numeric Arrays**

```php
$<array_variable> = array(<value_1>, ... , <value_n>);    // instantiate new array (zero-based)
$<array_variable> = [<value_1>, ... , <value_n>];         // alternative instantiation of new array
$<array_variable>[<index>]                                // access value of <array_variable> at <index>
$<array_variable>[<index>] = <value>                      // assign <array_variable> at <index> value <value>

sort(<array>)                                             // sort <array> in ascending order
rsort(<array>)                                            // sort <array> in descending order
```

<br>

### **Associative Arrays (Hash-Table, Dictionary)**

```php
$<array_variable> = array(<key_1>=><value_1>, ... , <key_n>=><value_n>     // instantiate new array of key-value-pairs
$<array_variable>[<key>]                                                   // access <value> of <key> in <array_variable>
$<array_variable>[<key>] = <value>                                         // assign <value> to <key> in <array_variable>

foreach($<array_variable> as $<key_variable>=>$<value_variable>) {}        // iterate over all key-value-pairs in <array_variable>
foreach($<array_variable> as $<value_variable>) {}                         // iterate over all values in <array_variable>
		
asort(<assoc_array>)                                                       // sort <assoc_array> in ascending value order and maintain key association
arsort(<assoc_array>)                                                      // sort <assoc_array> in descending value order and maintain key association
ksort(<assoc_array>)                                                       // sort <assoc_array> in ascending key order
krsort(<assoc_array>)                                                      // sort <assoc_array> in descending key order
```

<br>

### **Array Functions**

```php
array_push(<array>, <values>)                     // add <values> to the end of <array>
array_pop(<array>)                                // return and remove last element of <array>
array_unshift(<array>, <values>)                  // add <values> to the start of <array>
array_shift(<array>)                              // return and remove first element of <array>

array_unique(<array>)                             // return array without duplicate entries of <array>
array_intersect(<array_1>, ... , <array_n>)       // return array containing the intersection of <array_1>, ... , <array_n>		
array_diff(<array>, <array_1>, ... , <array_n>)   // return array contatining the difference between <array> and <array_1>, ...
array_merge(<array_1>, ... , <array_n>)           // return array merging <array_1>, ... , <array_n>

array_walk(<array>, <callback_function>)          // apply <callback_function> to every member of <array>
array_filter(<array>, <callback_function>)        // return array filtered by <callback_function>
array_map(<array>, <callback_function>)           // apply <callback_function> to every member of <array> and return modified array
array_reduce(<array>, <callback_function>)        // apply aggregate <callback_function> to <array> and return value	
usort(<array>, <callback_function>)               // sort <array> using <callback_function> (returns for each element -1, 1 or 0)

array_rand(<array_variable>, <count>)             // return single or array of <count> random values of <array_variable> or null
shuffle(<array_variable>)                         // randomize the order of the elements of <array_variable>
count(<array_variable>)                           // return number of elements
implode(<separator>, <array>)                     // concatenate all fields of <array> to a <separator> separated string
```

<br>
<br>

## **Operators**

<br>

### **Arithmetic**
|Operator |Description    |
|:-------:|:--------------|
|+        |addition       |
|-        |subtraction    |
|*        |multiplication |
|/        |division       |
|%        |modulo         |
|**       |potentiation   |

<br>

### **Logical**
|Operator |Description    |
|:-------:|:--------------|
|!        |not            |
|\|\|     |or             |
|&&       |and            |

<br>

### **Comparison**
|Operator |Description                     |
|:-------:|:-------------------------------|
|==       |equal (numbers and strings)     |
|===      |equal and same data type        |
|!=       |unequal (numbers and strings)   |
|!==      |unequal and different data types|
|>        |greater than (numbers)          |
|<        |lesser than (numbers)           |
|>=       |greater or equal (numbers)      |
|<=       |lesser or equal (numbers)       |
|<=>      |"spaceship" returns:            |
|         |1, if <value_1> > <value_2>     |
|         |-1, if <value_1> < <value_2>    |
|         |0, if <value_1> = <value_2>     |

<br>

### **Assignment**
|Operator      |Description                                                                |
|:------------:|:--------------------------------------------------------------------------|
|=             |assign                                                                     |
|+=            |assign increased value                                                     |
|-=            |assign decreased value                                                     |
|*=            |assign result of multiplication                                            |
|/=            |assign result of division                                                  |
|%=            |assign result of modulo                                                    |
| ? :          |ternary assign operation, see "Variables, Constants And References"        |
|??=           |null coalescing assign operation, see "Variables, Constants And References"|
|`<variable>++`|increment <variable> by 1 after execution of current line                  |
|`++<variable>`|increment <variable> by 1 before execution of current line                 |
|`<variable>--`|decrement <variable> by 1 after execution of current line                  |
|`--<variable>`|decrement <variable> by 1 before execution of current line                 |

<br>

### **Operator Hierarchy**
|Operator              |
|:--------------------:|
|()                    |
|!, - (negative prefix)|
|*, /, %               |
|+, -                  |
|<, <=, >, >=          |
|==, !=, <=>           |
|&&                    |
|\|\|                  |
|=                     |

<br>
<br>

## **Mathematical Functions**

<br>

```php
sqrt(<number>)                      // square root of <number>
pow(<base>, <exponent>)             // raise <base> to the power of <exponent>
exp(<number>)                       // raise e to the power of <number>
log(<number>)                       // natural logarithm of <number>
log10(<number>)                     // base-10 logarithm of <number>
abs(<number>)                       // absolute value of <number>
floor(<number>)                     // return next lowest integer value as float
ceil(<number>)                      // return next biggest integer value as float
round(<number>, <precision>)        // round <number> to float
intdiv(<dividend>, <divisor>)       // integer division without remainder
fmod(<dividend>, <divisor>)         // modulo operation for float values
max(<number_1>, ... , <number_n>)   // return biggest <number>
min(<number_1>, ... , <number_n>)   // return lowest <number>
```

<br>
<br>

## **String Functions**

<br>

```php
<string1> . <string2>                               // concatenate <string1> and <string2>
"$<variable>"                                       // substitute $<variable>
'$<variable>'                                       // no substitution
mb_strlen(<string>)                                 // return length of <string>

mb_strtoupper(<string>)                             // convert all characters of <string> to uppercase characters
mb_strtolower(<string>)                             // convert all characters of <string> to lowercase characters
mb_str_split(<string>, [length])                    // return array with each character (or [length] characters) of <string>
mb_split(<regex_pattern>, <string>)                 // splits <string> according to <regex_pattern> and returns an array (or false)

mb_ord(<character>)                                 // return Unicode code of <character>
mb_chr(<unicode_code>)                              // return character for <unicode_code>
mb_strpos(<string>, <search>, [offset])             // return positional index of the first occurrence of <search> in <string> (case sensitive)
mb_strposi(<string>, <search>, [offset])            // return positional index of the first occurrence of <search> in <string> (case insensitive)
mb_substr(<string>, <start>, [length])              // return substring starting at <string>[<start>] of [length]

mb_ereg_search_init(<search_string>, <pattern>)     // prepare string search
mb_ereg_search()                                    // return the boolean result of a prepard string search (iterable with while-loop)
mb_ereg_replace(<pattern>, <replace>, <string>)     // replace all occurrences of <pattern> in <string> with <replace> (case sensitive) and return string
mb_eregi_replace(<pattern>, <replace>, <string>)    // replace all occurrences of <pattern> in <string> with <replace> (case insensitive) and return string
```

<br>
<br>

## **Casting** 

<br>

```php
intval(<string>)         // cast <string> to integer
floatval(<input>)        // cast <string> to float
strval(<number>)         // cast <number> to string
htmlentities(<string>)   // convert all applicable characters to HTML entities
```

<br>
<br>

## **Conditional Statements**

<br>

```php
// if statement
if (<condition>) {
   <statements>;
} elseif {
   <statements>;
} else {
   <statements>;
}


// switch case statement
switch($<variable>) {
   case <value_1>:
      <statements>;
      break;
   case <value_n-2>:
   case <value_n-1>:
   case <value_n>:
      <statements>;
      break;
   default:
      <statements>;
}


// conditional assignment with ternary operator
$<variable_name> = <condition> ? <if_value> : <else_value>;


// conditional assignment with null coalescing operator:
$<variable_name> ??= <if_null_or_nonexistent_value>;
```

<br>
<br>

## **Loops**

<br>

```php
// for loop
for (<index_variable>=<start_value>; <condition>; <incrementation_of_index>) {
   <statements>;
}


// head-controlled while loop
while (<condition>) {
   <statements>;
}


// foot-controlled while loop
do {
   <statements>;
} while (<condition);

	
// for each loop
foreach($<array_variable> as [$<value_variable> | $<key_variable>=><value_variable>]) {
   <statements>;	
}
```

|Keyword  |Description          |
|:--------|:--------------------|
|break    |exit loop            |
|continue |exit current loop run|

<br>
<br>

## **Functions**

<br>

```php
[@]function <function_name>($<parameter_1>, ... , $<parameter_n>) {
   return [<return_value>];
}
```

|Element                        |Description                                                                                  |
|:------------------------------|:--------------------------------------------------------------------------------------------|
|@	                             |optional silence operator; suppresses errors and warnings from this function                 |
|$\<parameter>	                 |call-by-value                                                                                |
|&$\<parameter>                 |call-by-reference                                                                            |
|$\<parameter>=<default_value>  |optional parameter; gets initialized with <default_value> if not added to the function call. |
|\<parameter_name>: \<value>    |match <value> to <parameter_name> in function call (only >= PHP8)                            |
|global \<variable_name>;       |keyword to access global variables from within a function                                    |

<br>

### **Call By Reference**

```php
<?php
   function swap(&$a, &$b) {
      $temp = $a;
      $a = $b;
      $b = $temp;
   }			
?>
```

<br>

### **Optional Type Declarations (since PHP 7.0)**

```php
<?php declare(strict_types=1); ?>   // activate optional type declarations at the start of a utf-8 encoded file

function <function_name>(<type> <parameter_1>, ... , <type> <parameter_n>):[?]<type_of_result>
```

|Available Types|
|:--------------|
|int            |
|float          |
|string         |
|bool           |

Example:
```php
<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      // ...
   </head>
   <body>
      <?php
         function add(int $a, int $b):int {
            return $a + $b;
         };
      ?> 
   </body>
</html>
```

<br>

### **Variable Number Of Parameters**

<br>

#### **Option 1: Variadic Function**

```php
function <function_name>($<parameter_1>, $<parameter_2>, ...$<array_variable_for_all other parameters>) {
   // ...
}
```

<br>

#### **Option 2**

<br>

Methods to use within the function:  
|Method              |Description                                          |
|:-------------------|:----------------------------------------------------|
func_num_args()      |returns the number of parameters passed to a function|
func_get_arg(<index>)|returns parameter with <index> from parameter list   |
func_get_args()      |returns numeric array of all parameters              |

<br>

Example:
```php
<?php 
   function flex() {

      for ($i=0; $i<func_num_args(); $i++) {
         echo func_get_arg($i);
      }

      $params = func_get_args();
      for ($i=0; $i<func_num_args(); $i++) {
         echo $params[$i];
      }

   }

   flex("a", "b");
   flex(1, 2, 3, 4, 5);
?>
```

<br>
<br>

## **Classes**
[KnowledgeBase/Programming/php/class.php](./class.php).

<br>
<br>

## **Exceptions**

```php
	try {
		if (<exception_condition>) {
			throw new Exception(<exception_message>);
		}
		<statements>;
	} catch(Exception $e) {
		<error_handling>;
	} finally {
		<statements>;
	} 

	// optional finally-block will be executed regardless of whether an exception is thrown
```

<br>
<br>

## **Receiving Data**
<br>

HTML  
```html
<!-- Sending data to PHP program-->
<form [...] action="<phpProgram>" method="<post | get>">
   <input type="<type>" name="<input_name>">
			[...]
		</form>
```

PHP  
```php
// Method POST: access input-elements by name
$<variable_name> = htmlentities($_POST["<input_name>"]);

// Method GET: access key-value pair in url
// <url>/<filename>.<extension>?<key_1>=<value_1>&...&<key_n>=<value_n>
$<variable_name> = $_GET["<key>"];
```

<br>
<br>

## **Files and Directories**
<br>

### **Uploading files to the server**

HTML

```html
<form enctype="multipart/form-data" action="<phpProgram>" method="post">
   <input type="file" name="<input_name>">
   <input type="submit">
</form>
```

PHP

```php
// File is temporary stored after uploading it. To make it persistent use:
copy($_FILES["<input_name>]["tmp_name"], <persistent_file_name>);	
```


<br>

File properties:  
```php
$_FILES["<input_name>"]["property"]
```


|Property |Description                              |
|:--------|:----------------------------------------|
|name     |original file name                       |
|tmp_name |temporary name of uploaded file on server|
|size     |file size                                |
|type     |file type                                |

<br>

### **Write To A File**

```php
file_put_contents(<file_url>, <content>, [FILE_APPEND])		

// creates <file_url> with <content> 
// (Flag: FILE_APPEND appends <content> to existing <file_url>) 
// Return number of written bytes or false. 
```

<br>

### **Read From A File**

```php
file_get_contents(<file_url>)    // return content of <file_url> in a single string

file(<file_url>, [flag])         // return an array containing each line of <file_url>
```

|Flag                 |Description                                  |
|:--------------------|:--------------------------------------------|
|FILE_IGNORE_NEW_LINES|omit newline at the end of each array element|
|FILE_SKIP_EMPTY_LINE |skip empty lines                             |

<br>

### **Metafile Data**

```php
stat(<file_url>)     // return associative array of metadata or false
```

|Property |Description              |
|:--------|:------------------------|
|dev      |device number            |
|ino      |inode number             |
|nlink    |number of links          |
|uid      |userid of owner          |
|gid		 |groupid of owner         |
|size		 |size in bytes            |
|atime    |time of last access      |
|mtime    |time of last modification|

<br>

### **Directories**

```php
getcwd()                            // get current working directory
file_exists(<file_or_directory>)    // check existence of <file_or_directory>
is_file(<file_or_directory>)        // check whether <file_or_directory> is file
is_directory(<file_or_directory>)   // check whether <file_or_directory> is directory
is_readable(<file>)                 // check whether <file> is readable
is_writeable(<file>)                // check whether <file> is writeable

chdir(<directory_url>)              // change working directory to <directory_url> and return boolean
opendir(<directory_url>)            // return handle on <directory_url>
readdir(<directory_handle>)         // return next name of object for <directory_handle> (iterable)
closedir(<directory_handle>)        // close <directory_handle>	
```

<br>
<br>

## **Database Connection**
<br>

For MariaDB/MySQL:   [KnowledgeBase/Programming/database_systems/mariadb_mysql/connectors](../database_systems/mariadb_mysql/connectors/mysql_connector_php.php)  
For SQLite: [KnowledgeBase/Programming/database_systems/sqlite](../database_systems/sqlite/connectors/sqlite_php.php)

<br>
<br>

## **Sessions and Cookies**
<br>

```php
session_start()                                          // starts new session; Must be written before each document of the session
session_destroy()                                        // destroy all data registered to a session
session_id(<id>)                                         // get or set session id			
$_SESSION                                                // superglobal array containing USER DEFINED session variables

setcookie(<name>, [value], [expires], [path], [domain])  // send a cookie		
$_COOKIE                                                 // superglobal array containing variables of cookie
```

<br>
<br>

## **XML Files**
<br>

```php
$<object_variable> = simplexml_load_file(<filename.xml>)             // parse external <filename.xml> into an object or return false
$<object_variable> = simplexml_load_string(<xml_string>)             // parse internal <xml_string> into an object or return false
                                                                     // $<xml_string> = <<< XML <content> XML;

$<object_variable>-><element_layer_1>[->element_layer_2]             // access property of parsed xml file containing only one object
$<objects_variable>-><objects_variable>[<index>]-><element_layer_1>  // access property of object<index> in a set of objects contained in parsed xml file 
$<object_variable>-><element_layer_1>[<attribute_name>]              // access attribute values of <object_variable>.<element_layer_1>

$<object_variable>-><element> = <new_value>;                         // assign new value to <element>
file_put_contents(<filename.xml>, $<object_variable>->asXML())       // save changes of <filename.xml>
```

<br>
<br>

## **Date And Time**
<br>

```php
time()                                                      // return current unix timestamp (number of second since 01-01-1970 00:00:00)
microtime()                                                 // return current unix timestamp in milliseconds
setlocale(LC_TIME, <localisation>)                          // set localisation for current process
checkdate(<month>, <day>, <year>                            // return true if the given date is valid 
mktime(<hour>, [minute], [second], [month], [day], [year])  // return unix timestamp for given time
strtotime(<datetime_string>, [baseTimeStamp])               // parse english datetime description into unix timestamp


/*
		  <+ | - | next | last> <number> >week | day | month | year][s]>
		  examples: +4 weeks +5 days
			         next Monday
			         last year      
*/


// Formatting:
date(<format_string>, [time_stamp])
strftime(<format_string>, [time_stamp])
```
<br>

### **Format String Elements**

<br>

Day  
|Symbol|Description                                           |Value                                  |
|:-----|:-----------------------------------------------------|:--------------------------------------|
|%a    |Abbreviation of the day                               |Sun through Sat                        |
|%A    |Full Name of the day                                  |Sunday through Saturday                |
|%d    |Two-digit day of the month                            |01 to 31                               |
|%e    |Day of the month                                      |1 to 31                                |
|%j    |Day of the year                                       |001 to 366                             |
|%u    |ISO-8601 numeric representation of the day of the week|1 (for Monday) through 7 (for Sunday)  |
|%w    |Numeric representation of the day of the week         |0 (for Sunday) through 6 (for Saturday)|

<br>

Week  
|Symbol|Description                                                  |Value                                                     |
|:-----|:------------------------------------------------------------|----------------------------------------------------------|
|%U    |Week number of the given year, starting with the first Sunday|13 (for the 13th full week of the year)                   |
|%W    |Week number of the year, starting with the first Monday      |46 (for the 46th week of the year beginning with a Monday)|

<br>

Month  
|Symbol|Description                                                 |Value                                     |
|:-----|:-----------------------------------------------------------|:-----------------------------------------|
|%b    |Abbreviated month name, based on the locale                 |Jan through Dec                           |
|%B    |Full month name, based on the locale                        |January through December                  |
|%h    |Abbreviated month name, based on the locale (an alias of %b)|Jan through Dec                           |
|%m    |Two digit representation of the month                       |01 (for January) through 12 (for December)|

<br>

Year
|Symbol|Description                            |Value                               |
|:-----|:--------------------------------------|:-----------------------------------|
|%C    |Two digit representation of the century|19 for the 20th Century             |
|%g    |Two digit representation of the year   |09 for the week of January 6, 2009  |
|%G    |The full four-digit version of %g      |2008 for the week of January 3, 2009|
|%y    |Two digit representation of the year   |09 for 2009, 79 for 1979            |
|%Y    |Four digit representation for the year |2038                                |

<br>

Time  
|Symbol|Description                                                 |Value                                |
|:-----|:-----------------------------------------------------------|:------------------------------------|
|%H    |Two digit representation of the hour in 24-hour format      |00 through 23                        |
|%k    |Hour in 24-hour format, with a space preceding single digits|0 through 23                         |
|%I    |Two digit representation of the hour in 12-hour format      |01 through 12                        |
|%l    |Hour in 12-hour format, with a space preceding single digits|through 12                           |
|%M    |Two digit representation of the minute                      |00 through 59                        |
|%p    |UPPER-CASE 'AM' or 'PM' based on the given time             |AM for 00:31, PM for 22:23           |
|%P    |lower-case 'am' or 'pm' based on the given time             |am for 00:31, pm for 22:23           |
|%r    |Same as "%I:%M:%S %p"                                       |09:34:17 PM for 21:34:17             |
|%R    |Same as "%H:%M"                                             |00:35 for 12:35 AM, 16:44 for 4:44 PM|
|%S    |Two digit representation of the second                      |00 through 59                        |
|%T    |Same as "%H:%M:%S"                                          |21:34:17 for 09:34:17 PM             |
|%X    |Preferred time representation based on locale, without date |03:59:16 or 15:59:16                 |
|%Z    |The time zone abbreviation.                                 |EST for Eastern Time                 |

<br>

Time and Date Stamps  
|Symbol|Description                                              |Value
|:-----|:--------------------------------------------------------|:----------------------------------------------------------|
|%c    |Preferred date and time stamp based on locale            |Tue Feb 5 00:45:10 2009 for February 5, 2009 at 12:45:10 AM|
|%D    |Same as "%m/%d/%y"                                       |02/05/09 for February 5, 2009                              |
|%F    |Same as "%Y-%m-%d" (commonly used in database datestamps)|2009-02-05 for February 5, 2009                            |
|%s    |Unix Epoch Time timestamp                                |305815200 for September 10, 1979 08:40:00 AM               |
|%x    |Preferred date representation based on locale            |02/05/09 for February 5, 2009                              |

<br>

Miscellaneous
|Symbol|Description                         |
|:-----|:-----------------------------------|
|%n    |A newline character ("\n")          |
|%t    |A Tab character ("\t")              |
|%%    |A literal percentage character ("%")|

<br>
<br>

## **Formatting**

<br>

```php
number_format(<number>, [number_of_decimals], [decimal_separator], [thousands_separator]);
```

```php
nl2br(<string>);        //replaces all occurrences of "\n" with <br>
```

```php
sprintf(<format_string>, <string>);
```

|Format|Description                    |
|:-----|:------------------------------|
|%f    |float                          |
|%.3f  |float rounded at third position|
|%e    |exponent                       |
|%d    |integer                        |

