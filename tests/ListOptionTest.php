<?php


declare( strict_types = 1 );


use JDWX\Options\ListOption;
use PHPUnit\Framework\TestCase;


/** @covers \JDWX\Options\ListOption */
class ListOptionTest extends TestCase {


    public function testGet() : void {
        $opt = ListOption::set( [ 'foo', 'bar', 'baz' ] );
        self::assertEquals( [ 'foo', 'bar', 'baz' ], $opt->get() );
    }


}
