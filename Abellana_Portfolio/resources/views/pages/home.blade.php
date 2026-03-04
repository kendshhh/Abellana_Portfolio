@extends('layouts.content')
@section('title', 'Home')
@section('content')
<div class="container mt-4">
    @foreach($profiles as $profile)
        <h1>{{ $profile->full_name }}</h1>
        <h3>{{ $profile->title }}</h3>
        <p>{{ $profile->bio }}</p>
    @endforeach
</div>
@endsection
