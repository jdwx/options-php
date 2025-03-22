<?php


declare( strict_types = 1 );


namespace JDWX\Options;


readonly abstract class AbstractOptionSet implements OptionSetInterface {


    /** @var array<string, OptionInterface> */
    private array $rOptions;


    /** @param array<int|string, OptionableInterface|array|OptionInterface|null> $i_rOptions > */
    final protected function __construct( protected string $stOptionInterface, array $i_rOptions ) {
        $this->rOptions = self::unwrapOptions( $i_rOptions, $stOptionInterface );
    }


    abstract public static function set( OptionableInterface|array|OptionInterface|null ...$rOptions ) : static;


    /** @param array<int|string, OptionableInterface|array|OptionInterface|null> $i_rOptions */
    private static function unwrapOptions( array $i_rOptions, string $i_stOptionInterface ) : array {
        $r = [];
        foreach ( $i_rOptions as $xOption ) {
            if ( is_array( $xOption ) ) {
                $r = array_merge( $r, self::unwrapOptions( $xOption, $i_stOptionInterface ) );
                continue;
            }
            if ( is_null( $xOption ) ) {
                continue;
            }
            if ( $xOption instanceof OptionableInterface ) {
                $r = array_merge( $r, $xOption->options()->getOptions() );
                continue;
            }
            if ( ! $xOption instanceof $i_stOptionInterface ) {
                throw new \InvalidArgumentException(
                    'Invalid option type: ' . get_class( $xOption ) . ', expected: ' . $i_stOptionInterface
                );
            }
            $r[ $xOption::class ] = $xOption;
        }
        return $r;
    }


    /** @param OptionableInterface|list<OptionInterface>|OptionInterface|null $i_rOption */
    public function add( OptionableInterface|array|OptionInterface|null $i_rOption ) : static {
        return static::set( $this, $i_rOption );
    }


    /** @param class-string $i_stClass */
    public function fetch( string $i_stClass ) : ?OptionInterface {
        return $this->rOptions[ $i_stClass ] ?? null;
    }


    public function getOptions() : array {
        return $this->rOptions;
    }


    public function options() : OptionSetInterface {
        return $this;
    }


    protected function fetchBoolean( string $i_stClass ) : bool {
        $x = $this->fetchValue( $i_stClass );
        return ! is_null( $x );
    }


    /** @param class-string $i_stClass */
    protected function fetchInt( string $i_stClass ) : ?int {
        $x = $this->fetchValue( $i_stClass );
        return is_null( $x )
            ? null
            : intval( $x );
    }


    protected function fetchList( string $i_stClass ) : ?array {
        $x = $this->fetchValue( $i_stClass );
        return is_null( $x )
            ? null
            : (array) $x;
    }


    protected function fetchString( string $i_stClass ) : ?string {
        $x = $this->fetchValue( $i_stClass );
        return is_null( $x )
            ? null
            : (string) $x;
    }


    protected function fetchValue( string $i_stClass ) : mixed {
        $opt = $this->fetch( $i_stClass );
        if ( $opt instanceof OptionInterface ) {
            return $opt->get();
        }
        if ( ! is_a( $i_stClass, OptionInterface::class, true ) ) {
            throw new \InvalidArgumentException( 'Invalid option type: ' . $i_stClass );
        }
        return call_user_func( [ $i_stClass, 'default' ] );
    }


}
