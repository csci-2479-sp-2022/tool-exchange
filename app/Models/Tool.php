<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Tool extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['name','type','category_id','user_id','condition_id'];

    // output fillable properties into a descriptive string
    public function toString() {
        return $this->name .' is a(n) ' . $this->type .' tool';
    }
    public function category(){
        return $this->belongsToMany(Category::class);
    }
    public function condition(){
        return $this->belongsToMany(Condition::class);
    }
}
