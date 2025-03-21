<?php


declare( strict_types = 1 );


namespace JDWX\Options;


readonly class BooleanOption extends AbstractOption {


    final protected function __construct() {}


    public static function set() : static {
        return new static();
    }


    public function get() : true {
        return true;
    }


}
