@extends('layouts.app')

@section('content')
<h2>Projects</h2>

<form method="POST" action="/admin/projects">
    @csrf
    <input type="text" name="name" placeholder="Project Name" required>
    <input type="number" name="assumed_hours" placeholder="Hours" required>
    
    <label>Select Staff:</label><br>
    @foreach ($staff as $s)
        <input type="checkbox" name="staff_ids[]" value="{{ $s->id }}"> {{ $s->name }}<br>
    @endforeach

    <button type="submit">Create Project</button>
</form>

<ul>
    @foreach ($projects as $p)
        <li>
            {{ $p->name }} ({{ $p->assumed_hours }}h) — 
            <a href="/admin/projects/{{ $p->id }}/cost">View Cost</a>
        </li>
    @endforeach
</ul>
@endsection
