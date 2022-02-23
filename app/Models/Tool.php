<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'price',
        'id'
    ];

    public function toString() {
        return "$this->type costs $$this->price.";
    }


}
