<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = ['name', 'monthly_salary'];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_staff');
    }
}
