<?php
/**
 * Created by PhpStorm.
 * User: changzhou
 * Date: 2019/7/27
 * Time: 6:08 PM
 */

namespace App\Resources;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

abstract class Resource
{

    /*
     * static model
     * */

    /**
     * 返回该资源对应实体
     * @return Model
     */
    public static function newModel(): Model
    {
        $model = static::$model;
        return new $model;
    }

    /**
     * 验证规则
     * @param Request $request
     * @return array
     */
    abstract public function rules(Request $request): array;

    /**
     * 错误验证信息
     * @param Request $request
     * @return array
     */
    abstract public function messages(Request $request): array;

    /**
     * 对应实体是否开启软删除
     * @return bool
     */
    public static function isSoftDelete(): bool
    {
        return in_array(
            SoftDeletes::class, class_uses_recursive(static::newModel())
        );
    }

    /**
     * @param Request $request
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public static function indexQuery(Request $request, $query)
    {
        return $query;
    }

    public static function detailQuery(Request $request, $query)
    {
        return parent::detailQuery($request, $query);
    }
}