<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        return Staff::all();
    }

    public function show($id)
    {
        return Staff::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'monthly_salary' => 'required|numeric',
        ]);

        return Staff::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);
        $staff->update($request->all());
        return $staff;
    }

    public function destroy($id)
    {
        return Staff::destroy($id);
    }
}
