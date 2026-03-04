@extends('layouts.content')
@section('title', 'Projects')
@section('content')
<div class="container mt-4">
    <h2>Projects</h2>
    <ul>
        @foreach($projects as $proj)
            <li><strong>{{ $proj->title }}</strong> ({{ $proj->year }}) - {{ $proj->tech_stack }}</li>
        @endforeach
    </ul>
</div>
@endsection
