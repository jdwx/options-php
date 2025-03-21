<?php


declare( strict_types = 1 );


namespace JDWX\Options;


trait OptionableTrait {


    private OptionSetInterface $options;


    public function options() : OptionSetInterface {
        return $this->options;
    }


}