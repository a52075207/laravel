<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function videos() {
        return $this->morphedByMany('App\Models\Video', 'taggable');
    }

    public function posts() {
        return $this->morphedByMany('App\Models\Post', 'taggable');
    }
}
