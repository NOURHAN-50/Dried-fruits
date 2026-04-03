<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
        protected $fillable = [
            'imageable',
            'path',
        ];
    public function imageable()
    {        return $this->morphTo();
    }

    //
}
