<?php


declare( strict_types = 1 );


namespace JDWX\Options;


interface OptionSetInterface extends OptionableInterface {


    public function add( OptionableInterface|OptionInterface $i_rOption ) : static;


    public function fetch( string $i_stClass ) : ?OptionInterface;


    public function getOptions() : array;


}