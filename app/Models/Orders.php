<?php

namespace App\Models;

use App\Models\OrderItems;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'name',
        'address_1',
        'address_2',
        'state',
        'country',
        'postcode',
        'phone',
        'email',
        'sub_total',
        'total',
        'status',
        'payment_method',
        'payment_id',
        'shipping_info'
    ];

    public function orderitems()
    {
        return $this->hasMany(OrderItems::class, 'order_id', 'id');
    } 
}
