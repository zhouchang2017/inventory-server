<?php
/**
 * Created by PhpStorm.
 * User: changzhou
 * Date: 2019/7/27
 * Time: 6:43 PM
 */

namespace App\Traits;


use Illuminate\Database\Eloquent\Builder;

class SoftDeleteHandler
{
    const WITH = 'with';
    const ONLY = 'only';

    /**
     * 软删除处理
     * @param Builder $query
     * @param string $withTrashed
     * @return Builder
     */
    public function __invoke(Builder $query, string $withTrashed)
    {
        if ($withTrashed == static::WITH) {
            $query = $query->withTrashed();
        } elseif ($withTrashed == static::ONLY) {
            $query = $query->onlyTrashed();
        }

        return $query;
    }
}