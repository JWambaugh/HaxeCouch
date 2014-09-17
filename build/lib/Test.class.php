<?php

class Test {
	public function __construct(){}
	static function main() {
		$cb = new Couchbase((new _hx_array(array("myHost"))), "blay", "blay", "blay", false);
		haxe_Log::trace(couchbase_CouchbaseConst::$COUCHBASE_SUCCESS, _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 9, "className" => "Test", "methodName" => "main")));
	}
	function __toString() { return 'Test'; }
}
