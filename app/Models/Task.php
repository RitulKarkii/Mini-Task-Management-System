<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'discription',
        'status',
        'priority',
        'is_completed'
    ];
     public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
