<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name','logo','description','status','creation_year'];

    protected $casts = [
        'creation_year'=>'integer',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
    public function latestProduct(){
        return $this->hasOne(Product::class)->latestOfMany();
    }
    public function oldestProduct(){
        return $this->hasOne(Product::class)->oldestOfMany();
    }

    public function setNameAttribute($value){
        dump(222);
    }
    use HasFactory;
}
