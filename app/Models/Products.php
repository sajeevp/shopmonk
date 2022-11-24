<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'color_id',
        'size_id',
        'short_description',
        'description',
        'regular_price',
        'selling_price',
        'currency_code',
        'stock_quantity',
        'trending',
        'status',
        'featured',
        'meta_title',
        'meta_keyword',
        'meta_description',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function category()
    {
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }

    public function size()
    {
        return $this->hasOne(Attributes::class, 'id', 'size_id');
    }

    public function color()
    {
        return $this->hasOne(Attributes::class, 'id', 'color_id');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImages::class, 'product_id', 'id');
    }

    public function scopeOfcat($query, $cat)
    {
        return $query->whereIn('category_id', $cat);
    }
}
