<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_post extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',  'slug', 'keywords', 'status', 'created_at'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'category_post';
}
