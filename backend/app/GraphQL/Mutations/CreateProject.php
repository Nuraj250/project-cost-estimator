<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Project;

class CreateProject
{
    public function __invoke($_, array $args)
    {
        $project = Project::create([
            'name' => $args['name'],
            'assumed_hours' => $args['assumed_hours'],
        ]);

        $project->staff()->sync($args['staff_ids']);

        return $project->load('staff');
    }
}
