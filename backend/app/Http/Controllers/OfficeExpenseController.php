<?php

namespace App\Http\Controllers;

use App\Models\OfficeExpense;
use Illuminate\Http\Request;

class OfficeExpenseController extends Controller
{
    public function index()
    {
        return OfficeExpense::all();
    }

    public function show($id)
    {
        return OfficeExpense::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'monthly_cost' => 'required|numeric',
        ]);

        return OfficeExpense::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $expense = OfficeExpense::findOrFail($id);
        $expense->update($request->all());
        return $expense;
    }

    public function destroy($id)
    {
        return OfficeExpense::destroy($id);
    }
}
