<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'categories';

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'image',
        'description',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status'
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

    public function subcategories()
    {
        return $this->hasMany(Categories::class, 'parent_id');
    }
    public function parentcategory()
    {
        return $this->belongsTo(Categories::class, 'parent_id');
    }
}
