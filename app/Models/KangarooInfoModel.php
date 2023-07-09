<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KangarooInfoModel extends Model
{
    protected $table = 't_kangaroo_info';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'nickname',
        'weight',
        'height',
        'gender',
        'color',
        'friendliness',
        'birthday',
    ];
}
