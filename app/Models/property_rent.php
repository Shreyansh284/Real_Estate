<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class property_rent extends Model
{
    use HasFactory;
    public $tablename="property_rents";
    public $timestamp=false;
}
