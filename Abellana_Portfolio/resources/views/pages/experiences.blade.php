@extends('layouts.content')
@section('title', 'Experiences')

@push('styles')
<style>
    .timeline, .timeline * { font-family: 'Inter', 'Segoe UI', Roboto, sans-serif; }

    .timeline { position: relative; padding: 1rem 0; }
    .timeline::before {
        content: ''; position: absolute; left: 20px; top: 0;
        width: 2px; height: 100%; background: var(--color-gray);
    }
    .exp-node { position: relative; padding-left: 60px; margin-bottom: 30px; }
    .exp-node::before {
        content: ''; position: absolute; left: 11px; top: 8px;
        width: 20px; height: 20px; border-radius: 50%;
        background: var(--color-white); border: 4px solid var(--color-pink); z-index: 2;
    }
    .exp-card {
        border-radius: 24px; border: 1px solid var(--color-gray);
        transition: 0.3s; padding: 2rem;
    }
    .exp-card h4.role-title {
        color: var(--color-text);
    }
    .exp-card:hover { border-color: var(--color-pink); background: var(--color-white); transform: translateX(5px); }
</style>
@endpush

@section('content')
<div class="container mt-5">
    <h2 class="display-5 fw-bold mb-5" style="font-family: 'Inter', sans-serif; background: linear-gradient(90deg, var(--color-pink) 0%, #ff9acb 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Professional Journey</h2>
    <div class="timeline col-lg-9">
        @foreach($experiences as $exp)
            <div class="exp-node">
                <div class="card exp-card shadow-sm">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h4 class="fw-bold m-0 role-title">{{ $exp->role }}</h4>
                        <span class="badge" style="background: var(--color-pink); color: var(--color-white);" >{{ $exp->year }}</span>
                    </div>
                    <p class="fw-bold small mb-3 text-uppercase tracking-wider" style="color: var(--color-pink);">{{ $exp->organization }}</p>
                    <p class="text-muted mb-0">Delivering high-quality solutions and technical innovation.</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection