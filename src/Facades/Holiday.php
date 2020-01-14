<?php

declare(strict_types=1);
namespace Genericmilk\Holiday\Facades;
use Illuminate\Support\Facades\Facade;

class Holiday extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Holiday';
    }
}
