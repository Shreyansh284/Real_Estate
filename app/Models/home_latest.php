<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class home_latest extends Model
{
    use HasFactory;
    public $tablename="home_latests";
    public $timestamp=false;
}
