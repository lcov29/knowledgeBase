# **NodeJS Streams**
<br>

## **Table Of Contents**
<br>

- [**NodeJS Streams**](#nodejs-streams)
  - [**Table Of Contents**](#table-of-contents)
  - [**General**](#general)
  - [**Stream Types**](#stream-types)
  - [**Example**](#example)

<br>
<br>
<br>

## **General**
<br>

A Stream is a flow of data chunks, comparable to an array laid out in time. We can use a stream when we want to process a big amount of data.

<br>
<br>
<br>

## **Stream Types**
<br>

1. Writable Stream
2. Readable Stream
3. Duplex Stream (readable and writable)
4. Transform (duplex with data modification)

<br>
<br>
<br>

## **Example**
<br>

```javascript
import { createReadStream, createWriteStream } from 'node:fs';
import { join } from 'node:path';
import { URL } from 'node:url';

const dirname = new URL('.', import.meta.url).pathname;
const fileName = join(dirname, 'testStreamFile');


// ==== WriteStream ====
const fileWriteStream = createWriteStream(fileName, {encoding: 'utf8'});
fileWriteStream.write('Content added via WriteStream\n');
fileWriteStream.write('Additional content added via WriteStream\n');
fileWriteStream.close();



// ==== ReadStream ====
const fileReadStream = createReadStream(fileName, {encoding: 'utf8'});
// setting encoding is important to prevent splitting of unicode characters between chunks

let numberOfChunks = 0;

const onData = function(data) {
    console.log(data);
    numberOfChunks++;
};

const onEnd = function() {
    console.log(`End of ReadStream`);
    unsubscribe();
};

const onError = function(error) {
    console.log(error);
    unsubscribe();
    fileReadStream.resume();
}

const unsubscribe = function() {
    fileReadStream.removeListener('data', onData);
    fileReadStream.removeListener('end', onEnd);
    fileReadStream.removeListener('error', onError);
}

fileReadStream.on('data', onData);
fileReadStream.on('end', onEnd);
fileReadStream.on('error', onError);
```