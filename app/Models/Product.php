<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $fillable = ['name','price','description'];

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function wishlists(){
        return $this->hasMany(Wishlist::class);
    }
}
