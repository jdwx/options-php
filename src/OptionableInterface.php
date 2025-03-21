<?php


declare( strict_types = 1 );


namespace JDWX\Options;


interface OptionableInterface {


    public function options() : OptionSetInterface;


}