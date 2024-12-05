<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Task extends Model
{
    use HasFactory, Notifiable;
    protected $fillable=[
        'title',
        'description',
        'is_completed',
        'category_id',
        'createdAt'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
