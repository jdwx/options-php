<?php


declare( strict_types = 1 );


namespace JDWX\Options;


readonly abstract class AbstractOption implements OptionInterface {


    /**
     * @noinspection PhpMixedReturnTypeCanBeReducedInspection
     * @codeCoverageIgnore
     */
    public static function default() : mixed {
        return null;
    }


}
