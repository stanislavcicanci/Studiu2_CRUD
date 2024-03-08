<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'text',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            $maxId = DB::table($article->getTable())->max('id');
            $article->id = $maxId ? $maxId + 1 : 1;
        });
    }
}
