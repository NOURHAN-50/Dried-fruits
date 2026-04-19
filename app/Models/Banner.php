<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
        use HasFactory;
    protected $fillable = ['title','location','link','is_active','start_date','end_date'];
    //
            public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
