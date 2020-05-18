<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table =  'orders';
    protected $fillable =  ['user_id' , 'date' , 'address' , 'status'];


    public function user(){
        return $this->belongsTo('App\User');
    }





    public function OrderItems(){
    	return $this->hasMany(OrderItem::class);
    }
    public function products(){
    	return $this->belongsToMany(Product::class ,'order_items' );
    }
}
