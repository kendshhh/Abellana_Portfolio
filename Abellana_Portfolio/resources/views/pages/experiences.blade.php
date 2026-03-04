@extends('layouts.content')
@section('title', 'Experiences')
@section('content')
<div class="container mt-4">
    <h2>Experiences</h2>
    <ul>
        @foreach($experiences as $exp)
            <li><strong>{{ $exp->role }}</strong> at {{ $exp->organization }} ({{ $exp->year }})</li>
        @endforeach
    </ul>
</div>
@endsection
