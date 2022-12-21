<?php

namespace App\Models\InfoPages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'data', 'visibility',
    ];

    protected $casts = [
        'visibility' => ContentVisibilityEnum::class,
    ];

    public function page()
    {
        return $this->belongsTo(Page::class,'page_id');
    }
}
