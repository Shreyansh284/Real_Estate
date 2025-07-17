<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedbacks extends Model
{
    use HasFactory;
    public $tablename="feedbacks";
    public $timestamp=false;
}
