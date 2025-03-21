<?php


declare( strict_types = 1 );


use JDWX\Options\BooleanOption;
use JDWX\Options\IntegerOption;
use JDWX\Options\ListOption;
use JDWX\Options\StringOption;
use PHPUnit\Framework\TestCase;


require_once __DIR__ . '/MyOptionSet.php';


/** @covers \JDWX\Options\AbstractOptionSet */
final class AbstractOptionSetTest extends TestCase {


    public function testAdd() : void {
        $list = MyOptionSet::set();
        self::assertNull( $list->fetch( StringOption::class ) );

        # OptionList instances are immutable.
        $list->add( StringOption::set( 'foo' ) );
        self::assertNull( $list->fetch( StringOption::class ) );

        $foo = StringOption::set( 'foo' );
        $list = $list->add( $foo );
        self::assertSame( $foo, $list->fetch( StringOption::class ) );

        $foo = StringOption::set( 'foo' );
        $bar = IntegerOption::set( 42 );
        $baz = BooleanOption::set();

        # Adding a list. New options overwrite existing ones of the
        # same type.
        $list = MyOptionSet::set( $foo, IntegerOption::set( 123 ) );
        $list2 = $list->add( MyOptionSet::set( $bar, $baz ) );
        self::assertSame( $foo, $list2->fetch( StringOption::class ) );
        self::assertSame( $bar, $list2->fetch( IntegerOption::class ) );
        self::assertSame( $baz, $list2->fetch( BooleanOption::class ) );

    }


    public function testFetch() : void {
        $foo = StringOption::set( 'foo' );
        $bar = IntegerOption::set( 42 );
        $baz = BooleanOption::set();
        $list = MyOptionSet::set( $baz );
        $list = MyOptionSet::set( $foo, [ $bar, [ $list, null ] ] );
        self::assertSame( $foo, $list->fetch( StringOption::class ) );
        self::assertSame( $bar, $list->fetch( IntegerOption::class ) );
        self::assertSame( $baz, $list->fetch( BooleanOption::class ) );
    }


    public function testFetchBoolean() : void {
        $list = MyOptionSet::set();
        self::assertFalse( $list->fetchBooleanPub( BooleanOption::class ) );

        $list = MyOptionSet::set( BooleanOption::set() );
        self::assertTrue( $list->fetchBooleanPub( BooleanOption::class ) );
    }


    public function testFetchInt() : void {
        $list = MyOptionSet::set();
        self::assertNull( $list->fetchIntPub( IntegerOption::class ) );

        $list = MyOptionSet::set( IntegerOption::set( 42 ) );
        self::assertSame( 42, $list->fetchIntPub( IntegerOption::class ) );
    }


    public function testFetchList() : void {
        $list = MyOptionSet::set();
        self::assertNull( $list->fetchListPub( ListOption::class ) );

        $list = MyOptionSet::set( ListOption::set( [ 'foo', 'bar', 'baz' ] ) );
        self::assertSame( [ 'foo', 'bar', 'baz' ], $list->fetchListPub( ListOption::class ) );
    }


    public function testFetchString() : void {
        $list = MyOptionSet::set();
        self::assertNull( $list->fetchStringPub( StringOption::class ) );

        $list = MyOptionSet::set( StringOption::set( 'foo' ) );
        self::assertSame( 'foo', $list->fetchStringPub( StringOption::class ) );
    }


    public function testFetchValueForInvalid() : void {
        $list = MyOptionSet::set();
        self::expectException( InvalidArgumentException::class );
        $list->fetchValuePub( 'no_such_class' );
    }


    public function testSetForInvalid() : void {
        MyOptionSet::interface( 'no_such_class' );
        self::expectException( InvalidArgumentException::class );
        MyOptionSet::set( IntegerOption::set( 42 ) );
    }


}
