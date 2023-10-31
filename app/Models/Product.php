<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'category_id',
        'customer_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
