<?php
namespace Puzbie\Meta;

use Illuminate\Support\Facades\Facade;

/**
 * Class MetaFacade
 *
 * @package Puzbie\Meta
 */
class MetaFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'meta';
    }
}
