<?php

namespace App\Models\InfoPages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'title',
    ];

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    public function owner()
    {
        return $this->morphTo();
    }
}
