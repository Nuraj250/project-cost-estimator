<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'assumed_hours', 'amount', 'description', 'status', 'project_id'];

    public function staff()
    {
        return $this->belongsToMany(Staff::class, 'project_staff');
    }

    public function payments()
    {
        return $this->hasMany(\App\Models\Payment::class);
    }

    public function expenses()
    {
    return $this->hasMany(Expense::class);  
    }
}
