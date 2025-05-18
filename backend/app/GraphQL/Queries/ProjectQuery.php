<?php

namespace App\GraphQL\Queries;

use App\Models\Project;

class ProjectQuery
{
    public function getAllProjects($_, array $args)
    {
        return Project::with(['staff', 'expenses', 'payments'])->get();
    }
}
