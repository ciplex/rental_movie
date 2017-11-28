<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class movies extends Model
{
    protected $fillable = ['category_id', 'title', 'year', 'description'];

    public function categories()
    {
        return $this->belongsTo(\App\categories::class, 'category_id');
    }
}