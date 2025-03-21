<?php


declare( strict_types = 1 );


use JDWX\Options\IntegerOption;
use PHPUnit\Framework\TestCase;


/** @covers \JDWX\Options\IntegerOption */
class IntegerOptionTest extends TestCase {


    public function testGet() : void {
        $opt = IntegerOption::set( 42 );
        self::assertSame( 42, $opt->get() );
    }


}
