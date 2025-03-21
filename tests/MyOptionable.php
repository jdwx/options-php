<?php


declare( strict_types = 1 );


use JDWX\Options\OptionableTrait;
use JDWX\Options\OptionSetInterface;


class MyOptionable {


    use OptionableTrait;


    public function __construct( OptionSetInterface $options ) {
        $this->options = $options;
    }


}
