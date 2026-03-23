<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    protected $table = 'tb_box';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];
}
