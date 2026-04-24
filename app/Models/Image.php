<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
        protected $fillable = [
            'imageable',
            'path',
            'is_main',
        ];
    public function imageable()
    {        return $this->morphTo();
    }

    //
}
