<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name', 'category_post_id',  'slug', 'keywords', 'status', 'content', 'status', 'created_at', 'auth_name'
    ];
    protected $primaryKey = 'id';
    protected $table = 'post';
}
