<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\OfficeExpense;
use App\Models\Project;
use App\Models\Payment;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function staff()
    {
        $staff = Staff::all();
        return view('admin.staff', compact('staff'));
    }

    public function storeStaff(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'monthly_salary' => 'required|numeric'
        ]);
        Staff::create($request->all());
        return redirect('/admin/staff');
    }

    public function expenses()
    {
        $expenses = OfficeExpense::all();
        return view('admin.expenses', compact('expenses'));
    }

    public function storeExpense(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'monthly_cost' => 'required|numeric'
        ]);
        OfficeExpense::create($request->all());
        return redirect('/admin/expenses');
    }

    public function projects()
    {
        $projects = Project::with('staff')->get();
        $staff = Staff::all();
        return view('admin.projects', compact('projects', 'staff'));
    }

    public function storeProject(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'assumed_hours' => 'required|numeric',
            'staff_ids' => 'required|array'
        ]);

        $project = Project::create([
            'name' => $request->name,
            'assumed_hours' => $request->assumed_hours
        ]);

        $project->staff()->sync($request->staff_ids);

        return redirect('/admin/projects');
    }

    public function projectCost($id)
    {
        $project = Project::with('staff')->findOrFail($id);
        $hours = $project->assumed_hours;

        $staffCost = $project->staff->sum(fn($s) => ($s->monthly_salary / 180) * $hours);
        $officeCost = OfficeExpense::sum('monthly_cost') / 180 * $hours;
        $total = $staffCost + $officeCost;

        return view('admin.project-cost', [
            'project' => $project,
            'staff_cost' => round($staffCost, 2),
            'office_cost' => round($officeCost, 2),
            'total_cost' => round($total, 2),
            'cost_per_hour' => round($total / $hours, 2),
        ]);
    }

    public function payments()
    {
        $payments = Payment::with('project')->get();
        return view('admin.payments', compact('payments'));
    }
}
