<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class movies extends Model
{
    protected $fillable = ['category_id', 'title', 'year', 'description', 'poster'];

    public function categories()
    {
        return $this->belongsTo(\App\categories::class, 'category_id');
    }
}