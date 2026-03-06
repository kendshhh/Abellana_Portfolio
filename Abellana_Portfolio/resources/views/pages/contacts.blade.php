@extends('layouts.content')
@section('title', 'Portfolio | Contact')

@push('styles')
<style>
    /* Global Font and Typography Overrides for Uniformity */
    .contact-wrapper, .contact-wrapper * { 
        font-family: 'Inter', 'Segoe UI', Roboto, sans-serif; 
    }

    .contact-card {
        background: var(--color-white);
        border-radius: 30px;
        padding: 4rem;
        border: 1px solid var(--color-gray);
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        transition: transform 0.3s ease;
    }

    .contact-card:hover {
        transform: translateY(-5px);
    }

    .display-name { 
        font-weight: 900; 
        letter-spacing: -2px; 
        color: var(--color-text); 
    }

    .accent-pill { 
        background: var(--color-pink);
        color: var(--color-white); 
        font-weight: 700; 
        font-size: 0.8rem; 
        letter-spacing: 0.1em;
    }

    .contact-link {
        color: var(--color-pink);
        text-decoration: none;
        font-weight: 600;
        transition: color 0.2s ease;
        word-break: break-all;
    }

    .contact-link:hover {
        color: #ff85c0;
        text-decoration: underline;
    }

    .contact-label {
        font-weight: 700;
        color: var(--color-text);
        text-transform: uppercase;
        font-size: 0.85rem;
        display: block;
        margin-bottom: 0.25rem;
    }
    
    .contact-item {
        margin-bottom: 1.5rem;
    }
    
    .contact-item:last-child {
        margin-bottom: 0;
    }
    
    /* Pink button styles */
    .btn-pink {
        background-color: var(--color-pink);
        color: var(--color-white);
        border: 2px solid var(--color-pink);
        transition: all 0.3s ease;
    }
    
    .btn-pink:hover {
        background-color: transparent;
        color: var(--color-pink);
        border: 2px solid var(--color-pink);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 107, 180, 0.3);
    }
    
    .btn-pink-outline {
        background-color: transparent;
        color: var(--color-pink);
        border: 2px solid var(--color-pink);
        transition: all 0.3s ease;
    }
    
    .btn-pink-outline:hover {
        background-color: var(--color-pink);
        color: var(--color-white);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 107, 180, 0.3);
    }
</style>
@endpush

@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            <div class="contact-card animate-in-up">
                <span class="badge accent-pill px-3 py-2 rounded-pill mb-3 text-uppercase">Get In Touch</span>
                <h1 class="display-3 display-name mb-3" style="background: linear-gradient(90deg, var(--color-pink) 0%, #ff9acb 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Contact Me</h1>
                <p class="lead text-muted mb-5" style="max-width: 600px;">
                    I'd love to hear from you. Whether you have a question about a project or just want to connect, feel free to reach out.
                </p>

                <div class="mt-2">
                    @if(isset($contact))
                    <div class="contact-item">
                        <span class="contact-label">Email</span>
                        <a href="mailto:{{ $contact->email }}" class="contact-link fs-5">{{ $contact->email }}</a>
                    </div>
                    
                    <div class="contact-item">
                        <span class="contact-label">Phone</span>
                        <span class="text-secondary fs-5">{{ $contact->phone }}</span>
                    </div>
                    
                    <div class="contact-item">
                        <span class="contact-label">LinkedIn</span>
                        <a href="{{ $contact->linkedin_url }}" target="_blank" class="contact-link fs-5">{{ $contact->linkedin_url }}</a>
                    </div>
                    
                    @if($contact->github_url)
                    <div class="contact-item">
                        <span class="contact-label">GitHub</span>
                        <a href="{{ $contact->github_url }}" target="_blank" class="contact-link fs-5">{{ $contact->github_url }}</a>
                    </div>
                    @endif
                    @else
                        <div class="text-center text-muted">
                            <p>No contact information available.</p>
                        </div>
                    @endif
                </div>
                
                <div class="mt-5 pt-4 border-top">
                    <a href="/" class="btn btn-pink btn-lg px-5 rounded-pill shadow-sm">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection