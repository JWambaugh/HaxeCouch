package ;

import couchbase.Couchbase;
import couchbase.CouchbaseConst;

class Test{
	static function main(){
	var cb = new Couchbase(['myHost'],"blay","blay","blay",false);
	trace(CouchbaseConst.COUCHBASE_SUCCESS);
	}
}