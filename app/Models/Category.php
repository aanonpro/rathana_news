<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name','slug','description','image','status','trash','created_by','updated_by'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'created_by','id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }
}
