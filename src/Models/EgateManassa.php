<?php

namespace Egately\NovaManassaSdk\Models;

use Illuminate\Database\Eloquent\Model;

class EgateManassa extends Model
{

    protected $table='egate_manassa';

    protected $fillable = [
        'manassaable',
        'manassa_id',
        'manassa_name',
        'status',
    ];



    public function manassable()
    {
        return $this->morphTo();
    }

    protected $dates = [
        'created_at' ,
        'updated_at' ,
    ];
}
