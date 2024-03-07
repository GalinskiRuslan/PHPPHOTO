<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    #Поля которые мы хотим обновлять через модель
    protected $fillable = [
        'title',
        'description'
    ];
    #Поля которые мы не хотим обновлять через модель
    protected $guarded = [
        'id'
    ];
}
