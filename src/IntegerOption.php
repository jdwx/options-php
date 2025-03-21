<?php


declare( strict_types = 1 );


namespace JDWX\Options;


readonly class IntegerOption extends AbstractOption {


    final protected function __construct( private int $iValue ) {}


    public static function set( int $iValue ) : static {
        return new static( $iValue );
    }


    public function get() : int {
        return $this->iValue;
    }


}
