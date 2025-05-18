@extends('layouts.app')

@section('content')
<h2>Office Expenses</h2>

<form method="POST" action="/admin/expenses">
    @csrf
    <input type="text" name="title" placeholder="Expense Title" required>
    <input type="number" name="monthly_cost" placeholder="Monthly Cost" required>
    <button type="submit">Add Expense</button>
</form>

<ul>
    @foreach ($expenses as $e)
        <li>{{ $e->title }} - ${{ $e->monthly_cost }}</li>
    @endforeach
</ul>
@endsection
