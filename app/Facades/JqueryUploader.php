<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/8/19
 * Time: 10:01 PM
 */
namespace  App\Facades;
use Illuminate\Support\Facades\Facade;

class JqueryUploader extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'FancyFileUploaderHelper';
    }
}
