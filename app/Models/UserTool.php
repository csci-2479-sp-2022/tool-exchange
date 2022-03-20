<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTool extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'price',
        'id',
        'user_id'
    ];


    // output fillable properties into a descriptive string
    public function toString() {
        return $this->name .' is a ' . $this->type;

    }
}
