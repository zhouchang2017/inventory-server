<?php
/**
 * Created by PhpStorm.
 * User: changzhou
 * Date: 2019/7/27
 * Time: 6:26 PM
 */

namespace App\Traits;


use Illuminate\Http\Request;

trait QueryHandler
{



    protected static function initQuery(Request $request, $query, $search, $withTrashed)
    {

    }

    protected static function applySoftDelete($query, $withTrashed){
        static::isSoftDelete()?(new)
    }

}