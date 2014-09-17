<?php

class couchbase_CouchbaseConst {
	public function __construct(){}
	static $COUCHBASE_SUCCESS = 0;
	static $COUCHBASE_AUTH_CONTINUE = 1;
	static $COUCHBASE_DELTA_BADVAL = 3;
	static $COUCHBASE_E2BIG = 4;
	static $COUCHBASE_EBUSY = 5;
	static $COUCHBASE_EINTERNAL = 6;
	static $COUCHBASE_ENOMEM = 8;
	static $COUCHBASE_ERROR = 10;
	static $COUCHBASE_ETMPFAIL = 11;
	static $COUCHBASE_KEY_EEXISTS = 12;
	static $COUCHBASE_KEY_ENOENT = 13;
	static $COUCHBASE_NETWORK_ERROR = 16;
	static $COUCHBASE_NOT_MY_VBUCKET = 17;
	static $COUCHBASE_NOT_STORED = 18;
	static $COUCHBASE_NOT_SUPPORTED = 19;
	static $COUCHBASE_UNKNOWN_COMMAND = 20;
	static $COUCHBASE_UNKNOWN_HOST = 21;
	static $COUCHBASE_OPT_SERIALIZER = 1;
	static $COUCHBASE_OPT_COMPRESSION = 2;
	static $COUCHBASE_OPT_PREFIX_KEY = 3;
	static $COUCHBASE_OPT_IGNOREFLAGS = 4;
	static $COUCHBASE_OPT_VOPTS_PASSTHROUGH = 5;
	static $COUCHBASE_SERIALIZER_PHP = 0;
	static $COUCHBASE_SERIALIZER_JSON = 1;
	static $COUCHBASE_SERIALIZER_JSON_ARRAY = 2;
	static $COUCHBASE_COMPRESSION_NONE = 0;
	static $COUCHBASE_COMPRESSION_ZLIB = 1;
	static $COUCHBASE_COMPRESSION_FASTLZ = 2;
	static $COUCHBASE_PRESERVE_ORDER = 1;
	function __toString() { return 'couchbase.CouchbaseConst'; }
}