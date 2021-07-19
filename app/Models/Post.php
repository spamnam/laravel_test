<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';

    protected $fillable = [
        'title',
        'body',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
