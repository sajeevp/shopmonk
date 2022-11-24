<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attributes extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'attributes';

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'image',
        'description',
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

    public function subattributes()
    {
        return $this->hasMany(Attributes::class, 'parent_id');
    }
}
