<?php


declare( strict_types = 1 );


use JDWX\Options\StringOption;
use PHPUnit\Framework\TestCase;


/** @covers \JDWX\Options\StringOption */
class StringOptionTest extends TestCase {


    public function testGet() : void {
        $opt = StringOption::set( 'foo' );
        self::assertSame( 'foo', $opt->get() );
    }


}
