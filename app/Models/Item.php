<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'tb_item';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'box_id',
    ];

    public function box(){
        return $this->belongsTo(Box::class, 'box_id');
    }
}
