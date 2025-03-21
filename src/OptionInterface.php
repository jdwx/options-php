<?php


declare( strict_types = 1 );


namespace JDWX\Options;


interface OptionInterface {


    public static function default() : mixed;


    public function get() : mixed;


}