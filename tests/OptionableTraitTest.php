<?php


declare( strict_types = 1 );


use JDWX\Options\OptionInterface;
use JDWX\Options\StringOption;
use PHPUnit\Framework\TestCase;


require_once __DIR__ . '/MyOptionable.php';
require_once __DIR__ . '/MyOptionSet.php';


class OptionableTraitTest extends TestCase {


    public function testOptions() : void {
        MyOptionSet::interface( OptionInterface::class );
        $list = MyOptionSet::set( StringOption::set( 'foo' ) );
        $able = new MyOptionable( $list );
        self::assertSame( $list, $able->options() );
    }


}