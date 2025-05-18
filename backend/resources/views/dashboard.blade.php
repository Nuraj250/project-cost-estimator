@extends('layouts.app')

@section('content')
<h2>Admin Dashboard</h2>
<ul>
    <li><a href="/admin/staff">Manage Staff</a></li>
    <li><a href="/admin/expenses">Manage Office Expenses</a></li>
    <li><a href="/admin/projects">Manage Projects</a></li>
    <li><a href="/admin/payments">View Payments</a></li>
</ul>
@endsection
