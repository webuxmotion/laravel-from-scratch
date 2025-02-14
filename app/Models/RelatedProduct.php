<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelatedProduct extends Model
{
    use HasFactory;

    // Specify table name (if not following Laravel's plural convention)
    protected $table = 'related_products';

    // Fillable fields
    protected $fillable = [
        'product_id',
        'related_product_id',
    ];

    // Relationships (optional)
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function relatedProduct()
    {
        return $this->belongsTo(Product::class, 'related_product_id');
    }
}
