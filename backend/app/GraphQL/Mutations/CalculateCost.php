<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\OfficeExpense;
use App\Models\Project;

class CalculateCost
{
    public function __invoke($_, array $args)
    {
        $project = Project::with('staff')->findOrFail($args['project_id']);
        $hours = $project->assumed_hours;

        $staffCost = $project->staff->sum(fn($s) => ($s->monthly_salary / 180) * $hours);
        $officeCost = OfficeExpense::all()->sum('monthly_cost') / 180 * $hours;
        $total = $staffCost + $officeCost;

        return [
            'project' => $project->name,
            'hours' => $hours,
            'staff_cost' => round($staffCost, 2),
            'office_cost' => round($officeCost, 2),
            'total_cost' => round($total, 2),
            'cost_per_hour' => round($total / $hours, 2),
        ];
    }
}

