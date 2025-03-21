<?php


declare( strict_types = 1 );


use JDWX\Options\BooleanOption;
use PHPUnit\Framework\TestCase;


/** @covers \JDWX\Options\BooleanOption */
class BooleanOptionTest extends TestCase {


    public function testGet() : void {
        $option = BooleanOption::set();
        /** @phpstan-ignore-next-line */
        self::assertTrue( $option->get() );
    }


}
