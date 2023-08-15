<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    use HasFactory;
    protected $table = "Cost";
    protected $fillable = [
        'user_id',
        'cost_categories_id',
        'cost_expense_date',
        'total_cost'
    ];

    public function cost_categories()
    {
        return $this->belongsTo(cost_categories::class, 'cost_categories_id');
    }

}