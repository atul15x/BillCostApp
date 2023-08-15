<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cost_categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'categories_name',
        'user_id',
    ];



}