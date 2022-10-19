# **NodeJS HTTP/2**
<br>

## **Table Of Contents**
<br>

- [**NodeJS HTTP/2**](#nodejs-http2)
	- [**Table Of Contents**](#table-of-contents)
	- [**General**](#general)
		- [**createSecureServer()**](#createsecureserver)
		- [**connect()**](#connect)
		- [**getDefaultSettings()**](#getdefaultsettings)
		- [**getPackedSettings()**](#getpackedsettings)
	- [**Http2SecureServer**](#http2secureserver)
		- [**Events**](#events)
			- [**connection**](#connection)
			- [**request**](#request)
			- [**session**](#session)
			- [**sessionError**](#sessionerror)
			- [**stream**](#stream)
			- [**timeout**](#timeout)
			- [**unknownProtocol**](#unknownprotocol)
		- [**Properties**](#properties)
			- [**timeout**](#timeout-1)
		- [**Methods**](#methods)
			- [**close()**](#close)
			- [**setTimeout()**](#settimeout)
	- [**Sessions**](#sessions)
		- [**Http2Session**](#http2session)
			- [**Events**](#events-1)
				- [**connect**](#connect-1)
				- [**close**](#close-1)
				- [**frameError**](#frameerror)
				- [**goaway**](#goaway)
				- [**ping**](#ping)
				- [**stream**](#stream-1)
				- [**timeout**](#timeout-2)
				- [**type**](#type)
			- [**Properties**](#properties-1)
				- [**closed**](#closed)
				- [**connecting**](#connecting)
				- [**destroyed**](#destroyed)
				- [**encrypted**](#encrypted)
				- [**socket**](#socket)
				- [**state**](#state)
			- [**Methods**](#methods-1)
				- [**close()**](#close-2)
				- [**destroy()**](#destroy)
				- [**goaway()**](#goaway-1)
				- [**ping()**](#ping-1)
				- [**setLocalWindowSize()**](#setlocalwindowsize)
				- [**setTimeout()**](#settimeout-1)
		- [**ClientHttp2Session**](#clienthttp2session)
			- [**Methods**](#methods-2)
				- [**request()**](#request-1)
	- [**Streams**](#streams)
		- [**Http2Stream**](#http2stream)
			- [**Events**](#events-2)
				- [**aborted**](#aborted)
				- [**close**](#close-3)
				- [**error**](#error)
				- [**frameError**](#frameerror-1)
				- [**ready**](#ready)
				- [**timeout**](#timeout-3)
				- [**trailers**](#trailers)
				- [**wantTrailers**](#wanttrailers)
			- [**Properties**](#properties-2)
				- [**aborted**](#aborted-1)
				- [**bufferSize**](#buffersize)
				- [**closed**](#closed-1)
				- [**destroyed**](#destroyed-1)
				- [**endAfterHeaders**](#endafterheaders)
				- [**id**](#id)
				- [**pending**](#pending)
				- [**sentHeaders**](#sentheaders)
				- [**sentInfoHeaders**](#sentinfoheaders)
				- [**session**](#session-1)
				- [**state**](#state-1)
			- [**Methods**](#methods-3)
				- [**close()**](#close-4)
				- [**priority()**](#priority)
				- [**setTimeout(milliseconds, callback)**](#settimeoutmilliseconds-callback)
				- [**sendTrailers()**](#sendtrailers)

<br>
<br>
<br>

## **General**
<br>
<br>

### **createSecureServer()**
<br>

```
createSecureServer(optionsObject, [onRequestHandler]) : Http2SecureServer
```
* returns server that creates and manages Http2Session
* optionsObject requires identity options like _key_/_cert_

<br>

|Option                     |Type                   |Default                               |Description                                                                            |
|:--------------------------|:----------------------|:-------------------------------------|:--------------------------------------------------------------------------------------|
|allowHTTP1                 |boolean                |false                                 |Indicate whether client connections not supporting HTTP/2 can be downgraded to HTTP1.x |
|maxDeflateDynamicTableSize |number                 |4KiB                                  |maximum dynamic table size for deflating header fields                                 |
|maxSettings                |number                 |32                                    |maximum number of setting entries  per _SETTING_ frame                                 |
|maxSessionMemory           |number                 |10                                    |maximum usable memory for  _HTTP2Session_ in megabytes                                 |
|maxHeaderListPairs         |number                 |128                                   |maximum number of header entries                                                       |
|maxOutstandingPings        |number                 |10                                    |maximum number of unacknowledged pings                                                 |
|maxSendHeaderBlockLength   |number                 |                                      |set maximum size for serialized, compressed block of headers                           |
|paddingStrategy            |number                 |http2.constants.PADDING_STRATEGY_NONE |padding strategy for _HEADERS_ and _DATA_                                              |
|peerMaxConcurrentStreams   |number                 |100                                   |maximum number of concurrent streams for remote peer                                   |
|maxSessionInvalidFrames    |integer                |1000                                  |maximum number of invalid frames before session is closed                              |
|maxSessionRejectedStreams  |integer                |100                                   |maximum number of rejected upon creation streams before session is closed              |
|settings                   |HTTP/2 Settings Object |                                      |initial settings sent to remote peer upon connections                                  |
|origins                    |string[]               |                                      |strings to send within _ORIGIN_ frame                                                  |
|unknownProtocolTimeout     |number                 |10000                                 |timout in milliseconds to wait after _unknownProtocol_ event before destroying socket  |

<br>
<br>

### **connect()**
<br>

```
connect(authority, [options], [listener]) : ClientHttp2Session

```
* _authority_: url of remote HTTP/2 server to connect to
* _listener_: one-time listener for event _connect_

<br>

|Option                     |Type                   |Default                               |Description                                                                            |
|:--------------------------|:----------------------|:-------------------------------------|:--------------------------------------------------------------------------------------|
|maxDeflateDynamicTableSize |number                 |4KiB                                  |maximum dynamic table size for deflating header fields                                 |
|maxSettings                |number                 |32                                    |maximum number of setting entries  per _SETTING_ frame                                 |
|maxSessionMemory           |number                 |10                                    |maximum usable memory for  _HTTP2Session_ in megabytes                                 |
|maxHeaderListPairs         |number                 |128                                   |maximum number of header entries                                                       |
|maxOutstandingPings        |number                 |10                                    |maximum number of unacknowledged pings                                                 |
|maxReservedRemoteStreams   |number                 |200                                   |maximum number of reserves push streams client will accept                             |
|maxSendHeaderBlockLength   |number                 |                                      |set maximum size for serialized, compressed block of headers                           |
|paddingStrategy            |number                 |http2.constants.PADDING_STRATEGY_NONE |padding strategy for _HEADERS_ and _DATA_                                              |
|peerMaxConcurrentStreams   |number                 |100                                   |maximum number of concurrent streams for remote peer                                   |
|protocol                   |string                 |https:                                |protocol if not set in _authority_                                                     |
|settings                   |HTTP/2 Settings Object |                                      |initial settings sent to remote peer upon connections                                  |
|unknownProtocolTimeout     |number                 |10000                                 |timout in milliseconds to wait after _unknownProtocol_ event before destroying socket  |

<br>
<br>

### **getDefaultSettings()**
<br>

```
getDefaultSettings() : <HTTP/2 Settings Object>
```
* return default settings for _HTTP2Session_ instance in a isolated object instance

<br>
<br>

### **getPackedSettings()**
<br>

```
getPackedSettings([settings]) : Buffer

settings : <HTTP/2 Settings Object>
```
* return serialized representation of HTTP/2 settings 

<br>
<br>
<br>

## **Http2SecureServer**
<br>
<br>

### **Events**
<br>
<br>

#### **connection**
* new TCP stream is established, before start of TLS handshake

<br>
<br>

#### **request**
* each time a request is received

<br>
<br>

#### **session**
* server created new _Http2Session_

<br>
<br>

#### **sessionError**
* _Http2Session_ emitted _error_ event

<br>
<br>

#### **stream**
* new _Http2Stream_ is created

<br>
<br>

#### **timeout**
* no activity on server for given number of milliseconds

<br>
<br>

#### **unknownProtocol**
* client failed to negotiate allowed protocol

<br>
<br>

### **Properties**
<br>
<br>

#### **timeout**
* maximum allowed duration of inactivity in milliseconds

<br>
<br>

### **Methods**
<br>
<br>

#### **close()**
<br>

```
close([callback])
```
* stop establishing new sessions
* _callback_ is invoked when all active sessions have been closed
* it is necessary to call _http2Session.close()_ for all active sessions

<br>
<br>

#### **setTimeout()**
<br>

```
setTimeout([milliseconds], [callback]) : Http2SecureServer
```

<br>
<br>
<br>

## **Sessions**
<br>

* represents an active communication session between a client and a server
* instances should not be created by user code
* instances have slightly different behaviors depending on whether they represent a server or a client

<br>
<br>

### **Http2Session**
<br>
<br>

#### **Events**
<br>
<br>

##### **connect**
* emitted when connection to remote peer successful
* user code typically does not listen to this event

<br>
<br>

##### **close**
* emitted when _Http2Session_ is destroyed

<br>
<br>

##### **frameError**
* emitted when sending a frame fails

<br>
<br>

##### **goaway**
* GOAWAY frame received

<br>
<br>

##### **ping**
* PING frame received from peer

<br>
<br>

##### **stream**
* emitted when new _Http2Stream_ is created

<br>
<br>

##### **timeout**
* emitted when there is no activity after configured number of milliseconds

<br>
<br>

##### **type**
* server: http2.constants._NGHTTP2_SESSION_SERVER_
* client: http2.constants._NGHTTP2_SESSION_CLIENT_

<br>
<br>

#### **Properties**
<br>
<br>


##### **closed**
* boolean indicating whether session has been closed

<br>
<br>

##### **connecting**
* boolean indicating whether session is still connecting

<br>
<br>

##### **destroyed**
* boolean indicating whether session is destroyed

<br>
<br>

##### **encrypted**
* boolean indicating whether session is connected with TLSSocket

<br>
<br>

##### **socket**
* return proxy object for socket with methods limited to those who are safe to use with HTTP/2

<br>
<br>

##### **state**
* return object containing information about session state

<br>
<br>

#### **Methods**
<br>
<br>

##### **close()**
<br>

```
close([callback])
```
* close session gracefully
	* all streams can complete
	* no new streams are created

<br>
<br>

##### **destroy()**
<br>

```
destroy([error], [code])
```
* terminates session and associated sockets immediately

<br>
<br>

##### **goaway()**
<br>

```
goaway([code], [lastStreamId], [opaqueData])

code : number (HTTP/2 error code)
lastStreamId : number (id of last processed HTTP2Stream
opaqueData : Buffer (additional data)
```
* transmit _GOAWAY_ frame to peer without closing session

<br>
<br>

##### **ping()**
<br>

```
ping([payload], callback) : boolean

callback (error, duration, payload)
```
* send _PING_ frame to peer
* return boolean indicating whether ping was sent

<br>
<br>

##### **setLocalWindowSize()**
<br>

```
setLocalWindowSize(size)
```

<br>
<br>

##### **setTimeout()**
<br>

```
setTimeout(milliseconds, callback)
```

<br>
<br>

### **ClientHttp2Session**
<br>
<br>

#### **Methods**
<br>
<br>

##### **request()**
<br>

```
request(headers, [optionObject]) : ClientHttp2Stream

headers : <HTTP/2 Headers Object>
```

<br>

|Option          |Type        |Description                                                                      |
|:---------------|:-----------|:--------------------------------------------------------------------------------|
|endStream       |boolean     |indicate whether _Http2Stream_ writable should initially be closed               |
|exclusive       |boolean     |                                                                                 |
|parent          |number      |stream id the new stream is dependent on                                         |
|weight          |number      |relative dependency in relation to other streams with same _parent_              |
|waitForTrailers | boolean    |indicates whether stream will emit _wantTrailers_ event after final _DATA_ frame |
|signal          |AbortSignal |                                                                                 |


<br>
<br>
<br>

## **Streams**
<br>
<br>
<br>

### **Http2Stream**
<br>

* represents a bidirectional HTTP/2 communication stream over a _Http2Session_
* One session can have many stream instances
* Server: streams are created, managed and provided by _Http2Session_, not by user code
* Client: streams are created by _http2session.request()_ or in response to an incoming _push_ event

<br>
<br>

#### **Events**
<br>
<br>

##### **aborted**
* emitted when stream is aborted mid-communication

<br>
<br>

##### **close**
* emitted when stream is destroyed

<br>
<br>

##### **error**
* emitted when processing of stream fails

<br>
<br>

##### **frameError**
* emitted when sending a frame fails

<br>
<br>

##### **ready**
* emitted when stream is ready to use

<br>
<br>

##### **timeout**
* emitted after stream is inactive for configured number of milliseconds

<br>
<br>

##### **trailers**
* emitted when trailing header fields are received

<br>
<br>

##### **wantTrailers**
* emitted when stream queued final _DATA_ frame and stream is ready to send trailing headers

<br>
<br>

#### **Properties**
<br>
<br>

##### **aborted**
* boolean indicating whether stream was aborted abnormally

<br>
<br>

##### **bufferSize**
* number of characters buffered to be written

<br>
<br>

##### **closed**
* boolean indicating whether stream has been closed

<br>
<br>

##### **destroyed**
* boolean indicating whether stream has been destroyed

<br>
<br>

##### **endAfterHeaders**
* boolean indicating whether no additional data should be received

<br>
<br>

##### **id**

<br>
<br>

##### **pending**
* boolean indicating whether stream is still waiting for assignment of an id

<br>
<br>

##### **sentHeaders**
* return object containing headers

<br>
<br>

##### **sentInfoHeaders**
* return array of objects containing informational (additional) headers

<br>
<br>

##### **session**
* reference of session that owns the stream

<br>
<br>

##### **state**
* return object containing statue information about stream

<br>
<br>

#### **Methods**
<br>
<br>

##### **close()**
<br>

```
close(errorCode, [callback])

errorCode : number (Default: http2.constants.NGHTTP2_NO_ERROR)
```
* close stream by sending _RST_STREAM_ frame to peer

<br>
<br>

##### **priority()**
<br>

```
priority(optionObject)

optionObject = {
	exclusive : boolean,
	parent : number,
	weight : number,
	silent : boolean
}
```
* update stream priority

<br>
<br>

##### **setTimeout(milliseconds, callback)**
<br>

```
setTimeout(milliseconds, callback)
```

<br>
<br>

##### **sendTrailers()**
<br>

```
sendTrailers(headers)

headers : <HTTP/2 Headers Object>
```
* send trailing _HEADERS_ grame to peer