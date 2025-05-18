<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Expense;

class ProjectController extends Controller
{
    public function index()
    {
        return Project::with('staff')->get();
    }

    public function show($id)
    {
        return Project::with('staff')->findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'assumed_hours' => 'required|numeric',
        ]);

        return Project::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->update($request->all());
        return $project;
    }

    public function destroy($id)
    {
        return Project::destroy($id);
    }
}
