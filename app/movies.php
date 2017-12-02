<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class movies extends Model
{
    protected $fillable = ['category_id', 'title', 'actor', 'year', 'description', 'poster'];

    public function categoryclass()
    {
        return $this->belongsTo(\App\categoryclass::class, 'category_id');
    }
}
?>