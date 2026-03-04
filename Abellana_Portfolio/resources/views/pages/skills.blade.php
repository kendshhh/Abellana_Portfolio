@extends('layouts.content')
@section('title', 'Skills')
@section('content')
<div class="container mt-4">
    <h2>My Skills</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Skill</th>
                <th>Level</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($skills as $skill)
                <tr>
                    <td>{{ $skill->name }}</td>
                    <td>{{ $skill->level }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
