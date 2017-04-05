<?php
/**
 * Created by IntelliJ IDEA.
 * User: monls
 * Date: 14/02/2017
 * Time: 4:18 CH
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{

    protected function zeroOrValue($value)
    {
        if (is_null($value)) return 0;

        return $value;
    }

    protected function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    protected function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    protected function zeroOREmptyString($value)
    {
        if (is_null($value)) return '';

        return $value;
    }

}