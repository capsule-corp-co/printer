<?php
namespace CapsuleCorp\Printer;

use Illuminate\Support\Facades\Facade;

class PrintNodeCapsuleFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'capsulecorp-printnodecapsule';
    }
}
