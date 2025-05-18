@extends('layouts.app')

@section('content')
<h2>Payments</h2>

<ul>
    @foreach ($payments as $p)
        <li>
            Project: {{ $p->project->name }} | 
            Amount: ${{ $p->amount }} | 
            Status: {{ $p->status }}
        </li>
    @endforeach
</ul>
@endsection
