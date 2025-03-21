<?php


declare( strict_types = 1 );


namespace JDWX\Options;


readonly class ListOption extends AbstractOption {


    /** @param list<string> $rValues */
    final protected function __construct( private array $rValues ) {}


    public static function set( array $i_rValues ) : static {
        return new static( $i_rValues );
    }


    /** @return list<string> */
    public function get() : array {
        return $this->rValues;
    }


}
