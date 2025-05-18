@extends('layouts.app')

@section('content')
<h2>Cost Summary: {{ $project->name }}</h2>

<ul>
    <li>Assumed Hours: {{ $project->assumed_hours }}</li>
    <li>Staff Cost: ${{ $staff_cost }}</li>
    <li>Office Cost: ${{ $office_cost }}</li>
    <li>Total Cost: ${{ $total_cost }}</li>
    <li>Cost per Hour: ${{ $cost_per_hour }}</li>
</ul>

<a href="/admin/projects">← Back to Projects</a>
@endsection
