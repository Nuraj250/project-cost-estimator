<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfficeExpense extends Model
{
    protected $fillable = ['title', 'monthly_cost'];
}
