@extends('layouts.content')
@section('title', 'Portfolio | Home')

@section('content')
<div class="container">
    @if($profile)
    <div class="row min-vh-75 align-items-center">
        <div class="col-lg-7">
            <!-- Available Badge -->
            <div class="available-badge mb-4">
                <span class="dot"></span>
                Available for opportunities
            </div>

            <!-- Name -->
            <h1 class="display-1 fw-bold mb-4" style="line-height: 1.1; color: var(--color-text);">
                I'm <span class="gradient-text">{{ $profile->full_name }}</span>
            </h1>

            <!-- Profile Text -->
            <div class="mb-5">
                @if($profile->title)
                    <p class="welcome-text mb-2">{{ $profile->title }}</p>
                @endif
                @if($profile->bio)
                    <p class="welcome-text welcome-subtext mb-0">{{ $profile->bio }}</p>
                @endif
            </div>

            <!-- CTA Buttons -->
            <div class="d-flex gap-3">
                <a href="/projects" class="btn btn-pink btn-lg px-5 py-3 rounded-pill fw-semibold">
                    View Work
                </a>
                <a href="/contacts" class="btn btn-outline-pink btn-lg px-5 py-3 rounded-pill fw-semibold">
                    Contact Me
                </a>
            </div>
        </div>

        <!-- Right side - Simple profile image -->
        <div class="col-lg-5 mt-5 mt-lg-0 text-center">
            <div class="profile-wrapper">
                @php
                    $profileImageSrc = $profile->image_url
                        ? (filter_var($profile->image_url, FILTER_VALIDATE_URL) ? $profile->image_url : asset($profile->image_url))
                        : 'https://via.placeholder.com/400x400';
                @endphp
                <img src="{{ $profileImageSrc }}" class="img-fluid profile-image" alt="Profile">
            </div>
        </div>
    </div>
    @else
        <div class="text-center py-5">
            <div class="glass-card p-5 rounded-4">
                <h3>No Profile Data Found</h3>
                <p class="text-muted">Please add profile information to display.</p>
            </div>
        </div>
    @endif
</div>

<style>
    .min-vh-75 { min-height: 75vh; }

    /* Available Badge */
    .available-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        background: rgba(255, 105, 180, 0.1);
        border-radius: 50px;
        color: var(--color-pink);
        font-weight: 500;
        font-size: 0.9rem;
        border: 1px solid rgba(255, 105, 180, 0.2);
    }

    .dot {
        width: 8px;
        height: 8px;
        background: var(--color-pink);
        border-radius: 50%;
        display: inline-block;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.5; transform: scale(1.2); }
    }

    /* Name */
    .display-1 {
        font-size: 4.5rem;
        font-weight: 800 !important;
        letter-spacing: -2px;
        color: var(--color-text);
    }

    .gradient-text {
        background: var(--gradient-pink);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-weight: 800;
    }

    /* Welcome Text */
    .welcome-text {
        font-size: 1.5rem;
        color: var(--color-text-muted);
        font-weight: 400;
        max-width: 500px;
    }

    .welcome-subtext {
        font-size: 1.05rem;
        line-height: 1.7;
    }

    /* Buttons */
    .btn-pink {
        background: var(--color-pink);
        color: white;
        border: none;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: 0 10px 20px -5px rgba(255, 105, 180, 0.3);
    }

    .btn-pink:hover {
        background: #ff45a5;
        transform: translateY(-2px);
        box-shadow: 0 15px 25px -5px rgba(255, 105, 180, 0.4);
    }

    .btn-outline-pink {
        border: 2px solid var(--color-pink);
        color: var(--color-pink);
        background: transparent;
        font-size: 1.1rem;
    }

    .btn-outline-pink:hover {
        background: var(--color-pink);
        color: white;
        transform: translateY(-2px);
    }

    /* Profile Image */
    .profile-wrapper {
        position: relative;
        display: inline-block;
    }

    .profile-image {
        width: 500px;
        height: 500px;
        object-fit: cover;
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        animation: morphing 8s ease-in-out infinite;
        border: 4px solid var(--color-pink);
        box-shadow: 0 25px 40px -15px rgba(255, 105, 180, 0.3);
    }

    @keyframes morphing {
        0%, 100% { border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; }
        50% { border-radius: 70% 30% 30% 70% / 70% 70% 30% 30%; }
    }

    /* Responsive */
    @media (max-width: 991.98px) {
        .display-1 {
            font-size: 3.5rem;
        }

        .profile-image {
            width: 350px;
            height: 350px;
        }
    }

    @media (max-width: 768px) {
        .display-1 {
            font-size: 2.8rem;
        }

        .welcome-text {
            font-size: 1.2rem;
        }

        .btn {
            padding: 0.8rem 1.5rem !important;
            font-size: 1rem !important;
        }
    }
</style>
@endsection
