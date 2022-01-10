<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    protected $fillable = ['user_id', 'category_id', 'title','fname','lname', 'image','page','price'];

    public function user():BelongsTo
    {
    	return $this->belongsTo(User::class);
    }

    public function Category():BelongsTo
    {
    	return $this->belongsTo(Category::class);
    }
}
