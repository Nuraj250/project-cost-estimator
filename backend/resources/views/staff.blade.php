
@extends('layouts.app')

@section('content')
<h2>Staff</h2>

<form method="POST" action="/admin/staff">
    @csrf
    <input type="text" name="name" placeholder="Staff Name" required>
    <input type="number" name="monthly_salary" placeholder="Monthly Salary" required>
    <button type="submit">Add Staff</button>
</form>

<ul>
    @foreach ($staff as $s)
        <li>{{ $s->name }} - ${{ $s->monthly_salary }}</li>
    @endforeach
</ul>
@endsection

