<?php


declare( strict_types = 1 );


namespace JDWX\Options;


interface OptionSetInterface extends OptionableInterface {


    public function getOptions() : array;


}