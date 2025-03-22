<?php


declare( strict_types = 1 );


namespace Example;


require_once __DIR__ . '/../vendor/autoload.php';


use JDWX\Options\AbstractOptionSet;
use JDWX\Options\OptionableInterface;


/**
 * Declaring your own copies of these is intended to provide at least
 * limited ability for type-checking to tell you if you're mixing
 * multiple option types.
 */
interface OptionInterface extends \JDWX\Options\OptionInterface { }


readonly class BooleanOption extends \JDWX\Options\BooleanOption implements OptionInterface { }


readonly class IntegerOption extends \JDWX\Options\IntegerOption implements OptionInterface { }


readonly class ListOption extends \JDWX\Options\ListOption implements OptionInterface { }


readonly class StringOption extends \JDWX\Options\StringOption implements OptionInterface { }


/** Now you can define an option, a string in this case. */
readonly class ExampleOption extends StringOption { }


/**
 * Add methods to your OptionSet class to expose your options.
 * Note that OptionSet instances are invariant.
 */
readonly class OptionSet extends AbstractOptionSet {


    /** @param OptionInterface|list<OptionInterface>|OptionableInterface|null ...$rOptions */
    public static function set( \JDWX\Options\OptionInterface|array|OptionableInterface|null ...$rOptions ) : static {
        return new static( OptionInterface::class, $rOptions );
    }


    /** Expose the ExampleOption. */
    public function getExample() : ?string {
        return $this->fetchString( ExampleOption::class );
    }


}


( function () : void {

    $set = OptionSet::set( ExampleOption::set( 'example' ) );
    var_dump( $set->getExample() );

} )();
