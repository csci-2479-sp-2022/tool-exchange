<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;

    public const TOOL_TYPE_HARDWARE = 'Hammer';
    public const TOOL_TYPE_GARDEN = 'Lawn Mower';

    // define model attributes
    protected $fillable = [
        'name',
        'type'
      
    // output fillable properties into a descriptive string
    public function toString() {
        return $this->name .' is a ' . $this->type;

    }
}
