<?php


declare( strict_types = 1 );


namespace JDWX\Options;


readonly class StringOption extends AbstractOption {


    final protected function __construct( private string $stValue ) {}


    public static function set( string $i_stValue ) : static {
        return new static( $i_stValue );
    }


    public function get() : string {
        return $this->stValue;
    }


}
