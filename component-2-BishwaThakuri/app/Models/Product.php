<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use HasFactory;

    use Sortable;

    protected $table = "products";

    //making mass assigment 
    protected $fillable = ['user_id', 'category_id', 'title','fname','lname', 'image','pages','price'];

    //fir sorting 
    public $sortable = ['id', 'title', 'price'];

    //relation of product and user
    public function user():BelongsTo
    {
    	return $this->belongsTo(User::class);
    }

    //relation of product and category
    public function Category():BelongsTo
    {
    	return $this->belongsTo(Category::class);
    }
}
