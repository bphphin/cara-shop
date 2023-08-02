<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'slug',
        'image',
        'cate_id',
        'brand_id',
        'color_id',
        'size_id',
        'status_id',
        'description'
    ];

    public function getSubCateName() {
        return SubCategory::find($this->cate_id);
    }

    public function getStatusProduct() {
        return StatusProduct::find($this->status_id);
    }
}
