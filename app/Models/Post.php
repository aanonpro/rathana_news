<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $table='posts';
    protected $fillable =[
        'category_id','image','name','slug','short_detail','detail',
        'meta_title','meta_description','meta_keywords','views','status',
        'tags','trash','created_by','updated_by'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'created_by','id');
    }
    public function category(){
        return $this->belongsTo(Category::class, 'category_id','id');
    }
}
