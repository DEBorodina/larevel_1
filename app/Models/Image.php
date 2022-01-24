<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Image extends Model{
    protected $guarded = [];
    protected $table = 'imageable';
    public function imageable(){
        return $this->morphTo();
    }
}
